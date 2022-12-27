<br><?php 
    include('connection.php');
?>
                <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Add New Product</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="name" type="text" placeholder="Enter Item Name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Price</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="price" type="number" placeholder="Enter Price">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Category</label>
                                        <div class="col-sm-10">
                                        <select name="category" id="" class="form-control">
                                        <?php 
                                            $query = mysqli_query($con,"select * from Category");
                                            while($row = mysqli_fetch_array($query))
                                            {
                                            ?>
                                            <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                                            <?php } ?>
                                            </select>
                                           
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                           <select name="status" id="" class="form-control">
                                                <option value="Active">Active</option>
                                                <option value="Non-Active">Non-Active</option>
                                           </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="filename" type="file" placeholder="Select Item Image">
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
                                      $name         = $_POST['name'];
                                      $price        = $_POST['price'];
                                      $cat          = $_POST['category'];
                                      $status       = $_POST['status'];
                                      $imagename    = $_FILES['filename']['name'];
                                      $imagelocation= $_FILES['filename']['tmp_name'];

                                      move_uploaded_file($imagelocation,"Productimages/".$imagename);

                                      $query = mysqli_query($con,"INSERT INTO `product`(`Name`, `price`, `Categroy_id`, `Status`, `Image`) 
                                      VALUES ('$name','$price','$cat','$status','$imagename')");
                                      
                                      if($query>0)
                                      {
                                          echo '<script>swal("Save", "Item Save Successfuly", "success");</script>';
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