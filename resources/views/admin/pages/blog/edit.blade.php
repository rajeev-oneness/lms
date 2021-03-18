@extends('admin.index')
@section('title')
    Edit blogs
@endsection

@section('page-content-name')
    Edit Blog
@endsection

@section('main-content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-10">
                <h4>Edit Blog</h4>
            </div>
            <div class="col-2 text-right">
                <a href="{{route('blog.list')}}" class="btn btn-primary" role="button"> <i class="fa fa-file-alt"></i> Blog List</a>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{route('blog.update')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="blogId" value="{{$blog->id}}">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$blog->title}}" placeholder="Blog Title...">
          @error('title')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Content</label>
          <textarea name="content" class="form-control @error('content') is-invalid @enderror" placeholder="Blog content..." cols="30" rows="5">{{$blog->content}}</textarea>
          @error('content')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Blog Image</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" name="blogimage" class="form-control-file @error('blogimage') is-invalid @enderror" id="exampleInputFile">
              @error('blogimage')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="input-group-append">
              <span class="input-group-text">
                <img src="{{asset('/storage/blog/img') .'/'. $blog->image}}" alt="fghfg" width='50'>
              </span>
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
@endsection