@extends('layouts.layout1')

@section('content')
  <div class="container">
  <div class="row flex-lg-nowrap">
  
  
    <div class="col">
      <div class="row">
        <div class="col mb-3">
          <div class="card">
            <div class="card-body">
              <div class="e-profile">
                <div class="row">
                  <div class="col-12 col-sm-auto mb-3">
                    <div class="mx-auto" style="width: 140px;">
                      <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                        @if ($user->profile === null)
                          <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                        @else
                          <img src="{{ asset('storage/images/'.$user->profile->avatar) }}" width="150px">
                        @endif

                      </div>
                    </div>
                  </div>
                  <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                    <div class="text-center text-sm-left mb-2 mb-sm-0">
                      <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{$user->name}}</h4>

                      <div class="mt-2">
                      </div>
                    </div>
                    <div class="text-center text-sm-right">
                      @if($user->role_id === 2)
                        <span class="badge badge-secondary">administrator</span>
                      @else
                        <span class="badge badge-secondary">Editor</span>
                      @endif
                    <div class="text-muted"><small>{{$user->created_at}}</small></div>
                    </div>
                  </div>
                </div>
                <ul class="nav nav-tabs">
                  <li class="nav-item"><a href="" class="active nav-link">My Profile</a></li>
                </ul>
                <div class="tab-content pt-3">
                  <div class="tab-pane active">
                    <form class="form" novalidate="">
                      <div class="row">
                        <div class="col">
                          <div class="row">
                            @if ($user->profile !== null)
                            <div class="col">
                              <div class="form-group">
                                <label>Full Name</label>
                                <input class="form-control" type="text" name="name" value="{{$user->profile->full_name}}" readonly>
                              </div>
                            </div>
                            @else
                            <div class="col">
                              <div class="form-group">
                                <label>Full Name</label>
                                <input class="form-control" type="text" name="name" value="" readonly>
                              </div>
                            </div>
                            @endif

                            <div class="col">
                              <div class="form-group">
                                <label>Username</label>
                              <input class="form-control" type="text" name="username" value="{{$user->name}}" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" value="{{$user->email}}" readonly>
                              </div>
                            </div>
                          </div>
                          @if ($user->profile !== null)
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label>Birthday</label>
                                <input class="form-control" type="date" value="{{$user->profile->birthday}}" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" type="text" value="{{$user->profile->address}}" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                          @else
                          <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Birthday</label>
                              <input class="form-control" type="date" value="" readonly>
                            </div>
                          </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Address</label>
                              <input class="form-control" type="text" value="" readonly>
                            </div>
                          </div>
                        </div>
                      </div>
                          @endif



                    </form>
  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  
        <div class="col-12 col-md-3 mb-3">
          <div class="card mb-3">
            <div class="card-body">
              <div class="px-xl-3">
                  <a href="{{route('home')}}" class="btn btn-block btn-secondary" type="submit" style="color: white">
                    <i class="fa fa-sign-out"></i>
                    <span>Back</span>
                    </a>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h6 class="card-title font-weight-bold">Support</h6>
              @if ($user->profile === null)
                <a href="{{route('profiles.createUser',$user->id)}}" type="button" class="btn btn-primary" style="color: white">Create My Profile</a>
              @else
                <a href="{{route('users.edit',$user->id)}}" type="button" class="btn btn-primary" style="color: white">Edit My Profile</a>
              @endif
            
            </div>
          </div>
        </div>
      </div>
  
    </div>
  </div>
  </div>
@endsection