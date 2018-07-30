@extends('layouts.master')

@section('title')
    News
@endsection

@section('content')

<h2 style="text-align: center; margin-bottom: 2rem;"><strong>News</strong></h2>

@if(session('message'))
    <h6 style="margin-top: 2rem; margin-bottom:2rem; color: gray"><em>{{session('message')}}</em></h6>
@endif

@foreach($news as $article)
    <div class="blog-post" style="margin-bottom: 1rem">
        <h2 class="blog-post-title"><a href="/news/{{$article->id}}">{{ $article->title }}</a></h2>
        <p class="blog-post-meta">By <a href="/users/{{$article->user->id}}">{{ $article->user->name }}</a> on {{ $article->created_at }}</p>

        <p>{{ $article->content }}</p>
        
        @if(auth()->check())
            @if (auth()->user()->id === $article->user->id) <!--ako je ulogovani korisnik autor vesti, prikazi dugme za brisanje te vesti-->
            <a class="btn btn-primary pull-right" href="/news/delete/{{$article->id}}">
                Delete news
            </a>
            @endif
        @endif

    </div><!-- /.blog-post -->
@endforeach

<nav class="blog-pagination">
    <a class="btn btn-outline-{{ $news->currentPage() == 1 
        ? 'secondary disabled'
        : 'primary'
        }}"
    href=" {{ $news->previousPageUrl() }}">
        Previous
    </a>

    <a class="btn btn-{{ $news->hasMorePages()
        ? 'primary'
        : 'secondary-disabled'
        }}"
    href=" {{ $news->nextPageUrl() }}">
        Next
    </a>
    Page {{ $news->currentPage() }} of {{ $news->lastPage()}}
</nav>

@endsection