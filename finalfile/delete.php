<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'connection.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['email'])) {
        $email = $_GET['email'];

        $query = "UPDATE my_db SET deleted = 1 WHERE email = '$email'";
        mysqli_query($conn, $query);
    }
}

$query1 = "SELECT * FROM my_db WHERE deleted != 1";
$result = mysqli_query($conn, $query1);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>User Details</title>
</head>
<body>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <h3>User Details</h3>
        <p>Name: <?php echo $row['name']; ?></p>
        <p>Email: <?php echo $row['email']; ?></p>
        <p>Contact: <?php echo $row['phone']; ?></p>
        <p>Address: <?php echo $row['address']; ?></p>
        <p>Gender: <?php echo $row['gender']; ?></p>
        <hr>
    <?php } ?>
    <?php header('Location: detail.php');
        exit(); ?>
</body>
</html>