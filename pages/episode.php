
<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}
$page = 'episode';
include '../config/database.php';
include '../includes/header.php';

$id = $_GET['id'];

// episode sekarang
$query = "SELECT * FROM episode WHERE id='$id'";
$data = mysqli_fetch_assoc(mysqli_query($conn, $query));


$next_query = "SELECT * FROM episode 
               WHERE series_id='{$data['series_id']}' 
               AND episode_number > '{$data['episode_number']}'
               ORDER BY episode_number ASC 
               LIMIT 1";

$next_episode = mysqli_fetch_assoc(mysqli_query($conn, $next_query));


$prev_query = "SELECT * FROM episode 
               WHERE series_id='{$data['series_id']}' 
               AND episode_number < '{$data['episode_number']}'
               ORDER BY episode_number DESC 
               LIMIT 1";

$prev_episode = mysqli_fetch_assoc(mysqli_query($conn, $prev_query));

$user_id = 1;

$history_query = mysqli_query($conn, "SELECT last_time FROM watch_history WHERE user_id='$user_id' AND episode_id='$id'");

$history = mysqli_fetch_assoc($history_query);
$last_time = $history ? $history['last_time'] : 0;

$query = "SELECT * FROM episode WHERE id='$id'";
$data = mysqli_fetch_assoc(mysqli_query($conn, $query));
?>

<div class="mt-4 d-flex justify-content-center gap-3 flex-wrap">

    <!-- PREVIOUS -->
    <?php if($prev_episode): ?>
        <a href="episode.php?id=<?php echo $prev_episode['id']; ?>" 
           class="btn btn-dark">
           ⬅ Episode Sebelumnya
        </a>
    <?php endif; ?>

    <!-- BACK -->
    <a href="series.php?id=<?php echo $data['series_id']; ?>" 
       class="btn btn-secondary">
       📺 Semua Episode
    </a>

    <!-- NEXT -->
    <?php if($next_episode): ?>
        <a href="episode.php?id=<?php echo $next_episode['id']; ?>" 
           class="btn btn-danger">
           Episode Selanjutnya ▶
        </a>
    <?php endif; ?>

</div>

<div class="container mt-4 text-center">

    <h2><?php echo $data['title']; ?></h2>

    <video width="80%" controls class="mt-3">
        <source src="../<?php echo $data['video_path']; ?>" type="video/mp4">
    </video>

</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const video = document.querySelector("video");
    if(!video) return;

    let lastSave = 0;

    video.addEventListener("timeupdate", function() {
        let now = Math.floor(video.currentTime);

        if(now - lastSave >= 5){
            lastSave = now;

            fetch("../save_progress.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "episode_id=<?php echo $data['id']; ?>&time=" + now
            });
        }
    });

    video.addEventListener("loadedmetadata", function() {
        let lastTime = <?php echo $last_time ?? 0; ?>;

        if(lastTime > 0 && lastTime < video.duration - 10){
            video.currentTime = lastTime;
        }
    });
});
</script>

<?php include '../includes/footer.php'; ?>