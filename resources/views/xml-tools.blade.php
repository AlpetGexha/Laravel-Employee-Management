<x-layout>
  <!-- ====== Banner Start ====== -->
  <section class="ud-page-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="ud-banner-content">
            <h1>XML Tools</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ====== Banner End ====== -->

  <!-- ====== XML Tools Start ====== -->
  <section class="ud-about">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="ud-section-title">
            <span>XML-based tools</span>
            <h2>Employee Data XML Manager</h2>
            <p>
              Use these tools to export employee data to XML format or import employee data from XML files.
              This demonstrates using XML for data interchange within the application.
            </p>
          </div>
        </div>
      </div>

      <!-- Livewire XML Employee Exporter Component -->
      <div class="row">
        <div class="col-lg-12">
          @livewire('xml-employee-exporter')
        </div>
      </div>
    </div>
  </section>
  <!-- ====== XML Tools End ====== -->

  <!-- ====== XML Documentation Start ====== -->
  <section class="ud-features">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="ud-section-title">
            <span>XML Technology</span>
            <h2>About XML in this Application</h2>
            <p>
              XML (eXtensible Markup Language) is used in multiple ways in this application.
            </p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-6">
          <div class="ud-single-feature">
            <div class="ud-feature-icon">
              <i class="lni lni-code"></i>
            </div>
            <div class="ud-feature-content">
              <h3>XML Feeds</h3>
              <p>
                We use XML/RSS feeds to display news content from external sources on our blog page.
                The feeds are parsed in real-time and displayed in a user-friendly format.
              </p>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-6">
          <div class="ud-single-feature">
            <div class="ud-feature-icon">
              <i class="lni lni-download"></i>
            </div>
            <div class="ud-feature-content">
              <h3>Data Export</h3>
              <p>
                The application allows exporting employee data in XML format, which can be used
                for data interchange with other systems or for backup purposes.
              </p>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-6">
          <div class="ud-single-feature">
            <div class="ud-feature-icon">
              <i class="lni lni-upload"></i>
            </div>
            <div class="ud-feature-content">
              <h3>Data Import</h3>
              <p>
                You can import employee data from XML files, making it easy to transfer data
                between different systems or restore from backups.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ====== XML Documentation End ====== -->
</x-layout>
