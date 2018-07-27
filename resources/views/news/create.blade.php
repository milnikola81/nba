@extends('layouts.master')

@section('title')
    Create news
@endsection


@section('content')

<h6 style="margin-top: 2rem; margin-bottom:2rem; color: gray"><em>You are posting as {{Auth::user()->name}}...</em></h6>

<form method="POST" action="/news">

    {{ csrf_field() }}

    <div class="form-group">
        <label for="title">Title</label>
        <input name="title" type="text" class="form-control" id="title">
    </div>
    @include('/partials/error-message', ['fieldName' => 'title'])

    <div class="form-group">
        <label for="content">Body</label>
        <textarea name="content" class="form-control" id="content" rows="10"></textarea>
    </div>
    @include('/partials/error-message', ['fieldName' => 'content'])

    @if(count($teams))
    <div class="form-group">
        <label for="teams[]">
            <strong>Teams</strong>
        </label>
        </br>
        @foreach ($teams as $team)
        <input type="checkbox" id="team" name="teams[]" value="{{ $team->id }}">
            {{ $team->name }}
        </input>
        @endforeach
    </div>

    @endif

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection