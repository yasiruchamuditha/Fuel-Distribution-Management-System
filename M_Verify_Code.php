<?php require_once('connection.php');
/**
 * @author Yasiru
 * contact me : https://linktr.ee/yasiruchamuditha for more information.
 */
// Define variables to store messages
$alertMessage = '';
$redirectLocation = '';

if(isset($_POST["btnSubmit"]))
{
  $code=$_POST["txtcode"];

        //perform sql
        $sql = "SELECT * FROM passwordupdates WHERE  VerificationCode='$code' ";
        $ret= mysqli_query($con, $sql);
        $num_row  = mysqli_num_rows($ret);
        if ($num_row >0) 
        {   
          $alertMessage = "Valid Verification Code";
          $redirectLocation = "M_Update_Password.php"; 
        }
        else
        {
          $alertMessage = "Invalid Verification Code";
          $redirectLocation = "M_Verify_Code.php"; 
        }
        //disconnect 
         mysqli_close($con);
}
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <title>Verify code - User Account</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Fuel Up" name="keywords">
    <meta content="Fuel Status" name="description">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="css/M_Forgotten.css" rel="stylesheet">  
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script> 
</head>
<body style="background: url(img/Token1.png);">
 <?php require('M_NavigationBarForms.php');?>

<div class="container-fluid" id="containerm">
<div class="container">
    <h1 id="h1">Forgotten Password</h1>
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
    <div class="inputfeild mt-5">
    <label for="heading" class="form-label">Please Enter Verification Code that send to your Email for verify your user Account</label>
    <label for="heading" class="form-label mt-3">Verification Code</label>
    <input type="text" class="form-control" id="txtcode" name="txtcode" placeholder="Verification Code" onkeyup="validateCode()" >
    <span id="Code_Error"></span>
    </div>

 <!--Button-->
  <button type="submit" id="btnSubmit" class="btn btn-outline-dark btn-lg" name="btnSubmit">Continue</button>

</form>
</div>
</div>

<script type="text/javascript">
function validateCode()
{
  
  var Code=document.getElementById('txtcode').value.replace(/^\s+|\s+$/g, "");
  if(Code.length == 0)
  {
    Code_Error.innerHTML='Verification Code is required.';
    return false;
  }
  Code_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}


function result()
{
  validateCode();

if(!validateCode())  
  {
    return false;
  }
}
</script>
<?php require('M_Footer.php');?>
</body>
</html>