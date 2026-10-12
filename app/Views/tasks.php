<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Tasks | Tasks for Today</title>
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

        <div class="page-header">
            <div>
                <h1>My Tasks</h1>
                <p class="subtitle">A little progress each day adds up.</p>
            </div>

            <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                <a class="button button-secondary"
                   href="<?= site_url('archives') ?>">
                    📦 View Archives
                </a>

                <a class="button" href="<?= site_url('tasks/new') ?>">
                    + Add New Task
                </a>
            </div>
        </div>

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
                            <strong>Due date:</strong>
                            <?= esc($task['task_date']) ?>
                        </p>

                        <div class="task-actions">
                            <a
                                class="button button-secondary"
                                href="<?= site_url('tasks/edit/' . $task['id']) ?>"
                            >Edit task</a>

                            <form
                                action="<?= site_url('tasks/archive/' . $task['id']) ?>"
                                method="post"
                            >
                                <?= csrf_field() ?>

                                <button class="button-danger" type="submit">
                                    Archive
                                </button>
                            </form>
                        </div>
                    </article>

                <?php endforeach; ?>
            </div>

        <?php else: ?>

            <section class="empty-state">
                <h2>All caught up?</h2>
                <p>No active tasks right now. Add one whenever you're ready.</p>

                <a class="button" href="<?= site_url('tasks/new') ?>">
                    Create a task
                </a>

                <p style="margin-top: 16px;">
                    <a href="<?= site_url('archives') ?>">
                        View your archived tasks →
                    </a>
                </p>
            </section>

        <?php endif; ?>

    </main>

    <footer>
        Tasks for Today · One thing at a time.
    </footer>

    <div id="archiveModal" class="archive-modal" style="display: none;">
        <div class="archive-modal-content">
            <div class="archive-modal-icon">📦</div>

            <h2>Archive this task?</h2>

            <p>
                This task will be moved to your archives.
                You can still view it there later.
            </p>

            <div class="archive-modal-actions">
                <button type="button"
                        class="button button-secondary"
                        id="cancelArchive">
                    Cancel
                </button>

                <button type="button"
                        class="button button-danger"
                        id="confirmArchive">
                    Yes, Archive
                </button>
            </div>
        </div>
    </div>

    <script>
        const archiveModal = document.getElementById('archiveModal');
        const cancelArchive = document.getElementById('cancelArchive');
        const confirmArchive = document.getElementById('confirmArchive');

        let selectedArchiveForm = null;

        // Open the custom popup when Archive is clicked
        document.querySelectorAll(
            'form[action*="tasks/archive/"]'
        ).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                selectedArchiveForm = form;
                archiveModal.style.display = 'flex';
            });
        });

        // Close the popup when Cancel is clicked
        cancelArchive.addEventListener('click', function () {
            archiveModal.style.display = 'none';
            selectedArchiveForm = null;
        });

        // Submit the selected form when Yes, Archive is clicked
        confirmArchive.addEventListener('click', function () {
            if (selectedArchiveForm) {
                confirmArchive.disabled = true;
                confirmArchive.textContent = 'Archiving...';
                selectedArchiveForm.submit();
            }
        });

        // Close the popup when clicking outside the dialog
        archiveModal.addEventListener('click', function (event) {
            if (event.target === archiveModal) {
                archiveModal.style.display = 'none';
                selectedArchiveForm = null;
            }
        });

        // Close the popup when Escape is pressed
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' &&
                archiveModal.style.display !== 'none') {
                archiveModal.style.display = 'none';
                selectedArchiveForm = null;
            }
        });
    </script>
    </body>
    </html>

</body>
</html>