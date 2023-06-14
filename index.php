<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking-App</title>
</head>
<body>
    <div class="container">
        <nav>
            <?php
                session_start();
                if(isset($_SESSION["username"])){
                    echo "<p>Welcome back,</p>";
                    echo "<a href='./account.php'>{$_SESSION['username']}</a>";
                    echo "<a href='./logout.php'>Log Out</a>";
                }
                else {
                    echo "<a href='./login.php'>Log In</a>";
                    echo "<a href='./signup.php'>Sign Up</a>";
                }
            ?>
        </nav>
        <div class="content">

        </div>
    </div>
</body>
</html>