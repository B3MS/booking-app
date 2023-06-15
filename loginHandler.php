<?php
    // Check for method
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        session_start();
        // Check credentials
        require "./database_connect.php";
        $username = $_POST["username"];
        $password = $_POST["password"];
        $sql = "SELECT username, password FROM users WHERE username = '{$username}'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($username == $row['username'] && $password == $row['password']){
                    $_SESSION['username'] = $username;
                }
                else{
                    $_SESSION["errorMessage"] = "Password is incorrect!"; 
                    header("Location: ./login.php");
                    die();
                }
            }
        } 
        else{
            $_SESSION["errorMessage"] = "User does not exist!";
            header("Location: ./login.php");
            die();
        }
        $conn->close();
        header("Location: ./index.php");
        die();
    } else {
        header("Location: ./index.php");
        die();
    }
?>