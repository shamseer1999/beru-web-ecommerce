@extends('admin.layout.template')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Banners List</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Banners List</li>
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
                <div class="card-header">
                    <a href="{{route('admin.banner.add')}}" class="btn btn-primary" style="float:right">Add Banner</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    
                  <table class="table table-bordered">
                    
                    <thead>
                        
                      <tr>
                        <th style="width: 10px">Sl.No</th>
                        <th>Banner Name</th>
                        <th>Banner Image</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if (sizeof($result) > 0)
                          @foreach ($result as $item)
                              <tr>
                                <td>{{ $loop->index + $result->firstItem() }}</td>
                                <td>{{ $item->banner_name}}</td>
                                <td> <img src="{{asset('storage/banners/'.$item->banner_image)}}" alt="" width="100"></td>
                                <td>
                                  <a href="{{route('admin.banner.edit',encrypt($item->id))}}" class="btn btn-primary"><small>Edit <i class="fa fa-pencil"></i></small></a>
                                </td>
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