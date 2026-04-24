<?php
include 'config/database.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

$query = "SELECT * FROM series WHERE title LIKE '%$search%' LIMIT 5";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)) {
?>

    <a href="/streaming/pages/series.php?id=<?php echo $row['id']; ?>" class="d-flex align-items-center p-2 text-white search-item">
    
    <img src="/streaming/uploads/thumbnails/<?php echo $row['thumbnail']; ?>" width="40" class="me-2">

    <?php echo $row['title']; ?>

</a>

<?php } ?>