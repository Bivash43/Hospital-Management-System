@extends('layouts.guest');
@section('content')
<a href="{{ route('dashboard') }}">Dashboard</a>
<a href="{{ route('logout') }}">Log out</a>
@endsection