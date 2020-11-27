@extends('layouts.layout1')

@section('content')

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Register</h6>
    </div>
    <div class="card-body">
      <x-alert/>
      <div class="table-responsive">
        <form method="POST" action="{{route('users.store')}}">         
            @csrf
          <div class="form-group">
            <label for="name"> Name:</label>
            <input type="text" class="form-control" name="name" >
            <br>
            <label for="email"> Email:</label>
            <input type="text" class="form-control" name="email" >
            <br>
            <label for="password"> Password:</label>
            <input type="text" class="form-control" name="password">
            <br>
            <label for="confirmPassword"> Confirm Password:</label>
            <input type="text" class="form-control" name="confirmPassword">
          </div>        
          <div class="form-group">
              <input type="submit" class="form-control btn btn-primary" value="Register" >
          </div>
        
        </form>
      </div>
    </div>
  </div>

@endsection