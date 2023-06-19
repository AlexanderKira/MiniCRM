<?php

$title = 'Edit page';
ob_start(); 
?>

  <h1 class="mb-4">Edit page</h1>
    <form method="POST" action="index.php?page=pages&action=update">
    <input type="hidden" name="id" value="<?= $page['id'] ?>">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $page['title'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" value="<?= $page['slug'] ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update page</button>
    </form>

<?php $content = ob_get_clean(); 

include 'app/views/layout.php';
?>