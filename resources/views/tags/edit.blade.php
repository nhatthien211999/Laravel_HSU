@extends('layouts.layout1')

@section('content')

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit Tag</h6>
    </div>
    <div class="card-body">
      <x-alert/>
      <div class="table-responsive">
        <form method="POST" action="{{route('tags.update',$tag->id)}}" enctype="multipart/form-data">
            @csrf
            @method('patch')
          <div class="form-group">
            <label for="tag"> Tag:</label>
            <input type="text" class="form-control" value="{{$tag->tag}}" name="tag" >
            <br>
            <label for="price"> Email:</label>
            <input type="number" class="form-control" value="{{$tag->price}}" name="price" >
            <br>
            <label for="quatity"> Quatity:</label>
            <input type="number" class="form-control" value="{{$tag->quatity}}" name="quatity">
            <label for="description"> Description:</label>
            <input type="text" class="form-control" value="{{$tag->description}}" name="description">
          </div>
          <div class="form-group">
              <input type="submit" class="form-control btn btn-primary"  name="Update" value="Update">
          </div>
        </form>
      </div>
    </div>
  </div>

  
@endsection