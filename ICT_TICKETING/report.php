<?php
session_start();
if( !empty( $_SESSION ) ){
	$mysqli = null;
	$rows = null;

	try{	
	  $conn_string = sprintf( "mysql:host=%s;dbname=%s", "sql203.hyperphp.com", "hp_33849069_ict_ticketing") ;
	  $mysqli = new PDO( $conn_string, "hp_33849069", "daus970702" );	//mysqli, PDO way
	  $mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sqlString = "SELECT * FROM `user` WHERE `username`  = ? ";
	  $params = array();
    $params[] =  $_SESSION['user'];
	  $stmt  = $mysqli->prepare($sqlString);
	  $stmt->execute($params);		//var_dump( $params ); die();
	  $rows = $stmt->fetch(PDO::FETCH_ASSOC);
	  if( $rows != false ){
		  $username = $rows["username"];
  }
  $return = false;
}	//$error = "Error: ".$sqlString;

	
	catch (Exception  $e) {
	  echo $error = "Error: ".$e->getCode();	//$error = "Error: ".$sqlString;	
	  $return = false;
	}finally{
	  //!is_null( $rows ) && $rows = null;		//Close Recordset
	  !is_null( $mysqli ) && $mysqli = null;	//mysqli_close($con);
	}
}

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'><link rel="stylesheet" href="./menu.css">

</head>
<body>
<!-- partial:index.partial.html -->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SSSB</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Stealth</b>Solutions</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="https://vignette3.wikia.nocookie.net/nation/images/6/61/Emblem_person_blue.png/revision/latest?cb=20120218131529" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $username; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="https://vignette3.wikia.nocookie.net/nation/images/6/61/Emblem_person_blue.png/revision/latest?cb=20120218131529" class="img-circle" alt="User Image">

                <p>
                <?php echo $username; ?>                 
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGATION</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Incoming Jobs</span>
          </a>
        </li>
        <li class="treeview" >
          <a href="#">
            <i class="fa fa-user-md"></i> <span>Request</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="approve.php"><i class="fa fa-circle-o"></i>Approve</a></li>
            <li><a href="pendding.php"><i class="fa fa-circle-o"></i>Pending</a></li>
          </ul>
        </li>
        <li class="treeview" >
          <a href="#">
            <i class="fa fa-pencil-square-o"></i> <span>Create New Request</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="newReq.php"><i class="fa fa-circle-o"></i>New Request</a></li>
            <li><a href="pendding.php"><i class="fa fa-circle-o"></i>Report</a></li>
          </ul>
        </li>
        <li >
          <a href="#">
            <i class="fa fa-cogs"></i> <span>Settings</span>
          </a>
        </li> 
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 <section class="content-header">
      <h1>
        Incoming Jobs
      </h1>
    </section>

    <!-- Main content -->
    <section class="content ">
     
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content ">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>170</h3>

              <p>TESTS</p>
            </div>
            <div class="icon">
              <i class="ion ion-erlenmeyer-flask"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>12</sup></h3>

              <p>DOCTORS</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-md"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>14</h3>

              <p>Messages</p>
            </div>
            <div class="icon">
              <i class="ion ion-email"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2023 <a href="https://www.stealthsolutions.com.my/sssbv3/">StealthSolutions</a>.</strong> All rights reserved.
  </footer>

  
  
</body>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script><script  src="./menu.js"></script>

</body>
</html>
