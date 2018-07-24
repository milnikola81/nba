@extends('layouts.master')

@section('title')
    Teams
@endsection

@section('content')

<ul>
@foreach($teams as $team)
    <li><a href="teams/{{$team->id}}">{{ $team->name }}</li>
@endforeach
</ul>

@endsection