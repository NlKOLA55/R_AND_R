<?php
header('Content-Type: application/json');

include '../db_config.php';
require_once '../Backend/MandatoryObject.php';
require_once '../Backend/WorkDay.php';
require_once '../Backend/Treatment.php';


session_start();    
// Get the form data
$id = $_POST['id'] ?? '';

try {
    $stmt = $pdo->prepare("SELECT fname, lname, password FROM doctors WHERE id = :id");
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}

$fname = $_POST['changeName'] ?? '';
if (empty($fname)) {
    $fname = $result['fname'];
}

$lname = $_POST['changeLastName'] ?? '';
if (empty($lname)) {
    $lname = $result['lname'];
}

$password = $_POST['passwordChange'] ?? '';
if (!empty($password)){
    $password = hash('sha256',$password);
}else{
    $password = $result['password'];
}

$daysOfWeek = [
    'Monday' => explode(",",$_POST['Monday']),
    'Tuesday' => explode(",",$_POST['Tuesday']),
    'Wednesday' =>explode(",",$_POST['Wednesday']),
    'Thursday' => explode(",",$_POST['Thursday']),
    'Friday' => explode(",",$_POST['Friday']),
    'Saturday' => explode(",",$_POST['Saturday']),
    'Sunday' => explode(",",$_POST['Sunday'])
];
$treatments =[
    'Dental restoration'=>$_POST['Dental_restoration'] ?? '',
    'Dental implant'=>$_POST['Dental_implant'] ?? '',
    'Dental extraction'=>$_POST['Dental_extraction'] ?? '',
    'Dental braces'=>$_POST['Dental_braces'] ?? ''
];
try {
    $stmt = $pdo->prepare("UPDATE doctors
                           SET fname = :fname, lname =:lname, password = :password
                           WHERE id = :id;");
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    foreach ($daysOfWeek as $day => $value) {
        $stmt = $pdo->prepare("UPDATE workinfo
                            SET start_time = :start_time, end_time = :end_time
                            WHERE doctor_id = :doctor_id AND day = :day;");
        $stmt->bindParam(':start_time',$value[0]);
        $stmt->bindParam(':end_time',$value[1]);
        $stmt->bindParam(':doctor_id', $id);
        $stmt->bindParam(':day',  $day);
        $stmt->execute();
    }

    $stmt = $pdo->prepare("DELETE FROM treatmentsinfo WHERE doctor_id =:doctor_id;");
    $stmt->bindparam(':doctor_id', $id);
    $stmt->execute();
    foreach($treatments as $treatment => $value) {
        if(!empty($value)){
            $stmt = $pdo->prepare("INSERT INTO treatmentsinfo
                                (doctor_id, treatment, length)
                                VALUES(:doctor_id, :treatment, :length);");
            $stmt->bindparam(':doctor_id', $id);
            $stmt->bindparam(':treatment', $treatment);
            $stmt->bindparam(':length', $value); 
            $stmt->execute(); 
        }
    }

    $doctor = $_SESSION['doctor'];
    $doctor->setFName($fname);
    $doctor->setLName($lname);
    foreach ($daysOfWeek as $day => $value) {
        $workDay = new WorkDay($day, $value[0], $value[1]);
        $workDays[] = $workDay;
    }
    $doctor->setWorkHours($workDays);
    foreach ($treatments as $key => $value) {
        if(!empty($value)){
            $treatment = new Treatment($key, $value);
            $treatmentList[] = $treatment;
        }
    }
    $doctor->setTreatments($treatmentList);
    //$doctor->setImg($result['profile_image']);
    //$doctor->setMsg($result['msg']);
    $_SESSION['doctor'] = $doctor;

    echo json_encode(['success' => true, 'message' => 'Changes saved properly']);

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}