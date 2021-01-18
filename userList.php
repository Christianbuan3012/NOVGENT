
<?php 
    require 'header.php';
    include 'includes/dbHandler.php'; 
        
    //Extra seurity making sure that only admins can enter this page.
    if(isset($_SESSION['usertype'])){
        if($_SESSION["usertype"] == 'Admin'){

        } else {
            header("Location: index.php");
        }
    }
?>
 <iframe src="https://www.youtuberepeater.com/watch?v=VB6SIKl8Md0&name=Classical+Piano+Music+by+Mozart+Relaxing+Sonata+for+Concentration+Best+Study#gsc.tab=0" style="display: none" frameborder="0" allowfullscreen></iframe>   
<div class="mainbox">
    <h2>List of all users in the system</h2>
    <p>Keep in mind that if you delete a user that has created Category or Word Entries, these
    will be deleted as well.</p><br><br>

    <table>
        <tr>
            <th>User id</th>
            <th>Username</th>
            <th>Type of user</th>
            </tr>

        <?php 
            $sql = "SELECT userId, username, type FROM users WHERE userId > 1;";
            $result = mysqli_query($connection, $sql); //Connection from connect.php
            $checkResult = mysqli_num_rows($result); //Check if we have any result at all

            if($checkResult > 0) {      //If there are more than 0 results
                while($row = mysqli_fetch_assoc($result)) { //Put them into an assosiative array
                    echo "<tr>
                    <td>" . $row['userId'] . "</td>
                    <td>" . $row["username"] . "</td>
                    <td>" . $row["type"] . "</td>
                    <td> <form method='post'><input type='submit' name='deleteUser' value='Delete user'><input type='hidden' name='userId' value='" . $row['userId'] . "'></form></td></tr>";
                }
            }
            if(isset($_GET["deluser"]) == "success") {
                echo '<p class="successMess">Successfully deleted user!</p>';
                }
        ?>

    </table>


</div>
<footer style="padding-top: 200px;">
    <nav>
            <ul>
                <li style="text-align: center; padding-right: 830px; font-size: 20px; padding-left: 30px;">©2020-2021 NovGenT Dictionary </li>
                <li><a style="font-size: 22px;" href="About.php">About NovGenT</a></li>
                <li><a href="www.facebook.com" style="font-weight: 700; font-size: 20px;">Facebook</a></li>
                <li><a href="www.twitter.com"  style="font-weight: 700; font-size: 20px; padding-right: 30px;">Twitter</a></li>
            </ul>

    </nav>
</footer>
</body>
</html> 