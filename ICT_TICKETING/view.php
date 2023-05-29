<?php
if( !empty( $_GET ) ){
	$mysqli = null;
	$rows = null;
	
	try{	
	  $conn_string = sprintf( "mysql:host=%s;dbname=%s", "localhost", "ict_ticketing" ) ;
	  $mysqli = new PDO( $conn_string, "root", "" );	//mysqli, PDO way
	  $mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  
	  // mysqli, prepared statements
	  $sqlString = "SELECT * FROM `request` WHERE `phone`  = ? ";
	  $params = array();
	  $params[] = $_GET["phone"];
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
  <link rel="icon"
    href="https://www.stealthsolutions.com.my/sssbv3/wp-content/uploads/2021/02/StealthSolutions-Logo-Harizontal-114x81-1.png"
    type="image/x-icon">
  <link rel="stylesheet" href="./view.css">

</head>

<body>
  <!-- partial:index.partial.html -->
  <br>
  <br>
  <div class="invoice-box">
    <table cellpadding="0" cellspacing="0" method="GET" action="index.php">
      <tr class="top">
        <td colspan="4">
          <table >
            <tr>
              <td class="title">
                <img
                  src="https://www.stealthsolutions.com.my/sssbv3/wp-content/uploads/2021/02/StealthSolutions-Logo-Harizontal-114x81-1.png">
              </td>

              <td>
                Created: <?php echo $start; ?> <br> Due Date:<?php echo $due; ?>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr class="information">
        <td colspan="4">
          <table>
            <tr>
              <td>
                Stealth Solutions Sdn Bhd (653711-w)<br>
                Unit B-3A-02, Arena Mentari,<br>
                No 1 Jalan PJS 8/15,<br>
                Bandar Sunway, 46150<br>
                Petaling Jaya, Selangor
              </td>
              <td>
			          <?php echo $name; ?><br><?php echo $phone; ?><br><?php echo $email;?>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr class="heading">
        <td colspan="3">Department</td>
      </tr>
      <tr class="details">
        <td><?php echo $depart; ?></td>
      </tr>
      <tr class="heading">
        <td colspan="3">Assing To</td>
      </tr>
      <tr class="details">
        <td><?php echo $assign; ?></td>
      </tr>
	  <tr class="heading">
        <td colspan="3">Details</td>
      </tr>
	  <tr class="details">
        <td><?php echo $com; ?></td>
      </tr>
      </div>
    </table>
	   <button type="submit" value="Submit" class="col-1-4" style="cursor: pointer; background-color: #1b3d4d;border: none;color: #fff; padding: 12px 20px; float: right;" onClick="window.print()">Print Your Ticket</button>
	   <button type="submit" value="Submit" class="col-1-4" onclick="window.location.href='index.php';"style="cursor: pointer; background-color: #1b3d4d;border: none;color: #fff; padding: 12px 20px; float: right;">Back To Main</button>
  </div>
  <br>
  <br>
  <br>

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
  <!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js'></script>
  <script src="./view.js"></script>

</body>

</html>