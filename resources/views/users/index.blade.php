@extends('users.layouts.template')
@section('content')
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
                                <div class="col-md-4">
                                    <div class="card"> <img src="{{asset('img/pr_1.jpg')}}" class="card-img-top">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between"> <span
                                                    class="font-weight-bold">Wood Sofa set-3</span> <span
                                                    class="font-weight-bold">$550</span> </div>
                                            <p class="card-text mb-1 mt-1">Some quick example text to build on the card
                                                title and make up the bulk of the card's content.</p>
                                            <div class="d-flex align-items-center flex-row"> <img
                                                    src="https://i.imgur.com/e9VnSng.png" width="20"> <span
                                                    class="guarantee">2 Years Guarantee</span> </div>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="text-right buttons"> <button class="btn btn-outline-dark">add to
                                                    wishlist</button> <button class="btn btn-dark">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card"> <img src="{{asset('img/pr_2.jpg')}}" class="card-img-top">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between"> <span
                                                    class="font-weight-bold">Wood Sofa set-3</span> <span
                                                    class="font-weight-bold">$600</span> </div>
                                            <p class="card-text mb-1 mt-1">Some quick example text to build on the card
                                                title and make up the bulk of the card's content.</p>
                                            <div class="d-flex align-items-center flex-row"> <img
                                                    src="https://i.imgur.com/e9VnSng.png" width="20"> <span
                                                    class="guarantee">1 Years Guarantee</span> </div>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="text-right buttons"> <button class="btn btn-outline-dark">add to
                                                    wishlist</button> <button class="btn btn-dark">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card"> <img src="{{asset('img/pr_3.jpg')}}" class="card-img-top">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between"> <span
                                                    class="font-weight-bold">Wood Sofa set-2</span> <span
                                                    class="font-weight-bold">$1,000</span> </div>
                                            <p class="card-text mb-1 mt-1">Some quick example text to build on the card
                                                title and make up the bulk of the card's content.</p>
                                            <div class="d-flex align-items-center flex-row"> <img
                                                    src="https://i.imgur.com/e9VnSng.png" width="20"> <span
                                                    class="guarantee">4 Years Guarantee</span> </div>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="text-right buttons"> <button class="btn btn-outline-dark">add to
                                                    wishlist</button> <button class="btn btn-dark">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card"> <img src="{{asset('img/pr_4.jpg')}}" class="card-img-top">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between"> <span
                                                    class="font-weight-bold">Wood Sofa set-4</span> <span
                                                    class="font-weight-bold">$850</span> </div>
                                            <p class="card-text mb-1 mt-1">Some quick example text to build on the card
                                                title and make up the bulk of the card's content.</p>
                                            <div class="d-flex align-items-center flex-row"> <img
                                                    src="https://i.imgur.com/e9VnSng.png" width="20"> <span
                                                    class="guarantee">3 Years Guarantee</span> </div>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="text-right buttons"> <button class="btn btn-outline-dark">add to
                                                    wishlist</button> <button class="btn btn-dark">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card"> <img src="{{asset('img/pr_5.jpg')}}" class="card-img-top">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between"> <span
                                                    class="font-weight-bold">Wood Sofa set-5</span> <span
                                                    class="font-weight-bold">$15,50</span> </div>
                                            <p class="card-text mb-1 mt-1">Some quick example text to build on the card
                                                title and make up the bulk of the card's content.</p>
                                            <div class="d-flex align-items-center flex-row"> <img
                                                    src="https://i.imgur.com/e9VnSng.png" width="20"> <span
                                                    class="guarantee">8 Years Guarantee</span> </div>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="text-right buttons"> <button class="btn btn-outline-dark">add to
                                                    wishlist</button> <button class="btn btn-dark">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card"> <img src="{{asset('img/pr_6.jpg')}}" class="card-img-top">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between"> <span
                                                    class="font-weight-bold">Wood Sofa set-3</span> <span
                                                    class="font-weight-bold">$550</span> </div>
                                            <p class="card-text mb-1 mt-1">Some quick example text to build on the card
                                                title and make up the bulk of the card's content.</p>
                                            <div class="d-flex align-items-center flex-row"> <img
                                                    src="https://i.imgur.com/e9VnSng.png" width="20"> <span
                                                    class="guarantee">2 Years Guarantee</span> </div>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="text-right buttons"> <button class="btn btn-outline-dark">add to
                                                    wishlist</button> <button class="btn btn-dark">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <!--Chairs-->
                            <div class="d-flex justify-content-between p-3 bg-white mb-3 align-items-center"> <span
                                    class="font-weight-bold text-uppercase">Luxury Chairs</span>
                                <div> <img src="https://img.icons8.com/windows/100/000000/list.png" width="30" /> <img
                                        src="https://img.icons8.com/ios-filled/100/000000/squared-menu.png"
                                        width="25" /> </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="card"> <img src="https://i.imgur.com/2ldaKjy.jpg" class="card-img-top">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between"> <span
                                                    class="font-weight-bold">Wodden chairs set-2</span> <span
                                                    class="font-weight-bold">$150</span> </div>
                                            <p class="card-text mb-1 mt-1">Some quick example text to build on the card
                                                title and make up the bulk of the card's content.</p>
                                            <div class="d-flex align-items-center flex-row"> <img
                                                    src="https://i.imgur.com/e9VnSng.png" width="20"> <span
                                                    class="guarantee">4 Years Guarantee</span> </div>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="text-right buttons"> <button class="btn btn-outline-dark">add to
                                                    wishlist</button> <button class="btn btn-dark">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card"> <img src="https://i.imgur.com/lTgyE2X.jpg" class="card-img-top">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between"> <span
                                                    class="font-weight-bold">Wodden Chairs Premium set-2</span> <span
                                                    class="font-weight-bold">$200</span> </div>
                                            <p class="card-text mb-1 mt-1">Some quick example text to build on the card
                                                title and make up the bulk of the card's content.</p>
                                            <div class="d-flex align-items-center flex-row"> <img
                                                    src="https://i.imgur.com/e9VnSng.png" width="20"> <span
                                                    class="guarantee">2 Years Guarantee</span> </div>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="text-right buttons"> <button class="btn btn-outline-dark">add to
                                                    wishlist</button> <button class="btn btn-dark">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card"> <img src="https://i.imgur.com/NFcMfYE.jpg" class="card-img-top">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between"> <span
                                                    class="font-weight-bold">Office Chairs set-2</span> <span
                                                    class="font-weight-bold">$500</span> </div>
                                            <p class="card-text mb-1 mt-1">Some quick example text to build on the card
                                                title and make up the bulk of the card's content.</p>
                                            <div class="d-flex align-items-center flex-row"> <img
                                                    src="https://i.imgur.com/e9VnSng.png" width="20"> <span
                                                    class="guarantee">7 Years Guarantee</span> </div>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="text-right buttons"> <button class="btn btn-outline-dark">add to
                                                    wishlist</button> <button class="btn btn-dark">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card"> <img src="https://i.imgur.com/eu74Mje.jpg" class="card-img-top">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between"> <span
                                                    class="font-weight-bold">Wodden Chair set-3</span> <span
                                                    class="font-weight-bold">$350</span> </div>
                                            <p class="card-text mb-1 mt-1">Some quick example text to build on the card
                                                title and make up the bulk of the card's content.</p>
                                            <div class="d-flex align-items-center flex-row"> <img
                                                    src="https://i.imgur.com/e9VnSng.png" width="20"> <span
                                                    class="guarantee">3 Years Guarantee</span> </div>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="text-right buttons"> <button class="btn btn-outline-dark">add to
                                                    wishlist</button> <button class="btn btn-dark">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card"> <img src="https://i.imgur.com/L5iInTA.jpg" class="card-img-top">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between"> <span
                                                    class="font-weight-bold">Dinning chairs set-4</span> <span
                                                    class="font-weight-bold">$200</span> </div>
                                            <p class="card-text mb-1 mt-1">Some quick example text to build on the card
                                                title and make up the bulk of the card's content.</p>
                                            <div class="d-flex align-items-center flex-row"> <img
                                                    src="https://i.imgur.com/e9VnSng.png" width="20"> <span
                                                    class="guarantee">8 Years Guarantee</span> </div>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="text-right buttons"> <button class="btn btn-outline-dark">add to
                                                    wishlist</button> <button class="btn btn-dark">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card"> <img src="https://i.imgur.com/64PRDTx.jpg" class="card-img-top">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between"> <span
                                                    class="font-weight-bold">Office Chairs set-2</span> <span
                                                    class="font-weight-bold">$450</span> </div>
                                            <p class="card-text mb-1 mt-1">Some quick example text to build on the card
                                                title and make up the bulk of the card's content.</p>
                                            <div class="d-flex align-items-center flex-row"> <img
                                                    src="https://i.imgur.com/e9VnSng.png" width="20"> <span
                                                    class="guarantee">3 Years Guarantee</span> </div>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="text-right buttons"> <button class="btn btn-outline-dark">add to
                                                    wishlist</button> <button class="btn btn-dark">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <!--Dining-->
                            <div class="d-flex justify-content-between p-3 bg-white mb-3 align-items-center"> <span
                                    class="font-weight-bold text-uppercase">Luxury Dining</span>
                                <div> <img src="https://img.icons8.com/windows/100/000000/list.png" width="30" /> <img
                                        src="https://img.icons8.com/ios-filled/100/000000/squared-menu.png"
                                        width="25" /> </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="card"> <img src="https://i.imgur.com/hnQ492C.jpg" class="card-img-top">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between"> <span
                                                    class="font-weight-bold">Dinning table set-4</span> <span
                                                    class="font-weight-bold">$450</span> </div>
                                            <p class="card-text mb-1 mt-1">Some quick example text to build on the card
                                                title and make up the bulk of the card's content.</p>
                                            <div class="d-flex align-items-center flex-row"> <img
                                                    src="https://i.imgur.com/e9VnSng.png" width="20"> <span
                                                    class="guarantee">4 Years Guarantee</span> </div>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="text-right buttons"> <button class="btn btn-outline-dark">add to
                                                    wishlist</button> <button class="btn btn-dark">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card"> <img src="https://i.imgur.com/10JlX4K.jpg" class="card-img-top">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between"> <span
                                                    class="font-weight-bold">Dinning set set-8</span> <span
                                                    class="font-weight-bold">$2,000</span> </div>
                                            <p class="card-text mb-1 mt-1">Some quick example text to build on the card
                                                title and make up the bulk of the card's content.</p>
                                            <div class="d-flex align-items-center flex-row"> <img
                                                    src="https://i.imgur.com/e9VnSng.png" width="20"> <span
                                                    class="guarantee">6 Years Guarantee</span> </div>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="text-right buttons"> <button class="btn btn-outline-dark">add to
                                                    wishlist</button> <button class="btn btn-dark">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card"> <img src="https://i.imgur.com/eu74Mje.jpg" class="card-img-top">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between"> <span
                                                    class="font-weight-bold">Dinning chairs set-3</span> <span
                                                    class="font-weight-bold">$900</span> </div>
                                            <p class="card-text mb-1 mt-1">Some quick example text to build on the card
                                                title and make up the bulk of the card's content.</p>
                                            <div class="d-flex align-items-center flex-row"> <img
                                                    src="https://i.imgur.com/e9VnSng.png" width="20"> <span
                                                    class="guarantee">4 Years Guarantee</span> </div>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="text-right buttons"> <button class="btn btn-outline-dark">add to
                                                    wishlist</button> <button class="btn btn-dark">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card"> <img src="https://i.imgur.com/uh0knIW.jpg" class="card-img-top">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between"> <span
                                                    class="font-weight-bold">Dinning table set-10</span> <span
                                                    class="font-weight-bold">$3,500</span> </div>
                                            <p class="card-text mb-1 mt-1">Some quick example text to build on the card
                                                title and make up the bulk of the card's content.</p>
                                            <div class="d-flex align-items-center flex-row"> <img
                                                    src="https://i.imgur.com/e9VnSng.png" width="20"> <span
                                                    class="guarantee">6 Years Guarantee</span> </div>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="text-right buttons"> <button class="btn btn-outline-dark">add to
                                                    wishlist</button> <button class="btn btn-dark">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card"> <img src="https://i.imgur.com/rdYgwhr.jpg" class="card-img-top">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between"> <span
                                                    class="font-weight-bold">Table chair set-5</span> <span
                                                    class="font-weight-bold">$250</span> </div>
                                            <p class="card-text mb-1 mt-1">Some quick example text to build on the card
                                                title and make up the bulk of the card's content.</p>
                                            <div class="d-flex align-items-center flex-row"> <img
                                                    src="https://i.imgur.com/e9VnSng.png" width="20"> <span
                                                    class="guarantee">8 Years Guarantee</span> </div>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="text-right buttons"> <button class="btn btn-outline-dark">add to
                                                    wishlist</button> <button class="btn btn-dark">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card"> <img src="https://i.imgur.com/x6hhqGn.jpg" class="card-img-top">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between"> <span
                                                    class="font-weight-bold">Luxury Dinning set-7</span> <span
                                                    class="font-weight-bold">$750</span> </div>
                                            <p class="card-text mb-1 mt-1">Some quick example text to build on the card
                                                title and make up the bulk of the card's content.</p>
                                            <div class="d-flex align-items-center flex-row"> <img
                                                    src="https://i.imgur.com/e9VnSng.png" width="20"> <span
                                                    class="guarantee">6 Years Guarantee</span> </div>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="text-right buttons"> <button class="btn btn-outline-dark">add to
                                                    wishlist</button> <button class="btn btn-dark">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
