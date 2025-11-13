<?php
// Simple contact form handler

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize inputs
    $name = htmlspecialchars(trim($_POST["name"] ?? ''));
    $email = htmlspecialchars(trim($_POST["email"] ?? ''));
    $message = htmlspecialchars(trim($_POST["message"] ?? ''));

    if (!$name || !$email || !$message) {
        echo "All fields are required.";
        exit;
    }

    // Format the entry
    $entry = "Date: " . date("Y-m-d H:i:s") . PHP_EOL .
             "Name: $name" . PHP_EOL .
             "Email: $email" . PHP_EOL .
             "Message: $message" . PHP_EOL .
             "----------------------------------" . PHP_EOL;

    // Save to flat file
    file_put_contents("messages.txt", $entry, FILE_APPEND);

    // Redirect or show success
    echo "<h2>Thank you, $name!</h2><p>Your message has been received.</p>";
} else {
    echo "Invalid request method.";
}
?>
