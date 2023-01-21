<?php
//inserting the chats in the db table
session_start();

//check if the input s filled
if(isset($_SESSION['unique_id']))
{
    include_once "config.php";
    //get what the user inputs
    $outgoing_id = mysqli_real_escape_string($conn,$_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn,$_POST['incoming_id']);
    $message = mysqli_real_escape_string($conn,$_POST['message']);

//valid the message
if(!empty($message))
{
    //if there is a message in the input the insert it in the db table
    $ins = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg) VALUES ('{$incoming_id}','{$outgoing_id}','{$message}')";
    //excute a query in the db table
    $sql = mysqli_query($conn,$ins);
    
}
}
else{
    header("location: ../login.php");
}
?>