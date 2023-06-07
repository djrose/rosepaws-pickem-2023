@extends('layouts.master')

@section('body-content')

    <h1>Club: {{ $club->id }}</h1>

    <p><a href="{{ url('/clubs', $club->id) }}">Team: {{ $club->team }}, Initials: {{ $club->initials }}, City: {{ $club->city }}</a></p>

@endsection
