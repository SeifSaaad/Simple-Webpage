<?php
include '../db/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        $response = "Message Sent!<br> Redirecting in 3 seconds...";
    } else {
        $response = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
            window.location.href = "../../frontend/contact.html";
        }, 3000);
    </script>
</body>
</html>