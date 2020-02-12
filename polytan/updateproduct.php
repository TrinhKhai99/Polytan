<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="lib/bootstrap-3.1.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/bootstrap-3.1.1-dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        form {
            margin: 100px auto;
            width: 40%;
            min-height: 300px;
            border: 1px;
            border-radius: 8px;
        }
        form th {
            font-size: 30px;
        }
    </style>
</head>
<?php
session_start();
if(!isset($_SESSION))
{
    header("location:login.php");
}
require_once 'connect.php';
if(!isset($_GET['ID']))
    header("location:index.php");
$id=$_GET['ID'];
$sql="select * from product where Masanpham='$id'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result))
    $arr=mysqli_fetch_array($result);
$getTensp = $arr['Tensanpham'];
$getdanhmucsp = $arr['Danhmucsanpham'];
$getctsp = $arr['Chitietsanpham'];
$getsosao = $arr['Sosao'];
$getghichu = $arr['Ghichu'];
$getimg1 = $arr['Hinhanh1'];
$getimg2 = $arr['Hinhanh2'];
?>
<body>
<div class="box">
    <a href="customproduct.php">back</a>
    <form action="" method="post" enctype="multipart/form-data">
        <table class="table ">
            <tr>
                <th>Update Products</th>
            </tr>
            <tr>
                <td><input class="form-control" required="" value="<?php echo $getTensp; ?>" type="text" name="txttensp" placeholder="Enter Product Name"></td>
            </tr>
            <tr>
                <td><input class="form-control" required="" value="<?php echo $getdanhmucsp; ?>" type="text" name="txtdanhmucsp" placeholder="Enter Portfolio"></td>
            </tr>
            <tr>
                <td><input class="form-control" required="" value="<?php echo $getctsp;?>" type="text" name="txtchitietsp" placeholder="Enter Product Details"></td>
            </tr>
            <tr>
                <td><input class="form-control" required="" value="<?php echo $getsosao;?>" type="text" name="star" placeholder="Enter Star"></td>
            </tr>
            <tr>
                <td><textarea class="form-control" required="" name="txtghichu" placeholder="Enter Note" ></textarea></td>
            </tr>
            <tr>
                <td><input class="form-control" required="" name="image1"  type="file"  ></td>
            </tr>
            <tr>
                <td><input class="form-control" type="file"  name="image2" ></td>
            </tr>
            <tr>
                <td><input class="btn btn-primary " name="btnsubmit" type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
<?php
if(isset($_POST['btnsubmit'])){
    require_once 'connect.php';
    $tensp = $_POST['txttensp'];
    $danhmuc = $_POST['txtdanhmucsp'];
    $chitiet = $_POST['txtchitietsp'];
    $star = $_POST['star'];
    $ghichu = $_POST['txtghichu'];
    $img1 = $_FILES['image1']['name'];
    $img2 = $_FILES['image2']['name'];
    $sql = "update product set Tensanpham = '$tensp', Danhmucsanpham = '$danhmuc', Chitietsanpham = '$chitiet', Sosao = '$star', Ghichu = '$ghichu', Hinhanh1 = '$img1', Hinhanh2 = '$img2'";
    $result = mysqli_query($con, $sql);
    move_uploaded_file($_FILES['image1']['tmp_name'],'img/product/'.$img1);
    move_uploaded_file($_FILES['image2']['tmp_name'],'img/product/'.$img2);
    if($result) {
        echo "<script>alert('Update product successfully')</script>";
    } else {
        echo "<script>alert('Update product failed')</script>";
    }
}
?>