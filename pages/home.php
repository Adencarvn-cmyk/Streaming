<div class="container mt-4">
    <h3>Series</h3>
    <div class="row">

    <?php
    include 'config/database.php';
    $query = "SELECT * FROM series";
    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($result)) {
    ?>

        <div class="col-md-3 mb-4">
            <a href="pages/series.php?id=<?php echo $row['id']; ?>">
                <div class="card">
                    <img src="uploads/thumbnails/<?php echo $row['thumbnail']; ?>" class="card-img-top">
                    <div class="card-body">
                        <h5><?php echo $row['title']; ?></h5>
                    </div>
                </div>
            </a>
        </div>

    <?php } ?>

    </div>
</div>