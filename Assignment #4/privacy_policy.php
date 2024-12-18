<?php

/*
  Name:: Navjot Singh
  Date Modified: 2024-12-04
  Description: This script creates the Privacy Policy page for the website.
   It explains how user data is collected, used, and protected.
 */

// Set the page title, file name, and banner for the Privacy Policy page...
$title = "Privacy Policy";
$file = "privacy_policy.php";
$banner = "Privacy Policy";

// Include the header of the page, which contains the structure and title...
include("./includes/header.php");
?>

<div class="container">
    <!-- Main content of the Privacy Policy page -->
    <h1>Privacy Policy</h1>
    <p>Your privacy is important to us. We ensure data confidentiality and security.</p>


    <!-- Section describing the types of information collected -->
    <h2>Information We Collect</h2>
    <ul>
        <li><strong>Personal Data:</strong> When you register or interact with our site, we may collect your name, email, birth date, and other relevant details.</li> <!-- Details on personal data collection -->
        <li><strong>Usage Data:</strong> We collect information about how you use our website, including pages visited and actions performed.</li> <!-- Details on usage data collection -->
    </ul>

    <!-- Section explaining how the collected information is used -->
    <h2>How We Use Your Information</h2>
    <p>Your information is used to:</p>
    <ul>
        <li>Provide and maintain our services</li>
        <li>Improve user experience</li>
        <li>Respond to inquiries and support requests</li>
        <li>Send updates or notifications related to your account</li>
    </ul>

    <!-- Section on data protection measures -->
    <h2>Data Protection</h2>
    <p>We implement strict security measures to ensure your data is safe. Access to your personal data is restricted to authorized personnel only.</p> <!-- Assurance of data protection -->

    <!-- Contact information section -->
    <h2>Contact Us</h2>
    <p>If you have any questions regarding this Privacy Policy, please contact us at <a href="mailto:privacy@example.com">privacy@example.com</a>.</p> <!-- Email for privacy inquiries -->
</div>
<?php include("./includes/footer.php"); ?>
