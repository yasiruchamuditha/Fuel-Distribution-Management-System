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
        <h1 class="display-3 text-uppercase text-white mb-3" style="margin-top: 300px;">My Account</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="index.php">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">My Account</h6>
        </div>
    </div>
    <!-- Page Header end -->
    
  <!-- Services Start -->
    <div class="container-fluid py-5" >
        <div class="container pt-5 pb-3">
        <h1 class="display-4 text-uppercase text-center mb-5" id="he1">Profile</h1>
        <div class="row">
     <!--Vehicle Registration-->
             <div class="col-lg-6 col-md-2 mb-2" id="C3">
                <h2 id="h2">QR Generation</h2>
                <img src="img/services/VEHICLE.jpg" width="350px" height="300px" id="img" >
                <p id="p">Generate Your QR Pass for get Your Fuel Token</p>
                 <a href="Acc_verification.php" class="btn btn-dark" id="a">Generate Now</a>
            </div>

    <!--Non Vehicle Registration-->
            <div class="col-lg-6 col-md-2 mb-2" id="C3">
                <h2 id="h2">Update Profile</h2>
                <img src="img/services/NON_VEHICLE.jpg" width="350px" height="300px" id="img" >
                <p id="p">You can update Your profile password.</p>
                 <a href="updateAccountPassword.php" class="btn btn-dark" id="a">update Now</a>
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