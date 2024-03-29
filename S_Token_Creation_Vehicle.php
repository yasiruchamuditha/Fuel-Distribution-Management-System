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

        $Registration_No=$_POST["txtRegistrationNo"];
        $Fuel_Station=$_POST["txtFuelStationCode"]; 
        $preferd_Date=$_POST["txtpreferdDate"]; 
        $preferd_Time=$_POST["txtpreferdTime"];
        $Email=$_POST["txtEmail"]; 
        $Mobile_No=$_POST["txtMobileNo"];
        $FuelType=$_POST["FuelType"];
        $Validity="Valid";

      //perform sql
        $sql = "INSERT INTO token_vehicle (Registration_No,Fuel_Station,preferd_Date,preferd_Time,Email,Mobile_No,FuelType,Validity) VALUES ('$Registration_No','$Fuel_Station','$preferd_Date','$preferd_Time','$Email','$Mobile_No','$FuelType','$Validity')";

        $ret= mysqli_query($con, $sql);
       if ($ret > 0)
       {
            //EMAIL
            //email from admin to user when register vehicle
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
            //$verification_code=substr(number_format(time()*rand(),0,'',''), 0,6) ;                          
            //Set email format to HTML
            $mail->Subject = 'Fuel Token Creation';
            $mail->Body    = '<div style="width: 700px ; background-color:lightskyblue; font-weight: bold;text-align: center;font-family: Arial;font-size: 30pt;">Vehicle Fuel Token Creation</div><p>Hi,<br>Dear User,<br><p>We received a request to create Fuel Token On Vehicle <b>'.$Registration_No.'</b> on '.$preferd_Date.' at '.$preferd_Time.' For '.$FuelType.' . Please Visit Fuel Station in Token Reserved Date and Time.</p>
                <p>Please <a href="mailto:fuelupgroup@gmail.com"><b><u>contact us on this mail</u></b></a> or Our <a href="tel:076 471 6214"><b>Hotline</b></a>,If Your did not make a Fuel Token Request from us. </p><p>Thanks for helping us keep your account update.<br>Sincerely yours,<br>The FuelUp Team</p><br>';
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
        $redirectLocation = "S_Token_Creation_Vehicle.php";
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
    <title>Fuelup - Token Creation - Vehicle</title>
    <!-- Template Main CSS File -->
    <link href="css/styles.css" rel="stylesheet"> 
    <link href="css/SForm.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>   
</head>
<body style="background-image: url(img/Token1.png);">
    <?php require('M_NavigationBarForms.php');?>
    <div class="container-fluid" id="containerm">
        <!-- Form start -->
        <div class="container mt-2" >
        <h1 >Vehicle Token Creation</h1>
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
<!--vehicle Registration No-->
  <div class="inputfeild mt-3">
      <label for="Vehicle Registration No" class="form-label">Vehicle Registration No</label>
      <input type="text" class="form-control" id="txtRegistrationNo" name="txtRegistrationNo" placeholder="Vehicle Registration No" onkeyup="validateRegistrationNo()" >
      <span id="Registration_Error"></span>
  </div>

<!-- Fuel Station code-->
  <div class="inputfeild mt-3">
      <label for="Fuelstation" class="form-label">Fuel Station Code</label>
      <input type="text" class="form-control" id="txtFuelStationCode" name="txtFuelStationCode" placeholder="Fuel Station code" >
      <span id="Fuel_Station_Code_Error"></span>
  </div>
<!-- date and time-->
<div class="inputfeild mt-3">
    <div class="row">
       <!--Prefered Date-->
      <div class="col-md-6">
         <label for="Prefered Date" class="form-label">Prefered Date</label>
         <input type="date" class="form-control" id="txtpreferdDate" name="txtpreferdDate" onkeyup="validateDate()" >
         <span id="Date_Error"></span>
      </div>
      <!--Prefered Time-->
      <div class="col-md-6">
          <label for="Prefered Time" class="form-label">Prefered Time</label>
          <input type="time" class="form-control" id="txtpreferdTime" name="txtpreferdTime" onkeyup="validateDate()" >
          <span id="Time_Error"></span>
      </div>
    </div>  
  </div>

  <!--Email-->
 <div class="inputfeild mt-3">
    <label for="Email" class="form-label">Email</label>
    <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Ex:Someone@company.com"  onkeyup="validateEmail()" >
    <span id="Email_Error"></span>
  </div>

  <!--Mobile No-->
  <div class="inputfeild mt-3">
    <label for="MobileNo" class="form-label">Mobile No</label>
    <input type="tel" class="form-control" id="txtMobileNo" name="txtMobileNo" placeholder="Ex:0123456789" onkeyup="validateMobileNo()">
    <span id="Mobile_Error"></span>
  </div>

<!--Fuel Type-->
   <div class="inputfeild form-group mt-3">
          <label for="FuelType" class="form-label">Fuel Type</label>
          <select id="FuelType" name="FuelType" class="form-control">
             <option selected value="S">Choose...</option>
             <option value="Petrol">Petrol 92</option>
             <option value="Petrol">Petrol 95</option>
             <option value="Diesal">Diesal</option>
             <option value="Diesal">Super Diesal</option>
             <option value="Diesal">Kerosine Oil</option>
          </select>
          <span id="FuelType_Error"></span>
   </div> 

<!--Check Terms -->
  <div class="inputfeild mt-3 mx-2 form-check">
    <input type="checkbox" class="form-check-input" name="chkCheck" id="chStatus" onkeyup="validateTerms()" >
    <label class="form-check-label" for="exampleCheck1">Agree to Terms and Conditions</label><br>
    <span id="Check_Error"></span>
  </div>

 <!--Button-->
  <button type="submit" id="btnSubmit" class="btn btn-outline-primary btn-lg" name="btnSubmit">Submit</button>

</form>
</div>
</div>
<script type="text/javascript">
       // localStorage.setItem('code','$verification_code')
        
        var Registration_Error=document.getElementById('Registration_Error');
        var Fuel_Station_Code_Error=document.getElementById('Fuel_Station_Code_Error');
        var Date_Error=document.getElementById('Date_Error');
        var Time_Error=document.getElementById('Time_Error');
        var Mobile_Error=document.getElementById('Mobile_Error');
        var FuelType_Error=document.getElementById('FuelType_Error');
        var Email_Error=document.getElementById('Email_Error');
        var Check_Error=document.getElementById('Check_Error');


function validateRegistrationNo()
{
  var Registration_no=document.getElementById('txtRegistrationNo').value.replace(/^\s+|\s+$/g, "");
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

function validateDate()
{
  var date = document.getElementById('txtpreferdDate').value.replace(/^\s+|\s+$/g, "");
  if (date.length == 0) 
  {
     Date_Error.innerHTML='Date is required.';
    return false;
  }
  Date_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
  }  

document.getElementById("txtpreferdDate").addEventListener("click", function() {

  if (document.getElementById("txtpreferdDate").value != "0") {

  Date_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}
});

function validateTime()
{
  var date = document.getElementById('txtpreferdTime').value.replace(/^\s+|\s+$/g, "");
  if (date.length == 0) 
  {
     Time_Error.innerHTML='Time is required.';
    return false;
  }
  Time_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
  }  

document.getElementById("txtpreferdTime").addEventListener("click", function() {

  if (document.getElementById("txtpreferdTime").value != "0") {

  Time_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}
});

function validateMobileNo()
{
  var mobileNo = document.getElementById('txtMobileNo').value.replace(/^\s+|\s+$/g, "");
  if (mobileNo.length == 0) 
  {
     Mobile_Error.innerHTML='Mobile Number is required.';
    return false;
  }
  else
  {
    var mobilePattern = /^[0-9]{10}$/;
   if (!mobileNo.match(mobilePattern))
   {
    Mobile_Error.innerHTML='Please Enter Mobile Number in correct format.';
    return false;
   }
  Mobile_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
  }  
}

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
  validateDate();
  validateTime();
  validateMobileNo();
  validateFUELTYPE();
  validateEmail();
  validateTerms();
 

if((!validateRegistrationNo()) || (!validateEmail()) || (!validateDate()) || (!validateTime()) || (!validateMobileNo()) || (!validateFUELTYPE()) || (!validateTerms()) )
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

