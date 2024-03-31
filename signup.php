<?php
session_start();

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "music");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the name or email already exists in the 'sign' table
    $check_query = "SELECT id FROM sign WHERE name = ? OR email = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("ss", $name, $email);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows == 0) {
        // Insert into 'sign' table
        $insert_query_sign = "INSERT INTO sign (name, email, password) VALUES (?, ?, ?)";
        $insert_stmt_sign = $conn->prepare($insert_query_sign);
        $insert_stmt_sign->bind_param("sss", $name, $email, $password);
        $insert_stmt_sign->execute();
        
        // Insert into 'user' table
        $insert_query_user = "INSERT INTO user (name, email, password) VALUES (?, ?, ?)";
        $insert_stmt_user = $conn->prepare($insert_query_user);
        $insert_stmt_user->bind_param("sss", $name, $email, $password);
        $insert_stmt_user->execute();

        // Redirect to login page
        header("location: login.php");
        exit;
    } else {
        $error = "Name or email already exists.";
    }

    $check_stmt->close();
    // Check if the statement is set before closing
    if (isset($insert_stmt_sign)) {
        $insert_stmt_sign->close();
    }
    // Check if the statement is set before closing
    if (isset($insert_stmt_user)) {
        $insert_stmt_user->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        /* Add your CSS styles here */
        .signup-container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .form-group button {
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
        .alert {
            margin-top: 10px;
            padding: 10px;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 3px;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h2>Sign Up</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Sign Up</button>
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
            <?php if(!empty($error)) { ?>
                <div class="alert"><?php echo $error; ?></div>
            <?php } ?>
        </form>
    </div>
</body>
</html>
