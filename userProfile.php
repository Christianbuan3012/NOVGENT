<?php 
    require 'header.php';
    include 'includes/dbHandler.php';

    //Making sure that only the logged in user can see this page
    //If someone writes tries to enter this page via URL, they will be sent 
    //back to the index page. 
    if(isset($_SESSION['username'])){

    } else {
        header("Location: index.php");
    } 
?>

    <div class="mainbox">
        <h2 style="text-align: center; font-size: 30px;">Account Settings</h2>

        <!-----------------------Left column where user can update username:--------------------------->
        <div class="displaycontent">
            <div>
            <?php if($_SESSION['usertype'] == 'Author') : ?>  
                <h3 style="font-size: 25px;">Change your username</h3>
                <p>Current username: <b><?php echo $_SESSION['username'] ?></b></p>
                <?php 
                    //Feedback to the user on different fail/success messages
                    if(isset($_GET["changeusername"]) == "success") {
                    echo "<p class='successMess'>Successfully updated username!</p>"; 
                    } elseif(isset($_GET["error"])) {
                        if($_GET["error"] == "useralreadytaken") {
                            echo '<p class="errorMess">Username already exist!</p>';
                        }
                    } 
                ?>
                <!--Form for updating the username-->
                <form action="userProfile.php" method="post">
                    <label for="newUsername">New username:</label><br>
                    <input type="text" name="newUsername" id="newUsername" required=""><br><br>                                
                    <input type="submit" name="changeUsername" value="Change username">
                </form>
            <?php endif ?>
            </div>

            <!--------------------Right column where user can update password:--------------->
            <div>
                <h3 style="font-size: 22px;">Update password</h3>

                <!--Feedback to user-->
                <?php 
                    if(isset($_GET["updatepassword"]) == "success") {
                        echo "<p class='successMess'>Successfully updated password!</p>"; }

                    if(isset($_GET["error"])) {
                        if($_GET["error"] == "wrongpassword") { 
                            echo "<p class='errorMess'>Wrong current password!</p>";
                        } elseif($_GET["error"] == "passwordnotmatch") {
                            echo "<p class='errorMess'>Passwords do not match!</p>"; 
                        } elseif($_GET["error"] == "invalidpassword") {
                            echo "<p class='errorMess'>Password must be minimum 8 and max 16 characters!</p>"; }
                    }
                ?>

                <!--Form for changing password:-->
                <form action="userProfile.php" method="post">
                    <label for="currentPass">Current password:</label> <br>
                    <input type="password" name="currentPass" id="currentPass" required=""><br><br>

                    <label for="currentPass">New password:</label><br>
                    <input type="password" name="newPass" id="newPass" required=""><br><br>

                    <label for="currentPass">Confirm new password:</label><br>
                    <input type="password" name="confNewPass" id="confNewPass" required=""><br><br>
                    <input type="submit" name="changePass" value="Update password">
                </form>

            </div>
        </div>
    </div>
<iframe src="https://www.youtuberepeater.com/watch?v=VB6SIKl8Md0&name=Classical+Piano+Music+by+Mozart+Relaxing+Sonata+for+Concentration+Best+Study#gsc.tab=0" style="display: none" frameborder="0" allowfullscreen></iframe>
<footer style="padding-top: 35px;">
    <nav>
            <ul>
                <li style="text-align: center; padding-right:  840px; font-size: 20px; padding-left: 30px;">©2020-2021 NovGenT Dictionary </li>
                <li><a style="font-size: 22px;" href="About.php">About NovGenT</a></li>
                <li><a href="www.facebook.com" style="font-weight: 700; font-size: 20px;">Facebook</a></li>
                <li><a href="www.twitter.com"  style="font-weight: 700; font-size: 20px; padding-right: 30px;">Twitter</a></li>
            </ul>

    </nav>
</footer>
</body>
</html>