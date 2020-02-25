<?php
require_once '../Models/Appointments.php';
require_once '../Models/Patient.php';
include '../form-validation.php';
$errors = [];
$regexdateHour = '/^(\d{2})\.(\d{2})\.(\d{4})\s(\d{2}:\d{2})$/';
if (isset($_POST['addPatientApp'])) {
    if (!empty($_POST['dateHour']) && preg_match($regexdateHour, $_POST['dateHour'])) {
        $dateHour = preg_replace($regexdateHour, '$3-$2-$1 $4', $_POST['dateHour']);
    } else {
        $errors['dateHour'] = 'Veuillez renseigner une date de rendez-vous valide';
    }

    if (count($errors) == 0) {
        $patient = new Patient($firstname, $lastname, $birthdate, $phone, $mail);
        $appointment = new Appointments();
        $appointment->dateHour = $dateHour;
        try {
            $patient->db->beginTransaction();
            $patient->create();
            $appointment->idPatient = $patient->id;
            $appointment->create();
            $appointment->db->commit();
            $success = true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            $appointment->db->rollBack();
        }
    }
}
require_once '../Views/add-patientAppointment.php';
