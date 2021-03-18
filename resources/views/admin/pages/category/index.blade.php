@extends('admin.index')
@section('title')
    Categories
@endsection

@section('page-content-name')
    Categories
@endsection

@section('main-content')

<!-- Small boxes (Stat box) -->
@if (Session::has('categoryAdd'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('categoryAdd')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>    
@endif
@if (Session::has('categoryEdit'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{session('categoryEdit')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>    
@endif
@if (Session::has('categoryDelete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{session('categoryDelete')}}
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
                    <h4>Categories List</h4>
                </div>
                <div class="col-2 text-right">
                    <a href="{{route('category.add')}}" class="btn btn-primary" role="button"> <i class="fa fa-plus"></i> Add category</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive table-striped">
          <table class="table text-center table-hover">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Image</th>
                <th>Short Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              @foreach ($categories as $data)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$data->name}}</td>
                <td><img src="{{asset('/storage/category/img') .'/'. $data->image}}" alt="fghfg" width='100'></td>
                <td>{{$data->short_description}}</td>
                <td>
                  <div class="row d-flex justify-content-center">
                    <div class="m-3"> <a href="{{route('category.edit', ['id' => $data->id])}}"><i class="fa fa-pen text-warning" title="edit"></i></a> </div>
                    <div class="m-3"> <a href="{{route('category.delete', ['id' => $data->id])}}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash text-danger" title="delete"></i></a> </div>
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
            {{ $categories->links() }}
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

@endsection