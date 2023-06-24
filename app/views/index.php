<?php
 if($_SERVER['REQUEST_URI'] == '/minicrm/index.php'){
     header('Location: /minicrm/');
     exit();
}

$title = 'Home page';
ob_start(); 
?>

<h1>Home page</h1>

<?php $content = ob_get_clean(); 

include 'app/views/layout.php';
?>