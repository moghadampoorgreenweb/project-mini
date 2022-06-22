<?php
require_once __DIR__."/../layout/section/header.php";
$todo=  todoWhere_id($_GET['id_todo']);
$userdata=userWhere_id($todo['user_id']);
//var_dump($todo);
?>


    <div class="card card-widget" >
        <div class="card-header">
            <div class="user-block">
                <img class="img-circle" src="../../public/dist/img/user1-128x128.jpg" alt="User Image">
                <span class="username"><a href="#"><?php echo $userdata['firstName'].$userdata['lastName'] ?></a></span>
                <span class="description"></span>
            </div>
            <!-- /.user-block -->
            <div class="card-tools">

                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>

            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body" >
            <!-- post text -->
            <span class="float-left text-muted">:title</span>
            <h5> <?php echo $todo['title']?>:title</h5> <span class="float-left text-muted">:description</span>
            <p><?php echo $todo['description']?></p> <span class="float-left text-muted">:job_date</span>
            <p><?php
                echo $todo['job_date']
                ?></p> <span class="float-left text-muted">:status</span>
            <p><?php
                 echo $todo['status']==1?'To do list':'';
                 echo $todo['status']==2?'doing':'';
                 echo $todo['status']==3?'done':'';
                 echo $todo['status']==4?'Canceled':'';
                ?></p> <span class="float-left text-muted">:created_at</span>
            <p><?php echo $todo['created_at']?></p>

            <!-- Social sharing buttons -->
            <?php
            if ( $todo['status']!=3 && $todo['status']!=4):
            ?>
            <button type="button" class="btn btn-default btn-sm">  <form action="edit.php">
                    <input type="hidden" name="edit" value="<?php echo $todo['id'] ?>">
                    <input type="submit" onclick="return confirm('Do you really want to submit the form?');" value="edit">
                </form></button>
            <button type="button" class="btn btn-default btn-sm">
                <form action="/control/controltodo/allTodo.php">
                    <input type="hidden" name="type" value="3">
                    <input type="hidden" name="delete" value="<?php echo $todo['id'] ?>">
                    <input type="submit" onclick="return confirm('Do you really want to submit the form?');" value="delete">
                </form></button>
                <script>
                    function validate(form) {
                        if(!valid) {
                            alert('Please correct the errors in the form!');
                            return false;
                        }
                        else {
                            return confirm('Do you really want to submit the form?');
                        }
                    }
                </script>

                <?php
               endif;
                ?>
        </div>
    </div>


<?php
if (isset($_GET['okcheangeStatus'])) {
    echo '
<script>
alert("با موفقیت ");
window.location.href = "details.php";
</script>';
}
require_once __DIR__."/../layout/section/footer.php";
?>