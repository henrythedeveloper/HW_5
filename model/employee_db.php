<?php
require_once('db_connect.php');

function get_employees_with_job() {
    $conn = get_db_connection();
    $sql = "SELECT EMP_NUM, EMP_LNAME, EMP_FNAME, EMP_INITIAL, EMP_HIREDATE, Employee.JOB_CODE, JOB_DESCRIPTION, JOB_CHARGE_HOUR 
            FROM Employee
            JOIN Job ON Employee.JOB_CODE = Job.JOB_CODE";
    $result = $conn->query($sql);
    $employees = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $employees[] = $row;
        }
    }
    $conn->close();
    return $employees;
}

function get_employee($emp_num) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("SELECT * FROM Employee WHERE EMP_NUM = ?");
    $stmt->bind_param("i", $emp_num);
    $stmt->execute();
    $result = $stmt->get_result();
    $employee = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $employee;
}

function add_employee($emp_num, $emp_lname, $emp_fname, $emp_initial, $hire_date, $job_code) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("INSERT INTO Employee (EMP_NUM, EMP_LNAME, EMP_FNAME, EMP_INITIAL, EMP_HIREDATE, JOB_CODE) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $emp_num, $emp_lname, $emp_fname, $emp_initial, $hire_date, $job_code);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function update_employee($emp_num, $emp_lname, $emp_fname, $emp_initial, $hire_date, $job_code) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("UPDATE Employee SET EMP_LNAME = ?, EMP_FNAME = ?, EMP_INITIAL = ?, EMP_HIREDATE = ?, JOB_CODE = ? WHERE EMP_NUM = ?");
    $stmt->bind_param("sssssi", $emp_lname, $emp_fname, $emp_initial, $hire_date, $job_code, $emp_num);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function delete_employee($emp_num) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("DELETE FROM Employee WHERE EMP_NUM = ?");
    $stmt->bind_param("i", $emp_num);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>
