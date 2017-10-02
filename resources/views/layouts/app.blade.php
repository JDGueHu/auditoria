<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Calidad</title>

    <!-- STYLES -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Styles - dataTables -->
    <link href="{{ asset('plugins/dataTable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/dataTable/css/buttons.dataTables.min.css') }}" rel="stylesheet">

    <link href="{{ asset('plugins/jquery_confirm/css/jquery-confirm.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/chosen/chosen.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @yield('css') 

</head>
<body>
    <div id="app">

        @include('layouts.nav')
        <div class="container">        
            @include('flash::message')
            @yield('content')
        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('plugins/jquery/js/jquery-3.1.1.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>


    <script src="{{ asset('plugins/dataTable/js/jquery.dataTables.min.js') }}"></script>    
    <script src="{{ asset('plugins/dataTable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/dataTable/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('plugins/dataTable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/dataTable/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/dataTable/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/dataTable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/dataTable/js/buttons.print.min.js') }}"></script>

    <script src="{{ asset('plugins/jquery_confirm/js/jquery-confirm.min.js') }}"></script>
    <script> // Tooltips
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    @yield('js') 

</body>
</html>
