<?php
//----------------------------------------------------------------------------->
// Check for use only from root page i.e. not by user
//----------------------------------------------------------------------------->
if(!isset($_SESSION['WebInstance'])) {                                          // Root page defines this variable as TRUE
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

  <title>PiZero-WU - Info</title>

  <!-- Custom fonts for this template-->
  <link href="./fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="./datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="./css/sb-admin.css" rel="stylesheet">

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

      <!-- No Navbar items
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
      <li class="nav-item">
        <a class="nav-link" href="/nwadmin">
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
          <a class="dropdown-item active" href="blank.html">Blank Page</a>
        </div>
      </li>
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
            <a href="/nwadmin">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Info</li>
        </ol>

        <!-- Page Content -->

        <div style="height:700px;width:100%;border:solid 2px gray;overflow:scroll;overflow-x:hidden;overflow-y:scroll;padding-top: 10px;  padding-right: 10px; padding-bottom: 10px; padding-left: 10px;">
          
        <h1><i class="fas fa-fw fa-info"></i> Info - Using Your PiZero-WU With Windows 10</h1>
        <hr>

        <!-- Systems used Icons --> 
        <table>
          <tr>
            <td><img src="../images/SDCard00.png" height="40" alt="USB Memory key"></td>
            <td></td>
            <td><img src="../images/WiFiHotspot.png" height="45" alt="WiFi Hotspot"></td>
            <td></td>
            <td><img src="../images/USBPlugIn.png" height="40" alt="USB On the go support"></td>
            <td></td>
          </tr>
        </table>
        <br>        
        <p>The <strong>PiZero-WU</strong> - Raspberry Pi Model Zero WiFi with <strong>USB</strong> memory stick emulation. The on-board software allows a <strong>WiFi</strong> network folder to be accessed which appears to the <strong>USB</strong> connected device (e.g. television, sewing machine etc.) as a <strong>USB memory key</strong> / stick. This documentation refers to revision '<strong>1.0 - Sunrise</strong>' of the <strong>Pi-Zero-WU</strong> module. 
        </p>
       
        <h5><strong>Concepts</strong></h5>
        <p>The <strong>PiZero-WU</strong> comprises a computer, micro <strong>SD Card memory</strong> storage, WiFi and management software. These are configured to allow files to be remotely managed and made available as a <strong>USB</strong> Flash drive (USB memory key / Pen drive) data storage device to a physically connected device e.g. a television, sewing machine or other <strong>USB</strong> device as shown in the overview below.
        </p>
        <img src="./images/concepts00.png" width="75%">
        <p>Files can be transferred over a <strong>WiFi</strong> network to the shared storage contained in the <strong>PiZero-WU</strong> for the connected device to read. The <strong>PiZero-WU</strong> also contains management software to allow configuration of the device and management of files on the device.
        </p>
        <p>Your <strong>PiZero-W</strong>U uses its internal memory to emulates a <strong>USB</strong> memory key device. The default configuration is for 2 Gb (2 Giga bytes) of storage capacity. The default drive format is FAT 32, as this is the format most commonly accessible by Sewing machines, televisions and other devices typically used with the <strong>PiZero-WU</strong>.
        </p>
        <p><strong>Note</strong> Your <strong>PiZero-WU</strong> uses a high quality branded SD Flash memory card (typically Sandisk or Samsung) . In common with all <strong>USB</strong> Flash memory disks the following should be observed for optimal performance and long life:
        </p>

         <p>
         <ul> 
           <li> Do not disconnect or power down you PiZero-WU when writing files to the PiZero-WU</li>
           <li> Avoid adverse environmental conditions (moisture, heat, humidity, vibration)</li>
           <li> Avoid continuous or hi-frequency writing of files to your PiZero-WU</li>
           <li> Always keep a separate physical backup of any data stored on the device</li>
         </ul>
         </p>
         <br>

         <h5><strong>Connection</strong></h5>
         <p>To get started, connect your <strong>PiZero-WU</strong> to your device using a <strong>USB</strong> cable. The connection will provide power to the <strong>PiZero-WU</strong> and enable it to be configured if required.
         </p>
         <p>Typically a 'USB Micro B to USB A' cable is required to connect your <strong>PiZero-WU</strong> to your device using a <strong>USB</strong> cable. The recomended cable length is not more than 2 meters.
         </p>

         <img src="./images/PiCase-Connected01.png" width="25%">
         <p>Make sure the correct connection to the PiZero-WU is used. The connection shown in the picture should be connected to your device (Television or Sewing Machine etc.).
         </p>
         <p>The <strong>HDMI</strong> connector on the left is not normally used, the outer most <strong>USB</strong> connector is only used for specific installations requireing seperate power provision and shold not typicall be used.
         </p>
         <br>

         <h5><strong>WiFi Configuration</strong></h5>
         <p>The <strong>PiZero-WU</strong> can be accessed over a <strong>WiFi</strong> connection. The <strong>PiZero-WU</strong> needs to be configured to enable the <strong>WiFi</strong> connection. See the user manual for instructions on how to configure the <strong>WiFi</strong> connection.<br>
         <br>
         There are two modes of <strong>WiFi</strong> Connection:<BR>
         <ul>
           <li> <strong>Access Point</strong> client mode (acts like your computer, phone or tablet on the <strong>WiFi</strong> network)</li>
           <li> <strong>HotSpot</strong> modes (acts as an independant mini <strong>WiFi Access Point</strong> to allow a device to connect directly to the <strong>PiZero-WU</strong>)</li>
         </ul>
         </p>
         <p>
         <strong>Note</strong><br>
         The <strong>PiZero-WU</strong> can act as a <strong>USB</strong> memory storage device without <strong>WiFi</strong> configuration. Ensure files are not being written to the <strong>PiZero-WU</strong> when removing or connection. Always use the <strong>USB</strong> <strong>'Eject'</strong> function when disconnecting the device to ensure correct shutdown of <strong>USB</strong> connectivity. See your device (computer, phone or tablet etc.) operating instructions for details on how to correctly perform the disconnect function.
         </p>
         <br>

         <h5><strong>Transferring Files (Drag & Drop)</strong></h5>
         <p>There are two ways to transfer files to your PiZero-WU. This section details Windows 10 drag and drop functionality.
         </p>
         <p>First time use of your <strong>PiZero-WU</strong> with a <strong>WiFi</strong> connection to the device
         </p>
         </p>
         <p>On the Windows 10 task bar enter the words '<strong>File Explorer</strong>' as shown below (or select <strong>START | RUN</strong> and enter '<strong>explorer.exe</strong>' from the Windows 10 start menu).
         </p>
         <img src="./images/FileExplorer00.png" width="50%" alt="Selecting Windows 10 File Explorer">
         <br>
         <br>
         <p>Select the file explorer so that it appears as shown below:
         </p>
         <img src="./images/FileExplorer01.png" width="50%" alt="Selecting Windows 10 File Explorer">
         <br>
         <br>
         <p>Enter <strong>\\pizero-wu\usb</strong> into the File Explorer <strong>Address Bar</strong> as shown below and press enter or the <strong>'Go To'</strong> button at the end of the 'Address Bar'.
         </p>
         <img src="./images/FileExplorer04.png" width="50%" alt="Selecting Windows 10 File Explorer">
         <br>
         <br>
         <p>On first time use, a dialog box will appear. Enter <strong>guest</strong> for the user name and <strong>guest</strong> for the password. Ensure the <strong>Remember my credentials</strong> check box is selected  then press the <strong>OK</strong> button
         </p>
         <img src="./images/FileExplorer03.png" width="30%" alt="Selecting Windows 10 File Explorer">
         <br>
         <br>
         <p>Your Pi-Zero-WU disk should now be shown as below (the example files may not be listed, a recently formatted system will typically show no files or Pinguin23.pes ): 
         </p>
         <img src="./images/FileExplorer02.png" width="50%" alt="Selecting Windows 10 File Explorer">
         <br>
         <br>
         <p>You can now open another <strong>File Explorer</strong> using the method previously detailed and drag files from the newly opened <strong>File Explorer</strong> to the Pi-Zero-WU.
         </p>
         <p>The image below shows a file (lighthou1a.pes) selected with the left mouse button (and whilst continuing to be held down) being dragged into the <strong>\\pizero-uw\usb</strong> folder. (note that the colours may differ depending on the settings of your computer.)
         </p>
         <img src="./images/FileExplorer05.png" width="60%" alt="Selecting Windows 10 File Explorer">
         <br>
         <br>
         <br>
         <br>
         
         <strong>Warrantability or Fitness For Purpose</strong><BR>
         Copyright And Disclaimer Notice For Document, Software And Any Associated Hardware<BR>
         Copyright (c) 2020 OneOfTheInfiniteMonkeys. ALL RIGHTS RESERVED. <BR>

         <p>THIS PRODUCT IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" 
            AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
            WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. 
            IN NO EVENT SHALL OneOfTheInfiniteMonkeys BE LIABLE FOR ANY DIRECT, INDIRECT,
            INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
            LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA,
            OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF 
            LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
            NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS PRODUCT,
            EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
         </p> 
 
         Trademarks owned by respective holders, see documentation for details.<BR>
         Configurations, works, designs, software by OneOfTheInfiniteMonkeys Copyright © OneOfTheInfiniteMonkeys 2020 - All rights reserved<BR>
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
