<script>
    function add() {
        alert("d");
    }
</script>
<?php
include('connection.php');
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
<div class="row">
    <div class="col-lg-6">
        <div class="ibox">
            <div class="ibox-body">
                <div class="ibox-head">
                    <div class="ibox-title">Add New Order</div>
                    <div class="ibox-tools">
                        Date : 12-Dec-2022 Time :
                    </div>
                </div>
                <div class="row">
                    <?php
                    $query = mysqli_query($con, "select * from product");
                    while ($r = mysqli_fetch_array($query)) { ?>
                        <div class="col-lg-3">
                            <div class="pbox">
                                <img src="Productimages/<?php echo $r[5] ?>" alt="">
                                <p>
                                    <?php echo $r[1] ?>
                                    <br>
                                    RS <?php echo $r[2] ?>
                                </p>
                                <form action="" method="POST">
                                    <button class="btn btn-success btn1" onclick="add()">Order</button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="ibox">
            <div class="ibox-body">
                <div class="ibox-head">
                    <div class="ibox-title">Add New Order</div>
                    <div class="ibox-tools">
                        Date : 12-Dec-2022 Time :
                    </div>
                </div>
                <div class="row">
                    
                        <div class="col-lg-4">
                            
                        </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>