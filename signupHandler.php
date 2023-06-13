<?php    
    // Check for method
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        session_start();
        // Check passwords
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        if($password !== $confirmPassword){
            $_SESSION["errorMessage"] = "Passwords have to match!";
            header("Location: ./signup.php");
            die();
        }

        // Create User
        require "database_connect.php";

        $username = $_POST["username"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $email = $_POST["email"];

        $sql = "INSERT INTO users (username, name, surname, email, password)
        VALUES ('{$username}', '{$name}', '{$surname}', '{$email}', '{$password}')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>console.log('New user created successfully')</script>";
            $_SESSION["username"] = $username;
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