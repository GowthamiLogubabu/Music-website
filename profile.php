<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Database connection
$conn = mysqli_connect("localhost", "root", "", "music");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve admin details from the database
$username = $_SESSION['admin'];
$sql = "SELECT * FROM adminlogin WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $password = $row['password']; // Note: Displaying password in plaintext for demonstration purposes only, not recommended in practice
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="profile-container">
        <h2>Profile</h2>
        <div>
            <p><strong>Username:</strong> <?php echo $username; ?></p>
            <p><strong>Password:</strong> <?php echo $password; ?></p>
        </div>
    </div>
</body>
</html>
