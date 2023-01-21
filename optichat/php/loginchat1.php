<?php
// testing echo "hello";
//get user input
session_start();
include_once "config.php";
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$hashed = password_hash($password,PASSWORD_DEFAULT);
//validation if user inputs anything
if(!empty($email) && !empty($password))
{
    //validate if email nad password matches with one in the db table
    $selc ="SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'";
    $sql = mysqli_query($conn,$selc);
    if(mysqli_num_rows($sql) > 0)
    {//if the input matched
        //then store the matched input in a assoc array
        $row = mysqli_fetch_assoc($sql);
        //when the user logout the user status is offline bt now we make it online again when the user login in again
        $status = "Online";//change the status of the user when the user login in again
        //upadate the db table
        $update = "UPDATE users set status = '{$status}' WHERE unique_id = {$row['unique_id']}";
        //run a requet in the db table
        $sql = mysqli_query($conn,$update);
        //get unique_id of current logged in user and use it in session to use on other php page
        //check the result from db table
        if($sql)
        {
            $_SESSION['unique_id'] = $row['unique_id'];
            echo "success";
        }
        
    }
    else{
        echo "Incorrect email or password";
    }
}
else
{
    echo "All inputs are required";
}
