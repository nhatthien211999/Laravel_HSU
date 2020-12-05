

@extends('layouts.layout1')

@section('content')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Đơn hàng của {{$user->name}}</h6>
              <a href="{{route('articles.createArticle',$user->id)}}" type="supmit" class="fas fa-plus-circle" style="color: green"></a>
            </div>
            <div class="card-body">
              <x-alert/>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Đơn hàng</th>
                      <th>Ngày Tạo</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($articles as $article)
                    
                    <tr>
                      <td>{{$article->id}}</td>
                      <td><a href="{{route('articles.show',$article)}}">{{$article->body}}</a>

                        {{-- <a href="/users/{{$user->id}}/edit"  role="button">
                          <span class="fas fa-edit" style="color: green"></span>
                        </a> --}}

                        {{-- delete --}}


                      </td>

                      <td>{{$article->created_at}}</td>

                      
                      <td>
                        <a href="#"><span  class="fas fa-trash" style="color: red"
                          onclick="event.preventDefault();
                          if(confirm('Are you really want to delete ?')){
                              document.getElementById('form-detele-{{$article->id}}').submit();
                          } 
                      "></span></a>
                      
                      <form style="display: none;" id="{{'form-detele-'.$article->id}}" method="post" action="{{route('articles.destroy',$article->id)}}">
                          @csrf
                          @method('delete')
                      </form>
                      </td>


                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

@endsection