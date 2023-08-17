<?php

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('You must be logged in to view posts.')</script>";
    // Handle the error condition or return an error message
    exit();
}

$user_id = $_SESSION['user_id'];

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

    // Construct the path to the user's post folder
    $post_folder = "UserPosts/$ifirstname-$ilastname/";

    // List files (posts) in the user's post folder
    $posts = array();
    if (is_dir($post_folder)) {
        $post_files = scandir($post_folder);
        foreach ($post_files as $file) {
            if ($file !== '.' && $file !== '..') {
                // Retrieve post information from the database based on the file name
                $post_id = basename($file, '.' . pathinfo($file, PATHINFO_EXTENSION));
                $stmt = $conn->prepare("SELECT text_post, image_post FROM `userposts` WHERE post_id = ?");
                if ($stmt) {
                    $stmt->bind_param("i", $post_id);
                    $stmt->execute();
                    $stmt->bind_result($text_post, $image_post);
                    $stmt->fetch();
                    $stmt->close();

                    $posts[] = array(
                        'post_id' => $post_id,
                        'text_post' => $text_post,
                        'image_post' => $image_post
                    );
                }
            }
        }
    }

    // Now you have an array $posts containing information about each post
    // You can iterate through $posts and display the posts on your page
}
?>