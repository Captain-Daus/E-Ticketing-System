<?php
session_start();
if( !empty( $_SESSION ) ){
	$mysqli = null;
	$rows = null;

	try{	
	  $conn_string = sprintf( "mysql:host=%s;dbname=%s", "localhost", "ict_ticketing" ) ;
	  $mysqli = new PDO( $conn_string, "root", "" );	//mysqli, PDO way
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
    <a href="index2.html" class="logo">
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
        <li class="active treeview" >
          <a href="#">
            <i class="fa fa-pencil"></i> <span>Editing</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="edit.php"><i class="fa fa-circle-o"></i>Edit</a></li>
            <li><a href="delete.php"><i class="fa fa-circle-o"></i>Delete</a></li>
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
    <?php
      if( !empty( $_SESSION ) ){
        $mysqli = null;
        $rows = null;

      try{
          $conn_string = sprintf( "mysql:host=%s;dbname=%s", "localhost", "ict_ticketing" ) ;
          $mysqli = new PDO( $conn_string, "root", "" );	//mysqli, PDO way
          $mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sqlString = "SELECT * FROM `request` ORDER BY `id`; ";
          $params = array();
          $stmt  = $mysqli->prepare($sqlString);
          $stmt->execute($params);		//var_dump( $params ); die();
          $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    catch (Exception  $e) {
      echo $error = "Error: ".$e->getCode();	//$error = "Error: ".$sqlString;	
      $return = false;
    }
    finally{
      //!is_null( $rows ) && $rows = null;		//Close Recordset
      !is_null( $mysqli ) && $mysqli = null;	//mysqli_close($con);
    }
  }
  ?>
    
    <section class="content-header">
      <h1>
        Editing
      </h1>
    </section>

    <!-- Main content -->
    <section class="content ">
     
    <?php
if( !empty( $_GET ) ){
	$mysqli = null;
	$rows = null;
	
	try{	
	  $conn_string = sprintf( "mysql:host=%s;dbname=%s", "localhost", "ict_ticketing" ) ;
	  $mysqli = new PDO( $conn_string, "root", "" );	//mysqli, PDO way
	  $mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  
	  // mysqli, prepared statements
	  //$sqlString = "SELECT * FROM `request` WHERE `id`  = ? ";

      if (!empty( $_POST )){
          $masuk =" UPDATE request SET name = ?,email = ?,phone = ?,department = ?,`assign` = ?,status = ?,start = ?,due = ?,comments = ? WHERE id = ?";
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

          $params[] = $_GET["id"];
          
          $stmt  = $mysqli->prepare($masuk);
          $success = $stmt->execute($params);

          header("Location: result.php");
      }
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

  <form action="" method="POST">
    <!--  General -->
    <div class="form-group">
      <h2 class="heading">ICT TICKETING SYSTEM</h2>
      <div class="controls">
        <input type="text" id="name"  name="name" value= <?php echo $name; ?>>
      </div>
      <div class="controls">
        <input type="text" id="email" name="email" value= <?php echo $email; ?>>
      </div>
      <div class="controls">
        <input type="tel" id="phone" name="phone" value= <?php echo $phone ?>>
      </div>
      <!--div class="col-1-3 col-1-3-sm"-->
      <div class="controls">
        <i class="fa fa-sort"></i>
        <select class="floatLabel" id="department" name="department" value= <?php echo $department; ?>>
          <option value="blank"></option>
          <option value="DA Auto" selected>DA Auto</option>
          <option value="Premium Pineapple">Premium Pineapple</option>
          <option value="Jajaran Armada">Jajaran Armada</option>
          <option value="Danascreen">Danascreen</option>
        </select>
      </div>
    </div>

    <!--  Details -->
    <div class="form-group">
      <h2 class="heading">Details</h2>
      <div class="grid">
        <div class="col-1-4 col-1-4-sm">
          <div class="controls">
          <i class="fa fa-sort"></i>
        <select class="floatLabel" id="assign" name="assign" value= <?php echo $assign; ?>>
          <option value="blank"></option>
          <option value="Azim Omar" selected>Azim Omar</option>
          <option value="Naim Rosli">Naim Rosli</option>
          <option value="Mokhsin Zamani">Mokhsin Zamani</option>
          <option value="Captain Daus">Captain Daus</option>
        </select>
        
      </div>
    </div>
    <div class="col-1-4 col-1-4-sm">
          <div class="controls">
          <i class="fa fa-sort"></i>
        <select class="floatLabel" id="status" name="status" value= <?php echo $status; ?>>
          <option value="Pendding" selected>Request</option>
          <option value="approve" selected>Approve</option>
        </select>
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
          <textarea name="comments" class="floatLabel" id="comments" value= <?php echo $com; ?>></textarea>
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
