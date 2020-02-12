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
<?php
    session_start();
    if(!isset($_SESSION))
    {
        header("location:login.php");
    }
    require_once 'connect.php';
    $account=$_SESSION['username'];
    $sql="select * from admin where Username='$account'";

    $result=mysqli_query($con,$sql);
    if($result)
    {
        $arr=mysqli_fetch_array($result);
        $name=$arr['Username'];

    }
    if(!isset($_GET['ID']))
        header("location:index.php");
    $id=$_GET['ID'];
    $sql="select * from admin where ID='$id'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result))
        $arr=mysqli_fetch_array($result);
        $getusername = $arr['Username'];
        $getpasswd = $arr['Password'];
?>
<body>
<div class="box">
    <a href="administration.php">back</a>
    <form action="" method="post">
        <table class="table ">
            <tr>
                <th>Update User</th>
            </tr>
            <tr>
                <td><input class="form-control" required="" value="<?php echo $getusername ?>" type="text" name="txtusername" placeholder="Enter Username"></td>
            </tr>
            <tr>
                <td><input class="form-control" required="" value="<?php echo $getpasswd ?>" type="password" name="txtpasswd" placeholder="Enter Password"></td>
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
    $acc = "select * from admin WHERE Username='$username'";
    $result1 = mysqli_query($con, $acc);
    if(mysqli_num_rows($result1)>0) {
        echo "<script>alert('Account already exists')</script>";
    } else {
        $sql = "update admin set Username = '$username', Password = '$passwd' WHERE ID= '$id'";
        $result = mysqli_query($con, $sql);
        if($result) {
            echo "<script>alert('Update account successfully')</script>";
        } else {
            echo "<script>alert('Update account failed')</script>";
        }
    }
}
?>