<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="daara, luqman, al, hakiim, internat, franco-arabe, Luqman Al Hakiim">
  <meta name="author" content="Abdourahmane Diop">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Daara luqmane Al Hakiim | Administration</title>
  <link rel="icon" href="images/logo.png">

  @include('layouts.admin.links2')
  @yield('css')

</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    @include('layouts.admin.sidebar2')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">

        @include('layouts.admin.navbar2')
        <!-- Begin Page Content -->
        @yield('body')

      </div>
      <!-- End of Main Content -->

      @include('layouts.admin.footer2')

    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
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
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  {{-- <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script> --}}
  @include('layouts.admin.script2')
  @include('flashy::message')

  @yield('js')
</body>
</html>

