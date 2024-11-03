<h2>Update Employee</h2>
<form action="index.php" method="post">
    <input type="hidden" name="action" value="update_employee">
    <input type="hidden" name="emp_num" value="<?php echo htmlspecialchars($employee['EMP_NUM']); ?>">
    
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
