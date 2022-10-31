<?php 
session_start();
include 'condb.php';
$sql ="SELECT * FROM tb_order WHERE orderID = '" . $_SESSION["order_id"] . "'";
$result = mysqli_query($conn,$sql);
$rs = mysqli_fetch_array($result);
$total_price = $rs['total_price'];
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการสั่งซื้อ</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
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
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">อื่นๆ</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">โปรไฟล์</a></li>
                                <li><a class="dropdown-item" href="#!">ออกจากระบบ</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="fa-solid fa-cart-shopping">
                            การสั่งซื้อเสร็จสมบูรณ์
                            <span class="badge bg-dark text-white ms-1 rounded-pill"></span>
                        </button>
                        
                    </form>
                </div>
            </div>
        </nav>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-10">
    <div class="alert alert-primary h4 text-center mt-4" role="alert">
  การสั่งซื้อเสร็จสมบูรณ์
</div>
<br>
เลขที่การสั่งซื้อ : <?=$rs['orderID']?> <br>
ชื่อ - นามสกุล (ลูกค้า): <?=$rs['cus_name']?> <br>
ที่อยู่จัดส่ง : <?=$rs['address']?> <br>
เบอร์โทรศัพท์ : <?=$rs['telephone']?> <br><br>
หลักฐานชำระเงิน : <br>
<!-- <?php echo '<miage src = "slip/'.$rs['slip'].'" width="100px;" height="100px;" alt="Image">'?> -->
<img src="./slip/<?=$rs['slip']?>" width="200px" height="250"  class="border"> <br>

<br>
<div class="card mb-4 mt-4"> 
  <div class="card-body"> 
<table class="table table-hover">
  <thead>
    <tr>
      <th>รหัสสินค้า</th>
      <th>ชื่อสินค้า</th>
      <th>ราคา</th>  
      <th>จำนวนที่สั่ง</th>
      <th>ราคารวม</th>
    </tr>
  </thead>
  <tbody>
<?php 
$sql1 ="select * from order_detail d,product p where d.pro_id=p.pro_id and orderID= '" .$_SESSION["order_id"]. "'";
$result1 = mysqli_query($conn,$sql1);
while($row=mysqli_fetch_array($result1)){



?>

    <tr>
      <td><?=$row['pro_id']?></td>
      <td><?=$row['pro_name']?></td>
      <td><?=$row['orderPrice']?></td>
      <td><?=$row['orderQty']?></td>
      <td><?=$row['Total']?></td>
      
    </tr>
  </tbody>
<?php
}
?>
</table>

<h6 class = "text-end">รวมเป็นเงิน <?=number_format($total_price,2)?> บาท</h6>
    </div>
  </div>  
<br></br>
<div class="text-center">
<a href="show_product.php" class="btn btn-success">หน้าเเรก</a>
<button onclick="window.print()" class="btn btn-warning">ใบเสร็จ</button>  
  
</div>
  </div>
</div>
</body>
</html>