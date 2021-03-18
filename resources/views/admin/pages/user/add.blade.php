@extends('admin.index')
@section('title')
    Add users
@endsection

@section('page-content-name')
    Add user
@endsection

@section('main-content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-10">
                <h4>Add user</h4>
            </div>
            <div class="col-2 text-right">
                <a href="{{route('user.list')}}" class="btn btn-primary" role="button"> <i class="fa fa-file-alt"></i> User List</a>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{route('user.store')}}">
        @csrf
      <div class="card-body">
        <div class="row">
          <div class="form-group col-4">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="user name...">
            @error('name')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
  
          <div class="form-group col-4">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="user email...">
            @error('email')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>

          <div class="form-group col-4">
            <label for="exampleInputPassword1">phone</label>
            <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="user phone number...">
            @error('phone')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
        </div>

        <div class="row">
          <div class="form-group col-6">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password" autocomplete="new-password">
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
  
          <div class="form-group col-6">
            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">
          </div>
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Address</label>
          <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="user address ...">
          @error('address')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>

        <div class="row">
          <div class="form-group col-md-3">
            <label for="exampleInputPassword1">City</label>
            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" placeholder="user city ...">
            @error('city')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
  
          <div class="form-group col-md-3">
            <label for="exampleInputPassword1">State</label>
            <input type="text" name="state" class="form-control @error('state') is-invalid @enderror" placeholder="user state ...">
            @error('state')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
  
          <div class="form-group col-md-3">
            <label for="exampleInputPassword1">Country</label>
            <input type="text" name="country" class="form-control @error('country') is-invalid @enderror" placeholder="user country ...">
            @error('country')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
  
          <div class="form-group col-md-3">
            <label for="exampleInputPassword1">pin</label>
            <input type="number" name="pin" class="form-control @error('pin') is-invalid @enderror" placeholder="user pin ...">
            @error('pin')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
        </div>
        
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
</div>
<!-- /.card -->
@endsection