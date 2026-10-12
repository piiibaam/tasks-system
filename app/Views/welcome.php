<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Task Manager</title>
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
                <p class="subtitle">YOUR PERSONAL WORKSPACE</p>
                <h1>Today's Overview ☀️</h1>
                <p class="subtitle">
                    Here's what you have planned for today.
                </p>
            </div>

            <a class="button" href="<?= site_url('tasks/new') ?>">
                + Add New Task
            </a>
        </section>

        <section class="panel">
            <p class="muted">
                <?= esc(date('l, F j, Y')) ?>
            </p>

            <h2>Today's Tasks</h2>

            <?php if (!empty($tasks)): ?>

                <div class="task-grid">

                    <?php foreach ($tasks as $task): ?>

                        <article class="task-card">
                            <h3><?= esc($task['title']) ?></h3>

                            <p class="task-meta">
                                <strong>Status:</strong>
                                <?= esc($task['status']) ?>
                            </p>

                            <p class="task-meta">
                                <strong>Date:</strong>
                                <?= esc($task['task_date']) ?>
                            </p>

                            <div class="task-actions">
                                <a
                                    class="button button-secondary"
                                    href="<?= site_url('tasks/edit/' . $task['id']) ?>"
                                >
                                    Edit Task
                                </a>
                            </div>
                        </article>

                    <?php endforeach; ?>

                </div>

            <?php else: ?>

                <div class="empty-state">
                    <h3>Nothing on your plate today! ✨</h3>
                    <p>You have no tasks scheduled for today.</p>
                    <p>Enjoy the breathing room or add a new task.</p>

                    <a class="button" href="<?= site_url('tasks/new') ?>">
                        Create a Task
                    </a>
                </div>

            <?php endif; ?>
        </section>

    </main>

    <footer>
        Task Manager · One step at a time.
    </footer>

</body>
</html>