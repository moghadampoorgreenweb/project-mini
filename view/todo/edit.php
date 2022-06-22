
<?php
require_once __DIR__."/../../config/boot.php";
require_once __DIR__."/../layout/section/header.php";
$data_todo=todoWhere_id($_GET['edit']);
//var_dump($data_todo);
//var_dump($data_todo['job_date']);

$data_todo['job_date']= str_replace(' ','T',$data_todo['job_date'] );
?>




<div class="content-wrapper" style="min-height: 841px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>فرم ویرایش</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active">فرم‌های ویرایش</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->

                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6" >
                    <!-- Horizontal Form -->
                    <div class="card card-info" >
                        <div class="card-header">
                            <h3 class="card-title">ویرایش</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="post"  action="./../../control/controltodo/allTodo.php">
                            <input type="hidden" name="type" value="2">
                            <input type="hidden" name="id_todo" value="<?php echo $data_todo['id'] ?>">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">title</label>
                                    <div class="col-sm-10">
                                        <input name="title" type="text" class="form-control" id="inputEmail3" placeholder="title" value="<?php echo $data_todo['title'] ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">date</label>
                                    <div class="col-sm-10">
                                        <input name="job_date" type="datetime-local" class="form-control" pattern="MM-DD-YYYY HH:mm" value="<?php echo $data_todo['job_date']?>">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">desc</label>
                                    <div class="col-sm-10">
                                        <textarea name="description"  class="form-control" id="inputEmail3" placeholder="desc"><?php echo $data_todo['description']?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">status</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="status" aria-label="Default select example">
                                            <option selected value="0">------non------</option>
                                            <option value="1" <?php echo $data_todo['status']==1?'selected':'' ?> >To do list</option>
                                            <option value="2" <?php echo $data_todo['status']==2?'selected':'' ?> >doing</option>
                                            <option value="3" <?php echo $data_todo['status']==3?'selected':'' ?> >done</option>
                                            <option value="4" <?php echo $data_todo['status']==4?'selected':'' ?> >Canceled</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">ویرایش</button>
                                <a href="/view/home.php" type="submit" class="btn btn-default float-left">لغو</a>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->
                    <!-- general form elements disabled -->

                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>














<?php
require_once __DIR__."/../layout/section/footer.php";
?>
