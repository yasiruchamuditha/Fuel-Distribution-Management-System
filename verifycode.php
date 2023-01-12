<?php require_once('connection.php');
if(isset($_POST["btnSubmit"]))
{
  $code=$_POST["txtcode"];

        //perform sql
        $sql = "SELECT * FROM passwordupdates WHERE  VerificationCode='$code' ";
        $ret= mysqli_query($con, $sql);
        $num_row  = mysqli_num_rows($ret);
           if ($num_row >0) 
        {   
            //echo '<script>alert("Succesful")</script>'; 
          header('location:updatePassword.php');  
        }
      else
        {
          echo '<script>alert("Invalid Verification Code")</script>';
        }

        //disconnect 
         mysqli_close($con);
}



?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <title>Verify code - User Account</title>
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
    <link href="css/style.css" rel="stylesheet">  
    <link href="css/forgot.css" rel="stylesheet">  
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script> 

</head>
<body style="background: url(img/Token1.png);">
 <?php require('navigationBarForms.php');?>

<div class="container-fluid">
<div class="container" style="background: transparent; margin-top: 150px; height: 400px;">
    <h1 id="h1">Forgotten Password</h1>
        
<form class="row g-3 needs-validation" action="#" method="post" onsubmit="return result()" >
  <div class="inputfeild mt-3">
  	<label for="heading" class="form-label">Please Enter Verification Code that Send to Your Email for verify Your User Account</label>
      <input type="text" class="form-control" id="txtcode" name="txtcode" placeholder="Verification Code" onkeyup="validateCode()" style="margin-top: 50px;">
        <span id="Code_Error"></span>
  </div>

 <!--Button-->
  <button type="submit" id="btnSubmit" class="btn btn-outline-dark btn-lg" name="btnSubmit">Continue</button>

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
</body>
</html>