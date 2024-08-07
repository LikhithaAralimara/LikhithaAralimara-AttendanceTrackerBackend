<?php
header("Content-Type: application/json");

include 'db.php';

$user_id = $_POST['user_id'];

if (empty($user_id)) {
    echo json_encode(["error" => "User ID is required"]);
    exit();
}

$sql = "INSERT INTO attendance (user_id, check_in_time) VALUES ('$user_id', NOW())";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Check-in successful"]);
} else {
    echo json_encode(["error" => "Error: " . $conn->error]);
}

$conn->close();
?>
