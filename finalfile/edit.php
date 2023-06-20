<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'connection.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

if ($_SESSION['user']['admin_id'] !== 1 && $_SESSION['user']['email'] !== $_GET['email']) {
    header('Location: detail.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_GET['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    $query = "UPDATE my_db SET name = '$name', phone = '$phone', address = '$address', gender = '$gender' WHERE email = '$email'";
    mysqli_query($conn, $query);

    if ($_SESSION['user']['admin_id'] === 1) {
        header('Location: detail.php');
        exit();
    } else {
        header('Location: detail.php?email=' . $email);
        exit();
    }
}

$email = $_GET['email'];
$query = "SELECT * FROM my_db WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($_SESSION['user']['admin_id'] === 1) {
    $name = $row['name'];
    $phone = $row['phone'];
    $address = $row['address'];
    $gender = $row['gender'];
} else {
    $name = $_SESSION['user']['name'];
    $phone = $_SESSION['user']['phone'];
    $address = $_SESSION['user']['address'];
    $gender = $_SESSION['user']['gender'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit User Details</title>
</head>
<body>
    <h1>Edit User Details</h1>
    <form method="post" action="edit.php?email=<?php echo $email; ?>">
        <label for="name">Name:</label>
        <input pattern="[A-Za-z]+(\s[A-Za-z]+)?(\s[A-Za-z]+)?" type="text" name="name" value="<?php echo $name; ?>" required><br>
        <label for="phone">Phone:</label>
        <input pattern="[1-9][0-9]{9}" type="tel" name="phone" value="<?php echo $phone; ?>" required><br>
        <label for="address">Address:</label>
        <input type="text" name="address" value="<?php echo $address; ?>" required><br>
        <label for="gender">Gender:</label>
        <label for="male"> male </label>
        <input type="radio" name="gender" value="male"<?php if($gender === 'male')echo 'checked'; ?> required>
        <label for="female" > female </label>
        <input type="radio" name="gender" value="female"<?php if($gender === 'female')echo 'checked'; ?> required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
