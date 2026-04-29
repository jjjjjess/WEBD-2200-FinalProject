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
                        <li>
                            <div class="icon">
                                <img src="images/dashboard.svg" alt="dashboard icon">
                            </div>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <div class="icon">
                                <img src="" alt="departments icon">
                            </div>
                            <a href="departments.php">Departments</a>
                        </li>
                        <li>
                            <div class="icon">
                                <img src="images/patients3.svg" alt="patients icon">
                            </div>
                            <a href="patients.php">Patients</a>
                        </li>
                        <li>
                            <div class="icon">
                                <img src="images/billing2.svg" alt="patients icon">
                            </div>
                            <a href="billing.php">Billing</a>
                        </li>
                        <li>
                            <div class="icon">
                                <img src="images/reports.svg" alt="patients icon">
                            </div>
                            <a href="reports.php">Reports</a>
                        </li>

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
                                    <td>Visit Date</td>
                                    <td>Time</td>
                                    <td>Actions</td>
                                </tr>

                                <tr>
                                    <td>
                                        Stuart Sindani
                                    </td>
                                    <td>
                                        Dr. Mike Makina
                                    </td>
                                    <td>
                                        Broken hip and UTI
                                    </td>
                                    <td>
                                        2023-01-01
                                    </td>
                                    <td>
                                        10:00
                                    </td>
                                    <td class="edit-delete-icons">
                                        <img src="images/edit.svg" alt="edit image">
                                        <img src="images/bin.svg" alt="bin image">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        John Doe
                                    </td>
                                    <td>
                                        Dr. Mike Makina
                                    </td>
                                    <td>
                                        Malaria
                                    </td>
                                    <td>
                                        2023-01-01
                                    </td>
                                    <td>
                                        10:00
                                    </td>
                                    <td class="edit-delete-icons">
                                        <img src="images/edit.svg" alt="edit image">
                                        <img src="images/bin.svg" alt="bin image">
                                    </td>
                                </tr>
                        
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </body>
</html>