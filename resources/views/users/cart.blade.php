@extends('users.layouts.template')
@section('content')
<style>
  .price-div{
    display: flex;
  align-items: center;
  }
  .price-div div {
  margin: 3px;
  }
  .price-div p{
    margin:3px;
  }
  .price-div i{
    cursor: pointer;
  }
</style>
@if (!empty($result))
    @foreach ($result as $item)
    <div class="card">
        <div class="card-body" style="width:25rem;">
                <div class="card">
                    <div class="card-body">

                      <a href="">{{ $item->name}}</a>
                      <a href="{{ route('remove-cart-item',encrypt($item->id)) }}" onclick="return confirm('Are you sure you want to do this ?')" style="float:right">X</a>
                      <img src="{{ asset('storage/products/'.$item->image)}}" alt="" style="width:100%;object-fit:cover;">

                      <div class="price-div">
                        <p>₹ {{ $item->price }}</p>
                        <div>
                          <i class="fa fa-plus"></i>
                          <input type="number" style="width:15%">
                          <i class="fa fa-minus"></i>
                        </div>

                      </div>
                    </div>
                  </div>
        </div>
      </div>
    @endforeach
    <a href="" class="btn btn-outline-success btn-lg" style="float:right;margin:10px 10px">Place Order</a>
@endif
@endsection
