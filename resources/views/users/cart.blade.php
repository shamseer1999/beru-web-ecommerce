@extends('users.layouts.template')
@section('content')
@if ($result)
    @foreach ($result as $item)
    <div class="card">
        <div class="card-body" style="width:25rem;">
                <div class="card">
                    <div class="card-body">

                      <a href="">{{ $item->name}}</a>
                      <a href="" onclick="return confirm('Are you sure you want to do this ?')" style="float:right">X</a>
                      <img src="{{ asset('storage/products/'.$item->image)}}" alt="" style="width:100%;object-fit:cover;">
                      <p>₹ {{ $item->price }}</p>
                    </div>
                  </div>
        </div>
      </div>
    @endforeach
    <a href="" class="btn btn-outline-success btn-lg" style="float:right;margin:10px 10px">Place Order</a>
@endif
@endsection
