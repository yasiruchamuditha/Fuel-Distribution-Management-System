<?php require_once('connection.php');
session_start();   
if(isset($_POST["btnSubmit"]))
{
    if (isset($_SESSION["Email"]))
    {
    $Registration_No=$_POST["txtRegNo"];
    $Updated_Date=$_POST["txtUpdatedDate"]; 
    $Updated_Time=$_POST["txtUpdatedTime"];
    $Petrol_92=$_POST["txtPetrol92"]; 
    $P92Ava=$_POST["P92Ava"];
    $Petrol_95=$_POST["txtPetrol95"];
    $P95Ava=$_POST["P95Ava"];
    $Diesel=$_POST["txtDiesel"]; 
    $DAva=$_POST["DAva"];
    $Super_Diesel=$_POST["txtSuperDiesel"];
    $SDAva=$_POST["SDAva"]; 
    $Kerosine_Oil=$_POST["txtKerosineOil"];
    $KOAva=$_POST["KOAva"];
    $Industrial_Kerosine_Oil=$_POST["txtIndustrialKerosineOil"]; 
    $IKOAva=$_POST["IKOAva"];

  //perform sql
   $sql = "INSERT INTO fuel_status (Registration_No,Updated_Date,Updated_Time,P92_Avalibility,Petrol_92,P95_Avalibility,Petrol_95,D_Avalibility,Diesel,SD_Avalibility,Super_Diesel,KO_Avalibility,Kerosine_Oil,IKO_Avalibility,Industrial_Kerosine_Oil) VALUES ('$Registration_No','$Updated_Date','$Updated_Time','$P92Ava','$Petrol_92','$P95Ava','$Petrol_95','$DAva','$Diesel','$SDAva','$Super_Diesel','$KOAva','$Kerosine_Oil','$IKOAva','$Industrial_Kerosine_Oil')";

     $ret= mysqli_query($con, $sql);
     //echo '<script>alert("Successfuly Registered")</script>';
     header('location:Fuel_Station.php');

     //disconnect 
      mysqli_close($con);
    }
    else
    {
        header("location:User_login.php");
    }
}
?> 

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <title>Fuel Status</title>
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
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">   
    <link href="css/FUELSTATUS.css" rel="stylesheet">      
</head>
<body style="background: url(img/fuelprice.png);">
 <?php require('Fuel_Station_navigationBar.php');?>

<!--Form START-->
  <div class="container-fluid">
  <div class="container mt-2 ">
    <h1 >Fuel Status -For Fuel Station </h1>
<form class="row g-3" action="#" method="post" onsubmit="return result()">
  <!--Reg No-->
<div class="inputfeild mt-2">
    <label for="Registration No" class="form-label">Registration No</label>
    <input type="text" class="form-control" id="txtRegNo" name="txtRegNo" placeholder="Registration No" onkeyup="validateRegistrationNo()" >
    <span id="Registration_Error"></span>   
</div>
<!--Fuel Status Updated Date & Time -->
<div class=" inputfeild mt-2">
    <div class="row">
       <!--Updated Date-->
      <div class="col-md-6">
        <label for="Updated Date" class="form-label">Updated Date</label>
        <input type="date" class="form-control" id="txtUpdatedDate" name="txtUpdatedDate" onkeyup="validateDate()" >
         <span id="Date_Error"></span> 
      </div>
      <!--Updated Time-->
      <div class="col-md-6">
          <label for="Updated Time" class="form-label">Updated Time</label>
          <input type="time" class="form-control" name="txtUpdatedTime"  id="txtUpdatedTime"  onkeyup="validateTime()">
          <span id="Time_Error"></span> 
      </div>
    </div> 
</div>

<!--Petrol 92-->
<div class="inputfeild mt-2">
    <div class="row">
      <div class="col">
            <label for="Availability" class="form-label">Petrol 92 Availability</label>
             <select id="P92Ava" name="P92Ava" class="form-control" onkeyup="P92Ava()">
                 <option value="S">Availability...</option>
                 <option value="Stock Available">Stock Available</option>
                 <option value="Stock not sufficient">Stock not sufficient</option> 
             </select> 
             <span id="P92Ava_Error"></span>     
      </div>
      <div class="col">
        <input type="text" class="form-control" id="txtPetrol92" name="txtPetrol92" placeholder="liters"  style="margin-top:25px;" onkeyup="P92()">  
        <span id="P92_Error"></span>  
      </div>
  </div>
