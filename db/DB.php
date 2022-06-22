<?php
date_default_timezone_set("Asia/Tehran");
function conect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        return $conn = new PDO("mysql:host=$servername;dbname=pro", $username, $password);
        // set the PDO error mode to exception
        //   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}



function userAll()
{
    $sth = conect()->prepare("SELECT * FROM users");
    $sth->execute();
    return $sth->fetchAll();
}

function todosDeleted_at()
{
    $sth = conect()->prepare("SELECT * FROM `todoes` WHERE todoes.deleted_at");
    $sth->execute();
    return $sth->fetchAll();
}

function deleted_at_Where_id($id)
{
    $sth = conect()->prepare("SELECT * FROM `todoes` WHERE todoes.deleted_at AND id=:id");
    $sth->bindValue(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    return $sth->fetch();
}
function userWhere_id($id)
{
    $sth = conect()->prepare("SELECT * FROM users WHERE id=:id");
    $sth->bindValue(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    return $sth->fetch();
}

function userWhere_email($email)
{
    $sth = conect()->prepare("SELECT * FROM users WHERE email=:email");
    $sth->bindValue(':email', $email);
    $sth->execute();
    return $sth->fetch();
}

function userWhere_emailAndpassword($email, $password)
{
    $sth = conect()->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
    $sth->bindValue(':email', $email);
    $sth->bindValue(':password', $password);
    $sth->execute();
    return $sth->fetch();
}



function createUser($data)
{
    extract($data);
    $sth = conect()->prepare("INSERT INTO `users`(`firstName`,
                    `lastName`, `email`, `password`,
                    `phoneNumber`, `status`, 
                    `created_at`)
        VALUES (:firstName,:lastName,:email,:password,:phoneNumber,:status,:created_at)
                
");
    $sth->bindparam(':firstName', $firstName);
    $sth->bindparam(':lastName', $lastName);
    $sth->bindparam(':email', $email);
    $sth->bindparam(':password', $password);
    $sth->bindparam(':phoneNumber', $phoneNumber);
    $sth->bindparam(':status', $status, PDO::PARAM_INT);
    $dd_date_out = date("Y-m-d H:i:s");
    $sth->bindparam(':created_at', $dd_date_out);
    return $sth->execute();
}

function editUser($data)
{

    extract($data);
    $sth = conect()->prepare("UPDATE `users` SET 
                   `firstName`=:firstName,
                   `lastName`=:lastName,
                    `email`=:email,
                   `password`=:password,
                   `phoneNumber`=:phoneNumber,
                   `status`=:status,
                   `updated_at`=:updated_at
                     WHERE `id`=:id
");
    $sth->bindparam(':firstName', $firstName);
    $sth->bindparam(':lastName', $lastName);
    $sth->bindparam(':email', $email);
    $sth->bindparam(':password', $password);
    $sth->bindparam(':phoneNumber', $phoneNumber);
    $sth->bindparam(':status', $status, PDO::PARAM_INT);
    $dd_date_out = date("Y-m-d H:i:s");
    $sth->bindparam(':updated_at', $dd_date_out);
    $sth->bindparam(':id', $id, PDO::PARAM_INT);
    return $sth->execute() ? true : false;
}

function deleteUser($data)
{
    extract($data);
    $sth = conect()->prepare("DELETE FROM `users` 
                     WHERE `id`=:id
");
    $sth->bindparam(':id', $id, PDO::PARAM_INT);
    return $sth->execute() ? true : false;
}

function deleted_at_user($id)
{
    $sth = conect()->prepare("UPDATE `users` SET 
                   `deleted_at`=:deleted_at
                     WHERE `id`=:id
");
    $dd_date_out = date("Y-m-d H:i:s");
    $sth->bindparam(':deleted_at', $dd_date_out);
    $sth->bindparam(':id', $id, PDO::PARAM_INT);
    return $sth->execute() ? true : false;
}


function todoAll()
{
    $sth = conect()->prepare("SELECT * FROM todoes");
    $sth->execute();
    return $sth->fetchAll();
}

function todoWhere_id($id)
{
    $sth = conect()->prepare("SELECT * FROM todoes WHERE id=:id");
    $sth->bindValue(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    return $sth->fetch();
}

function todoWhere_user_id($user_id)
{
    $sth = conect()->prepare("SELECT * FROM todoes WHERE user_id=:user_id");
    $sth->bindValue(':user_id', $user_id);
    $sth->execute();
    return $sth->fetchAll();
}

function todoWhere_status($status)
{
    $sth = conect()->prepare("SELECT * FROM todoes WHERE status=:status");
    $sth->bindValue(':status', $status);
    $sth->execute();
    return $sth->fetch();
}



function createTodo($data,$user_idd)
{
    extract($data);
 $out_date=$job_date[0].$job_date[1].$job_date[2].$job_date[3].'/'.$job_date[5].$job_date[6].'/'.$job_date[8].$job_date[9].' '.$job_date[11].$job_date[12].$job_date[13].$job_date[14].$job_date[15];

    try {
    $sth = conect()->prepare("INSERT INTO `todoes`(`user_id`, `title`, `description`, `status`, `job_date`, `created_at`)
        VALUES (:user_id,:title,:description,:status,:job_date,:created_at)
                
");
    $sth->bindparam(':user_id', $user_idd,PDO::PARAM_INT);
    $sth->bindparam(':title', $title);
    $sth->bindparam(':description', $description);
    $sth->bindparam(':status', $status,PDO::PARAM_INT);
    $sth->bindparam(':job_date', $out_date);
    $dd_date_out = date("Y-m-d H:i:s");
    $sth->bindparam(':created_at', $dd_date_out);
    return $sth->execute();
    }catch (ErrorException $e){
        echo $e;
    }
}

function editTodo($data,$user_idd)
{
    extract($data);
    $out_date=$job_date[0].$job_date[1].$job_date[2].$job_date[3].'/'.$job_date[5].$job_date[6].'/'.$job_date[8].$job_date[9].' '.$job_date[11].$job_date[12].$job_date[13].$job_date[14].$job_date[15];

    $sth = conect()->prepare("UPDATE `todoes` SET 
                   `title`=:title,
                   `description`=:description,
                   `job_date`=:job_date,
                   `status`=:status,
                   `updated_at`=:updated_at
                     WHERE `id`=:id
");
    $sth->bindparam(':title', $title);
    $sth->bindparam(':description', $description);
    $sth->bindparam(':job_date', $out_date);
    $sth->bindparam(':status', $status, PDO::PARAM_INT);
    $dd_date_out = date("Y-m-d H:i:s");
    $sth->bindparam(':updated_at', $dd_date_out);
    $sth->bindparam(':id', $user_idd, PDO::PARAM_INT);
    return $sth->execute() ? true : false;
}

function deleteTodo($id)
{
    $sth = conect()->prepare("DELETE FROM `todoes` 
                     WHERE `id`=:id
");
    $sth->bindparam(':id', $id, PDO::PARAM_INT);
    return $sth->execute() ? true : false;
}

function deleted_at_Todo($id)
{

    $sth = conect()->prepare("UPDATE `todoes` SET 
                   `deleted_at`=:deleted_at
                     WHERE `id`=:id
");
    $dd_date_out = date("Y-m-d H:i:s");
    $sth->bindparam(':deleted_at', $dd_date_out);
    $sth->bindparam(':id', $id, PDO::PARAM_INT);
    return $sth->execute() ? true : false;
}
function status_Todo($id,$status)
{
    $sth = conect()->prepare("UPDATE `todoes` SET 
                   `status`=:status
                     WHERE `id`=:id
");
    $sth->bindparam(':status', $status,PDO::PARAM_INT);
    $sth->bindparam(':id', $id, PDO::PARAM_INT);
    return $sth->execute() ? true : false;
}















//
//
//$date = date_create('2000-03-14 05:59:00');
//
//$data=[
//    'id'=>4,
//    'user_id'=>4,
//    'title'=>'ttu',
//    'description'=>'dfgg',
//    'status'=>'155',
//    'job_date'=>date_format($date, 'Y-m-d H:i:s')
//];
//
//echo editTodo($data);
//






//echo deleteUser(['id'=>2]);

//$data=[
//    'firstName'=>'amir',
//    'lastName'=>'reza',
//    'email'=>'ang',
//    'password'=>'123',
//    'phoneNumber'=>'344',
//    'status'=>'2',
//];
//$data=[
//    'firstName'=>'ali',
//    'lastName'=>'naghi',
//    'email'=>'email',
//    'password'=>'123',
//    'phoneNumber'=>'1234',
//    'status'=>'1',
//    'id'=>4
//];

//echo "<pre>";
////var_dump($data);
//echo "</pre>";
//var_dump(deleted_at_user(3));

//var_dump(userWhere_email('a'));
//var_dump(userWhere_emailAndpassword('a',1));
//var_dump(userwhere(1));
//var_dump(  select());

//echo date("h:i:sa");
//echo date("Y-m-d H:i:s");
