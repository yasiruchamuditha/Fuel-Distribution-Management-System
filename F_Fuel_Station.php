<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Fuel Up - Fuel Station</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Fuel Up" name="keywords">
    <meta content="Fuel Station" name="description">
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
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
   <?php require('F_Navigation_Bar.php');?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Fuel Station</h1>   
    </div>
    <!-- Page Header end -->
    

    <!-- Services Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Services</h1>
            <div class="row">

                <!--Fuel Token Management-->
               <div class="col-lg-6 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                             <i class="fa fa-2x fa-cogs text-secondary"></i>
                            </div>  
                        </div>
                        <h4 class="text-uppercase mb-3">QR Verification</h4>
                        <p class="m-0">Check the validity of the token  Status</p>
                        <a href="F_Qr_Verification.php" class="btn btn-primary py-md-3 px-md-5 mt-2">Check Now</a>
                    </div>
                </div>
                <!--End -->

            <!--Fuel status Management-->
               <div class="col-lg-6 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                           <i class="fa fa-2x fa-cogs text-secondary"></i>
                            </div>  
                        </div>
                        <h4 class="text-uppercase mb-3">Fuel Status</h4>
                        <p class="m-0">Update the Fuel Status</p>
                        <a href="F_Fuel_Status.php" class="btn btn-primary py-md-3 px-md-5 mt-2">update Now</a>
                    </div>
                </div>
                <!--End -->
       </div>

            <div class="row">

            

            <!--Fuel Station Management-->
               <div class="col-lg-6 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                           <i class="fa fa-2x fa-cogs text-secondary"></i>
                            </div>  
                        </div>
                        <h4 class="text-uppercase mb-3">REGISTRATION</h4>
                        <p class="m-0">Fuel Stations Registration</p>
                        <a href="F_Station_Registration.php" class="btn btn-primary py-md-3 px-md-5 mt-2">Check Now</a>
                    </div>
                </div>
                <!--End -->

                 <!--Fuel Station feedback-->
               <div class="col-lg-6 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                           <i class="fa fa-2x fa-cogs text-secondary"></i>
                            </div>  
                        </div>
                        <h4 class="text-uppercase mb-3">FEEDBACK</h4>
                        <p class="m-0">Fuel Stations Feedback</p>
                        <a href="F_Feedback.php" class="btn btn-primary py-md-3 px-md-5 mt-2">Check Now</a>
                    </div>
                </div>
                <!--End -->

       </div>

   </div>
</div>

     
    
    <?php require('M_Footer.php');?>


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