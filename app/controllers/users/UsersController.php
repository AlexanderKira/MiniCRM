<?php

require_once 'app/models/UserModels.php';

class UserController{
    public function index(){
        $userModel = new User();
        $users = $userModel->readAll();
        include 'app/views/users/index.php';
    }

    public function create(){
        include 'app/views/users/create.php';
    }

    public function store(){
        if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['is_admin'])){
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if($password !== $confirm_password){
                echo "Password do not math";
                return;
            }

            $userModel = new User();
            $userModel->create($_POST);
        }
        //после создания пользователя возвращает обратно на предыдущую страницу 
        header('location: index.php?page=users');
    }

    //метод открывает HTML форму
    public function edit(){ 
        $userModel = new User();
        $user = $userModel->read($_GET['id']);

        include 'app/views/users/Edit.php';
    }

    //метод отправляет в БД 
    public function update(){
        $userModel = new User();
        $userModel->update($_GET['id'], $_POST);

        header('location: index.php?page=users');
    }

    public function delete(){
        $userModel = new User();
        $userModel->delete($_GET['id']);

        header('location: index.php?page=users');
    }


}

?>