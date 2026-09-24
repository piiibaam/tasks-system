<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>

<body>

    <h1>Profile</h1>

    <nav>
        <a href="/">Home</a> |
        <a href="/tasks">All Tasks</a> |
        <a href="/profile">Profile</a> |
        <a href="/about">About</a>
    </nav>

    <hr>

    <h2><?= esc($user['full_name']) ?></h2>

    <p>
        Username:
        <?= esc($user['username']) ?>
    </p>

    <p>
        Email:
        <?= esc($user['email']) ?>
    </p>

    <p>
        Created At:
        <?= esc($user['created_at']) ?>
    </p>

</body>
</html>