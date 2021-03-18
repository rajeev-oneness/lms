@extends('admin.index')
@section('title')
    Edit category
@endsection

@section('page-content-name')
    Edit category
@endsection

@section('main-content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-10">
                <h4>Edit category</h4>
            </div>
            <div class="col-2 text-right">
                <a href="{{route('category.list')}}" class="btn btn-primary" role="button"> <i class="fa fa-file-alt"></i> Category List</a>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{route('category.update')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="categoryId" value="{{$category->id}}">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" name="name" value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Category name...">
          @error('name')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="exampleInputFile">category Image</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" name="categoryimage" class="form-control-file @error('categoryimage') is-invalid @enderror" id="exampleInputFile">
              @error('categoryimage')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="input-group-append">
              <span class="input-group-text">
                <img src="{{asset('/storage/category/img') .'/'. $category->image}}" alt="fghfg" width='300'>
              </span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Short Description</label>
          <textarea name="shortdescription" class="form-control @error('shortdescription') is-invalid @enderror" placeholder="Short description..." cols="30" rows="5">{{$category->short_description}}</textarea>
          @error('shortdescription')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
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