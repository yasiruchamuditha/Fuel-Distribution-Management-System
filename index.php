<!doctype html>
<html lang="en">
  <head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="refresh" content="120;url=index.php">
    <title>Fuelup</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4874d070ea.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
  </head>
  <body>
     <div class="container-fluid px-0">
   <!-- Topbar Start -->
        <div class="container-fluid py-3 px-lg-5 px-sm-2 d-block" style="background: #1C1E32;">
        <div class="row">
            <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class=" text-light pr-3" href="tel:0123456789"><i class="fa fa-phone-alt mr-2"></i>0123456789</a>
                    <span class="text-light">||</span>
                    <a class="text-light px-3" href="mailto:fuelupgroup@gmail.com"><i class="fa fa-envelope mr-2"></i>fuelupgroup@gmail.com</a>
                    <span class="text-light">||</span>
                    <a class="text-light px-3" href="#" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <span class="text-light">||</span>
                    <a class="text-light px-3" href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-light px-3" href="M_User_Login.php">
                        <i class="fa-solid fa-right-to-bracket"></i> Log In
                    </a>
                </div>
            </div>
        </div>
    </div>
  <!-- Topbar End -->
  <!--navigation bar start-->
    <div class="container-fluid  position-relative nav-bar p-0" style="height:100px; background: #F77D0A;font-family:Oswald ;">
      <div class="position-relative px-lg-5" style="z-index: 9;" style="height:100px ;">
          <nav class="navbar navbar-expand-lg  navbar-dark py-3 py-lg-0 pl-3 pl-lg-5" style="height:100px; background: #2B2E4A;">
              <a href="index.php" class="navbar-brand">
                  <h1 class="text-uppercase  font-weight-bold mb-1" style="color: #F77D0A; font-size: 45px;">FUELUP</h1>
              </a>
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                  <div class="navbar-nav ml-auto py-0 px-3  ">
                      <a href="index.php" class="nav-item nav-link px-3 text-light" style="font-size: 20px;">Home</a>
                      <a href="U_About.php" class="nav-item nav-link px-3 text-light"  style="font-size: 20px;">About Us</a>
                      <a href="U_Service.php" class="nav-item nav-link px-3 text-light"  style="font-size: 20px;">Services</a>
                      <a href="U_Contact.php" class="nav-item nav-link px-3 text-light"  style="font-size: 20px;">Contact Us</a>
                      <a href="U_Review.php" class="nav-item nav-link px-3 text-light"  style="font-size: 20px;">Reviews</a>
                      <a href="U_My_Account.php" class="nav-item nav-link px-3 text-light"  style="font-size: 20px;">My Account</a>
                  </div>
              </div>
          </nav>
      </div>
  </div>
  <!--navigation bar end--> 
  <!--slider start-->
  <div id="carouselExampleIndicators" class="carousel slide  pt-0" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" >
        <div class="carousel-item active">
          <img class="d-block w-100" src="img/indexSlider/a.jpg" alt="First slide">
          <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" >
             <div class="p-3" style="max-width: 900px;">
               <h1 class="display-1 text-white font-weight-bold mb-md-4">Fuel Status</h1>
                <h4 class="text-white text-uppercase font-weight-bold mb-md-3">Best Place To Find Fuel Status Of Nearest Fuel Station</h4>
                <a href="S_Fuel_Status_Search.php" class="btn btn-primary  py-md-3 px-md-5 mt-2">Check Now</a>
             </div>
          </div> 
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="img/indexSlider/b.jpg" alt="Second slide">
             <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" >
             <div class="p-3" style="max-width: 900px;">
               <h1 class="display-1 text-white font-weight-bold mb-md-4">Fuel Token</h1>
                <h4 class="text-white text-uppercase font-weight-bold mb-md-3">Reserve Your Vehicle Fuel Token From Here</h4>
                <a href="S_Token_Creation_Vehicle.php" class="btn btn-primary py-md-3 px-md-5 mt-2">Reserve Now</a>
             </div>
          </div> 
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="img/indexSlider/c.jpg" alt="Second slide">
             <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" >
             <div class="p-3" style="max-width: 900px;">
               <h1 class="display-1 text-white font-weight-bold mb-md-4">Fuel Token</h1>
                <h4 class="text-white text-uppercase font-weight-bold mb-md-3">Reserve Your Instrument Fuel Token From Here</h4>
                <a href="S_Token_Creation_Instrument.php" class="btn btn-primary py-md-3 px-md-5 mt-2">Reserve Now</a>
             </div>
          </div> 
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="img/indexSlider/d.jpg" alt="Second slide">
             <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" >
             <div class="p-3" style="max-width: 900px;">
               <h1 class="display-1 text-white font-weight-bold mb-md-4">Fuel Price</h1>
                <h4 class="text-white text-uppercase font-weight-bold mb-md-3">You Can Get Latest Fuel Price in Sri Lanka</h4>
                <a href="S_Fuel_Price.php" class="btn btn-primary py-md-3 px-md-5 mt-2">Click Here</a>
             </div>
          </div> 
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="img/indexSlider/e.jpg" alt="Third slide">
             <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" >
             <div class="p-3" style="max-width: 900px;">
               <h1 class="display-1 text-white font-weight-bold mb-md-4">FuelUp Account</h1>
                <h4 class="text-white text-uppercase font-weight-bold mb-md-3">Create Your Free Fuel Up Account To Explore More About Us</h4>
                <a href="M_User_SignUp.php" class="btn btn-primary py-md-3 px-md-5 mt-2">Create Now</a>
             </div>
          </div> 
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="img/indexSlider/f.jpg" alt="Third slide">
             <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" >
             <div class="p-3" style="max-width: 900px;">
               <h1 class="display-1 text-white font-weight-bold mb-md-4">Latest News </h1>
                <h4 class="text-white text-uppercase font-weight-bold mb-md-3">You Can Get Latest News About Fuel From Government </h4>
                <a href="fuelNews.php" class="btn btn-primary py-md-3 px-md-5 mt-2">Click Here</a>
             </div>
          </div> 
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
 <!--slider end-->
  <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-1 text-primary text-center"></h1>
            <h1 class="display-4 text-uppercase text-center font-weight-bold mb-5">Welcome To <span  style="color: #F77D0A;">Fuelup</span></h1>
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <img class="w-75 mb-4" src="img/about.png" alt="About us Image">
                    <p style="color: black;">This Websites helps to Find Fuel Status based on your location.<br>
                        User Can Find Current Fuel Prices in Sri Lanka.<br>
                        User Can Find Fuel Station based on location.<br>
                        User Can create Token For Fuel Avaliablity.</p>  
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-4 mb-2">
                    <div class="d-flex align-items-center text-white bg-dark p-4 mb-4" style="height: 150px;">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 ml-n4 mr-4" style="width: 100px; height: 100px; background:#F77D0A;">
                            <i class="fa fa-2x fa-headset text-dark"></i>
                        </div>
                        <h4 class="text-uppercase m-0">24/7 Support</h4>
                    </div>
                </div>
                <div class="col-lg-4 mb-2">
                    <div class="d-flex align-items-center text-white bg-dark p-4 mb-4" style="height: 150px;">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 ml-n4 mr-4" style="width: 100px; height: 100px; background:#F77D0A;">
                            <i class="fa fa-2x fa-car text-dark"></i>
                        </div>
                        <h4 class="text-light text-uppercase m-0">Reserve Your Fuel Token</h4>
                    </div>
                </div>
                <div class="col-lg-4 mb-2">
                    <div class="d-flex align-items-center text-white bg-dark p-4 mb-4" style="height: 150px;">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0  ml-n4 mr-4" style="width: 100px; height: 100px;background:#F77D0A;">
                            <i class="fa fa-2x fa-map-marker-alt text-dark"></i>
                        </div>
                        <h4 class="text-uppercase m-0">Find Fuel Status Of Nearest Fuel Station</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- About End -->
