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

// Define variables to store messages
$alertMessage = '';
$redirectLocation = '';

if (isset($_POST["btnSubmit"])) 
{
    //create a new PHPMailer object:
    $mail = new PHPMailer(true); 

    $Name = $_POST["txtName"];
    $Email = $_POST["txtUSerEmail"];
    $NIC = $_POST["txtNIC"];
    $Contact_No = $_POST["txtTelephoneNo"];
    $User_Role = $_POST["User_Role"];
    $Password = $_POST["txtPassword"];
    $Confirm_Password = $_POST["txtConfirm_Password"];
    $Verification = "NotVerified";

    //perform sql to find this email is registered in the website
    $sql1 = "SELECT * FROM user_registration WHERE Email='$Email' ";
    $ret1 = mysqli_query($con, $sql1);
    $num_row = mysqli_num_rows($ret1);
    if ($num_row > 0)
    {
       $row = mysqli_fetch_array($ret1);
       if($row['Email'] == $Email)
       {
           $alertMessage = "There is already account registered under this Email.";
           $redirectLocation = "M_User_Login.php";
       } 
    }   
    else 
    {
        if ($Password == $Confirm_Password) 
        {
            //perform SQL to insert user registration data 
            $sql2 = "INSERT INTO user_registration (Name, Contact_No, Email, Password, User_Role, Verification)
            VALUES('$Name',$Contact_No,'$Email','$Password','$User_Role', '$Verification')";

            $result2 = mysqli_query($con, $sql2);
            if ($result2 > 0)
            {
                if($User_Role == 'Admin')
                {
                  $alertMessage = "Registration successful!";
                //email admin
                  try 
                    {
                        //Server settings
                        //$mail->SMTPDebug = 1;                //Enable verbose debug output
                        $mail->isSMTP();                       //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';  //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;              //Enable SMTP authentication
                        $mail->Username   = 'fuelupgroup@gmail.com';  //SMTP username
                        $mail->Password   = 'yxejuwcqpkztsmln';       //SMTP password
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
                  $redirectLocation = "M_User_Login.php"; 
                }
                elseif($User_Role == 'User')
                {
                    
                     $alertMessage = "Registration successful.Please Login to the System";
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
                       echo '<script>alert("Email is not send...")</script>';
                      }
                     $redirectLocation = "M_User_Login.php";
                }
                elseif($User_Role == 'Fuel_Station') 
                {
                    $alertMessage = "Registration successful!";
                   //Fuel_Station 
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
                    $redirectLocation = "M_User_Login.php";
                }                             
            } 
            else 
            {
                $alertMessage = "Please Try Again Shortly....";
                $redirectLocation = "M_User_Login.php";
            }
        } 
        else 
        {
            $alertMessage = "Invalid username or password. Please try again";
            $redirectLocation = "M_User_Login.php";
        }
        // Disconnect 
        mysqli_close($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FuelUp - User Registration</title>
    <!-- Template Main CSS File -->
    <link href="css/M_User_Registration.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body style=" background: url(img/user_signup.png);">
<?php require('M_NavigationBarForms.php');?>
    <div class="container-fluid" id="containerm">
        <div class="container mt-3">
        <h1 style="color:white;">User Registration</h1>
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
        <form class="row g-3 needs-validation" name="frmUserRegistration" method="post" autocomplete="off" action="#"  onsubmit="return result()" >
            <div class="inputfeild mt-3 ">
                <label  class="form-label mb-2">Name:</label>
                <input type="text" class="form-control" name="txtName" id="txtName"  placeholder="Enter Your First Name" onkeyup="validateName()">
                <span id="Name_Error"></span>
            </div>
            <div class="inputfeild mt-3 ">
                <label class="form-label mb-2">UserEmail:</label>
                <input type="email" class="form-control" name="txtUSerEmail" id="txtUSerEmail" placeholder="Enter Your UserEmail" onkeyup="validateUserEmail()" >
                <span id="UserEmail_Error"></span>
            </div>
            <div class="inputfeild mt-3 ">
                <label class="form-label mb-2">NIC:</label>
                <input type="text" class="form-control" name="txtNIC" id="txtNIC" placeholder="Enter Your NIC" onkeyup="validateNIC()" >
                <span id="NIC_Error"></span>
            </div>
            <div class="inputfeild mt-3 ">
                <label  class="form-label mb-2">Telephone No:</label>
                <input type="text" class="form-control" name="txtTelephoneNo" id="txtTelephoneNo"  placeholder="Enter Your Telephone No" onkeyup="validateTelephoneNo()">
                <span id="TelephoneNo_Error"></span>
            </div>
            <div class="inputfeild mt-3" >
           <label for="UserRole" class="form-label mb-2">I am ..</label>
             <select name="User_Role"  id="User_Role"  class="role form-control" style="height: 50px;" onkeyup="validate_User_Role()" >
               <option selected value="S">Choose..</option>
               <option value="User">User</option>
               <option value="Fuel_Station">Fuel Station</option>
               <option value="Admin">Admin</option>
             </select>
             <span id="UserRole_Error"></span>
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
        <button type="submit" class="btn btn-outline-primary btn-lg " id="btnSubmit" name="btnSubmit" >Submit Details</button>
    </form>
        </div>
    </div>
    <?php require('M_Footer.php');?>
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
    var Name_Error=document.getElementById('Name_Error');  
    var UserEmail_Error=document.getElementById('UserEmail_Error');
    var NIC_Error=document.getElementById('NIC_Error');
    var TelephoneNo_Error=document.getElementById('TelephoneNo_Error');  
    var UserRole_Error = document.getElementById('UserRole_Error');
    var Password_Error=document.getElementById('Password_Error');
    var Confirm_Password_Error=document.getElementById('Confirm_Password_Error');


function validateName()
{
  
  var Name=document.getElementById('txtName').value.replace(/^\s+|\s+$/g, "");
  if(Name.length == 0)
  {
    Name_Error.innerHTML='Name is required.';
    return false;
  }
  Name_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}

function validateUserEmail()
{
  var Email = document.getElementById('txtUSerEmail').value.replace(/^\s+|\s+$/g, "");

  if (Email.length == 0) 
  {
    UserEmail_Error.innerHTML='User Email is required.';
    return false;
  }
  else
  {
    var emaiPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
   if (!Email.match(emaiPattern))
   {
    UserEmail_Error.innerHTML='Please Enter UserEmail in correct format.';
    return false;
   }
   UserEmail_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
  }  
}

function validateNIC()
{
var NIC=document.getElementById('txtNIC').value.replace(/^\s+|\s+$/g, "");

 if(NIC.length == 0)
  {
    NIC_Error.innerHTML='NIC is required.';
    return false;
  }
  else
  {
    var nicPattern = /^[0-9]{9}[vVxX]|[0-9]{12}$/;
   if (!NIC.match(nicPattern))
   {
    NIC_Error.innerHTML='Please Enter NIC in correct format.';
    return false;
   }
   NIC_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
  }  
}

function validateTelephoneNo()
{
 var TelephoneNo=document.getElementById('txtTelephoneNo').value.replace(/^\s+|\s+$/g, "");

 if(TelephoneNo.length == 0)
  {
    TelephoneNo_Error.innerHTML='Telephone No is required.';
    return false;
  }
  else
  {
    var contactPattern = /^\d{10}$/;
   if (!TelephoneNo.match(contactPattern))
   {
    TelephoneNo_Error.innerHTML='Please Enter contact in correct format.';
    return false;
   }
   TelephoneNo_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
  }  
}


function validate_User_Role()
{
if(document.getElementById("User_Role").value == "S")
{
    UserRole_Error.innerHTML='User Role is required.';
    return false;
}
   UserRole_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;
}
  
document.getElementById("User_Role").addEventListener("click", function() {

  if (document.getElementById("User_Role").value != "S") {

    UserRole_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}
});

 

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
  validateName();
  validateUserEmail();
  validateNIC();
  validateTelephoneNo();
  validate_User_Role();
  validatePassword();
  validateConfirm_Password();

if((!validateName()) || (!validateUserEmail()) || (!validateNIC()) || (!validateTelephoneNo()) || (!validate_User_Role()) || (!validatePassword()) || (!validateConfirm_Password()))
{
   return false;
}
}
</script>
</body>
</html>
