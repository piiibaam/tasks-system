<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Tasks for Today</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

    <style>
        .password-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .password-wrapper input {
            padding-right: 85px;
        }

        .toggle-password {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            margin: 0;
            padding: 6px 10px;
            background: transparent;
            color: #6658d3;
            border: none;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
        }

        .toggle-password:hover {
            background: #f1efff;
            color: #5144b8;
            transform: translateY(-50%);
        }
    </style>
</head>
<body>

    <header class="topbar">
        <a class="brand" href="<?= site_url('/') ?>">Tasks for Today</a>
        <nav class="nav-links">
            <a href="<?= site_url('/') ?>">Home</a>
            <a href="<?= site_url('tasks') ?>">All Tasks</a>
            <a href="<?= site_url('about') ?>">About</a>
        </nav>
    </header>

    <main class="form-card">
        <p class="subtitle">WELCOME BACK</p>
        <h1>Good to see you.</h1>
        <p class="muted">Log in to manage your tasks and keep things moving.</p>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-error">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success">
                <?= esc(session()->getFlashdata('message')) ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('login') ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="username">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    value="<?= esc(old('username') ?? '') ?>"
                    placeholder="Enter your username"
                    autocomplete="username"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>

                <div class="password-wrapper">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        autocomplete="current-password"
                        required
                    >

                    <button
                        type="button"
                        id="togglePassword"
                        class="toggle-password"
                        aria-label="Show password"
                        aria-pressed="false"
                    >
                        Show
                    </button>
                </div>
            </div>

            <button type="submit" style="width: 100%;">Log In</button>
        </form>

        <p style="text-align: center; margin-top: 24px;">
            <a href="<?= site_url('/') ?>">← Back to Home</a>
        </p>
    </main>

    <footer>
        Tasks for Today · One thing at a time.
    </footer>

    <script>
        const passwordInput = document.getElementById('password');
        const toggleButton = document.getElementById('togglePassword');

        toggleButton.addEventListener('click', function () {
            const isHidden = passwordInput.type === 'password';

            passwordInput.type = isHidden ? 'text' : 'password';
            toggleButton.textContent = isHidden ? 'Hide' : 'Show';
            toggleButton.setAttribute('aria-label',
                isHidden ? 'Hide password' : 'Show password'
            );
            toggleButton.setAttribute('aria-pressed', String(isHidden));
        });
    </script>

</body>
</html>