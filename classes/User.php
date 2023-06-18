<?php


class User
{
    private $databaseManager;

    // Database connection.
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    // Create user.
    public function create(string $user, string $name, string $surname, string $email, string $password, string $confirmPassword) : void 
    {
        if($password == $confirmPassword)
        {
            $sql = "SELECT username FROM users WHERE username = '{$user}'";
            $control = $this->databaseManager->connection->query($sql);
            
            if($sql == $control)
            {
                echo "<script> alert('This username is already in use.'); </script>";
            }
            else if($user == '' || $password == '')
            {
                echo "<script> alert('All boxes must be filled.'); </script>";
            }
            else
            {
                $sql = "INSERT INTO users (username, name, surname, email, password)
                VALUES ('{$user}', '{$name}', '{$surname}', '{$email}', '{$password}')";
                $this->databaseManager->connection->query($sql);
                $_SESSION['user'] = $user;
                header("Location: ./");
                exit;

                echo "<script> alert('User has created.'); </script>";
            }
        }
        else
        {
            echo "<script> alert('Passwords must match.'); </script>";
        }
    }

    // Delete user.
    public function delete(string $user, string $password) : void {
        $sql = "SELECT * FROM users WHERE username = '{$user}' AND password = '{$password}'";
        $result = $this->databaseManager->connection->query($sql)->fetchAll();

        if(empty($result))
        {
            echo "<script> alert('Username or password is incorrect.'); </script>"; 
        }
        else
        {
            $sql = "DELETE FROM users WHERE username = '{$user}' AND password = '{$password}'";
            $this->databaseManager->connection->query($sql);
            $sql = "DELETE FROM bookings WHERE user = '{$user}'";
            $this->databaseManager->connection->query($sql);
            unset($_SESSION['user']);
            header("Location: ./");
            exit;
            echo "<script> alert('User has been deleted')</script>";
        }

    }

    // Login user.
    public function login(string $user, string $password) : void 
    {
        $sql = "SELECT username, password FROM users WHERE username = '{$user}' AND password = '{$password}'";
        $result = $this->databaseManager->connection->query($sql)->fetchAll();

        if(empty($result))
        {
            echo "<script> alert('Username or password is incorrect.'); </script>";
        }
        else
        {
            $_SESSION['user'] = $user; 
        }
    }
}