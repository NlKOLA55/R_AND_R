<?php
header('Content-Type: application/json');

include '../db_config.php';

session_start();

// Get the form data
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($email) || empty($password)){
    echo json_encode(['success' => false, 'message' => 'Not all requierd elements are filled in']);
    exit;
} 
try {
    //Check if email exists
    $stmt = $pdo->prepare('SELECT id, password FROM doctors WHERE email = :email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        if ($result['password'] === hash('sha256',$password)){
            $doctor_id = $result['id'];
            $login_date = date('Y-m-d');
            $login_time = date('H:i:s');

            //Store the information
            $stmt = $pdo->prepare('INSERT INTO doctor_logins (doctor_id, login_date, login_time) VALUES (:doctor_id, :login_date, :login_time)');
            $stmt->bindParam(':doctor_id', $doctor_id);
            $stmt->bindParam(':login_date', $login_date);
            $stmt->bindParam(':login_time', $login_time);
            $stmt->execute();
            
            //Create Object Doctor
            require_once '../../Backend/MandatoryObject.php';
            require_once '../../Backend/WorkDay.php';

            //Get Doctor info
            $stmt = $pdo->prepare("SELECT id,fname,lname,email,profile_image,msg,treatments FROM doctors Where id =:id");
            $stmt->bindParam(':id',$doctor_id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $doctor = new Doctor();
            $doctor->setId($result['id']);
            $doctor->setFName($result['fname']);
            $doctor->setLName($result['lname']);
            $doctor->setEmail($result['email']);
            $doctor->setImg($result['profile_image']);
            $doctor->setMsg($result['msg']);
            $doctor->setTreatments($result['treatments']); 

            //Get Work hours for Doctor
            $stmt = $pdo->prepare("SELECT day, start_time, end_time FROM workInfo Where doctor_id =:id");
            $stmt->bindParam(':id',$doctor_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $workDays = [];

            foreach ($result as $value) {
                $workDay = new WorkDay($value['day'], $value['start_time'], $value['end_time']);
                $workDays[] = $workDay;
            }
            $doctor->setWorkHours($workDays);

            $stmt = $pdo->prepare("SELECT treatment, length FROM treatmentsinfo 
                                Where doctor_id =:id");
            $stmt->bindparam(':id', $doctor_id);
            $stmt->execute(); 
            $treatmentList = [];
            foreach ($treatments as $key => $value) {
                if(!empty($value)){
                    $treatment = new Treatment($key, $value);
                    $treatmentList[] = $treatment;
                }
            }
            $doctor->setTreatments($treatmentList);
            $_SESSION['doctor'] = $doctor;
            $_SESSION['doctor_loggedin'] = true;
            $_SESSION['doctor_email'] = $doctor->getEmail();


            echo json_encode(['success' => true, 'message' => 'Login recorded successfully.']);
            
        }else{
            echo json_encode(['success' => false, 'message' => 'Incorect password.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Doctor not found.']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}