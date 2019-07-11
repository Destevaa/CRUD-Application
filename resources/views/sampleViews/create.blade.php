@extends('master')

@section('content')
<div class="row">
 <div class="col-md-12">
  <br />
  <h3 aling="center">Registration</h3>
  <br />
  @if(count($errors) > 0)
  <div class="alert alert-danger">
   <ul>
   @foreach($errors->all() as $error)
    <li>{{$error}}</li>
   @endforeach
   </ul>
  </div>
  @endif
  @if(\Session::has('success'))
  <div class="alert alert-success">
   <p>{{ \Session::get('success') }}</p>
  </div>
  @endif

  <form method="post" action="{{url('sampleViews')}}">
   {{csrf_field()}}
   <div class="form-group">
    <input type="text" name="first_name" placeholder="Enter First Name" />
   </div>
   <div class="form-group">
    <input type="text" name="last_name" placeholder="Enter Last Name" />
   </div>
   <div class="form-group">
    <input type="text" name="email" placeholder="Enter Email" />
   </div>
   <div class="form-group">
    <input type="text" name="mobile_number" placeholder="Enter Mobile Number" />
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>
@endsection