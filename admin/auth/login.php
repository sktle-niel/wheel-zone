<?php
// Basic scaffold for admin login UI. Hook up authentication logic to the
// form action or handle POST in this file.
session_start();
$loginError = $_SESSION['login_error'] ?? null;
unset($_SESSION['login_error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Two Wheels Zone</title>
    <link rel="shortcut icon" href="../../../assets/branding/lucent.png" type="image/x-icon">
    <link rel="stylesheet" href="../../../assets/bootstrap/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: radial-gradient(circle at 20% 20%, rgba(65, 206, 52, 0.12), transparent 35%),
                        radial-gradient(circle at 80% 0%, rgba(243, 22, 20, 0.08), transparent 30%),
                        #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }
        .login-card {
            max-width: 420px;
            width: 100%;
            border: none;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: 0.5px;
        }
        .brand img {
            width: 42px;
            height: 42px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div class="card login-card p-4 p-md-5 bg-white">
        <div class="mb-4 text-center">
            <div class="brand justify-content-center">
                <img src="../../../assets/branding/lucent.png" alt="Two Wheels Zone">
                <div class="fs-3 mb-0">Two Wheels Zone</div>
            </div>
            <p class="text-muted mt-2 mb-0">Admin Portal Login</p>
        </div>

        <?php if (!empty($loginError)): ?>
            <div class="alert alert-danger py-2" role="alert">
                <?php echo htmlspecialchars($loginError); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="admin@example.com"
                    required
                    autocomplete="username"
                >
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    placeholder="••••••••"
                    required
                    autocomplete="current-password"
                >
            </div>

            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="remember" name="remember">
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>
                <a class="text-decoration-none small" href="#">Forgot password?</a>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-dark">Sign In</button>
            </div>
        </form>
    </div>
</body>
</html>

