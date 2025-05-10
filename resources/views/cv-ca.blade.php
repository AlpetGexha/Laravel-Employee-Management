<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Employee Management</title>

  <!--====== Favicon Icon ======-->
  <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/svg" />

  <!-- ===== All CSS files ===== -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/animate.css" />
  <link rel="stylesheet" href="assets/css/lineicons.css" />
  <link rel="stylesheet" href="assets/css/styles.css" />
</head>

<body>
  <!-- ====== Header Start ====== -->
  <header class="ud-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="index.html">
              <img src="assets/images/logo/logo.svg" alt="Logo" />
            </a>
            <button class="navbar-toggler">
              <span class="toggler-icon"> </span>
              <span class="toggler-icon"> </span>
              <span class="toggler-icon"> </span>
            </button>

            <div class="navbar-collapse">
              <ul id="nav" class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="ud-menu-scroll" href="index.html">Home</a>
                </li>

                <li class="nav-item">
                  <a class="ud-menu-scroll" href="about.html">About</a>
                </li>
                <li class="nav-item">
                  <a class="ud-menu-scroll" href="pricing.html">Pricing</a>
                </li>
                <li class="nav-item">
                  <a class="ud-menu-scroll" href="blog.html">Blog</a>
                </li>
                <li class="nav-item">
                  <a class="ud-menu-scroll" href="contact.html">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="ud-menu-scroll" href="Dokumentacioni.html">Docs</a>
                </li>
              </ul>
            </div>

            <div class="navbar-btn d-none d-sm-inline-block">
              <a href="login.html" class="ud-main-btn ud-login-btn">
                Sign In
              </a>
              <a class="ud-main-btn ud-white-btn" href="register.html">
                Sign Up
              </a>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ====== Header End ====== -->

  <!-- ====== Banner Start ====== -->
  <section class="ud-page-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="ud-banner-content">

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ====== Banner End ====== -->

  <style>
    /* About Me 
  ---------------------*/
    .about-text h3 {
      font-size: 45px;
      font-weight: 700;
      margin: 0 0 6px;
    }

    @media (max-width: 767px) {
      .about-text h3 {
        font-size: 35px;
      }
    }

    .about-text h6 {
      font-weight: 600;
      margin-bottom: 15px;
    }

    @media (max-width: 767px) {
      .about-text h6 {
        font-size: 18px;
      }
    }

    .about-text p {
      font-size: 18px;
      max-width: 660px;
    }

    .about-text p mark {
      font-weight: 600;
      color: #20247b;
    }

    .about-list {
      padding-top: 10px;
    }

    .about-list .media {
      padding: 5px 0;
    }

    .about-list label {
      color: #20247b;
      font-weight: 600;
      width: 88px;
      margin: 0;
      position: relative;
    }

    .about-list label:after {
      content: "";
      position: absolute;
      top: 0;
      bottom: 0;
      right: 11px;
      width: 1px;
      height: 12px;
      background: #20247b;
      -moz-transform: rotate(15deg);
      -o-transform: rotate(15deg);
      -ms-transform: rotate(15deg);
      -webkit-transform: rotate(15deg);
      transform: rotate(15deg);
      margin: auto;
      opacity: 0.5;
    }

    .about-list p {
      margin: 0;
      font-size: 15px;
    }

    @media (max-width: 991px) {
      .about-avatar {
        margin-top: 30px;
      }
    }

    .about-section .counter {
      padding: 22px 20px;
      background: #ffffff;
      border-radius: 10px;
      box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
    }

    .about-section .counter .count-data {
      margin-top: 10px;
      margin-bottom: 10px;
    }

    .about-section .counter .count {
      font-weight: 700;
      color: #20247b;
      margin: 0 0 5px;
    }

    .about-section .counter p {
      font-weight: 600;
      margin: 0;
    }

    mark {
      background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
      background-size: 100% 3px;
      background-repeat: no-repeat;
      background-position: 0 bottom;
      background-color: transparent;
      padding: 0;
      color: currentColor;
    }

    .theme-color {
      color: #fc5356;
    }

    .dark-color {
      color: #20247b;
    }

    .about-section {
      margin-top: 40px;
      margin-bottom: 40px;
    }
  </style>

  <section class="about-section" id="about">
    <div class="container">
      <div class="row align-items-center flex-row-reverse">
        <div class="col-lg-7">
          <div class="about-text">
            <h3 class="dark-color">About Me</h3>
            <h6 class="theme-color lead">Çlirim Allaqi</h6>
            <p>I <mark>Quality assurance (QA)</mark> Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, unde
              ipsa fuga, ex culpa quam odio quaerat inventore modi incidunt animi repellendus dolorem, necessitatibus
              voluptas eaque adipisci temporibus id numquam!</p>
            <div class="row about-list">
              <div class="col-md-6">
                <div class="media">
                  <label>Birthday</label>
                  <p>4th april 2024</p>
                </div>
                <div class="media">
                  <label>Age</label>
                  <p>27 Yr</p>
                </div>
                <div class="media">
                  <label>Residence</label>
                  <p>Kosova</p>
                </div>
                <div class="media">
                  <label>Address</label>
                  <p>California, USA</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="media">
                  <label>E-mail</label>
                  <p>çlirim.allaqi@gmail.com</p>
                </div>
                <div class="media">
                  <label>Phone</label>
                  <p>820-885-3321</p>
                </div>
                <div class="media">
                  <label>linkedin</label>
                  <p>çlirim-allaqi</p>
                </div>
                <div class="media">
                  <label>Freelance</label>
                  <p>Available</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="about-avatar">
            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" title="" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ====== Footer Start ====== -->
  <footer class="ud-footer wow fadeInUp" data-wow-delay=".15s">
    <div class="shape shape-1">
      <img src="assets/images/footer/shape-1.svg" alt="shape" />
    </div>
    <div class="shape shape-2">
      <img src="assets/images/footer/shape-2.svg" alt="shape" />
    </div>
    <div class="shape shape-3">
      <img src="assets/images/footer/shape-3.svg" alt="shape" />
    </div>
    <div class="ud-footer-widgets">
      <div class="container">
        <div class="row">
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="ud-widget">
              <a href="index.html" class="ud-footer-logo">
                <img src="assets/images/logo/logo.svg" alt="logo" />
              </a>
              <p class="ud-widget-desc">
                We create digital experiences for brands and companies by
                using technology.
              </p>
              <ul class="ud-widget-socials">
                <li>
                  <a href="https://twitter.com/MusharofChy">
                    <i class="lni lni-facebook-filled"></i>
                  </a>
                </li>
                <li>
                  <a href="https://twitter.com/MusharofChy">
                    <i class="lni lni-twitter-filled"></i>
                  </a>
                </li>
                <li>
                  <a href="https://twitter.com/MusharofChy">
                    <i class="lni lni-instagram-filled"></i>
                  </a>
                </li>
                <li>
                  <a href="https://twitter.com/MusharofChy">
                    <i class="lni lni-linkedin-original"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
            <div class="ud-widget">
              <h5 class="ud-widget-title">About Us</h5>
              <ul class="ud-widget-links">
                <li>
                  <a href="javascript:void(0)">Home</a>
                </li>
                <li>
                  <a href="javascript:void(0)">Features</a>
                </li>
                <li>
                  <a href="javascript:void(0)">About</a>
                </li>
                <li>
                  <a href="javascript:void(0)">Testimonial</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6">
            <div class="ud-widget">
              <h5 class="ud-widget-title">Features</h5>
              <ul class="ud-widget-links">
                <li>
                  <a href="javascript:void(0)">How it works</a>
                </li>
                <li>
                  <a href="javascript:void(0)">Privacy policy</a>
                </li>
                <li>
                  <a href="javascript:void(0)">Terms of service</a>
                </li>
                <li>
                  <a href="javascript:void(0)">Refund policy</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6">
            <div class="ud-widget">
              <h5 class="ud-widget-title">Our Products</h5>
              <ul class="ud-widget-links">
                <li>
                  <a href="#" rel="nofollow noopner" target="_blank">
                    Employee Menagment Soulution
                  </a>
                </li>
                <li>
                  <a href="#" rel="nofollow noopner" target="_blank">
                    E-banking Soulution
                  </a>
                </li>
                <li>
                  <a href="#" rel="nofollow noopner" target="_blank">
                    Conference App
                  </a>
                </li>
                <li>
                  <a href="#" rel="nofollow noopner" target="_blank">
                    Plain Admin
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-md-8 col-sm-10">
            <div class="ud-widget">
              <h5 class="ud-widget-title">Partners</h5>
              <ul class="ud-widget-brands">
                <li>
                  <a href="#" rel="nofollow noopner" target="_blank">
                    <img src="assets/images/footer/brands/ayroui.svg" alt="ayroui" />
                  </a>
                </li>
                <li>
                  <a href="#" rel="nofollow noopner" target="_blank">
                    <img src="assets/images/footer/brands/graygrids.svg" alt="graygrids" />
                  </a>
                </li>
                <li>
                  <a href="#" rel="nofollow noopner" target="_blank">
                    <img src="assets/images/footer/brands/lineicons.svg" alt="lineicons" />
                  </a>
                </li>
                <li>
                  <a href="#" rel="nofollow noopner" target="_blank">
                    <img src="assets/images/footer/brands/sentry.svg" alt="lineicons" />
                  </a>
                </li>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="ud-footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <ul class="ud-footer-bottom-left">
              <li>
                <a href="javascript:void(0)">Privacy policy</a>
              </li>
              <li>
                <a href="javascript:void(0)">Support policy</a>
              </li>
              <li>
                <a href="Dokumentacioni.html">Dokumentacioni</a>
              </li>
              <li>
                <!--   <footer class="ud-footer wow fadeInUp" data-wow-delay=".15s">[\s\S]*?</footer> -->
                <a href="javascript:void(0)">Terms of service</a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <p class="ud-footer-bottom-right">
              Designed and Developed by <a href="#">NO ENTRY</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer> <!-- ====== Footer End ====== -->

  <!-- ====== Back To Top Start ====== -->
  <a href="javascript:void(0)" class="back-to-top">
    <i class="lni lni-chevron-up"> </i>
  </a>
  <!-- ====== Back To Top End ====== -->

  <!-- ====== All Javascript Files ====== -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/wow.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>
