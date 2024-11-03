<?php
/*
 * view/error.php: Displays error messages to the user.
 * 
 * - Provides a consistent way to show errors across the application.
 * - Includes the header and footer for a uniform look.
 * 
 * Features:
 *  - Shows the error message passed from the controller.
 * 
 * Author: Henry Le
 * Version: 20241103
*/
?>
<?php include('header.php'); ?>
<h2>Error</h2>
<p><?php echo htmlspecialchars($error); ?></p>
<?php include('footer.php'); ?>
