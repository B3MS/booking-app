<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <div class="content">
            <div class="info">
                <div class="username"><?= $_SESSION['username'] ?></div>
            </div>
            <div class="bookings">
                <?php
                    require "./database_connect.php";
                    $username = $_SESSION['username'];
                    $sql = "SELECT * FROM bookings WHERE user = '{$username}'";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $id = $row['id'];
                            
                            echo "<div class='booking'>{$row['date']} at {$row['time']} <a href='./deleteBook.php?id={$id}'>delete</a></div>";
                        }
                    }
                    else{
                        echo 'No bookings yet';
                    }
                ?>
            </div>
            <a href="./book.php">Add an appointment</a>
        </div>
    </div>
</body>
</html>