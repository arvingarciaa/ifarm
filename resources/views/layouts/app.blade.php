<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'iFarm') }}</title>

    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet"> -->

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/storage/page_images/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/storage/page_images/favicon-16x16.png" sizes="16x16" />


    <!-- Scripts
    <script src="https://kit.fontawesome.com/e0784f1094.js"></script>
    -->
    
    <script src="{{ asset('js/lightbox.js') }}" defer></script>
    <script async charset="utf-8" src="//cdn.embedly.com/widgets/platform.js"></script>
    
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/dropzone.js') }}"></script>

    <!-- no-ui-slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.css" integrity="sha512-qveKnGrvOChbSzAdtSs8p69eoLegyh+1hwOMbmpCViIwj7rn4oJjdmMvWOuyQlTOZgTlZA0N2PXA7iA8/2TUYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.js" integrity="sha512-ZKqmaRVpwWCw7S7mEjC89jDdWRD/oMS0mlfH96mO0u3wrPYoN+lXmqvyptH4P9mY6zkoPTSy5U2SwKVXRY5tYQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- x-editable -->
    <link href="{{ asset('css/bootstrap-editable.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap-editable.js') }}"></script>

    <script src="{{ asset('js/popper.min.js') }}"></script>

    <!-- chartjs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- bootstrap toggle -->
    <link href="{{ asset('css/bootstrap4-toggle.min.css') }}" rel="stylesheet">  
    <script src="{{ asset('js/bootstrap4-toggle.min.js') }}"></script>

    <!--Select2 -->
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    
    <!-- bootstrap select CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">

    <!-- bootstrap select JavaScript -->
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

    <!-- Datatables -->
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script> 

    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>

    <!-- Bootstrap toggles -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


    @yield('top_scripts')


</head>
<body style="background-color:#E8E8E8">
    <div id="app">
        <section class="sticky-top">
            @extends('layouts.navbar')
        </section>
        <div class="mt-5 pt-4">
            @yield('content')
        </div>
    </div>
    <style>
        @media only screen and (max-width: 600px) {
            .hide-when-mobile {
                display:none !important
            }
        }
    </style>
</body>
    @yield('scripts')
</html>
