<?php
include '../db/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $response = "Sign In Successful!<br> Redirecting in 3 seconds...";
        } else {
            $response = "Invalid password<br> Redirecting in 3 seconds...";
        }
    } else {
        $response = "User not found";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="../frontend/css/styles.css">
    <style>
        .message-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: rgba(15, 15, 20, 0.8);
            backdrop-filter: blur(10px);
            text-align: center;
        }
        .message-container p {
            color: #FFFFFF;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <p><?php echo $response; ?></p>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = "../../frontend/signin.html";
        }, 3000);
    </script>
</body>
</html>