<?php require_once('connection.php');
/**
 * @author Yasiru
 * contact me : https://linktr.ee/yasiruchamuditha for more information.
 */
if(isset($_POST["btnSubmit"]))
{
    $Name=$_POST["txtName"];
    $Email=$_POST["txtEmail"];
    $Contact_No=$_POST["txtContactNo"];
    $User_Role=$_POST["User_Role"];
    $Password=$_POST["txtPassword"];
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
    //$hashed_password=sha1($Password)
    //perform sql
    $sql = "INSERT INTO user_registration (Name,Contact_No,Email,Password,User_Role,Verification)VALUES('$Name',$Contact_No,'$Email','$Password','$User_Role','$Verification')";

    $ret= mysqli_query($con, $sql);
    // echo '<script>alert("Successfuly Registered")</script>';
    echo '<script>alert("Successfuly Registered")</script>';
    header('location:A_User_Management.php');

    //disconnect 
    mysqli_close($con);
   
    }
  }

?> 

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <title>Admin-Vehicle Registration</title>
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
    <link href="css/styles.css" rel="stylesheet">  
    <link href="css/style_Panel1.css" rel="stylesheet">  
     
     <script src="https://kit.fontawesome.com/4874d070ea.js" crossorigin="anonymous"></script>
</head>
<body style="background: url(img/adminpanel.jpg);">

<?php require('A_Navigation_Bar.php');?>

  <!-- Form start -->
<div class="container-fluid">
<div class="container mt-3" >
<h1>Admin Panel-User Registration</h1>
<form class="row g-3 needs-validation" action="#" method="post" autocomplete="off"onsubmit="return result()">
<!--Name-->
  <div class="inputfeild mt-2">
  	<label for="Name" class="form-label">Name</label>
  	<input type="text" class="form-control" name="txtName" id="txtName" placeholder="Ex:Name" onkeyup="validateName()" >
     <span id="Name_Error"></span>
  </div>
<!--Email-->
<div class="inputfeild mt-2" >
 <label for="Email" class="form-label">Email</label>
 <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Ex:Someone@company.com" onkeyup="validateEmail()" >
 <span id="Email_Error"></span>
</div>

<!--Mobile No-->
  <div class="inputfeild mt-3">
    <label for="MobileNo" class="form-label">Mobile No</label>
    <input type="tel" class="form-control" id="txtMobileNo" name="txtContactNo" placeholder="Ex:0123456789" onkeyup="validateMobileNo()">
    <span id="Mobile_Error"></span>
  </div>

   <div class="inputfeild role-field" >
      <label for="UserRole" class="form-label">I am ..</label>
          <select id="UserRole" name="User_Role"  class="role form-control" style="height: 50px;" onkeyup="checkUserrole()">
               <option  value="S">Choose..</option>
               <option value="User">User</option>
               <option value="Fuel_Station">Fuel Station</option>
               <option value="Admin">Admin</option>
             </select>
          <span id="role_error" ></span>
        </div>

  <div class="inputfeild mt-2">
      <label for="Password" class="form-label">Password</label> 
      <input type="password" placeholder="Create password" id="txtPassword" name="txtPassword"  class="form-control" onkeyup="validatePassword()"  />
      <span id="Password_Error"></span>
  </div>

<!--Check Terms -->
  <div class="inputfeild mt-2 form-check">
    <input type="checkbox" class="form-check-input" id="chStatus" name="chkCheck" onkeyup="validateTerms()" >
    <label class="form-check-label" for="exampleCheck1">Agree to Terms and Conditions</label><br>
    <span id="Check_Error"></span>
  </div>

 <!--Button-->
  <button type="submit" class="btn btn-outline-dark btn-lg" id="btnSubmit" name="btnSubmit">Submit</button>

</form>
</div>
</div>
<?php require('A_Footer.php');?>
 
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
    
var Name_Error=document.getElementById('Name_Error');
var Email_Error=document.getElementById('Email_Error');
var Mobile_Error=document.getElementById('Mobile_Error');
var role_error=document.getElementById('role_error');
var Password_Error=document.getElementById('Password_Error');
var Check_Error=document.getElementById('Check_Error');

function validateName() 
{
  var Name = document.getElementById('txtName').value.replace(/^\s+|\s+$/g, "");
  if (Name.length == 0) 
  {
      Name_Error.innerHTML='Name is required.';
    return false;
  }
   Name_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
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
  role_error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}
});

function validatePassword()
{
  var Password = document.getElementById('txtPassword').value.replace(/^\s+|\s+$/g, "");
  if (Password.length == 0) 
  {
      Password_Error.innerHTML='Password is required.';
    return false;
  }
   Password_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;

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
  validateName();
  validateEmail();
  validateMobileNo();
  checkUserrole();
  validatePassword();
  validateTerms();

if((!validateName())||(!validateEmail()) || (!validateMobileNo()) || (!checkUserrole())  || (!validatePassword())  || (!validateTerms()) )
  {
    return false;
  }
}
    </script>
</body>

</html>

