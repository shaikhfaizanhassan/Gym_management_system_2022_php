<link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <!-- THEME STYLES-->

    <link href="assets/css/main.min.css" rel="stylesheet" />
    <link href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
session_start();
include('connection.php');
if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id' => $_GET["id"],
                'item_name' => $_POST["hiddenname"],
                'item_price' => $_POST["hiddenprice"],
                'item_quantity' => $_POST["qty"],
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {
            echo '<script>alert("Item Already in Use")</script>';
            echo '<script>window.location="http://localhost/RestaurentManagementSystemPHP/Gym_management_system_2022_php/AddOrderImage.php"</script>';
        }
    } else {
        $item_array = array(
            'item_id' => $_GET["id"],
            'item_name' => $_POST["hiddenname"],
            'item_price' => $_POST["hiddenprice"],
            'item_quantity' => $_POST["qty"],
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}
?>
<br>
<style>
   
    .pbox {
        width: 100%;
        height: auto;
        border: 1px solid;
        padding: 6px;
        margin: 5px;
    }

    .pbox img {
        width: 100%;
        height: 125px;
        padding: 10px;
    }

    .pbox p {
        font-weight: bolder;
        text-align: center;
    }

    .btn1 {
        width: 100%;
        color: black;
        font-weight: bolder;
    }

    .btn1:hover {
        cursor: pointer;
    }
</style>
<div class="container-fluid">


<div class="row">
    
    <div class="col-lg-6">
        
        <div class="ibox">
            <div class="ibox-body">
                <div class="ibox-head">
                <h1><a href="index.php">Go Back Dashboard</a></h1>
                    <div class="ibox-title">Add New Order</div>
                    <div class="ibox-tools">
                        Date : 12-Dec-2022 Time :
                    </div>
                </div>
                <div class="row">
                    <?php
                    $query = mysqli_query($con, "select * from product");
                    if(mysqli_num_rows($query)>0)
                    {

                    while ($r = mysqli_fetch_array($query)) 
                    { 
                        ?>
                        <div class="col-lg-3">
                            <form action="AddOrderImage.php?action=add&id=<?php echo $r[0]; ?>" method="POST">
                                <div class="pbox">
                                    <img src="Productimages/<?php echo $r[5] ?>" alt="">
                                    <p>
                                        <?php echo $r[1] ?>
                                        <br>
                                        RS <?php echo $r[2] ?>
                                    </p>
                                    <input type="text" name="qty" value="1">
                                    <input type="hidden" name="hiddenname" value="<?php echo $r[1] ?>" />
                                    <input type="hidden" name="hiddenprice" value="<?php echo $r[2] ?>" />
                                    <br>
                                    <br>
                                    <input type="submit" value="Add To Cart" name="add_to_cart" class="btn btn-success">
                                </div>
                            </form>

                        </div>
                    <?php 
                    } 
                } ?>
                    
                </div>
            </div>
        </div>
    </div>

    <?php 
        if(isset($_GET["action"]))
        {
            if($_GET["action"]=="delete")
            {
                foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                    if($values["item_id"]==$_GET["id"])
                    {
                        unset($_SESSION["shopping_cart"][$keys]);
                        
                        echo '<script>window.location="http://localhost/RestaurentManagementSystemPHP/Gym_management_system_2022_php/AddOrderImage.php"</script>';
        
                    }
                    else
                    {
                        echo "No Data";
                    }
                }
            }
        }
    ?>
    
    <div class="col-lg-6" >
        <div class="ibox">
            <div class="ibox-body">
                <div class="ibox-head">
                    <div class="ibox-title">Add New Order</div>
                    <div class="ibox-tools">
                        Date : 12-Dec-2022 Time :
                    </div>
                </div>
                <div class="row">
             
                    <div class="col-lg-12">
                        <table class="table" style="width: 100%;">
                            <tr>
                                <th >Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            if (!empty($_SESSION["shopping_cart"])) {
                                $total = 0;
                                foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                            ?>
                            <tr>
                                <td><?php echo $values["item_name"] ?></td>
                                <td><?php echo $values["item_quantity"] ?></td>
                                <td><?php echo $values["item_price"] ?></td>
                                <td><?php echo number_format($values["item_quantity"] * $values["item_price"],2); ?></td>
                                <td><a class="btn btn-danger btn-sm" href="AddOrderImage.php?action=delete&id=<?php echo $values["item_id"] ?>">Remove</a></td>

                            </tr> 
                            <?php 
                                $total = $total + ($values["item_quantity"] * $values["item_price"]);
                            ?>
                          
                            <?php }  ?>
                              <tr>
                                <td colspan="2"></td>
                                <td style="font-weight: bolder;">Total</td>
                                <td style="font-weight: bolder; color: red;"><?php echo number_format($total,2); ?></td>
                            </tr>
                            <?php }
                            
                                else
                                {

                                    ?>
                            
                            <tr>
                                <td><h1 style="text-align: center;">No Data</h1></td>
                            </tr>
                            <?php } ?>

                           
                        </table>
                    </div>

            
            </div>
        </div>
    </div>
</div>
</div>
<script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="./assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <script src="./assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="assets/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

 