@extends('admin.index')
@section('title')
    Add banner
@endsection

@section('page-content-name')
    Add banner
@endsection

@section('main-content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-10">
                <h4>Add banner</h4>
            </div>
            <div class="col-2 text-right">
                <a href="{{route('banner.list')}}" class="btn btn-primary" role="button"> <i class="fa fa-file-alt"></i> banner List</a>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{route('banner.store')}}" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputFile">Banner Image</label>
          <div class="input-group">
              <input type="file" name="bannerimage" class="form-control-file @error('bannerimage') is-invalid @enderror" id="exampleInputFile">
              @error('bannerimage')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
          </div>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Add banner</button>
      </div>
    </form>
</div>
<!-- /.card -->
@endsection