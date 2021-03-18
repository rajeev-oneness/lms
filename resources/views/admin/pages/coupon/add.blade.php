@extends('admin.index')
@section('title')
    Add coupon
@endsection

@section('page-content-name')
    Add Coupon
@endsection

@section('main-content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-10">
                <h4>Add Coupon</h4>
            </div>
            <div class="col-2 text-right">
                <a href="{{route('coupon.list')}}" class="btn btn-primary" role="button"> <i class="fa fa-file-alt"></i> Coupon List</a>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{route('coupon.store')}}" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="row">
          <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Code</label>
            <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" placeholder="Coupon code...">
            @error('code')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
          <div class="form-group col-md-4">
            <label for="type">Type</label>
            <select name="type" class="custom-select @error('type') is-invalid @enderror" id="type">
              <option value="">- select a coupon type -</option>
              <option value="1">Flat Rate</option>
              <option value="2">Percentage</option>
            </select>
            @error('type')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
          <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Rate</label>
            <input type="number" name="rate" id="rate" class="form-control @error('rate') is-invalid @enderror" placeholder="Coupon rate...">
            @error('rate')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Maximum User</label>
            <input type="number" name="max_user" id="max_user" class="form-control @error('max_user') is-invalid @enderror" placeholder="Coupon maximum user...">
            @error('max_user')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Maximum time a user can use</label>
            <input type="number" name="max_time_a_user_can_use" id="max_time_a_user_can_use" class="form-control @error('max_time_a_user_can_use') is-invalid @enderror" placeholder="Maximum time a user can use this coupon...">
            @error('max_time_a_user_can_use')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Add coupon</button>
      </div>
    </form>
</div>
<!-- /.card -->
@endsection