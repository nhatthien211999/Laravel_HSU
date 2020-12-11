@extends('layouts.layout1')

@section('content')

  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3>{{$user->name}}</h3>
      <h6 class="m-0 font-weight-bold text-primary">Create Cart</h6>
    </div>
    <div class="card-body">
      <x-alert/>
 
      <div class="table-responsive">

      <form method="POST" action="{{route('carts.storeCart',$user->id)}}" enctype="multipart/form-data">
        
            @csrf

          <div class="form-group">
            <label for="body"> Body:</label>
            <input type="text" class="form-control" name="body" >
            <br>
          </div>        
          <div class="form-group">
              <input type="submit" class="form-control btn btn-primary" name="Create" value="Create">
          </div>
        
        </form>
      </div>
    </div>
  </div>

@endsection