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
    <title>Add User</title>
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
<body>
    <div class="box">
        <a href="administration.php">Back</a>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="table ">
                <tr>
                    <th>Add User</th>
                </tr>
                <tr>
                    <td><input class="form-control" required="" type="text" name="txtusername" placeholder="Enter Username"></td>
                </tr>
                <tr>
                    <td><input class="form-control" required="" type="password" name="txtpasswd" placeholder="Enter Password"></td>
                </tr>
                <tr>
                    <td><input class="form-control" required="" type="text" name="txtphone" placeholder="Enter Phone"></td>
                </tr>
                <tr>
                    <td><input class="form-control" required="" type="email" name="txtemail" placeholder="Enter Email"></td>
                </tr>
                <tr>
                    <td><input class="form-control" type="file" name="img"></td>
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
        $username = $_POST['txtusername'];
        $passwd = $_POST['txtpasswd'];
        $phone = $_POST['txtphone'];
        $email = $_POST['txtemail'];
        $img = $_FILES['img']['name'];
        $acc = "select * from admin WHERE Username='$username'";
        $result1 = mysqli_query($con, $acc);
        if(mysqli_num_rows($result1)>0) {
            echo "<script>alert('Account already exists')</script>";
        } else {
            $sql = "insert into admin(Username,Password,Phone,Email,Img) VALUES ('$username', '$passwd', '$phone','$email','$img')";
            $result = mysqli_query($con, $sql);
            move_uploaded_file($_FILES['img']['tmp_name'],'img/users/'.$img);
            if($result) {
                echo "<script>alert('Add account successfully')</script>";
            } else {
                echo "<script>alert('Adding account failed')</script>";
            }
        }
    }
?>
<?php } else{header("location: login.php");}  ?>
