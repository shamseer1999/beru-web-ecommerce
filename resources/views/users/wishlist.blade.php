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
                  <div class="card-body">
                    <div class="text-right buttons">
                        @if ($val->product_stock > 0)
                            <button class="btn btn-outline-dark" id="wishlist-btn" onclick="addToWishlist({{$val->id}})" data-id="{{$val->id}}">add to wishlist</button>
                            <button class="btn btn-dark" onclick="addToCart({{$val->id}})" data-id="{{$val->id}}">Add to cart</button>
                        @else
                            <label for="" style="color: rgb(241, 154, 154)">Currently unavailable</label>
                        @endif

                    </div>
                </div>
                @endforeach
            @endif
        </div>
      </div>
    @endforeach
@endif
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    function addToCart(vl){
    var dataId = vl
    if(dataId){
        $.ajax({
            headers:{
                'X-CSRF-TOKEN':$('meta[name = "csrf-token"]').attr('content')
            },
            url:"{{url('/add-to-cart')}}",
            type:'POST',
            data:{
                id:dataId
            },
            success:function(response){
                console.log(response)
                if(response.message == 'success'){
                    alert('Item added to cart successfully')
                    location.reload()
                }else if(response.message == 'not_authenticated'){
                    console.log($('#auth-btn'));
                    $("#sign-in-form").hide()
                    $("#login-form").show()
                    $('#auth-btn').click();
                }else if(response.message == 'not_exist'){
                    alert("Item doesn't exist")
                }else{
                    alert(response.message)
                }
            }
        })
    }

}
</script>
@endsection
