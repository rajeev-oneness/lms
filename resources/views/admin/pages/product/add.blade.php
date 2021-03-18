@extends('admin.index')
@section('title')
    Add products
@endsection

@section('page-content-name')
    Add Product
@endsection

@section('main-content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-10">
                <h4>Add Product</h4>
            </div>
            <div class="col-2 text-right">
                <a href="{{route('product.list')}}" class="btn btn-primary" role="button"> <i class="fa fa-file-alt"></i> Product List</a>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
        @csrf
      <div class="card-body">

        <div class="form-group">
          <label for="exampleInputPassword1">Name</label>
          <textarea name="name" class="form-control @error('name') is-invalid @enderror" placeholder="product name..." cols="30" rows="2"></textarea>
          @error('name')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>

        <div class="row">
          <div class="form-group col-md-3">
            <label for="productCategory">Category</label>
            <select name="category_id" id="productCategory" class="form-control form-select @error('category_id') is-invalid @enderror" aria-label="Default select example">
                  <option>- Select any category -</option>
              @foreach ($categories as $cat)
                  <option value="{{$cat->id}}">{{$cat->name}}</option>
              @endforeach
            </select>
            @error('category_id')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
  
          <div class="form-group col-md-2">
            <label for="exampleInputEmail1">Duration <span class="text-muted">(in seconds)</span> </label>
            <input type="number" name="duration" class="form-control @error('duration') is-invalid @enderror" placeholder="Course duration...">
            @error('duration')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
  
          <div class="form-group col-md-2">
            <label for="exampleInputEmail1">Number of lectures</label>
            <input type="number" name="no_of_lectures" class="form-control @error('no_of_lectures') is-invalid @enderror">
            @error('no_of_lectures')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
  
          <div class="form-group col-md-2">
            <label for="exampleInputEmail1">Number of views</label>
            <input type="number" name="number_of_views" class="form-control @error('number_of_views') is-invalid @enderror">
            @error('number_of_views')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
  
          <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Validity of course <span class="text-muted">(in days)</span></label>
            <input type="number" name="validity_of_course" class="form-control @error('validity_of_course') is-invalid @enderror">
            @error('validity_of_course')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label for="exampleInputFile">Intro video link</label>
            <div class="input-group">
              {{-- <div class="custom-file"> --}}
                <input type="file" name="intro_video_link" class="form-control-file @error('intro_video_link') is-invalid @enderror" id="exampleInputFile">
                @error('intro_video_link')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
              {{-- </div> --}}
            </div>
          </div>

          <div class="form-group col-md-6">
            <label for="exampleInputFile">Images</label>
            <div class="input-group">
              {{-- <div class="custom-file"> --}}
                <input type="file" name="images[]" multiple class="form-control-file @error('images') is-invalid @enderror" id="exampleInputFile">
                @error('images')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
              {{-- </div> --}}
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Description</label>
          <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="product description..." cols="30" rows="5"></textarea>
          @error('description')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label for="mode">Mode</label>
            <select name="mode" id="mode" class="form-control form-select @error('mode') is-invalid @enderror" aria-label="Default select example">
              <option selected>Select a product mode</option>
              <option value="1">link</option>
              <option value="2">google drive</option>
              <option value="3">mobile</option>
              <option value="4">pen drive</option>
            </select>
            @error('mode')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
  
          <div class="form-group col-md-6">
            <label for="language">language</label>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="English" name='language[]' id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                English
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="Bengali" name='language[]' id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Bengali
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="Hndi" name='language[]' id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Hndi
              </label>
            </div>
            @error('language')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">System specification</label>
          <textarea name="system_specification" class="form-control @error('system_specification') is-invalid @enderror" placeholder="System specification..." cols="30" rows="5"></textarea>
          @error('system_specification')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Price <span class="text-muted">(in ruppees)</span> </label>
            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Course price...">
            @error('price')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
  
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Offered Price <span class="text-muted">(in ruppees)</span> </label>
            <input type="number" name="offered_price" class="form-control @error('offered_price') is-invalid @enderror" placeholder="Course offered price...">
            @error('offered_price')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Course queries</label>
          <textarea name="course_queries" class="form-control @error('course_queries') is-invalid @enderror" placeholder="System specification..." cols="30" rows="5"></textarea>
          @error('course_queries')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="exampleInputFile">Study Materials</label>
          <div class="input-group">
            {{-- <div class="custom-file"> --}}
              <input type="file" name="study_materials[]" multiple class="form-control-file @error('study_materials') is-invalid @enderror" id="exampleInputFile">
              @error('study_materials')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            {{-- </div> --}}
          </div>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Technical support</label>
          <input type="text" name="technical_support" class="form-control @error('technical_support') is-invalid @enderror" placeholder="Course technical support...">
          @error('technical_support')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Add this Product</button>
      </div>
    </form>
</div>
<!-- /.card -->
@endsection

