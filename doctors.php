<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="billing.css">
    <link rel="stylesheet" href="dashboard.css">
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
                            <div class="title">
                                Doctors
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
                                <td>Specialization</td>
                                <td>Department</td>
                                <td>Phone</td>
                                <td>Email</td>
                                <td>Availability</td>
                                <td>Actions</td>
                            </tr>

                            <tr>
                                <td>
                                    Dr. Emily Chen
                                </td>
                                <td>
                                    Pediatrician
                                </td>
                                <td>
                                    -
                                </td>
                                <td>
                                    +1-555-0102
                                </td>
                                <td>
                                    emily@medicare.test
                                </td>
                                <td>
                                    <div class="status" style="color: rgb(101, 101, 233);">
                                        Mon-Wed 10am-4pm
                                    </div>
                                </td>
                                <td class="edit-delete-icons">
                                    <img src="images/edit.svg" alt="edit image">
                                    <img src="images/bin.svg" alt="bin image">
                                </td>
                            </tr>


                            <tr>
                                <td>
                                    Dr. John Smith
                                </td>
                                <td>
                                    Cardiologist
                                </td>
                                <td>
                                    Cardiology
                                </td>
                                <td>
                                    +1-555-0101
                                </td>
                                <td>
                                    doctor@medicare.test
                                </td>
                                <td>
                                    <div class="status" style="color: rgb(101, 101, 233);">
                                        Mon-Fri 9am-5pm
                                    </div>
                                </td>
                                <td class="edit-delete-icons">
                                    <img src="images/edit.svg" alt="edit image">
                                    <img src="images/bin.svg" alt="bin image">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    khina
                                </td>
                                <td>
                                    cardiology
                                </td>
                                <td>
                                    -
                                </td>
                                <td>
                                    0894646140
                                </td>
                                <td>
                                    khina@email.com
                                </td>
                                <td>
                                    <div class="status" style="background: rgb(223, 255, 223);color:rgb(3, 163, 3);">
                                        available
                                    </div>
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