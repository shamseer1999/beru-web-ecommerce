<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BERU ECOMMERCE</title>
</head>
<body>
    <div>
        <p>You have a new order from {{ $customer }}</p>
        <p>Customer Name : {{ $customer }}</p>
        <p>Customer Phone : {{ $customer_phone }}</p>
        <p>Shipping Address : {{ $shipping_place }}</p>
        <p>Payment Type : {{ $payment_type }}</p>
    </div>
</body>
</html>
