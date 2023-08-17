<?php
require_once 'config.php';
session_start(); // Start or resume the session

if (isset($_POST['save'])) {
    $text_post = $_POST['text_post'];
    $image_name = $_FILES['photo']['name'];
    $image_temp = $_FILES['photo']['tmp_name'];

    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        echo "<script>alert('You must be logged in to post.')</script>";
        // Handle the error condition or return an error message
        exit();
    }

    $user_id = $_SESSION['user_id']; // Assuming you have user_id in your session

    // Fetch user's first name and last name from the database based on user_id
    $stmt = $conn->prepare("SELECT ifirstname, ilastname FROM `users` WHERE user_id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($ifirstname, $ilastname);
        $stmt->fetch();
        $stmt->close();

        if (!$ifirstname || !$ilastname) {
            echo "<script>alert('User information not found.')</script>";
            // Handle the error condition or return an error message
            exit();
        }

        // Create directory based on user's first name and last name
        $upload_dir = "UserPosts/$ifirstname-$ilastname/";
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
    } else {
        echo "<script>alert('Error fetching user information.')</script>";
        // Handle the error condition or return an error message
        exit();
    }

    if (!empty($text_post) || !empty($image_name)) {
        // Handle the image upload if an image is provided
        if (!empty($image_name)) {
            $exp = explode(".", $image_name);
            $end = strtolower(end($exp));
            $name = time() . "." . $end;

            $allowed_ext = array("gif", "jpg", "jpeg", "png");
            if (in_array($end, $allowed_ext)) {
                $path = $upload_dir . $name;
                if (move_uploaded_file($image_temp, $path)) {
                    // Image upload successful
                } else {
                    echo "<script>alert('Failed to move uploaded image.')</script>";
                    // Handle the error condition or return an error message
                }
            } else {
                echo "<script>alert('Image format not allowed.')</script>";
                // Handle the error condition or return an error message
            }
        }

        // Now, handle the text data insertion
        // Prevent SQL injection using prepared statements
        $stmt = $conn->prepare("INSERT INTO `userposts` (user_id, text_post, image_post) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sss", $user_id, $text_post, $path);
            $stmt->execute();
            $stmt->close();

            echo "<script>alert('User account saved!')</script>";
            header('location: index.php');
            exit();
        } else {
            echo "<script>alert('Error preparing statement.')</script>";
            // Handle the error condition or return an error message
        }
    } else {
        echo "<script>alert('You must provide text or an image.')</script>";
        // Handle the error condition or return an error message
    }
}
?>