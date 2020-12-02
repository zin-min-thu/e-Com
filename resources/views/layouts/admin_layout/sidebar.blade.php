<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset ('images/admin_images/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">E-Com</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset ('images/admin_images/admin_photos/'.Auth::guard('admin')->user()->image)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{url('admin/settings')}}" class="d-block">{{ucwords(Auth::guard('admin')->user()->name)}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{url('admin/dashboard')}}" class="nav-link {{request()->is('admin/dashboard') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{request()->is(['admin/update-password','admin/update-detail']) ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{request()->is(['admin/update-password','admin/update-detail']) ? 'active' : ''}}">
            <i class="nav-icon fa fa-user-circle fa-5x"></i>
              <p>
                Admin Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/update-password')}}" class="nav-link {{request()->is('admin/update-password') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/update-detail')}}" class="nav-link {{request()->is('admin/update-detail') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Detail</p>
                </a>
              </li>
            </ul>
          </li>
          <li
            class="nav-item has-treeview {{request()->is(
              [
                'admin/sections',
                'admin/brands','admin/brands/*',
                'admin/categories','admin/categories/*',
                'admin/products','admin/products/*',
                'admin/bunners','admin/bunners/*',
              ]) ? 'menu-open' : ''}}"
          >
            <a href="#" class="nav-link {{request()->is(
              [
                'admin/sections',
                'admin/brands','admin/brands/*',
                'admin/categories','admin/categories/*',
                'admin/products','admin/products/*',
                'admin/bunners','admin/bunners/*',
              ]) ? 'active' : ''}}"
            >
            <i class="nav-icon fas fa-th"></i>
              <p>
                Catalogues
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/sections')}}" class="nav-link {{request()->is('admin/sections') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sections</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/brands')}}" class="nav-link {{request()->is(['admin/brands', 'admin/brands/*']) ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brands</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/categories')}}" class="nav-link {{request()->is(['admin/categories','admin/categories/*']) ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/products')}}" class="nav-link {{request()->is(['admin/products','admin/products/*']) ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/bunners')}}" class="nav-link {{request()->is(['admin/bunners','admin/bunners/*']) ? 'active' : ''}}">
                  <i class="far fa-circle  nav-icon"></i>
                  <p>Bunners</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{request()->is(['admin/admins','admin/admins/*','admin/roles','admin/roles/*']) ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{request()->is(['admin/admins','admin/admins/*','admin/roles','admin/roles/*']) ? 'active' : ''}}">
            <i class="nav-icon fa fa-cog"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/admins')}}" class="nav-link {{request()->is(['admin/admins','admin/admins/*']) ? 'active' : ''}}">
                  <i class="far fa-user nav-icon"></i>
                  <p>Admin Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/roles')}}" class="nav-link {{request()->is(['admin/roles','admin/roles/*']) ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>