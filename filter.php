<?php

include('db_connect.php');

header('Content-Type: application/json');


$data = json_decode(file_get_contents("php://input"), true);

$filteredPatients = [];

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
    WHERE a.status = '$data'
    ORDER BY a.status ASC
");

while($row = $patients->fetch_assoc()){
    $filteredPatients[] = $row;
}

echo json_encode($filteredPatients);


