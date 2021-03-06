@extends('layout')

@section('content')
    <div class="jumbotron">
        <h1>Project Flyer</h1>
        <p>This is a template showcasing the optional theme stylesheet included in Bootstrap. Use it as a starting point
            to create something more unique by building on or modifying it.</p>
        @if (!Auth::guest())
            <a href="{{route('flyers.create')}}" class="btn btn-primary">Create a Flyer</a>
        @else
            <a href="{{route('register')}}" class="btn btn-primary">Signed Up</a>
        @endif
    </div>
@endsection