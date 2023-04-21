<!DOCTYPE html>
<html lang="en">


<!-- datatables.html  21 Nov 2019 03:55:21 GMT -->
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('assets/img/favicon.ico') }}"/>
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>
<div class="loader"></div>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar sticky">
            @include('layouts.admin.navbar')
        </nav>
        <div class="main-sidebar sidebar-style-2">
            @include('layouts.admin.sidebar')
        </div>
        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                @include('admin.partials.flash-error')
                @include('admin.partials.flash-success')
                @yield('content-admin')

            </section>
            <div class="settingSidebar">
                @include('layouts.admin.config')
            </div>
        </div>
        <footer class="main-footer">
            @include('layouts.admin.footer')
        </footer>
    </div>
</div>
<!-- General JS Scripts -->
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<!-- JS Libraies -->
<script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/datatables.js') }}"></script>
<!-- Template JS File -->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<!-- Custom JS File -->
<script src="{{ asset('assets/js/custom.js') }}"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
@yield('scripts')
</body>
</html>
