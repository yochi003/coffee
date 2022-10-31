<?php 
include 'condb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>รายละเอียดสินค้า</title>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">coffee Shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">หน้าเเรก</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">*</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">ประเภท</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="fa-solid fa-cart-shopping">
                            ตะกร้า
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                        
                    </form>
                </div>
            </div>
        </nav>
<body>
    <div class = "container">
        <div class = "row">
        <?php
            $ids=$_GET['id'];
            $sql = "SELECT * FROM product,type WHERE product.type_id= type.type_id and product.pro_id='$ids' ";
            $result = mysqli_query($conn, $sql);
            $row=mysqli_fetch_array($result);
        ?>
            <div class = "col-md-4">
                <img src="admin/image/<?=$row['image']?>" width = "350px" class="mt-2 p-2 my-2 border" />
            </div>
            <div class = "col-md-6">
            ID : <?=$row['pro_id']?> <br>
            <b class = "text-success"><?=$row['pro_name']?></b> <br>
            ประเภทสินค้า : <?=$row['type_name']?> <br>
            ราคา : <b class = "text-danger"><?=$row['price']?></b> บาท <br>
            <a class = "btn btn-outline-success mt-4" href="order.php?id=<?=$row['pro_id']?>">เพิ่มในตะกร้า</a>
            </div>     
        </div>
        <?php
        mysqli_close($conn);
        ?>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>