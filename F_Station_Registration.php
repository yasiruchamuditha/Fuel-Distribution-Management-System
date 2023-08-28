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
    $Supplier_Type=$_POST["cmbSupplier"];
    $Station_Name=$_POST["txtName"];
    $No=$_POST["txtAddressNo"];
    $Street=$_POST["txtAddressStreet"];
    $City=$_POST["cmbCity"];
    $Telephone_No=$_POST["txtTelephoneNo"];
    $Fax_No=$_POST["txtFaxNo"];
    $Email=$_POST["txtEmail"];
    $Owner_Name=$_POST["txtOwnerName"];
    $Owner_Mobile_No=$_POST["txtMobileNo"];

   //perform sql
    $sql = "INSERT INTO fuel_station_registration(Registration_No,Supplier_Type,Station_Name,No,Street,City,Telephone_No,Fax_No,Email,Owner_Name,Owner_Mobile_No) VALUES ('$Registration_No','$Supplier_Type','$Station_Name','$No','$Street','$City',$Telephone_No,$Fax_No,'$Email','$Owner_Name',$Owner_Mobile_No)";

     $ret= mysqli_query($con, $sql);
    // echo '<script>alert("Successfuly Registered")</script>';
     header('location:F_Fuel_Station.php');

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
<head >
   <meta charset="utf-8">
    <title>Fuel Station Registration</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Fuel Up" name="keywords">
    <meta content="Fuel Station Registration" name="description">
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
    <!-- Template Stylesheet -->
    <link href="css/styles.css" rel="stylesheet">   
    <link href="css/fuelstation_Reg.css" rel="stylesheet">  
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>    
</head>
<body style="background: url(img/Token1.png);">
<?php require('F_Navigation_Bar.php');?>

<!--Form START-->
<div class="container-fluid">
<div class="container mt-3">
<h1>Fuel Station Registration</h1>
 <!--form -->
<form class="row g-3 needs-validation" action="#" method="post" onsubmit="return result()">
<!--Reg No-->
<div class="inputfeild mt-2">
    <div class="row">
      <div class="col">
          <label for="Registration No" class="form-label">Registration No</label>
          <input type="text" class="form-control" id="txtRegNo" name="txtRegNo" placeholder="Registration No" onkeyup="validateRegistrationNo()">
          <span id="Registration_Error"></span>    
      </div>
 <!--Supplier Type-->
      <div class="col">
            <label for="Supplier Type" class="form-label" >Supplier Type</label>
             <select id="Supplier" name="cmbSupplier" class="form-control" onkeyup="validateSupplier()">
                 <option selected value="S">Choose...</option>
                 <option value="CPC">CEYPETCO</option>
                 <option value="IOC">IOC</option>
                 <option value="IOC">LAUGFS</option>
             </select>  
               <span id="Supplier_Error"></span>   
      </div>
    </div>  
  </div>
<!--Name-->
  <div class="inputfeild mt-2">
    <label for="Name" class="form-label">Name</label>
    <input type="text" class="form-control" id="txtName" name="txtName" placeholder="Fuel Station Name" onkeyup="FuelstationNamevalidate()">
      <span id="Name_Error"></span>
  </div>
