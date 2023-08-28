<?php require_once('connection.php');
   session_start();
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

if (isset($_SESSION["Email"]))
{
  //create a new PHPMailer object:
    $mail = new PHPMailer(true);
    $Email=$_POST["txtEmail"];
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
        $sql = "SELECT * FROM user_registration WHERE  Password='$Password' and Email='$Email' ";
        $result= mysqli_query($con, $sql);
        $num_row = mysqli_num_rows($result);

         if ($num_row >0) 
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


               echo '<script>alert("Invalid Username and Password Combination")</script>';
             header('location:user_login.php');

         }


        }
    }

}
else
{
    echo '<script>alert("Please SignIn")</script>';
    header('location:user_login.php');
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
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"/>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
     <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"/>
    <!-- css Stylesheet -->
    <link href="css/stylelogin1.css" rel="stylesheet">   
 
</head>
<body style="background: url(img/Token1.png);">
    <div class="container-fluid">
     <div class="container">
	   <h1>Reset Password</h1>
        <form action="#" method="post" name="frmlogin" onsubmit="return validateForm()">

            <div class="field email-field" >
                <label for="UserEmail" class="form-label" >UserEmail</label>
                  <div class="input-field">
                    <input type="email" name="txtEmail" id="txtEmail"  class="email form-control"  placeholder="UserEmail" onkeyup="validateEmail()">
                  </div>
                   <span id="Email_Error"></span>
                   
            </div>

         <div class="field create-password">
             <label for="Password" class="form-label">Password</label>
             <div class="input-field">
               <input type="password" placeholder="Create password" name="txtPassword" id="txtPassword" class="password form-control"  onkeyup="validatePassword()" />
               <i class="bx bx-hide show-hide"></i>
            </div>
             <span id="Password_Error"></span>
         </div>

            <div class="input-field button">
              <input type="submit" name="btnSubmit" id="myBtn" value="Submit">
            </div> 
        </form>
    </div>
   </div>
   <!-- JavaScript -->
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

//CHECK CHECK BOX STATUS
const checkInput = document.getElementById("chStatus");

checkInput.addEventListener("chStatus", () => {
  checkInput.setCustomValidity("");
  checkInput.checkValidity();
});

checkInput.addEventListener("invalid", () => {
  if (checkInput.value === "")
   {
    checkInput.setCustomValidity("Please agree to Terms and Conditions.");
  } 
});

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


//method to convert password to text
 const form =document.querySelector("form"),
 passField = form.querySelector(".create-password"),
 passInput = passField.querySelector(".password");

  // Hide and show password
  const eyeIcons = document.querySelectorAll(".show-hide");

   eyeIcons.forEach((eyeIcon) => {

    eyeIcon.addEventListener("click", () => {

    const pInput = eyeIcon.parentElement.querySelector("input"); //getting parent element of eye icon and selecting the password input
    if (pInput.type === "password") 
    {
      eyeIcon.classList.replace("bx-hide", "bx-show");
      return (pInput.type = "text");
    }
    eyeIcon.classList.replace("bx-show", "bx-hide");
    pInput.type = "password";
  });
});


</script>
</body>
</html>

