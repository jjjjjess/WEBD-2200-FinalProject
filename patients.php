<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients page</title>
                 
        <link rel="stylesheet" href="dashboard.css">
        <link rel="stylesheet" href="billing.css">
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
                    <li>
                        <div class="icon">
                            <img src="images/dashboard.svg" alt="dashboard icon">
                        </div>
                        <a href="dashboard.php">Dashboard</a>
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
                        </div>
    
                        Logout
                    </button>
                </div>      
            </div>

            

            <div class="right">
    
                <div class="stats">
                    <div class="card">
                        <div class="card-left">
                            <div class="title">
                                Patients
                            </div>
                        </div>

                        <button class="add-bill">
                            <span>+</span>
                            <span>Add</span>
                        </button>
                    </div>
                </div>

                <div class="appointments">
               

                    <div class="table">
                        <table>
                            <tr class="t-header">
                                <td>Name</td>
                                <td>Gender</td>
                                <td>DOB</td>
                                <td>Phone</td>
                                <td>Blood</td>
                                <td>Actions</td>
                            </tr>

                            <tr>
                                <td>
                                    Mirriam Moyo
                                </td>
                                <td>
                                    Female
                                </td>
                                <td>
                                    30-09-1990
                                </td>
                                <td>
                                   09988989898
                                </td>
                                <td>
                                    O+
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
                                    Male
                                </td>
                                <td>
                                    15-02-2000
                                </td>
                                <td>
                                    0884529758
                                </td>
                                <td>
                                    AB
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
    </body>
</html>