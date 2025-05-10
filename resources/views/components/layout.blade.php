<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Employee Management' }}</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/svg" />

    <!-- ===== All CSS files ===== -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lineicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />

    {{ $styles ?? '' }}
</head>

<body>
    <!-- ====== Header Start ====== -->
    <x-navigation />
    <!-- ====== Header End ====== -->

    <!-- Main Content -->
    {{ $slot }}

    <!-- ====== Footer Start ====== -->
    <x-footer />
    <!-- ====== Back To Top Start ====== -->
    <a href="javascript:void(0)" class="back-to-top">
        <i class="lni lni-chevron-up"> </i>
    </a>
    <!-- ====== Back To Top End ====== -->

    <!-- ====== All Javascript Files ====== -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    {{ $scripts ?? '' }}
</body>

</html>
