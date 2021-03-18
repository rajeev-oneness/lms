@extends('admin.index')
@section('title')
    Banners
@endsection

@section('page-content-name')
    Banners
@endsection

@section('main-content')

<!-- Small boxes (Stat box) -->
@if (Session::has('bannerAdd'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('bannerAdd')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>    
@endif
@if (Session::has('bannerEdit'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{session('bannerEdit')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>    
@endif
@if (Session::has('bannerDelete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{session('bannerDelete')}}
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
                    <h4>banners List</h4>
                </div>
                <div class="col-2 text-right">
                    <a href="{{route('banner.add')}}" class="btn btn-primary" role="button"> <i class="fa fa-plus"></i> Add banner</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered text-center">
            <thead>
              <tr>
                <th>#</th>
                <th width="80%">Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              @foreach ($banners as $data)
              <tr>
                <td>{{$i++}}</td>
                <td><img src="{{asset('/storage/banner/img') .'/'. $data->image}}" alt="fghfg" width='300'></td>
                <td>
                  <div class="row d-flex justify-content-center">
                    <div class="m-3"> <a href="{{route('banner.edit', ['id' => $data->id])}}"><i class="fa fa-pen text-warning" title="edit"></i></a> </div>
                    <div class="m-3"> <a href="{{route('banner.delete', ['id' => $data->id])}}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash text-danger" title="delete"></i></a> </div>
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
            {{ $banners->links() }}
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

@endsection