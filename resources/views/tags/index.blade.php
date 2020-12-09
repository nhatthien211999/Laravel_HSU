@extends('layouts.layout1')

@section('content')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary"> Product
              <a href="{{route('tags.create')}}" type="supmit" class="fas fa-plus-circle" style="color: green"></a>
            </h4>
            </div>
            <div class="card-body">
              <x-alert/>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    
                      <th>Product</th>
                      <th>Category</th>
                      <th>Image</th>
                      <th>Price</th>
                      <th>Quatity</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($tags as $tag)
                    <tr>
                    @if($tag->isLive !== 0)

                    <td><p>{{$tag->tag}}</p> </td>

                    <td><p>{{$tag->categories->category}}</p> </td>
                    <td><img src="{{ asset('/storage/tagImages/'.$tag->image) }}" width="100px"></td>
                    <td><p>{{$tag->price}}</p></td>
                    <td><p>{{$tag->quatity}}</p></td>
                    <td><p>{{$tag->description}}</p></td>
                    <td>
                      <a href="{{route('tags.edit',$tag->id)}}"  role="button">
                            <span class="fas fa-edit" style="color: green"></span>
                          </a> 
                          <a href="#"><span  class="fas fa-trash" style="color: red"
                            onclick="event.preventDefault();
                            if(confirm('Are you really want to delete ?')){
                                document.getElementById('form-detele-{{$tag->id}}').submit();
                            } 
                        "></span></a>
                                              
                  <form style="display: none;" id="{{'form-detele-'.$tag->id}}" method="post" action="{{route('tags.destroy',$tag->id)}}">
                    @csrf
                    @method('delete')
                  </form>
                    </td>
                </tr>
                    @endif                     
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

@endsection