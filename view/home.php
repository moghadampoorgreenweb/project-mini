<?php
require_once __DIR__ . "/../config/boot.php";
require_once __DIR__ . "/layout/section/header.php";
//var_dump($_SESSION);

$out_errore = alertMe(isset($_SESSION['error']) ? $_SESSION['error'] : "", isset($_SESSION['massage']) ? $_SESSION['massage'] : "", isset($_SESSION['type']) ? $_SESSION['type'] : "");
unset($_SESSION['error'], $_SESSION['massage'], $_SESSION['massage'], $_SESSION['type']);
echo $out_errore;
?>

<!--table-->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">TODO</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm d-flex " style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                       placeholder="جستجو">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="card-tools">
                            <div class="input-group input-group-sm ml-6 mb-6 " style="width: 280px;">
                                <form action="todo/create.php" method="post">
                                    <input type="submit" class="btn btn-info mb-2 text colorpicker-with-alpha"
                                           value="create todo">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>title</th>
                                <th>description</th>
                                <th>status</th>
                                <th>date</th>
                                <th>details</th>
                            </tr>
                            <?php
                            $data = todoWhere_user_id($_SESSION['user_id']);

                            foreach ($data as $item):
                                $deleted = deleted_at_Where_id($item['id']);
                                if (!$deleted):
                                    ?>
                                    <tr>
                                        <td><?php echo $item['id'] ?></td>
                                        <td><?php echo $item['title'] ?></td>
                                        <td><?php echo $item['description'] ?></td>
                                        <td><?php
                                            echo $item['status'] == 1 ? 'To do list' : '';
                                            echo $item['status'] == 2 ? 'doing' : '';
                                            echo $item['status'] == 3 ? 'done' : '';
                                            echo $item['status'] == 4 ? 'Canceled' : '';
                                            ?>
                                        </td>
                                        <td><?php echo $item['job_date'] ?></td>
                                        <td>
                                            <form action="todo/details.php">
                                                <input type="hidden" name="id_todo" value="<?php echo $item['id'] ?>">
                                                <input type="submit" value="details">
                                            </form>
                                        </td>
                                        <td>
                                            <?php
                                            if ($item['status'] != 3 && $item['status'] != 4):
                                            ?>
                                            <form action="/control/controltodo/allTodo.php">
                                                <input type="hidden" name="type" value="4">
                                                <input type="hidden" name="status" value="1">
                                                <input type="hidden" name="id_todo" value="<?php echo $item['id'] ?>">
                                                <input type="submit" value="To do list" onclick="return confirm('Do you really want to submit the form?');">
                                            </form>
                                        </td>
                                        <td>
                                            <form action="/control/controltodo/allTodo.php">
                                                <input type="hidden" name="type" value="4">
                                                <input type="hidden" name="status" value="2">
                                                <input type="hidden" name="id_todo" value="<?php echo $item['id'] ?>">
                                                <input type="submit" value="doing" onclick="return confirm('Do you really want to submit the form?');">
                                            </form>
                                        </td>

                                        <td>
                                            <form action="/control/controltodo/allTodo.php">
                                                <input type="hidden" name="type" value="4">
                                                <input type="hidden" name="status" value="3">
                                                <input type="hidden" name="id_todo" value="<?php echo $item['id'] ?>">
                                                <input type="submit" value="done" onclick="return confirm('Do you really want to submit the form?');">
                                            </form>
                                        </td>
                                        <td>
                                            <form action="/control/controltodo/allTodo.php">
                                                <input type="hidden" name="type" value="4">
                                                <input type="hidden" name="status" value="4">
                                                <input type="hidden" name="id_todo" value="<?php echo $item['id'] ?>">
                                                <input type="submit" value="Canceled" onclick="return confirm('Do you really want to submit the form?');">
                                            </form>
                                        </td>
                                        <?php
                                        endif;
                                        ?>
                                    </tr>
                                <?php
                                endif;
                            endforeach;
                            ?>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div><!-- /.row -->
    </div>
</section>
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
require_once __DIR__ . "/layout/section/footer.php";
?>
