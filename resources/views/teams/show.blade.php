@extends('layouts.master')

@section('title')
    Teams
@endsection

@section('content')

<h3>{{$team->name}}</h3>

<p>{{$team->email}}</p>
<p>{{$team->address}}</p>
<p>{{$team->city}}</p>

<ul>
    Players
    @foreach($team->players as $player)

    <li><a href="/players/{{$player->id}}">{{ $player->first_name }} {{ $player->last_name }}</a></li>
    @endforeach
</ul>


@endsection