 <?php require_once('connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <title>Fuel Status Search</title>
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

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet"> 
</head>
<body>
   <?php require('navigationBar.php');?>
<!-- search bar-->
    <div class="container py-5" id="sectionSearch" style="background-color: white; height: 250px;">
      <h1 class="display-4 text-uppercase text-center mb-5">Find  nearest  Fuel  Station</h1>
        <div class="search">
        <form action="#" method="post" name="frmsearch">
        <div class="row">
        <div class="col-md-8">  
         <select class="form-control" name="City" style="font-size: 35px; font-family: agency fb; font-weight: bold; padding-left: 50px;padding-right: 50px; margin-left: 50px;">
             <option selected value="Choose">Nearest City</option>
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
      </div>

      <div class="col-md-3">
          <button type="submit" class="btn btn-outline-primary btn-lg" name="btnSubmit" style="--bs-btn-padding-y: 15px; --bs-btn-padding-x: 15px; padding-top: 10px; padding-bottom: 10px; padding-right: 50px; padding-left: 50px; margin-left: 100px; font-size: 30px;">Search</button>
      </div>
  </div>
    </form>
</div>
</div>
 <!-- search End -->

<?php
  
if(isset($_POST["btnSubmit"]))
{
$City=$_POST["City"];

//perform sql
$sql = "SELECT  fuel_station_registration.Registration_No,fuel_station_registration.Station_Name,fuel_status.Updated_Date,fuel_status.Updated_Time,fuel_status.Petrol_92,fuel_status.Petrol_95,fuel_status.Diesel,fuel_status.Super_Diesel,fuel_status.Kerosine_Oil,fuel_status.Industrial_Kerosine_Oil
from fuel_station_registration 
INNER JOIN fuel_status 
on fuel_station_registration.Registration_No=fuel_status.Registration_No where fuel_station_registration.City='$City'";

$result = mysqli_query($con, $sql);
$num_row = mysqli_num_rows($result);

if ($num_row>0) 
{

//print data
echo "<table style=\"border: 2px solid black; text-align:center; width:98%; background-Color:lightsmoke;margin-left: 15px;font-size: 20px;\">";
echo"<tr>";
echo"<th style=\"height:100px;color:black;\">Registration No </th>";
echo"<th style=\"height:100px;color:black;\">Station Name </th>";
echo"<th style=\"height:100px;color:black;\">Updated Date </th>";
echo"<th style=\"height:100px;color:black;\">Updated Time </th>";
echo"<th style=\"height:100px;color:black;\">Petrol 92 </th>";
echo"<th style=\"height:100px;color:black;\">Petrol 95 </th>";
echo"<th style=\"height:100px;color:black;\">Diesel </th>";
echo"<th style=\"height:100px;color:black;\">Super Diesel </th>";
echo"<th style=\"height:100px;color:black;\">Kerosine Oil </th>";
echo"<th style=\"height:100px;color:black;\">Industrial Kerosine Oil </th>";
echo"</tr>";

while ($row = mysqli_fetch_array($result))
 {
echo "<tr>";
echo "<td> $row[0] <br>";
echo "<td> $row[1] <br>";
echo "<td> $row[2] <br>";
echo "<td> $row[3] <br>";
echo "<td> $row[4] L<br>";
echo "<td> $row[5] L<br>";
echo "<td> $row[6] L<br>";
echo "<td> $row[7] L<br>";
echo "<td> $row[8] L<br>";
echo "<td> $row[9] L<br>";
echo"</tr>";
}

echo "</table>";
//disconnect 
mysqli_close($con);
}
else
{
    echo "<h3 style=\" font-size: 30px;color:black; text-align: center; \">No Sutable Result...</h3>";
}

}
?> 

<!-- Map Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-1 text-primary text-center"></h1>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4752.6306895546395!2d80.24186918810973!3d6.033328257359109!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2slk!4v1665722711902!5m2!1sen!2slk" width="100%" height="800" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
    </div>
 <!-- Map End -->

<?php require('footer.php');?>
</body>
</html>
