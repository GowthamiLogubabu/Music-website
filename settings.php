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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve new password from form
    $newPassword = $_POST['new_password'];
    
    // Update the password in the database
    $updateQuery = "UPDATE adminlogin SET password='$newPassword' WHERE username='" . $_SESSION['admin'] . "'";
    if (mysqli_query($conn, $updateQuery)) {
        echo "Password updated successfully";
    } else {
        echo "Error updating password: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Settings</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <a href="admin_dashboard.php">Dashboard</a>
        </div>
    </div>

    <div class="settings-container">
        <h2>Change Password</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm New Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit">Change Password</button>
        </form>
        <?php 
        // Display error messages, if any
        if (!empty($errors)) {
            echo '<div class="error">';
            foreach ($errors as $error) {
                echo "<p>$error</p>";
            }
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
