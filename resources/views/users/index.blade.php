@extends('users.layouts.template')
@section('content')
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}
  {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
    {{-- <div class="container-fluid px-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed">
                    <div class="container-fluid d-flex"> <a class="navbar-brand" href="#">SiteBack</a>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation"> <a class="nav-link active" id="home-tab"
                                    data-toggle="tab" href="#home" role="tab" aria-controls="home"
                                    aria-selected="true">Couches</a> </li>
                            <li class="nav-item" role="presentation"> <a class="nav-link" id="profile-tab"
                                    data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                    aria-selected="false">Chair</a> </li>
                            <li class="nav-item" role="presentation"> <a class="nav-link" id="contact-tab"
                                    data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                                    aria-selected="false">Dining</a> </li>
                        </ul>
                    </div>
                </nav>
            </div> --}}
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
                                                <div class="text-right buttons"> <button class="btn btn-outline-dark">add to
                                                        wishlist</button> <button class="btn btn-dark">Add to cart</button>
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
<script>
    $(document).ready(function() {
 
 $(".owl-carousel").owlCarousel();

});
</script>
@endsection
