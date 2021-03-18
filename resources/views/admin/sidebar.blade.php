
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('/admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Auth::user()->name}}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{route('home')}}" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              User Management
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('user.list')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Users</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('user.add')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add user</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-store"></i>
            <p>
              Product Management
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('product.list')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Products</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('product.add')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add product</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-ticket-alt"></i>
            <p>
              Coupon Management
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('coupon.list')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Coupons</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('coupon.add')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add coupon</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-rss-square"></i>
            <p>
              Blog Management
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('blog.list')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Blogs</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('blog.add')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Blog</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-comment-dots"></i>
            <p>
              Testimonial Management
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('testimonial.list')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Testimonials</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('testimonial.add')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Testimonial</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-question-circle"></i>
            <p>
              FAQ Management
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('faq.list')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>FAQs</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('faq.add')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add FAQ</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-images"></i>
            <p>
              Banner Management
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('banner.list')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>banners</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('banner.add')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add banner</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Category Management
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('category.list')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>categories</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('category.add')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add category</p>
              </a>
            </li>
          </ul>
        </li>
        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
