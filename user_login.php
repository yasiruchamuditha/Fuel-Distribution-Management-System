<?php require('connection.php');

if(isset($_POST["btnSubmit"]))
{
    session_start();
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
               $row = mysqli_fetch_array($result);
                if($row['User_Role'] == 'Admin')
                {
                     $_SESSION['Email'] =  $Email;
                     header('location:Admin.php'); 
                }
                elseif($row['User_Role'] == 'Fuel_Station')
                {
                     $_SESSION['Email'] =  $Email;
                     header('location:Fuel_Station.php'); 
                }
                elseif($row['User_Role'] == 'User') 
                {
                    $_SESSION['Email'] =  $Email;
                    header('location:index.php'); 
                }                             
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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4874d070ea.js" crossorigin="anonymous"></script>
    <!-- css Stylesheet -->
    <link href="css/stylelogin1.css" rel="stylesheet">   
 
</head>
<body style="background-image: url(img/login.png);"> 
    <div class="container-fluid">
     <div class="container">
	   <h1>LOGIN</h1>
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

            <div class="field checked ">
                <input  type="checkbox" id="chStatus" name="chStatus" checked="checked" value="Yes" size="40pt" required>
                <label for="terms Help" class="form-check-label" style="color: white;">I am Agree to Terms and Conditions.</label>
                <span class="error checked-error"></span>
            </div>

            <div class="input-field button">
              <input type="submit" name="btnSubmit" id="myBtn" value="Submit">
            </div>

            <div class="my-4" id="divm5">
             <label for="ForgottenPassword" class="form-label" ><a href="forgottenPassword.php" target="_blank" style="color: white;">Forgotten Password ? </a></label><br>
         
              <label for="Signup" class="form-label" ><a href="User_SignUp.php" target="_blank" style="color: white;">Don't Have Account ? Signup </a></label><br>
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

