<?php
session_start();
if( !empty( $_GET ) || !empty( $_POST )){
	$mysqli = null;
	$rows = null;

    try{	
        $conn_string = sprintf( "mysql:host=%s;dbname=%s", "localhost", "ict_ticketing") ;
        $mysqli = new PDO( $conn_string, "root", "" );	//mysqli, PDO way
        $mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(ISSET($_POST['login'])){
            if($_POST['username'] != "" || $_POST['password'] != ""){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $sql = "SELECT * FROM `user` WHERE `username`=? AND `password`=? ";
                $query = $mysqli->prepare($sql);
                $query->execute(array($username,$password));
                $row = $query->rowCount();
                $fetch = $query->fetch();
                if($row > 0) {
                    $_SESSION['user'] = $_POST["username"];
                    header("location: result.php?username=".$_POST["username"]);
                } else{
                    echo "
                    <script>alert('Invalid username or password')</script>
                    <script>window.location = 'login.php'</script>
                    ";
                }
            }else{
                echo "
                    <script>alert('Please complete the required field!')</script>
                    <script>window.location = 'index.php'</script>
                ";
            }
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
<!--html part-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ICT TICKETING SYSTEM</title>
  <link rel="icon"
    href="https://www.stealthsolutions.com.my/sssbv3/wp-content/uploads/2021/02/StealthSolutions-Logo-Harizontal-114x81-1.png"
    type="image/x-icon">
  <link rel="stylesheet" href="./login.css">
</head>

<body>
<div class="login-box">
    <h2>Hello Sir</h2>
    <form action="" method="POST">	
      <div class="user-box">
        <input type="text" name="username" required="">
        <label>Username</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" required="">
        <label>Password</label>
      </div>
      <button type="submit" value="Submit" name="login" class="col-1-4" style="cursor: pointer; background-color: #1b3d4d;border: none;color: #fff; padding: 12px 20px; float: left;">Login</button>
    </form>
  </div>
	<!--div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">PHP - PDO Login and Registration</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<?php if(isset($_SESSION['message'])): ?>
				<div class="alert alert-<?php echo $_SESSION['message']['alert'] ?> msg"><?php echo $_SESSION['message']['text'] ?></div>
			<script>
				(function() {
					// removing the message 3 seconds after the page load
					setTimeout(function(){
						document.querySelector('.msg').remove();
					},3000)
				})();
			</script>
			<?php 
				endif;
				// clearing the message
				unset($_SESSION['message']);
			?>
			<form action="" method="POST">	
				<h4 class="text-success">Login here...</h4>
				<hr style="border-top:1px groovy #000;">
				<div class="form-group">
					<label>Username</label>
					<input type="text" class="form-control" name="username" />
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" />
				</div>
				<br />
				<div class="form-group">
					<button class="btn btn-primary form-control" name="login">Login</button>
				</div>
		</div>
	</div-->
</body>
</html>