@extends('layouts.layout1')

@section('content')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">User Table</h6>
            </div>
            <div class="card-body">
              <x-alert/>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    
                    <tr>
                      <td>{{$loop->index + 1}}</td>
                      <td><a href="/users/{{$user->id}}">{{$user->name}}</a>

                        <a href="/users/{{$user->id}}/edit"  role="button">
                          <span class="fas fa-edit" style="color: green"></span>
                        </a>

                        {{-- delete --}}
                        <a href="#"><span  class="fas fa-trash" style="color: red"
                          onclick="event.preventDefault();
                          if(confirm('Are you really want to delete ?')){
                              document.getElementById('form-detele-{{$user->id}}').submit();
                          } 
                      "></span></a>
                      
                      <form style="display: none;" id="{{'form-detele-'.$user->id}}" method="post" action="{{route('users.destroy',$user->id)}}">
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