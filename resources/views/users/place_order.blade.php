<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BERU E-Commerce</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .spinner {
           width: 56px;
           height: 56px;
           border-radius: 50%;
           border: 9px solid;
           border-color: #474bff #0000;
           animation: spinner-0tkp9a 1s infinite;
        }

        @keyframes spinner-0tkp9a {
           to {
              transform: rotate(.5turn);
           }
        }
        </style>
</head>
<body>
    <div class="container mt-5">
        @if (session()->has('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        @if (session()->has('danger'))
            <div class="alert alert-danger">{{session('danger')}}</div>
        @endif
        <span><a href="{{ route('cart') }}" class="text-decoration-none"><i class="fa fa-arrow-circle-left"></i> Cart</a></span>
        <h2>Checkout Products</h2>

        <div class="row">
            <div class="col-lg-7">
                <h4>Shipping Information</h4>
                <form method="POST" id="address-form">
                    @csrf
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="name" value="{{ $customer->customer_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{ $customer->address }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" name="city" id="city" value="{{ $customer->place }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="zipCode" class="form-label">Zip Code</label>
                        <input type="text" class="form-control" name="zipcode" id="zipCode" value="{{ $customer->zipcode }}" required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary" name="update_address" style="width:100%" value="Update Your Address">
                    </div>
                </form>
            </div>
            <div class="col-lg-5">
                <h4>Order Summary</h4>
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @php
                                $total=0;
                                $countItems = count($result->cart->productsWithPivot)
                            @endphp
                            @foreach ($result->cart->productsWithPivot as $item)
                                @php
                                    $total += $item->price * $item->pivot->product_count
                                @endphp
                                <li class="list-group-item d-flex justify-content-between">
                                    <img src="{{ asset('storage/products/'.$item->image)}}" alt="" style="width: 60px;height:60px;object-fit:cover;border: 2px solid #fff;">
                                    <span style="padding-top:15px">{{ $item->name }} ({{ $item->pivot->product_count }} Items)</span>
                                    <span style="padding-top:15px">{{ $item->price * $item->pivot->product_count }}</span>
                                    @if ($countItems > 1)
                                        <a href="{{ route('remove-cart-item',[encrypt($item->id),'redir'=>'place_order']) }}" onclick="return confirm('Are you sure you want to do this ?')" style="padding-top:15px;cursor:pointer;" title="Remove Item"><span ><i class="fa fa-close"></i></span></a>
                                    @endif

                                </li>
                            @endforeach

                            {{-- <li class="list-group-item d-flex justify-content-between">
                                <span>Product 2</span>
                                <span>$29.99</span>
                            </li> --}}
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total</span>
                                <span>{{ $total }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <h4 class="mt-3">Payment Method</h4>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymentType" id="creditCard" value="Credit Card" checked>
                    <label class="form-check-label" for="creditCard">
                        Credit Card
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymentType" id="paypal" value="PayPal">
                    <label class="form-check-label" for="paypal">
                        PayPal
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymentType" id="cod" value="cod">
                    <label class="form-check-label" for="cod">
                        Cash on Delivery
                    </label>
                </div>
                <button class="btn btn-white mt-3" id="spinner-btn" style="display: none"><div class="spinner"></div></button>
                <button class="btn btn-primary mt-3" id="place-order-btn">Place Order</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        function ConfirmHide()
        {
            $("#confirm-message").hide();
        }
        $(document).ready(function(){
            setTimeout(() => {
                ConfirmHide()
            }, 2000);
        })
        $("#place-order-btn").on('click',function(){
            var spinnerBtn = $("#spinner-btn")
            //find payment type
            var selectPaymentType = $("input[name=paymentType]:checked").val()
            spinnerBtn.show()
            $("#place-order-btn").hide()

            $.ajax({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                },
                url:"{{url('/place-order-confirm')}}",
                type:'POST',
                data:{
                    payType:selectPaymentType
                },
                success:function(response){
                    console.log(response)
                    if(response.message == 'success')
                    {
                        spinnerBtn.hide()
                        $("#place-order-btn").show()
                        $("#confirm-message").show()
                        $("#confirm-message").text('Your order placed successfully');
                        window.location.href='{{ url("/cart") }}?status=success';
                    }

                }
            })

        })
    </script>
</body>
</html>
