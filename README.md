# Employee Manager

## Overview
The Employee Manager is a web-based application designed to manage employee records using the Model-View-Controller (MVC) architectural pattern. It allows users to add, update, and delete employees, as well as view a list of employees from a MySQL database. The application is built using PHP for server-side logic, MySQL for the database, and HTML/CSS for the frontend design. The MVC pattern enhances maintainability and scalability by separating the application into distinct components.

## Features
- **List Employees**: View a table of employees with details such as employee number, name, hire date, job description, and charge per hour.
- **Add Employees**: Fill out a form to add new employees to the database with validation to prevent duplicate entries and ensure data integrity.
- **Update Employees**: Update existing employee information such as name, hire date, and job code with form validation to ensure correct data entry.
- **Delete Employees**: Remove employees from the system with a confirmation prompt to prevent accidental deletions.
- **Error Handling**: Displays meaningful error messages for invalid inputs or database errors, improving user experience.

## Directory Structure
```bash
.
├── controller/
│   └── index.php                     # Main controller handling all requests
├── model/
│   ├── db_connect.php                # Database connection script
│   ├── employee_db.php               # Functions to interact with Employee table
│   └── job_db.php                    # Functions to interact with Job table
├── view/
│   ├── header.php                    # Common header for all pages
│   ├── footer.php                    # Common footer for all pages
│   ├── employee_list.php             # Displays list of employees
│   ├── add_employee_form.php         # Form to add a new employee
│   ├── update_employee_form.php      # Form to update an existing employee
│   └── error.php                     # Displays error messages
├── assets/
│   └── home.svg                      # Home icon used in the navigation
├── main.css                          # Stylesheet for the application
└── index.php                         # Redirects to controller/index.php
```

## Technologies Used
- **PHP**: Server-side scripting, utilizing the MVC pattern to separate concerns.
- **MySQL**: Database for storing employee and job data.
- **HTML/CSS**: Frontend design and layout for user interaction.
- **JavaScript**: Used for confirmation prompts during deletions.
- **MVC Pattern**: Enhances application structure by separating the model, view, and controller components.- 

## Notes
This project is a homework assignment created to demonstrate basic CRUD (Create, Read, Update, Delete) operations in a web application using PHP and MySQL, following the MVC architectural pattern. It includes form handling with validation to ensure data integrity, database interactions using prepared statements to prevent SQL injection, and dynamic content display. 

## Author
Henry Le
Version: 20241103

# Short Note
- **Controller** (`controller/index.php`): Routes all requests to the appropriate model and view based on the action specified in the request.
- **Model** (`model/`): Contains database connection and functions (`employee_db.php`, `job_db.php`) for interacting with the database, including CRUD operations and input validation.
- **View** (`view/`): Contains templates for displaying the user interface, including forms and lists, and handles the presentation of data.
- **Error Handling**: Implemented across the application to catch exceptions and display user-friendly error messages.
- **Input Validation**: Ensures that data entered by the user meets the required formats and constraints before being processed or stored in the database.
- **Security**: Prepared statements and input sanitization are used to prevent SQL injection and cross-site scripting (XSS) attacks.

