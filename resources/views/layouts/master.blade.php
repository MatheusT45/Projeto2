
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Project Admin</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">
  {{-- CSS Personalizado --}}
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  {{-- Toastr --}}
  <link href="{{asset('toastr/toastr.min.css')}}" rel="stylesheet">
  {{-- Datatables --}}
  <link href="{{asset('DataTables-1.10.18/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">


</head>

<body id="page-top">

  
    {{-- navbar topo --}}
    @if(Auth::check())
    @include('layouts.navbar-admin')
    @endif

  <div id="wrapper">

    <!-- Sidebar -->
    @if(Auth::check())
    @include('layouts.sidebar-admin')
    @endif
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
     {{--    <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Blank Page</li>
        </ol> --}}

        <!-- Page Content -->
        @yield('content')

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
     {{--  <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer> --}}

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pronto para sair?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Clique em Logout se deseja sair do sistema.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
           {{ __('Logout') }}
       </a>

       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
           @csrf
       </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Jquery-->
  <script src="{{asset('jquery/jquery.min.js')}}"></script>
  {{-- Bootstrap --}}
  <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{asset('jquery-easing/jquery.easing.min.js')}}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/sb-admin.js')}}"></script>
  {{-- Toastr --}}
  <script src="{{asset('toastr/toastr.min.js')}}"></script>
  {{-- Custom Scripts --}}
  <script src="{{asset('js/functions.js')}}"></script>
  {{-- Datatables --}}
  <script src="{{asset('js/datatables.min.js')}}"></script>
  {{-- Bootbox --}}
  <script src="{{asset('bootbox/bootbox.all.min.js')}}"></script>

  @yield('js')
</body>

</html>
