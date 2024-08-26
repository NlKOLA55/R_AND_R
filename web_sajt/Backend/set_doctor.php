<?php
require_once '../../Backend/MandatoryObject.php';
require_once '../../Backend/WorkDay.php';

$stmt = $pdo->prepare("SELECT id,fname,lname,email,img,treatmants FROM doctors Where id =:id");
$stmt->bindParam(':id',$doctor_id);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$doctor = new Doctor();

$doctor->setId($result['id']);
$doctor->setFName($result['fname']);
$doctor->setLName($result['lname']);
$doctor->setEmail($result['email']);
$doctor->setImg($result['img']);
$doctor->setMsg($result['msg']);
$doctor->setTreatments($result['treatments']);

$stmt = $pdo->prepare("SELECT day, start_time, end_time FROM workInfo Where id =:id");
$stmt->bindParam(':id',$doctor_id);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$workDays = [];

foreach ($result as $value) {
    $workDay = new WorkDay($value['day'], $value['start_time'], $value['end_time']);
    $workDays[] = $workDay;
}
$doctor->setWorkHours($workDays);
$_SESSION['doctor_loggedin'] = true;
$_SESSION['doctor_email'] = $doctor->getEmail();