<?php
include 'includes/connect.php';

/* This is very little code that only displays the titles from topics in
    a select dropdown for the users, when they make a new entry in create.php.*/

$result = $connection->query("SELECT languageId, translations FROM translations");
$checkResult = mysqli_num_rows($result);

if($checkResult < 0) { 
    echo '<p>There are no available topics. Please create one first.</p>';
} else {
    while ($list = $result->fetch_assoc()) {
        $topicId = $list['languageId'];
        $title = $list['translations'];
        echo '<option value="'.$topicId.'">' .$title.'</option>';
    }
}
