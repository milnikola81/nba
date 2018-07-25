@extends('layouts.master')

@section('title')
    Players
@endsection

@section('content')

<h3>{{$player->first_name}} {{$player->last_name}}</h3>

<p>{{$player->email}}</p>
<p><a href="/teams/{{$player->team->id}}">{{$player->team->name}}</a></p>

@endsection
