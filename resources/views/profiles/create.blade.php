@extends('layouts.layout1')

@section('content')

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Create User</h6>
    </div>
    <div class="card-body">
      <x-alert/>
      <div class="table-responsive">



        <form method="POST" action="{{route('profiles.storeUser',$user->id)}}" enctype="multipart/form-data">         
            @csrf

          <div class="form-group">
            <label for="full_name"> Full Name:</label>
            <input type="text" class="form-control" name="full_name" >
            <br>
            <label for="address"> Address:</label>
            <input type="text" class="form-control" name="address" >
            <br>
            <label for="avatar"> Avatar:</label>
            <input type="file" class="form-control" name="avatar">
            <label for="birthday"> Birthday:</label>
            <input type="date" class="form-control" name="birthday">
          </div>        
          <div class="form-group">
              <input type="submit" class="form-control btn btn-primary" name="Create" value="Create">
          </div>
        
        </form>
      </div>
    </div>
  </div>

@endsection