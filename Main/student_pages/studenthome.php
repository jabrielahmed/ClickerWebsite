<?php
session_start();
if (! isset($_SESSION['acct_type']) || $_SESSION['acct_type'] != "student")
{
    header("Location: login.html");
}
?>

<!DOCTYPE html>
<html lang=en>
<head>
    <link href="../styles.css" rel="stylesheet" type="text/css">
    <title></title>
    <meta charset="utf-8" />
    <meta name="author" content="Michael Drum" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <script type="text/javascript" src="studenthome.js"></script>
</head>
<body>
    <h1>Student Home</h1>
    <button onclick="displayAlertIfThereIsNoActiveQuestion()">Display active question</button><br>
    <a href="searchpreviousquestions.html">Search previous questions</a><br>
    <a href="student_logout.php">Logout</a>
</body>
</html>