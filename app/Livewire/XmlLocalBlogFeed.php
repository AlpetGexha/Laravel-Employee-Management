<?php

namespace App\Livewire;

use Exception;
use Livewire\Component;

class XmlLocalBlogFeed extends Component
{
    public $blogItems = [];
    public $loading = false;
    public $error = null;
    public $feedTitle = 'Employee Management Blog';

    public function mount()
    {
        $this->fetchLocalBlogFeed();
    }

    public function fetchLocalBlogFeed()
    {
        try {
            $this->loading = true;
            $this->error = null;

            // Path to local XML file
            $xmlPath = public_path('xml/employee-management-blog.xml');

            if (!file_exists($xmlPath)) {
                throw new Exception("Local XML blog feed file not found");
            }

            // Use libxml to disable external entity loading for security
            $prev = libxml_disable_entity_loader(true);

            // Read and parse the local XML file directly
            $xmlContent = file_get_contents($xmlPath);

            if ($xmlContent === false) {
                throw new Exception("Could not read the XML file");
            }

            // Parse the XML directly with error handling
            $parsedFeed = $this->parseLocalXml($xmlContent);

            // Set blog items from parsed feed
            $this->blogItems = $parsedFeed['items'] ?? [];

            // Restore libxml setting
            libxml_disable_entity_loader($prev);

        } catch (Exception $e) {
            $this->error = 'Error loading blog feed: ' . $e->getMessage();
            $this->blogItems = [];
        } finally {
            $this->loading = false;
        }
    }

    public function refreshFeed()
    {
        $this->fetchLocalBlogFeed();
    }

    public function render()
    {
        return view('livewire.xml-local-blog-feed');
    }

    private function parseLocalXml(string $xmlContent): array
    {
        // Use libxml for better error handling
        libxml_use_internal_errors(true);

        $xml = simplexml_load_string($xmlContent, 'SimpleXMLElement', LIBXML_NOCDATA);

        if ($xml === false) {
            $errors = libxml_get_errors();
            $errorMessage = "Invalid XML format";
            if (!empty($errors)) {
                $errorMessage .= ": " . $errors[0]->message;
            }
            throw new Exception($errorMessage);
        }

        $blogItems = [];

        // Parse RSS format with better error handling
        if (isset($xml->channel)) {
            $channel = $xml->channel;

            // Extract items with limit for performance
            $itemCount = 0;
            foreach ($channel->item as $item) {
                if ($itemCount >= 9) break; // Limit to 9 items for performance

                $blogItem = [
                    'title' => trim((string) $item->title),
                    'description' => trim((string) $item->description),
                    'content' => trim((string) ($item->children('content', true)->encoded ?? '')),
                    'link' => (string) $item->link,
                    'pubDate' => $this->formatDate((string) $item->pubDate),
                    'pubDateRaw' => (string) $item->pubDate,
                    'image' => $this->extractImageUrl($item),
                    'categories' => $this->extractCategories($item),
                ];

                $blogItems[] = $blogItem;
                $itemCount++;
            }
        }

        return [
            'items' => $blogItems,
        ];
    }

    private function formatDate(string $dateString): string
    {
        try {
            return date('M d, Y', strtotime($dateString));
        } catch (Exception $e) {
            return 'Recent';
        }
    }

    private function extractImageUrl($item): ?string
    {
        if (isset($item->enclosure) && isset($item->enclosure['url'])) {
            return (string) $item->enclosure['url'];
        }
        return null;
    }

    private function extractCategories($item): array
    {
        $categories = [];
        if (isset($item->category)) {
            foreach ($item->category as $category) {
                $categories[] = trim((string) $category);
            }
        }
        return $categories;
    }
}