<!-- Services Start -->
<div class="container-fluid py-5">
  <div class="container pt-5 pb-3">
     <h1 class="display-1 text-primary text-center"></h1>
     <h1 class="display-4 text-uppercase text-center font-weight-bold mb-5">Our Services</h1>
     <div class="row" >
        <div class="col-sm-6 pt-2 pb-2">
            <div class="card">
              <img class="card-img-top" src="img/about.png" alt="Card image cap">
                  <div class="card-body">
                     <h5 class="card-title">Fuel Prices</h5>
                     <p class="card-text">You can Find Latest Fuel Price in Sri Lanka</p>
                     <a href="S_Fuel_Price.php" class="btn btn-primary">Check Now</a>
                  </div>
            </div>
        </div>
 
        <div class="col-sm-6  pt-2 pb-2">
           <div class="card">
             <img class="card-img-top" src="img/about.png" alt="Card image cap">
                 <div class="card-body">
                    <h5 class="card-title">Fuel Status</h5>
                    <p class="card-text">You can Find Latest Fuel Status of Fuel Stations in Sri Lanka</p>
                    <a href="S_Fuel_Status_Search.php" class="btn btn-primary">Check Now</a>
                 </div>
           </div>
        </div>
     </div>

      <div class="row mt-3" >
        <div class="col-sm-6  pt-2 pb-2">
            <div class="card">
              <img class="card-img-top" src="img/about.png" alt="Card image cap">
                  <div class="card-body">
                     <h5 class="card-title">Fuel Token</h5>
                     <p class="card-text">You can Reserve Your Fuel Token From Your Nearest Station</p>
                     <a href="M_User_Login.php" class="btn btn-primary">Click Here</a>
                  </div>
            </div>
        </div>

        <div class="col-sm-6  pt-2 pb-2">
           <div class="card">
             <img class="card-img-top" src="img/about.png" alt="Card image cap">
                 <div class="card-body">
                    <h5 class="card-title">Fuel News</h5>
                    <p class="card-text">You can Find Latest News About Fuel in Sri Lanka</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                 </div>
           </div>
        </div>
     </div>
  </div>
