<?php 
include 'db_connect.php';

//$output = $conn->query("SELECT * FROM medical_records");

$medical_sql = "SELECT  
                    p.name AS patient_name,
                    d.name AS doctor_name,
                    m.diagnosis,
                    m.treatment,
                    m.recorded_at
                FROM medical_records m
                JOIN patients p ON m.patient_id = p.id
                JOIN doctors d ON m.doctor_id = d.id
                LIMIT 10";

$output = $conn ->query($medical_sql);
                                

?>






<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Departments Page">
        <title>DEPARTMENTS</title>
        <link rel="stylesheet" href="billing.css">
        <link rel="stylesheet" href="dashboard.css">
    </head>
    <body>
        <div class="container">
            <div class="top-section">
                <div class="left">
                    <div class="logo">
                        <img src="images/logo1.svg" alt="logo">Medicare
                    </div>
                </div>
                <div class="right">
                    <div class="user">
                        Welcome
                    </div>
                    <div class="role">
                        Admin
                    </div>
                </div>
            </div>
            <div class="bottom-section">
                <div class="left">
                    <ul>
                       <?php include('menu.php');?>
                    </ul>  

                    <div class="logout">
                        <button>
                            <div class="icon">
                                <img src="images/logout2.svg" alt="logout icon">
                            </div>Logout
                        </button>
                    </div>      
                </div>

                <div class="right">

                    <div class="appointments">
                        <div class="title">
                            Medical Records
                        </div>

                        <div class="table">
                            <table>
                                <tr class="t-header">
                                    <td>Patient</td>
                                    <td>Doctor</td>
                                    <td>Diagnosis</td>
                                    <td>Treated</td>
                                    <td>Visit Date & Time</td>
                                    <td>Actions</td>
                                </tr>
                                    <?php while($row = $output->fetch_assoc()){ ?>
                                <tr>
                                    <td><?php echo $row['patient_name']; ?></td>
                                    <td><?php echo $row['doctor_name']; ?></td>
                                    <td><?php echo $row['diagnosis']; ?></td>
                                    <td><?php echo $row['treatment']; ?></td>
                                    <td><?php echo $row['recorded_at']; ?></td>
                                    <td class="edit-delete-icons">
                                        <img src="images/edit.svg" alt="edit image">
                                        <img src="images/bin.svg" alt="bin image">
                                    </td>
                                </tr>
                                <?php } ?>
                            
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </body>
</html>