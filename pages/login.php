<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../includes/header.php';
?>

<style>
    body {
    background: #141414 !important;
}

/* 🔥 Biar gak ketutup navbar / hero */
.login-wrapper {
    position: relative;
    z-index: 9999;
}

/* 🔥 Styling login biar bagus */
.login-card {
    max-width: 400px;
    margin: auto;
    background: #1c1c1c;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0,0,0,0.7);
}
</style>

<div class="container mt-5 pt-5 login-wrapper">
    
    <div class="login-card text-white">
        <h3 class="mb-4 text-center">Login</h3>

        <form action="../process/login_process.php" method="POST">
            
            <input 
                type="email" 
                name="email" 
                class="form-control mb-3" 
                placeholder="Email" 
                required
            >

            <input 
                type="password" 
                name="password" 
                class="form-control mb-3" 
                placeholder="Password" 
                required
            >

            <button class="btn btn-danger w-100">
                Login
            </button>
        </form>

        <p class="mt-3 text-center">
            Belum punya akun?
            <a href="/streaming/pages/register.php" class="text-danger">
                Daftar
            </a>
        </p>
    </div>

</div>

<?php include '../includes/footer.php'; ?>