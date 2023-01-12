<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Fuel Up Admin Panel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Fuel Up" name="keywords">
    <meta content="Admin Panel" name="description">
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
   <?php require('Admin_navigationBar.php');?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3" style="margin-top: 300px;">ADMIN PANEL</h1>   
    </div>
    <!-- Page Header end -->
    

    <!-- Services Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Services Management</h1>
            <div class="row">

            <!--User Management-->
               <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                             <i class="fa fa-2x fa-cogs text-secondary"></i>
                            </div>  
                        </div>
                        <h4 class="text-uppercase mb-3">USER</h4>
                        <p class="m-0">User Management</p>
                        <a href="Admin_userManagement.php" class="btn btn-primary py-md-3 px-md-5 mt-2">Check Now</a>
                    </div>
                </div>
                <!--End -->

            <!--Fuel Station Management-->
               <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                           <i class="fa fa-2x fa-cogs text-secondary"></i>
                            </div>  
                        </div>
                        <h4 class="text-uppercase mb-3">FUEL STATIONS</h4>
                        <p class="m-0">Fuel Stations Management</p>
                        <a href="Admin_fuelStationManagement.php" class="btn btn-primary py-md-3 px-md-5 mt-2">Check Now</a>
                    </div>
                </div>
                <!--End -->

            <!--Fuel Supplier Management-->
               <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                              <i class="fa fa-2x fa-cogs text-secondary"></i>
                            </div>  
                        </div>
                        <h4 class="text-uppercase mb-3">SUPPLIERS</h4>
                        <p class="m-0">Fuel Suppliers Management</p>
                        <a href="Admin_SupplierManagement.php" class="btn btn-primary py-md-3 px-md-5 mt-2">Check Now</a>
                    </div>
                </div>
                <!--End -->

                <!--Fuel Price Management-->
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                                <i class="fa fa-2x fa-cogs text-secondary"></i>
                            </div>  
                        </div>
                        <h4 class="text-uppercase mb-3">FUEL PRICE</h4>
                        <p class="m-0">Fuel Price Management</p>
                        <a href="Admin_FuelPriceManagement.php" class="btn btn-primary py-md-3 px-md-5 mt-2">Check Now</a>
                    </div>
                </div>
                <!--End -->

                 <!--Fuel Status Management-->
               <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                               <i class="fa fa-2x fa-cogs text-secondary"></i>
                            </div>  
                        </div>
                        <h4 class="text-uppercase mb-3">FUEL STATUS</h4>
                        <p class="m-0">Fuel Status Management</p>
                        <a href="Admin_FuelStatusManagement.php" class="btn btn-primary py-md-3 px-md-5 mt-2">Check Now</a>
                    </div>
                </div>
                <!--End -->

                 <!--Vehical Registration Management-->
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                                <i class="fa fa-2x fa-cogs text-secondary"></i>
                            </div>
                        </div>
                        <h4 class="text-uppercase mb-3">VEHICLE</h4>
                        <p class="m-0">Vehical Registration Management</p>
                        <a href="Admin_VehicleManagement.php" class="btn btn-primary py-md-3 px-md-5 mt-2">Check Now</a>
                    </div>
                </div>
                <!--End -->

                 <!--Vehical Token Management-->
               <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                                <i class="fa fa-2x fa-cogs text-secondary"></i>
                            </div>
                        </div>
                        <h4 class="text-uppercase mb-3">VEHICLE TOKEN</h4>
                        <p class="m-0">Vehical Token Management</p>
                        <a href="Admin_VehicleTokenManagement.php" class="btn btn-primary py-md-3 px-md-5 mt-2">Check Now</a>
                    </div>
                </div>
                <!--End -->

                  <!--Non Vehical Registration Management-->
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                                <i class="fa fa-2x fa-cogs text-secondary"></i>
                            </div>
                        </div>
                        <h4 class="text-uppercase mb-3">NON VEHICLE</h4>
                        <p class="m-0">Non Vehical Registration Management</p>
                        <a href="Admin_NonVehicleManagement.php" class="btn btn-primary py-md-3 px-md-5 mt-2">Check Now</a>
                    </div>
                </div>
                <!--End -->

                 <!--Non Vehical Token Management-->
               <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                                <i class="fa fa-2x fa-cogs text-secondary"></i>
                            </div>
                        </div>
                        <h4 class="text-uppercase mb-3">NON VEHICLE TOKEN</h4>
                        <p class="m-0">Non Vehical Token Management</p>
                        <a href="Admin_NonVehicleTokenManagement.php" class="btn btn-primary py-md-3 px-md-5 mt-2">Check Now</a>
                    </div>
                </div>
                <!--End -->

                 <!--Client Reviews Management-->
               <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                                <i class="fa fa-2x fa-cogs text-secondary"></i>
                            </div>
                        </div>
                        <h4 class="text-uppercase mb-3">COMPLAINTS & FEEDBACK</h4>
                        <p class="m-0">User Feedback Management</p>
                        <a href="#" class="btn btn-primary py-md-3 px-md-5 mt-2">Check Now</a>
                    </div>
                </div>
                <!--End -->

              <!--Client Complaints Management-->
               <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                                <i class="fa fa-2x fa-cogs text-secondary"></i>
                            </div>
                        </div>
                        <h4 class="text-uppercase mb-3">COMPLAINTS & FEEDBACK</h4>
                        <p class="m-0">Fuel Station Complaints Management</p>
                        <a href="#" class="btn btn-primary py-md-3 px-md-5 mt-2">Check Now</a>
                    </div>
                </div>
                <!--End -->

                <!--Public Notices Management-->
               <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                                <i class="fa fa-2x fa-cogs text-secondary"></i>
                            </div>
                        </div>
                        <h4 class="text-uppercase mb-3">PUBLIC NOTICES</h4>
                        <p class="m-0">Public Notices Management</p>
                        <a href="#" class="btn btn-primary py-md-3 px-md-5 mt-2">Check Now</a>
                    </div>
                </div>
                <!--End -->

            </div>
        </div>
    </div>
    <!-- Services End -->
    
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