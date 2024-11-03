<?php
/*
 * view/update_employee_form.php: Form for updating an existing employee's details.
 * 
 * - Pre-fills the form with the employee's current data.
 * - Validates inputs and displays error messages if necessary.
 * 
 * Features:
 *  - Displays error messages when validation fails.
 *  - Makes Employee Number read-only to prevent changes.
 *  - Provides a dropdown list of job codes fetched from the database.
 * 
 * Author: Henry Le
*/
?>
<h2>Update Employee</h2>

<?php if (!empty($error_messages)) : ?>
    <div class="error">
        <ul>
            <?php foreach ($error_messages as $message) : ?>
                <li><?php echo htmlspecialchars($message); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="index.php" method="post">
    <input type="hidden" name="action" value="update_employee">
    <input type="hidden" name="emp_num" value="<?php echo htmlspecialchars($employee['EMP_NUM']); ?>">

    <label>Employee Number: </label>
    <input type="number" name="emp_num_display" value="<?php echo htmlspecialchars($employee['EMP_NUM']); ?>" disabled><br>

    <label>Last Name:</label>
    <input type="text" name="emp_lname" value="<?php echo htmlspecialchars($employee['EMP_LNAME']); ?>" required><br>

    <label>First Name:</label>
    <input type="text" name="emp_fname" value="<?php echo htmlspecialchars($employee['EMP_FNAME']); ?>" required><br>

    <label>Initial:</label>
    <input type="text" name="emp_initial" value="<?php echo htmlspecialchars($employee['EMP_INITIAL']); ?>" required><br>

    <label>Hire Date:</label>
    <input type="date" name="hire_date" value="<?php echo htmlspecialchars($employee['EMP_HIREDATE']); ?>" required><br>

    <label>Job Code:</label>
    <select name="job_code" required>
        <?php foreach ($jobs as $job) : ?>
            <option value="<?php echo htmlspecialchars($job['JOB_CODE']); ?>" <?php if ($job['JOB_CODE'] == $employee['JOB_CODE']) echo 'selected'; ?>>
                <?php echo htmlspecialchars($job['JOB_DESCRIPTION']); ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <input type="submit" value="Update Employee">
</form>
