<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'connection.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$query = "SELECT * FROM my_db where deleted != 1";
$result = mysqli_query($conn, $query);

$_SESSION['users'] = array();

while ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['users'][] = $row;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>User Details</title>
    <style>
        .admin-buttons {
            display: flex;
        }

        .admin-buttons a {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <?php if ($_SESSION['user']['admin_id'] === 1) { ?>
        <h1>Welcome, <?php echo $_SESSION['user']['name']; ?> (Admin)!</h1>

        <?php foreach ($_SESSION['users'] as $user) { ?>
            <div>
                <h3>User Details</h3>
                <p>Name: <?php echo $user['name']; ?></p>
                <p>Email: <?php echo $user['email']; ?></p>
                <p>Contact: <?php echo $user['phone']; ?></p>
                <p>Address: <?php echo $user['address']; ?></p>
                <p>Gender: <?php echo $user['gender']; ?></p>
                <?php if ($user['admin_id'] !== 1 && $user['email'] !== $_SESSION['user']['email']) { ?>
                    <div class="admin-buttons">
                        <a href="edit.php?email=<?php echo $user['email']; ?>">Edit</a>
                        <a href="delete.php?email=<?php echo $user['email']; ?>">Delete</a>
                    </div>
                <?php } ?>
            </div>
            <hr>
        <?php } ?>
    <?php } else { ?>
        <h1>Welcome, <?php echo $_SESSION['user']['name']; ?>!</h1>
        <p>Email: <?php echo $_SESSION['user']['email']; ?></p>
        <p>Contact: <?php echo $_SESSION['user']['phone']; ?></p>
        <p>Address: <?php echo $_SESSION['user']['address']; ?></p>
        <p>Gender: <?php echo $_SESSION['user']['gender']; ?></p>
    <?php } ?>
</body>
</html>
