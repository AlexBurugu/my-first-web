<?php
//echo "hi";
session_start();
include_once "config.php";
$searchTerm = mysqli_real_escape_string($conn,$_POST['searchTerm']);
//testing echo $searchTerm;
//select first name or last name of online users from the searchTerm
$outgoing_id = $_SESSION['unique_id'];////show last message in users list wher user image and name are shown
/*' WHERE NOT unique_id = {$outgoing_id}' used to remove the of currently logged in user from the user list
       ' NOT unique_id = {$outgoing_id} AND' even when the user tries to search for his account*/
$selc = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%' OR sname LIKE '{$searchTerm}')";
$sql = mysqli_query($conn,$selc);
$output = "";
if(mysqli_num_rows($sql) > 0)
{
    while($row = mysqli_fetch_assoc($sql))
    {   ($row['status'] == "Offline") ? $offline = "offline" : $offline = "";//used in css
        $output .= '
        <a href="chat.php?user_id='. $row['unique_id'].'">
        <div class="content">
            <img src="php/images/'. $row['img'] .'" alt="">
            <div class="details">
                <h3>'. $row['fname'] . " ". $row['sname'] .'</h3>
                <p>Txt messages...</p>
            </div>
        </div>
        <div class="status '.$offline.'">.</div>
    </a>';
    }
}
else{
    //if there is no user related to user search term
    $output .= "No user found";
}
echo $output;