<?php require_once('connection.php');
session_start();  
/**
 * @author Yasiru
 * contact me : https://linktr.ee/yasiruchamuditha for more information.
 */
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
$alertMessage = '';
$redirectLocation = '';

if(isset($_POST["btnSubmit"]))
{
     if (isset($_SESSION["Email"]))
     {
         $Email=$_POST["txtEmail"]; 
         if(!empty($Email)) 
         {
            if (filter_var($Email, FILTER_VALIDATE_EMAIL)) 
                {
                     //create a new PHPMailer object:
                     $mail = new PHPMailer(true);
                     $Email=$_POST["txtEmail"];  
                     $date = date('d-m-y h:i:s');
        try
        {
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
        $verification_code=substr(number_format(time()*rand(),0,'',''), 0,6) ;                          //Set email format to HTML
        $mail->Subject = 'Account Verification';
        $mail->Body    = '<div style="width: 700px ; background-color:lightskyblue; font-weight: bold;text-align: center;font-family: Arial;font-size: 30pt;">Account Verification Code</div><p>Hi,<br>Dear User,<br>We received a request to create QR Code of Your FuelUp Account.Your Verification Code is: <b>'.$verification_code.'</b><br>Enter this code to complete the QR Code Generation Process.This code will expire in 2 minutes.If you did not request this code, someone probably gave your Email address by mistake. You can safely ignore this email.</p><p>please <a href="fuelupgroup@gmail.com"><b><u>contact</u></b></a> us for more Details. </p><p>Thanks for helping us keep your account secure.<br>Sincerely yours,<br>The FuelUp Team</p><br>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        //echo 'Message has been sent';

          //perform sql   
        $sql = "INSERT INTO qr_relesed (Email,Date_Time) VALUES ('$Email','$date')"; 
       
        $ret= mysqli_query($con, $sql);

         //perform sql
        $sql1 = "INSERT INTO qr_code_verification(Email,Code) VALUES ('$Email','$verification_code')";
 
        $ret1= mysqli_query($con, $sql1);

        $alertMessage = "Succesfully send the code";
        $redirectLocation = "M_Verify_Qr_Code.php"; 

      //disconnect 
      mysqli_close($con);
      } 
      catch (Exception $e)
      {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }       
    }
    else
    {
       $alertMessage = "Please Enter Valid UserEmail";
       $redirectLocation = "M_Acc_Verification.php"; 
    }   
}
else
{
    $alertMessage = "Fileds cannot be blank";
    $redirectLocation = "M_Acc_Verification.php";
    
}
        
    }
     else
     {
         $alertMessage = "Please Sign in";
         $redirectLocation = "M_User_Login.php"; 
     }
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <link href="css/M_Forgotten.css" rel="stylesheet">  
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script> 
</head>

<body style="background: url(img/Token1.png);">
    <?php require('M_NavigationBarForms.php');?>
    <h1 style="text-align: center;">Create QR Code</h1>
<div class="container-fluid" id="containerm">
<div class="container">
<h1>Verify Your User Account</h1>
<?php if (!empty($alertMessage)) : ?>
                <div class="modal fade" id="outputModal" tabindex="-1" aria-labelledby="outputModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="outputModalLabel">Output Message</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php echo $alertMessage; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var modal = new bootstrap.Modal(document.getElementById('outputModal'));
                        modal.show();
                        // Redirect after displaying the message
                        var redirectLocation = '<?php echo $redirectLocation; ?>';
                        if (redirectLocation) {
                            setTimeout(function () {
                                window.location.href = redirectLocation;
                            }, 3000); // Redirect after 3 seconds (adjust as needed)
                        }
                    });
                </script>
            <?php endif; ?>
      
<form class="row g-3 needs-validation" action="#" method="post" onsubmit="return result()" >
 <div class="inputfeild mt-3">
    <label for="heading" class="form-label mt-3">Please Enter userEmail</label>
      <input type="text" class="form-control mt-3" id="txtEmail" name="txtEmail" placeholder="User Email" onkeyup="validateEmail()">
        <span id="Code_Error"></span>
     </div>
 <!--Button-->
  <button style="margin-top: 50px;" type="submit" id="btnSubmit" class="btn btn-outline-dark btn-lg" name="btnSubmit">Continue</button>
   </form> 
</div>
</div>

<script type="text/javascript">
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

 <?php require('M_Footer.php');?>

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
