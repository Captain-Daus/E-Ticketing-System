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
    <a href="result.php" class="logo">
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
        <li class="treeview">
          <a href="result.php">
            <i class="fa fa-dashboard"></i> <span>Incoming Jobs</span>
          </a>
        </li>
        <li class="active treeview" >
          <a href="#">
            <i class="fa fa-user-md"></i> <span>Request</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i>Approve</a></li>
            <li><a href="pendding.php"><i class="fa fa-circle-o"></i>Pending</a></li>
          </ul>
        </li>
         <li >
        <li >
          <a href="logout.php">
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
    <?php
      if( !empty( $_SESSION ) ){
        $mysqli = null;
        $rows = null;
          
          try{	
            $conn_string = sprintf( "mysql:host=%s;dbname=%s", "sql203.hyperphp.com", "hp_33849069_ict_ticketing") ;
            $mysqli = new PDO( $conn_string, "hp_33849069", "daus970702" );	//mysqli, PDO way
            $mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              //mysqli, prepared statements
              $sqlString = "SELECT * FROM `request`";
              $params = array();
              //$params[] = $_POST["id"];
              $stmt  = $mysqli->prepare($sqlString);
              $stmt->execute($params);		//var_dump( $params ); die();
              $rows = $stmt->fetch(PDO::FETCH_ASSOC);
                if (!empty( $_POST )){
                    $masuk ="INSERT INTO request (name,email,phone,department,assign,status,start,due,comments) ";
                    $masuk .= " VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?) ";
                    $params = array();
                    $params[] = $_POST["name"];
                    $params[] = $_POST["email"];
                    $params[] = $_POST["phone"];
                    $params[] = $_POST["department"];
                    $params[] = $_POST["assign"];
                    $params[] = $_POST["status"];
                    $params[] = $_POST["start"];
                    $params[] = $_POST["due"];
                    $params[] = $_POST["comments"];
                    $stmt  = $mysqli->prepare($masuk);
                    $success = $stmt->execute($params);
                }
                //header("Location: view.php?id=".$_POST["phone"]);
                header("Location: view.php?phone=".$_POST["phone"]);
                $return = true;
            }
        
                catch (Exception  $e) {
                    echo $error = "Error: ".$e->getCode();	//$error = "Error: ".$sqlString;	
                    $return = false;
                  }
                  finally{
                    !is_null( $rows ) && $rows = null;		//Close Recordset
                    !is_null( $mysqli ) && $mysqli = null;	//mysqli_close($con);
                  }
           
        }
        
  ?>
    
    <section class="content-header">
      <h1>
        New Request
      </h1>
    </section>

    <!-- Main content -->
    <section class="content ">
     
    <center><img
      src="https://www.stealthsolutions.com.my/sssbv3/wp-content/uploads/2021/02/StealthSolutions-Logo-Harizontal-114x81-1.png" />
  </center>
  <form action="" method="POST">
    <!--  General -->
    <div class="form-group">
      <h2 class="heading">ICT TICKETING SYSTEM</h2>
      <div class="controls">
        <input type="text" id="name" class="floatLabel" name="name" required>
        <label for="name">Name</label>
      </div>
      <div class="controls">
        <input type="text" id="email" class="floatLabel" name="email" required>
        <label for="email">Email</label>
      </div>
      <div class="controls">
        <input type="tel" id="phone" class="floatLabel" name="phone" required>
        <label for="phone">Phone</label>
      </div>
      <!--div class="col-1-3 col-1-3-sm"-->
      <div class="controls">
        <i class="fa fa-sort"></i>
        <select class="floatLabel" id="department" name="department" required>
          <option value="blank"></option>
          <option value="DA Auto" selected>DA Auto</option>
          <option value="Premium Pineapple">Premium Pineapple</option>
          <option value="Jajaran Armada">Jajaran Armada</option>
          <option value="Danascreen">Danascreen</option>
        </select>
        <label for="department">Department</label>
      </div>
    </div>

    <!--  Details -->
    <div class="form-group">
      <h2 class="heading">Details</h2>
      <div class="grid">
        <div class="col-1-4 col-1-4-sm">
          <div class="controls">
          <i class="fa fa-sort"></i>
        <select class="floatLabel" id="assign" name="assign" required>
          <option value="blank"></option>
          <option value="Azim Omar" selected>Azim Omar</option>
          <option value="Naim Rosli">Naim Rosli</option>
          <option value="Mokhsin Zamani">Mokhsin Zamani</option>
          <option value="Captain Daus">Captain Daus</option>
        </select>
        <label for="assign">Assign</label>
      </div>
    </div>
    <div class="col-1-4 col-1-4-sm">
          <div class="controls">
          <i class="fa fa-sort"></i>
        <select class="floatLabel" id="status" name="status" required>
          <option value="Pendding" selected>Request</option>
        </select>
        <label for="status">Status</label>
      </div>
    </div>
        <div class="col-1-4 col-1-4-sm">
          <div class="controls">
            <input type="date" id="start" class="floatLabel" name="start" value="<?php echo date('Y-m-d'); ?>">
            <label for="start" class="label-date"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Request
              Date</label>
          </div>
        </div>

        <div class="col-1-4 col-1-3-sm">
          <div class="controls">
            <input type="date" id="due" class="floatLabel" name="due" value="<?php echo date('Y-m-d'); ?>" />
            <label for="due" class="label-date"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Agree Due Date</label>
          </div>
        </div>
      </div>


      <div class="grid">
        <p class="info-text">Please describe your needs e.g. Create One Design For The Banner</p>
        <br>
        <div class="controls">
          <textarea name="comments" class="floatLabel" id="comments"></textarea>
          <label for="comments">What You Want To Do</label>
        </div>
        <button type="submit" value="Submit" class="col-1-4" style="color:white;">Submit</button></a>
      </div>
    </div> <!-- /.form-group -->
  </form>
 <!-- partial -->
 <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='//raw.githubusercontent.com/andiio/selectToAutocomplete/master/jquery-ui-autocomplete.js'></script>
  <script
    src='//raw.githubusercontent.com/andiio/selectToAutocomplete/master/jquery.select-to-autocomplete.js'></script>
  <script
    src='//raw.githubusercontent.com/andiio/selectToAutocomplete/master/jquery.select-to-autocomplete.min.js'></script>
  <script src="./script.js"></script>
      
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
