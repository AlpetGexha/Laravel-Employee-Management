<section class="ud-page-banner">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="ud-banner-content">
          <h1>{{ $title ?? 'Welcome' }}</h1>
          @if (isset($subtitle))
          <p>{{ $subtitle }}</p>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
