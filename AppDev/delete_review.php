<?php
session_start();
require_once 'config.php';

header('Content-Type: application/json');

// 1. Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $review_id = $_POST['review_id'] ?? 0;
    $user_id = $_SESSION['user_id'];

    if (!$review_id) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid review ID']);
        exit();
    }

    // 2. Verify ownership: Check if this review belongs to the user
    $stmt = $conn->prepare("SELECT user_id, image_path FROM reviews WHERE id = ?");
    $stmt->bind_param("i", $review_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        echo json_encode(['status' => 'error', 'message' => 'Review not found']);
        exit();
    }

    $review = $result->fetch_assoc();

    if ($review['user_id'] != $user_id) {
        echo json_encode(['status' => 'error', 'message' => 'You can only delete your own reviews']);
        exit();
    }

    // 3. Optional: Delete the image file if it exists
    if (!empty($review['image_path']) && file_exists($review['image_path'])) {
        unlink($review['image_path']);
    }

    // 4. Delete the record from database
    $delete_stmt = $conn->prepare("DELETE FROM reviews WHERE id = ?");
    $delete_stmt->bind_param("i", $review_id);
    
    if ($delete_stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Review deleted successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database error occurred']);
    }
    
    $stmt->close();
    $delete_stmt->close();
    $conn->close();
}
?>