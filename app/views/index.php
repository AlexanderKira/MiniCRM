<?php

if($_SERVER['REQUEST_URI'] == '/http://testcrm.test/index.php'){
    header('Location: /testcrm.test/');
    exit();
}

$title = 'Home page';

ob_start(); ?>

<h1>Home page</h1>


<?php 
    $content = ob_get_clean();

    include 'app/views/layout.php';
?>