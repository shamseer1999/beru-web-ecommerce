@extends('admin.layout.template')
@section('content')
     <!-- Content Header (Page header) -->
     <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Update Product Stock</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.product.list')}}">Products</a></li>
                <li class="breadcrumb-item active">Update Product Stock</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Quick Example</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Name <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="product_name" name="product_name" value="{{old('product_name',$editdata->name)}}" readonly>
                                @if ($errors->has('product_name'))
                                    <span class="text-danger">{{ $errors->first('product_name') }}</span>
                                @endif
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Stock<small class="text-danger">*</small></label>
                                <input type="number" step="0.01" class="form-control" id="product_stock" name="product_stock" value="{{old('product_stock',$editdata->product_stock)}}" required>
                                @if ($errors->has('product_stock'))
                                    <span class="text-danger">{{ $errors->first('product_stock') }}</span>
                                @endif
                              </div>
                        </div>
                        
                              
                        </div>
                    </div>
                    
                    
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
  
  
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection