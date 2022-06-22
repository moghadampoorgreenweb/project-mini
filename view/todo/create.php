
<?php
require_once __DIR__."/../../config/boot.php";
require_once __DIR__."/../layout/section/header.php";

?>




<div class="content-wrapper" style="min-height: 841px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>فرم‌های عمومی</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active">فرم‌های عمومی</li>
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
                            <h3 class="card-title">فرم های عمودی</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="post"  action="./../../control/controltodo/allTodo.php">

                            <input type="hidden" name="type" value="1">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">title</label>
                                    <div class="col-sm-10">
                                        <input name="title" type="text" class="form-control" id="inputEmail3" placeholder="title">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">date</label>
                                    <div class="col-sm-10">
                                        <input name="job_date" type="datetime-local" class="form-control" pattern="MM-DD-YYYY HH:mm">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">desc</label>
                                    <div class="col-sm-10">
                                        <textarea name="description"  class="form-control" id="inputEmail3" placeholder="desc"></textarea>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">status</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="status" aria-label="Default select example">
                                            <option selected value="0">------non------</option>
                                            <option value="1">To do list</option>
                                            <option value="2">doing</option>
                                            <option value="3">done</option>
                                            <option value="4">Canceled</option>
                                        </select>
                                    </div>
                                </div>




                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">ورود</button>
                                <button type="submit" class="btn btn-default float-left">لغو</button>
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
