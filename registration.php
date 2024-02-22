<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
$hostname='localhost';
$username='root';
$password= '';
$dbname= 'batalion';
$conn=mysqli_connect($hostname, $username,$password, $dbname);

$name = $_POST["name"];
$dob = $_POST["dob"];
$idno = $_POST["idno"];
$email = $_POST["email"];
$phoneno = $_POST["phoneno"];
$password = $_POST["password"];
$gender = $_POST["gender"];
$sql = "INSERT INTO registration (name,dob,idno, email, phoneno,password,gender) VALUES ('$name','$dob','$idno','$email', '$phoneno', '$password','$gender')";
   $result=mysqli_query($conn,$sql);
   if($result)
   {
    echo "Registration successful";
    $to = "$email";
$subject = "Test mail";
$message = "Hello! welcome  to our services.";
$from = "someonelse@example.com";
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
include 'registration.html'
?>