<?php require_once('connection.php');

$Supplier_Type="";
$dateC="";
$TimeC="";
$P92C="";
$P95C="";
$DC="";
$SDC="";
$KOC="";
$IKOC="";
$FOC="";

//perform sql
$sql="SELECT * FROM fuel_price where Supplier_Type='CPC' ";

$result=mysqli_query($con,$sql);

if($row = mysqli_fetch_array($result))
{
    $Supplier_Type=$row[0];
    $dateC=$row[1];
    $TimeC=$row[2];
    $P92C=$row[3];
    $P95C=$row[4];
    $DC=$row[5];
    $SDC=$row[6];
    $KOC=$row[7];
    $IKOC=$row[8];
    $FOC=$row[9];
}
else
{
    echo "No records found.....................";
}

$Supplier_Type="";
$date="";
$Time="";
$P92="";
$P95="";
$D="";
$SD="";
$KO="";
$IKO="";
$FO="";

//perform sql
$sql="SELECT * FROM fuel_price where Supplier_Type='IOC' ";

$result=mysqli_query($con,$sql);

if($row = mysqli_fetch_array($result))
{
    $Supplier_Type=$row[0];
    $date=$row[1];
    $Time=$row[2];
    $P92=$row[3];
    $P95=$row[4];
    $D=$row[5];
    $SD=$row[6];
    $KO=$row[7];
    $IKO=$row[8];
    $FO=$row[9];
}
else
{
    echo "No records found.....................";
}

//disconnect 
mysqli_close($con);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fuel Up -Fuel Price</title>
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
      <?php require('navigationBarForms.php');?>

 <!-- FUEL PRICE - IOC -->
 <!-- container start -->
<div class="container-fluid py-4 px-sm-3 px-md-5">
<!-- row start -->
    <div class="row">
    <h1 class="fuel-station-name" style="text-align: left;">FUEL PRICE - CEYPTCO</h1>
   </div>
   <!-- row end -->

   <!-- row start -->
    <div class="row">
  <!-- column start -->
        <div class="col" > 
        <div class="card mb-3" style="max-width: 400px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="./img/FuelPump.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">PETROL 92</h5>
                    <p class="card-text">Stock Available</p>
                    <p class="card-text">Rs.<?php echo $P92C; ?></p>
                </div>
            </div>
        </div>
    </div>
    </div>
        <!-- column start -->
        <div class="col" > 
            <div class="card mb-3" style="max-width: 400px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="./img/FuelPump.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">PETROL 95</h5>
                    <p class="card-text">Stock Available</p>
                    <p class="card-text">Rs.<?php echo $P95C; ?></p>
                </div>
            </div>
        </div>
    </div>
        </div>

<!-- column start -->
    <div class="col" > 
            <div class="card mb-3" style="max-width: 400px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="./img/FuelPump.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">DIESEL</h5>
                    <p class="card-text">Stock Available</p>
                    <p class="card-text">Rs.<?php echo $DC; ?></p>
                </div>
            </div>
        </div>
    </div>
 </div>  
  <!-- column end -->
</div>
<!-- row end -->


<!-- row start -->
 <div class="row">
<!-- column start -->
        <div class="col" > 
            <div class="card mb-3" style="max-width: 400px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="./img/FuelPump.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">SUPER DIESEL</h5>
                    <p class="card-text">Stock Available</p>
                    <p class="card-text">Rs.<?php echo $SDC; ?></p>
                </div>
            </div>
        </div>
    </div>
     </div>
        <!-- column start -->
        <div class="col" > 
            <div class="card mb-3" style="max-width: 400px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="./img/FuelPump.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">KEROSINE OIL</h5>
                    <p class="card-text">Stock Available</p>
                    <p class="card-text">Rs.<?php echo $KOC; ?></p>
                </div>
            </div>
        </div>
    </div>
        </div>
<!-- column start -->
         <div class="col" > 
            <div class="card mb-3" style="max-width: 400px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="./img/FuelPump.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">INDUSTRIAL KEROSINE OIL</h5>
                    <p class="card-text">Stock Available</p>
                    <p class="card-text ">Rs.<?php echo $IKOC; ?></p>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
    <!-- row end -->
    <p style="font-weight: bold; color: black;">Latest Updated On <?php echo  $dateC; ?> At <?php echo $TimeC; ?> </p>
</div>
<!-- Container end -->

 <!-- FUEL PRICE - IOC -->

 <!-- container start -->
<div class="container-fluid py-4 px-sm-3 px-md-5">
<!-- row start -->
    <div class="row">
    <h1 class="fuel-station-name" style="text-align: left;">FUEL PRICE - IOC</h1>
   </div>
   <!-- row end -->

   <!-- row start -->
    <div class="row">
  <!-- column start -->
        <div class="col" > 
        <div class="card mb-3" style="max-width: 400px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="./img/FuelPump.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">PETROL 92</h5>
                    <p class="card-text">Stock Available</p>
                    <p class="card-text">Rs.<?php echo $P92; ?></p>
                </div>
            </div>
        </div>
    </div>
    </div>
<!-- column start -->
        <div class="col" > 
            <div class="card mb-3" style="max-width: 400px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="./img/FuelPump.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">PETROL 95</h5>
                    <p class="card-text">Stock Available</p>
                    <p class="card-text">Rs.<?php echo $P95; ?></p>
                </div>
            </div>
        </div>
    </div>
        </div>

<!-- column start -->
    <div class="col" > 
            <div class="card mb-3" style="max-width: 400px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="./img/FuelPump.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">DIESEL</h5>
                    <p class="card-text">Stock Available</p>
                    <p class="card-text">Rs.<?php echo  $D; ?></p>
                </div>
            </div>
        </div>
    </div>
 </div>  
  <!-- column end -->
</div>
<!-- row end -->

<!-- row start -->
 <div class="row">
<!-- column start -->
        <div class="col" > 
            <div class="card mb-3" style="max-width: 400px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="./img/FuelPump.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">SUPER DIESEL</h5>
                    <p class="card-text">Stock Available</p>
                    <p class="card-text">Rs.<?php echo $SD; ?></p>
                </div>
            </div>
        </div>
    </div>
     </div>
        <!-- column start -->
        <div class="col" > 
            <div class="card mb-3" style="max-width: 400px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="./img/FuelPump.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">KEROSINE OIL</h5>
                    <p class="card-text">Stock Available</p>
                    <p class="card-text">Rs.<?php echo $KO; ?></p>
                </div>
            </div>
        </div>
    </div>
        </div>
<!-- column start -->
         <div class="col" > 
            <div class="card mb-3" style="max-width: 400px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="./img/FuelPump.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">INDUSTRIAL KEROSINE OIL</h5>
                    <p class="card-text">Stock Available</p>
                    <p class="card-text">Rs.<?php echo $IKO; ?></p>
                </div>
            </div>
        </div>
    </div>
 </div>
</div>
    <!-- row end -->
    <p style="font-weight: bold; color: black;">Latest Updated On <?php echo  $date; ?> At <?php echo $Time; ?> </p>
</div>
<!-- Container end -->
   
 <!-- Footer Start -->
   <?php require('footer.php');?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


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