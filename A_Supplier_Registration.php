<?php require_once('connection.php');
/**
 * @author Yasiru
 * contact me : https://linktr.ee/yasiruchamuditha for more information.
 */
session_start();  
if(isset($_POST["btnSubmit"]))
{
    if (isset($_SESSION["Email"]))
    {
    $Registration_No=$_POST["txtRegNo"];
    $Company_Name=$_POST["txtCompanyName"]; 
    $Address=$_POST["txtAddress"];
    $Telephone_No=$_POST["txtTelephoneNo"]; 
    $Fax_No=$_POST["txtFaxNo"];
    $Email=$_POST["txtEmail"];
    $Director_Name=$_POST["txtDirectorName"]; 
    $Mobile_No=$_POST["txtMobileNo"];
   
   //perform sql
    $sql = "INSERT INTO supplier_registration (Registration_No,Company_Name,Address,Telephone_No,Fax_No,Email,Director_Name,Mobile_No) VALUES ('$Registration_No','$Company_Name','$Address','$Telephone_No','$Fax_No','$Email','$Director_Name','$Mobile_No')";

    $ret= mysqli_query($con, $sql);
     //echo '<script>alert("Successfuly Registered")</script>';
     header('location:A_Supplier_Registration.php');
     
     //disconnect 
     mysqli_close($con);
    }
    else
    {
        header("location:M_User_Login.php");
    }
}
?> 

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <title>Admin Panel - Supplier Registration</title>
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
    <link href="css/style_Panel1.css" rel="stylesheet">  
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
</head>
<body style="background: url(img/supplier.jpg);">
<?php require('A_Navigation_Bar.php');?>

<!--Form START-->
<div class="container-fluid">
<div class="container mt-3" >
<h1>Admin Panel - Supplier Registration</h1>
 <!--form -->
<form class="row g-3 needs-validation" action="#" method="post" onsubmit="return result()">
<!--Reg No-->
<div class="inputfeild mt-2">
  <label for="Registration No" class="form-label">Registration No</label>
  <input type="text" class="form-control" id="txtRegNo" name="txtRegNo" placeholder="Registration No" onkeyup="validateRegistrationNo()">
  <span id="Registration_Error"></span>    
 </div>
<!--Name-->
  <div class="inputfeild mt-2">
    <label for="Name" class="form-label">Name</label>
    <input type="text" class="form-control" id="txtCompanyName" name="txtCompanyName" placeholder="Company Name" onkeyup="CompanyNamevalidate()">
      <span id="Name_Error"></span>
  </div>
<!--Address-->
<div class="inputfeild mt-2">
  <label for="Address" class="form-label">Address</label>
  <label for="Address" class="form-label">No</label>
  <input type="text" class="form-control" id="txtAddress" name="txtAddress" placeholder="Ex:No" onkeyup="validateaddress()" >
  <span id="Address_Error"></span>
</div>

<!--Contact No -->
<div class="inputfeild mt-2">
    <div class="row">
      <div class="col">
         <label for="TelephoneNo" class="form-label">Telephone No</label>
         <input type="tel" class="form-control" id="txtTelephoneNo" name="txtTelephoneNo" placeholder="Ex:0123456789" onkeyup="validateTelephoneNo()">
           <span id="TelephoneNo_Error"></span>
      </div>
      <div class="col">
            <label for="FaxNo" class="form-label">Fax No</label>
             <input type="tel"  class="form-control" id="txtFaxNo" name="txtFaxNo" placeholder="Ex:0123456789" onkeyup="validateFaxNo()"> 
               <span id="FaxNo_Error"></span>    
      </div>
    </div> 
  </div>
<!--Email-->
 <div class="inputfeild mt-2">
    <label for="Email" class="form-label">Email</label>
    <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Ex:someone@company.com" onkeyup="validateEmail()">
     <span id="Email_Error"></span>
 </div>
<!--Owner Details-->
  <h3>Owner Details</h3>
  <!--Owner Name-->
  <div class="inputfeild mt-2">
    <label for="OwnerName" class="form-label">Name</label>
    <input type="text" class="form-control" id="txtDirectorName" name="txtDirectorName" placeholder="Name" onkeyup="DirectorNamevalidate()"  >
      <span id="Director_Error"></span>
  </div>
<!--Mobile No-->
  <div class="inputfeild mt-2">
    <label for="MobileNo" class="form-label">Mobile No</label>
   <input type="tel"  class="form-control" id="txtMobileNo" name="txtMobileNo" placeholder="Ex:0123456789" onkeyup="validateMobileNo()">
     <span id="MobileNo_Error"></span>
  </div>
