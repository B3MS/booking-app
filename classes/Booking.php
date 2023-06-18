<?php


class Booking
{
    private $databaseManager;

    // Database connection.
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    public function create(string $user, string $date, string $time) : void 
    {
        $sql = "SELECT date, time FROM bookings WHERE date = '{$date}' AND time = '{$time}'";
        $control = $this->databaseManager->connection->query($sql);

        if($sql == $control)
        {
            echo "<script> alert('This date is already booked.'); </script>";
        }
        else if($user == '' || $date == '' || $time == '')
        {
            echo "<script> alert('All boxes must be filled.'); </script>";
        }
        else
        {
            $sql = "INSERT INTO bookings (user, date, time)
            VALUES ('{$user}', '{$date}', '{$time}')";
            $this->databaseManager->connection->query($sql);
            
            echo "<script> alert('Booking has been added to your account.'); </script>";
        }
    }

    // Get all bookings from user.
    public function get() : array 
    {
        $sessionUser = $_SESSION['user'];
        $sql = "SELECT * FROM bookings WHERE user = '{$sessionUser}'";
        $result = $this->databaseManager->connection->query($sql)->fetchAll();

        return $result;     
    }

    // Delete booking.
    public function delete() : void 
    {
        $sessionUser = $_SESSION['user'];
        $id = $_GET['deleteBooking'];
        $sql = "DELETE FROM bookings WHERE id = {$id} AND user = '{$sessionUser}'";
        $this->databaseManager->connection->query($sql);
        echo "<script> alert('Booking has been deleted')</script>";
        header("Location: ./");
        exit;
    }
}