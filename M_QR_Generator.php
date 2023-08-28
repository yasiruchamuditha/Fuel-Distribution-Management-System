
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8">
      <title>QR Code Generator </title>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


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

     <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');
        .container{
            width: 600px;
            height: 550px;
            margin: auto;
            margin-top: 60px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            font-family: 'Montserrat', sans-serif;
            border: 1px solid black;
        
        }
        .header{
            background-color: #5059dced;
            width: 100%;
        }
        .header>div{
            line-height: 60px;
            color: white;
            font-size: 35px;
            text-align: center;
            font-weight: 700;
        }
        .text-field{
            padding: 10px;
            font-size: 16px;
            outline: none;
            border: 1px solid #d8d8d8;
            margin: 10px 20px;
            width: calc(100% - 60px);
            font-family: 'Montserrat', sans-serif;
        }
        .mode{
            margin-left: -16px;
            display: inline-block;
        }
        .mode li{
            list-style: none;
            display: inline-block;
            font-size: 12px;
            background-color: #F0F0F1;
            padding: 4px;
            cursor: pointer;
            margin-left: -4px;
            transition-duration: .1s;
        }
        .mode .active{
            background-color: #5059dced;
            color: white;
            line-height: 22px;
            border-radius: 4px;
        }
        .gen{
            float: right;
            padding: 10px 20px;
            background-color: #5059dced;
            color: white;
            border: 0px;
            border-radius: 4px;
            font-family: 'Montserrat', sans-serif;
            margin-top: 13px;
            margin-right: 20px;
            cursor: pointer;
        }

        h3
        {
            margin: 2px 20px;
        }

        label{
            margin-left: 16px;
            font-size: 12px;
            user-select: none;
            cursor: pointer;
            display: inline-block;
        }
        label span{
            position: relative;
            top: -2px;
        }
        .upload{
            position: relative;
            top: -2px;
            font-size: 12px;
            color: #3641de;
            cursor: pointer;
            display: inline-block;
        }
        .upload:hover{
            text-decoration: underline;
        }
        .file-selector{
            display: none;
        }
        .qr-container{
            width: 100%;
            height: 280px;
            -webkit-box-align: center;
            -webkit-box-pack: center;
            display: -webkit-box;
        }
        .download{
            font-size: 13px;
            margin-left: 20px;
        }
        .download li{
            list-style: none;
            display: inline-block;
            cursor: pointer;
            color: #3641de;
            margin-left: 5px;
        }
        .download li:hover{
            text-decoration: underline;
        }
    </style>
</head>

<body style="background-color: whitesmoke;"> 
 <?php require('navigationBar.php'); 
 /**
 * @author Yasiru
 * contact me : https://linktr.ee/yasiruchamuditha for more information.
 */?>
     <div class="container-fluid">
          <div class="container">
         <div class="header">
            <div>FuelUp QR Code</div>
        </div>
        <h3>Enter Your UserEmail</h3>
        <input type="text" placeholder="UserEmail" name="txtEmail" class="text-field" >
        <ul class="mode">
            <li>Basic</li>
            <li class="active">Medium</li>
            <li>Advance</li>
        </ul>
        <button class="gen" name="btnsubmit">Generate</button>
        <br>
        <label>
            <input type="checkbox" class="checkbox">
            <span>Add Logo</span>
        </label>
        <div class="upload">Custom logo</div>
        <input type="file" class="file-selector" accept=".png, .jpg, .jpeg, .svg">
        <div class="qr-container">Qr Code</div>
        <div class="download">
            <span>Download: </span>
            <li>PNG</li>
            <li>JPG</li>
        </div>
    </div>
</div>
   
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
    <script src="js/qr-code-styling.js"></script>
    <script src="js/scriptnew.js"></script>

</body>

</html>


