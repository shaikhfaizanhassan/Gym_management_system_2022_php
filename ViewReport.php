<br>
                <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">View Report</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <form class="form-horizontal" action="" method="post">
                                    <div class="form-group row" style="font-weight: bolder;">
                                    
                                        <div class="col-sm-5">
                                        <label>Start</label>
                                            <input class="form-control" type="date" placeholder="Enter Category">
                                        </div>
                                       
                                        <div class="col-sm-5">
                                            <label for="">To</label>
                                            <input class="form-control" type="date" placeholder="Enter Category">
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <div class="form-group row">
                                        <div class="col-sm-12 ml-sm-auto">
                                            <button class="btn btn-success" name="btn" type="submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                                <?php  
                                    if(isset($_POST['btn']))
                                    {
                                        echo "<script>alert('testing')</script>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>