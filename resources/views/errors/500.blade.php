@extends('errors::layout')

@section('title', 'Error')

@section('message')
<p>Whoops, looks like something went wrong.</p>

@if(Auth::user())
<div><a href="{{route('login')}}">Back to Dashboard</a></div>
@else
<div><a href="{{route('login')}}">Back to Login</a></div>
@endif
@endsection
