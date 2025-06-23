<!DOCTYPE html>
<html>
<head>
    <title>Codex Roblox Clone</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
<header>
    <h1>Codex Roblox Clone</h1>
    <nav>
        <?php if(isset($_SESSION['user'])): ?>
            <a href="/?url=auth/logout">Logout (<?php echo htmlspecialchars($_SESSION['user']); ?>)</a>
        <?php else: ?>
            <a href="/?url=auth/login">Login</a> |
            <a href="/?url=auth/register">Register</a>
        <?php endif; ?>
    </nav>
</header>
<main>
