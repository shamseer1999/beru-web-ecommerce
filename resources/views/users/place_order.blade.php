<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BERU E-Commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container mt-5">
        <span><a href="{{ route('cart') }}" class="text-decoration-none"><i class="fa fa-arrow-circle-left"></i> Cart</a></span>
        <h2>Checkout Products</h2>
        <div class="row">
            <div class="col-lg-7">
                <h4>Shipping Information</h4>
                <form>
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullName" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" required>
                    </div>
                    <div class="mb-3">
                        <label for="zipCode" class="form-label">Zip Code</label>
                        <input type="text" class="form-control" id="zipCode" required>
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
                                        <span style="padding-top:15px;cursor:pointer;" title="Remove Item"><i class="fa fa-close"></i></span>
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
                <button class="btn btn-primary mt-3">Place Order</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
