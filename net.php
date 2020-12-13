<?php
//----------------------------------------------------------------------------->
// Check for use only from root page i.e. not by user
//----------------------------------------------------------------------------->
if(!isset($_SESSION['WebInstance'])) {                                           // Root page defines this variable as TRUE
     http_response_code(400);                                                   // Bad request error
     include('400.html');                                                       // Custom HTML for the error page
     die();
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PiZero-WU - Internet</title>

  <!-- Custom fonts for this template-->
  <link href="./fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="./datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="./css/sb-admin.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
// Timed ajax query to recover json response from server

    $( document ).ready(function() {
        console.log( "document loaded" );

        $.get("ajax-inet.php", function(data, status) {
           var obj = $.parseJSON( data );
        
           // set the data on the html rendered document from the returned Json data
           $('div.net-ip4addr').text(obj.ip4addr);
           $('div.net-rtraddr').text(obj.rtraddr);
           $('div.net-hstname').text(obj.hstname);
         } );
        
    });

setInterval(function()
{
    $.get("ajax-inet.php", function(data, status) {
       var obj = $.parseJSON( data );
        
       // set the data on the html rendered document from the returned Json data
       $('div.net-ip4addr').text(obj.ip4addr);
       $('div.net-rtraddr').text(obj.rtraddr);
       $('div.net-hstname').text(obj.hstname);
    } );

}, 61750); // 61750 milliseconds = 61750 seconds - i.e. these should change very infrequently


setInterval(function()
{
    // get internet access ping
    $.get("ajax-pnet.php", function(data, status) {
       var obj = $.parseJSON( data );
        
       // set the data on the html rendered document from the returned Json data
       $('div.net-intping').text(obj.intping);

       document.getElementById("net-site").classList.remove('bg-secondary');
       document.getElementById("net-site").classList.remove('bg-success');
       document.getElementById("net-site").classList.remove('bg-warning');
       document.getElementById("net-site").classList.remove('bg-danger');

       if (obj.intping == "100%" | (obj.intping == " 80%") ) {
            document.getElementById("net-site").classList.add('bg-success');
          };
       if ( (obj.intping == " 40%") | (obj.intping == " 60%") ) {
            document.getElementById("net-site").classList.add('bg-warning');
          };
       if ( (obj.intping == "  0%") | (obj.intping == " 20%") ) {
            document.getElementById("net-site").classList.add('bg-danger');
          };

    } );

}, 13300); // 13300 milliseconds = 13.3 seconds


setInterval(function()
{
    // get router ping information and statistics
    $.get("ajax-prtr.php", function(data, status) {
       var obj = $.parseJSON( data );
        
       // set the data on the html rendered document from the returned Json data
       $('div.net-rtrping').text(obj.rtrping);

       document.getElementById("net-router").classList.remove('bg-secondary');
       document.getElementById("net-router").classList.remove('bg-success');
       document.getElementById("net-router").classList.remove('bg-warning');
       document.getElementById("net-router").classList.remove('bg-danger');

       if ( (obj.rtrping == "100%") | (obj.rtrping == " 80%") ) {
            document.getElementById("net-router").classList.add('bg-success');
          };
       if ( (obj.rtrping == " 40%") | (obj.rtrping == " 60%") ) {
            document.getElementById("net-router").classList.add('bg-warning');
          };
       if ( (obj.rtrping == "  0%") | (obj.rtrping == " 20%") ) {
            document.getElementById("net-router").classList.add('bg-danger');
          };


    } );

}, 10000); // 10000 milliseconds = 10 seconds


setInterval(function()
{
    // get wifi signal strength
    $.get("ajax-wifi.php", function(data, status) {
       var obj = $.parseJSON( data );
        
       // set the data on the html rendered document from the returned Json data
       $('div.net-sigwifi').text(obj.sigwifi);
       var siglevel = parseInt(obj.sigwifi, 10);
       // console.log(siglevel);

       document.getElementById("net-host").classList.remove('bg-secondary');
       document.getElementById("net-host").classList.remove('bg-success');
       document.getElementById("net-host").classList.remove('bg-warning');
       document.getElementById("net-host").classList.remove('bg-danger');

       if (siglevel >= -60) {
            document.getElementById("net-host").classList.add('bg-success');
         }
       if ( (siglevel >= -80) & (siglevel < -60) ){
            document.getElementById("net-host").classList.add('bg-warning');
         }
       if ( (siglevel >= -120) & (siglevel < -80) ){
            document.getElementById("net-host").classList.add('bg-danger');
         }

    } );

}, 3000); // 3000 milliseconds = 3 seconds

</script>


</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="/nwadmin">PiZero-WU</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <!--
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    -->

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <!-- No Navbar items -->
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/nwadmin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <!-- No Further Sidebar items --> 
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/nwadmin">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Network</li>
        </ol>

        <!-- Page Content -->
        <div class="row">

              <div class="col-xl-3 col-sm-6 mb-3">
                <a href = "">
                <div id="net-host" class="card text-white bg-secondary o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fas fa-fw fa-wifi "></i>
                    </div>
                    <div class="mr-5" style="display: inline-block;">
                      <div class="net-ip4addr">Discovering</div>
                      <div class="net-hstname" style="display: inline-block;">Working</div><BR>
                    </div>
                    <h2>
                      <div class="net-sigwifi" style="display: inline-block;">Measuring</div>
                    </h2>
                  </div>
                </div>
                </a>
              </div>

              <div class="col-xl-3 col-sm-6 mb-3">
                <a href = "">
                <div id="net-router" class="card text-white bg-secondary o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fas fa-fw fa-digital-tachograph"></i>
                    </div>
                    <div class="mr-5" style="display: inline-block;">Router <div class="net-rtraddr">Working!</div>
                    </div>
                    <h2>
                      <div class="net-rtrping" style="display: inline-block;">Sensing</div>
                    </h2>
                  </div>
                </div>
                </a>
              </div>


              <div class="col-xl-3 col-sm-6 mb-3">
                <a href = "">
                <div id="net-site" class="card text-white bg-secondary o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fas fa-fw fa-globe "></i>
                    </div>
                    <div class="mr-5" style="display: inline-block;">Internet
                      <div>&nbsp;</div>
                    </div>
                      <h2>
                        <div class="net-intping" style="display: inline-block;">Sensing</div>
                      </h2>
                  </div>
                </div>
                </a>
              </div>


      </div>
      
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © OneOfTheInfiniteMonkeys 2020</span>
          </div>
        </div>
      </footer>

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

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

</body>

</html>
