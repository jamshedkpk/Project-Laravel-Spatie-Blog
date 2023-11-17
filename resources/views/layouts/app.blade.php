<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css')}}">  
  <script src="{{asset('template/sweetalert/sweetalert.js')}}"></script>
  <script src="{{asset('template/ImageUploader/js/jquery-3.2.1.min.js')}}"></script>
  <script src="{{asset('template/ImageUploader/script.js')}}"></script>
  <style>
.table tr th, .table tr td
{
text-align:center;
vertical-align: middle;
}
</style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('dashboard')}}" class="nav-link">Dashboard</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('template/dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('template/dist/img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('template/dist/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   @role('admin')
   <a href="{{route('admin-dashboard')}}" class="brand-link">
       <img src="{{asset('template/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
       <span class="brand-text font-weight-light">
        {{ Auth::user()->name }} 
       </span>
     </a>  
   @endrole
   @role('user')
   <a href="{{route('user-dashboard')}}" class="brand-link">
       <img src="{{asset('template/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
       <span class="brand-text font-weight-light">
        {{ Auth::user()->name }} 
        khan
       </span>
     </a>  
   @endrole
  <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('template/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        @role('admin')
          <a href="{{route('admin-dashboard')}}" class="d-block">
            {{Auth::user()->name}}
          </a>
        @endrole 
        @role('user')
          <a href="{{route('user-dashboard')}}" class="d-block">
            {{Auth::user()->name}}
          </a>
        @endrole 
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
                @role('admin')
               <li class="nav-item">
                <a href="#" class="nav-link {{(request()->is('admin/role')) ? 'active' : ''}}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Roles
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('admin-role-index')}}" class="nav-link {{(request()->is('admin/role')) ? 'active' : ''}}">
                      <i class="far fa-eye"></i>
                      &nbsp;
                      <p>View Roles</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('admin-role-create')}}" class="nav-link {{(request()->is('admin/role/create')) ? 'active' : ''}}">
                      <i class="fa fa-plus"></i>
                      &nbsp;
                      <p>Add Role</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link {{(request()->is('admin/permission')) ? 'active' : ''}}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Permissions
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('admin-permission-index')}}" class="nav-link {{(request()->is('admin/permission')) ? 'active' : ''}}">
                      <i class="far fa-eye"></i>
                      &nbsp;
                      <p>View Permissions</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('admin-permission-create')}}" class="nav-link {{(request()->is('admin/user/create')) ? 'active' : ''}}">
                      <i class="fa fa-plus"></i>
                      &nbsp;
                      <p>Add Permission</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link {{(request()->is('admin/user')) ? 'active' : ''}}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Users
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('admin-user-index')}}" class="nav-link {{(request()->is('admin/user')) ? 'active' : ''}}">
                      <i class="far fa-eye"></i>
                      &nbsp;
                      <p>View Users</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('admin-user-create')}}" class="nav-link {{(request()->is('admin/user/create')) ? 'active' : ''}}">
                      <i class="fa fa-plus"></i>
                      &nbsp;
                      <p>Add User</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link {{(request()->is('admin/category')) ? 'active' : ''}}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Categories
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('admin-category-index')}}" class="nav-link {{(request()->is('admin/category')) ? 'active' : ''}}">
                      <i class="far fa-eye"></i>
                      &nbsp;
                      <p>View Categories</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('admin-user-create')}}" class="nav-link {{(request()->is('admin/user/create')) ? 'active' : ''}}">
                      <i class="fa fa-plus"></i>
                      &nbsp;
                      <p>Add User</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link {{(request()->is('admin/post')) ? 'active' : ''}}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Posts
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('admin-post-index')}}" class="nav-link {{(request()->is('admin/category')) ? 'active' : ''}}">
                      <i class="far fa-eye"></i>
                      &nbsp;
                      <p>View Posts</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('admin-post-create')}}" class="nav-link {{(request()->is('admin/post/create')) ? 'active' : ''}}">
                      <i class="fa fa-plus"></i>
                      &nbsp;
                      <p>Add Post</p>
                    </a>
                  </li>
                </ul>
              </li>
              @endrole
              @role('user')
              <li class="nav-item">
                <a href="#" class="nav-link {{(request()->is('user/category')) ? 'active' : ''}}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Categories
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('user-category-index')}}" class="nav-link {{(request()->is('user/category')) ? 'active' : ''}}">
                      <i class="far fa-eye"></i>
                      &nbsp;
                      <p>View Categories</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('user-category-create')}}" class="nav-link {{(request()->is('user/category/create')) ? 'active' : ''}}">
                      <i class="fa fa-plus"></i>
                      &nbsp;
                      <p>Add Category</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link {{(request()->is('user/post')) ? 'active' : ''}}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Posts
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('user-post-index')}}" class="nav-link {{(request()->is('user/category')) ? 'active' : ''}}">
                      <i class="far fa-eye"></i>
                      &nbsp;
                      <p>View Posts</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('user-post-create')}}" class="nav-link {{(request()->is('user/post/create')) ? 'active' : ''}}">
                      <i class="fa fa-plus"></i>
                      &nbsp;
                      <p>Add Post</p>
                    </a>
                  </li>
                </ul>
              </li>

              @endrole
              <li class="nav-item">
            <form action="{{route('logout')}}" method="post">
                @csrf
            <button class="btn btn-danger w-100">
                Log Out
            </button>
            </form>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    {{ $slot }}
    </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer text-light text-center" style="background-color:gray;">
    <!-- Default to the left -->
    <strong>
    All Rights Are Reserved By Govt !
    </strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('template/dist/js/adminlte.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('template/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('template/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('template/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('template/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('template/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script>
   $(function () {
    $("#table").DataTable({
      "responsive": true,
      "lengthChange": true, 
      "paging": true,
      "searching": true,
      "ordering": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
  });
 </script>
  
</body>
</html>
