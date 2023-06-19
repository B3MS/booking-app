<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Booking-App</title>
</head>
<body>
    <div class="container">
        <h1>Are you sure you want to delete your account? </br> This action is irreversible</h1>
        <form action="" method="post">
            <div class="inputs">
                <label for="user">Username: </label>
                <input type="text" name="user" id="user" required>

                <label for="password">Password: </label>
                <input type="password" name="password" id="password" required>
            </div>
            <input type="submit" name="deleteAccount" value="Delete Account">
        </form>
    </div>
</body>
</html>