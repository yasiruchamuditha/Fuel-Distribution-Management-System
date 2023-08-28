<?php //navigation bar
/**
 * @author Yasiru
 * contact me : https://linktr.ee/yasiruchamuditha for more information.
 */?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>navigation bar </title>
</head>
<body>
 <!-- Topbar Start -->
          <div class="container-fluid bg-dark py-3 px-lg-5 d-none d-lg-block">
        <div class="row">
            <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class=" text-light pr-3" href="#"><i class="fa fa-phone-alt mr-2"></i>0123456789</a>
                    <span class="text-body">||</span>
                    <a class="text-light px-3" href="#"><i class="fa fa-envelope mr-2"></i>info@example.com</a>
                    <span class="text-body">||</span>
                    <a class="text-light px-3" href="#" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <span class="text-body">||</span>
                    <a class="text-light px-3" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-light px-3" href="User_Login.php">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>User
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
  <div class="container-fluid  position-relative nav-bar p-0">
        <div class="position-relative bg-primary px-lg-5" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="index.php" class="navbar-brand">
                    <h1 class="text-uppercase text-primary mb-1">FUELUP</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="U_About.php" class="nav-item nav-link">About Us</a>
                        <a href="U_Service.php" class="nav-item nav-link">Services</a>
                        <a href="U_Contact.php" class="nav-item nav-link">Contact Us</a>
                        <a href="U_Review.php" class="nav-item nav-link">Reviews</a>
                        <a href="U_My_Account.php" class="nav-item nav-link">My Account</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
</body>
</html>


