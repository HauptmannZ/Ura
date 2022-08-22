<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>{{ $title }}</title>
    <!-- Favicon -->
    <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="/assetsdashboard/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="/assetsdashboard/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="/assetsdashboard/css/argon.css?v=1.2.0" type="text/css">
    {{-- trix Editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">

    <link rel="stylesheet" href="/datePicker/bootstrap-datepicker.min.css" type="text/css">
    <script type="text/javascript" src="/js/trix.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>

<body>
    @include('dashboard.layouts.sidebardashboard')
    <!-- Main content -->
    <div class="main-content" id="panel">
        @include('dashboard.layouts.navbardashboard')
        <!-- Header -->
        <div class="header bg-primary pb-6">
            @yield('dashboard')
            <!-- Footer -->
            <footer class="footer pt-6">
                @include('dashboard.layouts.footerdashboard')
            </footer>
        </div>
    </div>
</body>
<script src="/assetsdashboard/vendor/jquery/dist/jquery.min.js"></script>
<!-- Argon Scripts -->
<!-- Core -->
<script type="text/javascript">
    $(function() {
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });
</script>
<script type="text/javascript" src="/datePicker/bootstrap-datepicker.min.js"></script>
<script src="/assetsdashboard/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="/assetsdashboard/vendor/js-cookie/js.cookie.js"></script>
<script src="/assetsdashboard/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="/assetsdashboard/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script src="/assetsdashboard/vendor/chart.js/dist/Chart.min.js"></script>
<script src="/assetsdashboard/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="/assetsdashboard/js/argon.js?v=1.2.0"></script>
{{-- Font Awesome --}}
<link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
<link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
<link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">

</html>
