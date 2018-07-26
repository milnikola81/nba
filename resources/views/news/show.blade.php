@extends('layouts.master')

@section('title')
    Single news
@endsection

@section('content')
    <div class="blog-post">
        <h2 class="blog-post-title">{{ $news->title }}</h2>
        <p class="blog-post-meta">By <a href="/users/{{$news->user->id}}">{{ $news->user->name }}</a> on {{ $news->created_at }}</p>

        <p>{{ $news->content }}</p>

    </div><!-- /.blog-post -->

@endsection