</div>
<!-- Services End -->
<!-- Banner Start -->
        <div class="container py-5  pt-5 pb-5">
            <div class="row mx-0">

                <div class="col-lg-6 px-0">
                       <div class="pl-0 pr-5 bg-dark d-flex align-items-center justify-content-between" style="height: 350px;">
                          <img class="img-fluid flex-shrink-0 ml-n5 w-50 mr-4" src="img/banner-left.png" alt="">
                        <div class="text-right">
                            <h3 class="text-uppercase text-light mb-5">Sign Up AS Normal User</h3>
                            <p class="mb-4 text-light">Can Create Fuel Tokens For Your Vehicle or Instruments</p>
                            <a class="btn btn-primary py-2 px-4" href="M_User_SignUp.php">Start Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 px-0">
                    <div class="pl-5 pr-0 bg-dark d-flex align-items-center justify-content-between" style="height: 350px;">
                        <div class="text-left">
                            <h3 class="text-uppercase text-light mb-5">Sign Up AS Fuel Station</h3>
                            <p class="mb-4 text-light">You Can Spread Your Bussiness & Can Get Free Marketing</p>
                            <a class="btn btn-primary py-2 px-4" href="M_User_SignUp.php">Start Now</a>
                        </div>
                        <img class="img-fluid flex-shrink-0 mr-n5 w-50 ml-4" src="img/banner-right.png" alt="">
                    </div>
                </div>

            </div>
        </div>

    <!-- Banner End -->
    <!-- search bar-->
    <div class="container py-5" id="sectionSearch" style="background-color: white; height: 250px;">
      <h1 class="display-4 text-uppercase text-center font-weight-bold mb-5">Find  nearest  Fuel  Station</h1>
        <div class="search">
        <form action="#sectionSearch" method="post" name="frmsearch">
        <div class="row">
        <div class="col-md-8">  
         <select class="form-control py-2 px-2  my-3" name="City" style="font-size: 35px; font-family: agency fb; font-weight: bold; padding-left: auto;padding-right: auto; margin-left: auto; height: 70px;  ">
             <option selected value="Choose">Nearest City</option>
             <option value="Ampara">Ampara</option>
             <option value="Anuradhapura">Anuradhapura</option>
             <option value="Badulla">Badulla</option>
             <option value="Batticalo">Batticalo</option>
             <option value="Colombo">Colombo</option>
             <option value="Galle">Galle</option>
             <option value="Gampaha">Gampaha</option>
             <option value="Hambantota">Hambantota</option>
             <option value="Jaffna">Jaffna</option>
             <option value="Kalutara">Kalutara</option>
             <option value="Kandy">Kandy</option>
             <option value="Kegalle">Kegalle</option>
             <option value="Kilinochchi">Kilinochchi</option>
             <option value="Kurunegala">Kurunegala</option>
             <option value="Mannar">Mannar</option>
             <option value="Matale">Matale</option>
             <option value="Matara">Matara</option>
             <option value="Monaragala">Monaragala</option>
             <option value="Mullaitivu">Mullaitivu</option>
             <option value="NuwaraEliya">Nuwara Eliya</option>
             <option value="Polonnaruwa">Polonnaruwa</option>
             <option value="Puttalam">Puttalam</option>
             <option value="Ratnapura">Ratnapura</option>
             <option value="Trincomalee">Trincomalee</option>
             <option value="Vavniya">Vavniya</option>
          </select>  
      </div>

      <div class="col-md-3">
          <button type="submit" class="btn btn-outline-primary btn-lg py-2 px-5  my-3 ml-5" name="btnSubmit" style="--bs-btn-padding-y: 15px; --bs-btn-padding-x: 15px; padding-top: 10px; padding-bottom: 10px; padding-right: 50px; padding-left: 50px;  font-size: 30px;">Search</button>
      </div>
  </div>
    </form>
