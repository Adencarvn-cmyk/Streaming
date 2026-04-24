<?php include '../includes/header.php'; ?>

<div class="container mt-5 pt-5">
    <h2>Daftar</h2>

    <form action="../process/register_process.php" method="POST">
        <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
        <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

        <button class="btn btn-danger w-100">Daftar</button>
    </form>

    <p class="mt-3">Sudah punya akun? <a href="login.php">Login</a></p>
</div>

<?php include '../includes/footer.php'; ?>