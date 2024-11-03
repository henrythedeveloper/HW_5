<h2>Add Employee</h2>
<form action="index.php" method="post">
    <input type="hidden" name="action" value="add_employee">
    
    <label>Employee Number: </label>
    <input type="number" name="emp_num" required><br>
    
    <label>Last Name: </label>
    <input type="text" name="emp_lname" required><br>
    
    <label>First Name: </label>
    <input type="text" name="emp_fname" required><br>
    
    <label>Initial: </label>
    <input type="text" name="emp_initial" required><br>
    
    <label>Hire Date: </label>
    <input type="date" name="hire_date" required><br>
    
    <label>Job Code: </label>
    <select name="job_code" required>
        <?php foreach ($jobs as $job) : ?>
            <option value="<?php echo htmlspecialchars($job['JOB_CODE']); ?>">
                <?php echo htmlspecialchars($job['JOB_DESCRIPTION']); ?>
            </option>
        <?php endforeach; ?>
    </select><br>
    <input type="submit" value="Add Employee">
</form>
