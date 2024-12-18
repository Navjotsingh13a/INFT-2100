<?php
session_start();

// Set page title and other variables for the page...
$title = "Student Grades";
$file = "grades.php";
$banner = "Student Grades";

include("./includes/header.php");
include("./includes/functions.php");

// Connect to the database...
$conn = db_connect();

// Check if the student is logged in, otherwise redirect to login page
if (!isset($_SESSION['user_id'])) {
    $_SESSION['message'] = "You must log in to access your grades.";
    header("Location: login.php");
    exit();
}

// Retrieve user data from the session
$user = $_SESSION['user'];
?>
<div class="content align-home">
    <h1>Welcome, <?php echo htmlspecialchars($user['first_name']); ?>!</h1>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
    <p><strong>Enrol Date:</strong> <?php echo htmlspecialchars($user['enrol_date']); ?></p>
    <p><strong>Last Access:</strong> <?php echo htmlspecialchars($user['last_access']); ?></p>

    <!-- Display grades table -->
    <h2>Your Grades</h2>
    <?php
    include 'includes/functions.php';

    // Query to fetch grades for the logged-in user
    $user_id = $user['user_id'];
    $grades_query = pg_prepare($conn, 'get_grades', 
        'SELECT c.course_code, c.course_name, m.final_mark, m.achieved_at 
         FROM marks m
         JOIN courses c ON m.course_code = c.course_code
         JOIN students s ON m.student_id = s.student_id
         WHERE s.user_id = $1');
    $grades_result = pg_execute($conn, 'get_grades', [$user_id]);

    if (!$grades_result) {
        echo "Error in executing the query: " . pg_last_error($conn);
    } elseif (pg_num_rows($grades_result) > 0) {
        ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Final Mark</th>
                    <th>Achieved At</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($grade = pg_fetch_assoc($grades_result)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($grade['course_code']); ?></td>
                        <td><?php echo htmlspecialchars($grade['course_name']); ?></td>
                        <td><?php echo htmlspecialchars($grade['final_mark']); ?>%</td>
                        <td><?php echo htmlspecialchars($grade['achieved_at']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php
    } else {
        ?>
        <p>No Grades available</p>
        <?php
    }
    ?>
</div>
<?php
include 'includes/footer.php';
?>