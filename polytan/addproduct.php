<?php
require_once("connect.php");
session_start();
if ($_SESSION["username"])
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="lib/bootstrap-3.1.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/bootstrap-3.1.1-dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .box {
            width: 60%;
            min-height: 70vh;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .btn-submit {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
<div class="box">
    <a href="customproduct.php">Back</a>
    <form action="" method="post" enctype="multipart/form-data">
        <table class="table ">
            <tr>
                <th>Add Products</th>
            </tr>
            <tr>
                <td><input class="form-control" required="" type="text" name="txttensanpham" placeholder="Enter Product Name"></td>
            </tr>
            <tr>
                <td><input class="form-control" required="" type="text" name="txtdanhmuc" placeholder="Enter Product Portfolio"></td>
            </tr>
            <tr>
                <td><input class="form-control" required="" type="text" name="txtchitietsp" placeholder="Enter Product Details"></td>
            </tr>
            <tr>
                <td><input class="form-control" required="" type="text" name="star" placeholder="Enter Star"></td>
            </tr>
            <tr>
                <td><textarea class="form-control" required="" name="txtghichu" placeholder="Enter Note" ></textarea></td>
            </tr>
            <tr>
                <td><input class="form-control" required="" type="file" name="image1" ></td>
            </tr>
            <tr>
                <td><input class="form-control" type="file" name="image2" ></td>
            </tr>
            <tr class="btn-submit">
                <td><input class="btn btn-primary" name="btnsubmit" type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
    <?php
    if(isset($_POST['btnsubmit'])){
        require_once 'connect.php';
        $tensp = $_POST['txttensanpham'];
        $danhmuc = $_POST['txtdanhmuc'];
        $chitiet = $_POST['txtchitietsp'];
        $star = $_POST['star'];
        $ghichu = $_POST['txtghichu'];
        $img1 = $_FILES['image1']['name'];
        $img2 = $_FILES['image2']['name'];
        $sql = "insert into product(Tensanpham,Danhmucsanpham,Chitietsanpham,Sosao,Ghichu,Hinhanh1,Hinhanh2) VALUES ('$tensp', '$danhmuc','$chitiet','$star','$ghichu','$img1','$img2')";
        $result = mysqli_query($con, $sql);
        move_uploaded_file($_FILES['image1']['tmp_name'],'img/product/'.$img1);
        move_uploaded_file($_FILES['image2']['tmp_name'],'img/product/'.$img2);
        if($result) {
            echo "<script>alert('Add Product successfully')</script>";
        } else {
            echo "<script>alert('Adding Addproduct failed')</script>";
        }
    }
    ?>
<?php } else{header("location: login.php");}  ?>