<!--Address-->
<div class="inputfeild mt-2">
  <label for="Address" class="form-label">Address</label>
    <div class="row" >
    <!--No-->
       <div class="col">
         <label for="Address" class="form-label">No</label>
         <input type="text" class="form-control" id="txtAddressNo" name="txtAddressNo" placeholder="Ex:No" onkeyup="validateaddressNo()" >
           <span id="AddressNo_Error"></span>
       </div>
     <!--Street-->
      <div class="col">
         <label for="Address" class="form-label">Street</label>
         <input type="text" class="form-control" id="txtAddressStreet" name="txtAddressStreet" placeholder="Ex:Street" onkeyup="validateaddressStreet()" >
           <span id="AddressStreet_Error"></span>
      </div>
    <!--City-->
      <div class="col">
        <label for="City" class="form-label">City</label>
          <select id="City" name="cmbCity" class="form-control"  onkeyup="validateaddressCity()" >
             <option selected value="S">Choose...</option>
             <option value="Ampara">Ampara</option>
             <option value="Anuradhapura">Anuradhapura</option>
             <option value="Badulla">Badulla</option>
             <option value="Batticalo">Batticalo</option>
             <option value="Colombo">Colombo</option>
             <option value="Galle">Galle</option>
             <option value="Gampaha">Gampaha</option>
             <option value="Hambantota">Hambantota</option>
             <option value="Jaffna">Jaffna</option>
             <option value="Kalutara">Kalutara</option>
             <option value="Kandy">Kandy</option>
             <option value="Kegalle">Kegalle</option>
             <option value="Kilinochchi">Kilinochchi</option>
             <option value="Kurunegala">Kurunegala</option>
             <option value="Mannar">Mannar</option>
             <option value="Matale">Matale</option>
             <option value="Matara">Matara</option>
             <option value="Monaragala">Monaragala</option>
             <option value="Mullaitivu">Mullaitivu</option>
             <option value="NuwaraEliya">Nuwara Eliya</option>
             <option value="Polonnaruwa">Polonnaruwa</option>
             <option value="Puttalam">Puttalam</option>
             <option value="Ratnapura">Ratnapura</option>
             <option value="Trincomalee">Trincomalee</option>
             <option value="Vavniya">Vavniya</option>
          </select>  
               <span id="AddressCity_Error"></span>
      </div>     
   </div> 

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
    <input type="text" class="form-control" id="txtOwnerName" name="txtOwnerName" placeholder="Name" onkeyup="OwnerNamevalidate()"  >
      <span id="OwnerName_Error"></span>
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
    <script type="text/javascript">
      
      var Registration_Error=document.getElementById('Registration_Error');
      var Supplier_Error=document.getElementById('Supplier_Error');
      var Name_Error=document.getElementById('Name_Error');
      var AddressNo_Error=document.getElementById('AddressNo_Error');
      var AddressStreet_Error=document.getElementById('AddressStreet_Error');
      var AddressCity_Error=document.getElementById('AddressCity_Error');
      var TelephoneNo_Error=document.getElementById('TelephoneNo_Error');
      var FaxNo_Error=document.getElementById('FaxNo_Error');
      var Email_Error=document.getElementById('Email_Error');
      var OwnerName_Error=document.getElementById('OwnerName_Error');
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

   var re  = /^[A-Z-0-9]{6}$/;
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


function validateSupplier()
{
  if(document.getElementById("Supplier").value == "S")
  {
  Supplier_Error.innerHTML='Supplier Type  is required.';
  return false;
  }
   Supplier_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;

}

document.getElementById("Supplier").addEventListener("click", function() {

  if (document.getElementById("Supplier").value != "S") {

  Supplier_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}
});

function FuelstationNamevalidate()
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


function validateaddressNo()
{ 
   var no=document.getElementById('txtAddressNo').value.replace(/^\s+|\s+$/g, "");
  if(no.length == 0)
  {
    AddressNo_Error.innerHTML='Address No is required.';
    return false;
  }
  AddressNo_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;

}

function validateaddressStreet()
{ 
   var street=document.getElementById('txtAddressStreet').value.replace(/^\s+|\s+$/g, "");
  if(street.length == 0)
  {
    AddressStreet_Error.innerHTML='Address Street is required.';
    return false;
  }
  AddressStreet_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;

}

function validateaddressCity()
{
  if(document.getElementById("City").value == "S")
  {
  AddressCity_Error.innerHTML='City  is required.';
  return false;
  }
   AddressCity_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;

}

document.getElementById("City").addEventListener("click", function() {

  if (document.getElementById("City").value != "S") {

  AddressCity_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}
});


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

function OwnerNamevalidate()
{ 
   var Name=document.getElementById('txtOwnerName').value.replace(/^\s+|\s+$/g, "");
  if(Name.length == 0)
  {
    OwnerName_Error.innerHTML='Name is required.';
    return false;
  }
  OwnerName_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
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
  validateSupplier();
  FuelstationNamevalidate();
  validateaddressNo();
  validateaddressStreet();
  validateaddressCity();
  validateTelephoneNo();
  validateFaxNo();
  validateEmail();
  OwnerNamevalidate();
  validateMobileNo();
  validateTerms();

if(!validateRegistrationNo() || (!validateSupplier()) || (!FuelstationNamevalidate()) || (!validateaddressNo()) || (!validateaddressStreet()) ||(!validateaddressCity()) ||(!validateTelephoneNo()) ||(!validateFaxNo()) ||(!validateEmail()) || (!OwnerNamevalidate()) || (!validateMobileNo()) || (!validateTerms()) )
  {
    return false;
  }
}
  </script>
</body>

</html>
