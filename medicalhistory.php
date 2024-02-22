<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else
if(isset($_POST['submit']))
  {
    
    $patientid=$_GET['patientid'];
    $bloodpreasure=$_POST['bloodpreasure'];
    $bloodsugar=$_POST['bloodsugar'];
    $weight=$_POST['weight'];
    $temperature=$_POST['temperature'];
   $medprescription=$_POST['medprescription'];
   
 
      $query.=mysqli_query($con, "insert   medicalhisory(PatientID,BloodPressure,BloodSugar,Weight,Temperature,MedicalPres)value('$patientid','$bloodpreasure','$bloodsugar','$weight','$temperature','$medprescription')");
    if ($query) {
    echo '<script>alert("Medicle history has been added.")</script>';
    echo "<script>window.location.href ='manage-patient.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>