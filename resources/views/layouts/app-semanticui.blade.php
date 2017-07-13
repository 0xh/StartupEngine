<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SitePress') }}</title>

    <!-- Semantic UI -->
    @include('components.semanticui')

    <!-- CSS Custom -->
    <link rel="stylesheet" type='text/css' media='all' href="/css/custom.css">

    <!-- Charts -->
    {!! Charts::assets() !!}

    <style>
        #charts svg {
            overflow:visible;
        }
        .module {
            box-shadow:0px 10px 30px rgba(0,0,0,0.05);
            border:1px solid #ddd !important;
            padding:0px 25px 25px 25px;
            border-radius:4px !important;
        }
        .module .header {
            font-size:120%;
            padding:15px;
        }
        @media only screen and (max-width: 1024px) and (min-width: 768px) {
            nav li a .hiddenOnTablet {
                display:none;
            }
        }
        @media only screen and (max-width: 1024px) and (min-width: 768px) {
            .visibleOnTablet {
                display: block !important;
            }
        }

        .ui.button {
            margin-bottom:5px;
            line-height:150%;
        }
    </style>
</head>
<body>
    @include('components.nav-admin')
    <div class="ui container">
        <div class="ui grid sixteen wide" style="padding-top:15px;">
            @yield('content')
            <!-- Scripts -->
            <script src="{{ asset('js/app.js') }}"></script>
        </div>
    </div>
</body>
</html>