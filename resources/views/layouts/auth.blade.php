<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>{{ $title }}</title>
    <!-- Favicon -->
    <link rel="icon" href="/assetsdashboard/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="/assetsdashboard/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="/assetsdashboard/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="/assetsdashboard/css/argon.css" type="text/css">
    {{-- Icon Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    {!! ReCaptcha::htmlScriptTagJsApi() !!}
</head>

<body class="bg-default">
    @yield('auth')
    @include('partials.footerauth')
</body>
<!-- Argon Scripts -->
<!-- Core -->
<script src="/assetsdashboard/vendor/jquery/dist/jquery.min.js"></script>
<script src="/assetsdashboard/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="/assetsdashboard/vendor/js-cookie/js.cookie.js"></script>
<script src="/assetsdashboard/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="/assetsdashboard/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Argon JS -->
<script src="/assetsdashboard/js/argon.js?v=1.2.0"></script>

</html>
