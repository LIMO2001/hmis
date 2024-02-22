<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
$hostname='localhost';
$username='root';
$password= '';
$dbname= 'batalion';
$conn=mysqli_connect($hostname, $username,$password, $dbname);

$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$specialist = $_POST["specialist"];
$date = $_POST["date"];
$time = $_POST["time"];
$area = $_POST["area"];
$city = $_POST["city"];
$state = $_POST["state"];
$sql = "INSERT INTO booking (name,phone,email,specialist, date, time,area,state) VALUES ('$name','$phone','$email','$specialist','$date', '$time', '$area','$state')";
   $result=mysqli_query($conn,$sql);
   if($result)
   {
    echo "BOOKING SUCCESSFUL";
    $to = "$email";
$subject = "Test mail";
$message = "Hello! welcome  to our hospital services.";
$from = "dukelimo2001@gmail.com";
$headers = "From: $from";
mail($to,$subject,$message,$headers);
echo "Mail Sent.";
   }
   else{
    echo "Error. Check your inputs";
   }
}
else{
echo "Error";    
}
include 'app.html'
?>