<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/sign-up.css">
    <title>Booking-App</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <div class="inputs">
                <label for="username">Username: </label>
                <input type="text" name="user" id="username" required>

                <label for="name">Name: </label>
                <input type="text" name="name" id="name" required>

                <label for="surname">Surname: </label>
                <input type="text" name="surname" id="surname" required>

                <label for="email">E-mail: </label>
                <input type="email" name="email" id="email" required>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>

                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" name="confirmPassword" id="confirmPassword" required>
            </div>
            <input type="submit" name="signup" value="Sign Up">
        </form>
        <a href="">already have an account? Log In here!</a>
    </div>
</body>
</html>