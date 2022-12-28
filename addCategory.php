<?php
include('connection.php');
?>
<br>
<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Add New Category</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" action="" method="post">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="cname" type="text" autocomplete="TRUE" placeholder="Enter Category">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 ml-sm-auto">
                        <button class="btn btn-success" name="btn" type="submit">Save</button>
                    </div>
                </div>
            </form>
            <?php
            if (isset($_POST['btn'])) {
                $cname = $_POST['cname'];
                $query = mysqli_query($con, "insert into category (cname) values ('$cname')");
                if ($query > 0) {
                    echo '<script>swal("Save", "Catgegory Save Successfuly", "success");</script>';
                } else {
                    echo "<h1>Failed</h1>";
                }
            }
            ?>
        </div>
    </div>
</div>