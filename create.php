<?php 
    require 'header.php';
    include 'includes/connect.php'; 
    require 'includes/dbHandler.php'; 
?>
<iframe src="https://www.youtuberepeater.com/watch?v=VB6SIKl8Md0&name=Classical+Piano+Music+by+Mozart+Relaxing+Sonata+for+Concentration+Best+Study#gsc.tab=0" style="display: none" frameborder="0" allowfullscreen></iframe>
<div class="mainbox">
    <div class="displaycontent">

        <!-------------Left column for creating a new topic------------>
        <div>
            <?php if($_SESSION['usertype'] == 'Admin') : ?>   
            <h2>Create a new Category</h2>

            <!--Form for creating a new topic-->           
            <form action="create.php" method="post">                
            <label for="nametopic">Name of Category:</label><br><br>
            <input type="text" name="namecategory" id="namecategory" placeholder="Horses, Cars..." required=""> <br><br>           
            <input type="submit" name="createTopic" id="createTopic" value="Create topic"><br><br>
            </form>
            <?php endif ?>

            <!--Feedback to the user-->
            <?php 
                if(isset($_GET["createtopic"]) == "success") {
                echo '<p class="successMess">Successfully added new category!</p>'; } 

                if(isset($_GET["error"]) == "titlealreadyexist") {
                    echo '<p class="errorMess">This topic already exist!</p>'; } 
            ?>
        </div>

        <!------------Right column for creating a new entry-------->
        <div>
            <h2>Make a new Word Definition</h2>
            <h4>All the definitions on NovGenT were written by people just like you. Now's your chance to add your own!</h4>
            <h4>Please review NovGenT's content <a href="guidelines.php" style="text-decoration: none;"> guidelines</a> before writing your definition.</h4>
            <?php 
                if(isset($_GET["createentry"]) == "success") {
                    echo '<p class="successMess">Successfully added new entry!</p>'; } 
            ?>
            <?php if($_SESSION['usertype'] == 'Author') : ?>   
            <!--Form for creating new entry-->
            <form action="create.php" method="post" style="text-align: center;">
            <label for="entrytitle">Title:</label> <br><br>
            <input type="text" name="entrytitle" id="entrytitle" placeholder="Horses, Cars..." required=""> <br><br>
            <label for="content">Content:</label><br><br>
            <textarea name="content" id="content" cols="30" rows="10" placeholder="Type your definition and example of how it's used in a sentence here" required=""></textarea> <br><br>
            <label for="topic">Please choose a topic for this entry</label> <br><br>
            <select name="topic" id="topic" style="font-size: 14px;border-width: 2px; padding: 9px;background:white;border-style: solid;border-color: black;color: #1DA1F2;font-weight: 900;font-family: LGcafe;border-radius: 5px;" required="">
            <?php include 'includes/topicsMenu.php'; //The dropdown menu for topics?> 
            </select> <br> <br>
            <input type="submit" name="createEntry" id="createEntry" value="Create entry">
            </form>
            <?php endif ?>
             <?php if($_SESSION['usertype'] == 'Admin') : ?>
            <form action="create.php" method="post" style="text-align: center;">
            <label for="entrytitle">Title:</label> <br><br>
            <input type="text" name="entrytitle" id="entrytitle" placeholder="Horses, Cars..." required=""> <br><br>
            <label for="content">Content:</label><br><br>
            <textarea name="content" id="content" cols="100" rows="10" placeholder="Definition" required=""></textarea> <br><br>
            <label for="topic">Please choose a Category for this entry</label> <br><br>
            <select name="topic" id="topic" style="font-size: 14px;border-width: 2px; padding: 9px;background:white;border-style: solid;border-color: black;color: #1DA1F2;font-weight: 900;font-family: LGcafe;border-radius: 5px;" required="">
            <?php include 'includes/topicsMenu.php'; //The dropdown menu for topics?> 
            </select> <br> <br>            
            <input type="submit" name="createEntry" id="createEntry" value="Create entry">
            </form>                         
            <?php endif ?>
        </div> 

    </div>
</div>
<footer>
    <nav>
            <ul>
                <li style="text-align: center; padding-right: 800px; font-size: 20px;">©2020-2021 NovGenT Dictionary </li>
                <li><a style="font-size: 22px;" href="About.php">About NovGenT</a></li>
                <li><a href="www.facebook.com" style="font-weight: 700; font-size: 20px;">Facebook</a></li>
                <li><a href="www.twitter.com"  style="font-weight: 700; font-size: 20px;">Twitter</a></li>
            </ul>

    </nav>
</footer>
</body>
</html>