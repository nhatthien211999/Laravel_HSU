

@extends('layouts.layout1')

@section('content')


        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Đơn hàng</h6>
              {{-- <a href="{{route('carts.createCart',$cart->user()->id)}}" type="supmit" class="fas fa-plus-circle" style="color: green"></a> --}}
              <x-search></x-search>
            </div>
            <div class="card-body">
              <x-alert/>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Đơn hàng</th>
                      <th>Chủ đơn hàng</th>
                      <th>Ngày Tạo</th>
                      <th>Title</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($carts as $cart)
                    
                    <tr>
                      <td>{{$loop->index + 1}}</td>
                      <td><a href="{{route('carts.show',$cart)}}">{{$cart->body}}</a>

                        {{-- <a href="/users/{{$user->id}}/edit"  role="button">
                          <span class="fas fa-edit" style="color: green"></span>
                        </a> --}}

                        {{-- delete --}}


                      </td>
                      <td>{{$cart->user->name}}</td>
                      <td>{{$cart->created_at}}</td>
                      @if($cart->title === 1)
                        <td style="color:white; background: green">Đã giao</td>
                      @else
                        <td style="color:white; background: red">Chưa giao</td>
                      @endif

                      
                      <td>
                        <a href="#"><span  class="fas fa-trash" style="color: red"
                          onclick="event.preventDefault();
                          if(confirm('Are you really want to delete ?')){
                              document.getElementById('form-detele-{{$cart->id}}').submit();
                          } 
                      "></span></a>
                      
                      <form style="display: none;" id="{{'form-detele-'.$cart->id}}" method="post" action="{{route('carts.destroy',$cart->id)}}">
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