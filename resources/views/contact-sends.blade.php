<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Management | Blog Details</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/svg" />

    <!-- ===== All CSS files ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Data Table CSS -->
    <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
    <!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <link rel="stylesheet" href="assets/css/styles.css" />
    <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'> -->
    <style>
        .wrapper {
            margin-top: 5vh;
        }

        .dataTables_filter {
            float: right;
        }

        .table-hover>tbody>tr:hover {
            background-color: #ccffff;
        }

        @media only screen and (min-width: 768px) {
            .table {
                table-layout: fixed;
                max-width: 100% !important;
            }
        }

        thead {
            background: #ddd;
        }

        .table td:nth-child(2) {
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .highlight {
            background: #ffff99;
        }

        @media only screen and (max-width: 767px) {

            /* Force table to not be like tables anymore */
            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            thead tr,
            tfoot tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            td {
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50% !important;
            }

            td:before {
                /* Now like a table header */
                position: absolute;
                /* Top/left values mimic padding */
                top: 6px;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
            }

            .table td:nth-child(1) {
                background: #ccc;
                height: 100%;
                top: 0;
                left: 0;
                font-weight: bold;
            }

            /*
        Label the data
        */
            td:nth-of-type(1):before {
                content: "Name";
            }

            td:nth-of-type(2):before {
                content: "Position";
            }

            td:nth-of-type(3):before {
                content: "Office";
            }

            td:nth-of-type(4):before {
                content: "Age";
            }

            td:nth-of-type(5):before {
                content: "Start date";
            }

            td:nth-of-type(6):before {
                content: "Salary";
            }

            .dataTables_length {
                display: none;
            }
        }
    </style>
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

    <section class="contact-sends container mt-5 mb-5 table-responsive">
        <div id="tabelat" class="card p-2">
        <table id="example" class="table table-striped table-hover " style="width:100%">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Alpet Gexha</td>
                    <td>agexha@gmail.com</td>
                    <td>044 123 123</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet ipsa, sequi vitae id numquam
                        quas expedita qui consectetur dolor.</td>
                </tr>
                <tr>
                    <td>John Doe</td>
                    <td>johndoe@example.com</td>
                    <td>045 456 456</td>
                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique, repellendus!</td>
                </tr>
                <tr>
                    <td>Jane Smith</td>
                    <td>janesmith@example.com</td>
                    <td>046 789 789</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, perferendis?</td>
                </tr>
                <tr>
                    <td>Robert Brown</td>
                    <td>robertbrown@example.com</td>
                    <td>047 321 654</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, nihil.</td>
                </tr>
                <tr>
                    <td>Lisa White</td>
                    <td>lisawhite@example.com</td>
                    <td>048 987 654</td>
                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum, delectus.</td>
                </tr>
                <tr>
                    <td>Tom Davis</td>
                    <td>tomdavis@example.com</td>
                    <td>049 147 258</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, magnam?</td>
                </tr>
                <tr>
                    <td>Emily Clark</td>
                    <td>emilyclark@example.com</td>
                    <td>050 258 369</td>
                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat, ex.</td>
                </tr>
                <tr>
                    <td>Michael Scott</td>
                    <td>michaelscott@example.com</td>
                    <td>051 159 753</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis, voluptatibus.</td>
                </tr>
                <tr>
                    <td>Pam Beesly</td>
                    <td>pam.beesly@example.com</td>
                    <td>052 951 357</td>
                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consectetur, repellendus.</td>
                </tr>
                <tr>
                    <td>Dwight Schrute</td>
                    <td>dwightschrute@example.com</td>
                    <td>053 123 456</td>
                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam, nulla.</td>
                </tr>
                <tr>
                    <td>Jim Halpert</td>
                    <td>jimhalpert@example.com</td>
                    <td>054 654 321</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, dolores.</td>
                </tr>
                <tr>
                    <td>Stanley Hudson</td>
                    <td>stanleyhudson@example.com</td>
                    <td>055 987 654</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, exercitationem!</td>
                </tr>
                <tr>
                    <td>Kevin Malone</td>
                    <td>kevinmalone@example.com</td>
                    <td>056 753 159</td>
                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam, expedita!</td>
                </tr>
                <tr>
                    <td>Angela Martin</td>
                    <td>angelamartin@example.com</td>
                    <td>057 357 951</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, ad.</td>
                </tr>
                <tr>
                    <td>Oscar Martinez</td>
                    <td>oscarmartinez@example.com</td>
                    <td>058 951 753</td>
                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore, dolorum?</td>
                </tr>
                <tr>
                    <td>Andy Bernard</td>
                    <td>andybernard@example.com</td>
                    <td>059 147 258</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, rem!</td>
                </tr>
                <tr>
                    <td>Erin Hannon</td>
                    <td>erinhannon@example.com</td>
                    <td>060 258 369</td>
                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam, nostrum.</td>
                </tr>
                <tr>
                    <td>Kelly Kapoor</td>
                    <td>kellykapoor@example.com</td>
                    <td>061 159 753</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, deserunt.</td>
                </tr>
                <tr>
                    <td>Ryan Howard</td>
                    <td>ryanhoward@example.com</td>
                    <td>062 951 357</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat, dolore.</td>
                </tr>
                <tr>
                    <td>Creed Bratton</td>
                    <td>creedbratton@example.com</td>
                    <td>063 123 456</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, voluptas.</td>
                </tr>
                <tr>
                    <td>Meredith Palmer</td>
                    <td>meredithpalmer@example.com</td>
                    <td>064 654 321</td>
                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias, accusantium.</td>
                </tr>
                <tr>
                    <td>Toby Flenderson</td>
                    <td>tobyflenderson@example.com</td>
                    <td>065 987 654</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, quisquam.</td>
                </tr>
                <tr>
                    <td>Holly Flax</td>
                    <td>hollyflax@example.com</td>
                    <td>066 753 159</td>
                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptates, perspiciatis!</td>
                </tr>
                <tr>
                    <td>Jan Levinson</td>
                    <td>janlevinson@example.com</td>
                    <td>067 357 951</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, quasi.</td>
                </tr>
                <tr>
                    <td>Roy Anderson</td>
                    <td>royanderson@example.com</td>
                    <td>068 951 753</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, atque.</td>
                </tr>
                <tr>
                    <td>Charles Miner</td>
                    <td>charlesminer@example.com</td>
                    <td>069 147 258</td>
                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloribus, maiores!</td>
                </tr>
                <tr>
                    <td>Darryl Philbin</td>
                    <td>darrylphilbin@example.com</td>
                    <td>070 258 369</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, delectus!</td>
                </tr>
                <tr>
                    <td>Nellie Bertram</td>
                    <td>nelliebertram@example.com</td>
                    <td>071 159 753</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, sed!</td>
                </tr>
                <tr>
                    <td>Clark Green</td>
                    <td>clarkgreen@example.com</td>
                    <td>072 951 357</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, minima!</td>
                </tr>
                <tr>
                    <td>Pete Miller</td>
                    <td>petemiller@example.com</td>
                    <td>073 123 456</td>
                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus, sequi!</td>
                </tr>
                <tr>
                    <td>Jo Bennett</td>
                    <td>jobennett@example.com</td>
                    <td>074 654 321</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, accusamus?</td>
                </tr>
                <tr>
                    <td>David Wallace</td>
                    <td>davidwallace@example.com</td>
                    <td>075 987 654</td>
                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. A, ratione.</td>
                </tr>
                <tr>
                    <td>Gabe Lewis</td>
                    <td>gabelewis@example.com</td>
                    <td>076 753 159</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, deleniti!</td>
                </tr>
                <tr>
                    <td>Karen Filippelli</td>
                    <td>karenfilippelli@example.com</td>
                    <td>077 357 951</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, maxime!</td>
                </tr>
                <tr>
                    <td>Hank Tate</td>
                    <td>hanktate@example.com</td>
                    <td>078 951 753</td>
                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis, voluptatem!</td>
                </tr>
                <tr>
                    <td>Joan Davis</td>
                    <td>joandavis@example.com</td>
                    <td>079 147 258</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, eos!</td>
                </tr>
                <tr>
                    <td>Steve Hunter</td>
                    <td>stevehunter@example.com</td>
                    <td>080 258 369</td>
                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium, atque!</td>
                </tr>
            </tbody>
        </table>
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
    <script src='https://code.jquery.com/jquery-3.7.0.js'></script>
    <!-- Data Table JS -->
    <script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
    <script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>
    <!-- Script JS -->
    <script src="./js/script.js"></script>

    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                //disable sorting on last column
                "columnDefs": [{
                    "orderable": false,
                    "targets": 1
                }],
                language: {
                    //customize pagination prev and next buttons: use arrows instead of words
                    'paginate': {
                        'previous': '<span class="fa fa-chevron-left"></span>',
                        'next': '<span class="fa fa-chevron-right"></span>'
                    },
                    //customize number of elements to be displayed
                    "lengthMenu": 'Display <select class="form-control input-sm">' +
                        '<option value="10">10</option>' +
                        '<option value="20">20</option>' +
                        '<option value="30">30</option>' +
                        '<option value="40">40</option>' +
                        '<option value="50">50</option>' +
                        '<option value="-1">All</option>' +
                        '</select> results'
                }
            })
        });
    </script>
</body>

</html>