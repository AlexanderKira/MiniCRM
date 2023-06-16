<?php

$title = 'Create user';

ob_start(); ?>
<h1>Create user</h1>

<form action="index.php?page=users&action=store" method="POST">
    <div class="form-group">
        <label for="login">login</label>
        <input type="text" class="form-control" id="login" name="login" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="form-group">
        <label for="confirm_password">Confirm password</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
    </div>
    <div class="form-group">
        <label for="is_admin">Admin</label>
        <select name="is_admin" id="is_admin" class="form-group">
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select>
    <button type="submit" class="btn btn-primary">Create</button>
    </div>
</form>

<?php 
    $content = ob_get_clean();

    include 'app/views/layout.php';
?>