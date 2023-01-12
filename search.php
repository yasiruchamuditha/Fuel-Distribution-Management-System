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

//print data
echo "<table  width=100% bgcolor=whitesmoke >";
echo"<tr>";
echo"<th >Registration_No </th>";
echo"<th>Station_Name </th>";
echo"<th>Updated_Date </th>";
echo"<th>Updated_Time </th>";
echo"<th>Petrol_92 </th>";
echo"<th>Petrol_95 </th>";
echo"<th>Diesel </th>";
echo"<th>Super_Diesel </th>";
echo"<th>Kerosine_Oil </th>";
echo"<th>Industrial_Kerosine_Oil </th>";
echo"</tr>";




while ($row = mysqli_fetch_array($result))
 {
echo "<tr>";
echo "<td> $row[0] <br>";
echo "<td> $row[1] <br>";
echo "<td> $row[2] <br>";
echo "<td> $row[3] <br>";
echo "<td> $row[4] <br>";
echo "<td> $row[5] <br>";
echo "<td> $row[6] <br>";
echo "<td> $row[7] <br>";
echo "<td> $row[8] <br>";
echo "<td> $row[9] <br>";
echo"</tr>";
}

echo "</table>";
//disconnect 
mysqli_close($con);

}

?>