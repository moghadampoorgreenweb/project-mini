<?php
require_once __DIR__ . "/../../config/boot.php";


function regiser()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_POST["firstName"] = test_input($_POST["firstName"]);
        $_POST["lastName"] = test_input($_POST["lastName"]);
        $_POST["email"] = test_input($_POST["email"]);
        $_POST["password"] = test_input($_POST["password"]);
        $_POST["status"] = test_input($_POST["status"]);
        if (validation_requre([
            $_POST["firstName"],
            $_POST["lastName"],
            $_POST["email"],
            $_POST["password"],
            $_POST["status"]
        ])) {
            if ($_POST['password'] == $_POST['re_password']) {
                if (!userWhere_email($_POST['email'])) {
                    $_POST['password'] = md5($_POST['password']);
                    createUser($_POST);
                    $_SESSION['error'] = true;
                    $_SESSION['massage'] = 'باموفقیت ثبت شد';
                    $_SESSION['type'] = 'success';
                    header('Location: /index.php');
                } else {
                    $_SESSION['error'] = true;
                    $_SESSION['massage'] = 'ایمیل قبلا ثبت شده است';
                    $_SESSION['type'] = 'danger';
                    header('Location: /index.php');

                }
            } else {
                $_SESSION['error'] = true;
                $_SESSION['massage'] = 'پسورد ها با هم برابر نیستن.';
                $_SESSION['type'] = 'danger';
                header('Location: /index.php');

            }
        } else {
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'مقادیر را وارد نمایید';
            $_SESSION['type'] = 'danger';
            header('Location: /index.php');
        }
    }
}

function login()
{   //    var_dump($_POST);die;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_POST["email"] = test_input($_POST["email"]);
        $_POST["password"] = test_input($_POST["password"]);
        if (validation_requre([
            $_POST["email"],
            $_POST["password"]
        ])) {

            $_POST['password'] = md5($_POST['password']);

            if (userWhere_emailAndpassword($_POST["email"], $_POST["password"])) {
                $data = userWhere_emailAndpassword($_POST["email"], $_POST["password"]);
                if ($_POST['password'] == $data["password"]) {
                    if ($_POST['remember']==1){
                        $hash= openssl_encrypt( $_POST["email"], "AES-256-CBC", 'secret');
                        setcookie("username", $hash, time() + 360000,'/');
                        setcookie("password", $_POST["password"], time() + 360000,'/');
                        $dehash=openssl_decrypt( $_COOKIE['username'] , "AES-256-CBC", 'secret');
                        $_SESSION['user_id']=$dehash;
                    }

                    $_SESSION['user_id'] = $data["id"];
                    $_SESSION['error'] = true;
                    $_SESSION['massage'] = 'باموفقیت ثبت شد';
                    $_SESSION['type'] = 'success';
                    header('Location: /view/home.php');
                }
            } else {
                $_SESSION['error'] = true;
                $_SESSION['massage'] = 'پسورد ها با هم برابر نیستن.';
                $_SESSION['type'] = 'danger';
                header('Location: /index.php');
            }
        } else {
            $_SESSION['error'] = true;
            $_SESSION['massage'] = 'مقادیر را وارد نمایید';
            $_SESSION['type'] = 'danger';
            header('Location: /index.php');
        }
    }

}

switch (true) {
    case $_POST['type'] == 1:
        regiser();
        break;
    case $_POST['type'] == 2:
        login();
        break;
    default:
        $_SESSION['error'] = true;
        $_SESSION['massage'] = 'در خواست نامعتبر';
        $_SESSION['type'] = 'danger';
        header('Location: /index.php');
}







