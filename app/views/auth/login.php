<?php require 'app/views/templates/header.php'; ?>
<h2>Login</h2>
<?php if($message) echo '<p class="error">'.htmlspecialchars($message).'</p>'; ?>
<form method="post">
    <label>Username <input type="text" name="username" required></label><br>
    <label>Password <input type="password" name="password" required></label><br>
    <button type="submit">Login</button>
</form>
<?php require 'app/views/templates/footer.php'; ?>
