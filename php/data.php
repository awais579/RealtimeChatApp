<?php
while ($row = mysqli_fetch_assoc($sql)) {
    $output .= '<a href="chat.php?user_id=' .$row['unique_id'] . '">
         <div class="content">
         <img src="php/images/' . $row['image'] . '" ?>
           <div class="details">
             <span>' . $row['fname'] . ' ' . $row['lname'] . '</span>
             <p>' . $row['status'] . '</p>
           </div>
         </div>
         <div class="status-dot offline">
           <i class="fa-solid fa-circle"></i>
         </div>
       </a>';
}
?>