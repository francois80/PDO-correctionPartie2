<?php
session_start();
require_once '../Models/Patient.php';
require_once '../Models/Appointments.php';
$patient = new Patient();
$appointment = new Appointments();
if (isset($_GET['idPatient'])) {
  if (!filter_input(INPUT_GET, 'idPatient', FILTER_VALIDATE_INT) || $_GET['idPatient'] <= 0) {
    header('Location: liste-patientsController.php');
    exit();
  }
  $patient->id = (int) $_GET['idPatient'];
  $patient->getOneById();
  $appointment->idPatient = $patient->id;
  try {
    $patient->db->beginTransaction();
    $appointment->deletePatientAppointment();
    $patient->delete();
    $appointment->db->commit();
    $_SESSION['deletePatient']['success'] = true;
    $_SESSION['deletePatient']['name'] = $patient->firstname. ' '. $patient->lastname;
  } catch (PDOException $e){
    $appointment->db->rollBack();
    $_SESSION['deletePatient']['success'] = false;
  }
  header('Location: liste-patientsController.php');
  exit();
}