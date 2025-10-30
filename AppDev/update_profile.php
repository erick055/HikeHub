<?php
session_start();
require_once 'config.php'; // Your database connection

// 1. Check if user is logged in
if (!isset($_SESSION['email'])) {
    // Send an error response and stop
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit();
}

// 2. Get data from the POST request (sent by JavaScript)
$newName = trim($_POST['name'] ?? '');
$newBio = $_POST['bio'] ?? '';
$email = $_SESSION['email']; // Get user's email from session

// 3. Validate the name
if (empty($newName)) {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Name cannot be empty']);
    exit();
}

// 4. Prepare and execute the database update
$stmt = $conn->prepare("UPDATE users SET name = ?, bio = ? WHERE email = ?");
// "sss" means three string parameters
$stmt->bind_param("sss", $newName, $newBio, $email);

if ($stmt->execute()) {
    // 5. IMPORTANT: Update the session variable for the name
    $_SESSION['name'] = $newName;
    
    // 6. Send a success response back to JavaScript
    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'success',
        'newName' => $newName,
        'newBio' => $newBio
    ]);
} else {
    // Send an error if the database update failed
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Database update failed.']);
}

// 7. Close connections
$stmt->close();
$conn->close();
?>