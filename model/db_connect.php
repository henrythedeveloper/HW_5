<?php
function get_db_connection() {
    $servername = "localhost";
    $username = "employee_manager";
    $password = "";
    $dbname = "payroll";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname); 

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        return $conn;
    }
}
?>
