<?php
require_once __DIR__ . "/../../config/boot.php";

function regiser()
{
    var_dump($_POST);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_POST["title"] = test_input($_POST["title"]);
        $_POST["job_date"] = test_input($_POST["job_date"]);
        $_POST["description"] = test_input($_POST["description"]);
        $_POST["status"] = test_input($_POST["status"]);

        if (validation_requre([
            $_POST["title"],
            $_POST["job_date"],
            $_POST["description"],
            $_POST["status"]
        ])) {
            createTodo($_POST, $_SESSION["user_id"]);
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'باموفقیت ثبت شد';
            $_SESSION['type'] = 'success';
            header('Location: /view/home.php');
        } else {
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'مقادیر را وارد نمایید';
            $_SESSION['type'] = 'danger';
        }
    }


}

function edit()
{


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_POST["title"] = test_input($_POST["title"]);
        $_POST["job_date"] = test_input($_POST["job_date"]);
        $_POST["description"] = test_input($_POST["description"]);
        $_POST["status"] = test_input($_POST["status"]);

        if (validation_requre([
            $_POST["title"],
            $_POST["job_date"],
            $_POST["description"],
            $_POST["status"]
        ])) {
           $todo_array= todoWhere_id($_POST['id_todo']);
           if ($todo_array['status'] !=3 && $todo_array['status']!=4 ){
               editTodo($_POST, $_POST['id_todo']);
               $_SESSION['error'] = true;
               $_SESSION['massage'] = 'باموفقیت ثبت شد';
               $_SESSION['type'] = 'success';
               header('Location: /view/home.php');
           }else{
               $_SESSION['error'] = true;
               $_SESSION['massage'] = 'وضعیت نمی تواند تغییر کند';
               $_SESSION['type'] = 'danger';
           }
        } else {
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'مقادیر را وارد نمایید';
            $_SESSION['type'] = 'danger';
        }
    }


}

function delete()
{
    var_dump($_GET);

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $_GET["delete"] = test_input($_GET["delete"]);
        if (validation_requre([
            $_GET["delete"],

        ])) {
            deleted_at_Todo($_GET['delete']);
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'باموفقیت حذف شد';
            $_SESSION['type'] = 'success';
            header('Location: /view/home.php');
        } else {
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'مقادیر را وارد نمایید';
            $_SESSION['type'] = 'danger';
        }
    }
}

function status()
{
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $_GET["status"] = test_input($_GET["status"]);
        if (validation_requre([
            $_GET["status"],

        ])) {
            $todo_array= todoWhere_id($_POST['id_todo']);
            if ($todo_array['status'] !=3 && $todo_array['status']!=4 ){
            status_Todo($_GET['id_todo'],$_GET['status']);
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'باموفقیت';
            $_SESSION['type'] = 'success';
            header('Location: /view/home.php');
            }else{
                $_SESSION['error'] = true;
                $_SESSION['massage'] = 'وضعیت نمی تواند تغییر کند';
                $_SESSION['type'] = 'danger';
            }
        } else {
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'مقادیر را وارد نمایید';
            $_SESSION['type'] = 'danger';
        }
    }
}


switch (true) {
    case isset($_POST['type']) && $_POST['type'] == 1 :
        regiser();
        break;
    case isset($_POST['type']) && $_POST['type'] == 2:
        edit();
        break;
    case isset($_GET['type']) && $_GET['type'] == 3:
        delete();
        break;
    case isset($_GET['type']) && $_GET['type'] == 4:
        status();
        break;
    default:
        $_SESSION['error'] = true;
        $_SESSION['massage'] = 'در خواست نامعتبر';
        $_SESSION['type'] = 'danger';
        header('Location: /index.php');
}






