<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'TripGo') }}</title>

        <!--<< Favcion >>-->
        <link rel="shortcut icon" href="assets/img/favicon.svg" />
        <!--<< Bootstrap min.css >>-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <!--<< Animate.css >>-->
        <link rel="stylesheet" href="assets/css/animate.css" />
        <!--<< MeanMenu.css >>-->
        <link rel="stylesheet" href="assets/css/meanmenu.css" />
        <!--<< Swiper Bundle.css >>-->
        <link rel="stylesheet" href="assets/css/swiper-bundle.min.css" />
        <!--<< Nice Select.css >>-->
        <link rel="stylesheet" href="assets/css/nice-select.css" />
        <!--<< Color.css >>-->
        <link rel="stylesheet" href="assets/css/color.css" />
        <!--<< Main.css >>-->
        <link rel="stylesheet" href="assets/css/main.css" />


        <!--<< Styling Dashboard >>-->
    <!-- Jsvectormap plugin css -->
        <link
        href="assets/libs/jsvectormap/css/jsvectormap.min.css"
        rel="stylesheet"
        type="text/css"
        />

    <!-- Icons css  (Mandatory in All Pages) -->
        <link
        href="assets/css/icons.min.css"
        rel="stylesheet"
        type="text/css"
        />

    <!-- App css  (Mandatory in All Pages) -->
        <link
        href="assets/css/app.min.css"
        rel="stylesheet"
        type="text/css"
        />

        <!-- Fonts -->
      <link rel="preload" href="/fonts/helvetica-neue-5/HelveticaNeueRoman.otf" as="font" type="font/otf" crossorigin>
      <link rel="preload" href="/fonts/montserrat-alternates/MontserratAlternates-Regular.ttf" as="font" type="font/ttf" crossorigin>
      <link rel="preload" href="/fonts/nunito/Nunito-Regular.ttf" as="font" type="font/ttf" crossorigin>
          <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">



      {{-- leaflet --}}
       <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-Nunito bg-white">
        @inertia

        <!--<< All JS Plugins >>-->
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <!--<< Viewport Js >>-->
    <script src="assets/js/viewport.jquery.js"></script>
    <!--<< Bootstrap Js >>-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--<< nice-selec Js >>-->
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <!--<< Waypoints Js >>-->
    <script src="assets/js/jquery.waypoints.js"></script>
    <!--<< Counterup Js >>-->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!--<< Swiper Slider Js >>-->
    <script src="assets/js/swiper-bundle.min.js"></script>
    <!--<< MeanMenu Js >>-->
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <!--<< Datepicker Js >>-->
    <script src="assets/js/bootstrap-datepicker.js"></script>
    <!--<< Magnific Popup Js >>-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!--<< Wow Animation Js >>-->
    <script src="assets/js/wow.min.js"></script>
    <!--<< Main.js >>-->
    <script src="assets/js/main.js"></script>



    <!--<< Dashboard Js >>-->
  <!-- Plugin Js (Mandatory in All Pages) -->
    {{-- <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/preline/preline.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/iconify-icon/iconify-icon.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script> --}}

    <!-- App Js (Mandatory in All Pages) -->
    {{-- <script src="assets/js/app.js"></script> --}}

    {{-- <!-- Apexcharts js -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script> --}}

    <!-- Vector Map Js -->
    {{-- <script src="assets/libs/jsvectormap/js/jsvectormap.min.js"></script> --}}

    <!-- Dashboard Project Page js -->
    {{-- <script src="assets/js/pages/dashboard.js"></script> --}}
  </body>

    </body>
</html>
