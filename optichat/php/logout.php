<?php
session_start();
//if the user is not loginned in redirect the user to login.php
if(isset($_SESSION['unique_id']))
{
    include_once "config.php";
    //if the user want to logout legally  take the user logout_id
    $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
    if(isset($logout_id))
    {
        //if logout_id is set ie the user clicks the logout link
        $status = "Offline";//change user status to offline
        //then update the db table
        $update = "UPDATE users set status = '{$status}' WHERE unique_id = {$logout_id}";
        //execute a query in the db table
        $sql = mysqli_query($conn,$update);
        if($sql)//if logout successfull destroy session
        {
            session_unset();
            session_destroy();
            header("location: ../loginchat.php");
        }
        else{
            header("location: ../users.php");
        }
    }
}else{
    header("location: ../loginchat.php");
}