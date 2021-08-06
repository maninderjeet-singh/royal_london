<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - Khalsa Works</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

    @yield('css')
    <style>
        .loading-box{
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 9999;
        }
        /* 
        * confirmation 
        */
        .pop-up-button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 0px 10px;
            transition-duration: 0.4s;
            cursor: pointer;
        }
        .pop-up-button:hover {
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
            transform: translateY(5px);
        }
        .confirm-button {    background-color: #1C65B0;    color: white;    border: 2px solid #1C65B0;    border-radius: 8px;    font-size: 18px;    font-family: 'Quicksand', sans-serif;    font-weight: 500;    text-transform: capitalize;}
        .cancel-button {    background-color: #48BFC1;    color: white;    border: 2px solid #48BFC1;    border-radius: 8px;    font-size: 18px;    font-family: 'Quicksand', sans-serif;    font-weight: 500;    text-transform: capitalize;}
        .cancel-button:focus {
            outline: 1px dotted;
            outline: 0;
        }
        .confirm-button:focus {
            outline: 1px dotted;
            outline: 0;
        }
    </style>

</head>



<body id="page-top">
<div class="loading-box" style="background: rgba(255,255,255,0.8) url({{asset('images/loading.gif')}}) center no-repeat;"></div>
    <div id="wrapper">
        <!-- Sidebar -->
            @include('admin.layoutz.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                    @include('admin.layoutz.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
                @include('admin.layoutz.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
                    
    </div>

     <!-- Scroll to Top Button-->
     <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scripts -->
    
    <!-- jQuery Js -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}" ></script>
    <!-- Bootstrap Js -->
    <!-- <script src="{{ asset('js/popper.min.js') }}" ></script> -->
    
    <script src="{{ asset('js/sweetalert.js') }}" ></script>
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    
    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    
    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
    
    
    
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });
        $('#logout-btn').click(function(){
            $('#logout-form').submit();
        });

        /*
        * for confirm box Design
        */
        const swalWithBootstrapButtons = Swal.mixin({
            confirmButtonClass: 'pop-up-button confirm-button',
            cancelButtonClass: ' pop-up-button cancel-button',
            buttonsStyling: false,
        });
    </script>
    @yield('js')
</body>
</html>