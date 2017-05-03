<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>{{ $page_title or "AdminLTE Dashboard" }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <link href="{{ asset("/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset("/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/admin-lte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    
    
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      <!-- Header -->
      @include('header')
      <!-- Sidebar -->
      @include('sidebar')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          
          
        </section>
        <!-- Main content -->
        <div class="container-fluid">
          <section class="content">
            <!-- Your Page Content Here -->
            @yield('content')
            </section><!-- /.content -->
          </div>
          </div><!-- /.content-wrapper -->
          <!-- Footer -->
          
          </div><!-- ./wrapper -->
          <!-- jQuery 2.1.3 -->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <!-- Bootstrap 3.3.2 JS -->
          <script src="{{ asset ("/admin-lte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
          <!-- AdminLTE App -->
          <script src="{{ asset ("/admin-lte/dist/js/app.min.js") }}" type="text/javascript"></script>
        </body>
      </html>