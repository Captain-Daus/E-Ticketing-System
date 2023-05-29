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
  <title>Thank You</title>
  <link rel="icon"
    href="https://www.stealthsolutions.com.my/sssbv3/wp-content/uploads/2021/02/StealthSolutions-Logo-Harizontal-114x81-1.png"
    type="image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.4.0/animate.min.css'>
  <link rel="stylesheet" href="./tq.css">

</head>

<body>
  <!-- partial:index.partial.html -->
  <div id="wrapper" class="animated zoomIn">
    <!-- We make a wrap around all of the content so that we can simply animate all of the content at the same time. I wanted a zoomIn effect and instead of placing the same class on all tags, I wrapped them into one div! -->
    <h1>
      <!-- The <h1> tag is the reason why the text is big! -->
      <underline>Thank you!</underline>
      <!-- The underline makes a border on the top and on the bottom of the text -->
    </h1>
    <h3>
      Your Data Have Been Submited. Our Team Will respond to you as soons as possible.
      <!-- The <h3> take is the description text which appear under the <h1> tag. It's there so you can display some nice message to your visitors! -->
    </h3>
    <button type="submit" value="Submit" class="col-1-4" onclick="window.location.href='view.php';">Return</button>
  </div>
  <!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="./tq.js"></script>

</body>

</html>
