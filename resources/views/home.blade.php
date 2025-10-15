@extends('layouts.main')
 @section('content')
 <div class="container">
  <table class="table table-striped">
    <thead>
      <th>Arlyn Narito</th>
      <th>Email</th>
      <th>Role</th>
      <th>Action</th>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->role}}</td>
        <td>
          <a class="btn btn-warning"  href="{{route('edit_user',['id'=>$user->id])}}">Update</a>
          <a class="btn btn-danger" href="{{route('delete_user',['id'=>$user->id])}}">Delete</a>
          <a class="btn btn-primary" href="{{route('user_subjects',['id'=>$user->id])}}">Subjects</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
 </div>
 @endsection
