@extends('admin.index')
@section('title')
    Homepage
@endsection

@section('page-content-name')
    Dashboard
@endsection

@section('main-content')

<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{$users}}</h3>

        <p>Total Users</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-people"></i>
      </div>
      <a href="{{route('user.list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{$products}}</h3>

        <p>Total Products</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="{{route('product.list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-dark">
      <div class="inner">
        <h3>{{$coupons}}</h3>

        <p>Total Coupons</p>
      </div>
      <div class="icon">
        <i class="fas fa-ticket-alt"></i>
      </div>
      <a href="{{route('coupon.list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$blogs}}</h3>

          <p>Total Blogs</p>
        </div>
        <div class="icon">
          <i class="ion ion-document-text"></i>
        </div>
        <a href="{{route('blog.list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-secondary">
        <div class="inner">
          <h3>{{$testimonials}}</h3>

          <p>Testimonials</p>
        </div>
        <div class="icon">
          <i class="ion ion-android-hangout"></i>
        </div>
        <a href="{{route('testimonial.list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{$faqs}}</h3>

          <p>FAQs</p>
        </div>
        <div class="icon">
          <i class="ion ion-ios-help"></i>
        </div>
        <a href="{{route('faq.list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{$banners}}</h3>

          <p>Banners</p>
        </div>
        <div class="icon">
          <i class="ion ion-android-image"></i>
        </div>
        <a href="{{route('banner.list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->

@endsection