<?php

namespace App\Livewire;

use App\Services\XmlParserService;
use Livewire\Component;

class XmlNewsFeed extends Component
{
    public $newsItems = [];
    public $loading = true;
    public $error = null;
    public $feedUrl = 'https://www.nasa.gov/rss/dyn/breaking_news.rss'; // Default NASA feed as example

    protected $listeners = ['switchFeed' => 'switchFeed'];

    public function mount($url = null)
    {
        if ($url) {
            $this->feedUrl = $url;
        }

        $this->fetchFeed();
    }

    public function switchFeed($data)
    {
        if (isset($data['url'])) {
            $this->feedUrl = $data['url'];
            $this->fetchFeed();
        }
    }
      public function fetchFeed()
    {
        try {
            $this->loading = true;

            // Use the XmlParserService to fetch and parse the feed
            $xmlParserService = new XmlParserService();
            $parsedFeed = $xmlParserService->parseXmlFeed($this->feedUrl);

            // Set news items from parsed feed
            $this->newsItems = $parsedFeed['items'];

            $this->error = null;

        } catch (\Exception $e) {
            $this->error = "Error loading XML feed: " . $e->getMessage();
        } finally {
            $this->loading = false;
        }
    }

    public function refreshFeed()
    {
        $this->fetchFeed();
    }

    public function render()
    {
        return view('livewire.xml-news-feed');
    }
}
