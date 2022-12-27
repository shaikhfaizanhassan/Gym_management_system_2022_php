<?php 
    include('connection.php');
?>
<div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">View Product</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="myTable" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Action</th>

                                </tr>
                            </tfoot>
                            <tbody>
                            <?php 
                                    $query = mysqli_query($con,"SELECT pid,Name,price,cname,Status,Image FROM product 
                                    INNER JOIN 
                                    category
                                    ON
                                    product.Categroy_id = category.cid;");
                                    while($row = mysqli_fetch_array($query))
                                    {
                                ?>
                                <tr>
                                    <td><?php echo $row[0] ?></td>
                                    <td><?php echo $row[1] ?></td>
                                    <td><?php echo $row[2] ?></td>
                                    <td><?php echo $row[3] ?></td>
                                    <td><?php echo $row[4] ?></td>
                                    <td><img src="Productimages/<?php echo $row[5] ?>" width="100" height="40" alt=""></td>
                                    

                                    <td>
                                        <a href="#" class="btn btn-success btn-sm">Edit</a>
                                        <a href="#" class="btn btn-info btn-sm">Detail</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>          
                                    </td>
                                </tr>
                                <?php } ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
              
            </div>