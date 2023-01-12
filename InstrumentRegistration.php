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
    $mail = new PHPMailer(true);

     if (isset($_SESSION["Email"]))
     {
     $Email=$_POST["txtEmail"];
     $Registration_No=$_POST["txtRegistrationNo"];
     $Instrument_Type=$_POST["txtInstrumentType"]; 
     $Fuel_Capacity=$_POST["txtFuelCapacity"];
     $Fuel_Type=$_POST["FuelType"]; 

     //perform sql
     $sql = "INSERT INTO instrument_registration (Registration_No,Instrument_Type,Fuel_Capacity,Fuel_Type) VALUES ('$Registration_No','$Instrument_Type','$Fuel_Capacity','$Fuel_Type')";

     $ret= mysqli_query($con, $sql);
      if ($ret > 0)
      {
    //EMAIL
     //
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
        $mail->Subject = 'Instrument Registration';
        $mail->Body    = '<div style="width: 700px ; background-color:lightskyblue; font-weight: bold;text-align: center;font-family: Arial;font-size: 30pt;">Instrument Registration</div>
          <div style="width: 700px; height:1500px; background-color:white;font-family: Arial;">
          <p>Hi,<br>Dear user,<br>Your Instrument on '.$Registration_No.' is successfully Registered on fuelup.</p><p>You Can Reserve Your Fuel Tokens From us & You can check latest Fuel Prices in Sri Lanka</p>
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


    //END
   
    echo '<script>alert("Successfuly Registered")</script>';
    header('location:service.php');
     }
     else
     {
        header("location:User_login.php");
     } 
}
}
?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Non Vehicle Registration</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Fuel Up" name="keywords">
    <meta content="Fuel Status" name="description">

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
    <!-- css Stylesheet -->
    <link href="css/style.css" rel="stylesheet">  
   <link href="css/styleRegistrations.css" rel="stylesheet"> 
  <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>      
</head>
<body  style="background-image: url(img/registration.png);">
 <?php require('navigationBarForms.php');?>
 
<div class="container-fluid">
<div class="container mt-3">
<h1 >Non Vehicle Registration</h1>
<form class="row g-3 needs-validation" action="#" method="post" onsubmit="return result()">
<!--Instrument Registration No-->
  <div class="inputfeild mt-3">
      <label for="Instrument Registration No" class="form-label">Instrument Registration No</label>
      <input type="text" class="form-control" id="txtRegNo" name="txtRegistrationNo" placeholder="Instrument Registration No" onkeyup="validateRegistrationNo()">
    <div>
    <label for="RegNoHelp" class="form-text">If you don't have registered with the government please enter the owner NIC number as Instrument Registration Number.</label>
        <span id="Registration_Error"></span>
  </div>
  </div>
<!--Instrument Type-->
  <div class="inputfeild mt-2">
  	<label for="Instrument Type" class="form-label">Instrument Type</label>
    <input type="text" class="form-control" name="txtInstrumentType" id="txtInstrumentType" placeholder="Instrument Type" onkeyup="validateInstrumentType()" >
    <span id="InstrumentType_Error"></span>
  </div>

  <!--Fuel Capacity-->
  <div class="inputfeild mt-2">
  	<label for="Fuel_Capacity" class="form-label">Fuel Capacity</label>
    <input type="text" class="form-control" id="txtFuelCapacity" name="txtFuelCapacity" placeholder="Fuel Capacity" onkeyup="validateFuelCapacity()">
    <span id="FuelCapacity_Error"></span>
  </div>
<!--Fuel Type-->
   <div class="inputfeild mt-2 form-group">
          <label for="FuelTypes" class="form-label">Fuel Type</label>
          <select id="FuelType" name="FuelType" class="form-control" onkeyup="validateFUELTYPE()">
             <option  value="S">Choose...</option>
             <option value="Petrol">Petrol</option>
             <option value="Diesal">Diesal</option>
             <option value="Kerosine Oil">Kerosine Oil</option>
             <option value="Industrial Kerosine Oil">Industrial Kerosine Oil</option>
             <option value="Fuel Oil">Fuel Oil </option>
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
    <input type="checkbox" class="form-check-input" name="chkCheck" id="chStatus" onkeyup="validateTerms()" >
    <label class="form-check-label" for="exampleCheck1">Agree to Terms and Conditions</label><br>
    <span id="Check_Error"></span>
  </div>

 <!--Button-->
  <button type="submit" id="btnSubmit" class="btn btn-outline-primary btn-lg" name="btnSubmit" >Submit</button>

</form>
</div>
</div>

 <?php require('footer.php');?>

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
    <script type="text/javascript">

        
var Registration_Error=document.getElementById('Registration_Error');
var InstrumentType_Error=document.getElementById('InstrumentType_Error');
var FuelCapacity_Error=document.getElementById('FuelCapacity_Error');
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

   var reOLD = /^[0-9]{9}[V]{1}$/;
   var re  = /^[0-9]{13}$/;
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

function validateInstrumentType()
{
  
var Instrument_Type=document.getElementById('txtInstrumentType').value.replace(/^\s+|\s+$/g, "");
if(Instrument_Type.length == 0)
  {
    InstrumentType_Error.innerHTML='Instrument Type is required.';
    return false;
  }
  InstrumentType_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}


function validateFuelCapacity()
{
  
var Fuel_Capacity=document.getElementById('txtFuelCapacity').value.replace(/^\s+|\s+$/g, "");
if(Fuel_Capacity.length == 0)
  {
    FuelCapacity_Error.innerHTML='Fuel Capacity is required.';
    return false;
  }
  else
  {
   //var re = /^[0-9]{9}$/;
    var re = /^[0-9]+$/;
    if(!Fuel_Capacity.match(re)) 
    {
    FuelCapacity_Error.innerHTML='Please Enter NUMBER.';
    return false;
    }
   
  }
  FuelCapacity_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
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
  validateInstrumentType();
  validateFUELTYPE();
  validateFuelCapacity();
  validateEmail();
  validateTerms();

if((!validateRegistrationNo()) || (!validateInstrumentType()) ||(!validateFUELTYPE()) ||(!validateFuelCapacity()) || (!validateEmail()) || (!validateTerms()) )
  {
    return false;
  }
}

</script>
</body>

</html>
