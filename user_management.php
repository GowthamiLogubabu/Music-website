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

// Fetch users from the database
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);

// Check if users exist
if (mysqli_num_rows($result) > 0) {
    // Display users in a table
    echo "<h2>User Management</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Action</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td><a href='edit_user.php?id=".$row['id']."'>Edit</a> | <a href='delete_user.php?id=".$row['id']."'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No users found.";
}

mysqli_close($conn);
?>
