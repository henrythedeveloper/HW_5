<?php
function get_db_connection() {
    $servername = "localhost";
    $username = "employee_manager";
    $password = "";
    $dbname = "payroll";

    // Enable MySQLi exceptions
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname); 
        $conn->set_charset("utf8mb4");
        return $conn;
    } catch (mysqli_sql_exception $e) {
        $error = "Connection failed: " . $e->getMessage();
        include('../view/error.php');
        exit();
    }
}
?>

