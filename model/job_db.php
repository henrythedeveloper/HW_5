<?php
/*
* model/job_db.php: Contains functions for interacting with the Job table.
* 
* - Retrieves job codes and descriptions for use in forms.
* - Uses prepared statements for secure database access.
* 
* Features:
*  - get_jobs(): Fetches all job codes and their descriptions.
* 
* Author: Henry Le
* Version: 20241103
*/
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
