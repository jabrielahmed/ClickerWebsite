<?php

require_once('initialize.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(verify($username, $password))
    {
        header('Location: ../instructorhome.html');
        exit();
    }
    else
    {
        header('Location: ../instructorlogin.html');
        exit();
        echo "<p>Username and password did not match any records in our database</p>";
    }
}

function verify($user, $pass)
{
    $isValid = false;

    if (verify_username($user))
    {
        if (verify_password($user, $pass))
        {
            $isValid = true;
        }
        else
        {
            $isValid = false;
        }
    }
    else
    {
        $isValid = false;
    }

    return $isValid;
}

function verify_username($user)
{
    $usernameExists = false;

    if (instructor_username_exists($user))
    {
        $usernameExists = true;
    }
    else
    {
        $usernameExists = false;
    }

    return $usernameExists;
}

function verify_password($user, $enteredPass)
{
    $isMatch = false;
    $pass = retrieve_instructor_password($user);
    $pass = $pass['password'];

    if (password_verify($enteredPass, $pass))
    {
        $isMatch = true;
    }
    else
    {
        $isMatch = false;
    }

    return $isMatch;
}

?>