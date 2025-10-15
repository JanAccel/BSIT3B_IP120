 @extends('layouts.main')
 @section('content')
 <div class="container mt-5">
 <h1>UPDATE USER</h1> 
<form method="post" action="{{route('update_user')}}">
 @csrf
 <input name="id" type="hidden" value="{{$user->id}}">
 <div class="form-group row">
  <label for="name" class="col-4 
col-form-label">Name</label> 
  <div class="col-8">
   <input id="name" name="name" placeholder="Name" 
type="text" required="required" class="form-control" 
value="{{$user->name}}">
  </div>
 </div>
 <div class="form-group row">
  <label for="email" class="col-4 
col-form-label">Email</label> 
  <div class="col-8">
   <input id="email" name="email" placeholder="Email" 
type="text" class="form-control" required="required" value="
 {{$user->email}}">
  </div>
 </div>
 <div class="form-group row">
  <label for="role" class="col-4 
col-form-label">Role</label> 
  <div class="col-8">
   <select id="role" name="role" 
class="form-select" required="required">
    <option value="student" 
{{ $user->role=="student" ? "selected":"" }}>Student</option>
    <option value="faculty" 
{{ $user->role=="faculty" ? "selected":"" }}>Faculty</option>
   </select>
  </div>
 </div> 
 <div class="form-group row">
  <div class="offset-4 col-8">
    <a href="{{route('home')}}" 
class="btn btn-secondary">Cancel</a>
   <button name="submit" type="submit" 
class="btn btn-primary">Submit</button>
  </div>
 </div>
 </form>
 </div>
 @endsection
