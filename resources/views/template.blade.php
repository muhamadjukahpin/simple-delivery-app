<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{$title}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminLTE3')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('adminLTE3')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('adminLTE3')}}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('adminLTE3')}}/plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminLTE3')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('adminLTE3')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('adminLTE3')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminLTE3')}}/dist/css/adminlte.min.css">
  @stack('style')
</head>
<body class="hold-transition sidebar-mini layout-fixed text-sm">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/contact" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
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
              <img src="{{asset('adminLTE3')}}/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
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
              <img src="{{asset('adminLTE3')}}/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
              <img src="{{asset('adminLTE3')}}/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
          <span class="dropdown-item dropdown-header">15 Notifications</span>
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
    <a href="#" class="brand-link">
      <img src="{{asset('adminLTE3')}}/dist/img/user2-160x160.jpg" alt="Logo divisima" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Divisima</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminLTE3')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
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
               @if (Auth::user()->level == 'admin')
                {{-- Nav Dashboard --}}
                <li class="nav-item">
                  <a href="/admin/dashboard"class="nav-link {{ request()->is('admin/dashboard') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Dashboard
                    </p>
                  </a>
                </li>
                {{-- Nav End Dashboard --}}
                {{-- Nav Countries --}}
                <li class="nav-item">
                  <a href="/admin/countries"class="nav-link {{ request()->is('admin/countries') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-globe-asia"></i>
                    <p>
                      Countries
                    </p>
                  </a>
                </li>
                {{-- Nav End Countries --}}
               @endif

          {{-- Nav Ports --}}
          <li class="nav-item {{(request()->is('operator/ports') || request()->is('operator/ports/create')) ? 'menu-open' : ''}}">
              <a href="#" class="nav-link {{ (request()->is('operator/ports') || request()->is('operator/ports/create')) ? 'active' : ''}}">
              <i class="nav-icon fas fa-water"></i>
              <p>
                Ports
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/operator/ports" class="nav-link {{request()->is('operator/ports') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Ports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/operator/ports/create" class="nav-link {{request()->is('operator/ports/create') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Port</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- Nav End Ports --}}
          {{-- Nav Containers --}}
          <li class="nav-item {{(request()->is('operator/containers') || request()->is('operator/containers/create')) ? 'menu-open' : ''}}">
              <a href="#" class="nav-link {{ (request()->is('operator/containers') || request()->is('operator/containers/create')) ? 'active' : ''}}">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                Containers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/operator/containers" class="nav-link {{request()->is('operator/containers') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Containers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/operator/containers/create" class="nav-link {{request()->is('operator/containers/create') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Container</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- Nav End Containers --}}
          {{-- Nav Cargo Ships --}}
          <li class="nav-item {{(request()->is('operator/cargo_ships') || request()->is('operator/cargo_ships/create')) ? 'menu-open' : ''}}">
              <a href="#" class="nav-link {{ (request()->is('operator/cargo_ships') || request()->is('operator/cargo_ships/create')) ? 'active' : ''}}">
              <i class="nav-icon fas fa-ship"></i>
              <p>
                Cargo Ships
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/operator/cargo_ships" class="nav-link {{request()->is('operator/cargo_ships') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Cargo Ships</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/operator/cargo_ships/create" class="nav-link {{request()->is('operator/cargo_ships/create') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Cargo Ship</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- Nav End Cargo Ships --}}
          {{-- Nav Delivery --}}
          <li class="nav-item {{(request()->is('operator/deliveries') || request()->is('operator/deliveries/create')) ? 'menu-open' : ''}}">
              <a href="#" class="nav-link {{ (request()->is('operator/deliveries') || request()->is('operator/deliveries/create')) ? 'active' : ''}}">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Deliveries
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/operator/deliveries" class="nav-link {{request()->is('operator/deliveries') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Delivery</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/operator/deliveries/create" class="nav-link {{request()->is('operator/deliveries/create') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Delivery</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- Nav End Delivery --}}


          {{-- Nav Logout --}}
          <li class="nav-item">
            <a href="#" data-toggle="modal" data-target="#logoutModal" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          {{-- Nav End Logout --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  @yield('content')

  <footer class="main-footer">
    <strong>Copyright &copy; {{date('Y')}} <a href="/">Advisima</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
 <!-- Delete Modal-->
 <div class="modal modal-delete fade show" id="deleteModal" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog" style="padding-right: 15px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button class="close btn-close-delete" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="icon-close">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Delete" below if you are sure for delete data</div>
      <div class="modal-footer">
        <button class="btn btn-secondary btn-cancel-delete" type="button" data-dismiss="modal">Cancel</button>
        <form action="" method="POST" class="d-inline-block form-delete">
          @csrf
          @method('delete')
          <button type="submit" class="d-flex btn btn-danger btn-delete">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- End Delete Modal --}}
 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="btn btn-primary" type="submit">Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- End Logout Modal --}}

<!-- jQuery -->
<script src="{{asset('adminLTE3')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminLTE3')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('adminLTE3')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('adminLTE3')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('adminLTE3')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('adminLTE3')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('adminLTE3')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('adminLTE3')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('adminLTE3')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('adminLTE3')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('adminLTE3')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('adminLTE3')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('adminLTE3')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('adminLTE3')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('adminLTE3')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('adminLTE3')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('adminLTE3')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('adminLTE3')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('adminLTE3')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminLTE3')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminLTE3')}}/dist/js/demo.js"></script>
<script>
    // For data table
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false, "ordering": false,"paging": true,"info": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');;
    });

    $(document).ready(function(){
      // For image in CU (Create and Update)
      const img = document.querySelector('#image');
      if (img) {
        img.addEventListener('change', function () {
            let imgPreview = document.querySelector('.img-preview');
            const labelImg = document.querySelector('.custom-file-label');
            labelImg.textContent = img.files[0].name;
            const fileImg = new FileReader();
            fileImg.readAsDataURL(img.files[0]);
            fileImg.onload = function (e) {
                imgPreview.src = e.target.result;
            }
        });
      }

      // For modal delete

      document.addEventListener('click',function(e){
        if(e.target.classList.contains('delete') || e.target.classList.contains('fa-trash')){
          e.preventDefault();
          const modalDelete = document.querySelector('.modal-delete');
          const formDelete = document.querySelector('.form-delete');
          modalDelete.classList.toggle('d-block');
          formDelete.action = e.target.dataset.url_delete;
        } else if(e.target.classList.contains('btn-cancel-delete')){
          e.preventDefault();
          const modalDelete = document.querySelector('.modal-delete');
          modalDelete.classList.toggle('d-block');
        } else if(e.target.classList.contains('icon-close') || e.target.classList.contains('btn-close-delete')){
          e.preventDefault();
          const modalDelete = document.querySelector('.modal-delete');
          modalDelete.classList.toggle('d-block');

        }

      });

    });
  </script>
  @stack('script')
</body>
</html>