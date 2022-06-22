<?php
require_once __DIR__."/config/boot.php";
if (isset( $_COOKIE['username']) &&
    isset($_COOKIE['password'])){
    $dehash=openssl_decrypt( $_COOKIE['username'] , "AES-256-CBC", 'secret');

    if(userWhere_emailAndpassword($dehash, $_COOKIE['password']))
    {
        $out=userWhere_emailAndpassword($dehash, $_COOKIE['password']);
        $_SESSION['user_id'] = $out["id"];
        $_SESSION['error'] = true;
        $_SESSION['massage'] = 'باموفقیت ثبت شد';
        $_SESSION['type'] = 'success';
        header('Location: /view/home.php');
    }
}
?>
<?php
$out_errore= alertMe(isset($_SESSION['error']) ? $_SESSION['error'] : "", isset($_SESSION['massage']) ? $_SESSION['massage'] : "", isset($_SESSION['type']) ? $_SESSION['type'] : "");
unset($_SESSION['error'],$_SESSION['massage'],$_SESSION['massage'],$_SESSION['type'])
?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>CodePen - Flat Login Form 3.0</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'><link rel="stylesheet" href="./public/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>

<!-- partial:index.partial.html -->
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<?php
echo $out_errore;

?>
<div class="pen-title">
    <h1>Flat Login Form</h1><span>Pen <i class='fa fa-paint-brush'></i> + <i class='fa fa-code'></i> by <a href='http://andytran.me'>Andy Tran</a></span>
</div>
<!-- Form Module-->
<div class="module form-module">
    <div class="toggle"><i class="fa fa-times fa-pencil"></i>
        <div class="tooltip">Click Me</div>
    </div>


    <div class="form">
        <h2>Login to your account</h2>
        <form action="control/controlUser/allUser.php" method="post">
            <input type="hidden" name="type" value="2">
            <input type="text" placeholder="email" name="email"/>
            <input type="password" placeholder="password" name="password"/>
            <div class="form-check" style="margin-top: 20px">
                <label class="form-check-label" for="flexCheckDefault" style="">
                    remeber
                </label>
                <input name="remember" class="form-check-input" type="checkbox" value="1"  style="width: auto; display: inline-block;">
            </div>
            <button>Login</button>
        </form>
    </div>


    <div class="form">
        <h2>Create an account</h2>
        <form action="control/controlUser/allUser.php" method="post">
            <input type="hidden" name="type" value="1">
            <input type="text" placeholder="Username" name="firstName"/>
            <input type="text" placeholder="lastName" name="lastName"/>
            <input type="email" placeholder="Email Address" name="email"/>
            <input type="password" placeholder="password" name="password"/>
            <input type="password" placeholder="re_password" name="re_password"/>
            <input type="number" placeholder="phoneNumber" name="phoneNumber"/>
            <select class="form-select" name="status" aria-label="Default select example">
                <option selected value="0">------non------</option>
                <option value="1">active</option>
                <option value="0">deactive</option>
            </select>

            <button>Register</button>
        </form>
    </div>

</div>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://codepen.io/andytran/pen/vLmRVp.js'></script><script  src="./public/script.js"></script>

</body>
</html>