</div>
</div>


 <?php require_once('connection.php');
  
if(isset($_POST["btnSubmit"]))
{
$City=$_POST["City"];

//perform sql
$sql = "SELECT  fuel_station_registration.Registration_No,fuel_station_registration.Station_Name,fuel_status.Updated_Date,fuel_status.Updated_Time,fuel_status.Petrol_92,fuel_status.Petrol_95,fuel_status.Diesel,fuel_status.Super_Diesel,fuel_status.Kerosine_Oil,fuel_status.Industrial_Kerosine_Oil
from fuel_station_registration 
INNER JOIN fuel_status 
on fuel_station_registration.Registration_No=fuel_status.Registration_No where fuel_station_registration.City='$City'";

$result = mysqli_query($con, $sql);
$num_row = mysqli_num_rows($result);

if ($num_row > 0) 
{

//print data
echo "<table style=\"border: 2px solid black; text-align:center; width:98%; background-Color:lightsmoke;margin-left: 15px;margin-top: 300px;font-size: 20px;\">";
echo"<tr>";
echo"<th style=\"height:100px;color:black;\">Registration No </th>";
echo"<th style=\"height:100px;color:black;\">Station Name </th>";
echo"<th style=\"height:100px;color:black;\">Updated Date </th>";
echo"<th style=\"height:100px;color:black;\">Updated Time </th>";
echo"<th style=\"height:100px;color:black;\">Petrol 92 </th>";
echo"<th style=\"height:100px;color:black;\">Petrol 95 </th>";
echo"<th style=\"height:100px;color:black;\">Diesel </th>";
echo"<th style=\"height:100px;color:black;\">Super Diesel </th>";
echo"<th style=\"height:100px;color:black;\">Kerosine Oil </th>";
echo"<th style=\"height:100px;color:black;\">Industrial Kerosine Oil </th>";
echo"</tr>";

while ($row = mysqli_fetch_array($result))
 {
echo "<tr>";
echo "<td> $row[0] <br>";
echo "<td> $row[1] <br>";
echo "<td> $row[2] <br>";
echo "<td> $row[3] <br>";
echo "<td> $row[4] L<br>";
echo "<td> $row[5] L<br>";
echo "<td> $row[6] L<br>";
echo "<td> $row[7] L<br>";
echo "<td> $row[8] L<br>";
echo "<td> $row[9] L<br>";
echo"</tr>";
}

echo "</table>";
//disconnect 
mysqli_close($con);
}
else
{
    echo "<h3 style=\" font-size: 30px;color:black; text-align: center; margin-top: 300px;\">No Sutable Result...</h3>";
}

}
?> 

  <!-- Footer Start -->
   <div class="container-fluid  py-2 px-sm-3 px-md-5" style="margin-top: 800px; background: #2B2E4A;">
        <div class="row pt-5">
            
            <div class="col-lg-6 col-md-6 mb-2">
                <h4 class="text-uppercase text-light mb-4">Get In Touch</h4>
                <p class="mb-2 ml-1 text-white"><i class="fa fa-map-marker-alt text-white mr-3"></i><a class=" text-white pr-3" href="#" target="_blank">No.132, Beach Road,Galle,80000,Sri Lanka</a></p>

                <p class="mb-2"><i class="fa fa-phone-alt text-white mr-3"></i><a class=" text-white pr-3" href="tel:0123456789">0764716214</a></p>

                <p class="mb-5"><i class="fa fa-envelope text-white mr-3"></i><a class=" text-white pr-3" href="mailto:fuelupgroup@gmail.com">fuelupgroup@gmail.com</a></p>

                <h6 class="text-uppercase text-white py-2">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Usefull Links</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Private Policy</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Term & Conditions</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>New Member Registration</a>  
                </div>
            </div>  
        </div>
    </div>

    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #1C1E32;">
    <p class="mb-2 text-center text-light">&copy; <a href="#">www.fuelup.com</a>. All Rights Reserved.</p>   
    </div>
    <!-- Footer End -->

  <?php require('M_Back_To_Top.php');?>

</div>
  </body>
</html>



