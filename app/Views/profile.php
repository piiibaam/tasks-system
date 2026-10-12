<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Task Manager</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

    <header class="topbar">
        <a class="brand" href="<?= site_url('/') ?>">Task Manager</a>

        <nav class="nav-links">
            <a href="<?= site_url('/') ?>">Home</a>
            <a href="<?= site_url('tasks') ?>">All Tasks</a>
            <a href="<?= site_url('profile') ?>">Profile</a>
            <a href="<?= site_url('about') ?>">About</a>
            <a href="<?= site_url('logout') ?>">Logout</a>
        </nav>
    </header>

    <main class="page-container">

        <section class="page-header">
            <div>
                <p class="subtitle">YOUR ACCOUNT</p>
                <h1>My Profile</h1>
                <p class="subtitle">
                    Here's a quick look at your account information.
                </p>
            </div>
        </section>

        <section class="form-card">

            <div style="text-align: center; margin-bottom: 28px;">
                <div style="
                    width: 100px;
                    height: 100px;
                    margin: 0 auto 16px;
                    border-radius: 50%;
                    background: #eeedf7;
                    color: #6658d3;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 2.5rem;
                    font-weight: 700;
                ">
                    <?= esc(strtoupper(substr($user['full_name'], 0, 1))) ?>
                </div>

                <h2><?= esc($user['full_name']) ?></h2>

                <p class="muted">
                    Member of Task Manager
                </p>
            </div>

            <hr>

            <div class="form-group">
                <label>Full Name</label>
                <div class="panel">
                    <?= esc($user['full_name']) ?>
                </div>
            </div>

            <div class="form-group">
                <label>Username</label>
                <div class="panel">
                    <?= esc($user['username']) ?>
                </div>
            </div>

            <div class="form-group">
                <label>Email Address</label>
                <div class="panel">
                    <?= esc($user['email']) ?>
                </div>
            </div>

            <div class="form-group">
                <label>Account Created</label>
                <div class="panel">
                    <?= esc($user['created_at']) ?>
                </div>
            </div>

            <hr>

            <div style="text-align: center;">
                <a class="button" href="<?= site_url('/') ?>">
                    Back to Home
                </a>
            </div>

        </section>

    </main>

    <footer>
        Task Manager · One step at a time.
    </footer>

</body>
</html>