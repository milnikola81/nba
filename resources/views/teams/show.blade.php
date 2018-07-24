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

    <li>{{ $player->first_name }} {{ $player->last_name }} </li>
    @endforeach
</ul>


@endsection