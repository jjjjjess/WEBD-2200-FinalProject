<?php

$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';

echo '
<li>
    <div class="icon">
        <img src="images/dashboard.svg" alt="dashboard icon">
    </div>
    <a href="dashboard.php">Dashboard</a>
</li>';

if ($role === 'Doctor') {
    echo '
    <li>
        <div class="icon">
            <img src="images/doctors.svg" alt="doctors icon">
        </div>
        <a href="doctors.php">Doctors</a>
    </li>';
}

echo '
<li>
    <div class="icon">
        <img src="images/patients3.svg" alt="patients icon">
    </div>
    <a href="patients.php">Patients</a>
</li>';

if ($role === 'Doctor' || $role === 'Nurse') {
    echo '
    <li>
        <div class="icon">
            <img src="images/records.svg" alt="medical records icon">
        </div>
        <a href="medical_records.php">Medical Records</a>
    </li>';
}

if ($role === 'Doctor') {
    echo '
    <li>
        <div class="icon">
            <img src="images/department.svg" alt="departments icon">
        </div>
        <a href="departments.php">Departments</a>
    </li>';
}

if ($role === 'Doctor' || $role === 'Receptionist') {
    echo '
    <li>
        <div class="icon">
            <img src="images/billing2.svg" alt="billing icon">
        </div>
        <a href="billing.php">Billing</a>
    </li>';
}

if ($role === 'Doctor') {
    echo '
    <li>
        <div class="icon">
            <img src="images/reports.svg" alt="reports icon">
        </div>
        <a href="reports.php">Reports</a>
    </li>';
}

?>