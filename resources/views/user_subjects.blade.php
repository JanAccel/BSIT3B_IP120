 @extends('layouts.main')
 @section('content')
 <div class="container">
  <a class="btn btn-primary" 
href="{{route('add_user_subject',['id'=>$id])}}">
 Add Subjects
 </a>
  <table class="table table-striped">
    <thead>
      <th>Subjects</th>
      <th>Day</th>
      <th>Time</th>
      <th>Room</th>
    </thead>
    <tbody>
    @foreach($subjects as $sub)
      <tr>
        <td>{{$sub->name}}</td>
        <td>{{$sub->day}}</td>
        <td>{{$sub->time}}</td>
        <td>{{$sub->room}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
 </div>
 @endsection
