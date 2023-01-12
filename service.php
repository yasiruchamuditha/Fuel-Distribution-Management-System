<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8">
    <title>Service</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Fuel Up" name="keywords">
    <meta content="About Us" name="description">


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

    <!-- css Stylesheet -->
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/services.css" rel="stylesheet">
</head>

<body style="background-color: #D6D4D7"> 

     <?php require('navigationBar.php');?>
   
    <!-- Page Header Start -->
    <div class="container-fluid page-header ">
        <h1 class="display-3 text-uppercase text-white mb-3" style="margin-top: 300px;">Service</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="index.php">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">Service</h6>
        </div>
    </div>
    <!-- Page Header end -->
    
  <!-- Services Start -->
    <div class="container-fluid py-5" >
        <div class="container pt-5 pb-3">
        <h1 class="display-4 text-uppercase text-center mb-5" id="he1">Our Services</h1>
        <div class="row">
     <!--Vehicle Registration-->
             <div class="col-lg-6 col-md-2 mb-2" id="C3">
                <h2 id="h2">Vehicle Registrations</h2>
                <img src="img/services/VEHICLE.jpg" width="350px" height="300px" id="img" >
                <p id="p">Register Your Vehicle And Eligible To Reserver Fuel Token.You Can Use This Fuel Token To Get Fuel From Any Fuel Station.</p>
                 <a href="VehicleRegistration.php" class="btn btn-dark" id="a">Register Now</a>
            </div>

    <!--Non Vehicle Registration-->
            <div class="col-lg-6 col-md-2 mb-2" id="C3">
                <h2 id="h2">Non Vehicle Registrations</h2>
                <img src="img/services/NON_VEHICLE.jpg" width="350px" height="300px" id="img" >
                <p id="p">Register Your Industrial Instrument And Eligible To Reserver Fuel Token.You Can Use This Fuel Token To Get Fuel From Any Fuel Station.</p>
                 <a href="InstrumentRegistration.php" class="btn btn-dark" id="a">Register Now</a>
            </div>
      </div>

       <div class="row">
    <!--Vehicle Token Creation-->
             <div class="col-lg-6 col-md-2 mb-2" id="C3">
                <h2 id="h2">Vehicle Fuel Token</h2>
                <img src="img/services/FUEL_TOKEN.jpg" width="350px" height="300px" id="img" >
                <p id="p">Create Your Vehicle Fuel Token To Get Fuel From Any Fuel Station.</p>
                 <a href="TokenCreationVehicle.php" class="btn btn-dark" id="a">Create Now</a>
            </div>

    <!--Non Vehicle Token Creation-->
            <div class="col-lg-6 col-md-2 mb-2" id="C3">
                <h2 id="h2">Non Vehicle Fuel Token</h2>
                <img src="img/services/FUEL_TOKEN.jpg" width="350px" height="300px" id="img" >
                <p id="p">Create Your Non Vehicle Fuel Token To Get Fuel From Any Fuel Station.</p>
                 <a href="TokenCreationInstrument.php" class="btn btn-dark" id="a">Create Now</a>
            </div>
      </div>


       <div class="row">
   <!--Fuel Price -->
             <div class="col-lg-6 col-md-2 mb-2" id="C3">
                <h2 id="h2">Fuel Price</h2>
                <img src="img/services/FUEL_PRICE.jpg" width="350px" height="300px" id="img" >
                <p id="p">Check Latest Fuel Price In Srilanka Based On Suppliers type In Sri Lanka with real time update prices.</p>
                 <a href="fuelprice.php" class="btn btn-dark" id="a">Check Now</a>
            </div>

     <!--Fuel based Produts-->
      <!--Fuel Status-->
            <div class="col-lg-6 col-md-2 mb-2" id="C3">
                <h2 id="h2">Fuel Status</h2>
                <img src="img/services/FUEL_STATUS.jpg" width="350px" height="300px" id="img" >
                <p id="p">Check Latest Fuel Status Of Fuel Stations Based On Your Current Location.</p>
                 <a href="FuelStatusSearch.php" class="btn btn-dark" id="a">Check Now</a>
            </div>
      </div>


      <div class="row">
       <!--Other Services -->
             <div class="col-lg-6 col-md-2 mb-2" id="C3">
                <h2 id="h2">Other Services</h2>
                <img src="img/services/OTHER_PRODUCTS.jpg" width="350px" height="300px" id="img" >
                <p id="p">You can get other services which related fuel in srilanka like Ceypetco,IOC and Fuel Pass.</p>
                 <a href="OtherServices.php" class="btn btn-dark" id="a">Check Now</a>
            </div>   
            
             <div class="col-lg-6 col-md-2 mb-2" id="C3">
                <h2 id="h2">Create FuelUp Account</h2>
                <img src="img/services/OTHER_PRODUCTS.jpg" width="350px" height="300px" id="img" >
                <p id="p">Create Your FuelUp Account And Reserve Your Fuel Token From Nearest Fuel Station.</p>
                 <a href="User_SignUp.php" class="btn btn-dark" id="a">Create Now</a>
            </div>
      </div>

  </div>
</div>
    <!-- Services End -->

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
</body>

</html>