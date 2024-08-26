<?php
include '../Backend/db_config.php';
include '../Backend/MandatoryObject.php';
include '../Backend/WorkDay.php';
include '../Backend/Treatments.php';

try {
    $stmt = $pdo->query("SELECT id,fname,lname,email,profile_image,treatments FROM doctors");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $doctors = [];
    foreach($data as $value){
        $doctor = new Doctor();

        $doctor->setId($value['id']);
        $doctor->setFName($value['fname']);
        $doctor->setLName($value['lname']);
        $doctor->setEmail($value['email']);
        $doctor->setImg($value['profile_image']);
        $doctor->setTreatments($value['treatments']);

        $stmt = $pdo->prepare("SELECT day,start_time,end_time FROM WorkInfo
                            WHERE doctor_id = :id");
        $stmt->bindParam(':id',$value['id']);
        $stmt->execute();
        $days = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $workDays = [];
        foreach ($days as $day) {
            $workDay = new WorkDay($day['day'], $day['start_time'], $day['end_time']);
            $workDays[] = $workDay;
        }
        $doctor->setWorkHours($workDays);

        $stmt = $pdo->prepare("SELECT Treatment,length FROM TreatmentsInfo 
                            WHERE doctor_id = :id");
        $stmt->bindParam(':id',$value['id']);
        $stmt->execute();
        $Treatments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $TreatmentList = [];
        foreach ($Treatments as $Treatment) {
        $x = new Treatment($Treatment['Treatment'], $Treatment['length']);
        $TreatmentList[] = $x;
        }
        $doctor->setTreatments($TreatmentList);

        $doctors[] = $doctor;
    }

    echo json_encode($doctors);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} 