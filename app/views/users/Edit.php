<?php

$title = 'Edit user';

ob_start(); ?>
<h1>Edit user</h1>

<form action="index.php?page=users&action=update&id=<?php echo $user['id'];?>" method="POST">
    <div class="form-group">
        <label for="login">login</label>
        <input type="text" class="form-control" id="login" name="login" value="<?php echo $user['login'];?>" required>
    </div>
    <div class="form-group">
        <label for="is_admin">Admin</label>
        <select name="is_admin" id="is_admin" class="form-group">
            <option value="0" <?php if(!$user['is_admin'] ) {echo 'selected';}?>>No</option>
            <option value="1" <?php if($user['is_admin'] ) {echo 'selected';}?>>Yes</option>
        </select>
    <button type="submit" class="btn btn-primary">update</button>
    </div>
</form>

<?php 
    $content = ob_get_clean();

    include 'app/views/layout.php';
?>