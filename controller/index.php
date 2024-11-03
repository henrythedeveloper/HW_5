<?php
/*
* controller/index.php: Main controller handling all requests for the Employee Manager application.
* 
* - Determines the action based on request parameters.
* - Coordinates between the model and view components.
* - Implements input validation and error handling.
* 
* Features:
*  - Handles actions like listing, adding, updating, and deleting employees.
*  - Validates user inputs to ensure data integrity.
*  - Utilizes model functions for database interactions.
*  - Loads appropriate views based on the action.
* 
* Author: Henry Le
* Version: 20241103
*/
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

        // Validate inputs
        $error_messages = [];

        if ($emp_num === null || $emp_num === false) {
            $error_messages[] = "Employee Number must be a valid integer.";
        }

        if (empty($emp_lname)) {
            $error_messages[] = "Last Name is required.";
        }

        if (empty($emp_fname)) {
            $error_messages[] = "First Name is required.";
        }

        if (empty($emp_initial)) {
            $error_messages[] = "Initial is required.";
        } elseif (strlen($emp_initial) !== 1) {
            $error_messages[] = "Initial must be exactly one character.";
        }

        if (empty($hire_date)) {
            $error_messages[] = "Hire Date is required.";
        }

        if (empty($job_code)) {
            $error_messages[] = "Job Code is required.";
        }

        // Check for duplicate Employee ID
        if (employee_exists($emp_num)) {
            $error_messages[] = "An employee with this Employee Number already exists.";
        }

        if (!empty($error_messages)) {
            // Get the jobs list again for the form
            $jobs = get_jobs();
            include('../view/header.php');
            include('../view/add_employee_form.php');
            include('../view/footer.php');
        } else {
            // Add employee
            $result = add_employee($emp_num, $emp_lname, $emp_fname, $emp_initial, $hire_date, $job_code);

            if ($result === true) {
                // Redirect to employee list
                header('Location: index.php?action=list_employees');
            } else {
                // An error occurred during insertion
                $error = "Error adding employee: " . $result;
                include('../view/error.php');
            }
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
        $error_messages = [];

        if ($emp_num === null || $emp_num === false) {
            $error_messages[] = "Invalid Employee Number.";
        }

        if (empty($emp_lname)) {
            $error_messages[] = "Last Name is required.";
        }

        if (empty($emp_fname)) {
            $error_messages[] = "First Name is required.";
        }

        if (empty($emp_initial)) {
            $error_messages[] = "Initial is required.";
        } elseif (strlen($emp_initial) !== 1) {
            $error_messages[] = "Initial must be exactly one character.";
        }

        if (empty($hire_date)) {
            $error_messages[] = "Hire Date is required.";
        }

        if (empty($job_code)) {
            $error_messages[] = "Job Code is required.";
        }

        if (!empty($error_messages)) {
            // Get the jobs list again for the form
            $employee = [
                'EMP_NUM' => $emp_num,
                'EMP_LNAME' => $emp_lname,
                'EMP_FNAME' => $emp_fname,
                'EMP_INITIAL' => $emp_initial,
                'EMP_HIREDATE' => $hire_date,
                'JOB_CODE' => $job_code
            ];
            $jobs = get_jobs();
            include('../view/header.php');
            include('../view/update_employee_form.php');
            include('../view/footer.php');
        } else {
            // Update employee
            $result = update_employee($emp_num, $emp_lname, $emp_fname, $emp_initial, $hire_date, $job_code);

            if ($result === true) {
                // Redirect to employee list
                header('Location: index.php?action=list_employees');
            } else {
                // An error occurred during update
                $error = "Error updating employee: " . $result;
                include('../view/error.php');
            }
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
