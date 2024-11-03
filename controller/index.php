<?php
// Start the session if needed
session_start();

// Include the model files
require_once('../model/db_connect.php');
require_once('../model/employee_db.php');
require_once('../model/job_db.php');

// Get the action to perform
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_employees';
    }
}

// Decide which action to take
switch ($action) {
    case 'list_employees':
        // Get data from model
        $employees = get_employees_with_job();
        // Load the view
        include('../view/header.php');
        include('../view/employee_list.php');
        include('../view/footer.php');
        break;

    case 'show_add_form':
        $jobs = get_jobs();
        include('../view/header.php');
        include('../view/add_employee_form.php');
        include('../view/footer.php');
        break;

    case 'add_employee':
        // Get data from POST
        $emp_num = filter_input(INPUT_POST, 'emp_num', FILTER_VALIDATE_INT);
        $emp_lname = filter_input(INPUT_POST, 'emp_lname');
        $emp_fname = filter_input(INPUT_POST, 'emp_fname');
        $emp_initial = filter_input(INPUT_POST, 'emp_initial');
        $hire_date = filter_input(INPUT_POST, 'hire_date');
        $job_code = filter_input(INPUT_POST, 'job_code');

        // Validate inputs (additional validation can be added)
        if ($emp_num && $emp_lname && $emp_fname && $emp_initial && $hire_date && $job_code) {
            // Add employee
            add_employee($emp_num, $emp_lname, $emp_fname, $emp_initial, $hire_date, $job_code);

            // Redirect to employee list
            header('Location: index.php?action=list_employees');
        } else {
            $error = "Invalid employee data. Check all fields and try again.";
            include('../view/error.php');
        }
        break;

    case 'show_update_form':
        $emp_num = filter_input(INPUT_GET, 'emp_num', FILTER_VALIDATE_INT);
        if ($emp_num == NULL || $emp_num == FALSE) {
            $error = "Missing or incorrect employee ID.";
            include('../view/error.php');
        } else {
            $employee = get_employee($emp_num);
            $jobs = get_jobs();
            include('../view/header.php');
            include('../view/update_employee_form.php');
            include('../view/footer.php');
        }
        break;

    case 'update_employee':
        // Get data from POST
        $emp_num = filter_input(INPUT_POST, 'emp_num', FILTER_VALIDATE_INT);
        $emp_lname = filter_input(INPUT_POST, 'emp_lname');
        $emp_fname = filter_input(INPUT_POST, 'emp_fname');
        $emp_initial = filter_input(INPUT_POST, 'emp_initial');
        $hire_date = filter_input(INPUT_POST, 'hire_date');
        $job_code = filter_input(INPUT_POST, 'job_code');

        // Validate inputs
        if ($emp_num && $emp_lname && $emp_fname && $emp_initial && $hire_date && $job_code) {
            // Update employee
            update_employee($emp_num, $emp_lname, $emp_fname, $emp_initial, $hire_date, $job_code);

            // Redirect to employee list
            header('Location: index.php?action=list_employees');
        } else {
            $error = "Invalid employee data. Check all fields and try again.";
            include('../view/error.php');
        }
        break;

    case 'delete_employee':
        $emp_num = filter_input(INPUT_GET, 'emp_num', FILTER_VALIDATE_INT);
        if ($emp_num == NULL || $emp_num == FALSE) {
            $error = "Missing or incorrect employee ID.";
            include('../view/error.php');
        } else {
            delete_employee($emp_num);
            header('Location: index.php?action=list_employees');
        }
        break;

    default:
        // Default action
        $employees = get_employees_with_job();
        include('../view/header.php');
        include('../view/employee_list.php');
        include('../view/footer.php');
        break;
}
?>
