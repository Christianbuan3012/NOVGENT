<?php
    include_once 'includes/setUp.php';
    include 'includes/connect.php';
    include 'includes/dbHandler.php';
    require 'header.php'
?>
<iframe src="https://www.youtuberepeater.com/watch?v=VB6SIKl8Md0&name=Classical+Piano+Music+by+Mozart+Relaxing+Sonata+for+Concentration+Best+Study#gsc.tab=0" style="display: none" frameborder="0" allowfullscreen></iframe>
<div class="mainbox">

    <div class="intro">
        <h1>NovGenT Dictionary</h1>
        
        <?php 
            //Is there a sesson going, say hello after login
            if(isset($_SESSION['username'])) { 
                $loggedInUser = $_SESSION['username'];
                echo "<p class='Welcome'>Welcome <b>$loggedInUser</b>, nice to see you!</p>";
            
            //OR, when logged out:
            } elseif(isset($_GET["success"]) == "loggedout") {
                echo '<p class="successMess">Successfully logged out. Welcome back!</p>';
            } 
            //When signed up get this message:
            if(isset($_GET["signup"]) == "success") {
                echo '<p class="successMess">Successfully signed up! You can now log in.</p>';
            } 
            //If you type the wrong password or there is no user:
            if(isset($_GET["error"])) {
                if($_GET["error"] == "wrongpassword") {
                    echo '<script>alert("Wrong password!")</script>';
                } elseif($_GET["error"] == "nouser") {
                    echo '<script>alert("User does not exist! Keep in mind that usernames are case sensitive.")</script>';
                }
            }
        ?>

        <p>Click on any topic below to see all its Word Entries. <?php if(!isset($_SESSION['username'])) : ?>
        Log in, or sign up now to create your own!</p>
        <?php endif ?>

    </div>

    <!-----------------Left column displaying all topics:------------------------->
    <div class="displaycontents">
        <div>
            <h2>Categories</h2>

            <?php
                if(isset($_SESSION['usertype'])){
                    $username = $_SESSION['username'];
                } else {
                    $username = "normaluser";
                }

                //Set cookie when users sorts the topics, to save their prefered choice 
                if(isset($_GET['sortTopics'])){
                    setcookie($username, $_GET['sortingOption'], time() + (86400 * 30), "/");
                    header("location: index.php");
                }
                
                $sort = isset($_COOKIE[$username]) ? $_COOKIE[$username] : "chronological";
            ?>
            
            <!--Form for sorting the topics-->
            <form action="index.php" method="get">
            <select name="sortingOption" id="sortingOption" style="font-size: 14px;border-width: 2px; padding: 9px;background:white;border-style: solid;border-color: black;color: #1DA1F2;font-weight: 900;font-family: LGcafe;border-radius: 5px;">
            <option value="chronological" <?php if($sort == "chronological"){echo "selected";}?>>By Chronologically</option>
            <option value="popularity" <?php if($sort == "popularity"){echo "selected";}?>>By popularity</option></select> 
            <input type="submit" name="sortTopics" value="Sort topics" id="kwan">
            </form>

            <!--Feedback to the user to let him/her know what their saved selection is:-->
            <p><?php echo "You prefer sorting by: $sort."?></p>


            <?php //Display topics based on the chosen method to sort
            if($sort == "chronological"){ //If the user chooses chronological
                    
                //Order by the topic title
                $cOrder = "SELECT t.*, u.* FROM topics t INNER JOIN users u 
                           ON t.createdBy = u.userId
                           ORDER BY t.topicTitle;"; 

                echo displayTopics($cOrder); //Function from dbHandler.php.
            
            } elseif($sort == "popularity"){ //If the user chooses popularity

                //Order by topic with most entries
                $pOrder = "SELECT t.*, u.*, COUNT(e.topicId) FROM topics t INNER JOIN users u 
                           ON t.createdBy = u.Userid 
                           LEFT OUTER JOIN entries e ON t.topicId = e.topicId 
                           GROUP BY t.topicId ORDER BY COUNT(e.topicId) DESC;"; 

                echo displayTopics($pOrder); //Function from dbHandler.php.

            } else { 
                //If no sorting has been done, display this:
                $query = "SELECT t.*, u.* FROM topics t INNER JOIN users u ON t.createdBy = u.userId;";
                echo displayTopics($query);
            }
            ?>
        </div>


        <!-----------------Right column displaying entries for the selected topic:------------------------->
        <div>
            <h2>Latest entries:</h2>

            <?php 
            //This will only be displayed when a user has clicked on a topic first:
            if(isset($_GET['topicId'])) {
                $topicId = mysqli_real_escape_string($connection, $_GET['topicId']);

                $sql = "SELECT e.*, t.*, u.* FROM entries e INNER JOIN topics t ON e.topicId = t.topicId 
                        INNER JOIN users u ON e.createdBy = u.userId 
                        WHERE t.topicid = '$topicId' ORDER BY e.dateCreated DESC;"; 

                echo displayEntries($sql); //Function from dbHandler.php

            } else {
                echo "Choose a topic to the left to see the latest entries!";
            }
            ?>
        </div>
    </div>
        
</div>


<footer style="padding-top: 65px;">
    <nav>
            <ul>
                <li style="text-align: center; padding-right: 620px; font-size: 20px;">©2020-2021 NovGenT Dictionary </li>
                <li><a style="font-size: 22px;" href="About.php">About NovGenT</a></li>
                <li><a style="font-size: 22px;" href="guidelines.php">NovGenT's Guidelines</a></li>               
                <li><a href="www.facebook.com" style="font-weight: 700; font-size: 20px;">Facebook</a></li>
                <li><a href="www.twitter.com"  style="font-weight: 700; font-size: 20px; padding-right: 30px;">Twitter</a></li>
            </ul>

    </nav>
</footer>
</body>
</html>