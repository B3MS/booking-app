<?php


// Load classes.
session_start();
require_once './config.php';
require_once './classes/DatabaseManager.php';
require_once './classes/User.php';
require_once './classes/Booking.php';

// Connect to database.
$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
$databaseManager->connect();

$users = new User($databaseManager);
$bookingsRepository = new Booking($databaseManager);

// Check for functions.
if(isset($_POST['login']))
{
    $users->login($_POST['user'], $_POST['password']);
}
if(isset($_GET['logout']) && isset($_SESSION['user']))
{
    unset($_SESSION['user']);
    header("Location: ./");
    exit;
}
if(isset($_POST['signup']))
{
    $users->create($_POST['user'], $_POST['name'], $_POST['surname'], $_POST['email'], $_POST['password'], $_POST['confirmPassword']);
}
if(isset($_POST['deleteAccount']))
{
    $users->delete($_POST['user'], $_POST['password']);
}
if(isset($_POST['addBooking']))
{
    $bookingsRepository->create($_SESSION['user'], $_POST['date'], $_POST['time']);
}
if(isset($_GET['deleteBooking']) && isset($_SESSION['user']))
{
    $bookingsRepository->delete();
}

// Load view.
if(isset($_GET['deleteAccount']) && isset($_SESSION['user']))
{
    require './views/confirmDeletion.php';
}
else if(isset($_SESSION['user']))
{
    $bookings = $bookingsRepository->get();
    require './views/overview.php';
}
else if(isset($_GET['signup']))
{
    require './views/signup.php';
}
else
{
    require './views/login.php';
}