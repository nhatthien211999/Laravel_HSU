@extends('layouts.layout1')

@section('content')

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      
      <h6 class="m-0 font-weight-bold text-primary">Create Cart</h6>
    </div>
    <div class="card-body">
      <x-alert/>
 
      <div class="table-responsive">

      <form method="POST" action="{{route('cartTag.storeCartTag',$cart->id)}}" enctype="multipart/form-data">
        
            @csrf

          <div class="form-group">
            <label for="cars">Tên SP:</label>
            <select name="tag_id" class="form-control">
            @foreach ($tags as $tag)
              @if($tag->isLive === 1)
                <option value={{$tag->id}}> {{$tag->tag}}</option>
              @endif
            @endforeach
            </select>
            <br>
            <label for="total"> Số lượng SP:</label>
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