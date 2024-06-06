<?php
session_start();
header('Content-Type: application/json');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "config.php";

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
// Add value for the new column
$new_tablecol = "some_default_value";

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (isset($_FILES['image'])) { // if file is uploaded
            $img_name = $_FILES['image']['name'];
            $img_type = $_FILES['image']['type'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $img_size = $_FILES['image']['size'];

            $img_explode = explode('.', $img_name);
            $img_ext = end($img_explode);
            $extensions = ['png', 'jpg', 'jpeg'];

            if (in_array($img_ext, $extensions) === true) {
                $time = time();
                $new_img_name = $time . "_" . substr($img_name, 0, 100); // Limit the original name to 100 characters

                $destination = 'images/' . $new_img_name;
                if (!is_dir('images')) {
                    mkdir('images', 0755, true);
                }

                if (move_uploaded_file($tmp_name, $destination)) {
                    $status = "Active Now";
                    $random_id = rand(time(), 10000000);

                    $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, image, status) VALUES (
                        '$random_id', '$fname', '$lname', '$email', '$password', '$new_img_name', '$status'
                    )");

                    if ($sql2) {
                        $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
                        if (mysqli_num_rows($sql3)) {
                            $row = mysqli_fetch_assoc($sql3);
                            $_SESSION['unique_id'] = $row['unique_id'];
                            echo json_encode(['status' => 'success', 'data' => $email]);
                        }
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'Something went wrong with the database query.']);
                    }
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to move uploaded file.', 'debug' => [
                        'tmp_name' => $tmp_name,
                        'destination' => $destination,
                        'permissions' => substr(sprintf('%o', fileperms('images')), -4)
                    ]]);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Please select an image file with - jpg, png, jpeg extension']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Image file is required']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => "$email is not a valid email!"]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => "All inputs are required!"]);
}
?>