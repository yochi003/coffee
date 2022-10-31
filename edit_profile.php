<?php
session_start();
include 'condb.php';

// if(isset($_SESSION['userid'])){
//     $cusid = $_SESSION['userid'];
//     $sql = "SELECT * FROM customer WHERE customer_id = '$cusid'";
//     $result = mysqli_query($conn,$sql);
//     $rs = mysqli_fetch_array($result);
// }
// $cusid = (isset($_GET['id'])) ? $_GET['id'] : '';
// $sql = "SELECT * FROM customer WHERE customer_id='$cusid' ";
// $result= mysqli_query($conn,$sql);
// $rs=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลลูกค้า</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
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
                            <class=fa-solid fa-cart-shopping>
                            ตะกร้า
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                        
                    </form>
                </div>
            </div>
        </nav>
<body>
<div class="container-fluid px-4">
    <div class="card mb-4 mt-4">
        <div class="card-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            <div class="h2 mb-4 mt-4">
    <b> แก้ไขข้อมูลส่วนตัว </b>
            </div>
                <?php
                include 'condb.php';
                if(isset($_SESSION['userid'])){
                    $cusid = $_SESSION['userid'];
                    $sql = "SELECT * FROM customer WHERE customer_id = '$cusid'";
                    $result = mysqli_query($conn,$sql);
                    $rs = mysqli_fetch_array($result);
                }
                ?>
                <form name="form1" method="post" action="update_profile.php" enctype="multipart/form-data">
                <label> รหัสลูกค้า</label>
                <input type="text" name="cusid" class="form-control" readonly value="<?php echo $rs['customer_id']?>" >
                <label> ชื่อ</label>
                <input type="text" name="name" class="form-control" value="<?php echo $rs['ctm_name']?>" >
                <label> นามสกุล </label>
                <input type="text" name="sname" class="form-control"  value="<?php echo $rs['ctm_sname']?>" > <br>
                <label> ชื่อผู้ใช้ </label>
                <input type="text" name="username" class="form-control" value="<?php echo $rs['ctm_user']?>" > <br>
                <label> รหัสผ่าน </label>
                <input type="password" name="password" class="form-control" value="<?php echo $rs['ctm_password']?>" > <br>
                <label> อีเมล </label>
                <input type="text" name="email" class="form-control" value="<?php echo $rs['ctm_email']?>" > <br>
                <label> เบอร์โทรศัพท์ </label>
                <input type="text" name="phone" class="form-control" value="<?php echo $rs['ctm_phone']?>" > <br>
                <label> ที่อยู่ </label>
                <input type="text" name="address" class="form-control" value="<?php echo $rs['ctm_address']?>" > <br>
                <button type="submit" class="btn btn-warning">แก้ไข</button>
                <a class="btn btn-danger" href="show_product.php" role="button">ยกเลิก</a>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>