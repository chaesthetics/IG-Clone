<?php
// update_profile.php

// Initialize session and database connection here
$servername = "localhost";
$username = "root";
$password = "";
$database = "image_crud";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loggedInUserId = $_SESSION['user_id']; // Change this to the appropriate session variable for storing user ID

    // Update profile picture if uploaded
    if (!empty($_FILES["profile_picture"]["name"])) {
        $profilePictureName = $_FILES["profile_picture"]["name"];
        $profilePictureTmp = $_FILES["profile_picture"]["tmp_name"];
        $profilePicturePath = "path/to/profile/pictures/" . $profilePictureName;
        move_uploaded_file($profilePictureTmp, $profilePicturePath);

        $updateProfilePictureQuery = "UPDATE users SET profile_picture = '$profilePicturePath' WHERE user_id = $loggedInUserId";
        mysqli_query($conn, $updateProfilePictureQuery);
    }

    // Update background picture if uploaded
    if (!empty($_FILES["background_picture"]["name"])) {
        $backgroundPictureName = $_FILES["background_picture"]["name"];
        $backgroundPictureTmp = $_FILES["background_picture"]["tmp_name"];
        $backgroundPicturePath = "path/to/background/pictures/" . $backgroundPictureName;
        move_uploaded_file($backgroundPictureTmp, $backgroundPicturePath);

        $updateBackgroundPictureQuery = "UPDATE users SET background_picture = '$backgroundPicturePath' WHERE user_id = $loggedInUserId";
        mysqli_query($conn, $updateBackgroundPictureQuery);
    }

    // Update basic information
    $firstName = $_POST['floating_first_name'];
    $lastName = $_POST['floating_last_name'];
    $bio = $_POST['floating_bio'];
    $location = $_POST['floating_location'];
    $website = $_POST['floating_website'];

    // SQL query to update basic information
    $updateInfoQuery = "UPDATE users SET 
                        first_name = '$firstName', 
                        last_name = '$lastName', 
                        bio = '$bio', 
                        location = '$location', 
                        website = '$website' 
                        WHERE user_id = $loggedInUserId";

    mysqli_query($conn, $updateInfoQuery);

    // Update birth information
    $birthMonth = $_POST['ibirth_month'];
    $birthDay = $_POST['ibirth_day'];
    $birthYear = $_POST['ibirth_year'];

    // SQL query to update birth information
    $updateBirthQuery = "UPDATE users SET 
                        birth_month = '$birthMonth', 
                        birth_day = '$birthDay', 
                        birth_year = '$birthYear' 
                        WHERE user_id = $loggedInUserId";

    mysqli_query($conn, $updateBirthQuery);

    // Redirect the user back to the profile page after updating
    header("Location: profile_page.php");
    exit();
}