<?php session_start();

if( ! isset($_SESSION['nik'])){ // Jika tidak ada session username berarti dia belum login
header("location: ../index.php"); // Kita Redirect ke halaman index.php karena belum login
}?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../style/img/logo.png" type="image/ico" />

    <title>PT Jiwa Properti - Konsumen</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../style/css/custom.min.css" rel="stylesheet">

    <link href="../style/css/jquery-confirm.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../style/css/datatables.min.css">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
  </head>

  <body class="nav-md" style="background:  #34103d;">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col" style="border: 0; background:  #34103d;">
          <div class="left_col scroll-view"  style="background:  #34103d;">
            <div class="navbar nav_title" style="border: 0; background:  #34103d;" >
              <a href="index.html" class="site_title"><img src="../style/img/logo.png" width="50" height="50"><span>Konsumen</span></a>
            </div>

            <div class="clearfix" style="color: #FFFFFF"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../style/img/avatar.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= $_SESSION['nama']?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php?page=Beranda"><i class="fa fa-home"></i> Beranda </a></li>
                  <li><a href="index.php?page=Konsumen"><i class="fa fa-users"></i> Konsumen </a></li>
                  <li><a href="index.php?page=Rumah"><i class="fa fa-building"></i> Informasi Rumah </a></li>
                  <li><a href="index.php?page=Pemesanan"><i class="fa fa-building"></i> Pemesanan Rumah </a></li>
                 <!--  <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.html">General Form</a></li>
                      <li><a href="form_advanced.html">Advanced Components</a></li>
                      <li><a href="form_validation.html">Form Validation</a></li>
                      <li><a href="form_wizards.html">Form Wizard</a></li>
                      <li><a href="form_upload.html">Form Upload</a></li>
                      <li><a href="form_buttons.html">Form Buttons</a></li>
                    </ul>
                  </li> -->
                </ul>
              </div>
      

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
          <!--   <div class="sidebar-footer hidden-small" style="background: #451551;">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div> -->
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class="navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="../style/img/avatar.png" alt=""><?= $_SESSION['nama']?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="../config/_logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
        <div class="card">
        <div class="card-header">
            Dashboard Konsumen
        </div>
        <div class="card-body">
                <?php 
                 if(isset($_GET['page'])){
                    $page = $_GET['page']; 
                    switch ($page) {
                          case 'Beranda':
                          include "view/beranda.php";
                          break;   
                           case 'Konsumen':
                          include "view/konsumen.php";
                          break; 
                           case 'Rumah':
                          include "view/informasi_rumah.php";
                          break;   
                           case 'Pemesanan':
                          include "view/pemesanan_rumah.php";
                          break;   
                      
                    }
                 }else{
                   include 'view/beranda.php';
                 }
               
                  ?>
                </div>

        </div>
      </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            &copy 2021 PT Jiwa Properti &reg All Right Reserved
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../style/js/jquery-confirm.js"></script>
    <script src="../style/js/jquery.validate.min.js"></script>
    <script src="../style/js/datatables.min.js"></script>

    <!-- Custom Theme Scripts -->
   
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


    <script src="../style/js/custom.min.js"></script>
    <script src="../config/custom.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <script>
        $(".theSelect").select2();

    </script>

  </body>
</html>
