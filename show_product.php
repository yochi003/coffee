<?php include 'condb.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>หน้าสินค้า</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
    
            </div>
        </nav>
<header class="bg-light py-3">
            <div class="secondary px-4 px-lg-1 my-2">
                <div class="text-center text-dark">
                    <h1 class="display-4 fw-bolder">Coffee Shop </h1>
                    <p class="lead fw-normal text-dark-50 mb-0">กาแฟของเราเป็นกาแฟที่ดีที่สุดในไทย</p>
                    <img class="img-fluid" src="assets/img/coffee3.png" alt="..." />
                </div>
            </div>
        </header>
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
            $sql = "SELECT * FROM product ORDER BY pro_id";
            $result = mysqli_query($conn, $sql);
            while($row=mysqli_fetch_array($result)){
            ?>
            <div class = "col-sm-3">
                <div class="text-center">
                <img src="admin/image/<?=$row['image']?>" width="300px" height="450" class="mt-5 p-2 my-2 border"> <br>
                ID : <?=$row['pro_id']?><br>
                <b class = "text-success"><?=$row['pro_name']?></b><br>
                ราคา <b class="text-danger"> <?=$row['price']?> </b> บาท <br>
                <a class = "btn btn-outline-success mt-4" href="sh_product_detail.php?id=<?=$row['pro_id']?>">รายละเอียด</a>
                </div>
                <br>
            </div>
            <?php
            } 
            mysqli_close($conn)
            ?>
        </div>
    </div>
     <?php include 'footer.php'; ?>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
