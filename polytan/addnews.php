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
        <title>Add News</title>
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
        <a href="customnews.php">Back</a>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="table ">
                <tr>
                    <th>Add News</th>
                </tr>
                <tr>
                    <td><input class="form-control" required="" type="text" name="txttieude" placeholder="Enter Title"></td>
                </tr>
                <tr>
                    <td><input class="form-control" required="" type="text" name="txtnoidung" placeholder="Enter Content"></td>
                </tr>
                <tr>
                    <td><input class="form-control" required="" type="text" id="myDate" name="txtngaydang" placeholder="Enter DateTime"></td>
                </tr>
                <tr>
                    <td><input type="file" name="image" required=""></td>
                </tr>
                <tr class="btn-submit">
                    <td><input class="btn btn-primary" onclick="myFunction()" name="btnsubmit" type="submit" value="Submit"></td>
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
        $sql = "insert into news(Tieude,Noidung,Ngaydang,Hinhanh) VALUES ('$tieude', '$noidung','$ngaydang','$img')";
        $result = mysqli_query($con, $sql);
        move_uploaded_file($_FILES['image']['tmp_name'],'img/news/'.$img);
        if($result) {
            echo "<script>alert('Add News successfully')</script>";
        } else {
            echo "<script>alert('Adding News failed')</script>";
        }
    }
    ?>
<?php } else{header("location: login.php");}  ?>