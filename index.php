<?php
// ============================================================================
//  Project        : nwadmin ( PiZero-WU )                                  
//  File           : index.php                                              
//  Author         : OneOfTheInfiniteMonkeys                                
//  Revision       : 1.10                                                   
//  Last Mod.      : 23 Dec 2020                                            
// ============================================================================

//----------------------------------------------------------------------------->
// Set flag to permiting lower level scripts to run from web session
//----------------------------------------------------------------------------->
  if (session_status() == PHP_SESSION_NONE) {
       session_start();
    }
  $_SESSION['WebInstance']=true;                                                // Root page defines this variable as TRUE - permiting use of sub scripts

?>

<!DOCTYPE html>
<html lang="en">

<!-- ======================================================================= -->
<!-- From Startbootstrap SB Admin Boiler plate template                      -->
<!-- Relevant elements Copyright (c) 2013-2019 Blackrock Digital LLC         -->
<!-- As applicable e.g. those elements licensed under The MIT License (MIT)  -->
<!--                                                                         -->
<!-- As applicable, all other elements Copytight (c) 2020                    -->
<!-- OneOfTheInfiniteMonkeys All rights reserved.                            -->
<!-- ======================================================================= -->

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PiZero-WU - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="./fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="./datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="./css/sb-admin.css" rel="stylesheet">

  <!-- Jquery support -->
  <script src="./jquery/3.4.1/jquery.min.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

  <script>
    // Timed ajax query to recover json response from server

    setInterval(function()
    {
        $.get("ajax-data.php", function(data, status) {
           var obj = $.parseJSON( data );
 
           $('div.usb-pesfiles').text(obj.PesFiles);
           $('div.usb-numfiles').text(obj.NumFiles);
           $('div.usb-pctused').text(obj.PctUsed);
           $('div.usb-drvsize').text(obj.DrvSize);
           // $('div.usb-sigwifi').text(obj.SigWifi);
           // $('div.usb-rctfile').text(obj.RctFile);

           // console.log(obj.NumFiles);
        } );
    }, 15000); // 15000 milliseconds = 15 seconds

    setInterval(function()
    {
        // get wifi signal strength
        $.get("ajax-wifi.php", function(data, status) {
           var obj = $.parseJSON( data );
           // set the data on the html rendered document from the returned Json data
           $('div.usb-sigwifi').text(obj.sigwifi);
        } );
    }, 3000); // 3000 milliseconds = 3 seconds

  </script>

  <!-- custom local colour for applet(s) -->
  <style>
    .bg-wifi {
      background-color: 
      #9900ff !important;
    }
  </style>

</head>

<body id="page-top" style="background-color: #404040">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <a class="navbar-brand mr-1" href="index.php">PiZero-WU</a>

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

      <!-- Not these Navbar items
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
      -->

    </ul>
  </nav>


  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <!-- Not these Sidebar items
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="login.html">Login</a>
          <a class="dropdown-item" href="register.html">Register</a>
          <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item" href="404.html">404 Page</a>
          <a class="dropdown-item" href="blank.html">Blank Page</a>
        </div>
      </li>
      -->

      <li class="nav-item">
        <a class="nav-link" href="info.php">
          <i class="fas fa-fw fa-info"></i>
          <span>Info</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="./manual/Raspberry Pi Zero Wifi Enable USB Key.pdf" target="info-document">
          <i class="fas fa-fw fa-question-circle"></i>
          <span>Help Document</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../tinyfilemanager/" target="FileManager">
          <i class="fas fa-fw fa-list"></i>
          <span>File Manager</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="admin.php">
          <i class="fas fa-fw fa-tools"></i>
          <span>Admin</span></a>
      </li>

      <?php if (is_dir("../rapsap")) { ?>
      <li class="nav-item">
        <a class="nav-link" href="../raspap/" target="WiFiManager">
          <i class="fas fa-fw fa-wifi"></i>
          <span>Wifi Manager</span></a>
      </li>
      <?php } ?>

      <li class="nav-item">
        <a class="nav-link" href="about.php">
          <i class="fas fa-comment-alt"></i>
          <span>About</span></a>
      </li>

      <!-- Not these sidebar items yet 
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>
      -->

    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards -->
        <!-- Number of files -->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <a href = "../tinyfilemanager" target="FileManager">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5" style="display: inline-block;">Files & Folders
                  <h2>
                    <div class="usb-pesfiles" style="display: inline-block;"><?php $resp=exec("ls /mnt/usb_share/ -R | grep -i .pes | wc -l"); echo $resp; ?></div> '.PES' of 
                    <div class="usb-numfiles" style="display: inline-block;"><?php $resp=exec("ls /mnt/usb_share/ -R | grep -v -E '^$' | grep -v / | wc -l"); echo $resp; ?></div> 
                  </h2>
                </div>
              </div>
            </div>
            </a>
          </div>

        <!-- Percentage used -->
          <div class="col-xl-3 col-sm-6 mb-3">
            <a href = "../tinyfilemanager" target="FileManager">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-chart-pie"></i>
                </div>
                <div class="mr-5" style="display: inline-block;">Used 
                  <h2>
                    <div class="usb-pctused" style="display: inline-block;"><?php $resp= exec("df -Ph | grep -E '/mnt/usb_share' | awk '{print $5}'"); echo $resp; ?></div> Of 
                    <div class="usb-drvsize" style="display: inline-block;"><?php $resp=exec("df -Ph | grep -E '/mnt/usb_share' | awk '{print $2}'"); echo $resp;?><div>
                  </h2>
                </div>
              </div>
            </div>
            </a>
          </div>

        <!-- Hostname and IP address -->
          <div class="col-xl-3 col-sm-6 mb-3">
            <a href = "net.php">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-info "></i>
                </div>
                <div class="mr-5" style="display: inline-block;">Info <?php $resp= exec("hostname -I"); echo $resp; ?>
                  <h2>
                    <div class="usb-hstname" style="display: inline-block;"><?php $resp= exec("hostname"); echo $resp; ?></div>
                  </h2>
                </div>
              </div>
            </div>
            </a>
          </div>

        <!-- WiFi Status -->
          <div class="col-xl-3 col-sm-6 mb-3">
            <?php if (is_dir("../raspap")) { ?> <a href = "../raspap" target="WiFiManager"> <?php } ?>
            <div class="card text-white bg-wifi o-hidden h-100" >
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-wifi"></i>
                </div>
                <div class="mr-5" >Access Point Signal 
                  <h2>
                    <div class="usb-sigwifi" style="display: inline-block;">Sensing . .<div>
                  </h2>
                </div>
              </div>
            </div>
            <?php if (is_dir("../raspap")) { ?>  </a> <?php } ?>
          </div>
        </div>

        <!-- Newest file info
        <div class="">
          <div class="card text-black  o-hidden h-100">
            <div class="card-body">
               Most recent .PES file: <div class="usb-rctfile" style="display: inline-block;"><?php system("ls -Rlt /mnt/usb_share/ | grep -i .pes | tail -1 | awk '{print $9}'"); ?></div>
                <i class=""> <img src="./tmp/lsf.svg" > </i>
             </div>
           </div>
         </div>
         -->

        <!-- Area Chart Example-->

        <!-- Not using area chart yet       
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Area Chart Example</div>
          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
        -->

        <!-- DataTables Example -->
        <!-- 
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Table Example</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011/04/25</td>
                      <td>$320,800</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
          -->

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

  <!-- Page level plugin JavaScript-->
  <!-- Not needed for this page
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
  -->

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <!-- Not needed for this page
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  -->

</body>

</html>
