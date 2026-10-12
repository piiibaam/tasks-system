<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Task | Tasks for Today</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

    <header class="topbar">
        <a class="brand" href="<?= site_url('/') ?>">Tasks for Today</a>

        <nav class="nav-links">
            <a href="<?= site_url('/') ?>">Home</a>
            <a href="<?= site_url('tasks') ?>">All Tasks</a>
            <a href="<?= site_url('profile') ?>">Profile</a>
            <a href="<?= site_url('about') ?>">About</a>
            <a href="<?= site_url('logout') ?>">Logout</a>
        </nav>
    </header>

    <main class="form-card">
        <h1>Edit Task</h1>
        <p class="subtitle">Make changes to your task details.</p>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-error">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('tasks/update/' . $task['id']) ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="title">Task Title</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="<?= esc(old('title') ?? $task['title']) ?>"
                    maxlength="255"
                    required
                >
            </div>

            <div class="form-group">
                <label for="task_date">Task Date</label>
                <input
                    type="date"
                    id="task_date"
                    name="task_date"
                    value="<?= esc(old('task_date') ?? $task['task_date']) ?>"
                    required
                >
            </div>

            <button type="submit">Save Changes</button>
            <a class="button button-secondary" href="<?= site_url('tasks') ?>">Cancel</a>
        </form>
    </main>

    <footer>
        Tasks for Today · One thing at a time.
    </footer>

</body>
</html>