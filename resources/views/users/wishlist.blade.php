@extends('users.layouts.template')
@section('content')
@if ($result)
    @foreach ($result as $item)
    <div class="card">
        <div class="card-body" style="width:25rem;">
            @if ($item->products)
                @foreach ($item->products as $val)
                <div class="card">
                    <div class="card-body">

                      <a href="">{{ $val->name}}</a>
                      <a href="{{route('remove_wishlist',encrypt($item->id))}}" onclick="return confirm('Are you sure you want to do this ?')" style="float:right">X</a>
                      <img src="{{ asset('storage/products/'.$val->image)}}" alt="" style="width:100%;object-fit:cover;">
                    </div>
                  </div>
                @endforeach
            @endif
        </div>
      </div>
    @endforeach
@endif
@endsection