</div>

<!--Petrol 95-->
<div class="inputfeild mt-2">
    <div class="row">
      <div class="col">
            <label for="Availability" class="form-label">Petrol 95 Availability</label>
             <select  name="P95Ava" class="form-control" id="P95Ava" onkeyup="P95Ava()">
                 <option value="S">Availability...</option>
                 <option value="Stock Available">Stock Available</option>
                 <option value="Stock not sufficient">Stock not sufficient</option>
             </select> 
             <span id="P95Ava_Error"></span>     
      </div>
      <div class="col">
        <input type="text" class="form-control" id="txtPetrol95" name="txtPetrol95" placeholder="liters" style="margin-top:25px;" onkeyup="P95()">  
        <span id="P95_Error"></span> 
      </div>
  </div>
</div>

<!--Diesel-->
<div class="inputfeild mt-2">
    <div class="row">
      <div class="col">
            <label for="Availability" class="form-label">Diesel Availability</label>
             <select  name="DAva" class="form-control" id="DAva" on onkeyup="DAva()">
                 <option value="S">Availability...</option>
                 <option value="Stock Available">Stock Available</option>
                 <option value="Stock not sufficient">Stock not sufficient</option>
             </select>    
             <span id="DAva_Error"></span>  
      </div>
      <div class="col">
          <input type="text" class="form-control" id="txtDiesel" name="txtDiesel" placeholder="liters"  style="margin-top:25px;" onkeyup="D()">  
          <span id="D_Error"></span> 
      </div>
  </div>
</div>

<!--Super Diesel-->
<div class="inputfeild mt-2">
    <div class="row">
      <div class="col">
            <label for="Availability" class="form-label">Super Diesel Availability</label>
             <select id="SDAva" name="SDAva" class="form-control" onkeyup="SDAva()" >
                  <option value="S">Availability...</option>
                 <option value="Stock Available">Stock Available</option>
                 <option value="Stock not sufficient">Stock not sufficient</option>
             </select>  
             <span id="SDAva_Error"></span>     
      </div>
      <div class="col">
          <input type="text" class="form-control" id="txtSuperDiesel" name="txtSuperDiesel" placeholder="liters"  style="margin-top:25px;" onkeyup="SD()"> 
          <span id="SD_Error"></span>  
      </div>
  </div>
</div>

<!--Kerosine Oil-->
<div class="inputfeild mt-2">
    <div class="row">
      <div class="col">
            <label for="Availability" class="form-label">Kerosine Oil Availability</label>
             <select id="KOAva" name="KOAva" class="form-control" onkeyup="KOAva()">
                  <option value="S">Availability...</option>
                 <option value="Stock Available">Stock Available</option>
                 <option value="Stock not sufficient">Stock not sufficient</option>
             </select>  
             <span id="KOAva_Error"></span>     
      </div>
      <div class="col">
            <input type="text" class="form-control" id="txtKerosineOil" name="txtKerosineOil" placeholder="liters"  style="margin-top:25px;" onkeyup=" KO()"> 
            <span id="KO_Error"></span>
      </div>
  </div>
</div>

<!--Industrial Kerosine Oil-->
<div class="inputfeild mt-2">
    <div class="row">
      <div class="col">
          <label for="Availability" class="form-label">Industrial Kerosine Oil </label>
             <select id="IKOAva" name="IKOAva" class="form-control"  onkeyup="IKOAva()" >
                 <option value="S">Availability...</option>
                 <option value="Stock Available">Stock Available</option>
                 <option value="Stock not sufficient">Stock not sufficient</option>
             </select>   
             <span id="IKOAva_Error"></span>  
      </div>
      <div class="col">
      <input type="text" class="form-control" id="txtIndustrialKerosineOil" name="txtIndustrialKerosineOil" placeholder="liters"  style="margin-top:25px;" onkeyup="IKO()">
      <span id="IKO_Error"></span> 
      </div>
  </div>
