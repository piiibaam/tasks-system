<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | Task Manager</title>
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
                <p class="subtitle">GET TO KNOW THE PROJECT</p>
                <h1>About This Application</h1>
                <p class="subtitle">
                    A simple space to organize your day, one task at a time.
                </p>
            </div>
        </section>

        <section class="panel">
            <div style="font-size: 2.5rem; margin-bottom: 12px;">
            </div>

            <h2>Tasks for Today Management System</h2>

            <p>
                Welcome to the Tasks for Today Management System!
                This application helps users keep track of their daily
                activities and organize their tasks in one place.
            </p>

            <hr>

            <h2>About the Developer</h2>

            <p>
                This system was developed by <strong>Angela Michaela P. Pizarra</strong>
                as a project for learning web development.
            </p>

            <hr>

            <h2>Technologies Used</h2>

            <div class="task-grid">

                <article class="task-card">
                    <h3>CodeIgniter 4</h3>
                    <p class="task-meta">
                        A PHP framework used to structure the application.
                    </p>
                </article>

                <article class="task-card">
                    <h3>PHP</h3>
                    <p class="task-meta">
                        Handles the application's server-side logic.
                    </p>
                </article>

                <article class="task-card">
                    <h3>MySQL / MariaDB</h3>
                    <p class="task-meta">
                        Stores the application's task and user information.
                    </p>
                </article>

                <article class="task-card">
                    <h3>HTML & CSS</h3>
                    <p class="task-meta">
                        Build and style the pages and user interface.
                    </p>
                </article>

            </div>

            <hr>

            <div style="text-align: center; padding: 10px 0;">
                <p class="muted">
                    Made with care, one step at a time.
                </p>

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