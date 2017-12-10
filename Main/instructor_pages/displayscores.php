<?php
session_start();
if (! isset($_SESSION['acct_type']) || $_SESSION['acct_type'] != "instructor")
{
    header("Location: instructorlogin.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang=en>
<head>
    <title></title>
    <meta charset="utf-8" />
    <meta name="author" content="Michael Drum" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" 
    integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" 
    integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <link href="../styles.css" rel="stylesheet" type="text/css">
</head>
<body>
    <h1>Results</h1>

<!-- NavBar -->
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <a class="navbar-brand" href="studenthome.php"><img src="../../images/UWOWebClicker.png"></a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="instructorhome.php">Home </a>
            <a class="nav-item nav-link" href="activatequestion.php">Activate Question (with insights)</a>
            <a class="nav-item nav-link" href="#">Display Scores<span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="insertnewquestion.html">Insert New Question</a>
            <a class="nav-item nav-link" href="editquestion.php">Edit Question</a>
            <a class="nav-item nav-link" href="deletequestion.html">Delete Question</a>
            <a class="nav-item nav-link" href="instructor_logout.php">Logout</a>
         </div>
    </div>
    </nav>


    <p>
        Scores will display here.
    </p>
</body>
</html>