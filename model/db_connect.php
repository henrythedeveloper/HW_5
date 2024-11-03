<?php
/*
* model/db_connect.php: Establishes and manages the database connection.
* 
* - Uses MySQLi extension with exception handling.
* - Configures the connection for UTF-8 character encoding.
* - Handles connection errors gracefully by displaying an error page.
* 
* Features:
*  - Provides a reusable function to get the database connection.
*  - Enables exceptions for better error handling.
*  - Sets character encoding to support a wide range of characters.
* 
* Author: Henry Le
* Version: 20241103
*/
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

