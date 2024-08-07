<?php
header("Content-Type: application/json");

include 'db.php';

$user_id = $_POST['user_id'];

if (empty($user_id)) {
    echo json_encode(["error" => "User ID is required"]);
    exit();
}

$sql = "UPDATE attendance SET check_out_time = NOW() WHERE user_id = '$user_id' AND check_out_time IS NULL";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Check-out successful"]);
} else {
    echo json_encode(["error" => "Error: " . $conn->error]);
}

$conn->close();
?>
