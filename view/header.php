<?php
/*
 * view/header.php: Shared header for the Employee Manager application.
 * 
 * - Sets up the HTML document structure and includes CSS and JavaScript.
 * - Provides navigation and branding elements.
 * 
 * Features:
 *  - Includes the main stylesheet.
 *  - Defines JavaScript functions for user interactions.
 *  - Displays the application title and navigation icons.
 * 
 * Author: Henry Le
 * Version: 20241103
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Manager</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
    <script language="JavaScript" type="text/javascript">
    function checkDelete(){
        return confirm('Are you sure you want to delete this employee?');
    }
    </script>
</head>
<body>
    <div class="top">
        <nav>
            <a href="index.php?action=list_employees"><img class="home" src="../assets/home.svg" alt="Home"></a>
        </nav>
        <h1>Employee Manager</h1>
    </div>
