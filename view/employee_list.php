<?php
/*
 * view/employee_list.php: Displays a list of employees in a table format.
 * 
 * - Shows employee details along with options to update or delete each record.
 * - Provides a link to add a new employee.
 * 
 * Features:
 *  - Iterates over the employees array to display each employee.
 *  - Uses HTML table for structured data presentation.
 *  - Includes action links with confirmation prompts for deletions.
 * 
 * Author: Henry Le
 * Version: 20241103
*/
?>
<h2>List of Employees</h2>
<table>
    <tr>
        <th>Emp ID</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Initial</th>
        <th>Hire Date</th>
        <th>Job Description</th>
        <th>Charge Per Hour</th>
        <th>Action</th>
    </tr>
    <?php foreach ($employees as $employee) : ?>
    <tr>
        <td><?php echo htmlspecialchars($employee['EMP_NUM']); ?></td>
        <td><?php echo htmlspecialchars($employee['EMP_LNAME']); ?></td>
        <td><?php echo htmlspecialchars($employee['EMP_FNAME']); ?></td>
        <td><?php echo htmlspecialchars($employee['EMP_INITIAL']); ?></td>
        <td><?php echo htmlspecialchars($employee['EMP_HIREDATE']); ?></td>
        <td><?php echo htmlspecialchars($employee['JOB_DESCRIPTION']); ?></td>
        <td><?php echo htmlspecialchars($employee['JOB_CHARGE_HOUR']); ?></td>
        <td>
            <a href="index.php?action=show_update_form&amp;emp_num=<?php echo $employee['EMP_NUM']; ?>">Update</a> | 
            <a href="index.php?action=delete_employee&amp;emp_num=<?php echo $employee['EMP_NUM']; ?>" onclick="return checkDelete()">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="8"><a href="index.php?action=show_add_form">Add New Employee</a></td>
    </tr>
</table>
