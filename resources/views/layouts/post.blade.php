<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $post->title }} - {{ config('app.name', 'StartupEngine') }}</title>

    <?php $template = new \App\Template(); ?>
    {!! $template->raw('/templates/global/header.blade.php')  !!}

    <!-- Styles -->
    {!! $template->raw('/templates/global/css.blade.php')  !!}

    @yield('styles')

    <!-- FAVICONS -->
    <?php if( setting('site.favicon') !== null) { ?>
    <link rel="icon" sizes="180x180" href="{{ \Storage::disk('public')->url( setting('site.favicon') ) }}">
    <?php }  ?>

    <!-- Meta -->
    @yield('meta')
</head>
    @include('theme.templates.global.header')
    @if(View::exists('theme.templates.post.header'))
        @include('theme.templates.post.header')
    @endif
    @yield('content')
    @include('theme.templates.global.menu')
    @include('theme.templates.global.scripts')
    @if(View::exists('theme.templates.post.footer'))
        @include('theme.templates.post.footer')
    @endif
    @include('theme.templates.global.footer')
</html>