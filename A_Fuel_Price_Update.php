<?php require_once('connection.php');
session_start(); 
/**
 * @author Yasiru
 * contact me : https://linktr.ee/yasiruchamuditha for more information.
 */    
if(isset($_POST["btnSubmit"]))
{
    if (isset($_SESSION["Email"]))
    {
    $Supplier_Type=$_POST["Supplier"];
    $Updated_Date=$_POST["txtUpdatedDate"]; 
    $Updated_Time=$_POST["txtUpdatedTime"];
    $Petrol_92=$_POST["txtPetrol92"]; 
    $Petrol_95=$_POST["txtPetrol95"];
    $Diesel=$_POST["txtDiesel"]; 
    $Super_Diesel=$_POST["txtSuperDiesel"]; 
    $Kerosine_Oil=$_POST["txtKerosineOil"];
    $Industrial_Kerosine_Oil=$_POST["txtIndustrialKerosineOil"]; 
    $Fuel_Oil=$_POST["txtFuelOil"];

    //perform sql
    $sql = "UPDATE fuel_price SET Updated_Date='$Updated_Date',Updated_Time='$Updated_Time',Petrol_92='$Petrol_92',Petrol_95='$Petrol_95',Diesel='$Diesel',Super_Diesel='$Super_Diesel',Kerosine_Oil='$Kerosine_Oil',Industrial_Kerosine_Oil='$Industrial_Kerosine_Oil',Fuel_Oil='$Fuel_Oil' where Supplier_Type='$Supplier_Type' ";

     $ret= mysqli_query($con, $sql);
     //echo '<script>alert("Successfuly Registered")</script>';
      header('location:A_Fuel_Price_Management.php');
      
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
    <link href="css/style_Panel1.css" rel="stylesheet">  
    <script src="https://kit.fontawesome.com/4874d070ea.js" crossorigin="anonymous"></script>   
</head>
<body style="background: url(img/fuelprice.png);">
 <?php require('A_Navigation_Bar.php');?>

<!--Form START-->

<div class="container-fluid">
<h1>Admin Panel - Fuel Price Management </h1>
<div class="container mt-3" >
 <!--form -->
<h3>Fuel Price Update Panel</h3>
<form class="row g-3" action="#" method="post" autocomplete="off" onsubmit="return result()">
 <!--Supplier Type-->
      <div class="inputfeild mt-2">
            <label for="Supplier Type" class="form-label">Supplier Type</label>
            <select id="Supplier" name="Supplier" class="form-control" style="margin-top: 8px;" onkeyup="SupplierType()">
                 <option selected value="S">Choose...</option>
                 <option value="CPC">CEYPETCO</option>
                 <option value="IOC">IOC</option>   
             </select>   
         <span id="SupplierType_Error"></span> 
      </div>

<!--Fuel price Updated Date & Time -->
  <div class="inputfeild mt-2">
    <div class="row">
       <!--Updated Date-->
      <div class="col-md-6">
         <label for="Updated Date" class="form-label">Updated Date</label>
         <input type="date" class="form-control" name="txtUpdatedDate" id="txtpreferdDate" onkeyup="validateDate()" >
         <span id="UpdatedDate_Error"></span>
      </div>

      <!--Updated Time-->
      <div class="col-md-6">
          <label for="Updated Time" class="form-label">Updated Time</label>
          <input type="time" class="form-control" name="txtUpdatedTime"  id="txtpreferdTime" onkeyup="validateTime()"  >
          <span id="UpdatedTime_Error"></span>
      </div>
    </div> 
  </div>
  <!--Petrol 92-->
  <div class="inputfeild mt-2">
    <label for="Petrol 92" class="form-label">Petrol 92</label>
    <input type="text" class="form-control" name="txtPetrol92" id="txtPetrol92" placeholder="Rs.xxxx.xx" onkeyup="validatePetrol92()" >
      <span id="Petrol92_Error"></span>
  </div>
 
  <!--Petrol 95-->
  <div class="inputfeild mt-2">
    <label for="Petrol 95" class="form-label">Petrol 95</label>
    <input type="text" class="form-control" name="txtPetrol95" id="txtPetrol95" placeholder="Rs.xxxx.xx" onkeyup="validatePetrol95()" >
     <span id="Petrol95_Error"></span>
  </div>

    <!--Diesel-->
  <div class="inputfeild mt-2">
    <label for="Diesel" class="form-label">Diesel</label>
    <input type="text" class="form-control" name="txtDiesel" id="txtDiesel" placeholder="Rs.xxxx.xx" onkeyup="validateDiesel()" >
  <span id="Diesel_Error"></span>
  </div>

    <!--Super Diesel-->
  <div class="inputfeild mt-2">
    <label for="Super Diesel" class="form-label">Super Diesel</label>
    <input type="text" class="form-control" name="txtSuperDiesel" id="txtSuperDiesel" placeholder="Rs.xxxx.xx" onkeyup="validateSuperDiesel()" >
     <span id="SuperDiesel_Error"></span>
  </div>


    <!--Kerosine Oil-->
  <div class="inputfeild mt-2">
    <label for="Kerosine Oil" class="form-label">Kerosine Oil</label>
    <input type="text" class="form-control" name="txtKerosineOil" id="txtKerosineOil" placeholder="Rs.xxxx.xx" onkeyup="validateKerosineOil()" >
      <span id="KerosineOil_Error"></span>
  </div>

      <!--Industrial Kerosine Oil-->
  <div class="inputfeild mt-2">
    <label for="Industrial Kerosine Oil" class="form-label">Industrial Kerosine Oil</label>
    <input type="text" class="form-control" name="txtIndustrialKerosineOil" id="txtIndustrialKerosineOil" placeholder="Rs.xxxx.xx" onkeyup="validateIndustrialKerosineOil()" >
     <span id="IndustrialKerosineOil_Error"></span>
  </div>

  <!--Fuel Oil-->
  <div class="inputfeild mt-2">
    <label for="Fuel Oil" class="form-label">Fuel Oil</label>
    <input type="text" class="form-control" name="txtFuelOil" id="txtFuelOil" placeholder="Rs.xxxx.xx" onkeyup="validateFuelOil()" >
     <span id="FuelOil_Error"></span>
  </div>

<!--Check Terms -->
  <div class="inputfeild mt-2 form-check">
    <input type="checkbox" class="form-check-input" name="chkCheck" id="chkCheck"  >
    <label class="form-check-label" for="exampleCheck1">Agree to Terms and Conditions</label><br>
    <span id="Check_Error"></span>
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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

     <script type="text/javascript">
    
var SupplierType_Error=document.getElementById('SupplierType_Error');
var UpdatedDate_Error=document.getElementById('UpdatedDate_Error');
var UpdatedTime_Error=document.getElementById('UpdatedTime_Error');
var Petrol92_Error=document.getElementById('Petrol92_Error');
var Petrol95_Error=document.getElementById('Petrol95_Error');
var Diesel_Error=document.getElementById('Diesel_Error');
var SuperDiesel_Error=document.getElementById('SuperDiesel_Error');
var KerosineOil_Error=document.getElementById('KerosineOil_Error');
var IndustrialKerosineOil_Error=document.getElementById('IndustrialKerosineOil_Error');
var FuelOil_Error=document.getElementById('FuelOil_Error');


function SupplierType()
{
if(document.getElementById("Supplier").value == "S")
{
  SupplierType_Error.innerHTML='Please Select Supplier Type.';
  return false;
}
return true;
}
  
document.getElementById("Supplier").addEventListener("click", function() {

  if (document.getElementById("Supplier").value != "S") {
  SupplierType_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}
});

function validateDate()
{
  var date = document.getElementById('txtpreferdDate').value.replace(/^\s+|\s+$/g, "");
  if (date.length == 0) 
  {
     UpdatedDate_Error.innerHTML='Date is required.';
    return false;
  }
  UpdatedDate_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
  }  

document.getElementById("txtpreferdDate").addEventListener("click", function() {

  if (document.getElementById("txtpreferdDate").value != "0") {

  UpdatedDate_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}
});

function validateTime()
{
  var date = document.getElementById('txtpreferdTime').value.replace(/^\s+|\s+$/g, "");
  if (date.length == 0) 
  {
     UpdatedTime_Error.innerHTML='Time is required.';
    return false;
  }
  UpdatedTime_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
  }  

document.getElementById("txtpreferdTime").addEventListener("click", function() {

  if (document.getElementById("txtpreferdTime").value != "0") {

  UpdatedTime_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}
});

function validatePetrol92() 
{
  var txtPetrol92 = document.getElementById('txtPetrol92').value.replace(/^\s+|\s+$/g, "");
  if (txtPetrol92.length == 0) 
  {
      Petrol92_Error.innerHTML='Field is required.';
    return false;
  }
   Petrol92_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}

function validatePetrol95() 
{
  var txtPetrol95 = document.getElementById('txtPetrol95').value.replace(/^\s+|\s+$/g, "");
  if (txtPetrol95.length == 0) 
  {
      Petrol95_Error.innerHTML='Field is required.';
    return false;
  }
   Petrol95_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}

function validateDiesel() 
{
  var txtDiesel = document.getElementById('txtDiesel').value.replace(/^\s+|\s+$/g, "");
  if (txtDiesel.length == 0) 
  {
      Diesel_Error.innerHTML='Field is required.';
    return false;
  }
   Diesel_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}

function validateSuperDiesel() 
{
  var txtSuperDiesel = document.getElementById('txtSuperDiesel').value.replace(/^\s+|\s+$/g, "");
  if (txtSuperDiesel.length == 0) 
  {
      SuperDiesel_Error.innerHTML='Field is required.';
    return false;
  }
   SuperDiesel_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}

function validateKerosineOil() 
{
  var txtKerosineOil = document.getElementById('txtKerosineOil').value.replace(/^\s+|\s+$/g, "");
  if (txtKerosineOil.length == 0) 
  {
      KerosineOil_Error.innerHTML='Field is required.';
    return false;
  }
   KerosineOil_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}

function validateIndustrialKerosineOil() 
{
  var txtIndustrialKerosineOil = document.getElementById('txtIndustrialKerosineOil').value.replace(/^\s+|\s+$/g, "");
  if (txtIndustrialKerosineOil.length == 0) 
  {
      IndustrialKerosineOil_Error.innerHTML='Field is required.';
    return false;
  }
   IndustrialKerosineOil_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}

function validateFuelOil() 
{
  var txtFuelOil = document.getElementById('txtFuelOil').value.replace(/^\s+|\s+$/g, "");
  if (txtFuelOil.length == 0) 
  {
      FuelOil_Error.innerHTML='Field is required.';
    return false;
  }
   FuelOil_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}

function validateTerms()
{
  if(document.getElementById("chkCheck").checked == false)
  {
  Check_Error.innerHTML='Please Agree To Terms and Conditions.';
  return false;
  }
   Check_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;

}

document.getElementById("chkCheck").addEventListener("click", function() {

  if(document.getElementById('chkCheck').checked == true){ 

  Check_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}
});

function result()
{
  SupplierType();
  validateDate();
  validateTime();
  validatePetrol92();
  validatePetrol95();
  validateDiesel();
  validateSuperDiesel();
  validateKerosineOil();
  validateIndustrialKerosineOil();
  validateFuelOil();
  validateTerms();

if((!SupplierType())  || (!validateDate()) || (!validateTime()) || (!validatePetrol92()) || (!validatePetrol95()) || (!validateDiesel()) || (!validateSuperDiesel()) ||  (!validateKerosineOil()) || (!validateIndustrialKerosineOil()) || (!validateFuelOil()) || (!validateTerms()) )
  {
    return false;
  }
}
    </script>



</body>

</html>
