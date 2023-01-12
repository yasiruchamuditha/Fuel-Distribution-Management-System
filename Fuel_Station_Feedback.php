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
    //create a new PHPMailer object:
    $mail = new PHPMailer(true);
    //

    $Name=$_POST["txtName"];
    $Email=$_POST["txtEmail"]; 
    $Subject=$_POST["txtSubject"];
    $Message=$_POST["txtMessage"]; 
    if(!empty($Email))
    {

     //perform sql
     $sql = "INSERT INTO feedback(Name,Email,Subject,Message) VALUES ('$Name','$Email','$Subject','$Message')";

     $ret= mysqli_query($con, $sql);
     
      //emai
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
        ///$verification_code=substr(number_format(time()*rand(),0,'',''), 0,6) ;                          //Set email format to HTML
        $mail->Subject = 'Users Feedback';
        $mail->Body    = '<div style="width: 700px ; background-color:lightskyblue; font-weight: bold;text-align: center;font-family: Arial;font-size: 30pt;">Users Feedback</div><p>Hi,<br>Dear User,<br>We received Your valueble Feedback on '.$Email.'</p><p>We appreciate your feedback.</p>
           <p>please <a href="mailto:fuelupgroup@gmail.com"><b><u>contact</u></b></a> us for more Details. </p>
            <p>Thank You.<br>Sincerely yours,<br>The FuelUp Team</p>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();

         } 
    catch (Exception $e)
     {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     }
  //
    header('location:Fuel_Station.php');
   
    //disconnect 
    mysqli_close($con);    
    }
    else
    {
        echo '<script>alert("UserEmail Filed cannot be blank")</script>';
        header('location:Fuel_Station_Feedback.php');
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Fuel Up - Fuel Station</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Fuel Up" name="keywords">
    <meta content="Fuel Station" name="description">
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
    <!-- Template Stylesheet -->
    <link href="css/styles.css" rel="stylesheet">
</head>

<body style="background-color: whitesmoke;">
   <?php require('Fuel_Station_navigationBar.php');?>

<div class="container-fluid py-5">
<div class="container pt-5 pb-3" style="border: 1px solid black;">
    <h1 class="display-4 text-uppercase text-center mb-5">Contact Us - Feedback</h1>
        <div class="contact-form bg-light mb-4" style="padding: 30px; background-color: brown;">
        <form action="#" method="post" name="frmfeedback">
            <div class="row">
                <div class="col-6 form-group">
                <input type="text" class="form-control p-4" name="txtName" placeholder="Your Name" required >
                </div>
                <div class="col-6 form-group">
                <input type="email" class="form-control p-4" name="txtEmail" placeholder="Your Email" required >
                </div>
            </div>

            <div class="form-group">
                <input type="text" class="form-control p-4" name="txtSubject" placeholder="Subject" required>
            </div>

            <div class="form-group">
                <textarea class="form-control py-3 px-4" rows="5" name="txtMessage" placeholder="Message" required></textarea>
            </div>

            <div>
            <button class="btn btn-primary py-3 px-5" name="btnSubmit" type="submit">Send Feedback</button>
            </div>
        </form>
        </div>           
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
</body>

</html>