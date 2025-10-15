@extends('layouts.main')
 @section('content')
 <div class="container">
 <div class="card">
  <div class="card-header">
    Are you sure you want to delete this data?
  </div>
  <div class="card-body">
    <h5>Name: {{$user->name}}</h5>
    <form method="post" 
action="{{route('destroy_user')}}">
      @csrf
      <input name="id" type="hidden" 
value="{{$user->id}}">
      <a href="{{route('home')}}" 
class="btn btn-secondary">Cancel</a>
      <button name="submit" type="submit" 
class="btn btn-danger">Delete</button>
    </form>
  </div>
 </div>
 </div>
 @endsection
