<?php
 while($row = mysqli_fetch_assoc($sql))
 {
     $output .= '
     <a href="">
     <div class="content">
         <img src="php/images/'. $row['img'] .'" alt="">
         <div class="details">
             <h3>'. $row['fname'] . " ". $row['sname'] .'</h3>
             <p>Txt messages...</p>
         </div>
     </div>
     <div class="status">0</div>
 </a>';
 }