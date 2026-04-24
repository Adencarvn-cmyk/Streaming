<?php
include 'config/database.php';

$episode_id = $_POST['episode_id'];
$time = $_POST['time'];
$user_id = 1;

$check = mysqli_query($conn, "SELECT * FROM watch_history WHERE episode_id='$episode_id' AND user_id='$user_id'");

if(mysqli_num_rows($check) > 0){

    mysqli_query($conn, "UPDATE watch_history 
        SET last_time='$time', updated_at=NOW()
        WHERE episode_id='$episode_id' AND user_id='$user_id'");
}else{
    mysqli_query($conn, "INSERT INTO watch_history (episode_id, user_id, last_time, updated_at)
        VALUES ('$episode_id', '$user_id', '$time', NOW())");
}
?>