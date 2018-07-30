@extends('layouts.master')

@section('title')
    Single news
@endsection

<script type="text/javascript">
    var data = "{{ $news->toJson() }}"; //converts php object to json
    console.log(data);
    var obj = JSON.parse(data.replace(/&quot;/g,'"')); // replaces this string with actual double quotes for parsing
    console.log(typeof obj);
    console.log(obj);
</script>

@section('content')
    <div class="blog-post">
        <h2 class="blog-post-title">{{ $news->title }}</h2>
        <p class="blog-post-meta">By <a href="/users/{{$news->user->id}}">{{ $news->user->name }}</a> on {{ $news->created_at }}</p>
        @if(!empty($news->teams[0]))
        <ul>
            @foreach($news->teams as $team)
            <li><a href="/teams/{{$team->id}}">{{ $team->name }}</a></li>
            @endforeach
        </ul>
        @endif
        <p>{{ $news->content }}</p>

    </div><!-- /.blog-post -->

@endsection