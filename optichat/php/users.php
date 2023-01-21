<?php
session_start();
include_once "config.php";
$outgoing_id = $_SESSION['unique_id'];////show last message in users list wher user image and name are shown
       /*' WHERE NOT unique_id = {$outgoing_id}' used to remove the of currently logged in user from the user list
       bt shows if user searches for his/her account*/
$selc = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id}";
$sql = mysqli_query($conn,$selc);
$output = "";
if(mysqli_num_rows($sql) == 1)
{
    //if there is only one row in the db then defintely this is th current logged in user...so their no other users to chat with
    $output .= "No available user.";
}
elseif(mysqli_num_rows($sql) > 0)
{
    //else show the users in the db table
    while($row = mysqli_fetch_assoc($sql))
    //the chat.php?user_id = '. $row['unique_id'] .' displays unique id for every specific user..use this id to identify the msg receiver and sender
    //use this id to get user image,name and status
 {
    
    //show last message in users list wher user image and name are shown
        //use the SELECT stmt to select the last message
        $selc2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']} OR outgoing_msg_id = {$row['unique_id']})
                    AND (outgoing_msg_id = {$outgoing_id} OR outgoing_msg_id = {$outgoing_id}) ORDER BY msg_id LIMIT 1";
                    //run a query in the db table
        $sql2 = mysqli_query($conn,$selc2);
        //store the result in assoc array
        $row2 = mysqli_fetch_array($sql2);
        //check the results in array variable
        if(mysqli_num_rows($sql2) > 0)//if there is any result in the db store it in $rest
        {
            $rest = $row2['msg'];
        }
        else{
            $rest = "No chats"; 
        }
        //trim the messsage if the message characters are more than 21
        (strlen($rest) > 17) ? $msg = substr($rest, 0 ,17).'...' : $msg = $rest;
        //i sent the msg ie adding "you" text b4 the actual msg if login id send the msg
        //($outgoing_id === $row2['outgoing_msg_id']) ? $you = "You: " : $you ="";
        ($row['status'] == "Offline") ? $offline = "offline" : $offline = "";//used in css
     $output .= '
     <a href="chat.php?user_id='. $row['unique_id'] .'">
     <div class="content">
         <img src="php/images/'. $row['img'] .'" alt="">
         <div class="details">
             <h3>'. $row['fname'] . " ". $row['sname'] .'</h3>
             <p>'.$msg.'</p>
         </div>
     </div>
     <div class="status '.$offline.'">.</div>
    </a>';
 }
      
}
echo $output;