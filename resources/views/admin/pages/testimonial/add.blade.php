@extends('admin.index')
@section('title')
    Add testimonial
@endsection

@section('page-content-name')
    Add Testimonial
@endsection

@section('main-content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-10">
                <h4>Add Testimonial</h4>
            </div>
            <div class="col-2 text-right">
                <a href="{{route('testimonial.list')}}" class="btn btn-primary" role="button"> <i class="fa fa-file-alt"></i> Testimonial List</a>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{route('testimonial.store')}}" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Client Name...">
          @error('name')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Testimonial Title...">
          @error('title')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Content</label>
          <textarea name="content" class="form-control @error('content') is-invalid @enderror" placeholder="Testimonial content..." cols="30" rows="5"></textarea>
          @error('content')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Testimonial Image</label>
          <div class="input-group">
            {{-- <div class="custom-file"> --}}
              <input type="file" name="testimonialimage" class="form-control-file @error('testimonialimage') is-invalid @enderror" id="exampleInputFile">
              @error('testimonialimage')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            {{-- </div> --}}
          </div>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Add Testimonial</button>
      </div>
    </form>
</div>
<!-- /.card -->
@endsection