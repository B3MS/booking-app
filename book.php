<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Styles/sign-up.css">
    <title>Booking-App</title>
</head>
<body>
    <div class="container">
        <?php
            session_start();
            if(!isset($_SESSION["username"])){
                header("Location: ./login.php");
                die();
            }
        ?>
        <form action="./bookHandler.php" method="post">
            <div class="inputs">
                <label for="date">Date: </label>
                <input type="date" name="date" id="date">

                <label for="time">Time: </label>
                <input type="time" name="time" id="time">
            </div>
            <input type="submit" value="Book">
        </form>
    </div>
</body>
</html>