<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archives | Tasks for Today</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

    <header class="topbar">
        <a class="brand" href="<?= site_url('/') ?>">Tasks for Today</a>

        <nav class="nav-links">
            <a href="<?= site_url('/') ?>">Home</a>
            <a href="<?= site_url('tasks') ?>">All Tasks</a>
            <a href="<?= site_url('archives') ?>">Archives</a>
            <a href="<?= site_url('profile') ?>">Profile</a>
            <a href="<?= site_url('about') ?>">About</a>
            <a href="<?= site_url('logout') ?>">Logout</a>
        </nav>
    </header>

    <main class="page-container">

        <section class="page-header">
            <div>
                <p class="subtitle">YOUR PAST TASKS</p>
                <h1>Task Archives 📦</h1>
                <p class="subtitle">
                    Tasks you've archived are kept here for future reference.
                </p>
            </div>

            <a class="button button-secondary"
               href="<?= site_url('tasks') ?>">
                ← Back to All Tasks
            </a>
        </section>

        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success">
                <?= esc(session()->getFlashdata('message')) ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-error">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>

        <section class="panel">
            <h2>Archived Tasks</h2>

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

                            <div style="margin-top: 16px; display: flex; flex-wrap: wrap; align-items: center; gap: 12px;">
                                <span style="
                                    display: inline-block;
                                    padding: 5px 12px;
                                    border-radius: 20px;
                                    background: #eeedf7;
                                    color: #6658d3;
                                    font-size: 0.85rem;
                                    font-weight: 600;
                                ">
                                    Archived
                                </span>

                                <form
                                    action="<?= site_url('tasks/unarchive/' . $task['id']) ?>"
                                    method="post"
                                    class="unarchive-form"
                                >
                                    <?= csrf_field() ?>

                                    <button type="submit" class="button button-secondary">
                                        ↩ Unarchive
                                    </button>
                                </form>
                            </div>
                        </article>

                    <?php endforeach; ?>

                </div>

            <?php else: ?>

                <div class="empty-state">
                    <h3>No archived tasks yet</h3>
                    <p>When you archive a task, it will appear here.</p>

                    <a class="button" href="<?= site_url('tasks') ?>">
                        View All Tasks
                    </a>
                </div>

            <?php endif; ?>
        </section>

    </main>

    <footer>
        Tasks for Today · One thing at a time.
    </footer>

    <div id="restoreModal" class="archive-modal" style="display: none;">
        <div class="archive-modal-content">
            <div class="archive-modal-icon">↩</div>

            <h2>Restore this task?</h2>

            <p>
                This task will be moved back to All Tasks.
                You can archive it again anytime.
            </p>

            <div class="archive-modal-actions">
                <button type="button"
                        class="button button-secondary"
                        id="cancelRestore">
                    Cancel
                </button>

                <button type="button"
                        class="button button-danger"
                        id="confirmRestore">
                    Yes, Restore
                </button>
            </div>
        </div>
    </div>

    <script>
        const restoreModal = document.getElementById('restoreModal');
        const cancelRestore = document.getElementById('cancelRestore');
        const confirmRestore = document.getElementById('confirmRestore');

        let selectedRestoreForm = null;

        document.querySelectorAll('.unarchive-form').forEach(function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                selectedRestoreForm = form;
                restoreModal.style.display = 'flex';
            });
        });

        cancelRestore.addEventListener('click', function () {
            restoreModal.style.display = 'none';
            selectedRestoreForm = null;
        });

        confirmRestore.addEventListener('click', function () {
            if (selectedRestoreForm) {
                confirmRestore.disabled = true;
                confirmRestore.textContent = 'Restoring...';
                selectedRestoreForm.submit();
            }
        });

        restoreModal.addEventListener('click', function (event) {
            if (event.target === restoreModal) {
                restoreModal.style.display = 'none';
                selectedRestoreForm = null;
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' &&
                restoreModal.style.display !== 'none') {
                restoreModal.style.display = 'none';
                selectedRestoreForm = null;
            }
        });
    </script>

</body>
</html>