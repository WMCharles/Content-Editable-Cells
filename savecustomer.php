<?php
    include_once "db.php";
    $column = $conn->real_escape_string($_POST["column"]);
    $value = $conn->real_escape_string($_POST["value"]);
    $customerNumber = $conn->real_escape_string($_POST["customerNumber"]);
    $sql = "UPDATE customers SET $column='$value' WHERE customerNumber=$customerNumber";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
