<?php
/*
  Name:: Navjot Singh
  Date Modified: 2024-12-04
  Description: This script handles user registration. It checks the information, 
  makes sure there are no duplicate accounts, saves the data, and gives feedback on success or errors.
 */

session_start();

// Set the page title, file name, and banner for the registration page...
$title = "Register";
$file = "register.php";
$banner = "Register New Account";

include("./includes/header.php");
include("./includes/functions.php");

// Connect to the database...
$conn = db_connect();
$message = "";

// Redirect logged-in users to the grades page
if (isset($_SESSION['user'])) {
    // Set a message to notify the user
    $_SESSION['message'] = 'You are already logged in and cannot register again.';
    header('Location: grades.php');
    exit();
}

// Check if the form is submitted using POST method...
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);
    $birthdate = $_POST['birthdate'];

    // Check if password and confirm password match
    if ($password !== $confirmPassword) {
        $message = "Passwords do not match.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user into the users table
        $query = "INSERT INTO users (first_name, last_name, email, password) VALUES ($1, $2, $3, $4)";
        $result = pg_prepare($conn, "register_user", $query);
        $result = pg_execute($conn, "register_user", [$first_name, $last_name, $email, $hashed_password]);

        if ($result) {
            // Get the newly inserted user_id
            $user_id = pg_last_oid($result);

            // Insert student information into the students table
            $student_query = "INSERT INTO students (user_id, birthdate) VALUES ($1, $2)";
            $student_result = pg_prepare($conn, "register_student", $student_query);
            $student_result = pg_execute($conn, "register_student", [$user_id, $birthdate]);

            // Check if student information was inserted successfully...
            if ($student_result) {
                log_web_activity("New user registered: $email");
                header("Location: login.php");
                exit();
            } else {
                $message = "Failed to insert student information.";
            }
        } else {
            $message = "Registration failed.";
        }
    }
}
?>

<div class="container">
    <!-- Display the registration form -->
    <h1>Register</h1>
    <form method="post" action="register.php">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" required>
        
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" required>
        
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" required>

        <label for="birthdate">Birthdate:</label>
        <input type="date" name="birthdate" required>

        <button type="submit">Register</button>
    </form>
    <p><?php echo $message; ?></p>
</div>

<?php include("./includes/footer.php"); ?>
