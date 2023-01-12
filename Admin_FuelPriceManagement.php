<?php require_once('connection.php');
session_start();     
?> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Admin Panel-Vehicle Token Management</title>
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
    <link href="css/styleAdmin.css" rel="stylesheet">
</head>

<body>
<?php require('Admin_navigationBar.php');?>

<div class="container">
<h1>Admin Panel - Fuel Price Management </h1>
<p class="header">Fuel Price Details</p>
<table class="table">
<thead>	
    <tr  class="table-info " style="height: 50px; overflow:auto;">
      <th scope="col">Supplier Type</th>
      <th scope="col">Updated Date</th>
      <th scope="col">Updated Time</th>
      <th scope="col">Petrol 92</th>
      <th scope="col">Petrol 95</th>
      <th scope="col">Diesel</th>
      <th scope="col">Super Diesel</th>
      <th scope="col">Kerosine Oil</th>
      <th scope="col">Industrial Kerosine Oil</th>
      <th scope="col">Fuel Oil</th>
      <th scope="col">Operation</th>
    </tr>
 </thead>
  <tbody>
 <?php
 $sql="SELECT * FROM fuel_price";
 $ret= mysqli_query($con, $sql);
 if ($ret) 
 {
 	while($row=mysqli_fetch_assoc($ret))
 	{
 		$Supplier_Type=$row['Supplier_Type'];
 		$Updated_Date=$row['Updated_Date'];
 		$Updated_Time=$row['Updated_Time'];
 		$Petrol_92=$row['Petrol_92'];
 		$Petrol_95=$row['Petrol_95'];
        $Diesel=$row['Diesel'];
        $Super_Diesel=$row['Super_Diesel'];
        $Kerosine_Oil=$row['Kerosine_Oil'];
        $Industrial_Kerosine_Oil=$row['Industrial_Kerosine_Oil'];
        $Fuel_Oil=$row['Fuel_Oil'];
 		echo'<tr style="height: 65px; overflow:auto;">
              <th scope="row">'.$Supplier_Type.'</th>
              <td>'.$Updated_Date.'</td>
              <td>'.$Updated_Time.'</td>
              <td>'.$Petrol_92.'</td>
              <td>'.$Petrol_95.'</td>
              <td>'.$Diesel.'</td>
              <td>'.$Super_Diesel.'</td>
              <td>'.$Kerosine_Oil.'</td>
              <td>'.$Industrial_Kerosine_Oil.'</td>
              <td>'.$Fuel_Oil.'</td>
              <td><button class="btn btn-info" name="btnupdate"><a href="Admin_FuelPriceUpdate.php" class="text-light">Update</a></button></td>
             </tr>';
             
 	}
 }
?>
</tbody>
</table>
</div>
<?php require('Admin_footer.php');?>

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