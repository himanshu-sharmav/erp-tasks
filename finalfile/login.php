<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'connection.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $email = $_POST['email'];
    $password = $_POST['password'];    
    $stmt = $conn->prepare('SELECT * FROM my_db WHERE email = ? AND password = ?');
    $stmt->bind_param('ss', $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows === 1) {
        
        $user = $result->fetch_assoc();

        
        $_SESSION['user'] = $user;

        
        header('Location: detail.php');
        exit();
    } else {
        $error = 'Invalid email or password.';
    }

    
    $stmt->close();
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="login">
        <h1>Login</h1>
        <form action="" method="post">
            <input type="email" name="email" placeholder="email" required>
            <input type="password" name="password" placeholder="password" required>
            <input type="submit" value="Login">
            <?php if (isset($error)) { echo '<p>' . $error . '</p>'; } ?>
        </form>
    </div>
</body>
</html>
