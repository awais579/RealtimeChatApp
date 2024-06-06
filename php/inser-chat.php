<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";

    // Escape and sanitize the input
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    if (!empty($message)) {
        // Construct the SQL query string
        $sql = "INSERT INTO messages (incoming_message_id, outgoing_message_id, msg) VALUES ('$incoming_id', '$outgoing_id', '$message')";
        
        // Echo the SQL query for debugging
        echo "SQL query: " . $sql;

        // Execute the SQL query
        if (mysqli_query($conn, $sql)) {
            echo "Message inserted successfully";
        } else {
            echo "Error inserting message: " . mysqli_error($conn);
        }
    } else {
        echo "Message cannot be empty.";
    }
} else {
    header("Location: ../login.php");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
?>