<?php require_once('connection.php');
session_start();
/**
 * @author Yasiru
 * contact me : https://linktr.ee/yasiruchamuditha for more information.
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fuel Up - QR Verification</title>
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
    <!-- css Stylesheet -->
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
    <?php require('navigationBar.php');?>

<div class="container-fluid py-5">
  <h1 class="display-4 text-uppercase text-center mb-5">QR Verification</h1>
  <div class="container mt-3">
    <form action="#" method="post">
      <div class="mt-0">
        <div class="row">

           <div class="col-lg-6">
              <label for="Email" class="form-label">Please Enter User Email</label>
              <input type="email" class="form-control px-3 pt-2" name="txtUserEmail" id="txtUserEmail" placeholder="User Email" required style="font-size: 20px;">
          </div>

          <div class="col">
              <label for="TokenType" class="form-label">Token Type</label>
                <select id="TokenType" name="TokenType" class="form-control" required style="font-size: 20px;">
                  <option selected value="Choose">Choose...</option>
                  <option value="Vehicle">Vehicle</option>
                  <option value="Instrument">Instrument</option>
                </select>
         </div> 

          <div class="col" style="margin-top: 30px;">
            <button type="submit" class="btn btn-outline-primary " name="btnCheck" id="btnSubmit" style="font-size: 20px;">Check</button>
         </div>
      </div>
  </div>
  </form>  
 </div>
</div>

<hr style="color: black;">

<?php
if(isset($_POST["btnCheck"]))
{
    $Email=$_POST["txtUserEmail"];
    $TokenType=$_POST["TokenType"];

    if(empty($Email))
    {
        echo '<script>alert("UserEmail Filed cannot be blank")</script>';
    }
    else
    {
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) 
        {
            echo '<script>alert("Please Enter Valid UserEmail")</script>';    
        }
        else
        {
            if ($TokenType == "Vehicle")
            {
             //perform sql
             $sql = "SELECT * FROM token_vehicle WHERE  Email='$Email' ";
             $result= mysqli_query($con, $sql);
             $num_row = mysqli_num_rows($result);
             if ($num_row >0) 
               { 
                $row = mysqli_fetch_array($result);
                  if($row['Validity'] == 'Valid')
                  {
                        echo '<script>alert("hi")</script>';  
                      //print data
                  echo "<table border=1 width=600px bgcolor=cyan >";
                  echo"<tr>";
                  echo"<th>Registration_No </th>";
                  echo"<th>preferd_Date </th>";
                  echo"<th>preferd_Time </th>";
                  echo"<th>FuelType </th>";
                  echo"<th>Validity </th>";
                  echo"</tr>";

                $Registration_No=$row['Registration_No'];
                $preferd_Date=$row['preferd_Date'];
                $preferd_Time=$row['preferd_Time'];
                $FuelType=$row['FuelType'];
                $Validity=$row['Validity'];
        echo'<tr>
              <th scope="row">'.$Registration_No.'</th>
              <td>'.$preferd_Date.'</td>
              <td>'.$preferd_Time.'</td>
              <td>'.$FuelType.'</td>
              <td>'.$Validity.'</td>
              <td><button class="btn btn-danger" name="btnDelete"><a href="Admin_VehicleManagement.php?deleteid='.$Registration_No.'" class="text-light">Delete</a></button></td>
             </tr>';
                   echo "</table>"; 
                  }
                  else 
                  {
                     echo '<script>alert("Qr is Expired")</script>';
                  }
                }
            }
            else
            {
             //perform sql
             $sql = "SELECT * FROM token_instrument WHERE  Email='$Email' ";
             $result= mysqli_query($con, $sql);
             $num_row = mysqli_num_rows($result);
             if ($num_row >0) 
               { 
                $row=mysqli_fetch_assoc($result);
                  if($row['Validity'] == 'Valid')
                  {
                  //print data
                  echo "<table border=1 width=600px bgcolor=cyan >";
                  echo"<tr>";
                  echo"<th>Registration_No </th>";
                  echo"<th>preferd_Date </th>";
                  echo"<th>preferd_Time </th>";
                  echo"<th>FuelType </th>";
                  echo"<th>Validity </th>";
                  echo"</tr>";

                $Registration_No=$row['Registration_No'];
                $preferd_Date=$row['preferd_Date'];
                $preferd_Time=$row['preferd_Time'];
                $FuelType=$row['FuelType'];
                $Validity=$row['Validity'];
        echo'<tr>
              <th scope="row">'.$Registration_No.'</th>
              <td>'.$preferd_Date.'</td>
              <td>'.$preferd_Time.'</td>
              <td>'.$FuelType.'</td>
              <td>'.$Validity.'</td>
              <td><button class="btn btn-danger" name="btnDelete"><a href="Admin_VehicleManagement.php?deleteid='.$Registration_No.'" class="text-light">Delete</a></button></td>
             </tr>';
                   echo "</table>";
                    
                  }
                  else 
                  {
                    echo '<script>alert("Qr is Expired")</script>';
                  }
                } 
            }
        }
    }
}

?>

<?php
//same form in form data
if(isset($_POST["btnUpdate"]))
{
//accept html from data
$sid=$_POST["txtSID"];
$name=$_POST["txtName"];
$age=$_POST["txtAge"];
$address=$_POST["txtAddress"];

//perform SQL
$sql = "UPDATE tblstudent SET name ='$name',age=$age,address='$address' WHERE sid ='$sid'";

$result =mysqli_query($con,$sql);

echo "No of records Updated:$result";
//disconnect connection
mysqli_close($con);
}
?>
 
 <?php require('footer.php');?>

 <script type="text/javascript">

  const userInput = document.getElementById("txtUserEmail");
  userInput.addEventListener("txtUserEmail", () => {
  userInput.setCustomValidity("");
  userInput.checkValidity();
});

userInput.addEventListener("invalid", () => {
  if (userInput.value === "")
   {
    userInput.setCustomValidity("Enter Users Email !");
    return false;
  }
});
 </script>

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