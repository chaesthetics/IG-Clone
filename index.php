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

<body class="text-gray-900 dark:text-white bg-white dark:bg-[#28282B]">
  <div class="p-relative h-screen">
    <div class="flex justify-center">
      <header class="py-4">
        <!--Left sidebar-->
        <div class="w-[300px] bg-indigo-700">
          <div class="w-[300px] overflow-y-auto fixed h-screen">
            <!--Logo-->
            <a class="font-bold ml-6" href="#">ツイッター</a>
            <!--Nav-->
            <ul class="space-y-2 my-5">
              <li>
                <a href=""
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
                <a href=""
                  class="flex py-2 px-6 rounded-full text-base font-semibold transform hover:-translate-y-1 hover:bg-indigo-700 duration-200 hover:text-white"><span
                    class="material-symbols-rounded mr-2"> person </span>Profile</a>
              </li>
              <li>
                <div class="relative">
                  <button
                    class="w-[300px] py-2 px-6 mr-2 rounded-full text-base text-left transform hover:-translate-y-1 hover:bg-indigo-700 duration-200"
                    id="morebutton" data-dropdown-toggle="dropdown">
                    <span class="material-symbols-rounded absolute">
                      more_horiz
                    </span>
                    <span class="ml-8">More</span>
                  </button>
                </div>
              </li>
            </ul>
            <div class="w-[300px] rounded-2xl text-base text-left z-10 hidden" id="dropdown">
              <ul class="absolute bottom-full mb-16 bg-white dark:bg-[#28282B] rounded-2xl shadow-lg">
                <li
                  class="w-[250px] py-2 px-4 mx-2 my-1 rounded-full transform hover:-translate-y-1 hover:bg-indigo-700 duration-200">
                  1
                </li>
                <li
                  class="w-[250px] py-2 px-4 mx-2 my-1 rounded-full transform hover:-translate-y-1 hover:bg-indigo-700 duration-200">
                  1
                </li>
                <li
                  class="w-[250px] py-2 px-4 mx-2 my-1 rounded-full transform hover:-translate-y-1 hover:bg-indigo-700 duration-200">
                  1
                </li>
                <li
                  class="w-[250px] py-2 px-4 mx-2 my-1 rounded-full transform hover:-translate-y-1 hover:bg-indigo-700 duration-200">
                  1
                </li>
                <li
                  class="w-[250px] py-2 px-4 mx-2 my-1 rounded-full transform hover:-translate-y-1 hover:bg-indigo-700 duration-200">
                  1
                </li>
                <li
                  class="w-[250px] py-2 px-4 mx-2 my-1 rounded-full transform hover:-translate-y-1 hover:bg-indigo-700 duration-200">
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
                <li>
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
            <button
              class="w-[300px] py-3 px-6 rounded-full text-base transform hover:-translate-y-1 text-white dark:text-gray-900 bg-indigo-500 hover:bg-indigo-700 duration-200 font-bold">
              ツイッター
            </button>

            <!--User Menu-->
            <div class="absolute" style="bottom: 2rem">
              <div class="flex-shrink-0 flex hover:bg-indigo-800 rounded-full px-6 py-3 mt-12 mr-2">
                <a href="#" class="flex-shrink-0 group block">
                  <div class="flex items-center">
                    <div>
                      <img class="inline-block h-10 w-10 rounded-full" src="Images\☆.jpg" alt="#" />
                    </div>
                    <div class="ml-3">
                      <p class="text-base leading-6 font-medium">
                        <?php
                        if (isset($_SESSION['Email']) && $_SESSION['Email'] === $fetch['Email']) {
                          echo $_SESSION['ifirstname'] . ' ' . $_SESSION['ilastname'];
                          $isCurrentUserPost = true;
                        } else {
                          echo $row['ifirstname'] . ' ' . $row['ilastname']; // Display username for other users' posts
                          $isCurrentUserPost = false;
                        }
                        ?>
                      </p>
                      <p
                        class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                        @<?php echo $_SESSION['iUserEmail']; ?>
                      </p>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </header>
      <!--Contents in the center-->
      <aside>
        <main>
          <div class="flex w-[1000px] mx-2">
            <section class="max-w-2xl w-3/5 border border-y-0 border-gray-900 dark:border-gray-700">
              <aside>
                <div class="flex">
                  <div class="flex-1 mx-2">
                    <h2 class="p-4 text-xl font-semibold">Home</h2>
                  </div>
                </div>
                <hr class="border-gray-900 dark:border-gray-700" />
                <!--Create new post-->
                <form method="POST" action="save.php" enctype="multipart/form-data">
                  <div class="flex">
                    <div class="m-2 w-10 py-1">
                      <img class="inline-block h-10 w-10 rounded-full" src="Images\☆.jpg" alt="#" />
                    </div>
                    <!--Text Area-->
                    <div class="flex-1 px-2 pt-2 mt-2">
                      <textarea
                        class="bg-transparent font-medium text-lg w-full text-ellipsis border-0 focus:outline-none form-control text-gray-800 dark:text-white focus:ring-0"
                        autocomplete="off" name="text_post" id="" cols="50" rows="2"
                        placeholder="What's happening?"></textarea>
                      <!--Image Prev-->
                      <div id="image-preview" class="text-center mt-4" style="display: none">
                        <img id="preview-image"
                          class="rounded-lg w-full h-64 mb-2 object-cover border-2 border-indigo-500"
                          alt="Image Preview" />
                      </div>
                    </div>
                  </div>

                  <hr class="border-1 ml-16 mr-2 border-gray-900 dark:border-gray-700" />

                  <!-- Buttons for Create new post -->
                  <div class="flex justify-between">
                    <div class="w-[598px]">
                      <div class="px-2">
                        <div class="flex items-center">
                          <div class="flex-1 text-center p-1 m-2 order-1">
                            <input id="uploadpost" type="file" class="form-control" name="photo"
                              onchange="previewFile()" />
                            <label for="uploadpost" href="#"
                              class="w-10 mt-1 ml-11 group flex items-center text-blue-400 px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-indigo-700 hover:text-blue-300">
                              <span class="material-symbols-rounded">
                                photo
                              </span>
                            </label>
                          </div>

                          <div class="flex text-center p-1 my-2 order-last justify-end">
                            <button
                              class="text-white dark:text-gray-900 bg-indigo-500 hover:bg-indigo-700 font-bold py-2 px-8 rounded-full"
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
                <hr class="border-4 border-gray-900 dark:border-gray-700" />
              </aside>
              <!--List of post-->
              <?php
              require 'config.php';
              $query = mysqli_query($conn, "SELECT * FROM `userposts` ORDER BY post_id DESC") or die(mysqli_error());
              while ($fetch = mysqli_fetch_array($query)) {
                $postID = $fetch['post_id']; // Retrieve the post ID
                $userID = $fetch['user_id']; // Retrieve the user ID
                ?>
                <ul class="list-none">

                  <!--Post-->
                  <li>
                    <article class="hover:bg-gray-200 dark:hover:bg-indigo-800 transition duration-350 ease-in-out">
                      <div class="flex flex-shrink-0 p-4 pb-0">
                        <a href="#" class="flex-shrink-0 group block">
                          <div class="flex items-center">
                            <div>
                              <img class="inline-block h-10 w-10 rounded-full" src="Images\☆.jpg" alt="" />
                            </div>
                            <div class="ml-3">
                              <p class="text-base leading-6 font-medium text-gray-900 dark:text-white">

                                <?php
                                // if (isset($_SESSION['Email']) && $_SESSION['Email'] === $fetch['Email']) {
                                //   echo $_SESSION['ifirstname'] . ' ' . $_SESSION['ilastname'];
                                //   $isCurrentUserPost = true;
                                // } else {
                                //   echo $row['ifirstname'] . ' ' . $row['ilastname']; // Display username for other users' posts
                                //   $isCurrentUserPost = false;
                                // }
                                
                                $sql = "SELECT * FROM users WHERE user_id = $userID";
                                $result = mysqli_query($conn, $sql) or die("query unsuccessful");
                                if(mysqli_num_rows($result)>0){
                                  while($row= mysqli_fetch_assoc($result)){
                                  echo $row['ifirstname'].' '.$row['ilastname']
                                ?>
                                
                                <span
                                  class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                                  @ 
                                  <?php echo $row['iUserEmail']; ?> . <?php }}?>
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
                            </div>
                            
                          </div>
                        </a>
                      </div>

                      <div class="pl-16 overflow-none">
                        <p class="text-base width-auto font-medium text-gray-900 dark:text-white flex-shrink mx-2 fit-content break-words">
                          <?php echo $fetch['text_post'] ?>
                        </p>
                        <?php 
                        if($fetch['image_post']){
                        ?>
                        <div id="uploaded_image" class="md:flex-shrink pr-6 pt-3">
                          <div class="bg-cover bg-no-repeat bg-center rounded-lg w-full h-64" style="
                              height: 300px;
                              background-image: url(<?php echo $fetch['image_post'] ?>);
                            ">
                            <img class="opacity-100 w-full h-full" src="<?php echo $fetch['image_post'] ?>" alt="" />
                          </div>
                        </div>
                          <?php }?>
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
                      <hr class="border-gray-900 dark:border-gray-400" />
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
                  <div class="relative text-gray-900 dark:text-white w-100 p-5">
                    <button type="submit" class="absolute ml-4 mt-3 mr-4">
                      <span class="absolute material-symbols-rounded -mt-1">search
                      </span>
                    </button>
                    <input type="search" name="search" placeholder="Search Twitter"
                      class="bg-gray-50 dark:bg-gray-700 h-10 px-10 pr-5 ml-1 w-full rounded-full text-sm focus:outline-none bg-purple-white shadow border-0" />
                  </div>
                  <!--Top post-->
                  <div class="max-w-md rounded-lg bg-dim-700 overflow-hidden shadow-lg m-4">
                    <div class="flex">
                      <div class="flex-1 m-2">
                        <h2 class="px-4 py-2 text-xl w-48 font-bold">
                          <?php echo $user_id?>Philippines trends
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

                    <hr class="border-gray-800" />

                    <!--First top post-->
                    <div class="flex">
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

                    <hr class="border-gray-800" />

                    <!--Second top post-->
                    <div class="flex">
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

                    <hr class="border-gray-800" />

                    <!--Third top post-->
                    <div class="flex">
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

                    <hr class="border-gray-800" />

                    <!--Fourth top post-->
                    <div class="flex">
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

                    <hr class="border-gray-800" />

                    <!--Show more-->
                    <div class="flex">
                      <div class="flex-1 ml-4 p-4">
                        <a href="" class="font-bold text-indigo-500 hover:text-indigo-800">Show more</a>
                      </div>
                    </div>
                  </div>
                  <!--End  of top post-->

                  <!--User sugggestion to follow-->
                  <div class="max-w-md rounded-lg bg-dim-700 overflow-hidden shadow-lg m-4">
                    <div class="flex">
                      <div class="flex-1 m-2">
                        <h2 class="px-4 py-2 text-xl w-48 font-bold">
                          Who to follow
                        </h2>
                      </div>
                    </div>

                    <hr class="border-gray-800" />

                    <!--Suggestion 1-->
                    <div class="flex flex-shrink-0">
                      <div class="flex-1">
                        <div class="flex items-center w-48">
                          <div class="">
                            <a href="#" class="">
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
                            class="bg-transparent hover:bg-indigo-800 font-semibold hover:text-white py-2 px-4 border border-white hover:border-transparent rounded-full">
                            Follow
                          </button>
                        </a>
                      </div>
                    </div>

                    <hr class="border-gray-800" />

                    <!--Suggestion 1-->
                    <div class="flex flex-shrink-0">
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
                            class="bg-transparent hover:bg-indigo-800 font-semibold hover:text-white py-2 px-4 border border-white hover:border-transparent rounded-full">
                            Follow
                          </button>
                        </a>
                      </div>
                    </div>

                    <hr class="border-gray-800" />

                    <!--Show more-->
                    <div class="flex">
                      <div class="flex-1 ml-4 p-4">
                        <a href="" class="font-bold text-indigo-500 hover:text-indigo-800">Show more</a>
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
    function darkModeListener() {
      document.querySelector("html").classList.toggle("dark");
    }

    document
      .querySelector("input[type='checkbox']#dark-toggle")
      .addEventListener("click", darkModeListener);
  </script>
  <!--End Darkmode-->

  <!--Scroll-->
  <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
  <!--Image preview-->
  <script>
    function previewFile() {
      const fileInput = document.getElementById("uploadpost");
      const previewImage = document.getElementById("preview-image");
      const imagePreviewDiv = document.getElementById("image-preview");

      if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
          previewImage.setAttribute("src", e.target.result);
        };

        reader.readAsDataURL(fileInput.files[0]);
        imagePreviewDiv.style.display = "block";
      }
    }
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