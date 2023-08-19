<?php
require_once 'config.php';
session_start();

if (isset($_POST['save'])) {
    $text_post = $_POST['text_post'];
    $image_name = $_FILES['photo']['name'];
    $image_temp = $_FILES['photo']['tmp_name'];

    if (!isset($_SESSION['user_id'])) {
        echo "<script>alert('You must be logged in to post.')</script>";
        exit();
    }

    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT ifirstname, ilastname FROM `users` WHERE user_id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($ifirstname, $ilastname);
        $stmt->fetch();
        $stmt->close();

        if (!$ifirstname || !$ilastname) {
            echo "<script>alert('User information not found.')</script>";
            exit();
        }

        $upload_dir = "UserPosts/$ifirstname-$ilastname/";
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
    } else {
        echo "<script>alert('Error fetching user information.')</script>";
        exit();
    }

    $path = null;

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
                exit();
            }
        } else {
            echo "<script>alert('Image format not allowed.')</script>";
            exit();
        }
    }

    if (!empty($text_post) || $path !== null) {
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
            exit();
        }
    } else {
        echo "<script>alert('You must provide text or an image.')</script>";
        exit();
    }
}
?>