</div>

 <!--Button-->
  <button type="submit" class="btn btn-outline-primary btn-lg" name="btnSubmit" id="btnSubmit">Submit</button>

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
        var Date_Error=document.getElementById('Date_Error');
        var Time_Error=document.getElementById('Time_Error');
        var P92Ava_Error=document.getElementById('P92Ava_Error');
        var P92_Error=document.getElementById('P92_Error');
        var P95Ava_Error=document.getElementById('P95Ava_Error');
        var P95_Error=document.getElementById('P95_Error');
        var DAva_Error=document.getElementById('DAva_Error');
        var D_Error=document.getElementById('D_Error');
        var SDAva_Error=document.getElementById('SDAva_Error');
        var SD_Error=document.getElementById('SD_Error');
        var KOAva_Error=document.getElementById('KOAva_Error');
        var KO_Error=document.getElementById('KO_Error');
        var IKOAva_Error=document.getElementById('IKOAva_Error');
        var IKO_Error=document.getElementById('IKO_Error');
        
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

function validateDate()
{
  var date = document.getElementById('txtUpdatedDate').value.replace(/^\s+|\s+$/g, "");
  if (date.length == 0) 
  {
     Date_Error.innerHTML='Date is required.';
    return false;
  }
  Date_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
  }  
document.getElementById("txtUpdatedDate").addEventListener("click", function() {

  if (document.getElementById("txtUpdatedDate").value != "0") {

  Date_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}
});

function validateTime()
{
  var date = document.getElementById('txtUpdatedTime').value.replace(/^\s+|\s+$/g, "");
  if (date.length == 0) 
  {
     Time_Error.innerHTML='Time is required.';
    return false;
  }
  Time_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
  }  

document.getElementById("txtUpdatedTime").addEventListener("click", function() {

  if (document.getElementById("txtUpdatedTime").value != "0") {

  Time_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}
});
//Petrol 92
function P92Ava()
{
  if(document.getElementById("P92Ava").value == "S")
  {
  P92Ava_Error.innerHTML='Avalibility Update is required.';
  return false;
  }
   P92Ava_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;

}

document.getElementById("P92Ava").addEventListener("click", function() {

  if (document.getElementById("P92Ava").value != "S") {

  P92Ava_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}
});


//petrol 92 liters
function P92()
{
  
var Fuel_Capacity=document.getElementById('txtPetrol92').value.replace(/^\s+|\s+$/g, "");
if(Fuel_Capacity.length == 0)
  {
    P92_Error.innerHTML='Fuel Capacity is required.';
    return false;
  }
  else
  {
   //var re = /^[0-9]{9}$/;
    var re = /^[0-9]+$/;
    if(!Fuel_Capacity.match(re)) 
    {
    P92_Error.innerHTML='Please Enter NUMBER.';
    return false;
    }
   
  }
  P92_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}

//Petrol 95
function P95Ava()
{
  if(document.getElementById("P95Ava").value == "S")
  {
  P95Ava_Error.innerHTML='Avalibility Update is required.';
  return false;
  }
   P95Ava_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;

}

document.getElementById("P95Ava").addEventListener("click", function() {

  if (document.getElementById("P95Ava").value != "S") {

  P95Ava_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}
});

//petrol 95 liters
function P95()
{
  
var Fuel_Capacity=document.getElementById('txtPetrol95').value.replace(/^\s+|\s+$/g, "");
if(Fuel_Capacity.length == 0)
  {
    P95_Error.innerHTML='Fuel Capacity is required.';
    return false;
  }
  else
  {
   //var re = /^[0-9]{9}$/;
    var re = /^[0-9]+$/;
    if(!Fuel_Capacity.match(re)) 
    {
    P95_Error.innerHTML='Please Enter NUMBER.';
    return false;
    }
   
  }
  P95_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}

//Diesal
function DAva()
{
  if(document.getElementById("DAva").value == "S")
  {
  DAva_Error.innerHTML='Avalibility Update is required.';
  return false;
  }
   DAva_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;

}

document.getElementById("DAva").addEventListener("click", function() {

  if (document.getElementById("DAva").value != "S") {

  DAva_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}
});

