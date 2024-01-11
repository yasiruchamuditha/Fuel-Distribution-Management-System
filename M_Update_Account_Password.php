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
  //create a new PHPMailer object:
    $mail = new PHPMailer(true);
    $Email=$_POST["txtEmail"];
    $Password=$_POST["txtPassword"]; 
     if(empty($Email) || empty($Password))
    {
      $alertMessage = "Fileds cannot be blank";
      $redirectLocation = "M_Update_Account_Password.php";
    }
    else
    {
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) 
        {
            $alertMessage = "Please Enter Valid UserEmail";
            $redirectLocation = "M_Update_Account_Password.php";       
        }
        else
        {
            //perform sql
          $sql1 = "SELECT * FROM user_registration WHERE  Password='$Password' and Email='$Email' ";
          $result= mysqli_query($con, $sql1);
          $num_row = mysqli_num_rows($result);

          if ($num_row >0) 
          { 
            $alertMessage = "Completed";
            $redirectLocation = "M_Update_Password.php"; 
          }
          else
          {
              $alertMessage = "Invalid Username and Password Combination";
              $redirectLocation = "M_User_Login.php";
          }
        }
    }
}
else
{
    $alertMessage = "Please Sign In";
    $redirectLocation = "M_User_Login.php";
}

}

?>


<!DOCTYPE html>
<html>
<head>
	 <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
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
	   <h1>Reset Password</h1>

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
        <form action="#" method="post" name="frmlogin" autocomplete="off" onsubmit="return validateForm()">
        <label for="headling" class="form-label" >Please verify Your Account Before Reset Password</label>
        <div class="inputfeild mt-3">
                <label for="UserEmail" class="form-label" >UserEmail</label>
                  <div class="input-field">
                    <input type="email" name="txtEmail" id="txtEmail"  class="email form-control"  placeholder="UserEmail" onkeyup="validateEmail()">
                  </div>
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

            <div class="input-field button">
              <input type="submit" class="btn btn-outline-primary btn-lg"  name="btnSubmit"id="btnSubmit" value="Submit">
            </div> 
        </form>
    </div>
   </div>
   <!-- JavaScript -->
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


<script type="text/javascript" >
//Validtion

var Email_Error=document.getElementById('Email_Error');
var Password_Error=document.getElementById('Password_Error');
//VALIDATE EMAIL
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
//VALIDATE PASSWORD
function validatePassword()
{
 var pass = document.getElementById('txtPassword').value.replace(/^\s+|\s+$/g, "");
 if (pass.length == 0) 
  {
     Password_Error.innerHTML='Password is required.';
    return false;
  }
  else
  {
    var passPattern =/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
   if (!pass.match(passPattern))
   {
    Password_Error.innerHTML='Please enter atleast 8 charatcer with number, symbol, small and capital letter.';
    return false;
   }
  Password_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
  }  
}



//ON SUBMIT FORM 
function validateForm()
{ 
validateEmail();
validatePassword();

if((!validateEmail() )|| (!validatePassword()) )
  {
    return false;
  }
}

</script>
<?php require('M_Footer.php');?>
</body>
</html>

