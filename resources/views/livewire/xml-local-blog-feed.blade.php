<div>
    <!-- Loading State -->
    @if ($loading)
        <div class="row">
            <div class="col-12 text-center mb-4">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading blog posts...</span>
                </div>
                <p class="mt-2">Loading blog posts from XML feed...</p>
            </div>
        </div>
    @endif

    <!-- Error State -->
    @if ($error)
        <div class="row">
            <div class="col-12 mb-4">
                <div class="alert alert-danger">
                    <strong>Error:</strong> {{ $error }}
                    <button wire:click="refreshFeed" class="btn btn-sm btn-outline-danger ms-2">
                        Try Again
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- Refresh Button -->
    <div class="row mb-4">
        <div class="col-12 text-center">
            <button wire:click="refreshFeed" class="ud-main-btn" {{ $loading ? 'disabled' : '' }}>
                <span wire:loading.remove wire:target="refreshFeed">Refresh Blog Posts</span>
                <span wire:loading wire:target="refreshFeed">Loading...</span>
            </button>
        </div>
    </div>

    <!-- Blog Posts Grid -->
    <div class="row">
        @forelse ($blogItems as $item)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="ud-single-blog">
                    <div class="ud-blog-image">
                        <a href="{{ $item['link'] }}" target="_blank">
                            @if ($item['image'])
                                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" />
                            @else
                                <div class="placeholder-image bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="lni lni-write" style="font-size: 3rem; color: #6c757d;"></i>
                                </div>
                            @endif
                        </a>
                    </div>
                    <div class="ud-blog-content">
                        <span class="ud-blog-date">{{ $item['pubDate'] }}</span>
                        <h3 class="ud-blog-title">
                            <a href="{{ $item['link'] }}" target="_blank">
                                {{ \Illuminate\Support\Str::limit($item['title'], 60) }}
                            </a>
                        </h3>
                        <p class="ud-blog-desc">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item['description']), 120) }}
                        </p>
                        @if (!empty($item['categories']))
                            <div class="small text-muted mt-2">
                                @foreach (array_slice($item['categories'], 0, 3) as $category)
                                    <span class="badge bg-light text-dark me-1">#{{ $category }}</span>
                                @endforeach
                            </div>
                        @endif
                        <div class="mt-2">
                            {{-- <a href="{{ $item['link'] }}" target="_blank" class="btn btn-sm btn-outline-primary"> --}}
                            <a href="{{ route('blog.details', ['slug' => str()->slug($item['title'])]) }}" class="btn btn-sm btn-outline-primary">

                                Read More <i class="lni lni-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            @if (!$loading && !$error)
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="lni lni-information"></i>
                        No blog posts found in the XML feed.
                    </div>
                </div>
            @endif
        @endforelse
    </div>

    <!-- XML Source Info -->
    @if (count($blogItems) > 0)
        <div class="row">
            <div class="col-12 text-center">
                <small class="text-muted">
                    Content loaded from local XML feed: <code>xml/employee-management-blog.xml</code>
                </small>
            </div>
        </div>
    @endif
</div>
