<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}} | PENGADUAN COVID</title>
    <link rel="icon" type="image/x-icon" href="{{asset('/assets/dist/img/logo-rs-baru.png')}}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/')}}assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{asset('/')}}assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('/')}}assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('/')}}assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/')}}assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('/')}}assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('/')}}assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('/')}}assets/plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('/')}}assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{asset('/')}}assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{asset('/')}}assets/plugins/bs-stepper/css/bs-stepper.min.css">
</head>
@php
    $nomor = DB::table('setting')->where('kode','call_darurat')->pluck('value');
@endphp
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center" style="opacity: .7;">
            <img class="animation__shake" src="{{asset('/assets/dist/img/logo-rs-baru.png')}}" alt="RS Bandung" height="60"
                width="60">
        </div>

        <!-- Navbar -->
        @if(Auth::check())
        <nav class="main-header navbar navbar-expand navbar-white navbar-light ml-0">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">
                        <img src="{{asset('/assets/dist/img/logo-rs-baru.png')}}" class="img-fluid" width="20px" alt="">
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{url('/home')}}" class="nav-link {{(URL::current() == url('/home')) ? 'active' : ''}}">BERANDA</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block {{(URL::current() == url('/pasien')) ? 'active' : ''}}">
                    <a href="{{url('/pasien')}}" class="nav-link">PASIEN</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block {{(URL::current() == url('/diagnosis')) ? 'active' : ''}}">
                    <a href="{{url('/diagnosis')}}" class="nav-link">DIAGNOSIS</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block {{(URL::current() == url('/pengaduan')) ? 'active' : ''}}">
                    <a href="{{url('/pengaduan')}}" class="nav-link">PENGADUAN</a>
                </li>
                
                
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                

                <!-- Messages Dropdown Menu -->
                
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link text-capitalize" data-toggle="dropdown" href="#">
                        Hai, {{Auth::user()->name}}
                        <i class="far fa-user ml-3"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" data-toggle="modal" data-target="#modal-call" class="dropdown-item">
                            <i class="fas fa-phone mr-2"></i> Nomor Darurat
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{url('logout')}}" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                
            </ul>
        </nav>
        <!-- /.navbar -->
        @endif
        <!-- Main Sidebar Container -->
        

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper ml-0">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    @yield('content')
                    
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            <!-- /.content -->
        </div>

        <!-- /.content-wrapper -->
        <footer class="main-footer ml-0">
            <strong>Copyright &copy; 2022<a href="#"> RS Bandung</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.1.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <div class="modal fade" id="modal-call" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nomor Darurat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('setting/no_darurat')}}" method="post" id="form-call">
                @csrf
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Nomor</label>
                    <input type="text" class="form-control "
                    name="no_darurat" autocomplete="off" value="{{$nomor[0]}}" required />
                    <small style="font-size:9pt;">Nomor ini akan di tambilkan di halaman Pengaduan Utama</small>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary btn-simpan-call">Simpan</button>
            </div>
            </div>
        </div>
        </div>

    <!-- jQuery -->
    <script src="{{asset('/')}}assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('/')}}assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('/')}}assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="{{asset('/')}}assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="{{asset('/')}}assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="{{asset('/')}}assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{asset('/')}}assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('/')}}assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{asset('/')}}assets/plugins/moment/moment.min.js"></script>
    <script src="{{asset('/')}}assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('/')}}assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <!-- Summernote -->
    <script src="{{asset('/')}}assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('/')}}assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('/')}}assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('/')}}assets/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('/')}}assets/dist/js/pages/dashboard.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{asset('/')}}assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('/')}}assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('/')}}assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('/')}}assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{asset('/')}}assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('/')}}assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{asset('/')}}assets/plugins/jszip/jszip.min.js"></script>
    <script src="{{asset('/')}}assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{asset('/')}}assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{asset('/')}}assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{asset('/')}}assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{asset('/')}}assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="{{asset('/')}}assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <script>
        $(".btn-simpan-call").click(function (e) { 
            e.preventDefault();
            var form = $("#form-call").serialize();
            $.ajax({
                type: "post",
                url: "{{url('setting-save-call')}}",
                data: form,
                dataType: "JSON",
                success: function (response) {
                    if(response.status){
                        $("#modal-call").modal("hide");
                    }
                }
            });
        });
    </script>
    @stack('js')
</body>

</html>