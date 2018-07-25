@extends('layouts.master')

@section('title')
    Teams
@endsection

@section('content')

<h3>{{$team->name}}</h3>

<p>Email: {{$team->email}}</p>
<p>Adress: {{$team->address}}</p>
<p>Hometown: {{$team->city}}</p>

<ul>
    Players
    @foreach($team->players as $player)

    <li><a href="/players/{{$player->id}}">{{ $player->first_name }} {{ $player->last_name }}</a></li>
    @endforeach
</ul>


@endsection