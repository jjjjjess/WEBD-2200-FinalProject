<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="log_in.css">
</head>
<body>
    <div id="page">
        <div id="head_container">
            <img alt="Hopspital animation" src="images/hospital_svgrepo_com.svg">
            <h1>NTHANZI HOSPITAL</h1>
            <h3>Treating our patients with love and care</h3>
        </div>
        <div id="form_container">
            <form method="POST">
                
                    <!-- <legend></legend> -->
                    <label for="userid">Email</label><br>
                    <input id="userid" type="text" name="userid" placeholder="example@nthanzi.mw" pattern="^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$" required><br> <!--yet to add pattern that only allows sub domain email adresses-->
                    <label for="passcode">password</label><br>
                    <input type="password" id="passcode" name="passcode" required><br><br>
                    <button type="submit" id="submit" name="submit">sign in</button>
                
            </form>
        </div>
    </div>
</body>
</html>
