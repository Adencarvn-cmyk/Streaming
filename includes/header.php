<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gokaisatsu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        padding-top: 60px;
        background-color: #141414;
        color: white;
        font-family: 'Segoe UI', sans-serif;
    }

    .navbar {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;

        background: rgba(0,0,0,0.6);
        backdrop-filter: blur(8px);

        padding: 10px 30px;
    }

    .navbar-brand {
        color: red !important;
        font-weight: bold;
        font-size: 20px;
    }

    .nav-link {
        font-size: 14px;
    }


    .hero-slide {
        height: 70vh;
        width: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        background-color: black;
    }

    .hero-slide::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to right, rgba(0,0,0,0.85) 30%, rgba(0,0,0,0.1) 100%);
    }

    .series-hero {
        height: 70vh;
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .series-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to right, rgba(0,0,0,0.95), rgba(0,0,0,0.4));
        display: flex;
        align-items: center;
    }

    .series-info {
        padding-left: 50px;
        max-width: 500px;
    }

    .series-info h1 {
        font-size: 50px;
        font-weight: bold;
    }

    .hero-series {
        background: url('../uploads/thumbnails/geats.jpg') center/cover;
        height: 60vh;
         height: 70vh;
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .series-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to right, rgba(0,0,0,0.9), rgba(0,0,0,0.3));
        display: flex;
        align-items: center;
    }

    .series-info {
        padding-left: 50px;
        max-width: 500px;
        color: white;
    }

    .series-info h1 {
        font-size: 50px;
        font-weight: bold;
    }

    .series-info p {
        color: #ccc;
    }

    .row {
    margin-left: 0;
    margin-right: 0;
    }

    .hero-content {
        padding-left: 50px;
        position: relative;
        z-index: 2;
        max-width: 500px;
    }

    .hero-content h1 {
        font-size: 50px;
        font-weight: bold;
    }

    .hero-content p {
        color: #ccc;
    }

    .carousel-inner {
        overflow: hidden;
    }
    .carousel-item {
        width: 100%;
    }

    .carousel-item {
        height: 70vh;
    }

    .btn {
        border-radius: 20px;
        padding: 10px 20px;
    }

    .btn-danger {
        background: linear-gradient(45deg, red, darkred);
        border: none;
    }

    .btn-red {
        background-color: red;
        color: white;
        border: none;
    }

    .btn-red:hover {
        background-color: darkred;
    }

    .card {
        background-color: #1c1c1c;
        border: none;
        transition: transform 0.3s, box-shadow 0.3s;
        border-radius: 10px;
        overflow: hidden;
    }

    .card:hover img {
    transform: scale(1.1);
    transition: 0.3s;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0,0,0,0.7);
    }

    .card img {
        height: 250px;
        object-fit: cover;
    }

    .section-title {
        margin: 30px 0 20px;
        font-weight: bold;
    }

    a {
        text-decoration: none;
        color: white;
    }

    .search-box {
        background-color: #222;
        border: none;
        color: white;
    }

    .search-box::placeholder {
        color: #aaa;
    }

    .search-box:focus {
        background-color: #333;
        color: white;
        box-shadow: none;
    }

    .search-result {
        position: absolute;
        top: 100%;
        width: 100%;
        background: #222;
        border-radius: 5px;
        overflow: hidden;
        z-index: 999;
    }

    .search-item:hover {
        background: #333;
    }

    .title-overlay {
    background: rgba(0, 0, 0, 0.7); 
    color: white;
    text-align: center;
    padding: 10px;
    }

    .overlay-title {
    position: absolute;
    bottom: 0;
    width: 100%;
    padding: 12px;
    background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
    color: white;
    font-weight: bold;
    font-size: 16px;
}

    .title-overlay h6 {
        margin: 0;
        font-weight: bold;
    }

    .nav-link:hover {
        color: red !important;
    }

    .nav-link:hover {
        color: red !important;
    }

    ::-webkit-scrollbar {
        width: 0px;
    }

    ::-webkit-scrollbar-track {
        background: #141414;
    }

    ::-webkit-scrollbar-thumb {
        background: #333;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: red;
    }

    .progress-bar-custom {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: rgba(255,255,255,0.2);
    }

    .progress-fill {
        height: 100%;
        background: red;
        width: 0%;
        transition: width 0.3s;
    }
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg px-4 py-3">
    <a class="navbar-brand" href="/streaming/index.php">GOKIL</a>


    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        ☰
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        
        <ul class="navbar-nav me-auto ms-4">
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo BASE_URL; ?>index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/streaming/pages/series_list.php">Series</a>
            </li>
        </ul>

        <div class="position-relative me-3">
            <input 
                id="searchInput"
                class="form-control search-box" 
                type="text" 
                placeholder="Cari series..."
                autocomplete="off"
            >
            <div id="searchResult" class="search-result"></div>
        </div>

        <div class="text-white">
            <?php if(isset($_SESSION['username'])){ ?>
                👤 <?php echo $_SESSION['username']; ?> |
                <a href="/streaming/logout.php" class="text-danger">Logout</a>
            <?php } else { ?>
                <a href="#" class="text-white">Login</a>
            <?php } ?>
        </div>

    </div>
</nav>