<?php
include('db_connect.php');



header('Content-Type: application/json');

$patients = $conn->query("
SELECT 
    p.id,
    p.name,
    p.gender,
    p.phone,
    p.dob,
    p.address,
    a.status
    
FROM patients p
INNER JOIN admissions a
    ON p.id = a.patient_id

LIMIT 5
");

$arrayedPatients = [];

// for ($i = 1; $i <= $patients->num_rows; $i++){
//     $arrayedPatients[] = $patients[$i];
// };

// foreach($patientData as $patients)

while($row = $patients->fetch_assoc()){
    $arrayedPatients[] = $row;
}

// $data = ["asd","hjfd","shafjd"];

echo json_encode($arrayedPatients);