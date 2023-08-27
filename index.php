<?php
include('config.php');
session_start();

$Email = $_SESSION['iUserEmail'];
$user_id = $_SESSION["user_id"];
$firstname = $_SESSION["ifirstname"];
$lastname = $_SESSION["ilastname"];
$birth_month = $_SESSION["ibirth_month"];
$birth_day = $_SESSION["ibirth_day"];
$birth_year = $_SESSION["ibirth_year"];

$res = mysqli_query($conn, "SELECT * FROM users WHERE iUserEmail ='$Email'");
$row = mysqli_fetch_array($res);

// Declare variables based on fetched data
$fname = $row['ifirstname'];
$lname = $row['ilastname'];
$bm = $row['ibirth_month'];
$bd = $row['ibirth_day'];
$by = $row['ibirth_year'];
$uemail = $row['iUserEmail'];

// Will check if the user is logged in
if (empty($_SESSION['user_id'])) {
  header("Location: login.php"); // Redirect user to login page
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    input:checked~.dot {
      transform: translateX(100%);
      /* background-color: #132b50; */
    }
  </style>
  <title>ツイッター</title>
</head>

<body class="text-gray-900 dark:text-gray-100 bg-gray-100 dark:bg-[#28282B]">
  <div class="p-relative h-screen">
    <div class="flex justify-center">
      <header class="py-4">
        <!--Left sidebar-->
        <div class="w-[300px] bg-indigo-700">
          <div class="w-[300px] overflow-y-auto fixed h-screen">
            <!--Logo-->
            <a class=" ml-6" href="/index.php"><span
                class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-sky-400 to-emerald-200 font-extrabold text-2xl">ツイッター</span></a>
            <!--Nav-->
            <ul class="space-y-2 my-5">
              <li>
                <a href="/index.php"
                  class="flex py-2 px-6 rounded-full text-base font-semibold transform hover:-translate-y-1 hover:bg-indigo-700 duration-200 hover:text-white"><span
                    class="material-symbols-rounded mr-2"> home </span>Home</a>
              </li>
              <li>
                <a href=""
                  class="flex py-2 px-6 rounded-full text-base font-semibold transform hover:-translate-y-1 hover:bg-indigo-700 duration-200 hover:text-white"><span
                    class="material-symbols-rounded mr-2"> explore </span>Explore</a>
              </li>
              <li>
                <a href=""
                  class="flex py-2 px-6 rounded-full text-base font-semibold transform hover:-translate-y-1 hover:bg-indigo-700 duration-200 hover:text-white"><span
                    class="material-symbols-rounded mr-2">
                    notifications </span>Notifications</a>
              </li>
              <li>
                <a href=""
                  class="flex py-2 px-6 rounded-full text-base font-semibold transform hover:-translate-y-1 hover:bg-indigo-700 duration-200 hover:text-white"><span
                    class="material-symbols-rounded mr-2">
                    chat_bubble </span>Messages</a>
              </li>
              <li>
                <a href=""
                  class="flex py-2 px-6 rounded-full text-base font-semibold transform hover:-translate-y-1 hover:bg-indigo-700 duration-200 hover:text-white"><span
                    class="material-symbols-rounded mr-2">
                    bookmark </span>Bookmarks</a>
              </li>
              <li>
                <a href=""
                  class="flex py-2 px-6 rounded-full text-base font-semibold transform hover:-translate-y-1 hover:bg-indigo-700 duration-200 hover:text-white"><span
                    class="material-symbols-rounded mr-2">
                    list_alt </span>lists</a>
              </li>
              <li>
                <a href="/profile.php"
                  class="flex py-2 px-6 rounded-full text-base font-semibold transform hover:-translate-y-1 hover:bg-indigo-700 duration-200 hover:text-white"><span
                    class="material-symbols-rounded mr-2"> person </span>Profile</a>
              </li>
              <li>
                <div class="relative">
                  <button
                    class="w-[300px] py-2 px-6 mr-2 rounded-full text-base text-left transform hover:-translate-y-1 hover:bg-indigo-700 hover:text-gray-100 duration-200 "
                    id="morebutton" data-dropdown-toggle="dropdown">
                    <span class="material-symbols-rounded absolute">
                      more_horiz
                    </span>
                    <span class="ml-8 font-semibold">More</span>
                  </button>
                </div>
              </li>
            </ul>
            <div class="w-[300px] rounded-2xl text-base text-left z-10 hidden" id="dropdown">
              <ul class="absolute bottom-full mb-16 bg-white dark:bg-gray-700 rounded-2xl shadow-lg">
                <li
                  class="w-[250px] py-2 px-4 mx-2 my-1 rounded-full transform hover:-translate-y-1 hover:bg-indigo-700 duration-200 hover:text-gray-100">
                  1
                </li>
                <li
                  class="w-[250px] py-2 px-4 mx-2 my-1 rounded-full transform hover:-translate-y-1 hover:bg-indigo-700 duration-200 hover:text-gray-100">
                  1
                </li>
                <li
                  class="w-[250px] py-2 px-4 mx-2 my-1 rounded-full transform hover:-translate-y-1 hover:bg-indigo-700 duration-200 hover:text-gray-100">
                  1
                </li>
                <li
                  class="w-[250px] py-2 px-4 mx-2 my-1 rounded-full transform hover:-translate-y-1 hover:bg-indigo-700 duration-200 hover:text-gray-100">
                  1
                </li>
                <li
                  class="w-[250px] py-2 px-4 mx-2 my-1 rounded-full transform hover:-translate-y-1 hover:bg-indigo-700 duration-200 hover:text-gray-100">
                  1
                </li>
                <li
                  class="w-[250px] py-2 px-4 mx-2 my-1 rounded-full transform hover:-translate-y-1 hover:bg-indigo-700 duration-200 hover:text-gray-100">
                  1
                </li>
                <li
                  class="w-[250px] py-[6px] px-2 mx-2 my-1 rounded-full transform hover:-translate-y-1 hover:bg-indigo-700 duration-200">
                  <div class="flex flex-row justify-between toggle">
                    <label for="dark-toggle" class="flex items-center cursor-pointer">
                      <div class="relative">
                        <input type="checkbox" name="dark-mode" id="dark-toggle" class="checkbox hidden" />
                        <div class="block border-[1px] dark:border-white border-gray-900 w-12 h-7 rounded-full"></div>
                        <div
                          class="dot absolute left-1 top-1 dark:bg-white bg-gray-800 w-5 h-5 rounded-full transition">
                        </div>
                      </div>
                      <div class="ml-3 dark:text-white text-gray-900 font-medium">
                        Dark Mode
                      </div>
                    </label>
                  </div>
                </li>

              </ul>
            </div>

            <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" type="button"
              class="w-[300px] py-3 px-6 rounded-full text-base transform hover:-translate-y-1 text-white dark:text-gray-900 bg-indigo-500 hover:bg-gradient-to-r from-indigo-600 via-sky-400 to-emerald-200 duration-200 font-bold">
              ツイッター
            </button>

            <!--Logout Modal-->
            <div class="w-[300px] rounded-2xl text-base text-left z-10 hidden" id="dropdown_logout">
              <ul class="absolute bottom-full h-14 mb-24 bg-white dark:bg-gray-700 rounded-2xl shadow-lg">
                <li class="my-1">
                  <a href="logout.php"><button
                      class="w-[250px] py-2 px-4 mx-2 my-1 text-left rounded-full transform hover:-translate-y-1 hover:bg-indigo-700 duration-200"><span
                        class="absolute material-symbols-rounded">
                        logout
                      </span>
                      <span class="ml-8">Logout</span>
                      <button></a>
                </li>
              </ul>
            </div>

            <!--User Menu-->
            <div class="absolute bottom-8">
              <button id="morebutton" data-dropdown-toggle="dropdown_logout"
                class="flex-shrink-0 flex hover:bg-gray-200 dark:hover:bg-gray-900 rounded-full px-6 py-3 mt-12 mr-2">
                <a href="#" class="flex-shrink-0 group block">
                  <div class="flex items-center">

                    <?php
                    if (isset($_SESSION['user_id'])) {
                      $userId = $_SESSION['user_id'];

                      // Query the database to get the user's profile picture
                      $getProfilePictureQuery = "SELECT profile_picture FROM users WHERE user_id = '$userId'";
                      $profilePictureResult = mysqli_query($conn, $getProfilePictureQuery);

                      if ($profilePictureResult && mysqli_num_rows($profilePictureResult) > 0) {
                        $profilePictureData = mysqli_fetch_assoc($profilePictureResult);
                        $profilePicture = $profilePictureData['profile_picture'];
                      } else {
                        // User not found or no profile picture set, show the default picture
                        $profilePicture = 'Images/user.jpg';
                      }
                    } else {
                      // User not logged in, show the default picture
                      $profilePicture = 'Images/user.jpg';
                    }
                    ?>

                    <div>
                      <img class="inline-block h-10 w-10 rounded-full" src="<?php echo $profilePicture; ?>" alt="#" />
                    </div>

                    <div class="ml-3">
                      <p class="text-base leading-6 font-medium">
                        <?php
                        if (isset($_SESSION['Email']) && $_SESSION['Email'] === $fetch['Email']) {
                          echo $_SESSION['ifirstname'] . ' ' . $_SESSION['ilastname']; // Display name of the current login user
                          $isCurrentUserPost = true;
                        } else {
                          echo $row['ifirstname'] . ' ' . $row['ilastname']; // Display name for other users' posts
                          $isCurrentUserPost = false;
                        }
                        ?>
                      </p>
                      <p
                        class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-500 transition ease-in-out duration-150">
                        @<?php echo $_SESSION['iUserEmail']; ?>
                      </p>
                    </div>
                  </div>
                </a>
              </button>
            </div>
          </div>
        </div>
      </header>
      <!--Contents in the center-->
      <aside>
        <main role="main">
          <div class="flex w-[1010px] mx-2">
            <section class="max-w-2xl w-5/6 border border-y-0 border-gray-900 dark:border-gray-700">
              <aside>
                <div class="flex">
                  <div class="flex-1 mx-2">
                    <h2 class="p-4 text-xl font-semibold">Home</h2>
                  </div>
                </div>
                <hr class="border-gray-900 dark:border-gray-700" />

                <!--Create new post-->
                <form id="form1" method="POST" action="save.php" enctype="multipart/form-data">
                  <div class="flex">
                    <div class="m-2 w-10 py-1">
                      <?php
                      $defaultProfilePicture = $profilePicture; // Assuming $profilePicture contains the default picture URL
                      
                      // Check if the user is logged in
                      if (isset($_SESSION['user_id'])) {
                        $loggedInUserId = $_SESSION['user_id']; // Change this to the appropriate session variable for storing user ID
                      
                        // Retrieve profile picture and default_profile_picture for the logged-in user
                        $sql = "SELECT profile_picture, default_profile_picture FROM users WHERE user_id = $loggedInUserId";
                        $result = mysqli_query($conn, $sql) or die("query unsuccessful");

                        if (mysqli_num_rows($result) > 0) {
                          $row = mysqli_fetch_assoc($result);
                          $profilePictureUrl = $row['profile_picture'];
                          $isDefaultPicture = $row['default_profile_picture'];

                          if (!$isDefaultPicture && !empty($profilePictureUrl)) {
                            echo '<img class="inline-block h-10 w-10 rounded-full" src="' . $profilePictureUrl . '" alt="#" />'; // Display default picture or user who is currently logged in
                          } else {
                            echo '<img class="inline-block h-10 w-10 rounded-full" src="' . $defaultProfilePicture . '" alt="#" />'; // Display default picture if user not found
                          }
                        } else {
                          echo '<img class="inline-block h-10 w-10 rounded-full" src="' . $defaultProfilePicture . '" alt="#" />'; // Display default picture if user not found
                        }
                      } else {
                        echo '<img class="inline-block h-10 w-10 rounded-full" src="' . $defaultProfilePicture . '" alt="#" />'; // Display default picture for non-logged-in users
                      }
                      ?>
                    </div>

                    <!--Text Area-->
                    <div class="flex-1 px-2 pt-2 mt-2">
                      <textarea
                        class="bg-transparent font-medium text-lg w-full text-ellipsis border-0 focus:outline-none form-control text-gray-800 dark:text-white focus:ring-0 h-auto"
                        autocomplete="off" name="text_post" id="" cols="50" rows="2"
                        placeholder="What's happening?"></textarea>
                      <!--Image Prev-->
                      <div id="image-preview1" class="text-center mt-4 mr-4" style="display: none">
                        <img id="preview-image1"
                          class="rounded-lg w-full h-64 mb-2 object-cover border-2 border-indigo-500"
                          alt="Image Preview" />
                      </div>
                    </div>
                  </div>

                  <!-- Buttons for Create new post -->
                  <div class="flex justify-between border-t border-gray-700">
                    <div class="w-full">
                      <div class="px-2">
                        <div class="flex items-center">
                          <div class="flex-1 text-center p-1 m-2 order-1">
                            <input id="uploadpost1" type="file" class="form-control" name="photo"
                              onchange="previewFile(1)" />
                            <label for="uploadpost1" href="#"
                              class="w-10 mt-1 ml-11 group flex items-center text-blue-400 px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-indigo-700 hover:text-blue-300">
                              <span class="material-symbols-rounded">
                                photo
                              </span>
                            </label>
                          </div>

                          <div class="flex text-center p-1 my-2 order-last justify-end">
                            <button
                              class="text-white dark:text-gray-900 bg-indigo-500 hover:bg-gradient-to-r from-indigo-600 via-sky-400 to-emerald-200 font-bold py-2 px-8 rounded-full transform hover:-translate-y-1 duration-200"
                              name="save">
                              ツイッター
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>

                <!--End Buttons for Create new post-->
                <hr class="border-gray-900 dark:border-gray-700" />
              </aside>

              <!-- Creat new post modal -->
              <div id="defaultModal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:-inset-[18px] h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-2xl max-h-full">
                  <!-- Modal content -->
                  <div class="relative rounded-lg shadow bg-gray-100 dark:bg-[#28282B]">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-700">
                      <h3
                        class="text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-sky-400 to-emerald-200 font-extrabold">
                        Create new Post
                      </h3>
                      <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="defaultModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                          viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                      </button>
                    </div>
                    <!-- Modal body -->
                    <form id="form2" method="POST" action="save.php" enctype="multipart/form-data">
                      <div class="flex">
                        <div class="m-2 w-10 py-1">
                          <?php
                          $defaultProfilePicture = $profilePicture; // Assuming $profilePicture contains the default picture URL
                          
                          // Check if the user is logged in
                          if (isset($_SESSION['user_id'])) {
                            $loggedInUserId = $_SESSION['user_id']; // Change this to the appropriate session variable for storing user ID
                          
                            // Retrieve profile picture and default_profile_picture for the logged-in user
                            $sql = "SELECT profile_picture, default_profile_picture FROM users WHERE user_id = $loggedInUserId";
                            $result = mysqli_query($conn, $sql) or die("query unsuccessful");

                            if (mysqli_num_rows($result) > 0) {
                              $row = mysqli_fetch_assoc($result);
                              $profilePictureUrl = $row['profile_picture'];
                              $isDefaultPicture = $row['default_profile_picture'];

                              if (!$isDefaultPicture && !empty($profilePictureUrl)) {
                                $pictureToShow = $profilePictureUrl;
                              } else {
                                $pictureToShow = $defaultProfilePicture;
                              }
                            } else {
                              $pictureToShow = $defaultProfilePicture;
                            }
                          } else {
                            $pictureToShow = $defaultProfilePicture;
                          }

                          echo '<img class="inline-block h-10 w-10 rounded-full" src="' . $pictureToShow . '" alt="#" />';
                          ?>
                          <?php
                          /*$defaultProfilePicture = $profilePicture; // Assuming $profilePicture contains the default picture URL
                          
                          // Check if the user is logged in
                          if (isset($_SESSION['user_id'])) {
                            $loggedInUserId = $_SESSION['user_id']; // Change this to the appropriate session variable for storing user ID
                          
                            // Retrieve profile picture and default_profile_picture for the logged-in user
                            $sql = "SELECT profile_picture, default_profile_picture FROM users WHERE user_id = $loggedInUserId";
                            $result = mysqli_query($conn, $sql) or die("query unsuccessful");

                            if (mysqli_num_rows($result) > 0) {
                              $row = mysqli_fetch_assoc($result);
                              $profilePictureUrl = $row['profile_picture'];
                              $isDefaultPicture = $row['default_profile_picture'];

                              if (!$isDefaultPicture && !empty($profilePictureUrl)) {
                                echo '<img class="inline-block h-10 w-10 rounded-full" src="' . $profilePictureUrl . '" alt="#" />'; // Display default picture or user who is currently logged in
                              } else {
                                echo '<img class="inline-block h-10 w-10 rounded-full" src="' . $defaultProfilePicture . '" alt="#" />'; // Display default picture if user not found
                              }
                            } else {
                              echo '<img class="inline-block h-10 w-10 rounded-full" src="' . $defaultProfilePicture . '" alt="#" />'; // Display default picture if user not found
                            }
                          } else {
                            echo '<img class="inline-block h-10 w-10 rounded-full" src="' . $defaultProfilePicture . '" alt="#" />'; // Display default picture for non-logged-in users
                          }*/
                          ?>
                        </div>

                        <!--Text Area-->
                        <div class="flex-1 px-2 pt-2 mt-2">
                          <textarea
                            class="bg-transparent font-medium text-lg w-full text-ellipsis border-0 focus:outline-none form-control text-gray-800 dark:text-white focus:ring-0 h-50"
                            autocomplete="off" name="text_post" id="textArea" cols="50" rows="3"
                            placeholder="What's happening?"></textarea>
                          <!--Image Prev-->
                          <div id="image-preview2" class="text-center mt-4 mr-4" style="display: none">
                            <img id="preview-image2"
                              class="rounded-lg w-full h-72 mb-2 object-cover border-2 border-indigo-500"
                              alt="Image Preview" />
                          </div>
                        </div>
                      </div>
                      <!-- Buttons for creat new post modal -->
                      <div class="flex justify-between border-t dark:border-gray-700">
                        <div class="w-full">
                          <div class="px-2">
                            <div class="flex items-center">
                              <div class="flex flex-row flex-1 text-center p-1 m-2 order-1 space-y-2">
                                <input id="uploadpost2" type="file" class="form-control" name="photo"
                                  onchange="previewFile(2)" />
                                <!-- Button for uplaod image -->
                                <label for="uploadpost2" href="#"
                                  class="w-10 mt-1 ml-2 group flex items-center text-blue-400 px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-indigo-700 hover:text-blue-300">
                                  <span class="material-symbols-rounded">
                                    photo
                                  </span>
                                </label>
                              </div>

                              <div class="flex text-center p-1 my-2 order-last justify-end">
                                <button
                                  class="text-white dark:text-gray-900 bg-indigo-500 hover:bg-gradient-to-r from-indigo-600 via-sky-400 to-emerald-200 font-bold py-2 px-8 mr-2 rounded-full transform hover:-translate-y-1 duration-200"
                                  name="save">
                                  ツイッター
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <ul class="list-none">

                <!--List of post-->
                <?php
                require 'config.php';
                $query = mysqli_query($conn, "SELECT * FROM `userposts` ORDER BY post_id DESC") or die(mysqli_error());
                while ($fetch = mysqli_fetch_array($query)) {
                  $postID = $fetch['post_id']; // Retrieve the post ID
                  $userID = $fetch['user_id']; // Retrieve the user ID
                  ?>
                  <!--Post-->

                  <?php
                  // Retrieve the post's user ID using the provided post_id
                  $postId = $fetch['post_id'];
                  $sqlPost = "SELECT user_id FROM userposts WHERE post_id = $postId";
                  $resultPost = mysqli_query($conn, $sqlPost) or die("post query unsuccessful");

                  if (mysqli_num_rows($resultPost) > 0) {
                    $postRow = mysqli_fetch_assoc($resultPost);
                    $postUserId = $postRow['user_id'];

                    // Retrieve profile picture and default_profile_picture for the user who owns the post
                    $sqlUser = "SELECT profile_picture, default_profile_picture FROM users WHERE user_id = $postUserId";
                    $resultUser = mysqli_query($conn, $sqlUser) or die("user query unsuccessful");

                    if (mysqli_num_rows($resultUser) > 0) {
                      $userRow = mysqli_fetch_assoc($resultUser);
                      $profilePictureUrl = $userRow['profile_picture'];
                      $isDefaultPicture = $userRow['default_profile_picture'];

                      if (!empty($profilePictureUrl)) {
                        $pictureToShow = $profilePictureUrl;
                      } else {
                        $pictureToShow = $defaultProfilePicture;
                      }
                    } else {
                      $pictureToShow = $defaultProfilePicture;
                    }
                  } else {
                    $pictureToShow = $defaultProfilePicture;
                  }
                  ?>

                  <li>
                    <article class="hover:bg-gray-200 dark:hover:bg-gray-800 transition duration-350 ease-in-out">
                      <div class="flex flex-shrink-0 p-4 pb-0">
                        <a href="/profile.php?view_user_id=<?php echo $userID; ?>" class="flex-shrink-0 group block">
                          <div class="flex items-center">
                            <div>

                              <div class="profile-picture">
                                <img class="inline-block h-10 w-10 rounded-full" src="<?php echo $pictureToShow ?>"
                                  alt="#" />
                              </div>
                            </div>
                            <div class="flex ml-3">
                              <p class="text-base leading-6 font-medium text-gray-900 dark:text-white">

                                <?php
                                // Displays user profile User Name and User Email
                                $sql = "SELECT * FROM users WHERE user_id = $userID";
                                $result = mysqli_query($conn, $sql) or die("query unsuccessful");
                                if (mysqli_num_rows($result) > 0) {
                                  while ($row = mysqli_fetch_assoc($result)) {
                                    echo $row['ifirstname'] . ' ' . $row['ilastname']
                                      ?>

                                    <span
                                      class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                                      @
                                      <?php echo $row['iUserEmail']; ?> . <?php }
                                } ?>
                              </p>
                            </div>
                          </div>
                        </a>
                        <div class="flex items-center">
                          <a href="" class="">
                            <p>
                              <?php
                              $postCreated = strtotime($fetch['post_created']); // Convert to timestamp
                              echo date('F j, Y', $postCreated); // Display in desired format 
                              ?>
                              <?php
                              $timePosted = strtotime($fetch['time_posted']); // Convert to timestamp
                              echo date('g:i A', $timePosted); // Display in desired format
                              ?>
                              </span>
                            </p>
                          </a>
                        </div>
                      </div>

                      <div class="pl-16 overflow-none">
                        <p
                          class="text-base width-auto font-medium text-gray-900 dark:text-white flex-shrink mx-2 fit-content break-words">
                          <?php echo $fetch['text_post'] ?>
                        </p>

                        <?php
                        if ($fetch['image_post']) {
                          ?>
                          <div id="uploaded_image" class="md:flex-shrink pr-6 pt-3">
                            <div>
                              <img class="bg-cover bg-no-repeat bg-center rounded-lg opacity-100 w-full h-full"
                                src="<?php echo $fetch['image_post'] ?>" alt="" />
                            </div>
                          </div>
                        <?php } ?>

                        <div class="flex items-center py-4">
                          <?php if ($isCurrentUserPost) { ?>
                            <!-- Display user-specific buttons for their own posts -->
                            <button
                              class="flex-1 flex items-center text-xs text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out">
                              <span class="material-symbols-rounded">
                                add_comment
                              </span>
                              12.3 k
                            </button>
                            <button
                              class="flex-1 flex items-center text-xs text-gray-400 hover:text-green-400 transition duration-350 ease-in-out">
                              <span class="material-symbols-rounded">
                                reply
                              </span>
                              14 k
                            </button>
                            <button
                              class="flex-1 flex items-center text-xs text-gray-400 hover:text-red-600 transition duration-350 ease-in-out">
                              <span class="material-symbols-rounded">
                                favorite
                              </span>
                              14 k
                            </button>
                            <button
                              class="flex-1 flex items-center text-xs text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out">
                              <span class="absolute material-symbols-rounded">
                                upload
                              </span>
                            </button>
                          <?php } else { ?>
                            <!-- Display buttons for other users' posts -->
                            <button
                              class="flex-1 flex items-center text-xs text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out">
                              <span class="material-symbols-rounded">
                                add_comment
                              </span>
                              12.3 k
                            </button>
                            <button
                              class="flex-1 flex items-center text-xs text-gray-400 hover:text-green-400 transition duration-350 ease-in-out">
                              <span class="material-symbols-rounded">
                                reply
                              </span>
                              14 k
                            </button>
                            <button
                              class="flex-1 flex items-center text-xs text-gray-400 hover:text-red-600 transition duration-350 ease-in-out">
                              <span class="material-symbols-rounded">
                                favorite
                              </span>
                              14 k
                            </button>
                            <button
                              class="flex-1 flex items-center text-xs text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out">
                              <span class="absolute material-symbols-rounded">
                                upload
                              </span>
                            </button>
                          <?php } ?>
                        </div>


                      </div>
                      <hr class="border-gray-900 dark:border-gray-700" />
                    </article>
                  </li>
                  <!--End of Post-->
                </ul>
                <?php
                }
                ?>
              <!--End of list of Post-->
            </section>

            <!--Right sidebar-->
            <aside class="w-2/5 h-12 position-relative">
              <div class="max-width-[400px]">
                <div class="overflow-y-auto fixed h-screen">
                  <div class="relative text-gray-900 dark:text-white w-100 p-5 drop-shadow-lg">
                    <button type="submit" class="absolute ml-4 mt-3 mr-4">
                      <span class="absolute material-symbols-rounded -mt-1">search
                      </span>
                    </button>
                    <input type="search" name="search" placeholder="Search Twitter"
                      class="bg-gray-200 dark:bg-gray-700 h-10 px-10 pr-5 w-full rounded-full text-sm font-medium dark:text-gray-100 focus:outline-none bg-purple-white shadow border-0" />
                  </div>
                  <!--Top post-->
                  <div
                    class="max-w-md rounded-lg bg-dim-700 overflow-hidden drop-shadow-lg m-4 bg-gray-200 dark:bg-gray-700">
                    <div class="flex">
                      <div class="flex-1 m-2">
                        <h2 class="px-4 py-2 text-xl w-52 font-bold">
                          Philippines trends
                        </h2>
                      </div>

                      <div class="flex-1 px-4 py-2 m-2">
                        <a href=""
                          class="text-2xl rounded-full text-gray-900 dark:text-gray-50 hover:text-indigo-800 float-right"><span
                            class="material-symbols-rounded">
                            settings
                          </span></a>
                      </div>
                    </div>

                    <!--First top post-->
                    <div class="flex hover:bg-gray-100 dark:hover:bg-gray-800 transition duration-350 ease-in-out">
                      <div class="flex-1">
                        <p class="px-4 ml-2 mt-3 w-48 text-xs text-gray-400">
                          1. Trending
                        </p>
                        <h2 class="px-4 ml-2 w-48 font-bold">
                          #Mahalkonapalasya
                        </h2>
                        <p class="px-4 ml-2 mb-3 w-48 text-xs text-gray-400">
                          5,466 Tweets
                        </p>
                      </div>
                      <div class="flex-1 px-4 py-2 m-2">
                        <a href=""
                          class="text-2xl rounded-full text-gray-400 hover:bg-indigo-800 hover:text-blue-300 float-right">
                          <span class="m-2 h-[20px] w-[22px] material-symbols-rounded text-center">
                            expand_more
                          </span>
                        </a>
                      </div>
                    </div>

                    <!--Second top post-->
                    <div class="flex hover:bg-gray-100 dark:hover:bg-gray-800 transition duration-350 ease-in-out">
                      <div class=" flex-1">
                        <p class="px-4 ml-2 mt-3 w-48 text-xs text-gray-400">
                          1. Trending
                        </p>
                        <h2 class="px-4 ml-2 w-48 font-bold">
                          #Mahalkonapalasya
                        </h2>
                        <p class="px-4 ml-2 mb-3 w-48 text-xs text-gray-400">
                          5,466 Tweets
                        </p>
                      </div>
                      <div class="flex-1 px-4 py-2 m-2">
                        <a href=""
                          class="text-2xl rounded-full text-gray-400 hover:bg-indigo-800 hover:text-blue-300 float-right">
                          <span class="m-2 h-[20px] w-[22px] material-symbols-rounded text-center">
                            expand_more
                          </span>
                        </a>
                      </div>
                    </div>

                    <!--Third top post-->
                    <div class="flex hover:bg-gray-100 dark:hover:bg-gray-800 transition duration-350 ease-in-out">
                      <div class=" flex-1">
                        <p class="px-4 ml-2 mt-3 w-48 text-xs text-gray-400">
                          1. Trending
                        </p>
                        <h2 class="px-4 ml-2 w-48 font-bold">
                          #Mahalkonapalasya
                        </h2>
                        <p class="px-4 ml-2 mb-3 w-48 text-xs text-gray-400">
                          5,466 Tweets
                        </p>
                      </div>
                      <div class="flex-1 px-4 py-2 m-2">
                        <a href=""
                          class="text-2xl rounded-full text-gray-400 hover:bg-indigo-800 hover:text-blue-300 float-right">
                          <span class="m-2 h-[20px] w-[22px] material-symbols-rounded text-center">
                            expand_more
                          </span>
                        </a>
                      </div>
                    </div>

                    <!--Fourth top post-->
                    <div class="flex hover:bg-gray-100 dark:hover:bg-gray-800 transition duration-350 ease-in-out">
                      <div class=" flex-1">
                        <p class="px-4 ml-2 mt-3 w-48 text-xs text-gray-400">
                          1. Trending
                        </p>
                        <h2 class="px-4 ml-2 w-48 font-bold">
                          #Mahalkonapalasya
                        </h2>
                        <p class="px-4 ml-2 mb-3 w-48 text-xs text-gray-400">
                          5,466 Tweets
                        </p>
                      </div>
                      <div class="flex-1 px-4 py-2 m-2">
                        <a href=""
                          class="text-2xl rounded-full text-gray-400 hover:bg-indigo-800 hover:text-blue-300 float-right">
                          <span class="m-2 h-[20px] w-[22px] material-symbols-rounded text-center">
                            expand_more
                          </span>
                        </a>
                      </div>
                    </div>

                    <!--Show more-->
                    <div class="flex hover:bg-gray-100 dark:hover:bg-gray-800 transition duration-350 ease-in-out">
                      <div class=" flex-1 ml-4 p-4">
                        <a href=""
                          class="font-bold text-indigo-500 hover:text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-sky-400 to-emerald-200">Show
                          more</a>
                      </div>
                    </div>
                  </div>
                  <!--End  of top post-->

                  <!--User sugggestion to follow-->
                  <div
                    class="max-w-md rounded-lg bg-dim-700 overflow-hidden drop-shadow-lg m-4 bg-gray-200 dark:bg-gray-700">
                    <div class="flex">
                      <div class="flex-1 m-2">
                        <h2 class="px-4 py-2 text-xl w-48 font-bold">
                          Who to follow
                        </h2>
                      </div>
                    </div>

                    <!--Suggestion 1-->
                    <div
                      class="flex flex-shrink-0 hover:bg-gray-100 dark:hover:bg-gray-800 transition duration-350 ease-in-out">
                      <div class=" flex-1">
                        <div class="flex items-center w-48">
                          <div class="">
                            <a href="#" class="">
                              <img class="inline-block object-contain h-10 w-10 ml-4 mt-2 rounded-full"
                                src="Images\3.jpg" alt="" />

                          </div>
                          <div class="ml-3 mt-3">

                            <p class="text-base leading-6 font-medium">
                              <a href="" class="">Mommy</a>
                            </p>
                            <p
                              class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                              @annabel.lucinda
                            </p>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="flex-1 px-4 py-2 m-2">
                        <a href="" class="float-right">
                          <button
                            class="bg-transparent hover:bg-indigo-800 font-semibold hover:text-white py-3 px-4 rounded-full">
                            Follow
                          </button>
                        </a>
                      </div>
                    </div>

                    <!--Suggestion 2-->
                    <div
                      class="flex flex-shrink-0 flex-shrink-0 hover:bg-gray-100 dark:hover:bg-gray-800 transition duration-350 ease-in-out">
                      <div class="flex-1">
                        <div class="flex items-center w-48">
                          <div class="">
                            <a href="#">
                              <img class="inline-block object-contain h-10 w-10 ml-4 mt-2 rounded-full"
                                src="Images\3.jpg" alt="" />

                          </div>
                          <div class="ml-3 mt-3">

                            <p class="text-base leading-6 font-medium">
                              Mommy
                            </p>
                            <p
                              class="text-sm leading-5 font-medium text-gray-400 hover:text-indigo-800 transition ease-in-out duration-150">
                              @annabel.lucinda
                            </p>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="flex-1 px-4 py-2 m-2">
                        <a href="" class="float-right">
                          <button
                            class="bg-transparent hover:bg-indigo-800 font-semibold hover:text-white py-3 px-4 rounded-full">
                            Follow
                          </button>
                        </a>
                      </div>
                    </div>

                    <!--Show more-->
                    <div
                      class="flex flex-shrink-0 hover:bg-gray-100 dark:hover:bg-gray-800 transition duration-350 ease-in-out">
                      <div class="flex-1 ml-4 p-4">
                        <a href=""
                          class="font-bold text-indigo-500 hover:text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-sky-400 to-emerald-200">Show
                          more</a>
                      </div>
                    </div>
                  </div>
                  <!--End suggestion-->

                  <!--Footer-->
                  <div class="flow-root m-6">
                    <div class="flex-1">
                      <a href="#">
                        <p class="text-sm leading-6 font-medium text-gray-500">
                          Terms Privacy Policy Cookies Imprint Ads info
                        </p>
                      </a>
                    </div>
                    <div class="flex-2">
                      <p class="text-sm leading-6 font-medium text-gray-600">
                        © 2020 ツイッター, Inc.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </aside>
            <!--End of right sidebar-->
          </div>
        </main>
      </aside>
    </div>
  </div>
  <!--Darkmode-->
  <script>
    tailwind.config = {
      darkMode: "class",
    };
  </script>
  <script>
    // Check if the user preference is stored in Local Storage
    const storedPreference = localStorage.getItem("darkMode");

    // Set the initial mode based on stored preference or default to system setting
    if (storedPreference === "dark") {
      document.querySelector("html").classList.add("dark");
      document.querySelector("#dark-toggle").checked = true;
    } else if (storedPreference === "light") {
      document.querySelector("html").classList.remove("dark");
      document.querySelector("#dark-toggle").checked = false;
    } else {
      const systemPreference = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
      if (systemPreference === "dark") {
        document.querySelector("html").classList.add("dark");
        document.querySelector("#dark-toggle").checked = true;
      }
    }

    // Toggle dark mode and save preference to Local Storage
    function darkModeListener() {
      const htmlElement = document.querySelector("html");
      htmlElement.classList.toggle("dark");

      const modePreference = htmlElement.classList.contains("dark") ? "dark" : "light";
      localStorage.setItem("darkMode", modePreference);
    }

    document
      .querySelector("input[type='checkbox']#dark-toggle")
      .addEventListener("click", darkModeListener);
  </script>
  <!--End Darkmode-->

  <!--Important-->
  <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>

  <!--Image preview-->
  <script>
    function previewFile(formIndex) {
      const fileInput = document.getElementById(`uploadpost${formIndex}`);
      const previewImage = document.getElementById(`preview-image${formIndex}`);
      const imagePreviewDiv = document.getElementById(`image-preview${formIndex}`);

      if (fileInput && previewImage && imagePreviewDiv && fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
          previewImage.setAttribute("src", e.target.result);
        };

        reader.readAsDataURL(fileInput.files[0]);
        imagePreviewDiv.style.display = "block";
      }
    }
  </script>

  <!--For modals just incase -->
  <script>
    const openModalButtons = document.querySelectorAll('[data-modal-toggle]');
    const closeModalButtons = document.querySelectorAll('[data-modal-hide]');
    const modalBackgrounds = document.querySelectorAll('.modal-background');

    // Function to open a specific modal
    function openModal(modalId) {
      const modal = document.getElementById(modalId);
      modal.classList.remove('hidden');
    }

    // Function to close a specific modal
    function closeModal(modalId) {
      const modal = document.getElementById(modalId);
      modal.classList.add('hidden');
    }

    // Add click event listeners to open modal buttons
    openModalButtons.forEach(button => {
      button.addEventListener('click', () => {
        const targetModal = button.getAttribute('data-modal-target');
        openModal(targetModal);
      });
    });

    // Add click event listeners to close modal buttons and backgrounds
    closeModalButtons.forEach(button => {
      button.addEventListener('click', () => {
        const targetModal = button.getAttribute('data-modal-hide');
        closeModal(targetModal);
      });
    });

    modalBackgrounds.forEach(background => {
      background.addEventListener('click', () => {
        const targetModal = background.getAttribute('data-modal-hide');
        closeModal(targetModal);
      });
    });
  </script>

  <!--Disable scroll bar default-->
  <style>
    .overflow-y-auto::-webkit-scrollbar,
    s .overflow-y-scroll::-webkit-scrollbar,
    .overflow-x-auto::-webkit-scrollbar,
    .overflow-x::-webkit-scrollbar,
    .overflow-x-scroll::-webkit-scrollbar,
    .overflow-y::-webkit-scrollbar,
    body::-webkit-scrollbar {
      display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .overflow-y-auto,
    .overflow-y-scroll,
    .overflow-x-auto,
    .overflow-x,
    .overflow-x-scroll,
    .overflow-y,
    body {
      -ms-overflow-style: none;
      /* IE and Edge */
      scrollbar-width: none;
      /* Firefox */
    }

    svg.paint-icon {
      fill: currentcolor;
    }
  </style>
</body>

</html>