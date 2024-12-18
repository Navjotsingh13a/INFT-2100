<?php

$title = "Student Grades";
$file = "grades.php";
$description = "Display student grades and information";
$date = date("November 10, 2024");
$banner = "Student Grades";

include("./includes/header.php");
include("./includes/functions.php");

$conn = db_connect();

// Default name in case no student is found
$student_name = "Student Name";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $student_id = $_GET['id'];

    // Prepare statement for student information
    $student_info_query = "SELECT u.first_name, u.last_name, u.email, s.program_code FROM user u JOIN students s ON u.user_id = s.user_id WHERE s.student_id = $5";
    $result = pg_prepare($conn, "student_info", $student_info_query);
    
    if ($result === false) {
        die("Query preparation failed: " . pg_last_error($conn));
    }

    // Execute the query
    $result = pg_execute($conn, "student_info", array($student_id)); 

    if ($result === false) {
        die("Query execution failed: " . pg_last_error($conn));
    }

    if (pg_num_rows($result) > 0) {
        $student_info = pg_fetch_assoc($result);
        $student_name = $student_info['first_name'] . " " . $student_info['last_name']; // Set student name for footer

        echo "<div class='content container mt-4'>";
        echo "<h3>Student Details</h3>";
        echo "<p>Name: " . $student_info['first_name'] . " " . $student_info['last_name'] . "</p>";
        echo "<p>Email: " . $student_info['email'] . "</p>";
        echo "<p>Program: " . $student_info['program_code'] . "</p>";

        // Prepare statement for grades
        $grades_query = "SELECT c.course_code, c.course_name, g.final_mark, g.achieved_at FROM marks g JOIN courses c ON g.course_code = c.course_code WHERE g.student_id = $1";
        $result_grades = pg_prepare($conn, "student_grades", $grades_query);

        if ($result_grades === false) {
            die("Query preparation for grades failed: " . pg_last_error($conn));
        }

        // Execute the grades query
        $result_grades = pg_execute($conn, "student_grades", array($student_id));

        if ($result_grades === false) {
            die("Query execution for grades failed: " . pg_last_error($conn));
        }

        if (pg_num_rows($result_grades) > 0) {
            echo "<h4>Grades</h4>";
            echo "<table class='table table-bordered'>";
            echo "<tr><th>Course Code</th><th>Course Name</th><th>Final Mark</th><th>Date Achieved</th></tr>";
            while ($grade = pg_fetch_assoc($result_grades)) {
                echo "<tr><td>" . $grade['course_code'] . "</td><td>" . $grade['course_name'] . "</td><td>" . $grade['final_mark'] . "</td><td>" . $grade['achieved_at'] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Grades are not available for this student .</p>";
        }
        echo "</div>";
    } else {
        echo "<div class='content container mt-4'><p>No student found with the provided ID.</p></div>";
    }
} else {
    echo "<div class='content container mt-4'><p>No student ID provided in the URL.</p></div>";
}

// Include the footer, passing the student's name for display
include("./includes/footer.php");
?>