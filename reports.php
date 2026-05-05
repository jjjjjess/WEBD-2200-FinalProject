<?php 

     // require_once('db_connect.php');
    $conn = mysqli_connect('localhost', "root", '', 'hospital_sys',3307);

    // 2. Check if the connection worked
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    #paid total
    $sql_paid = "SELECT SUM(amount) AS paid_total FROM billing WHERE status = 'Paid' ";
    $result = mysqli_query($conn, $sql_paid);
    $row_paid = $result->fetch_assoc();

    #pending total
    $sql_pending = "SELECT SUM(amount) AS pending_total FROM billing WHERE status = 'Pending' ";
    $result = mysqli_query($conn, $sql_pending);
    $row_pending = $result->fetch_assoc();

    #getting appointments

    $sql_appointment = "SELECT 
            p.name AS patient_name,
            dpt.name AS department_name,
            dc.name AS doctor_name,
            a.appointment_date,
            a.appointment_time,
            a.status

            FROM appointments a 
            JOIN departments dpt ON dpt.id = a.dept_id
            JOIN patients p ON p.id = a.patient_id
            JOIN doctors dc ON dc.id = a.doctor_id
            ORDER BY a.appointment_date ASC   
    
    ";

    $result_appointments = mysqli_query($conn, $sql_appointment);
    
    #top revenue services
    $sql_top_revenue_services = "SELECT
        description, SUM(amount) as total
        FROM billing
        WHERE status = 'Paid'
        GROUP BY description
        ORDER BY total DESC
        LIMIT 3
    ";


    $top_revenue_services = mysqli_query($conn, $sql_top_revenue_services);

    #Common diagnosis 
    $sql_common_diagnosis = "SELECT 
        diagnosis, COUNT(*) as total 
        FROM medical_records
        GROUP BY diagnosis
        ORDER BY total DESC
        LIMIT 3
    ";

    $common_diagnosis = mysqli_query($conn, $sql_common_diagnosis);

    #total patients
    $sql_total_patients = "SELECT COUNT(*) AS total_patients FROM patients";
    $total_patients = mysqli_query($conn,$sql_total_patients)->fetch_assoc();

    #admitted patients
    $sql_admitted_patients = "SELECT 
        COUNT(*) AS admitted    
        FROM admissions
        WHERE status = 'Admitted'";
    $admitted_patients = mysqli_query($conn,$sql_admitted_patients)->fetch_assoc();

    #discharged patients
    $sql_discharged_patients = "SELECT 
        COUNT(*) AS discharged
        FROM admissions
        WHERE status = 'Outgoing'";
    $discharged_patients = mysqli_query($conn,$sql_discharged_patients)->fetch_assoc();

    #deseased patients
    $sql_deceased_patients = "SELECT 
        COUNT(*) AS deceased
        FROM admissions
        WHERE status = 'Deceased'";
    $deceased_patients = mysqli_query($conn,$sql_deceased_patients)->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dashboard.css">
    <style>
        .appointments .table tr:hover {
            background-color: unset;
        }
        .appointments .table td {
            border-bottom: unset;         
        }
        .bottom-section .right .stats .card:hover {
            border:1px solid rgb(255, 189, 189);
        }
    </style>
