<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        session_start();
        require './database_connect.php';

        $user = $_SESSION['username'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $sql = "INSERT INTO bookings (user, date, time)
        VALUES ('{$user}', '{$date}', '{$time}')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>console.log('New booking created')</script>";
        } else {
            echo "<script>console.log('Error: {$sql} {$conn->error}')</script>";
        }
        
        $conn->close();
        header("Location: ./index.php");
        die();
    }
    else{
        header("Location: ./index.php");
        die();
    }
?>