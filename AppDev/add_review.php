<?php
session_start();
require_once 'config.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'You must be logged in to post a review.']);
    exit;
}

$user_id = $_SESSION['user_id'];
$trail_id = $_POST['trail_id'] ?? 0;
$rating = $_POST['rating'] ?? 0;
$review_text = trim($_POST['review_text'] ?? '');

if (empty($trail_id) || empty($rating) || empty($review_text)) {
    echo json_encode(['status' => 'error', 'message' => 'Please fill out all fields.']);
    exit;
}

$image_path = NULL;
if (isset($_FILES['review_image']) && $_FILES['review_image']['error'] == 0) {
    $target_dir = "uploads/reviews/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $file_ext = strtolower(pathinfo($_FILES['review_image']['name'], PATHINFO_EXTENSION));
    $image_path = $target_dir . uniqid() . '.' . $file_ext;

    if (getimagesize($_FILES['review_image']['tmp_name'])) {
        if (!move_uploaded_file($_FILES['review_image']['tmp_name'], $image_path)) {
            echo json_encode(['status' => 'error', 'message' => 'Sorry, there was an error uploading your file.']);
            exit;
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'File is not an image.']);
        exit;
    }
}

$stmt = $conn->prepare("INSERT INTO reviews (user_id, trail_id, rating, review_text, image_path) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("iiiss", $user_id, $trail_id, $rating, $review_text, $image_path);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Review posted!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Database error. Please try again.']);
}

$stmt->close();
$conn->close();
?>