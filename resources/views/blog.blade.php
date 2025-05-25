<x-layout>
    <!-- ====== Banner Start ====== -->
    <section class="ud-page-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <div class="ud-banner-content">
                        <h1>Employee Management Blog</h1>
                        <p>Insights and best practices powered by XML technology</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Banner End ====== -->

    <!-- ====== Blog Start ====== -->
    <section class="ud-blog-grids">
        <div class="container">
            <livewire:xml-local-blog-feed />
        </div>
    </section>
    <!-- ====== Blog End ====== -->

    <!-- ====== XML News Feed Start ====== -->
    <section class="ud-blog-grids">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="ud-section-title text-center mx-auto">
                        <h2>XML News Feed</h2>
                        <p>
                            Real-time news pulled directly from XML/RSS feeds
                        </p>
                    </div>
                </div>
            </div>

            <!-- Livewire XML Feed Component -->
            <livewire:xml-news-feed url="https://www.nasa.gov/rss/dyn/breaking_news.rss" />

        </div>
    </section>
    <!-- ====== XML News Feed End ====== -->
</x-layout>
