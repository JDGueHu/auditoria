<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Calidad</title>

    <!-- Styles -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/dataTable/css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/jquery_confirm/css/jquery-confirm.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


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
    <script src="{{ asset('plugins/dataTable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/dataTable/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/jquery_confirm/js/jquery-confirm.min.js') }}"></script>
    <script>
$(document).ready(function(){
  $('.dropdown a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
    @yield('js') 

</body>
</html>
