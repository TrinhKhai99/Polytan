<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update News</title>
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
$sql="select * from news where ID='$id'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result))
    $arr=mysqli_fetch_array($result);
$getTieude = $arr['Tieude'];
$getNoidung = $arr['Noidung'];
$getNgaydang = $arr['Ngaydang'];
$getHinhanh = $arr['Hinhanh'];
?>
<body>
<div class="box">
    <a href="customnews.php">back</a>
    <form action="" method="post" enctype="multipart/form-data">
        <table class="table ">
            <tr>
                <th>Update News</th>
            </tr>
            <tr>
                <td><input class="form-control" required="" value="<?php echo $getTieude; ?>" type="text" name="txttieude" placeholder="Enter Titlte"></td>
            </tr>
            <tr>
                <td><input class="form-control" required="" value="<?php echo $getNoidung; ?>" type="text" name="txtnoidung" placeholder="Enter Content"></td>
            </tr>
            <tr>
                <td><input class="form-control" required="" value="<?php echo $getNgaydang;?>" type="text" name="txtngaydang" placeholder="Enter Date"></td>
            </tr>
            <tr>
                <td><input class="form-control" type="file"  name="image" ></td>
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
    $tieude = $_POST['txttieude'];
    $noidung = $_POST['txtnoidung'];
    $ngaydang = $_POST['txtngaydang'];
    $img = $_FILES['image']['name'];
    $sql = "update news set Tieude = '$tieude', Noidung = '$noidung', Ngaydang = '$ngaydang', Hinhanh = '$img'";
    $result = mysqli_query($con, $sql);
    move_uploaded_file($_FILES['image']['tmp_name'],'img/news/'.$img);
    if($result) {
        echo "<script>alert('Update News successfully')</script>";
    } else {
        echo "<script>alert('Update News failed')</script>";
    }
}
?>