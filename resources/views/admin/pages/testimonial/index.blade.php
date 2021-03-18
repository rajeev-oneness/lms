@extends('admin.index')
@section('title')
    Testimonials
@endsection

@section('page-content-name')
    Testimonials
@endsection

@section('main-content')

<!-- Small boxes (Stat box) -->
@if (Session::has('testiAdd'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('testiAdd')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>    
@endif
@if (Session::has('testiEdit'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{session('testiEdit')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>    
@endif
@if (Session::has('testiDelete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{session('testiDelete')}}
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
                    <h4>Testimonials List</h4>
                </div>
                <div class="col-2 text-right">
                    <a href="{{route('testimonial.add')}}" class="btn btn-primary" role="button"> <i class="fa fa-plus"></i> Add Testimonial</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive table-striped">
          <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Title</th>
                <th width="50%">Content</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              @foreach ($testimonials as $data)
              <tr>
                <td>{{$i++}}</td>
                <td><img src="{{asset('/storage/testimonial/img') .'/'. $data->image}}" alt="fghfg" width='50'></td>
                <td style="word-wrap: break-word;">{{$data->name}}</td>
                <td style="word-wrap: break-word;">{{$data->title}}</td>
                <td style="word-wrap: break-word;">{{$data->content}}</td>
                <td>
                  <div class="row d-flex justify-content-center">
                    <div class="m-3"> <a href="{{route('testimonial.edit', ['id' => $data->id])}}"><i class="fa fa-pen text-warning" title="edit"></i></a> </div>
                    <div class="m-3"> <a href="{{route('testimonial.delete', ['id' => $data->id])}}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash text-danger" title="delete"></i></a> </div>
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
            {{ $testimonials->links() }}
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

@endsection