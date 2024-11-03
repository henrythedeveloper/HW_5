<?php
require_once('db_connect.php');

function get_jobs() {
    $conn = get_db_connection();
    $sql = "SELECT JOB_CODE, JOB_DESCRIPTION FROM Job";
    $result = $conn->query($sql);
    $jobs = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $jobs[] = $row;
        }
    }
    $conn->close();
    return $jobs;
}
?>
