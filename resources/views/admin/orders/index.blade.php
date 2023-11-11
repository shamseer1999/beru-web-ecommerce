@extends('admin.layout.template')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Orders List</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Orders List</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                {{-- <div class="card-header">
                    <a href="{{route('admin.product.add')}}" class="btn btn-primary" style="float:right">Add Product</a>
                </div> --}}
                <!-- /.card-header -->
                <div class="card-body">

                  <table class="table table-bordered">

                    <thead>

                      <tr>
                        <th style="width: 10px">Sl.No</th>
                        <th>Category</th>
                        <th>Product Name</th>
                        <th>Customer</th>
                        <th>Customer Phone</th>
                        <th>Delivery Location</th>
                        <th>Mode of Pay</th>
                        <th>Order Price</th>
                        <th>Order Quantity</th>
                        <th>Order Status</th>
                        <th>Order Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if (sizeof($result) > 0)
                            @foreach ($result as $item)
                            <tr>
                                <td>{{ $loop->index + $result->firstItem() }}</td>
                                <td>{{ $item->Product->category->name }}</td>
                                <td>{{ $item->Product->name }}</td>
                                <td>{{ $item->Order->Customer->customer_name }}</td>
                                <td>{{ $item->Order->customer_phone }}</td>
                                <td>{{ $item->Order->shipping_place }}</td>
                                <td>{{ $item->Order->payment_type }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->order_count }}</td>
                                <td>{{ $item->Order->order_status }}</td>
                                <td>{{ date('d-m-Y H:i:s',strtotime($item->created_at)) }}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  {{ $result->links()}}
                </div>
              </div>
              <!-- /.card -->

              <!-- /.card -->
            </div>
            <!-- /.col -->

            <!-- /.col -->
          </div>


          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection
