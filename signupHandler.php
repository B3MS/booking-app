<?php
    // Add the user to the database
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require "database_connect.php";

        $username = $_POST["username"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "INSERT INTO users (username, name, surname, email, password)
        VALUES ('{$username}', '{$name}', '{$surname}', '{$email}', '{$password}')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>console.log('New user created successfully')</script>";
        } else {
            echo "<script>console.log('Error: {$sql} {$conn->error}')</script>";
        }
        
        $conn->close();
        header("Location: ./index.php");
        die();
    } else {
        header("Location: ./index.php");
        die();
    }
    
?>