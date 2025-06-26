<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Optionally, you can store the username or other user information in the session
$username = $_SESSION['username']; // Assuming you store username during login
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
        }

        .h1-title {
            text-align: center;
            margin: 24px auto;
            font-size: 48px;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background-color: #006400;
            color: #ffffff;
            min-height: 100vh;
            padding: 20px 0;
        }

        .sidebar h2 {
            text-align: center;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 15px 20px;
        }

        .sidebar ul li a {
            color: #b0b7c3;
            text-decoration: none;
            display: block;
        }

        .sidebar ul li:hover {
            background-color: #2F4F4F;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .header h1 {
            font-size: 24px;
            color: #333;
        }

        .header .user-profile {
            font-size: 18px;
            color: #333;
            display: flex;
            align-items: center;
        }

        /* Logout Button */
        .logout-btn {
            padding: 8px 12px;
            background-color: #007bff;
            /* Blue color */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            /* Remove underline */
            font-size: 14px;
            display: flex;
            align-items: center;
        }

        .logout-btn:hover {
            background-color: #0056b3;
            /* Darker blue on hover */
        }

        /* Data Table */
        .data-table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th,
        .data-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .data-table th {
            background-color: #f5f5f5;
            color: #333;
        }

        .data-table tr:hover {
            background-color: #f9f9f9;
        }

        /* Buttons */
        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .buttons .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-new {
            background-color: #28a745;
            color: #fff;
        }

        .btn-filter {
            background-color: #007bff;
            color: #fff;
        }

        .btn-report {
            background-color: #dc3545;
            color: #fff;
        }

        .tag {
            background-color: #e7f1e7;
            color: #28a745;
            padding: 3px 6px;
            border-radius: 3px;
            font-size: 12px;
            display: inline-block;
            margin-right: 5px;
        }

        .icon {
            font-size: 18px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h2>Open Admin</h2>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="data-admin.php">Data Admin</a></li>
            <li><a href="siswa-admin.php">Siswa Admin</a></li>
            <li><a href="galeri-admin.php">Data Galeri Admin</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Dashboard</h1>
            <div class="user-profile">
                <span style="margin-right: 10px;">Hello, Admin Madrasah Ibtidaiyah Cikadongdong!</span>
                <!-- Change this text -->
                <a href="logout.php" class="logout-btn">Logout</a>
            </div>
        </div>

        <h1 class="h1-title">Selamat Datang</h1>
    </div>

</body>

</html>