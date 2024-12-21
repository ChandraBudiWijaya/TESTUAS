<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? intval($_POST['id']) : null;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $membership_type = $_POST['membership_type'];

    if ($id) {
        // Update membership
        $stmt = $conn->prepare("UPDATE memberships SET name = ?, email = ?, phone = ?, membership_type = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $name, $email, $phone, $membership_type, $id);
    } else {
        // Add new membership
        $stmt = $conn->prepare("INSERT INTO memberships (name, email, phone, membership_type) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $membership_type);
    }

    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
