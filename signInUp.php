<?php require_once('connection.php');
//Login
session_start();
if(isset($_POST["btnLogin"]))
{
  $Email=$_POST["txtUserEmail"];
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
      $sql = "SELECT * FROM user_registration WHERE  Password='$Password' and Email='$Email'";
      $ret= mysqli_query($con, $sql);
      $num_row  = mysqli_num_rows($ret);
        if ($num_row >0) 
        {   
          $_SESSION['Email'] =  $Email;
          echo '<script>alert("Login Succesful")</script>'; 
          header('location:index.php'); 
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

<?php require_once('connection.php');
if(isset($_POST["btnSubmit"]))
{
    $Name=$_POST["txtName"];
    $Contact_No=$_POST["txtContactNo"];
    $Email=$_POST["txtEmail"];
    $User_Role=$_POST["cmbUserRole"];
    $Password=$_POST["txtPassword"];
    $Confirm_Password=$_POST["txtConfirmPassword"];
    
    if($Password==$Confirm_Password)
    {
  //perform sql
    $sql = "INSERT INTO user_registration (Name,Contact_No,Email,Password,User_Role) VALUES ('$Name',$Contact_No,'$Email','$Password','$User_Role')";

    $ret= mysqli_query($con, $sql);
    echo '<script>alert("Successfuly Registered")</script>';

     header('location:signInUp.php');
     //disconnect 
     mysqli_close($con);
   
    }
     else
    {
       echo '<script>alert("Please Confirm Your Password ")</script>';
       //header('location:#SectionSignup');
    }


    }
?> 



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>FUELUP SignIn & SignUp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
      src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="css/signin.css" >
  </head>
  <body>
  <!--main container-->
    <div class="container">
      <div class="forms-container">

        <!--SignIn Form-->
        <div class="signin-signup">
          <form action="#" method="post" name="frmsignin" class="sign-in-form">
            <h2 class="title">Sign In</h2>

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="txtUserEmail" placeholder="UserEmail">
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="txtPassword" placeholder="Password" >
            </div>

            <input type="submit" value="Login" name="btnLogin" class="btn solid" >
            <!--Signin with social media links-->
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          <!--SignUp Form-->
          </form>
          <form action="#" method="post" name="frmsignup" class="sign-up-form" id="SectionSignup">
            <h2 class="title">Sign Up</h2>

            <div class="input-field" >
              <i class="fas fa-user"></i>
              <input type="text" class="form-control" name="txtName" placeholder="Ex:Name" required>
            </div>

            <div class="input-field">
              <i class="fas fa-envelope"></i>
                <input type="email" class="form-control" name="txtEmail" placeholder="Ex:Someone@company.com" required>
            </div>

             <div class="input-field">
              <i class="fas fa-phone"></i>
              <input type="tel" pattern="^\d{10}$" class="form-control" name="txtContactNo" placeholder="Ex:0123456789" required>
            </div>

              <div class="input-field">
              <i class="fa-solid fa-circle-user"></i>
              <select id="UserRole" name="cmbUserRole" class="form-control">
                 <option selected value="Choose">I am ..</option>
                 <option value="A">User</option>
                 <option value="A1">Fuel Station</option>
                 <option value="B">Admin</option>
               </select>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" class="form-control" name="txtPassword" placeholder="Ex:Password" required >
            </div>
              <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" class="form-control" name="txtConfirmPassword" placeholder="Ex:Confirm Password" required >
            </div>
            <input type="submit" class="btn" name="btnSubmit" value="Sign up" />

            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New Here ?</h3>
            <p>
             Please SignUp For use our Features.
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign Up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Already Have Account?</h3>
            <p>
             Please SignIn for Reserve Your Fuel Token.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign In
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="js/app.js"></script>
  </body>
</html>
