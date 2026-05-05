<?php
//Appointment processing code
include('db_connect.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $fullName = mysqli_real_escape_string($conn, $_POST['fname']);
    $dob = mysqli_real_escape_string($conn, $_POST['DOB']);
    $patientId = mysqli_real_escape_string($conn, $_POST['id']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);

    // Insert the appointment into the database
    $sql = "INSERT INTO appointments (full_name, dob, patient_id, department, date, time) 
            VALUES ('$fullName', '$dob', '$patientId', '$department', '$date', '$time')";
    //Messgae to display if the appointment was booked successfully
    if (mysqli_query($conn, $sql)) {
        echo "Appointment booked successfully!";
        header("Location: appointments.php?success=1");
        exit();
        //Message to display if there was an error
    } else {
        echo "Error: " . mysqli_error($conn);
        header("Location: appointments.php?error=1");
        exit();
    }
}
?>