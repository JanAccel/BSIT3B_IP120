 @extends('layouts.main')
 @section('content')
 <div class="container">
  <table class="table table-striped">
    <thead>
      <th>Subject</th>
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
        <td>
          <a class="btn btn-primary" href="{{ route('assign_subject', ['user_id' => $id, 'subject_id' => $sub->id])}}">ADD</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
 </div>
 @endsection
