<?php    
    // Check for method
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        session_start();
        require "./database_connect.php";

        // Check username availability
        $username = $_POST["username"];
        $sql = "SELECT username FROM users WHERE username = '{$username}'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $_SESSION["errorMessage"] = "Username already taken!";
            header("Location: ./signup.php");
            die();
        }

        // Check email availability
        $email = $_POST["email"];
        $sql = "SELECT email FROM users WHERE email = '{$email}'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $_SESSION["errorMessage"] = "Email already taken!";
            header("Location: ./signup.php");
            die();
        }

        // Check passwords
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        if($password !== $confirmPassword){
            $_SESSION["errorMessage"] = "Passwords have to match!";
            header("Location: ./signup.php");
            die();
        }

        // Create User
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $sql = "INSERT INTO users (username, name, surname, email, password)
        VALUES ('{$username}', '{$name}', '{$surname}', '{$email}', '{$password}')";

        if ($conn->query($sql) === TRUE) {
            
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