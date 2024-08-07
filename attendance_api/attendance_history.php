<?php
header("Content-Type: application/json");

include 'db.php';

$user_id = $_GET['user_id'];

if (empty($user_id)) {
    echo json_encode(["error" => "User ID is required"]);
    exit();
}

$sql = "SELECT * FROM attendance WHERE user_id = '$user_id' ORDER BY check_in_time DESC";
$result = $conn->query($sql);

$attendance = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $attendance[] = $row;
    }
}

echo json_encode($attendance);

$conn->close();
?>
