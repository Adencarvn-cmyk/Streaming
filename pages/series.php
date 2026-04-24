<?php 
$page = 'series';
include '../config/database.php';
include '../includes/header.php';


$series_id = $_GET['id'];


$series_query = "SELECT * FROM series WHERE id='$series_id'";
$series = mysqli_fetch_assoc(mysqli_query($conn, $series_query));

$episode_query = 
"SELECT episode.*, watch_history.last_time
FROM episode
LEFT JOIN watch_history 
ON episode.id = watch_history.episode_id 
AND watch_history.user_id = 1
WHERE episode.series_id = '$series_id'
ORDER BY episode.episode_number ASC
";
$episodes = mysqli_query($conn, $episode_query);

$first_episode = null;
if(mysqli_num_rows($episodes) > 0){
    mysqli_data_seek($episodes, 0);
    $first_episode = mysqli_fetch_assoc($episodes);
    mysqli_data_seek($episodes, 0);
}
?>

<div class="series-hero" style="background-image: url('../uploads/thumbnails/<?php echo $series['thumbnail']; ?>');">

    <div class="series-overlay">
        <div class="series-info">

            <h1><?php echo $series['title']; ?></h1>

            <p>Serial Kamen Rider seru dengan aksi dan cerita menarik.</p>

            <?php if($first_episode): ?>
            <a href="episode.php?id=<?php echo $first_episode['id']; ?>" class="btn btn-danger me-2">
                ▶ Mulai Nonton
            </a>
            <?php endif; ?>

            <button class="btn btn-secondary">ℹ Info</button>

        </div>
    </div>

</div>

<div class="container mt-4">

    <h3 class="mb-4">Daftar Episode</h3>

    <div class="row">
    <?php while($row = mysqli_fetch_assoc($episodes)) { ?>
        
        <div class="col-md-3 mb-4">
            <a href="episode.php?id=<?php echo $row['id']; ?>">
                <div class="card">

                    <div class="thumbnail-wrapper">

                        <img src="../uploads/thumbnails/<?php echo $row['thumbnail']; ?>">

                        <?php 
                        $progress = 0;
                        if(isset($row['last_time']) && isset($row['duration']) && $row['duration'] > 0){
                            $progress = min(100, ($row['last_time'] / $row['duration']) * 100);
                        }
                        ?>

                        <div class="progress-bar-custom">
                            <div class="progress-fill" style="width: <?php echo $progress; ?>%"></div>
                        </div>

                        <div class="overlay-title">
                            Episode <?php echo $row['episode_number']; ?>
                        </div>

                    </div>

                </div>
            </a>
        </div>

    <?php } ?>
    </div>

</div>

<?php include '../includes/footer.php'; ?>