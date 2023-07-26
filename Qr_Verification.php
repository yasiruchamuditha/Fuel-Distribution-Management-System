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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="30;url=Qr_Verification.php">
    <title>Fuel Up - QR Verification</title>
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
    <!-- css Stylesheet -->
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
<?php require('Fuel_Station_navigationBar.php');?>

<div class="container-fluid py-5">
  <h1 class="display-4 text-uppercase text-center mb-5">QR Verification</h1>
  <div class="container mt-3">
    <form action="#" method="post" >
      <div class="mt-0">
        <div class="row">
           <div class="col-lg-6">
              <label for="Email" class="form-label">Please Enter User Email</label>
              <input type="email" class="form-control px-3 pt-2" name="txtUserEmail" id="txtUserEmail" placeholder="User Email" required style="font-size: 20px;">
          </div>
          <div class="col">
              <label for="TokenType" class="form-label">Token Type</label>
                <select id="TokenType" name="TokenType" class="form-control" required style="font-size: 20px;">
                  <option selected value="Choose">Choose...</option>
                  <option value="Vehicle">Vehicle</option>
                  <option value="Instrument">Instrument</option>
                </select>
         </div> 
          <div class="col" style="margin-top: 30px;">
            <button type="submit" class="btn btn-outline-primary " name="btnCheck" id="btnSubmit" style="font-size: 20px;">Check</button>
         </div>
      </div>
  </div>
  </form> 
 </div>
 <label for="Output Message" class="form-label"><span id="MessageOutput"></span></label> 
</div>

<hr style="color: black;">

<div>
<p class="header">Fuel Pass Account</p>
<table class="table">
<thead> 
    <tr  class="table-info">
      <th scope="col">Registration_No</th>
      <th scope="col">preferd_Date</th>
      <th scope="col">preferd_Time</th>
      <th scope="col">FuelType</th>
      <th scope="col">Validity</th>
      <th scope="col">Function</th>
    </tr>
 </thead>
  <tbody>
<?php 

 if(isset($_POST["btnCheck"]))
{
  $Email=$_POST["txtUserEmail"];
  $TokenType=$_POST["TokenType"];
   if(!empty($Email))
   {
     if (filter_var($Email, FILTER_VALIDATE_EMAIL))
     {
       if ($TokenType == "Vehicle")
       {
         //perform sql
          $sql = "SELECT * FROM token_vehicle WHERE  Email='$Email' ";
           $result= mysqli_query($con, $sql);
            if ($result)
            {
              while($row=mysqli_fetch_assoc($result))
              {
                 if($row['Validity'] == 'Valid')
                 {
                     $Registration_No=$row['Registration_No'];
                     $preferd_Date=$row['preferd_Date'];
                     $preferd_Time=$row['preferd_Time'];
                     $FuelType=$row['FuelType'];
                     $Validity=$row['Validity'];

                     echo'<tr>
                     <th scope="row">'.$Registration_No.'</th>
                     <td>'.$preferd_Date.'</td>
                     <td>'.$preferd_Time.'</td>
                     <td>'.$FuelType.'</td>
                     <td>'.$Validity.'</td>
                     <td><button class="btn btn-danger" name="btnApprove" style="padding:10px 20px 10px 20px "><a href="Qr_Verification.php?updateVehicleid='.$Registration_No.'" class="text-light">Approve</a></button></td>
                     </tr>';

                  }
                  else
                  {
                  echo '<script>alert("QR is Expired...")</script>';  
                     //echo "<h3 style=\" font-size: 30px;color:red; text-align: center; \">QR is Expired...</h3>";
                   echo"<script type = 'text/javascript'>   
                    var MessageOut=document.getElementById('MessageOutput');
                    document.getElementById('MessageOut').innerHTML = 'QR is Expired...';</script>";
                     
                  }
              }

            }
            else
            {
              echo '<script>alert("No QR Registered Under this Email.")</script>';  
             //echo "<h3 style=\" font-size: 30px;color:red; text-align: center; \">No QR Registered Under this Email.</h3>";
            }
          }
          else
          {
            //perform sql
          $sql = "SELECT * FROM token_instrument WHERE  Email='$Email' ";
          $result= mysqli_query($con, $sql);
          if ($result)
            {
              while($row=mysqli_fetch_assoc($result))
              {
                 if($row['Validity'] == 'Valid')
                 {
                  $Registration_No=$row['Registration_No'];
                  $preferd_Date=$row['preferd_Date'];
                  $preferd_Time=$row['preferd_Time'];
                  $FuelType=$row['FuelType'];
                  $Validity=$row['Validity'];
                  echo'<tr>
                  <th scope="row">'.$Registration_No.'</th>
                  <td>'.$preferd_Date.'</td>
                  <td>'.$preferd_Time.'</td>
                  <td>'.$FuelType.'</td>
                  <td>'.$Validity.'</td>
                  <td><button class="btn btn-danger" name="btnApprove"><a href="Qr_Verification.php?updateInstrumentid='.$Registration_No.'" class="text-light">Approve</a></button></td>
                  </tr>';
                 }
                 else
                 {
                  echo "<h3 style=\" font-size: 30px;color:black; text-align: center; \">QR is Expired...</h3>";
                 }
              }
            }
            else
            {
            echo "<h3 style=\" font-size: 30px;color:red; text-align: center; \">No QR Registered Under this Email.</h3>";
            } 
          }
        }
        else
        {
         echo '<script>alert("Please Enter Valid UserEmail")</script>';  
        }
      }
      else
      {
       echo '<script>alert("UserEmail Filed cannot be blank")</script>';
      }
}

