@extends('layouts.layout1')

@section('content')

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Create Tag</h6>
    </div>
    <div class="card-body">
      <x-alert/>
 
      <div class="table-responsive">

        <form method="POST" action="{{route('categories.storeTag',$category->id)}}" enctype="multipart/form-data">
        
            @csrf

          <div class="form-group">
            <label for="tag"> Tag:</label>
            <input type="text" class="form-control" name="tag" >
            <br>
            <label for="image"> Image:</label>
            <input type="file" class="form-control" name="image" >
            <br>
            <label for="price"> Price:</label>
            <input type="number" class="form-control" name="price" >
            <br>
            <label for="quatity"> Quatity:</label>
            <input type="number" class="form-control" name="quatity">
            <br>
            <label for="decription"> Description:</label>
            <input type="text" class="form-control" name="description">
          </div>        
          <div class="form-group">
              <input type="submit" class="form-control btn btn-primary" name="Create" value="Create">
          </div>
        
        </form>
      </div>
    </div>
  </div>

@endsection