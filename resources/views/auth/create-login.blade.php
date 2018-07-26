@extends('layouts.master')

@section('title')

        Login

@endsection('content')

@section('content')

        <form action="/login" method="POST">

            {{ csrf_field() }}

            
            @if(session('message'))
                <h4>{{session('message')}}</h4>
            @endif
            
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email" >
                @include("partials.error-message", ["fieldName" => "email"])
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" id="password" >
                @include("partials.error-message", ["fieldName" => "password"])
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
            
        </form>



@endsection