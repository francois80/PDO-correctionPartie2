<?php
require_once '../Models/Patient.php';
include '../form-validation.php';
if ($isSubmitted && count($errors) == 0) {
    $patient = new Patient($firstname, $lastname, $birthdate, $phone, $mail);
    if($patient->create()){
        echo '<script>alert("patient créé")</script>';
         header('Refresh:'. $sleep .';http://www.pdo-partie2-correction.com/Controllers/liste-patientsController.php');
    }
}
require_once '../Views/addPatient.php';
