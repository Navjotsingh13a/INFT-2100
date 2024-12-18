<?php
/*
  Name:: Navjot Singh
  Date Modified: 2024-12-04
  Description: This script manages user login. It checks login details, 
  stores session data, sets cookies for staying logged in, and tracks user activity.
 */
session_start();

// Set page title, file name, and banner for the login page...
$title = "Login";
$file = "login.php";
$banner = "Login to the Portal";

// Include the header and functions needed for the page...
include("./includes/header.php");
include("./includes/functions.php");

// Connect to the database...
$conn = db_connect();
$message = "";

// Default empty error message
$error = ""; 
// Initialize a cookie variable for preloading sticky form data
$user_id_cookie = ""; 

// Check if there is a login cookie...
if (isset($_COOKIE['LOGIN_COOKIE'])) {
    $user_id = $_COOKIE['LOGIN_COOKIE'];
} else {
    $user_id = ""; 
}

// Check if the form is submitted using the POST method...
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = trim($_POST['user_id']);
    $password = trim($_POST['password']);
    
    // Fetch user and student information from the database using the provided user ID
    $user_info = get_user_and_student_info($conn, $user_id);  
    if ($user_info) {
        
        if (password_verify($password, $user_info['password'])) {
            
            // Store user information in the session...
            $_SESSION['user_id'] = $user_info['user_id'];
            $_SESSION['user_name'] = $user_info['first_name'] . " " . $user_info['last_name'];

          // Update the user's last access time in the database...
            update_last_access($conn, $user_info['user_id']); 

            // Set a cookie to remember the user for 30 days...
            setcookie('LOGIN_COOKIE', $user_id, time() + (60 * 60 * 24 * 30), "/");  

            // Log the successful login to an activity log file
            file_put_contents('logs/activity.log', date('Y-m-d H:i:s') . " - User $user_id successfully logged in.\n", FILE_APPEND);

            // Redirect the user to the grades page after successful login...
            header("Location: grades.php");
            exit();
        } else {
            $message = "Invalid password.";
        }
    } else {
        $message = "User not found.";
    }
}
?>

<div class="container">
    <!-- Login form where user enters user ID and password -->
    <h1>Login</h1>
    <form method="post" action="login.php">
        <label for="user_id">User ID</label>
        <input type="text" name="user_id" id="user_id" value="<?php echo htmlspecialchars($user_id); ?>" required>
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        
        <button type="submit">Login</button>
    </form>
    
    <!-- Display error message if there is one -->
    <?php if ($message): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
</div>

<?php include("./includes/footer.php"); ?>
