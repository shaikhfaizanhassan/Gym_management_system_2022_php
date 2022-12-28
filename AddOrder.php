<?php
include('connection.php');
?>
<br>
<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Add New Order</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" action="" method="post">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Select Table</label>
                    <div class="col-sm-4">
                        <select name="" id="" class="form-control">
                            <?php
                            $query = mysqli_query($con, "select * from table_tb");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-3">
                        <p style="font-weight: bolder;">Date : 25-10-2022 <br>
                            Time : 25-10-2022</p>
                    </div>

                </div>
                <div class="form-group row" style="font-weight: bolder;">

                    <div class="col-sm-4">
                        <label for="">Select Product</label>
                        <select name="" id="proNAme" class="form-control">
                            <option value="" hidden="true">Select Product</option>
                            <?php
                            $query = mysqli_query($con, "select * from product");
                           foreach($query as $row) {
                           echo "<option value='$row[pid]'>$row[Name]</option>";
                                                     
                           }?>
                            
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="">Qty</label>
                        <input class="form-control" value="1" type="text" placeholder="">
                    </div>
                    <div class="col-sm-2">
                        <label for="">Rate</label>
                        <p style="border: 1px solid; color:red; font-size: 18px; height: 32px; text-align: center; line-height: 32px;" id="showprice"></p>
                    </div>
                    <p id="showprice"></p>
                    <div class="col-sm-2">
                        <label for="">Amount</label>
                        <input class="form-control" type="text" readonly placeholder="">
                    </div>
                    <div class="col-sm-2" style="font-weight: bolder;">
                        <label for="">Action</label>
                        <br>
                        <a href="" class="btn btn-success sm-small">+</a>
                        <a href="" class="btn btn-danger sm-small">X</a>

                    </div>
                    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
   
                    <script>
                        $(document).ready(function() {
                            $("#proNAme").on("change",function(){
                                var pid = $("#proNAme").val();
                                $.ajax({
                                    url:"fetchproprice.php",
                                    type:"post",
                                    data:{pro_id:pid},
                                    success:function(mydata){
                                        $("#showprice").html(mydata);
                                    }
                                });
                            });
                        });
                    </script>




                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label"></label>

                    <label class="col-sm-2 col-form-label">Gross Amount</label>

                    <div class="col-sm-4">
                        <input class="form-control" readonly value="" type="text" placeholder="">
                    </div>


                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label"></label>

                    <label class="col-sm-2 col-form-label">S - Charges 2%</label>

                    <div class="col-sm-4">
                        <input class="form-control" readonly value="" type="text" placeholder="">
                    </div>


                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label"></label>

                    <label class="col-sm-2 col-form-label">Discount</label>

                    <div class="col-sm-4">
                        <input class="form-control" value="0" type="number" placeholder="">
                    </div>


                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label"></label>

                    <label class="col-sm-2 col-form-label">Net Amount</label>

                    <div class="col-sm-4">
                        <input class="form-control" style="font-weight: bolder;" readonly value="54547" type="text" placeholder="">
                    </div>


                </div>
                <div class="form-group row">
                    <div class="col-sm-12 ml-sm-auto">
                        <button class="btn btn-success" name="btn" type="submit">Save</button>
                        <button class="btn btn-primary" name="btn" type="submit">Print</button>

                    </div>


                </div>

            </form>
            <?php
            if (isset($_POST['btn'])) {
                echo "<script>alert('testing')</script>";
            }
            ?>
        </div>
    </div>
</div>