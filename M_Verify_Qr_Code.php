<?php require_once('connection.php');

if(isset($_POST["btnverify"]))
{
  $code=$_POST["txtcode"];

        //perform sql
        $sql = "SELECT * FROM qr_code_verification WHERE  Code='$code' ";
        $ret= mysqli_query($con, $sql);
        $num_row  = mysqli_num_rows($ret);
           if ($num_row >0) 
        {   
            //echo '<script>alert("Succesful")</script>'; 
          header('location:QR_Generator.php');  
        }
      else
        {
          echo '<script>alert("Invalid Verification Code. Please Try Again Shortly.")</script>';
        }

        //disconnect 
         mysqli_close($con);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Fuel Up - Contact Us</title>
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
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/forgot.css" rel="stylesheet">  
</head>

<body style="background: url(img/Token1.png);">
    <?php require('navigationBarForms.php');?>
    <h1 style="text-align: center;">Create QR Code</h1>
<div class="container-fluid">
<div class="container" style="background: transparent; margin-top: 50px; height: auto;">
<h1 id="h1">Verify Your User Account</h1>
<form class="row g-3 needs-validation" action="#" method="post" onsubmit="return result()" >
  <div class="inputfeild mt-3">
    <label for="heading" class="form-label">Please Enter Verification Code that Send to Your UserEmail of Your Fuelup Account.</label>
      <input type="text" class="form-control" id="txtcode" name="txtcode" placeholder="Verification Code" onkeyup="validateCode()" style="margin-top: 50px;">
        <span id="Code_Error"></span>
  </div>

 <!--Button-->
  <button style="margin-top: 50px;" type="submit" id="btnverify" class="btn btn-outline-dark btn-lg" name="btnverify">Continue</button>
</form>

</div>
</div>

<script type="text/javascript">
 

function validateCode()
{
  
  var Code=document.getElementById('txtcode').value.replace(/^\s+|\s+$/g, "");
  if(Code.length == 0)
  {
    Code_Error.innerHTML='Verification Code is required.';
    return false;
  }
  Code_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}


function result()
{

  validateCode();


if(!validateCode())  
  {
    return false;
  }
}

</script>

 <?php require('footer.php');?>

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
