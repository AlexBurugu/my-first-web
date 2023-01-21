<?php
//inserting the chats in the db table
session_start();

//check if the input s filled
if(isset($_SESSION['unique_id']))
{
    include_once "config.php";
    //get what the user inputs
    $outgoing_id = mysqli_real_escape_string($conn,$_POST['outgoing_id']);//this brings an error of 'undefined array key "outgoing_id"'
    $incoming_id = mysqli_real_escape_string($conn,$_POST['incoming_id']);//this brings an error of 'undefined array key "incoming_id"' ..to solve this errors chage the method from GET to POST
    $output = "";
   //use the SELECT STATEMENT to select all chat in the db table that matched to incoming_msg_id && outgoing_msg_id
   //join two tables to get the image of the outgoing image
   $selc = "SELECT * FROM messages
            LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id   
             WHERE (outgoing_msg_id = '{$outgoing_id}' AND incoming_msg_id = '{$incoming_id}')
            OR (outgoing_msg_id = '{$incoming_id}' AND incoming_msg_id = '{$outgoing_id}') ORDER BY msg_id ";
             //execute a query in the db table
             $sql = mysqli_query($conn,$selc);
             
    if(mysqli_num_rows($sql) > 0)//if there was amatch of chat with incoming_msg_id or outgoing_msg_id
    {
        while($row = mysqli_fetch_assoc($sql))//store the match in assoc array
        {
            if($row['outgoing_msg_id'] === $outgoing_id)//if the outgoing_id is equal to outgoing_msg_id...then the user is the sender
            {
                $output .= '<div class="chat outgoing">
                            <div class="details">
                                 <p>'. $row['msg'] .'</p>
                             </div>
                            </div>
                            ';
            }else{
                //the user is the receiver
                $output .= '<div class="chat incoming">
                                <img src="php/images/'. $row['img'] .'" alt="">
                                    <div class="details">
                                        <p>'. $row['msg'] .'</p>
                                    </div>
                            </div>
                            ';

            }
            echo $output;
        }
    }
}
else{
    header("location: ../login.php");
}
?>