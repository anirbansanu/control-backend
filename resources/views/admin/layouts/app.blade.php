<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Control') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles

        <!---  Font Awesome V6 --->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css')}}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css')}}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css')}}">

        {{-- Sweetalert2 --}}
        <link rel="stylesheet" href="{{ asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
        
        @stack('css')
        <!-- Styles -->
        <style>
            .menu-open{
                background: #2c3136;
            }
        </style>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            @include('admin.layouts.preloader')

            @include('admin.layouts.navbar')

            @include('admin.layouts.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">@yield('title')</h1>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                                @yield('breadcrumb')
                            </div>
                        <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                <!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <!-- Container-fluid -->
                    <div class="container-fluid">
                        
                        <!-- Main content -->
                            @yield('content')
                        <!--/. Main content -->
                        
                    </div>
                    <!-- /.Container-fluid -->
                </section>
                <!-- /.Content -->
            </div>

            @include('admin.layouts.footer')

            <!-- /.content-wrapper -->
        </div>
        @stack('modals')

                
        <!-- jQuery -->
        <script src="{{ asset('admin/plugins/jquery/jquery.min.js')}}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- ChartJS -->
        <script src="{{ asset('admin/plugins/chart.js/Chart.min.js')}}"></script>
        <!-- Sparkline -->
        <script src="{{ asset('admin/plugins/sparklines/sparkline.js')}}"></script>
        <!-- JQVMap -->
        <script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
        <script src="{{ asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
        <!-- daterangepicker -->
        <script src="{{ asset('admin/plugins/moment/moment.min.js')}}"></script>
        <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
        <!-- Summernote -->
        <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('admin/dist/js/adminlte.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('admin/dist/js/demo.js')}}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('admin/dist/js/pages/dashboard.js')}}"></script>
        <!-- SweetAlert2 -->
        <script src="{{ asset('admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
        @if (session('success'))
            <script>
                    
                $(function() {
                    setTimeout(() => {
                        Swal.fire({
                            icon: 'success',
                            title: '{{session('success')}}',
                            showConfirmButton: false,
                            timer: 3000
                        })
                    }, 1500);
                    
                });
            </script>
        @endif
        @if (session('error'))
            <script>
                    
                $(function() {
                    setTimeout(() => {
                        Swal.fire({
                            icon: 'success',
                            title: '{{session('error')}}',
                            showConfirmButton: false,
                            timer: 3000
                        })
                    }, 1500);
                    
                });
            </script>
        @endif
        @if (session('info'))
            <script>
                    
                $(function() {
                    setTimeout(() => {
                        Swal.fire({
                            icon: 'success',
                            title: '{{session('info')}}',
                            showConfirmButton: false,
                            timer: 3000
                        })
                    }, 1500);
                    
                });
            </script>
        @endif
        @if (session('question'))
            <script>
                    
                $(function() {
                    setTimeout(() => {
                        Swal.fire({
                            icon: 'success',
                            title: '{{session('question')}}',
                            showConfirmButton: false,
                            timer: 3000
                        })
                    }, 1500);
                    
                });
            </script>
        @endif
        
        <script>
                    
            
        </script>
                    
        
        @stack('js')
        @livewireScripts
    </body>
</html>
