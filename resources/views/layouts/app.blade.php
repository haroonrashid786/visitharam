<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8"/>

    <title> @yield('title') | Haram</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/img/logo.svg') }}">

    @include('layouts.header.head-css')
    <style>
    .blink {
  animation: blink 1s infinite;
}
    @keyframes blink {
        0% {
        transform: scale(1);
        opacity: 0.5;
    }
    50% {
        transform: scale(1.2);
        opacity: 1;

    }
    100% {
        transform: scale(1);
        opacity: 0.5;
    }
}
</style>

</head>


{{--    @auth--}}
<body data-sidebar="dark" data-layout="vertical">
{{--        @else--}}
{{--            <body class="sidebar-enable vertical-collpsed">--}}
{{--            @endauth--}}
@show
<!-- Begin page -->
<div id="layout-wrapper">
{{--    @auth--}}
    @include('layouts.topbar')

        {{--                    @include('layouts.sidebar')--}}
{{--    @endauth--}}
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        @include('layouts.footer')
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
{{--@include('layouts.right-sidebar')--}}
<!-- /Right-bar -->

<!-- JAVASCRIPT -->
@include('layouts.vendor-scripts')
</body>

</html>
