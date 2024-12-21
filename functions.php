<?php
function getInventory($conn) {
    $result = $conn->query("SELECT * FROM inventory");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function addInventory($conn, $part_name, $stock, $description) {
    $stmt = $conn->prepare("INSERT INTO inventory (part_name, stock, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $part_name, $stock, $description);
    $stmt->execute();
}

function updateInventory($conn, $id, $part_name, $stock, $description) {
    $stmt = $conn->prepare("UPDATE inventory SET part_name = ?, stock = ?, description = ? WHERE id = ?");
    $stmt->bind_param("sisi", $part_name, $stock, $description, $id);
    $stmt->execute();
}

function deleteInventory($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM inventory WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
?>
