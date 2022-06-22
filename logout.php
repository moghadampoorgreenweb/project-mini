<?php

session_start();

session_destroy();


setcookie("username",false);
setcookie("password",false);



header("Location: /index.php");

die;




