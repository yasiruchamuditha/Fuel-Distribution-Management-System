<?php  require_once('connection.php');
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
  //create a new PHPMailer object:
$mail = new PHPMailer(true);

$Email=$_POST["txtEmail"];
$password=$_POST["txtPassword"];
$confirmpassword=$_POST["txtConfirm_Password"];

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

         $alertMessage = "Succesfuly Update Your Password , Please Sign In";
         $redirectLocation = "M_User_Login.php";
        //disconnect 
        mysqli_close($con);
}
else
{
   $alertMessage = "Password and Confirm Password is Mismatch";
   $redirectLocation = "M_Update_Password.php";
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
    <!-- Font Awesome -->
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

<div class="container-fluid" id="containerm">
<div class="container">
<h1>Update Account Password</h1>

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
      <label for="Email" class="form-label">UserEmail</label>
      <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="UserEmail" onkeyup="validateEmail()" >
        <span id="Email_Error"></span>
  </div>

  <div class="inputfeild mt-3">
            <label class="form-label mb-2">Password:</label>
            <div class="input-group">
                <input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="Enter Password" onkeyup="validatePassword()">
                <button type="button" class="btn btn-outline-secondary" id="showPasswordBtn">
                    <i class="bx bx-hide show-hide"></i>
                </button>
         </div>
    <span id="Password_Error"></span>
    </div>
        <div class="inputfeild mt-3">
            <label class="form-label mb-2">Confirm Password:</label>
            <div class="input-group">
                <input type="password" class="form-control" name="txtConfirm_Password" id="txtConfirm_Password" placeholder="Please Confirm Password" onkeyup="validateConfirm_Password()">
                <button type="button" class="btn btn-outline-secondary" id="showConfirmPasswordBtn">
                    <i class="bx bx-hide show-hide"></i>
                </button>
            </div>
            <span id="Confirm_Password_Error"></span>
        </div>


 <!--Button-->
  <button type="submit" id="btnSubmit" class="btn btn-outline-dark btn-lg" name="btnSubmit">Continue</button>

</form>
</div>
</div>

<script>
    // Function to toggle password visibility
    function togglePasswordVisibility(inputId, buttonId) {
        const passwordInput = document.getElementById(inputId);
        const showHideButton = document.getElementById(buttonId);

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            showHideButton.innerHTML = '<i class="bx bx-show show-hide"></i>';
        } else {
            passwordInput.type = "password";
            showHideButton.innerHTML = '<i class="bx bx-hide show-hide"></i>';
        }
    }

    // Event listeners for the show/hide buttons
    document.getElementById("showPasswordBtn").addEventListener("click", function () {
        togglePasswordVisibility("txtPassword", "showPasswordBtn");
    });

    document.getElementById("showConfirmPasswordBtn").addEventListener("click", function () {
        togglePasswordVisibility("txtConfirm_Password", "showConfirmPasswordBtn");
    });
</script>

<script type="text/javascript">
	  var Email_Error=document.getElementById('Email_Error');
    var Password_Error=document.getElementById('Password_Error');
    var Confirm_Password_Error=document.getElementById('ConfirmPassword_Error');
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
  var Password=document.getElementById('txtPassword').value.replace(/^\s+|\s+$/g, "");

  if (Password.length == 0) 
  {
    Password_Error.innerHTML='Password is required.';
    return false;
  }
  else
  {
    const PasswordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
   if (!Password.match(PasswordPattern))
   {
    Password_Error.innerHTML='Please Enter Password with Numbers,symbols,upper and lower case (minimum 8 characters)';
    return false;
   }
   Password_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
  }  
}


function validateConfirm_Password() {
  var Confirm_Password = document.getElementById('txtConfirm_Password').value.trim();
  var Passwordx = document.getElementById('txtPassword').value.trim();

  var Confirm_Password_Error = document.getElementById('Confirm_Password_Error');

  if (Confirm_Password.length === 0) {
    Confirm_Password_Error.innerHTML = 'Confirm Password is required.';
    return false;
  } else if (Confirm_Password !== Passwordx) {
    Confirm_Password_Error.innerHTML = 'Please Enter the correct password Again.';
    return false;
  } else {
    Confirm_Password_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    return true;
  }
}



function result()
{
  validateEmail();
  validatePassword();
  validateConfirm_Password();


if((!validateEmail()) || (!validatePassword()) || (!validateConfirm_Password()) ) 
  {
    return false;
  }
}
</script>
<?php require('M_Footer.php');?>
</body>
</html>