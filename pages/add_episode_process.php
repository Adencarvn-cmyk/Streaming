<?php
include '../config/database.php';

$series_id = $_POST['series_id'];
$title = $_POST['title'];
$episode_number = $_POST['episode_number'];
$video_path = $_POST['video_path'];

// HANDLE UPLOAD THUMBNAIL
$thumbnail_name = $_FILES['thumbnail']['name'];
$tmp = $_FILES['thumbnail']['tmp_name'];

$ext = pathinfo($thumbnail_name, PATHINFO_EXTENSION);
$new_name = uniqid() . "." . $ext;

move_uploaded_file($tmp, "../uploads/thumbnails/" . $new_name);

$query = "INSERT INTO episode (series_id, title, video_path, episode_number, thumbnail)
VALUES ('$series_id', '$title', '$video_path', '$episode_number', '$new_name')";

mysqli_query($conn, $query);

header("Location: add_episode.php");
?>