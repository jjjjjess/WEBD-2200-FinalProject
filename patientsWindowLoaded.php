<?php
include('db_connect.php');



header('Content-Type: application/json');

$patients = $conn->query('
    SELECT * FROM patients
    LIMIT 10
');

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