?>
</tbody>
</table>
</div>



<?php 

if(isset($_GET['updateVehicleid']))
{
   $updateVehicleid=$_GET['updateVehicleid'];

    $sql1 = "SELECT * FROM token_vehicle WHERE  Registration_No='$updateVehicleid' ";
    $result= mysqli_query($con, $sql1);
    $row=mysqli_fetch_assoc($result);
    $Registration_No=$row['Registration_No'];
    $Fuel_Station=$row['Fuel_Station'];
    $preferd_Date=$row['preferd_Date'];
    $preferd_Time=$row['preferd_Time'];
    $Email=$row['Email'];
    $Mobile_No=$row['Mobile_No'];
    $FuelType=$row['FuelType'];
    $Validity=$row['Validity'];
    
    $date = date('d-m-y h:i:s');
    $sql2 = "INSERT INTO token_approved_vehicle (Registration_No,preferd_Date,preferd_Time,Email,FuelType,Approved_dateTime,Fuel_station) VALUES ('$Registration_No','$preferd_Date','$preferd_Time','$Email','$FuelType','$date','$Fuel_Station')";
    $ret1= mysqli_query($con, $sql2);


    $sql3="Delete from token_vehicle where Registration_No='$updateVehicleid' ";
    $ret2= mysqli_query($con, $sql3);
  
     if ($ret2>0) 
      {
        echo '<script>alert("Successfuly Approved")</script>';

         $mail = new PHPMailer(true);
        //email start
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
        $mail->Subject = 'QR Approved';
        $mail->Body    = '<div style="width: 700px ; background-color:lightskyblue; font-weight: bold;text-align: center;font-family: Arial;font-size: 30pt;">QR Usage</div>
          <div style="width: 700px; height:1500px; background-color:white;font-family: Arial;">
          <p>Hi,<br>Dear user,<br>Your Tokenon Vehicle  '.$updateVehicleid.' is used.</p><p>You Can Reserve new  Fuel Tokens From us & You can check latest Fuel Prices in Sri Lanka</p>
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

        //email end
      }
      else
      {
        echo '<script>alert("Please Try Again Shortly....")</script>';
      }
}
else
{
   if(isset($_GET['updateInstrumentid']))
   {
    $updateInstrumentid=$_GET['updateInstrumentid'];

    $sql1 = "SELECT * FROM token_instrument WHERE  Registration_No='$updateInstrumentid' ";
    $result= mysqli_query($con, $sql1);
    $row=mysqli_fetch_assoc($result);
    $Registration_No=$row['Registration_No'];
    $Fuel_Station=$row['Fuel_Station'];
    $preferd_Date=$row['preferd_Date'];
    $preferd_Time=$row['preferd_Time'];
    $Email=$row['Email'];
    $Mobile_No=$row['Mobile_No'];
    $FuelType=$row['FuelType'];
    $Validity=$row['Validity'];
    
    
    $date1 = date('d-m-y h:i:s');
    $sql2 = "INSERT INTO token_approved_instrument (Registration_No,preferd_Date,preferd_Time,Email,Mobile_No,FuelType,Approved_dateTime,Fuel_station) VALUES ('$Registration_No','$preferd_Date','$preferd_Time','$Email','$Mobile_No','$FuelType','$date1','$Fuel_Station')";
    $ret1= mysqli_query($con, $sql2);


    $sql3="Delete from token_instrument where Registration_No='$updateInstrumentid' ";
    $ret2= mysqli_query($con, $sql3);

     if ($ret2>0) 
      {
        echo '<script>alert("Successfuly Approved")</script>';
         $mail = new PHPMailer(true);
//email start
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
        //$mail->addReplyTo('info@example.com','Information');
       // $mail->addCC('cc@example.com');
       // $mail->addBCC('bcc@example.com');
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
       // $mail->addAttachment('/tmp/image.jpg','new.jpg'); 
          //Optional name
        //Content
        $mail->isHTML(true);       
        
        //$verification_code=substr(number_format(time()*rand(),0,'',''), 0,6);                          
        //Set email format to HTML
        $mail->Subject = 'QR Approved';
        $mail->Body    = '<div style="width: 700px ; background-color:lightskyblue; font-weight: bold;text-align: center;font-family: Arial;font-size: 30pt;">QR Usage</div>
          <div style="width: 700px; height:1500px; background-color:white;font-family: Arial;">
          <p>Hi,<br>Dear user,<br>Your Tokenon Instrument  '.$updateInstrumentid.' is used.</p><p>You Can Reserve new  Fuel Tokens From us & You can check latest Fuel Prices in Sri Lanka</p>
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
//email end

      }
      else
      {
        echo '<script>alert("Please Try Again Shortly....")</script>';
      }
   } 
}

?>
 
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

    <!-- external Javascript -->
    <script src="js/main.js"></script>

    <script src="js/qr-code-styling.js"></script>
    <script src="js/scriptnew.js"></script>

</body>
</html>