//dIESALliters
function D()
{
  
var Fuel_Capacity=document.getElementById('txtDiesel').value.replace(/^\s+|\s+$/g, "");
if(Fuel_Capacity.length == 0)
  {
    D_Error.innerHTML='Fuel Capacity is required.';
    return false;
  }
  else
  {
   //var re = /^[0-9]{9}$/;
    var re = /^[0-9]+$/;
    if(!Fuel_Capacity.match(re)) 
    {
    D_Error.innerHTML='Please Enter NUMBER.';
    return false;
    }
   
  }
  D_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}

//SUPERDIESAL

function SDAva()
{
  if(document.getElementById("SDAva").value == "S")
  {
  SDAva_Error.innerHTML='Avalibility Update is required.';
  return false;
  }
   SDAva_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;

}

document.getElementById("SDAva").addEventListener("click", function() {

  if (document.getElementById("SDAva").value != "S") {

  SDAva_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}
});

//sUPER dIESALliters
function SD()
{
  
var Fuel_Capacity=document.getElementById('txtSuperDiesel').value.replace(/^\s+|\s+$/g, "");
if(Fuel_Capacity.length == 0)
  {
    SD_Error.innerHTML='Fuel Capacity is required.';
    return false;
  }
  else
  {
   //var re = /^[0-9]{9}$/;
    var re = /^[0-9]+$/;
    if(!Fuel_Capacity.match(re)) 
    {
    SD_Error.innerHTML='Please Enter NUMBER.';
    return false;
    }
   
  }
  SD_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}
//kEROSINEoIL
function KOAva()
{
  if(document.getElementById("KOAva").value == "S")
  {
  KOAva_Error.innerHTML='Avalibility Update is required.';
  return false;
  }
   KOAva_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;

}

document.getElementById("KOAva").addEventListener("click", function() {

  if (document.getElementById("KOAva").value != "S") {

  KOAva_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}
});

//kEROSINEoIL
function KO()
{
  
var Fuel_Capacity=document.getElementById('txtKerosineOil').value.replace(/^\s+|\s+$/g, "");
if(Fuel_Capacity.length == 0)
  {
    KO_Error.innerHTML='Fuel Capacity is required.';
    return false;
  }
  else
  {
   //var re = /^[0-9]{9}$/;
    var re = /^[0-9]+$/;
    if(!Fuel_Capacity.match(re)) 
    {
    KO_Error.innerHTML='Please Enter NUMBER.';
    return false;
    }
   
  }
  KO_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}

//INDUSTRIAL KEROSINE OIL
function IKOAva()
{
  if(document.getElementById("IKOAva").value == "S")
  {
  IKOAva_Error.innerHTML='Avalibility Update is required.';
  return false;
  }
   IKOAva_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;

}

document.getElementById("IKOAva").addEventListener("click", function() {

  if (document.getElementById("IKOAva").value != "S") {

  IKOAva_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}
});

//kEROSINEoIL
function IKO()
{
  
var Fuel_Capacity=document.getElementById('txtIndustrialKerosineOil').value.replace(/^\s+|\s+$/g, "");
if(Fuel_Capacity.length == 0)
  {
    IKO_Error.innerHTML='Fuel Capacity is required.';
    return false;
  }
  else
  {
   //var re = /^[0-9]{9}$/;
    var re = /^[0-9]+$/;
    if(!Fuel_Capacity.match(re)) 
    {
    IKO_Error.innerHTML='Please Enter NUMBER.';
    return false;
    }
   
  }
  IKO_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
  return true;
}


function result()
{
  validateRegistrationNo();
  validateDate();
  validateTime();
  P92Ava();
  P92();
  P95Ava();
  P95();
  DAva();
  D();
  SDAva();
  SD();
  KOAva();
  KO();
  IKOAva();
  IKO();
  
  if ((!validateRegistrationNo()) || (!validateDate()) || (!validateTime()) || (!P92Ava()) ||(!P92()) || (!P95Ava()) ||(!P95()) || (!DAva()) || (!D()) ||(!SDAva())|| (!SD()) ||(!KOAva())|| (!KO()) ||(!IKOAva())|| (!IKO()))
  {
    return false;
  }
}
    </script>
</body>

</html>
