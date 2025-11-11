<?php
session_start();
require_once 'config.php'; // Your database connection
header('Content-Type: application/json');

// 1. Check if user is logged in
if (!isset($_SESSION['email'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit();
}

// 2. Get data from the POST request
$email = $_SESSION['email']; // Get user's email from session

// Get all form data
$newName = trim($_POST['name'] ?? '');
$newBio = trim($_POST['bio'] ?? '');
$newLocation = trim($_POST['location'] ?? '');
$newExperience = trim($_POST['experience_level'] ?? '');
$newPhone = trim($_POST['phone_number'] ?? '');
$newEmergency = trim($_POST['emergency_contact'] ?? '');
$newTrailType = trim($_POST['favorite_trail_type'] ?? '');
$newHikeTime = trim($_POST['best_hiking_time'] ?? '');
$newCompanion = trim($_POST['companion_preference'] ?? '');

// 3. Validate the name
if (empty($newName)) {
    echo json_encode(['status' => 'error', 'message' => 'Name cannot be empty']);
    exit();
}

// 4. Prepare and execute the database update
$stmt = $conn->prepare("UPDATE users SET 
    name = ?, 
    bio = ?, 
    location = ?, 
    experience_level = ?, 
    phone_number = ?, 
    emergency_contact = ?, 
    favorite_trail_type = ?, 
    best_hiking_time = ?, 
    companion_preference = ? 
WHERE email = ?");

// "ssssssssss" means 10 string parameters
$stmt->bind_param("ssssssssss", 
    $newName, 
    $newBio, 
    $newLocation, 
    $newExperience, 
    $newPhone, 
    $newEmergency, 
    $newTrailType, 
    $newHikeTime, 
    $newCompanion, 
    $email
);

if ($stmt->execute()) {
    // 5. IMPORTANT: Update the session variable for the name
    $_SESSION['name'] = $newName;
    
    // 6. Send a success response back to JavaScript
    echo json_encode([
        'status' => 'success',
        'newName' => $newName,
        'newBio' => $newBio,
        'newLocation' => $newLocation,
        'newExperience' => $newExperience,
        'newPhone' => $newPhone,
        'newEmergency' => $newEmergency,
        'newTrailType' => $newTrailType,
        'newHikeTime' => $newHikeTime,
        'newCompanion' => $newCompanion
    ]);
} else {
    // Send an error if the database update failed
    echo json_encode(['status' => 'error', 'message' => 'Database update failed.']);
}

// 7. Close connections
$stmt->close();
$conn->close();
?>