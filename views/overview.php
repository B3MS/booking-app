<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking-App</title>
</head>
<body>
    <h1>Welcome back, <?= $_SESSION['user'] ?></h1>
    <p>Your bookings:</p>
    <ul>
        <?php foreach ($bookings as $booking) : ?>
            <li>
                <div class="date"><?= $booking['date'] ?></div>
                <div class="time"><?= $booking['time'] ?></div>
                <a href="?deleteBooking=<?= $booking['id'] ?>">delete</a>
            </li>
        <?php endforeach ?>
    </ul>
    <form action="" method="post">
        <div class="inputs">
            <label for="date">Date: </label>
            <input type="date" name="date" id="date" required>

            <label for="time">Time: </label>
            <input type="time" name="time" id="time" required>
        </div>
        <input type="submit" name="addBooking" value="Add Booking">
    </form>
    <a href="?deleteAccount=1">Delete account</a>
    <a href="?logout=1">Log Out</a>
</body>
</html>