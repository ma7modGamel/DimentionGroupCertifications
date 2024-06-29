  <style>
.layout-navbar-fixed.sidebar-mini-md.sidebar-collapse .wrapper .brand-link, .layout-navbar-fixed.sidebar-mini-xs.sidebar-collapse .wrapper .brand-link, .layout-navbar-fixed.sidebar-mini.sidebar-collapse .wrapper .brand-link {
    height: calc(4.5rem + 1px) !important;
  
}
  </style>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link navbar-danger" style="text-align: center;">
          <img src='{{asset("admin/assets/images/logo/logo-3.webp")}}'
              style="width: 70px;display: block;margin-left: auto;margin-right: auto;">
          <br>
          <h4 class="brand-text font-weight-light">مجموعة ابعاد المعرفة</h4>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="info">
                  <a href="#" class="d-block">{{auth()->user()->full_name}}</a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  {{--  <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>  --}}
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-4">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item menu-open">
                  <li class="nav-item">
                      <a href="/dashboard" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>
                  <li class="nav-item menu-open">
                
                  </li>
                  <li class="nav-item menu-open">
                    <li class="nav-item">
                      <a href="/categories" class="nav-link">
                            <i class="nav-icon fas fa-ethernet"></i>
                            <p>
                              Categories
                            </p>
                        </a>
                    </li>
                  <li class="nav-item menu-open">
                  <li class="nav-item">
                    <a href="/courses" class="nav-link">
                          <i class="nav-icon fas fa-book"></i>
                          <p>
                              Courses
                          </p>
                      </a>
                  </li>
                  
                  <li class="nav-item menu-open">
                  <li class="nav-item">
                      <a href="/certificates" class="nav-link">
                          <i class="nav-icon fas fa-certificate"></i>
                          <p>
                              Certificates
                          </p>
                      </a>
                    
                      </a>
                  </li>
                  
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">