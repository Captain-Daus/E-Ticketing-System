<?php
if( !empty( $_GET ) ){
	$mysqli = null;
	$rows = null;
	
	try{	
	  $conn_string = sprintf( "mysql:host=%s;dbname=%s", "localhost", "ict_ticketing" ) ;
	  $mysqli = new PDO( $conn_string, "root", "" );	//mysqli, PDO way
	  $mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  
	  // mysqli, prepared statements
	  $sqlString = "SELECT * FROM `request` WHERE `id`  = ? ";
	  $params = array();
	  $params[] = $_GET["id"];
	  $stmt  = $mysqli->prepare($sqlString);
	  $stmt->execute($params);		//var_dump( $params ); die();
	  $rows = $stmt->fetch(PDO::FETCH_ASSOC);
	  if( $rows != false ){
		  $phone = $rows["phone"];
          $name = $rows["name"];
          $email = $rows["email"];
          $depart = $rows["department"];
		      $assign = $rows["assign"];
		      $start = $rows["start"];
		      $due = $rows["due"];
		      $com = $rows["comments"];
          //$driver_account = $rows["account_number"];
		   //header("Location: Keputusan.php");
		   //echo "name:".$rows["rider_name"]; /* Redirect browser */
		   
		$return = false;
	  }	//$error = "Error: ".$sqlString;
	  else
	   	//echo " Rekod Anda Tidak Dijumpai";
		$return = true;
	}
	catch (Exception  $e) {
	  echo $error = "Error: ".$e->getCode();	//$error = "Error: ".$sqlString;	
	  $return = false;
	}finally{
	  !is_null( $rows ) && $rows = null;		//Close Recordset
	  !is_null( $mysqli ) && $mysqli = null;	//mysqli_close($con);
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>ICT TICKETING SYSTEM</title>
  <!--link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"-->
  <link rel="icon"
    href="https://www.stealthsolutions.com.my/sssbv3/wp-content/uploads/2021/02/StealthSolutions-Logo-Harizontal-114x81-1.png"
    type="image/x-icon">
  <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="./style.css">

</head>

<body>
  <center><img
      src="https://www.stealthsolutions.com.my/sssbv3/wp-content/uploads/2021/02/StealthSolutions-Logo-Harizontal-114x81-1.png" />
  </center>
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
          $sql =" DELETE FROM request WHERE id = ?";
          $params = array();

          $params[] = $_GET["id"];
          
          $stmt  = $mysqli->prepare($sql);
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
        <button type="submit" value="Submit" class="col-1-4" style="color:white;">Delete</button></a>
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

  <!--footer-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="./footer.css">

  <!--code sagments-->
  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>About</h6>
          <p class="text-justify">The ICT Ticketing System is the first system that has been developed by the ICT team.
            The main function of this system is to help other departments request jobs from the ICT department.
            This system has the potential to reduce the amount of paper we use in our office.
            Our department supports Save the World Camping.
            We will serve you well for your happiness.</p>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Access Point</h6>
          <ul class="footer-links">
            <li><a href="https://www.stealthsolutions.com.my/sssbv3/">Stealth Solutions</a></li>
          </ul>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Quick Links</h6>
          <ul class="footer-links">
            <li><a href="login.php">Admin Login</a></li>
          </ul>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; 2023 All Rights Reserved by
            <a href="#">ICT Department</a>.
          </p>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

</body>

</html>