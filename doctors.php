<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors</title>

    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="reports.css">

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
                    Welcome, Dr. Sarah Admin
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
                <div class="doctors">
                    <div class="header">
                        <div class="title">Doctors</div>
                        <button class="add-btn">+ Add</button>
                    </div>

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
                                <td>Dr. Emily Chen</td>
                                <td>Pediatrician</td>
                                <td>—</td>
                                <td>+1-555-0102</td>
                                <td class="email">emily@medicare.test</td>
                                <td>Mon-Wed 10am-4pm</td>
                                <td>
                                    <div class="actions">
                                        <button class="edit">✎</button>
                                        <button class="delete">🗑</button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Dr. John Smith</td>
                                <td>Cardiologist</td>
                                <td>Cardiology</td>
                                <td>+1-555-0101</td>
                                <td class="email">doctor@medicare.test</td>
                                <td>Mon-Fri 9am-5pm</td>
                                <td>
                                    <div class="actions">
                                        <button class="edit">✎</button>
                                        <button class="delete">🗑</button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>khina</td>
                                <td>cardiology</td>
                                <td>—</td>
                                <td>0894646140</td>
                                <td class="email">khina@email.com</td>
                                <td>available</td>
                                <td>
                                    <div class="actions">
                                        <button class="edit">✎</button>
                                        <button class="delete">🗑</button>
                                    </div>
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

