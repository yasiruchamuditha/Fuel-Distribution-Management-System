<?php require_once('connection.php');
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require 'vendor/autoload.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
//


if(isset($_POST["btnSubmit"]))
{
	$email=$_POST["txtemail"];
	//create a new PHPMailer object:
    $mail = new PHPMailer(true);
    
    try {
       
        //Server settings
        //$mail->SMTPDebug = 1;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'fuelupgroup@gmail.com';                     //SMTP username
        $mail->Password   = 'yxejuwcqpkztsmln';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('fuelupgroup@gmail.com', 'Fuel Up');
        //Add a recipient
        $mail->addAddress($email);   
        //$mail->addAddress('ellen@example.com');      //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
       // $mail->addCC('cc@example.com');
       // $mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
       // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);       
        $verification_code=substr(number_format(time()*rand(),0,'',''), 0,6) ;                          //Set email format to HTML
        $mail->Subject = 'Account Verification';
        $mail->Body    = '<div style="width: 700px ; background-color:lightskyblue; font-weight: bold;text-align: center;font-family: Arial;font-size: 30pt;">Account Verification Code</div><p>Hi,<br>Dear User,<br>We received a request to reset the password on your FuelUp Account.Your Verification Code is: <b>'.$verification_code.'</b><br>Enter this code to complete the reset of account Password.This code will expire in 24 hours.If you did not request this code, someone probably gave your email address by mistake. You can safely ignore this email.</p><p>please <a href="fuelupgroup@gmail.com"><b><u>contact</u></b></a> us for more Details. </p><p>Thanks for helping us keep your account secure.<br>Sincerely yours,<br>The FuelUp Team</p><br>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        //echo 'Message has been sent';

  
        //perform sql
        $sql = "INSERT INTO passwordupdates(UserEmail,VerificationCode) VALUES ('$email','$verification_code')";
 
        $ret= mysqli_query($con, $sql);
     
        header('location:verifycode.php');
   

     //disconnect 
      mysqli_close($con);
    } 
    catch (Exception $e)
     {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     }
   
}


?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <title>Forgotten Password - User Account</title>
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
<div class="container" style="background: transparent; margin-top: 150px;">
    <h1 id="h1">Forgotten Password</h1>
        <h1 id="h1">User Account</h1>
<form class="row g-3 needs-validation" action="#" method="post" onsubmit="return result()" >
  <div class="inputfeild mt-3">
  	<label for="heading" class="form-label">Please Enter Your UserEmail To Get Verification Code.</label>
      <label for="Email" class="form-label">User Email</label>
      <input type="email" class="form-control" id="txtEmail" name="txtemail" placeholder="User Email" onkeyup="validateEmail()" >
        <span id="Email_Error"></span>
  </div>

 <!--Button-->
  <button type="submit" id="btnSubmit" class="btn btn-outline-dark btn-lg" name="btnSubmit">Continue</button>

</form>
</div>
</div>

<script type="text/javascript">
	  var Email_Error=document.getElementById('Email_Error');
function validateEmail()
{
  var Email = document.getElementById('txtEmail').value.replace(/^\s+|\s+$/g, "");
  if (Email.length == 0) 
  {
     Email_Error.innerHTML='Email is required.';
    return false;
  }
  else
  {
    var emaiPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
   if (!Email.match(emaiPattern))
   {
    Email_Error.innerHTML='Please Enter Email in correct format.';
    return false;
   }
  Email_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
  }  
}

function result()
{
  validateEmail();

if(!validateEmail())  
  {
    return false;
  }
}

</script>
</body>
</html>