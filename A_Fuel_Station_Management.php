<?php require_once('connection.php');
/**
 * @author Yasiru
 * contact me : https://linktr.ee/yasiruchamuditha for more information.
 */
//session_start();
if(isset($_GET['deleteid']))
{
	$deleteid=$_GET['deleteid'];
	$sql="Delete from fuel_station_registration where Registration_No='$deleteid' ";
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
    <title>Admin Panel-Fuel Station Management</title>
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
    <link href="css/styleAdmin.css" rel="stylesheet">  
</head>

<body>
<?php require('A_Navigation_Bar.php');?>
<div class="container">
<h1>Admin Panel - Fuel Station Profile Management </h1>
<p class="header">Add New Fuel Station Profiles - 
<button class="btn btn-primary"><a href="A_Fuel_Station_Registration.php" class="text-light">Click Here</a></button><p>
<p  class="header">Fuel Stations</p>
<table class="table">
<thead>	
    <tr  class="table-info">
      <th scope="col">Reg No</th>
      <th scope="col">Supplier Type</th>
      <th scope="col">Name</th>
      <th scope="col">City</th>
      <th scope="col">Tel No</th>
      <th scope="col">Fax No</th>
      <th scope="col">Email</th>
      <th scope="col">Owner Name</th>
      <th scope="col">Mobile No</th>
      <th scope="col">Operation</th>
    </tr>
 </thead>
  <tbody>
 <?php
 $sql="SELECT Registration_No,Supplier_Type,Station_Name,City,Telephone_No,Fax_No,Email,Owner_Name,Owner_Mobile_No FROM fuel_station_registration";
 $ret= mysqli_query($con, $sql);
 if ($ret) 
 {
 	while($row=mysqli_fetch_assoc($ret))
 	{
 		$Registration_No=$row['Registration_No'];
 		$Supplier_Type=$row['Supplier_Type'];
 		$Station_Name=$row['Station_Name'];
 		$City=$row['City'];
 		$Telephone_No=$row['Telephone_No'];
        $Fax_No=$row['Fax_No'];
        $Email=$row['Email'];
        $Owner_Name=$row['Owner_Name'];
        $Owner_Mobile_No=$row['Owner_Mobile_No'];

 		echo'<tr>
              <th scope="row">'.$Registration_No.'</th>
              <td>'.$Supplier_Type.'</td>
              <td>'.$Station_Name.'</td>
              <td>'.$City.'</td>
              <td>'.$Telephone_No.'</td>
              <td>'.$Fax_No.'</td>
              <td>'.$Email.'</td>
              <td>'.$Owner_Name.'</td>
              <td>'.$Owner_Mobile_No.'</td>
              <td><button class="btn btn-danger" name="btnDelete"><a href="A_Fuel_Station_Management.php?deleteid='.$Registration_No.'" class="text-light">Delete</a></button></td>
             </tr>';
 	}
 }
?>
</tbody>
</table>
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
</body>
</html>