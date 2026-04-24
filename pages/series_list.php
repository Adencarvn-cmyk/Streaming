<?php 
include '../config/database.php';
include '../includes/header.php';
?>

<div class="container mt-5 pt-5">

    <h2 class="mb-4">📺 Semua Series</h2>

    <div class="row">
    <?php
    $query = "SELECT * FROM series";
    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($result)) {
    ?>

        <div class="col-md-3 mb-4">
            <a href="series.php?id=<?php echo $row['id']; ?>">
                <div class="card position-relative">
                    
                    <img src="../uploads/thumbnails/<?php echo $row['thumbnail']; ?>">

                    <div class="overlay-title">
                        <?php echo $row['title']; ?>
                    </div>

                </div>
            </a>
        </div>

    <?php } ?>
    </div>

</div>

<?php include '../includes/footer.php'; ?>