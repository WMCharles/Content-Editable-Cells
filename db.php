<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sampledb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the table
$sql = "SELECT customerNumber, customerName, phone, addressLine1, creditLimit FROM customers LIMIT 12";
$result = $conn->query($sql);

$conn->close();