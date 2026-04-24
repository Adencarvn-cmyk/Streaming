
<script>
document.getElementById("searchInput").addEventListener("keyup", function() {

    let keyword = this.value;

    if (keyword.length === 0) {
        document.getElementById("searchResult").innerHTML = "";
        return;
    }

    fetch("/streaming/search_ajax.php?search=" + keyword)
        .then(response => response.text())
        .then(data => {
            document.getElementById("searchResult").innerHTML = data;
        });

});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>