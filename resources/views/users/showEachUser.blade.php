@extends('layouts.layout1')

@section('content')

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">User Table</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <x-alert/>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Password</th>
              <th>Start date</th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td>{{$user->id}}</td>
              <td><a>{{$user->name}}</a></td>
              <td>{{$user->email}}</td>
              <td>{{$user->password}}</td>
              <td>{{$user->created_at}}</td>
            </tr>
          </tbody>
        </table>

        @if ($user->profiles !== null)
          @livewire('show-profile',["profile"=> $user->profiles])            
        @endif
      <a href="{{route('profiles.createUser')}}">Create Profile</a>

      </div>
    </div>
  </div>

@endsection