<?php require_once('connection.php');
//session_start();
if(isset($_GET['deleteid']))
{
	$deleteid=$_GET['deleteid'];
	$sql="Delete from vehicle_registration where Reg_No='$deleteid' ";
	$ret= mysqli_query($con, $sql);
	 if ($ret) 
	  {
	  	echo '<script>alert("Successfuly Deleted")</script>';
	  }
	  else
	  {
	  	echo '<script>alert("Please Try Again Shortly....")</script>';
	  }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Admin Panel-Vehicle Management</title>
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
    <link href="css/styles.css" rel="stylesheet"> 
     <link href="css/styleAdmin.css" rel="stylesheet"> 
</head>

<body>
<?php require('Admin_navigationBar.php');?>

<div class="container"> 
<h1>Admin Panel - Vehicle Management </h1>
<p class="header">Register New Vehicle - <button class="btn btn-primary my-2"><a href="Admin_VehicleRegistration.php" class="text-light">Click Here</a></button></p>
	
<p class="header">Vehicle Details</p>
<table class="table">
<thead>	
    <tr  class="table-info">
      <th scope="col">Registration No</th>
      <th scope="col">Engine No</th>
      <th scope="col">Chassis No</th>
      <th scope="col">Vehicle Class</th>
      <th scope="col">Fuel Type</th>
      <th scope="col">Operation</th>
    </tr>
 </thead>
  <tbody>
 <?php
 $sql="SELECT * FROM vehicle_registration";
 $ret= mysqli_query($con, $sql);
 if ($ret) 
 {
 	while($row=mysqli_fetch_assoc($ret))
 	{
 		$Reg_No=$row['Reg_No'];
 		$Engine_No=$row['Engine_No'];
 		$Chassis_No=$row['Chassis_No'];
 		$Vehicle_Class=$row['Vehicle_Class'];
 		$Fuel_Type=$row['Fuel_Type'];
 		echo'<tr>
              <th scope="row">'.$Reg_No.'</th>
              <td>'.$Engine_No.'</td>
              <td>'.$Chassis_No.'</td>
              <td>'.$Vehicle_Class.'</td>
              <td>'.$Fuel_Type.'</td>
              <td><button class="btn btn-danger" name="btnDelete"><a href="Admin_VehicleManagement.php?deleteid='.$Reg_No.'" class="text-light">Delete</a></button></td>
             </tr>';
 	}  
 }
?>
</tbody>
</table>
</div>
<?php require_once('Admin_footer.php');?>

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