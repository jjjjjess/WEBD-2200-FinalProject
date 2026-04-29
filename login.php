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
            <img alt="Hopspital animation" src="images\logo.svg">
            <h1>MEDICARE</h1>
            <h3>Treating our patients with love and care</h3>
        </div>
        <div id="form_container">
            <form method="POST">
                
                   
                    <label for="userid">Email</label><br>
                    <input id="userid" type="email" name="userid" title="Please ensure your email contains the company domain '@nthanzi.mw'" placeholder="example@nthanzi.mw" required><br> <!--validation not yet set to regex.pattern="^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$" might not use it-->
                    <label for="passcode">password</label><br>
                    <input type="password" id="passcode" name="passcode" required minlength="12"><br><br>
                    <button type="submit" id="submit" name="submit">sign in</button>
                
            </form>
        </div>
    </div>
</body>
</html>