<!--Check Terms -->
  <div class="inputfeild mt-2 form-check">
    <input type="checkbox" id="chkCheck" class="form-check-input" name="chkCheck" onkeyup="validateTerms()" >
    <label class="form-check-label" for="exampleCheck1">Agree to Terms and Conditions</label><br>  <span id="checkbox_Error"></span>
  </div>
 <!--Button-->
  <button type="submit" class="btn btn-outline-primary btn-lg" name="btnSubmit" id="btnSubmit">Submit</button>

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

    <!--  Javascript -->
    <script src="js/main.js"></script>
    <script type="text/javascript">
      
      var Registration_Error=document.getElementById('Registration_Error');
      var Name_Error=document.getElementById('Name_Error');
      var Address_Error=document.getElementById('Address_Error');
      var TelephoneNo_Error=document.getElementById('TelephoneNo_Error');
      var FaxNo_Error=document.getElementById('FaxNo_Error');
      var Email_Error=document.getElementById('Email_Error');
      var Director_Error=document.getElementById('Director_Error');
      var MobileNo_Error=document.getElementById('MobileNo_Error');
      var checkbox_Error=document.getElementById('checkbox_Error');

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

   var re  = /^[A-Z-0-9]{10}$/;
     //var re = /^[a-zA-Z0-9_]+$/;
    if(!Registration_no.match(re))
    {
    Registration_Error.innerHTML='Please Enter Registration number in correct format and correct length.';
    return false;
    }
   
  }
  Registration_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
 }


function CompanyNamevalidate()
{ 
   var Name=document.getElementById('txtCompanyName').value.replace(/^\s+|\s+$/g, "");
  if(Name.length == 0)
  {
    Name_Error.innerHTML='Name is required.';
    return false;
  }
  Name_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;

}


function validateaddress()
{ 
   var ADDRESS=document.getElementById('txtAddress').value.replace(/^\s+|\s+$/g, "");
  if(ADDRESS.length == 0)
  {
    Address_Error.innerHTML='Address No is required.';
    return false;
  }
  Address_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;

}




function validateTelephoneNo()
{
  var TelephoneNo = document.getElementById('txtTelephoneNo').value.replace(/^\s+|\s+$/g, "");
  if (TelephoneNo.length == 0) 
  {
     TelephoneNo_Error.innerHTML='Mobile Number is required.';
    return false;
  }
  else
  {
    var mobilePattern = /^[0-9]{10}$/;
   if (!TelephoneNo.match(mobilePattern))
   {
    TelephoneNo_Error.innerHTML='Please Enter Mobile Number in correct format.';
    return false;
   }
  TelephoneNo_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
  }  
}

function validateFaxNo()
{
  var FaxNo = document.getElementById('txtFaxNo').value.replace(/^\s+|\s+$/g, "");
  if (FaxNo.length == 0) 
  {
     FaxNo_Error.innerHTML='Fax Number is required.';
    return false;
  }
  else
  {
    var mobilePattern = /^[0-9]{10}$/;
   if (!FaxNo.match(mobilePattern))
   {
    FaxNo_Error.innerHTML='Please Enter Fax Number in correct format.';
    return false;
   }
  FaxNo_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
  }  
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

function DirectorNamevalidate()
{ 
   var Name=document.getElementById('txtDirectorName').value.replace(/^\s+|\s+$/g, "");
  if(Name.length == 0)
  {
    Director_Error.innerHTML='Name is required.';
    return false;
  }
  Director_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;

}

function validateMobileNo()
{
  var MobileNo = document.getElementById('txtMobileNo').value.replace(/^\s+|\s+$/g, "");
  if (MobileNo.length == 0) 
  {
     MobileNo_Error.innerHTML='Mobile Number is required.';
    return false;
  }
  else
  {
    var mobilePattern = /^[0-9]{10}$/;
   if (!MobileNo.match(mobilePattern))
   {
    MobileNo_Error.innerHTML='Please Enter Mobile Number in correct format.';
    return false;
   }
  MobileNo_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
  }  
}

function validateTerms()
{
  if(document.getElementById("chkCheck").checked == false)
  {
  checkbox_Error.innerHTML='Please Agree To Terms and Conditions.';
  return false;
  }
   checkbox_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;

}

document.getElementById("chkCheck").addEventListener("click", function() {

  if(document.getElementById('chkCheck').checked == true){ 

  checkbox_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}
});



function result()
{
  validateRegistrationNo();
  CompanyNamevalidate();
  validateaddress();
  validateTelephoneNo();
  validateFaxNo();
  validateEmail();
  DirectorNamevalidate();
  validateMobileNo();
  validateTerms();

if(!validateRegistrationNo() || (!CompanyNamevalidate()) || (!validateaddress()) ||(!validateTelephoneNo()) ||(!validateFaxNo()) ||(!validateEmail()) || (!DirectorNamevalidate()) || (!validateMobileNo()) || (!validateTerms()) )
  {
    return false;
  }
}
  </script>


</body>

</html>
