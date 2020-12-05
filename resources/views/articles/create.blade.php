@extends('layouts.layout1')

@section('content')

  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3>{{$user->name}}</h3>
      <h6 class="m-0 font-weight-bold text-primary">Create Acticle</h6>
    </div>
    <div class="card-body">
      <x-alert/>
 
      <div class="table-responsive">

      <form method="POST" action="{{route('articles.storeArticle',$user->id)}}" enctype="multipart/form-data">
        
            @csrf

          <div class="form-group">
            <label for="body"> Body:</label>
            <input type="text" class="form-control" name="body" >
            <br>
            <label for="cars">Choose a Tag:</label>
            <select name="tag_id" class="form-control">
            @foreach ($tags as $tag)
                <option value={{$tag->id}}> {{$tag->tag}}</option>
            @endforeach
            </select>
            <br>
            <label for="quatity"> Quatity:</label>
            <input type="number" class="form-control" name="quatity">
            <br>
            <label for="total"> Total:</label>
            <input type="text" class="form-control" name="total">
          </div>        
          <div class="form-group">
              <input type="submit" class="form-control btn btn-primary" name="Create" value="Create">
          </div>
        
        </form>
      </div>
    </div>
  </div>

@endsection