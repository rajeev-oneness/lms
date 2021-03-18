@extends('admin.index')
@section('title')
    Users
@endsection

@section('page-content-name')
    Users
@endsection

@section('main-content')

<!-- Small boxes (Stat box) -->
@if (Session::has('userAdd'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('userAdd')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>    
@endif
@if (Session::has('userEdit'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{session('userEdit')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>    
@endif
@if (Session::has('userDelete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{session('userDelete')}}
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
                    <h4>user List</h4>
                </div>
                <div class="col-2 text-right">
                    <a href="{{route('user.add')}}" class="btn btn-primary" role="button"> <i class="fa fa-plus"></i> Add user</a>
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
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th width="">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              @foreach ($users as $data)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->mobile}}</td>
                <td style="text-align: left;">
                  {{$data->address}} <br>
                  {{$data->city}}, {{$data->state}}, {{$data->country}}</br>
                  pin. {{$data->pin}}</br>
                </td>
                <td>
                  <div class="row d-flex justify-content-center">
                    <div class="m-3"> <a href="{{route('user.edit', ['id' => $data->id])}}"><i class="fa fa-pen text-warning" title="edit"></i></a> </div>
                    <div class="m-3"> <a href="{{route('user.delete', ['id' => $data->id])}}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash text-danger" title="delete"></i></a> </div>
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
            {{ $users->links() }}
          </div> 
        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

@endsection