<?php

namespace App\Services;

use Exception;
use SimpleXMLElement;

class XmlParserService
{
    /**
     * Parse an XML feed URL and return structured data
     *
     * @param  string  $url  The XML feed URL
     * @param  int  $limit  Maximum number of items to return
     * @return array Array of parsed news items and metadata
     *
     * @throws Exception If feed cannot be fetched or parsed
     */
    public function parseXmlFeed(string $url, int $limit = 6): array
    {
        // Get the XML content
        $xmlContent = @file_get_contents($url);

        if ($xmlContent === false) {
            throw new Exception("Could not fetch the XML feed from {$url}");
        }

        // Create a SimpleXMLElement object
        $xml = new SimpleXMLElement($xmlContent);

        // Extract feed metadata
        $feedInfo = [
            'title' => '',
            'description' => '',
            'link' => '',
            'lastUpdated' => '',
            'language' => '',
        ];

        $newsItems = [];

        // Parse RSS format
        if (isset($xml->channel)) {
            $channel = $xml->channel;

            // Extract feed metadata
            $feedInfo['title'] = (string) $channel->title;
            $feedInfo['description'] = (string) $channel->description;
            $feedInfo['link'] = (string) $channel->link;
            $feedInfo['lastUpdated'] = isset($channel->lastBuildDate) ?
                date('Y-m-d H:i:s', strtotime((string) $channel->lastBuildDate)) : '';
            $feedInfo['language'] = (string) $channel->language;

            // Extract items
            foreach ($channel->item as $item) {
                $newsItem = $this->parseRssItem($item);
                $newsItems[] = $newsItem;

                if (count($newsItems) >= $limit) {
                    break;
                }
            }
        }
        // Parse Atom format
        elseif (isset($xml->entry)) {
            // Extract feed metadata
            $feedInfo['title'] = (string) $xml->title;
            $feedInfo['description'] = (string) $xml->subtitle;

            foreach ($xml->link as $link) {
                if ((string) $link['rel'] === 'alternate') {
                    $feedInfo['link'] = (string) $link['href'];
                    break;
                }
            }

            $feedInfo['lastUpdated'] = isset($xml->updated) ?
                date('Y-m-d H:i:s', strtotime((string) $xml->updated)) : '';

            // Extract items
            foreach ($xml->entry as $entry) {
                $newsItem = $this->parseAtomEntry($entry);
                $newsItems[] = $newsItem;

                if (count($newsItems) >= $limit) {
                    break;
                }
            }
        }

        return [
            'feedInfo' => $feedInfo,
            'items' => $newsItems,
        ];
    }

    /**
     * Parse an individual RSS item
     */
    private function parseRssItem($item): array
    {
        $newsItem = [
            'title' => (string) $item->title,
            'description' => (string) $item->description,
            'content' => (string) ($item->children('content', true)->encoded ?? ''),
            'link' => (string) $item->link,
            'pubDate' => date('M d, Y', strtotime((string) $item->pubDate)),
            'pubDateRaw' => (string) $item->pubDate,
            'image' => null,
            'categories' => [],
        ];

        // Try to extract image from content if available
        if (isset($item->enclosure) && isset($item->enclosure['url'])) {
            $newsItem['image'] = (string) $item->enclosure['url'];
        } elseif ($newsItem['content']) {
            $newsItem['image'] = $this->extractImageFromHtml($newsItem['content']);
        } elseif ($newsItem['description']) {
            $newsItem['image'] = $this->extractImageFromHtml($newsItem['description']);
        }

        // Extract categories
        if (isset($item->category)) {
            foreach ($item->category as $category) {
                $newsItem['categories'][] = (string) $category;
            }
        }

        return $newsItem;
    }

    /**
     * Parse an individual Atom entry
     */
    private function parseAtomEntry($entry): array
    {
        $newsItem = [
            'title' => (string) $entry->title,
            'description' => (string) ($entry->summary ?? ''),
            'content' => (string) ($entry->content ?? ''),
            'link' => '',
            'pubDate' => date('M d, Y', strtotime((string) $entry->published)),
            'pubDateRaw' => (string) $entry->published,
            'image' => null,
            'categories' => [],
        ];

        // Get link
        foreach ($entry->link as $link) {
            if ((string) $link['rel'] === 'alternate' || ! isset($link['rel'])) {
                $newsItem['link'] = (string) $link['href'];
                break;
            }
        }

        // Try to extract image from content
        if ($newsItem['content']) {
            $newsItem['image'] = $this->extractImageFromHtml($newsItem['content']);
        } elseif ($newsItem['description']) {
            $newsItem['image'] = $this->extractImageFromHtml($newsItem['description']);
        }

        // Extract categories
        if (isset($entry->category)) {
            foreach ($entry->category as $category) {
                $newsItem['categories'][] = (string) $category['term'];
            }
        }

        return $newsItem;
    }

    /**
     * Extract the first image from HTML content
     */
    private function extractImageFromHtml(string $html): ?string
    {
        $pattern = '/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/i';
        if (preg_match($pattern, $html, $matches)) {
            return $matches[1];
        }

        return null;
    }
}