</head>
<body>
     <div class="container">
        <div class="top-section">
            <div class="left">
                <div class="logo">
                    <img src="images/logo1.svg" alt="logo">
                </div>
                MediCare
            </div>
            <div class="right">
                <div class="user">
                    Welcome, Dr. Mike Makina
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
                        </div>
    
                        Logout
                    </button>
                </div>      
            </div>

            <div class="right">
                <div class="stats">
                    <div class="card">
                        <div class="card-left">
                            <div class="title" style="opacity: .8;">
                               Revenue Collected
                            </div>
                            <div class="number" style="color: rgb(3, 163, 3);">
                                K<?= $row_paid['paid_total'] ?>
                            </div>
                        </div>
                    </div>
                  
                    <div class="card">
                        <div class="card-left">
                            <div class="title" style="opacity: .8;">
                               Revenue Pending
                            </div>
                            <div class="number" style="color: #bca510;">
                                K<?= $row_pending['pending_total'] ?>                                
                            </div>
                        </div>
                    </div>
                </div>

                
                <!-- Patient Statistics -->
                <div class="appointments" style="background: rgb(255, 255, 255); 
                    border:1px solid rgb(255, 189, 189);">

                    <div class="title">
                        Patient Statistics
                    </div>

                    <div class="table">
                        <table>
                            <tr>
                                <!-- first card -total patients -->
                                <td>
                                    <div class="stats">
                                        <div class="card">
                                            <div class="card-left">
                                                <div class="title" style="opacity: .8;">
                                                Total Patients
                                                </div>
                                                <div class="number" style="color: rgb(41, 41, 67);">
                                                    <?= $total_patients['total_patients'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <!-- second card admitted Patients -->
                                <td>
                                    <div class="stats"><div class="card">
                                        <div class="card-left">
                                            <div class="title" style="opacity: .8;">
                                                Admitted Patients
                                            </div>
                                            <div class="number" style="color: rgb(3, 0, 174);">
                                               <?= $admitted_patients['admitted'] ?>
                                            </div>
                                        </div>
                                    </div></div>
                                </td>
                            </tr>

                            <!-- second row of cards -->
                            <tr>
                                <!-- first card discharged patients -->
                                <td>
                                     <div class="stats"><div class="card">
                                        <div class="card-left">
                                            <div class="title" style="opacity: .8;">
                                                Discharged Patients
                                            </div>
                                            <div class="number" style="color: rgb(3, 163, 3);">
                                                <?= $discharged_patients['discharged'] ?>
                                            </div>
                                        </div>
                                    </div></div>
                                </td>

                                <!-- second card  -->
                                <td>
                                    <div class="stats"><div class="card">
                                        <div class="card-left">
                                            <div class="title" style="opacity: .8;">
                                                Deseased Patients
                                            </div>
                                            <div class="number" style="color: rgb(215, 6, 6);">
                                                <?= $deceased_patients['deceased'] ?>
                                            </div>
                                        </div>
                                    </div></div>                                       
                                </td>                                    
                            </tr>  

                        </table>                         
                    </div>
                </div>

                <!-- top revenue services table -->
                <div class="appointments" style="background: rgb(217, 253, 224);
                    color:rgb(4, 115, 26); 
                    border:1px solid rgb(4, 115, 26);">

                    <div class="title">
                        Top Revenue Services
                    </div>

                    <div class="table">
                        <table>
                            <tr class="t-header">
                                <td>Service Name</td>
                                <td>Total Amount</td>
                            </tr>
                            <?php if($top_revenue_services->num_rows > 0):?>
                                <?php while($row = $top_revenue_services->fetch_assoc()):?>
                                    <tr>
                                        <td>
                                            <?= $row['description'] ?>
                                        </td>
                                        <td>
                                            K<?= $row['total'] ?>                                            
                                        </td>                                    
                                    </tr>
                                <?php endwhile;?>
                            <?php endif;?>                    
                        </table>                         
                    </div>
                </div>

                <!-- appointments table -->
                <div class="appointments" style="border:1px solid black ">
                    <div class="title">
                        Appointments per Doctor
                    </div>

                    
                    <div class="table">
                        <table>
                            <tr class="t-header">
                                <td>Patient Name</td>
                                <td>Doctor's name</td>
                                <td>Doctor's department</td>
                                <td>Appointment_date</td>
                                <td>Appointment_time</td>
                                <td class="td">Status</td>
                            </tr>
                            <?php if($result_appointments->num_rows > 0):?>
                                <?php while($row = $result_appointments->fetch_assoc()):?>
                                    <tr>
                                        <td>
                                            <?= $row['patient_name'] ?>
                                        </td>
                                        <td>
                                            <?= $row['doctor_name'] ?>                                            
                                        </td>
                                        <td>
                                            <?= $row['department_name']?>                                           
                                        </td>
                                        <td>
                                            <?= substr($row['appointment_date'],0,10) ?>                                            
                                        </td>
                                        <td>
                                            <?= $row['appointment_time'] ?>                                            
                                        </td>
                                        <td>
                                            <?php if($row["status"] === "Completed"):?>
                                                <div class="status" style="color: rgb(6, 204, 45); background:rgb(205, 255, 215);">
                                                    <?= $row["status"]; ?> 
                                                </div>
                                            <?php elseif($row["status"] === "Scheduled"):?>
                                                <div class="status" style="color: rgb(101, 101, 233);">
                                                       <?= $row["status"]; ?> 
                                                </div>
                                            <?php elseif($row["status"] === "Cancelled"):?>
                                                <div class="status" style="color: rgb(193, 30, 8); background:rgb(255, 189, 189);">
                                                       <?= $row["status"]; ?> 
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endwhile;?>
                            <?php endif;?>                    
                        </table>                         
                    </div>
                </div>


                <!-- Common Diagnosis -->
                <div class="appointments" 
                    style="background: rgba(65, 153, 255, 0.055);
                    color:rgba(11, 94, 189, 0.94); 
                    border:1px solid rgba(11, 94, 189, 0.94);">

                    <div class="title">
                        Common Diagnosis
                    </div>

                    <div class="table">
                        <table>
                            <tr class="t-header">
                                <td>Diagnosis</td>
                                <td>Total</td>
                            </tr>
                            <?php if($common_diagnosis->num_rows > 0):?>
                                <?php while($row = $common_diagnosis->fetch_assoc()):?>
                                    <tr>
                                        <td>
                                            <?= $row['diagnosis'] ?>
                                        </td>
                                        <td>
                                            <?= $row['total'] ?>                                            
                                        </td>                                    
                                    </tr>
                                <?php endwhile;?>
                            <?php endif;?>                    
                        </table>                         
                    </div>
                </div>


            </div>
        </div>
</body>
</html>