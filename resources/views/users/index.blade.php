@extends('users.layouts.template')
@section('content')

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
                                                <div class="text-right buttons"> <button class="btn btn-outline-dark" id="wishlist-btn" data-id="{{$item->id}}">add to
                                                        wishlist</button> <button class="btn btn-dark" data-id="{{$item->id}}">Add to cart</button>
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
$("#wishlist-btn").click(function(){
    var dataId = $(this).attr('data-id')
    
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
                if(response.message){
                    alert('Item added to wishlist')
                }else{
                    alert('Item not added')
                }
            }
        })
    }
 })
</script>
@endsection
