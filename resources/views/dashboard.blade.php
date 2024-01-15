@extends('layouts.app')
  
@section('title', 'Logout')
  
@section('contents')
  <div class="row">
    <h1>Are you Sure to Logout?</h1>
  </div>
  <a class="btn btn-warning" href="{{ route('logout') }}">Yes</a>
@endsection