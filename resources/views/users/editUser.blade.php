@extends('layouts.layout1')

@section('content')

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
    </div>
    <div class="card-body">
      <x-alert/>
      <div class="table-responsive">
        <form method="POST" action="{{route('users.update',$user->id)}}">
            @csrf
            @method('patch')
          <div class="form-group">
            <label for="name"> Name:</label>
            <input type="text" class="form-control" value="{{$user->name}}" name="name" >
            <br>
            <label for="email"> Email:</label>
            <input type="text" class="form-control" value="{{$user->email}}" name="email" >
            <br>
            <label for="password"> Password:</label>
            <input type="text" class="form-control" value="{{$user->password}}" name="password" readonly>
          </div>

          {{-- profiles --}}
          
          @livewire('edit-profile',['profile'=> $user->profiles])
          
          <div class="form-group">
              <input type="submit" class="form-control btn btn-primary" value="Update" >
          </div>
        
        </form>
      </div>
    </div>
  </div>

@endsection