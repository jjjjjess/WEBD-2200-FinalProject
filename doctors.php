<?php
require("db_connect.php");
session_start();

// Handle form submission for adding new appointment
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_appointment'])) {
    $patient_id = $_POST['patient_id'];
    $dept_id = $_POST['dept_id'];
    $doctor_id = $_POST['doctor_id'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $status = $_POST['status'];
    
    $insert_query = "INSERT INTO appointments (patient_id, dept_id, doctor_id, appointment_date, appointment_time, status) 
                     VALUES ('$patient_id', '$dept_id', '$doctor_id', '$appointment_date', '$appointment_time', '$status')";
    
    if (mysqli_query($conn, $insert_query)) {
        $success_message = "Appointment added successfully!";
    } else {
        $error_message = "Error adding appointment: " . mysqli_error($conn);
    }
}

// Fetch Dr. Khina's doctor ID (user_id = 3)
$khina_query = "SELECT id FROM doctors WHERE user_id = 3";
$khina_result = mysqli_query($conn, $khina_query);
$khina_doctor = mysqli_fetch_assoc($khina_result);
$khina_id = $khina_doctor['id'];

// Fetch only Dr. Khina's appointments
$query = "SELECT a.*, 
          p.name as patient_name, 
          d.name as doctor_name, 
          dep.name as department_name 
          FROM appointments a 
          LEFT JOIN patients p ON a.patient_id = p.id 
          LEFT JOIN doctors d ON a.doctor_id = d.id 
          LEFT JOIN departments dep ON a.dept_id = dep.id 
          WHERE a.doctor_id = $khina_id 
          ORDER BY a.appointment_date DESC, a.appointment_time ASC";
$result = mysqli_query($conn, $query);

// Fetch patients for dropdown
$patients_query = "SELECT id, name FROM patients ORDER BY name";
$patients_result = mysqli_query($conn, $patients_query);

