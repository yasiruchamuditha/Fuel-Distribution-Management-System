<?php  require_once('connection.php');
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
  //create a new PHPMailer object:
 $mail = new PHPMailer(true);
  // 

$Email=$_POST["txtEmail"];
$password=$_POST["txtpassword"];
$confirmpassword=$_POST["txtConfirmPassword"];

if($password==$confirmpassword)
{
//perform sql
$sql = "UPDATE user_registration SET Password='$password' where Email='$Email' ";

$ret= mysqli_query($con, $sql);

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
        $mail->addAddress($Email);   
        //$mail->addAddress('ellen@example.com');      //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
       // $mail->addCC('cc@example.com');
       // $mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
       // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);       
        //$verification_code=substr(number_format(time()*rand(),0,'',''), 0,6) ;                          //Set email format to HTML
        $mail->Subject = 'Account recovered successfully';
        $mail->Body    = '<div style="width: 700px ; background-color:lightskyblue; font-weight: bold;text-align: center;font-family: Arial;font-size: 30pt;">Account recovered successfully</div><p>Hi,<br>Dear User,<br><b>Welcome back to your account.</b></p><p>If you suspect you were locked out of your account because of changes made by someone else, please <a href="fuelupgroup@gmail.com"><b><u>contact</u></b></a> us immediately to protect your account.</p>
            <p>Thanks for helping us keep your account secure<br>Sincerely yours,<br>The FuelUp Team</p>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        //echo 'Message has been sent';

         } 
         catch (Exception $e)
         {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
         }

     header('location:user_login.php');

     echo '<script>alert("Succesfuly Update Your Password , Please Sign In")</script>';
     //disconnect 
     mysqli_close($con);

}
else
{
   echo '<script>alert("Password and Confirm Password is Mismatch")</script>';
}
}
    

?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <title>Update Password - User Account</title>
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
<div class="container" style="background: transparent; margin-top: 100px;">
<h1>Update Account Password</h1>
<form class="row g-3 needs-validation" action="#" method="post" onsubmit="return result()" >
  <div class="inputfeild mt-3">
      <label for="Email" class="form-label">UserEmail</label>
      <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="UserEmail" onkeyup="validateEmail()" >
        <span id="Email_Error"></span>
  </div>

    <div class="inputfeild mt-3">
      <label for="password" class="form-label">New Password</label>
      <input type="text" class="form-control" id="txtpassword" name="txtpassword" placeholder="New Password" onkeyup="validatePassword()" >
        <span id="Password_Error"></span>
  </div>

    <div class="inputfeild mt-3">
      <label for="confirmpassword" class="form-label">Confirm New Password</label>
      <input type="text" class="form-control" id="txtConfirmPassword" name="txtConfirmPassword" placeholder="Confirm New Password" onkeyup="confirmPass()" >
        <span id="ConfirmPassword_Error"></span>
  </div>

 <!--Button-->
  <button type="submit" id="btnSubmit" class="btn btn-outline-dark btn-lg" name="btnSubmit">Continue</button>

</form>
</div>
</div>

<script type="text/javascript">
	  var Email_Error=document.getElementById('Email_Error');
    var Password_Error=document.getElementById('Password_Error');
    var ConfirmPassword_Error=document.getElementById('ConfirmPassword_Error');
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

function validatePassword() 
{
passInput=document.getElementById('txtpassword').value.replace(/^\s+|\s+$/g, "");
    if (passInput.length == 0)
     {
      Password_Error.innerHTML='Password is required.';
     return false;

    }
  Password_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}

function confirmPass() {
passInput=document.getElementById('txtpassword').value.replace(/^\s+|\s+$/g, "");
cPassInput=document.getElementById('txtConfirmPassword').value.replace(/^\s+|\s+$/g, "");
if (cPassInput.length == 0) 
  {
      ConfirmPassword_Error.innerHTML='Password is required';
     return false;
  }
  ConfirmPassword_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}


function result()
{
  validateEmail();
  validatePassword();
  confirmPass();


if((!validateEmail()) || (!validatePassword()) || (!confirmPass()) ) 
  {
    return false;
  }
}

</script>
</body>
</html>