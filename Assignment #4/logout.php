<?php

session_start();
session_unset();
session_destroy();
session_start();

$_SESSION['message'] = "You have successfully logged out.";

header("Location: login.php");

// Flush the output buffer to ensure everything is sent before redirection...
ob_flush();
// End the script execution...
exit();
?>
