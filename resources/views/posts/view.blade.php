@extends('layouts.post')

@section('title')
    <?php echo $post->title; ?>
@endsection

@section('meta')
<meta name="description" content="<?php echo $post->meta_description; ?>">
<!-- SOCIAL CARDS (ADD YOUR INFO) -->

<!-- FACEBOOK -->
<meta property="og:url" content="{{ \Request::url() }}"> <!-- YOUR URL -->
<meta property="og:type" content="article">
<meta property="og:title" content="<?php echo $post->title; ?>"> <!-- EDIT -->
<meta property="og:description" content="<?php echo $post->meta_description; ?>"> <!-- EDIT -->
<meta property="og:updated_time" content="{{ \Carbon\Carbon::now()->toFormattedDateString() }}"> <!-- EDIT -->
<meta property="og:image" content="<?php if($post->image() !== null) { echo $post->image(); } ?>"> <!-- EDIT -->

<!-- TWITTER -->
<meta name="twitter:card" content="<?php if($post->image() !== null) { echo $post->image(); } ?>">
<meta name="twitter:site" content="@webslides"> <!-- EDIT -->
<meta name="twitter:creator" content="{{ setting('site.twitter_account') }}"> <!-- EDIT -->
<meta name="twitter:title" content="<?php echo $post->title; ?>"> <!-- EDIT -->
<meta name="twitter:description" content="<?php echo $post->meta_description; ?>"> <!-- EDIT -->
<meta name="twitter:image" content="<?php if($post->image() !== null) { echo $post->image(); } ?>"> <!-- EDIT -->
@endsection

@section('styles')
    @if(View::exists('theme.templates.post.css'))
        @include('theme.templates.post.css')
    @endif
@endsection

@section('content')
    <?php if($post->bodyHtml() !== null) { ?>
        <div style="margin-top:25px">{!! $post->bodyHtml() !!}</div>
    <?php } ?>
    @if($post->comments_enabled)
        @if(View::exists('theme.global.elements.comments'))
            @include('theme.global.elements.comments')
        @endif
    @endif
    @if(View::exists('theme.templates.post.scripts'))
        @include('theme.templates.post.scripts')
    @endif
@endsection