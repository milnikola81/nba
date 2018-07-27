@extends('layouts.master')

@section('title')
    Teams
@endsection

@section('content')

<h2 style="text-align: center; margin-bottom: 2rem;"><strong>Teams</strong></h2>

<ul>
@foreach($teams as $team)
    <li><a href="teams/{{$team->id}}">{{ $team->name }}</li>
@endforeach
</ul>

@endsection