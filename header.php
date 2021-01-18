<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovGenT Dictionary</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a style="font-size: 25px; font-weight: 900;" href="index.php">NovGenT</a></li>
                <!-- Guest will see home and the only ones to see signup -->
                <li><a href="index.php">Home</a></li>
                <?php if(!isset($_SESSION['username'])) : ?>
                    <li><a href="newAccount.php">Sign up</a></li>
                <?php endif ?>

                <!-- Logged in users will see home, create and profile -->
                <?php if(isset($_SESSION['username'])) : ?>                                      
                    <li><a href="userProfile.php">Account Settings</a></li>
                    <li><a href="create.php">Create an Entry</a></li>
                <?php endif ?>

                <!-- Admin will se everything including link to list of users -->
                <?php if(isset($_SESSION['usertype'])) : ?>
                    <?php if($_SESSION['usertype'] == 'Admin') : ?>
                    <li><a href="userList.php">Manage Users</a></li>
                <?php endif ?>
                <?php endif ?>
            </ul>
        <!--------------------------------------------------------------------->
        
            <!--Search -->
            <form action="search.php" method="POST">
                <input type="search" name="search" id="search" placeholder="Search" required="" oninvalid="this.setCustomValidity('Please enter a word.')" style="width: 400px;">
                <input type="submit" name="searchbutton" value="Search" style="width: 50px; padding-right: 100px;">
            </form>

            <!--Log in or out forms depending on the state -->
            <div class="signInOut">
                <?php 
                if(isset($_SESSION['username'])) { //If a user is logged in, only display logout
                    $username = $_SESSION['username'];
                    echo "
                    <form action='includes/dbHandler.php' method='post'>
                    <input type='submit' name='logout' id='logout' value='Log out'>
                    </form>";
                } else { //If there is no user logged in, display the login form
                    echo '<form action="includes/dbHandler.php" method="post">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" required="">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required="">
                    <input type="submit" name="login" id="submit" value="Log in">
                    </form>';
                }
                ?>
            </div>
        </nav>
    </header>

<div class="loader">
    <img src="loading.gif" alt="Loading..." />
</div>
<script type="text/javascript">
    window.addEventListener("load", function () {
    const loader = document.querySelector(".loader");
    loader.className += " hidden"; // class "loader hidden"
});
</script>