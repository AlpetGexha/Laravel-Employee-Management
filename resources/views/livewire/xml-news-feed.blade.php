<div>
    <div class="row mb-5">
        <div class="col-12 text-center">
            <div class="btn-group" role="group" aria-label="Feed Selection">
                <button wire:click="changeFeed('https://www.nasa.gov/rss/dyn/breaking_news.rss')"
                        class="btn {{ $feedUrl == 'https://www.nasa.gov/rss/dyn/breaking_news.rss' ? 'btn-primary' : 'btn-outline-primary' }}">
                    NASA News
                </button>
                <button wire:click="changeFeed('https://feeds.feedburner.com/TechCrunch/')"
                        class="btn {{ $feedUrl == 'https://feeds.feedburner.com/TechCrunch/' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Tech News
                </button>
                <button wire:click="changeFeed('https://rss.nytimes.com/services/xml/rss/nyt/World.xml')"
                        class="btn {{ $feedUrl == 'https://rss.nytimes.com/services/xml/rss/nyt/World.xml' ? 'btn-primary' : 'btn-outline-primary' }}">
                    World News
                </button>
            </div>
        </div>
            <div class="row mt-4">
        <div class="col-12 text-center">
            <small class="text-muted">
                XML Feed Source: <code>{{ $feedUrl }}</code>
            </small>
        </div>
    </div>
    </div>

    <div class="row">
        @if ($loading)
            <div class="col-12 text-center mb-4">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        @endif

        @if ($error)
            <div class="col-12 mb-4">
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            </div>
        @endif

        <div class="col-12 mb-4 text-center">
            <button wire:click="refreshFeed" class="ud-main-btn">
                <span wire:loading.remove wire:target="refreshFeed">Refresh Feed</span>
                <span wire:loading wire:target="refreshFeed">Loading...</span>
            </button>
        </div>

        @forelse ($newsItems as $item)
            <div class="col-lg-4 col-md-6">
                <div class="ud-single-blog">
                    <div class="ud-blog-image">
                        <a href="{{ $item['link'] }}" target="_blank">
                            @if ($item['image'])
                                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" />
                            @else
                                <div class="placeholder-image bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="lni lni-newspaper" style="font-size: 3rem;"></i>
                                </div>
                            @endif
                        </a>
                    </div>
                    <div class="ud-blog-content">
                        <span class="ud-blog-date">{{ $item['pubDate'] }}</span>
                        <h3 class="ud-blog-title">
                            <a href="{{ $item['link'] }}" target="_blank">
                                {{ $item['title'] }}
                            </a>
                        </h3>
                        <p class="ud-blog-desc">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item['description']), 120) }}
                        </p>
                        @if (!empty($item['categories']))
                            <div class="small text-muted">
                                @foreach ($item['categories'] as $category)
                                    <span class="me-2">#{{ $category }}</span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    No news items found in the XML feed.
                </div>
            </div>
        @endforelse
    </div>
</div>
