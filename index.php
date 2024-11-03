<?php
/*
* index.php: Redirects all incoming requests to the controller's index.php file.
* 
* - Ensures that all application logic is handled through the MVC pattern.
* - Improves maintainability by centralizing request handling.
* 
* Features:
*  - Uses a header redirect to the controller.
*  - Exits immediately after redirection to prevent further processing.
* 
* Author: Henry Le
* Version: 20241103
*/
// Redirect to the controller
header("Location: controller/index.php");
exit();
?>
