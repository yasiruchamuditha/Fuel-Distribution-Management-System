<?php require_once('connection.php');
  
if(isset($_POST["btnSubmit"]))
{
    $Name=$_POST["txtName"];
    $Contact_No=$_POST["txtContactNo"];
    $Email=$_POST["txtEmail"];
    $Password=$_POST["txtPassword"];
    $Confirm_Password=$_POST["txtConfirmPassword"];
    
    if($Password==$Confirm_Password)
    {
    //perform sql
    $sql = "INSERT INTO user_registration (Name,Contact_No,Email,Password) VALUES ('$Name',$Contact_No,'$Email','$Password')";

    $ret= mysqli_query($con, $sql);
    // echo '<script>alert("Successfuly Registered")</script>';
     header('location:Admin_login.php');

     //disconnect 
     mysqli_close($con);
    }
     else
    {
       echo '<script>alert("Please Try Again Shortly....")</script>';
    }
}
?> 

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <title>Admin Registration</title>
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
    <!-- css Stylesheet -->
    <link href="css/styles.css" rel="stylesheet"> 
    <link href="css/stylesignup.css" rel="stylesheet">       
</head>
<body>
<!--form Start-->
  <div class="container-fluid">
     <div class="container ">
    <h1>Admin User Registration</h1>
    <h3>Already Have Account? <a href="Admin_login.php" target="_blank">Login Here</a></h3>
<form class="row g-3 needs-validation" name="frmUserRegistration" action="#" method="post">
  <!--Name-->
  <div class="mt-3">
  <label for="Lastname" class="form-label">Name</label>
  <input type="text" class="form-control" name="txtName" placeholder="Ex:Last Name" required> 
  <label for="error-text" class="error-text">*</label>
  </div>  

<!--Contact Number-->
  <div class="mt-0">
    <label for="ContactNo" id="phone" class="form-label">Contact No</label><br> 
    <input type="tel" pattern="^\d{10}$" class="form-control" name="txtContactNo" placeholder="Ex:0123456789" required>
    <label for="error-text" class="error-text">*</label>
  </div>
<!--Email-->
 <div class="mt-0">
  <label for="Email" class="form-label">Email</label>
  <input type="email" class="form-control" name="txtEmail" placeholder="Ex:Someone@company.com" required> 
  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  <label for="error-text" class="error-text">*</label>
  </div>
<!--Password-->
  <div class="mt-0">
    <label for="Password" class="form-label">Password</label>
    <input type="password" class="form-control" name="txtPassword" placeholder="Ex:xxxxxxxx" required >
    <label for="error-text" class="error-text">*</label>
  </div>
<!--Confirm Password-->
  <div class="mt-0">
    <label for="ConfirmPassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="txtConfirmPassword" placeholder="Ex:xxxxxxxx" required >
    <label for="error-text" class="error-text">*</label>
  </div>
<!--Check Terms -->
  <div class="mt-2 form-check">
    <input type="checkbox" class="form-check-input" name="chkCheck" required >
    <label class="form-check-label" for="exampleCheck1">Agree to Terms and Conditions</label>
    <label for="error-text" class="error-text">*</label>
  </div>
 <!--Button-->
  <button type="submit" class="btn btn-outline-primary btn-lg" id="btnSubmit" name="btnSubmit">Submit</button>

</form>
</div>
</div>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>
