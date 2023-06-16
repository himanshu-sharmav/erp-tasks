<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'db.php';
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$stay = $_POST['stay'];
$duplicate=mysqli_query($conn,"select * from my_db where email='$email'");
if (mysqli_num_rows($duplicate)>0)
{
echo "User name or Email id already exists.";
}
else{
$sql = "INSERT INTO my_db (name, email, phone, address, gender, stay)
        VALUES ('$name', '$email', '$phone', '$address', '$gender', '$stay')";


if (mysqli_query($conn, $sql)) {
    echo "New record added successfully";
} else {
    echo "Error: " . $sql . " - " . mysqli_connect_error($conn);
}
echo "work";
mysqli_close($conn);
}
?>
