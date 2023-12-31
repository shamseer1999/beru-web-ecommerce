@extends('users.layouts.template')
@section('content')
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <form action="{{route('customer_login')}}" method="post" id="login-form" style="display:none;">
            <p>You have an account.please login</p>
            @csrf
            <div class="form-group">
                <label for="">Phone No</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <br>
                <input type="submit" value="Login" class="btn btn-primary btn-md" style="width:100%;">
                <label for="">You don't have an account <a style="cursor: pointer" class="btn" id="signin-redir">SignIn</a></label>
            </div>
          </form>
          <form action="{{ route('customer_signin') }}" method="POST" id="sign-in-form" style="display: none">
            @csrf
            <p>Sign In</p>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="customer_name" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Phone No</label>
                <input type="text" name="phone_no" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Place</label>
                <input type="text" name="place" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="form-control">
            </div>
            <div class="form-group">
                <br>
                <input type="submit" value="Sign In" class="btn btn-primary btn-md" style="width:100%">
                <label for="">You have already an account <a style="cursor: pointer" class="btn" id="login-redir">Login</a></label>
            </div>
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
  <button type="button" class="btn btn-primary" id="auth-btn" data-toggle="modal" data-target="#myModal" style="display: none">
    Open Modal
  </button>
  @if(session('danger'))
    <div id="dangerMessage" data-message="{{ session('danger') }}"></div>
@endif
@if(session('success'))
    <div id="successMessage" data-message="{{ session('success') }}"></div>
@endif
            <div class="container-fluid mt-2 mb-5">
                <div class="products">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <div class="row g-3">
                                @if ($products)
                                    @foreach ($products as $item)
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div style="height: 400px">
                                                <img src="{{asset('storage/products/'.$item->image)}}" class="card-img-top" style="height:400px;object-fit: cover">
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between"> <span
                                                        class="font-weight-bold">{{ $item->name }}</span> <span
                                                        class="font-weight-bold">{{ $item->price }}</span> </div>
                                                {{-- <p class="card-text mb-1 mt-1">Some quick example text to build on the card
                                                    title and make up the bulk of the card's content.</p>
                                                <div class="d-flex align-items-center flex-row"> <img
                                                        src="https://i.imgur.com/e9VnSng.png" width="20"> <span
                                                        class="guarantee">2 Years Guarantee</span> </div> --}}
                                            </div>
                                            <hr>
                                            <div class="card-body">
                                                <div class="text-right buttons">
                                                    @if ($item->product_stock > 0)
                                                        <button class="btn btn-outline-dark" id="wishlist-btn" onclick="addToWishlist({{$item->id}})" data-id="{{$item->id}}">add to wishlist</button>
                                                        <button class="btn btn-dark" onclick="addToCart({{$item->id}})" data-id="{{$item->id}}">Add to cart</button>
                                                    @else
                                                        <label for="" style="color: rgb(241, 154, 154)">Currently unavailable</label>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif


                                </div>


                            </div>
                        </div>


                    </div>
                </div>
            </div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
 $(".owl-carousel").owlCarousel();

});
$("#signin-redir").on('click',function(){
    $("#login-form").hide()
    $("#sign-in-form").show()
})

$("#login-redir").on('click',function(){
    $("#sign-in-form").hide()
    $("#login-form").show()
 })

function addToWishlist(vl){
    var dataId = vl
    if(dataId){
        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            },
            url:"{{url('/add-to-wishlist')}}",
            type:'POST',
            data:{
                id:dataId
            },
            success:function(response){
                console.log(response)
                if(response.message == 'success'){
                    alert('Item added to wishlist')
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
function clickAuth(vl)
{
    if( vl == 1){
        $("#sign-in-form").show()
        $("#login-form").hide()
    }else{
        $("#sign-in-form").hide()
        $("#login-form").show()
    }
    $('#auth-btn').click();
}
function addtoInput(vl)
{
    $("#dorop_down_list").val(vl)
}
// $("#wishlist-btn").click(function(){
//     var dataId = $(this).attr('data-id')

//     if(dataId){
//         $.ajax({
//             headers:{
//                 'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
//             },
//             url:"{{url('/add-to-wishlist')}}",
//             type:'POST',
//             data:{
//                 id:dataId
//             },
//             success:function(response){
//                 console.log(response)
//                 if(response.message == 'success'){
//                     alert('Item added to wishlist')
//                 }else if(response.message == 'not_authenticated'){
//                     console.log($('#auth-btn'));
//                     $('#auth-btn').click();
//                 }else if(response.message == 'not_exist'){
//                     alert("Item doesn't exist")
//                 }else{
//                     alert('Item not added')
//                 }
//             }
//         })
//     }
//  })
// </script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {

        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            alert(successMessage.getAttribute('data-message'));
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {

        var dangerMessage = document.getElementById('dangerMessage');
        if (dangerMessage) {
            alert(dangerMessage.getAttribute('data-message'));
        }
    });
</script>
@endsection
