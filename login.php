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
        <?php
            session_start();
            if(isset($_SESSION["username"])){
                header("Location: ./index.php");
                die();
            }
            if(isset($_SESSION["errorMessage"])){
                echo "<div class='error'>" . $_SESSION['errorMessage'] . "</div>";
                unset($_SESSION['errorMessage']);
            }
        ?>
        <form action="./loginHandler.php" method="post">
            <div class="inputs">
                <label for="username">Username: </label>
                <input type="text" name="username" id="username" required>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <input type="submit" value="Log In">
        </form>
    </div>
</body>
</html>