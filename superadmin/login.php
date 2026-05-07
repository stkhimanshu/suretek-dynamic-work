<?php
require_once __DIR__ . '/config/global-variables.php';
session_start();
if (isset($_SESSION['admin_id'])) {
    header("Location:" .  ADMIN_PATH . '/pages/dashboard.php');
    exit;
}

/** @var mysqli $conn */
include("../includes/config.php");

$error = $_SESSION['login_error'] ?? '';

unset($_SESSION['login_error']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $email = mysqli_real_escape_string($conn, $email);

    $query = mysqli_query(
        $conn,
        "SELECT * FROM admin_users
         WHERE email = '$email'
         AND status = 1
         LIMIT 1"
    );

    $user = mysqli_fetch_assoc($query);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['admin_id'] = $user['id'];

        $_SESSION['admin_name'] = $user['name'];

        $_SESSION['admin_role'] = $user['role'];

        header("Location:" .  ADMIN_PATH . '/pages/dashboard.php');
        exit;
    } else {

        $_SESSION['login_error'] = "Invalid email or password";
        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'DM Sans', sans-serif;
        }

        .font-display {
            font-family: 'Cormorant Garamond', serif;
        }

        .form-input:focus {
            outline: none;
            border-color: #a22426;
            box-shadow: 0 0 0 3px rgba(162, 36, 38, 0.08);
        }

        .form-input:focus~.input-icon {
            color: #a22426;
        }

        .input-wrapper:focus-within .input-icon {
            color: #a22426;
        }

        .login-header::before {
            content: '';
            position: absolute;
            top: -40px;
            right: -40px;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            border: 32px solid rgba(255, 255, 255, 0.07);
        }

        .login-header::after {
            content: '';
            position: absolute;
            bottom: -20px;
            left: 60px;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 18px solid rgba(255, 255, 255, 0.06);
        }
    </style>
</head>

<body class="min-h-screen bg-[#f5f5f5] flex items-center justify-center px-4 py-10">

    <div class="w-full max-w-md rounded-2xl overflow-hidden shadow-lg border border-[#ccc]">


        <!-- Body -->
        <div class="bg-white px-10 py-9">
            <?php if (!empty($error)): ?>

                <div class="mb-5 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-600">
                    <?= htmlspecialchars($error) ?>
                </div>

            <?php endif; ?>
            <form method="POST">
                <!-- Email -->
                <div class="mb-5">
                    <label for="email" class="block text-[11px] font-medium text-black uppercase tracking-widest mb-1.5">Email address</label>
                    <div class="input-wrapper relative">
                        <input
                            id="email"
                            type="email"
                            name="email"
                            placeholder="you@example.com"
                            autocomplete="email"
                            class="form-input w-full pl-10 pr-4 py-3 text-sm text-black bg-white border-[1.5px] border-[#ccc] rounded-xl transition-all duration-200 placeholder-[#ccc]" />
                        <i class="ti ti-mail input-icon absolute left-3 top-1/2 -translate-y-1/2 text-[#ccc] text-base pointer-events-none transition-colors duration-200"></i>
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-[11px] font-medium text-black uppercase tracking-widest mb-1.5">Password</label>
                    <div class="input-wrapper relative">
                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="••••••••"
                            autocomplete="current-password"
                            class="form-input w-full pl-10 pr-10 py-3 text-sm text-black bg-white border-[1.5px] border-[#ccc] rounded-xl transition-all duration-200 placeholder-[#ccc]" />
                        <i class="ti ti-lock input-icon absolute left-3 top-1/2 -translate-y-1/2 text-[#ccc] text-base pointer-events-none transition-colors duration-200"></i>
                        <button
                            type="button"
                            id="toggleBtn"
                            aria-label="Show password"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-[#ccc] hover:text-[#a22426] transition-colors duration-200">
                            <i id="eyeIcon" class="ti ti-eye text-base"></i>
                        </button>
                    </div>
                </div>

                <!-- Divider -->
                <div class="border-t border-[#ccc] opacity-40 mb-6"></div>

                <!-- Submit -->
                <button
                    type="submit"
                    class="w-full flex items-center justify-center gap-2 py-3.5 rounded-xl text-white text-[15px] font-medium tracking-wide transition-all duration-200 active:scale-[0.99]"
                    style="background:#a22426;"
                    onmouseover="this.style.background='#8a1e20'"
                    onmouseout="this.style.background='#a22426'"
                    onmousedown="this.style.background='#751a1c'"
                    onmouseup="this.style.background='#8a1e20'">
                    <i class="ti ti-login text-lg"></i>
                    Sign in
                </button>
            </form>
        </div>
    </div>

    <script>
        const toggleBtn = document.getElementById('toggleBtn');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        toggleBtn.addEventListener('click', () => {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            eyeIcon.className = isPassword ? 'ti ti-eye-off text-base' : 'ti ti-eye text-base';
            toggleBtn.setAttribute('aria-label', isPassword ? 'Hide password' : 'Show password');
        });
    </script>

</body>

</html>