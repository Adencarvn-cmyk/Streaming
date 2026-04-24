<form action="add_episode_process.php" method="POST" enctype="multipart/form-data">
    
    <label>Series:</label>
    <select name="series_id">

    </select><br><br>

    <label>Judul Episode:</label>
    <input type="text" name="title"><br><br>

    <label>Nomor Episode:</label>
    <input type="number" name="episode_number"><br><br>

    <label>Path Video (manual):</label>
    <input type="text" name="video_path" placeholder="uploads/videos/ep1.mp4"><br><br>

    <label>Thumbnail:</label>
    <input type="file" name="thumbnail"><br><br>

    <button type="submit">Tambah Episode</button>
</form>