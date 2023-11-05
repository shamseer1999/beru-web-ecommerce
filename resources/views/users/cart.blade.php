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
    margin:1px;
  }
  .price-div i{
    cursor: pointer;
  }
</style>
@if (Request::get('status') && Request::get('status') == 'success')
<div class="alert alert-success" id="confirm-message">Your Order Placed Successfully</div>
@endif

@if (!empty($result->cart->productsWithPivot) && count($result->cart->productsWithPivot) > 0)
    @foreach ($result->cart->productsWithPivot as $item)
    <div class="card">
        <div class="card-body" style="width:25rem;">
                <div class="card">
                    <div class="card-body">

                      <a href="">{{ $item->name}}</a>
                      <a href="{{ route('remove-cart-item',encrypt($item->id)) }}" onclick="return confirm('Are you sure you want to do this ?')" style="float:right">X</a>
                      <img src="{{ asset('storage/products/'.$item->image)}}" alt="" style="width:100%;object-fit:cover;">

                      <div class="price-div">
                        <input type="hidden" id="single-price" value="{{ $item->price }}">
                        <p id="price-section{{ $item->pivot->id }}">₹ {{ $item->price * $item->pivot->product_count }}</p>
                        <div>
                          <i class="fa fa-plus add-more" data-id="{{ $item->pivot->id }}"></i>
                          <input type="number" style="width:15%;text-align:center" id="count-id-{{ $item->pivot->id }}" value="{{ $item->pivot->product_count }}">
                          <i class="fa fa-minus reduce-count" data-id="{{ $item->pivot->id }}"></i>
                        </div>

                      </div>
                    </div>
                  </div>
        </div>
      </div>
    @endforeach
    <a href="{{ route('place_order') }}" class="btn btn-outline-success btn-lg" style="float:right;margin:10px 10px">Place Order</a>
@endif
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    function ConfirmHide()
    {
        $("#confirm-message").hide();
    }
    $(document).ready(function(){

        setTimeout(() => {
                ConfirmHide()
            }, 2000);

        // alert('test')
        $('.add-more').on('click',function(){
            var dataId = $(this).data('id')
            if(dataId){
                $.ajax({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name = "csrf-token"]').attr('content')
                    },
                    url:'{{ url("/add-more-items") }}',
                    type:'POST',
                    data:{
                        'pivot_id':dataId
                    },
                    success:function(response){
                        var singlePrice = $("#single-price").val()
                        $("#count-id-"+dataId).val(response.data)
                        var newPrice = singlePrice * response.data
                        $("#price-section"+dataId).text('₹'+newPrice)
                        location.reload()
                        //console.log(response);
                    }
                })
            }
        })

        $('.reduce-count').on('click',function(){

          var dataId = $(this).data('id')
          if(dataId){
            if($("#count-id-"+dataId).val() == 1){
                alert('Atleast one item would be exist');
                return false;
            }
            $.ajax({
              headers:{
                'X-CSRF-TOKEN':$('meta[name = "csrf-token"]').attr('content')
              },
              url:'{{ url("/reduce-item-count") }}',
              type:'POST',
              data:{
                'pivot_id':dataId
              },
              success:function(response){
                var singlePrice = $("#single-price").val()
                $("#count-id-"+dataId).val(response.data)
                var newPrice = singlePrice * response.data
                $("#price-section"+dataId).text('₹'+newPrice)
                location.reload()
                //console.log(response)
              }
            })
          }
        })
    })
</script>
@endsection
