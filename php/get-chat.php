<?php
session_start();
if (isset($_SESSION['unique_id']) && isset($_POST['outgoing_id']) && isset($_POST['incoming_id'])) {
    include_once "config.php";

    // Escape and sanitize the input
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $output = '';

    $sql = "SELECT * FROM messages 
     WHERE (outgoing_message_id = '{$outgoing_id}' AND incoming_message_id = '{$incoming_id}') OR (outgoing_message_id = '{$incoming_id}' AND incoming_message_id = '{$outgoing_id}')";
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['outgoing_message_id'] == $outgoing_id) {
                $output .= '<div class="chat outgoing">
                            <div class="details">
                                <p>' . $row['msg'] . '</p>
                            </div>
                            </div>';
            } else {
                $output .= '<div class="chat incoming">
                            
                            <div class="details">
                                <p>' . $row['msg'] . '</p>
                            </div>
                            </div>';
            }
        }
    } else {
        $output .= '<div class="chat incoming">
                  
                    <div class="details">
                        <p>No messages found</p>
                    </div>
                    </div>';
    }

    echo $output;
} else {
    // Redirect if session or POST data is not set
    header("Location: ../login.php");
    exit();
}
?>