<?php

require_once('database_files/initialize.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $role = $_POST['role'];
    $username = $_POST['username'];

    if ($role === "instructor")
    {
        change_instructor_password($username);
    }
    else
    {
        change_password($username);
    }
}



function change_password($username)
{
    global $db;

    $oldPassword = $_POST['oldpassword'];
    $newPassword = $_POST['newpassword'];
    $newPassword2 = $_POST['newpassword2'];

    $oldPassHash = retrieve_student_password($username);
    $oldPassHash = $oldPassHash['password'];


    if (!student_username_exists($username))
    {
        header('../changepassword.html'); // reload page

    }
    else if  (!passwords_match($username, $oldPassword))
    {        
        header('Location: ../changepassword.html'); // reload page
    }
    else if ($newPassword != $newPassword2)
    {
        header('Location: ../changepassword.html'); // reload page
    }
    else
    {
        $salt = substr(strtr(base64_encode(openssl_random_pseudo_bytes(22)), '+', '.'), 0, 22);
        $newHash = crypt($newPassword, '$2y$12$' . $salt);

        try
        {
            $query = "UPDATE `students`
                      SET `password` = '$newHash'
                      WHERE `username` = '$username'"; 
            $stmt = $db->prepare($query);
            $stmt->execute([]);

            update_student_num_password_changes($username);

            header('Location: ../changepassword.html');

            return true;
        }
        catch (PDOException $e)
        {
            echo '<br/>' . $e;
            dbDisconnect();
            exit("<br/>Failed to change password");
        }

    }
}


function change_instructor_password($username)
{
    global $db;
    
        $oldPassword = $_POST['oldpassword'];
        $newPassword = $_POST['newpassword'];
        $newPassword2 = $_POST['newpassword2'];
    
        $oldPassHash = retrieve_instructor_password($username);
        $oldPassHash = $oldPassHash['password'];
    
    
        if (!instructor_username_exists($username))
        {
            header('Location: changepassword.html'); // reload page
    
        }
        else if  (!passwords_match($username, $oldPassword))
        {        
            header('Location: changepassword.html'); // reload page
        }
        else if ($newPassword != $newPassword2)
        {
            header('Location: changepassword.html'); // reload page
        }
        else
        {
            $salt = substr(strtr(base64_encode(openssl_random_pseudo_bytes(22)), '+', '.'), 0, 22);
            $newHash = crypt($newPassword, '$2y$12$' . $salt);
    
            try
            {
                $query = "UPDATE `instructors`
                          SET `password` = '$newHash'
                          WHERE `username` = '$username'"; 
                $stmt = $db->prepare($query);
                $stmt->execute([]);
    
                update_instructor_num_password_changes($username);
    
                header('Location: changepassword.html');
    
                return true;
            }
            catch (PDOException $e)
            {
                echo '<br/>' . $e;
                dbDisconnect();
                exit("<br/>Failed to change password");
            }
    
        }
}


function passwords_match($user, $enteredPass)
{

    $isMatch = false;
    $pass = retrieve_student_password($user);
    $pass = $pass['password'];
	$salt = retrieve_student_salt($user);
	$salt = $salt['salt'];

	$enteredPassHash = crypt($enteredPass, '$2y$10$' . $salt);

    if ($pass === $enteredPassHash)
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