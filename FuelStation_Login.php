<?php require_once('connection.php');
/**
 * @author Yasiru
 * contact me : https://linktr.ee/yasiruchamuditha for more information.
 */
//Login
session_start();

if(isset($_POST["btnLogin"]))
{
	$Email=$_POST["txtUserEmail"];
  $Password=$_POST["txtPassword"]; 
	if(empty($Email) || empty($Password))
    {
      echo '<script>alert(" Fileds cannot be blank")</script>';
    }
	else
	{
		if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) 
		{
			echo '<script>alert("Please Enter Valid UserEmail")</script>';       
		}
		else
		{		
        //perform sql
        $sql = "SELECT * FROM user_registration WHERE  Password='$Password' and Email='$Email'";
        $ret= mysqli_query($con, $sql);
        $num_row = mysqli_num_rows($ret);
	      if ($num_row >0) 
				{		
				  $_SESSION['Email'] =  $Email;
				  echo '<script>alert("Login Succesful")</script>';	
					header('location:Fuel_Station.php');	
				}
		  	else
				{
					echo '<script>alert("Invalid Username and Password Combination")</script>';
				}

        //disconnect 
         mysqli_close($con);

	    }
    }
}

?>


<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
    <title>Fuel Station - Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Fuel Up" name="keywords">
    <meta content="Fuel Status" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Template Stylesheet -->
    <link href="css/fuel_login.css" rel="stylesheet">       
</head>
<body  style="background-image: url(img/fs.jpg);">
    <div class="container-fluid">
     <div class="container">
	   <h1>Fuel Station LOGIN</h1>
        <form action="#" method="post">
            <div class="mt-5">
                <label for="UserEmail" class="form-label">UserEmail</label>
                <input type="email" name="txtUserEmail"  class="form-control"  placeholder="UserEmail">
                <label for="error-text" class="error-text">*</label>
            </div>
            <div class="mt-3">
                <label for="Password" class="form-label">Password</label>
                <input  type="Password" name="txtPassword"  class="form-control"  placeholder="Password">
                <label for="error-text" class="error-text">*</label>
            </div>
            <div class="mt-5">
                <input  type="checkbox" name="chStatus" value="Yes" checked="checked" size="40pt" >
                <label for="terms Help" class="form-check-label">I am Agree to Terms and Conditions.</label>
            </div>
             <input type="submit" class="btn btn-warning " name="btnLogin" id="btnSubmit" value="LOGIN">  
            <div class="my-3">
             <label for="ForgottenPassword" class="form-label"><a href="verficationcode.php" target="_blank">Forgotten Password ? Click Here.</a></label><br>
              <label for="Signup" class="form-label"><a href="FuelStation_Login.php" target="_blank">Don't Have Account ? Click Here.</a></label><br>
            </div>  
        </form>
    </div>
   </div>
</body>
</html>

