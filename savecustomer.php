<?php
    include_once "db.php";
    $column = $conn->real_escape_string($_POST["column"]);
    $value = $conn->real_escape_string($_POST["value"]);
    $customerNumber = $conn->real_escape_string($_POST["customerNumber"]);
    $sql = "UPDATE customers SET $column='$value' WHERE customerNumber=$customerNumber";
    $stmt = $conn->prepare("UPDATE customers SET $column=? WHERE customerNumber=?");
    $stmt->bind_param("si", $value, $customerNumber);

    if ($stmt->execute()) {
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
    $stmt->close();
    $conn->close();
