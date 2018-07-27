@extends('layouts.master')

@section('title')
    Teams
@endsection

@section('content')

<h3><strong>{{$team->name}}</strong></h3>

<p>Email: {{$team->email}}</p>
<p>Address: {{$team->address}}</p>
<p>Hometown: {{$team->city}}</p>

<ul>
    <strong>Players</strong>
    @foreach($team->players as $player)

    <li><a href="/players/{{$player->id}}">{{ $player->first_name }} {{ $player->last_name }}</a></li>
    @endforeach
</ul>

<form method="POST" action="/teams/{{$team->id}}" style="margin-top: 1rem">

    {{ csrf_field() }}

    <div class="form-group">
        <label for="content">Create new comment:</label>
        <textarea name="content" class="form-control" id="content" rows="8"></textarea>
    </div>
    @include('/partials/error-message', ['fieldName' => 'content'])

    <button type="submit" class="btn btn-primary">Submit</button>

</form>

<h5 style="margin-top: 2rem">Comments:</h5>
@foreach($team->comments as $comment)
<div class="comment" style="background: white; padding:0.5rem; margin-top: 0.5rem">
    <p>{{$comment->content}}</p>
    <p style="color: gray">Created by: <strong>{{$comment->user->name}}</strong> on {{$comment->created_at}}</p>
</div>
@endforeach


@endsection