// Fetch departments for dropdown
$departments_query = "SELECT id, name FROM departments ORDER BY name";
$departments_result = mysqli_query($conn, $departments_query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr. Khina's Appointments</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="billing.css">
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        
        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 30px;
            border-radius: 8px;
            width: 500px;
            max-width: 90%;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 10px;
        }
        
        .modal-header h2 {
            margin: 0;
            color: #333;
        }
        
        .close {
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            color: #999;
        }
        
        .close:hover {
            color: #333;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        
        .form-group select,
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }
        
        .form-group select:focus,
        .form-group input:focus {
            outline: none;
            border-color: #2196F3;
        }
        
        .submit-btn {
            background-color: #2196F3;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        
        .submit-btn:hover {
            background-color: #1976D2;
        }
        
        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        /* Status colors */
        .status-scheduled {
            background-color: #4CAF50;
            color: white;
            padding: 4px 12px;
            border-radius: 12px;
            font-weight: bold;
            display: inline-block;
        }
        
        .status-completed {
            background-color: #2196F3;
            color: white;
            padding: 4px 12px;
            border-radius: 12px;
            font-weight: bold;
            display: inline-block;
        }
        
        .status-cancelled {
            background-color: #f44336;
            color: white;
            padding: 4px 12px;
            border-radius: 12px;
            font-weight: bold;
            display: inline-block;
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
                NdataCare
            </div>
            <div class="right">
                <div class="user">
                    Welcome, <?php echo $_SESSION['username']; ?>
                </div>
                <div class="role">
                    <?php echo $_SESSION['role']; ?>
                </div>
            </div>
        </div>

        <div class="bottom-section">
            <div class="left">
                <ul>
                    <?php include('menu.php');?>
                </ul>

                <div class="logout">
                    <button onclick="return confirm('Are you sure you want to log out?')">
                        <div class="icon">
                            <img src="images/logout2.svg" alt="logout icon">
                        </div>
                        <a style="text-decoration: none; color: #1D293D;" href="dashboardLogout.php">Logout</a>
                    </button>
                </div>
            </div>

            <div class="right">
                <?php if (isset($success_message)): ?>
                    <div class="alert alert-success"><?php echo $success_message; ?></div>
                <?php endif; ?>
                
                <?php if (isset($error_message)): ?>
                    <div class="alert alert-error"><?php echo $error_message; ?></div>
                <?php endif; ?>
                
                <div class="stats">
                <div class="card">
                    <div class="card-left">
                        <div class="title">
                            Dr. Khina's Appointments
                        </div>
                    </div>
                    <button class="add-bill" onclick="openModal()">
                        <span>+</span>
                        <span>Add</span>
                    </button>
                </div>
            </div>

                <div class="appointments">

                <div class="table">
                    <table>
                        <tr class="t-header">
                            <td>Patient Name</td>
                            <td>Doctor</td>
                            <td>Department</td>
                            <td>Date</td>
                            <td>Time</td>
                            <td>Status</td>
                        </tr>

                        <?php
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($appointment = mysqli_fetch_assoc($result)) {
                                // Format the date
                                $date = date('M d, Y', strtotime($appointment['appointment_date']));
                                
                                // Set status class
                                $status_class = '';
                                switch($appointment['status']) {
                                    case 'Scheduled':
                                        $status_class = 'status-scheduled';
                                        break;
                                    case 'Completed':
                                        $status_class = 'status-completed';
                                        break;
                                    case 'Cancelled':
                                        $status_class = 'status-cancelled';
                                        break;
                                }
                                ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($appointment['patient_name']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['doctor_name']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['department_name']); ?></td>
                                    <td><?php echo $date; ?></td>
                                    <td><?php echo htmlspecialchars($appointment['appointment_time']); ?></td>
                                    <td><span class="<?php echo $status_class; ?>"><?php echo htmlspecialchars($appointment['status']); ?></span></td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="6" style="text-align: center;">No appointments found for Dr. Khina</td>
                            </tr>
                            <?php
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Add Appointment Modal -->
    <div id="addAppointmentModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Add New Appointment for Dr. Khina</h2>
                <span class="close" onclick="closeModal()">&times;</span>
            </div>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="patient_id">Patient</label>
                    <select id="patient_id" name="patient_id" required>
                        <option value="">Select Patient</option>
                        <?php
                        if ($patients_result && mysqli_num_rows($patients_result) > 0) {
                            mysqli_data_seek($patients_result, 0);
                            while ($patient = mysqli_fetch_assoc($patients_result)) {
                                echo "<option value='" . $patient['id'] . "'>" . htmlspecialchars($patient['name']) . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="dept_id">Department</label>
                    <select id="dept_id" name="dept_id" required>
                        <option value="">Select Department</option>
                        <?php
                        if ($departments_result && mysqli_num_rows($departments_result) > 0) {
                            mysqli_data_seek($departments_result, 0);
                            while ($dept = mysqli_fetch_assoc($departments_result)) {
                                echo "<option value='" . $dept['id'] . "'>" . htmlspecialchars($dept['name']) . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                
                <!-- Hidden field for doctor_id (always Dr. Khina) -->
                <input type="hidden" name="doctor_id" value="<?php echo $khina_id; ?>">
                
                <div class="form-group">
                    <label for="appointment_date">Appointment Date</label>
                    <input type="date" id="appointment_date" name="appointment_date" required>
                </div>
                
                <div class="form-group">
                    <label for="appointment_time">Appointment Time</label>
                    <select id="appointment_time" name="appointment_time" required>
                        <option value="">Select Time</option>
                        <option value="09:00 - 10:00">09:00 - 10:00</option>
                        <option value="10:00 - 11:00">10:00 - 11:00</option>
                        <option value="11:00 - 12:00">11:00 - 12:00</option>
                        <option value="14:00 - 15:00">14:00 - 15:00</option>
                        <option value="15:00 - 16:00">15:00 - 16:00</option>
                        <option value="16:00 - 17:00">16:00 - 17:00</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" required>
                        <option value="Scheduled">Scheduled</option>
                        <option value="Completed">Completed</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>
                </div>
                
                <button type="submit" name="add_appointment" class="submit-btn">Add Appointment</button>
            </form>
        </div>
    </div>
    
    <script>
        function openModal() {
            document.getElementById('addAppointmentModal').style.display = 'block';
        }
        
        function closeModal() {
            document.getElementById('addAppointmentModal').style.display = 'none';
        }
        
        // Close modal when clicking outside of it
        window.onclick = function(event) {
            var modal = document.getElementById('addAppointmentModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
        
        // Hide success/error messages after 5 seconds
        setTimeout(function() {
            var alerts = document.getElementsByClassName('alert');
            for (var i = 0; i < alerts.length; i++) {
                alerts[i].style.display = 'none';
            }
        }, 5000);
    </script>
</body>
</html>
<?php
// Close database connection
mysqli_close($conn);
