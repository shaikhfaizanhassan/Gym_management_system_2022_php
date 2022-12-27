<?php 
    include('connection.php');
?>
<br>
                <div class="col-md-12" >
                        <div class="ibox" >
                            <div class="ibox-head" >
                                <div class="ibox-title">Add New Table</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <form class="form-horizontal" action="" method="post" >
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Table</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="table" type="text" placeholder="Enter Table">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10 ml-sm-auto">
                                            <button class="btn btn-success" name="btn" type="submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                                <?php  
                                    if(isset($_POST['btn']))
                                    {
                                        $table = $_POST['table'];
                                        $query = mysqli_query($con,"insert into table_tb (table_name) values ('$table')");
                                        if($query>0)
                                        {
                                            echo '<script>swal("Save", "Table Save Successfuly", "success");</script>';
                                        }
                                        else
                                        {
                                            echo "<h1>Failed</h1>";
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>