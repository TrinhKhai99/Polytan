<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="lib/bootstrap-3.1.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/bootstrap-3.1.1-dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
                <div class="box">
                    <form method="POST" action="#">
                        <table class="box" cellspacing="0" cellpadding="0">
                            <tr><th class="title">LOGIN</th></tr>
                            <tr><td colspan="2"><input required="" type="text" name="txtusername" placeholder="UserName"></td></tr>
                            <tr><td colspan="2"><input required="" type="Password" name="txtpasswd" placeholder="Password"></td></tr>
                            <tr><td colspan="2"><input type="Submit" name="btnsubmit" value="Login"></td></tr>
                        </table>
                    </form>
                </div>
</body>
</html>
<?php
    if(isset($_POST['btnsubmit'])){
        require_once 'connect.php';
        session_start();
        $username = $_POST['txtusername'];
        $passwd = $_POST['txtpasswd'];
        $sql = "select * from admin WHERE Username= '$username' and Password = '$passwd'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result)>0) {
            $_SESSION['username']= $username;
            header("location:administration.php");
        } else {
            echo "<script>alert('Account or password is incorrect')</script>";
        }
    }
?>