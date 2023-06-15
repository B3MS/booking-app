<?php
    session_start();
    if(isset($_SESSION['username']) && isset($_GET['id'])){
        require "./database_connect.php";
        $username = $_SESSION['username'];
        $id = $_GET['id'];
        $sql = "DELETE FROM bookings WHERE id={$id} AND user='{$username}'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>console.log('Booking deleted')</script>";
        } else {
            echo "<script>console.log('Error: {$sql} {$conn->error}')</script>";
        }
        $conn->close();
        header("Location: ./account.php");
        die();
    }
    else{
        header("Location: ./index.php");
        die();
    }
?>