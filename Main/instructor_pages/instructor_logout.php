<?php
session_start();
require_once('../database/initialize.php');

if (isset($_SESSION["id"]))
{
$id = $_SESSION['id'];
update_last_instructor_logout($id);
header("Location: instructorlogin.html");
}
else
{
echo 'Session variable not set.';
}

?>