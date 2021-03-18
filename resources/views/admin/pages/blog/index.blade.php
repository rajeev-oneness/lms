@extends('admin.index')
@section('title')
    Blogs
@endsection

@section('page-content-name')
    Blogs
@endsection

@section('main-content')

<!-- Small boxes (Stat box) -->
@if (Session::has('blogAdd'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('blogAdd')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>    
@endif
@if (Session::has('blogEdit'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{session('blogEdit')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>    
@endif
@if (Session::has('blogDelete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{session('blogDelete')}}
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
                    <h4>Blog List</h4>
                </div>
                <div class="col-2 text-right">
                    <a href="{{route('blog.add')}}" class="btn btn-primary" role="button"> <i class="fa fa-plus"></i> Add Blog</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive table-striped">
          <table class="table text-center table-hover">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th width="50%">Content</th>
                <th width="">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              @foreach ($blogs as $data)
              <tr>
                <td>{{$i++}}</td>
                <td><img src="{{asset('/storage/blog/img') .'/'. $data->image}}" alt="fghfg" width='50'></td>
                <td>{{$data->title}}</td>
                <td>{{$data->content}}</td>
                <td>
                  <div class="row d-flex justify-content-center">
                    <div class="m-3"> <a href="{{route('blog.edit', ['id' => $data->id])}}"><i class="fa fa-pen text-warning" title="edit"></i></a> </div>
                    <div class="m-3"> <a href="{{route('blog.delete', ['id' => $data->id])}}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash text-danger" title="delete"></i></a> </div>
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
            {{ $blogs->links() }}
          </div> 
        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

@endsection