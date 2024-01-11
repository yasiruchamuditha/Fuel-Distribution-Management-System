<?php
require_once('connection.php');
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

// Define variables to store messages
$alertMessage = '';
$redirectLocation = '';

if (isset($_POST["btnSubmit"])) 
{
    if (isset($_SESSION["Email"]))
    {
        //var_dump($_POST);
        $mail = new PHPMailer(true);

        $Email=$_POST["txtEmail"];
        $Reg_No=$_POST["txtRegNo"];
        $Engine_No=$_POST["txtEngineNo"];
        $Chassis_No=$_POST["txtChassisNo"]; 
        $Vehicle_Class=$_POST["VehicleClass"];
        $Fuel_Type=$_POST["cmbFuelType"];
      
      //perform sql
       $sql = "INSERT INTO vehicle_registration (Reg_No,Engine_No,Chassis_No,Vehicle_Class,Fuel_Type) VALUES ('$Reg_No','$Engine_No','$Chassis_No','$Vehicle_Class','$Fuel_Type')";
    
       $ret= mysqli_query($con, $sql);
       if ($ret > 0)
       {
            //EMAIL
            //email from admin to user when register vehicle
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
            $mail->Subject = 'Vehicle Registration';
            $mail->Body    = '<div style="width: 700px ; background-color:lightskyblue; font-weight: bold;text-align: center;font-family: Arial;font-size: 30pt;">Vehicle Registration</div>
            <div style="width: 700px; height:1500px; background-color:white;font-family: Arial;">
            <p>Hi,<br>Dear user,<br>Your Vehicle on '.$Reg_No.' is successfully Registered on fuelup.</p><p>You Can Reserve Your Fuel Tokens From us & You can check latest Fuel Prices in Sri Lanka</p>
            <p>please <a href="mailto:fuelupgroup@gmail.com"><b><u>contact</u></b></a> us for more Details. </p>
                <p>Thank You.<br>Sincerely yours,<br>The FuelUp Team</p>
                </div>';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            //echo 'Message has been sent';

            } 
            catch (Exception $e)
            {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            //end
            $alertMessage = "Successfuly Registered";
            $redirectLocation = "U_Service.php";
       }
       else
       {
        $alertMessage = "Please Try Again Shortly";
        $redirectLocation = "S_Vehicle_Registration.php";
       }
      //disconnect 
      mysqli_close($con); 
    }
    else
    {
        $alertMessage = "Please Sign in";
        $redirectLocation = "M_User_Login.php";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fuelup - Vehicle Registration</title>
    <!-- Template Main CSS File -->
    <link href="css/styles.css" rel="stylesheet"> 
    <link href="css/SForm.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>   
</head>
<body style="background-image: url(img/registration.png);">
    <?php require('M_NavigationBarForms.php');?>
    <div class="container-fluid" id="containerm">
        <!-- Form start -->
        <div class="container mt-2" >
        <h1 >Vehicle Registration</h1>
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
<form class="row g-3 needs-validation" action="#" name="frmvehicleregistration" method="post" autocomplete="off" onsubmit="return result()" >
<!--Vehicle Registration No-->
  <div class="inputfeild mt-2 ">
  	<label for="Vehicle Registration No" class="form-label">Vehicle Registration No</label>
  	<input type="text" class="form-control" name="txtRegNo" id="txtRegNo" placeholder="Ex:ABC-1234"  onkeyup="validateRegistrationNo()">
    <span id="Registration_Error"></span>
  </div>
	
<!--Engine No-->
  <div class="inputfeild mt-2">
  	<label for="Engine No" class="form-label" >Engine No</label>
    <input type="text" class="form-control" id="txtEngineNo" name="txtEngineNo" placeholder="Engine No"  onkeyup="validateEngineNo()">
    <span id="Engine_Error"></span>
  </div>

  <!--Chassis No -->
  <div class="inputfeild mt-2">
  	<label for="Chassis No" class="form-label">Chassis No</label>
    <input type="text" class="form-control" name="txtChassisNo" id="txtChassisNo" placeholder="Chassis No"  onkeyup="validateChassisNo()" >
    <span id="Chassis_Error"></span>
  </div>

<!--Vehicle Class-->
  <div class="inputfeild mt-2">
      <label for="Vehicle Class" class="form-label">Vehicle Class</label>
      <select id="VehicleClass" name="VehicleClass" class="form-control" onkeyup="validateVehicleClass()">
          <option  value="S">Choose...</option>
          <option value="A">A  [Motor Cycle Above 100 cc]</option>
          <option value="A1">A1 [Light Motor Cycle Below 100 cc]</option>
          <option value="B">B  [Dual Purpose Motor Vehicle]</option>
          <option value="B1">B1 [Motor TriCycle Or Van]</option>
          <option value="C">C  [Motor Lorry]</option>
          <option value="C1">C1 [Light Motor Lorry]</option>
          <option value="CE">CE [Heavy Motor Lorry]</option>
          <option value="D">D  [Motor Coach]</option>
          <option value="D1">D1 [Light Motor Coach]</option>
          <option value="DE">DE [Heavy Motor Coach]</option>
          <option value="G">G  [Land Vehicle]</option>
          <option value="G1">G1 [Hand Tactor]</option>
          <option value="J">J  [Special Purpose Vehicle]</option>
      </select>

      <div id="ClassHelp" class="inputfeild form-text" >Can't Find Vehicle Class,<a href="https://dmt.gov.lk/index.php?option=com_content&view=article&id=46&Itemid=163&lang=en" target="_blank">Click Here</a><br>
      <span id="VehicleClass_Error"></span>
      </div>
  </div>	

<!--Fuel Type-->
   <div class="inputfeild mt-2 form-group ">
        <label for="FuelType" class="form-label">Fuel Type</label>
        <select id="FuelType" name="cmbFuelType" class="form-control"  onkeyup="validateFUELTYPE()">
             <option  value="S">Choose...</option>
             <option value="Petrol">Petrol</option>
             <option value="Diesal">Diesal</option>
        </select>
        <span id="FuelType_Error"></span>
   </div> 

  <!--EMAIL No -->
  <div class="inputfeild mt-2">
    <label for="Email" class="form-label">UserEmail</label>
    <input type="text" class="form-control" name="txtEmail" id="txtEmail" placeholder="someone@company.com"  onkeyup="validateEmail()" >
    <span id="Email_Error"></span>
  </div>

<!--Check Terms -->
  <div class="inputfeild mt-3 mx-2 form-check">
    <input type="checkbox" class="form-check-input" name="chkCheck" id="chStatus" onkeyup="validateTerms()"  >
    <label class="form-check-label" for="exampleCheck1">Agree to Terms and Conditions</label><br>
    <span id="Check_Error"></span>
  </div>

 <!--Button-->
  <button type="submit" class="btn btn-outline-primary btn-lg" id="btnSubmit" name="btnSubmit" >Submit</button>

</form>
</div>
</div>
<script type="text/javascript">
    
var Registration_Error=document.getElementById('Registration_Error');
var Engine_Error=document.getElementById('Engine_Error');
var Chassis_Error=document.getElementById('Chassis_Error');
var VehicleClass_Error=document.getElementById('VehicleClass_Error');
var FuelType_Error=document.getElementById('FuelType_Error');
var Email_Error=document.getElementById('Email_Error');
var Check_Error=document.getElementById('Check_Error');

function validateRegistrationNo()
{
  
  var Registration_no=document.getElementById('txtRegNo').value.replace(/^\s+|\s+$/g, "");
  if(Registration_no.length == 0)
  {
    Registration_Error.innerHTML='Registration number is required.';
    return false;
  }
  else
  {

   var re  = /^[A-Z]{3}\-[0-9]{4}$/;
   var reOLD  = /^[A-Z]{2}\-[0-9]{4}$/;
     //var re = /^[a-zA-Z0-9_]+$/;
    if((!Registration_no.match(re)) && ((!Registration_no.match(reOLD)) ))
    {
    Registration_Error.innerHTML='Please Enter Registration number in correct format and correct length.';
    return false;
    }
   
  }
  Registration_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}

function validateEngineNo()
{
  
  var Engine_no=document.getElementById('txtEngineNo').value.replace(/^\s+|\s+$/g, "");
  if(Engine_no.length == 0)
  {
    Engine_Error.innerHTML='Engine number is required.';
    return false;
  }
  else
  {
    var re = /^[a-zA-Z0-9]{1,10}$/;   
    if (!Engine_no.match(re))
    {
        Engine_Error.innerHTML='Please Enter Engine number in correct format and correct length.';
        return false;
    }
    else
    {
      if(Engine_no.length !== 10)
      {
         Engine_Error.innerHTML='Engine Number must be 10 digits.';
        return false;
      }
    }
  }
  Engine_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}

function validateChassisNo()
{
var ChassisNo = document.getElementById('txtChassisNo').value.replace(/^\s+|\s+$/g, "");
if (ChassisNo.length == 0) 
{ 
    Chassis_Error.innerHTML='Chassis Number is required.';
    return false;
}
else
  {
    var re = /^[a-zA-Z0-9]{1,10}$/;   
    if (!ChassisNo.match(re))
    {
        Chassis_Error.innerHTML='Please Enter ChassisNo no in correct format and correct length.';
        return false;
    }
    else
    {
      if (ChassisNo.length !== 10) 
      {
        Chassis_Error.innerHTML='Chassis Number must be 10 digits';
        return false;
      }
    }
  }
  Chassis_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}

function validateVehicleClass()
{
if(document.getElementById("VehicleClass").value == "S")
{
  VehicleClass_Error.innerHTML='Vehicle Class  is required.';
  return false;
}
 VehicleClass_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
return true;
}
  
document.getElementById("VehicleClass").addEventListener("click", function() {

  if (document.getElementById("VehicleClass").value != "S") {

  VehicleClass_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}
});

function validateFUELTYPE()
{
  if(document.getElementById("FuelType").value == "S")
  {
  FuelType_Error.innerHTML='Fuel Type  is required.';
  return false;
  }
   FuelType_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;

}

document.getElementById("FuelType").addEventListener("click", function() {

  if (document.getElementById("FuelType").value != "S") {

  FuelType_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}
});

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

function validateTerms()
{
  if(document.getElementById("chStatus").checked == false)
  {
  Check_Error.innerHTML='Please Agree To Terms and Conditions.';
  return false;
  }
   Check_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;

}

document.getElementById("chStatus").addEventListener("click", function() {

  if(document.getElementById('chStatus').checked == true){ 

  Check_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}
});

function result()
{
  validateRegistrationNo();
  validateEngineNo();
  validateChassisNo();
  validateVehicleClass();
  validateFUELTYPE();
  validateEmail();
  validateTerms();

if((!validateRegistrationNo())|| (!validateEngineNo()) || (!validateChassisNo()) || (!validateVehicleClass()) || (!validateFUELTYPE()) || (!validateEmail()) || (!validateTerms()) )
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

