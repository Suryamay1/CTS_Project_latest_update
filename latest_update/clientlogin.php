<?php 
session_start();     
$host = "localhost";
$db = "timesheet";
$dbuser = "Surya";
$dbpass = "z)5tik0NW_]E@-P2";
$con =new mysqli($host,$dbuser, $dbpass, $db);

if(isset($_POST['submit']))
{
	$username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select * from userlogin where username = '$username' and password = '$password' and type='client'";  
        $result = mysqli_query($con, $sql);
        if (!$check1_res) {
          printf("Error: %s\n", mysqli_error($con));
          exit();
      }  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
		
				$_SESSION['login']=$email;
            header("location:tv.php");
        }  
        else{  
		
            echo "<script>alert('Invalid Username/Email or password');</script>";
        }     
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login Page </title>
  <link href="clientlogin.css" rel="stylesheet">
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

  <style type="text/css">

    input[type="text"] {
      margin-bottom: -20px;
      border-bottom-left-radius: 0;
      border-bottom-right-radius: 0;
    }

    input[type="password"] {
     margin-bottom: 20px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }

  </style>
</head>
<body>
  <div class = "container">
		<form action="clientlogin.php" method="post" name="Login_Form" class="form">
	    <h3 class="form-heading">Client Login</h3><hr><br>
		  <label><b>CLIENT ID</b></label>
			  <input type="text" class="form-control" name="user"><br>
      <label><b>PASSWORD</b></label>
        <input type="password" class="form-control" name="pass"  />
      <label>
        <input type="checkbox"  name="remember"> Remember me
      </label><br>
        <input type="submit" name="submit" value="Login">
      <span class="password"><a href="password.html">Forgot password?</a></span>
		</form>
  </div>
</body>
</html>
