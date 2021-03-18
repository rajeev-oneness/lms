@extends('admin.index')
@section('title')
    Coupons
@endsection

@section('page-content-name')
    Coupons
@endsection

@section('main-content')

<!-- Small boxes (Stat box) -->
@if (Session::has('couponAdd'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('couponAdd')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>    
@endif
@if (Session::has('couponEdit'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{session('couponEdit')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>    
@endif
@if (Session::has('couponDelete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{session('couponDelete')}}
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
                    <h4>coupons List</h4>
                </div>
                <div class="col-2 text-right">
                    <a href="{{route('coupon.add')}}" class="btn btn-primary" role="button"> <i class="fa fa-plus"></i> Add coupon</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive table-striped">
          <table class="table text-center table-hover">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Code</th>
                <th>Type</th>
                <th>Max user</th>
                <th>Max use by a user</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              @foreach ($coupons as $data)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$data->code}}</td>
                <td>
                  @if ($data->type == '1')
                      Flat Rate
                  @else
                      Percentage
                  @endif
                </td>
                <td>{{$data->max_user}}</td>
                <td>{{$data->max_time_a_user_can_use}}</td>
                <td>
                  <div class="row d-flex justify-content-center">
                    <div class="m-3"> <a href="{{route('coupon.edit', ['id' => $data->id])}}"><i class="fa fa-pen text-warning" title="edit"></i></a> </div>
                    <div class="m-3"> <a href="{{route('coupon.delete', ['id' => $data->id])}}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash text-danger" title="delete"></i></a> </div>
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
            {{ $coupons->links() }}
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

@endsection