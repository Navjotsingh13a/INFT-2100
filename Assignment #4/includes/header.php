<?php

/*
  Name:: Navjot Singh
  Date Modified: 2024-12-04
  Description: This script creates the Acceptable Use Policy page for the website.
   It explains the rules for using the site, things users can't do, their responsibilities,
    and the consequences for breaking the rules.
 */

session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFT2100 - <?php echo htmlspecialchars($title); ?></title>
    <!--
        Name: Navjot Singh
        File: header.php
        Date: November 28, 2024
        Description: Shared header file for INFT2100 Website
    -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <header class="bg-danger text-white text-center p-3">
        <h1><?php echo htmlspecialchars($banner); ?></h1>
    </header>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item"><a class="nav-link" href="grades.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="privacy_policy.php">Privacy Policy</a></li>
                    <li class="nav-item"><a class="nav-link" href="aup.php">Acceptable Use Policy</a></li>
                </ul>
            </div>
        </div>
    </nav>
