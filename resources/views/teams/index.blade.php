@extends('layouts.master')

@section('title')
    Teams
@endsection

@section('content')

<h3  style="margin-top: 2rem">Timovi</h3>

<ul>
@foreach($teams as $team)
    <li><a href="teams/{{$team->id}}">{{ $team->name }}</li>
@endforeach
</ul>

@endsection