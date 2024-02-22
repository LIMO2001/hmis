
<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
$hostname='localhost';
$username='root';
$password= '';
$dbname= 'batalion';
$conn=mysqli_connect($hostname, $username,$password, $dbname);

$patientid = $_POST["patientid"];
$bloodpreasure = $_POST["bloodpreasure"];
$bloodsugar = $_POST["bloodsugar"];
$weight = $_POST["weight"];
$temperature = $_POST["temperature"];
$medprescription = $_POST["medprescription"];
$sql = "INSERT INTO diary (patientid,bloodpreasure,bloodsugar,weight, temperature,medprescription,) VALUES ('$patientid','$bloodpreasure','$bloodsugar','$weight', '$temperature', '$medprescription',)";
   $result=mysqli_query($conn,$sql);
  
}
else{
echo "Error";    
}
include 'diabetic.html'
?>