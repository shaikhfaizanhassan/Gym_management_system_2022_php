<br><?php 
    include('connection.php');
?>
                <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Add New Staff</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="name" type="text" placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="email" type="text" placeholder="Enter Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="password" type="password" placeholder="Enter Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Contact</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="contact" type="text" placeholder="Enter Contact">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">NIC</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="nic" type="text" placeholder="Enter NIC">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="filename" type="file" placeholder="">
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
                                      $email        = $_POST['email'];
                                      $password     = $_POST['password'];
                                      $contact      = $_POST['contact'];
                                      $nic          = $_POST['nic'];
                                      $imagename    = $_FILES['filename']['name'];
                                      $imagelocation= $_FILES['filename']['tmp_name'];

                                      move_uploaded_file($imagelocation,"uerimages/".$imagename);

                                      $query = mysqli_query($con,"INSERT INTO `staff`(`StaffName`, `email`, `password`, `contact`, `NIC`, `Image`) 
                                      VALUES ('$name','$email','$password','$contact','$nic','$imagename')");
                                      
                                      if($query>0)
                                      {
                                          echo '<script>swal("Save", "Staff Save Successfuly", "success");</script>';
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