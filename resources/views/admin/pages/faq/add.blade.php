@extends('admin.index')
@section('title')
    Add FAQ
@endsection

@section('page-content-name')
    Add FAQ
@endsection

@section('main-content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-10">
                <h4>Add FAQ</h4>
            </div>
            <div class="col-2 text-right">
                <a href="{{route('faq.list')}}" class="btn btn-primary" role="button"> <i class="fa fa-file-alt"></i> FAQ List</a>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{route('faq.store')}}" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="FAQ Title...">
          @error('title')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Content</label>
          <textarea name="content" class="form-control @error('content') is-invalid @enderror" placeholder="FAQ content..." cols="30" rows="5"></textarea>
          @error('content')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Add FAQ</button>
      </div>
    </form>
</div>
<!-- /.card -->
@endsection