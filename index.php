<?php 
$page = 'home';
include 'config/database.php';
include 'includes/header.php';

?>
<div class="container-fluid p-0">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">


    <div class="carousel-inner">

        <!-- SLIDE 1 -->
        <div class="carousel-item active">
            <div class="hero-slide" style="background-image: url('uploads/thumbnails/geats.jpg');">
                <div class="hero-content">
                    <h1>Kamen Rider Geats</h1>
                    <p>Nonton semua seri favoritmu kapan saja.</p>
                </div>
            </div>
        </div>

        <div class="carousel-item">
            <div class="hero-slide" style="background-image: url('uploads/thumbnails/gavv.webp');">
                <div class="hero-content">
                    <h1>Kamen Rider gavv</h1>
                    <p>Petualangan penuh aksi dan misteri.</p>
                </div>
            </div>
        </div>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>

</div>

<?php
$search = isset($_GET['search']) ? $_GET['search'] : '';
$search = mysqli_real_escape_string($conn, $search);

if ($search != '') {
    $query = "SELECT * FROM series WHERE title LIKE '%$search%'";
} else {
    $query = "SELECT * FROM series";
}

$result = mysqli_query($conn, $query);
?>

<?php
$history_query = "SELECT episode.*, series.title AS series_title, series.thumbnail 
FROM watch_history
JOIN episode ON watch_history.episode_id = episode.id
JOIN series ON episode.series_id = series.id
WHERE watch_history.user_id = 1
ORDER BY watch_history.updated_at DESC
LIMIT 5
";

$history = mysqli_query($conn, $history_query);
?>

<?php if(mysqli_num_rows($history) > 0): ?>
<div class="container-fluid px-4 mt-4">
    <h3 class="section-title">▶ Lanjut Nonton</h3>
    <div class="row">

    <?php while($row = mysqli_fetch_assoc($history)) { ?>

        <div class="col-md-2 mb-4">
            <a href="pages/episode.php?id=<?php echo $row['id']; ?>">
                <div class="card position-relative">

                    <img src="uploads/thumbnails/<?php echo $row['thumbnail']; ?>">

                    <div class="overlay-title">
                        <?php echo $row['series_title']; ?> - Ep <?php echo $row['episode_number']; ?>
                    </div>

                </div>
            </a>
        </div>

    <?php } ?>

    </div>
</div>
<?php endif; ?>

<div class="container-fluid px-4">
    <h3 class="section-title">🔥 Series Populer</h3>
    <div class="row">

    <?php if($search != ''): ?>
        <h5>Hasil pencarian: "<?php echo $search; ?>"</h5>
    <?php endif; ?>
    <?php

    while($row = mysqli_fetch_assoc($result)) {
    ?>

        <div class="col-md-2 mb-4">
            <a href="pages/series.php?id=<?php echo $row['id']; ?>">
                <div class="card position-relative">
                    
                    <img src="uploads/thumbnails/<?php echo $row['thumbnail']; ?>">

                    <div class="overlay-title">
                        <?php echo $row['title']; ?>
                    </div>

                </div>
            </a>
        </div>

    <?php } ?>

    </div>
</div>

<?php include 'includes/footer.php'; ?>