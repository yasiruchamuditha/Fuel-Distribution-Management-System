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
    //var_dump($_POST);
    $mail = new PHPMailer(true);

    $Name=$_POST["txtName"];
    $Email=$_POST["txtEmail"];
    $Contact_No=$_POST["txtContactNo"];
    $User_Role=$_POST["User_Role"];
    $Password=$_POST["txtPassword"];
    $Confirm_Password=$_POST["txtConfirmPassword"]; 
    $Verification="NotVerified";

//perform sql to find this email is registered in website
    $sql = "SELECT * FROM user_registration WHERE Email='$Email' ";
    $result= mysqli_query($con, $sql);
    $num_row = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    if($row['Email'] == $Email)
      {  
        echo '<script>alert("Username is Taken ")</script>';
      }
     else
      {
         if($Password==$Confirm_Password)
         {
    //$hashed_password=sha1($Password)
    //perform sql
    $sql = "INSERT INTO user_registration (Name,Contact_No,Email,Password,User_Role,Verification)VALUES('$Name',$Contact_No,'$Email','$Password','$User_Role','$Verification')";

    $ret= mysqli_query($con, $sql);
    // echo '<script>alert("Successfuly Registered")</script>';
     
      //send  email to admin
      if ($User_Role=='Admin')
      {
      //email admin
        try 
        {
        //Server settings
        //$mail->SMTPDebug = 1;                //Enable verbose debug output
        $mail->isSMTP();                       //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';  //Set the SMTP server to send through
        $mail->SMTPAuth   = true;              //Enable SMTP authentication
        $mail->Username   = 'fuelupgroup@gmail.com';  //SMTP username
        $mail->Password   = 'tiykxmnknuryvcwt';       //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
        $mail->setFrom('fuelupgroup@gmail.com', 'Fuel Up');
        //Add a recipient
        $mail->addAddress($Email);   
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
       // $mail->addCC('cc@example.com');
       // $mail->addBCC('bcc@example.com');
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
       // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); 
          //Optional name
        //Content
        $mail->isHTML(true);       
        
        //$verification_code=substr(number_format(time()*rand(),0,'',''), 0,6);                          
        //Set email format to HTML
        $mail->Subject = 'Account Registration';
        $mail->Body    = '<div style="width: 700px ; background-color:lightskyblue; font-weight: bold;text-align: center;font-family: Arial;font-size: 30pt;">Welcome '.$Name.' to FuelUp Family</div>
          <div style="width: 700px; height:1500px; background-color:white;font-family: Arial;">
          <p>Hi,<br>Dear Admin,<br>Your FuelUp Admin Account is successfully Registered on '.$Email.'</p><p>You can Use this '.$Email.' to signup Fuelup Admin panel</p><p>we accept your full effort in the fuelup family </p>
           <p>please <a href="mailto:fuelupgroup@gmail.com"><b><u>contact</u></b></a> us for more Details. </p>
            <p>Thank You.<br>Sincerely yours,<br>The FuelUp Team</p>
            </div>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        //echo 'Message has been sent';

         } 
         catch (Exception $e)
         {
           //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            echo '<script>alert("Email is not send...")</script>';
         }
        //end
        //send  email to Fuel_Station
        }
        else if ($User_Role=='Fuel_Station')
        {

       //Fuel_Station 
        try 
        {
        //Server settings
        //$mail->SMTPDebug = 1;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'fuelupgroup@gmail.com';                     //SMTP username
        $mail->Password   = 'tiykxmnknuryvcwt';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('fuelupgroup@gmail.com', 'Fuel Up');
        //Add a recipient
        $mail->addAddress($Email);   
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
       // $mail->addCC('cc@example.com');
       // $mail->addBCC('bcc@example.com');
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
       // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);       
        //$verification_code=substr(number_format(time()*rand(),0,'',''), 0,6) ;                          //Set email format to HTML
        $mail->Subject = 'Account Registration';
        $mail->Body    = '<div style="width: 700px ; background-color:lightskyblue; font-weight: bold;text-align: center;font-family: Arial;font-size: 30pt;">Welcome '.$Name.' to FuelUp Family</div>
          <div style="width: 700px; height:1500px; background-color:white;font-family: Arial;">
          <p>Hi,<br>Dear Fuel_Station,<br>Your FuelUp Account is successfully Registered on '.$Email.'</p><p>we accept your full effort in the fuelup family </p>
           <p>please <a href="mailto:fuelupgroup@gmail.com"><b><u>contact</u></b></a> us for more Details. </p>
            <p>Thank You.<br>Sincerely yours,<br>The FuelUp Team</p>
            </div>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        //echo 'Message has been sent';

          } 
          catch (Exception $e)
            {
             //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
             echo '<script>alert("Email is not send...")</script>';
            }
        }
       //end

    //send email to user
    else if ($User_Role=='User')
    {

       //user email
        try 
        {
        //Server settings
        //$mail->SMTPDebug = 1;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'fuelupgroup@gmail.com';                     //SMTP username
        $mail->Password   = 'tiykxmnknuryvcwt';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('fuelupgroup@gmail.com', 'Fuel Up');
        //Add a recipient
        $mail->addAddress($Email);   
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
       // $mail->addCC('cc@example.com');
       // $mail->addBCC('bcc@example.com');
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
       // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);       
        //$verification_code=substr(number_format(time()*rand(),0,'',''), 0,6) ;                          //Set email format to HTML
        $mail->Subject = 'Account Registration';
        $mail->Body    = '<div style="width: 700px ; background-color:lightskyblue; font-weight: bold;text-align: center;font-family: Arial;font-size: 30pt;">Welcome '.$Name.' to FuelUp Family</div>
          <div style="width: 700px; height:1500px; background-color:white;font-family: Arial;">
          <p>Hi,<br>Dear User,<br>Your FuelUp  Account is successfully Registered on '.$Email.'</p><p>You Can Reserve Your Fuel Tokens From us & You can check latest Fuel Prices in Sri Lanka</p>
           <p>please <a href="mailto:fuelupgroup@gmail.com"><b><u>contact</u></b></a> us for more Details. </p>
            <p>Thank You.<br>Sincerely yours,<br>The FuelUp Team</p>
            </div>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        //echo 'Message has been sent';

      } 
      catch (Exception $e)
      {
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        //echo '<script>alert("Please check Your connection ")</script>';
        echo '<script>alert("Email is not send...")</script>';
      }
//end
    }
    
    //location after sign up
     header('location:User_Login.php');
 
     //disconnect 
     mysqli_close($con);
  }  
  else
  {
    echo '<script>alert("Please Try Again Shortly....")</script>';
  }  
}
}       
//
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SignUp</title>
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
    <!-- CSS -->
    <link rel="stylesheet" href="css/style_signup1.css" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"/>
    <style type="text/css">
      #role_error
      {
        color: red;
      }
    </style>

  </head>

  <body style=" background: url(img/user_signup.png);">
    <div class="container">
      <h1>User Registration</h1>
      <h3>Already Have Account? <a href="user_login.php" target="_blank">Login Here</a></h3>
      <form action="#" method="post"  name="frmsignup" onsubmit="return checkUserrole()">
      <div class="field name-field" >
          <label for="Lastname" class="form-label">Name</label>
          <div class="input-field">
              <input type="text" name="txtName" placeholder="Enter Your Name" class="name form-control"  >
          </div>
          <span class="error name-error">
            <p class="error-text">Please Enter A Valid Name</p>
          </span>
       </div>

        <div class="field email-field" >
            <label for="Email" class="form-label">Email</label>
            <div class="input-field">
              <input type="email" name="txtEmail" placeholder="Enter Your Email" class="email form-control">
            </div>
            <span class="error email-error">
             <p class="error-text">Please Enter A Valid Email</p>
            </span>
        </div>

        <div class="field contact-field" >
           <label for="ContactNo" id="phone" class="form-label">Contact No</label>
           <div class="input-field">
            <input type="tel" placeholder="Enter Your Telephone Number" name="txtContactNo" class="contact form-control">
          </div>
          <span class="error contact-error">
            <p class="error-text">Please Enter A Valid Contact Number</p>
          </span>
        </div>

        <div class="field role-field" >
           <label for="UserRole" class="form-label">I am ..</label>
           <div class="input-field">
             <select id="UserRole" name="User_Role"  class="role form-control" style="height: 50px;" onkeyup="checkUserrole()">
               <option selected value="S">Choose..</option>
               <option value="User">User</option>
               <option value="Fuel_Station">Fuel Station</option>
               <option value="Admin">Admin</option>
             </select>
          </div>
          <span id="role_error"></span>
        </div>

        <div class="field create-password">
          <label for="Password" class="form-label">Password</label>
          <div class="input-field">
            <input type="password" placeholder="Create password" name="txtPassword" class="password form-control"  />
             <i class="bx bx-hide show-hide"></i>
          </div>
            <span class="error password-error">
            <p class="error-text">Please enter atleast 8 charatcer with number, symbol, small and capital letter.</p>
            </span>
        </div>

        <div class="field confirm-password">
             <label for="ConfirmPassword" class="form-label">Confirm Password</label>
             <div class="input-field">
              <input type="password" placeholder="Confirm password" name="txtConfirmPassword" class="cPassword form-control"  />
              <i class="bx bx-hide show-hide"></i>
             </div>
             <span class="error cPassword-error">
              <p class="error-text">Password don't match</p>
             </span>
        </div>


        <div class="input-field button">
          <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit">
        </div>

    </form>
  </div>

    <!-- JavaScript -->
    <script src="js/scriptx.js"></script>
    <script type="text/javascript">
      var role_error=document.getElementById('role_error');
function checkUserrole()
{
if(document.getElementById("UserRole").value == "S")
{
  role_error.innerHTML='Please select your role.';
  return false;
}
return true;
}
  
document.getElementById("UserRole").addEventListener("click", function() {

  if (document.getElementById("UserRole").value != "S") {

  return true;
}
});
    </script> 
  </body>
</html>
