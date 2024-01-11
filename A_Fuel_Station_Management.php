<?php require_once('connection.php');
/**
 * @author Yasiru
 * contact me : https://linktr.ee/yasiruchamuditha for more information.
 */
//session_start();
$statusMessage = '';

if(isset($_POST['btnDelete']))
{
	$deleteid=$_POST['deleteid'];
	$sql="DELETE FROM fuel_station_registration WHERE Registration_No=? ";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $deleteid);
    $ret = mysqli_stmt_execute($stmt);

    if ($ret) 
    {
        $statusMessage = '<div class="alert alert-success" role="alert">Successfully Deleted</div>';
    } 
    else 
    {
        $statusMessage = '<div class="alert alert-danger" role="alert">Please Try Again Shortly...</div>';
    }
    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Admin Panel- Fuel Station Management</title>
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
     <link href="css/styleAMP.css" rel="stylesheet"> 
</head>

<body>
<?php require('A_Navigation_Bar.php');?>

<div class="container"> 
<h1>Admin Panel -Fuel Station Management </h1>
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
            $sql="SELECT * FROM fuel_station_registration";
            $ret= mysqli_query($con, $sql);
            if ($ret) 
            {
                while($row=mysqli_fetch_assoc($ret))
                {
                    $Registration_No = htmlspecialchars($row['Registration_No']);
                    $Supplier_Type = htmlspecialchars($row['Supplier_Type']);
                    $Station_Name = htmlspecialchars($row['Station_Name']);
                    $City = htmlspecialchars($row['City']);
                    $Telephone_No = htmlspecialchars($row['Telephone_No']);
                    $Fax_No = htmlspecialchars($row['Fax_No']);
                    $Email = htmlspecialchars($row['Email']);
                    $Owner_Name = htmlspecialchars($row['Owner_Name']);
                    $Owner_Mobile_No = htmlspecialchars($row['Owner_Mobile_No']);
                
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
                        <td>
                            <form method="post">
                                <input type="hidden" name="deleteid" value="' . $Registration_No . '">
                                <button type="submit" class="btn btn-danger" name="btnDelete">Delete</button>
                            </form>
                        </td>
                        </tr>';
                }  
            }
        ?>

    </tbody>
</table>
</div>

<!-- Display the status message below the table only if it's set and use JavaScript to remove it after 3 seconds -->
<?php if (!empty($statusMessage)) { ?>
    <div class="container">
        <div id="statusMessage" class="alert <?php echo strpos($statusMessage, 'alert-success') !== false ? 'alert-success' : 'alert-danger'; ?>" role="alert">
            <?php echo $statusMessage; ?>
        </div>
    </div>
    <script>
        // Remove the status message after 3 seconds
        setTimeout(function () {
            var statusMessage = document.getElementById('statusMessage');
            if (statusMessage) {
                statusMessage.style.display = 'none';
            }
        }, 4000); // 4 seconds (4000 milliseconds)
    </script>
<?php } ?>


<?php require_once('A_MFooter.php');?>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>