@extends('admin.layout.template')
@section('content')
     <!-- Content Header (Page header) -->
     <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Add Product</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.product.list')}}">Products</a></li>
                <li class="breadcrumb-item active">Add Product</li>
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
                <form action="{{route('admin.product.save')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Name <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="product_name" name="product_name" value="{{old('product_name')}}" >
                                @if ($errors->has('product_name'))
                                    <span class="text-danger">{{ $errors->first('product_name') }}</span>
                                @endif
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Price <small class="text-danger">*</small></label>
                                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{old('price')}}" required>
                                @if ($errors->has('price'))
                                    <span class="text-danger">{{ $errors->first('price') }}</span>
                                @endif
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Base Stock <small class="text-danger">*</small></label>
                                <input type="number" step="0.01" class="form-control" id="product_stock" name="product_stock" value="{{old('product_stock')}}" required>
                                @if ($errors->has('product_stock'))
                                    <span class="text-danger">{{ $errors->first('product_stock') }}</span>
                                @endif
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Favorite this product ?</label>
                                <input type="radio" name="faveroite" value="1" {{old('faveroite') == 1 ? 'checked' :''}}><span>Yes</span>
                                <input type="radio" name="faveroite" value="0" {{old('faveroite') == 0 ? 'checked' :''}}><span>No</span>
                                @if ($errors->has('faveroite'))
                                    <span class="text-danger">{{ $errors->first('faveroite') }}</span>
                                @endif
                              </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Category <small class="text-danger">*</small></label>
                            <select class="form-control" name="category" id="category" required>
                              <option value=""> --SELECT-- </option>
                              @if (!empty($categories))
                                  @foreach ($categories as $item)
                                      <option value="{{$item->id}}" {{ old('category') == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                  @endforeach
                              @endif
                            </select>
                            @if ($errors->has('category'))
                                    <span class="text-danger">{{ $errors->first('category') }}</span>
                                @endif
                          </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                  </div>
                                  <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                  </div>
                                </div>
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                              </div>
                              
                              
                        </div>
                    </div>
                    
                    
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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