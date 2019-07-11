@extends('master')

@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="left">
   <a href="{{route('sampleViews.create')}}" class="btn btn-primary">Add Users</a>
   <br />
   <br />
  </div>
  <table class="table table-hover">
   <tr>
    <th>User ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Mobile Number</th>
    <th></th>
    <th></th>
   </tr>
   @foreach($users as $row)
   <tr>
   <td scope >{{$row['id']}}</td>
    <td>{{$row['first_name']}}</td>
    <td>{{$row['last_name']}}</td>
    <td>{{$row['email']}}</td>
    <td>{{$row['mobile_number']}}</td>
    <td><a href="{{action('SampleController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
    <td>
    <form method="post" class="delete_form" action="{{action('SampleController@destroy', $row['id'])}}">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-danger">X</button>
     </form>
    
    </td>
   </tr>
   @endforeach
  </table>
 </div>
</div>
<script>
$(document).ready(function(){
 $('.delete_form').on('submit', function(){
  if(confirm("Are you sure you want to remove this user?"))
  {
   return true;
  }
  else
  {
   return false;
  }
 });
});
</script>

@endsection