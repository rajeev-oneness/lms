@extends('admin.index')
@section('title')
    Products
@endsection

@section('page-content-name')
    Products
@endsection

@section('main-content')

<!-- Small boxes (Stat box) -->
@if (Session::has('productAdd'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('productAdd')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>    
@endif
@if (Session::has('productEdit'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{session('productEdit')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>    
@endif
@if (Session::has('productDelete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{session('productDelete')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>    
@endif

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-10">
                    <h4>Product List</h4>
                </div>
                <div class="col-2 text-right">
                    <a href="{{route('product.add')}}" class="btn btn-primary" role="button"> <i class="fa fa-plus"></i> Add Product</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <table class="table text-center table-hover">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Product</th>
                <th>Price</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              @foreach ($products as $data)
              <tr>
                <td>{{$i++}}</td>
                <?php
                  $productImage = explode(',', $data->images);
                ?>
                <td class="text-left">
                  <img src="{{asset('/storage/product/img') .'/'. $productImage[0]}}" alt="fghfg" width='150'><br>
                  <strong>{{$data->name}}</strong><br>
                  <span class="text-muted">{{$data->description}}</span><br><br>
                  <p><strong>{{count(explode(',', $data->study_materials))}}</strong> study materials, <strong>{{$data->no_of_lectures}}</strong> lectures , <strong>{{$data->number_of_views}}</strong> views </p>
                  <p><strong>Duration</strong> {{$data->duration}} seconds </p>
                  <strong>Validity</strong> {{$data->validity_of_course}} days
                </td>
                
                @if ($data->offered_price)
                  <td width="100px;">
                    <del>&#8377 {{$data->price}}/-</del><br>
                    <strong>&#8377 {{$data->offered_price}}/-</strong>
                  </td>                    
                @else
                  <td width="100px;"><strong>&#8377 {{$data->price}}/-</strong></td>    
                @endif
                <td width="150px;">
                  <div class="row d-flex justify-content-center">
                    <div class="m-3"> <a href="{{route('product.edit', ['id' => $data->id])}}"><i class="fa fa-pen text-warning" title="edit"></i></a> </div>
                    <div class="m-3"> <a href="{{route('product.delete', ['id' => $data->id])}}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash text-danger" title="delete"></i></a> </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <div class="d-flex justify-content-end">
            {{ $products->links() }}
          </div> 
        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

@endsection