<?php
session_start();
require_once('../Database_files/initialize.php');
if (! isset($_SESSION['acct_type']) || $_SESSION['acct_type'] != "student")
{
    header("Location: login.html");
    exit();


    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $id = $_POST['idIsExactly'];
        $points = $_POST['numberOfPointsEqualTo'];
        $keywords = $_POST['keywords'];
        $section = $_POST['sectionNumber']

        $questions = search_for_questions($id, $keywords, $section, $points);
    }
}
?>

<!DOCTYPE html>
<html lang=en>
<head>
    <title>Search Questions Results Page</title>
    <meta charset="utf-8" />
    <meta name="author" content="Michael Drum" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" 
    integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" 
    integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" 
    integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" 
   integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" 
   integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
   <link href="../styles.css" rel="stylesheet" type="text/css">

</head>
<body>
    <h1>Results</h1>

<!-- Nav/bar -->
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <a class="navbar-brand" href="studenthome.php"><img src="../../images/UWOWebClicker.png" alt="UWO WebClicker"></a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="studenthome.php">Home</a>
            <a class="nav-item nav-link active" href="searchpreviousquestions.php">Search Previous Questions <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="student_logout.php">Logout</a>
         </div>
    </div>
    </nav>


    <p>
        Results will show here.
    </p>
</body>
<footer>
    <p>
        <a href="http://jigsaw.w3.org/css-validator/check/referer">
            <img style="border:0;width:88px;height:31px"
                src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
                alt="Valid CSS!" />
            </a>
            <img src="//www.w3.org/Icons/WWW/w3c_home_nb" alt="W3C" width="72" height="47" />
        </p>
</footer>
</html>