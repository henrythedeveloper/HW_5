<h2>Add Employee</h2>

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
    <input type="hidden" name="action" value="add_employee">
    
    <label>Employee Number: </label>
    <input type="number" name="emp_num" value="<?php echo isset($emp_num) ? htmlspecialchars($emp_num) : ''; ?>" required><br>
    
    <label>Last Name: </label>
    <input type="text" name="emp_lname" value="<?php echo isset($emp_lname) ? htmlspecialchars($emp_lname) : ''; ?>" required><br>
    
    <label>First Name: </label>
    <input type="text" name="emp_fname" value="<?php echo isset($emp_fname) ? htmlspecialchars($emp_fname) : ''; ?>" required><br>
    
    <label>Initial: </label>
    <input type="text" name="emp_initial" value="<?php echo isset($emp_initial) ? htmlspecialchars($emp_initial) : ''; ?>" required><br>
    
    <label>Hire Date: </label>
    <input type="date" name="hire_date" value="<?php echo isset($hire_date) ? htmlspecialchars($hire_date) : ''; ?>" required><br>
    
    <label>Job Code: </label>
    <select name="job_code" required>
        <?php foreach ($jobs as $job) : ?>
            <option value="<?php echo htmlspecialchars($job['JOB_CODE']); ?>" <?php if (isset($job_code) && $job_code == $job['JOB_CODE']) echo 'selected'; ?>>
                <?php echo htmlspecialchars($job['JOB_DESCRIPTION']); ?>
            </option>
        <?php endforeach; ?>
    </select><br>
    <input type="submit" value="Add Employee">
</form>
