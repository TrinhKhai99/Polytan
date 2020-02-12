<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Custom News</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="lib/bootstrap-3.1.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/bootstrap-3.1.1-dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require_once 'connect.php';
$sql = "select * from news";
$result=mysqli_query($con,$sql);
if($result) {
    $arr = mysqli_fetch_array($result);
    $idnews = $arr['ID'];
}
?>
<div class="wp">
    <nav class="navbar navbar-inverse header">
        <div class="navbar-header navbar-left ">
            <button type="button" class="navbar-toggle header-btn" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="polytan.php"><img src="img/logo-polytan-1.svg" style="transform: scale(2.4);" class="navbar-brand header-img"></a>
        </div>
        <div class="collapse navbar-collapse header-list-item" id="myNavbar">
            <ul class="nav navbar-nav navbar-right ">
                <li><a href="administration.php">User administration</a></li>
                <li><a href="customproduct.php">Add products</a></li>
                <li><a href="#">Add  news</a></li>
            </ul>
        </div>
    </nav>
    <div class="administration-body">
        <?php
        require_once "connect.php";
        session_start();

        if(!isset($_SESSION['username']))
        {
            header("location:login.php");
        }
        else
        {
            $ID = $_SESSION['username'];
            $sql = "select * from admin where Username='$ID'";
            $result=mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>0)
            {
                $arr=mysqli_fetch_array($result);
                echo "<h2>Hi: ".$arr['Username']."</h2>"."<a href='logout.php'>Log out</a>";
            }
        }
        ?>
        <h3>News list</h3> <a style="float: right" href="adduser.php">Add Users</a>
        <table style="margin-top: 30px" class="table table-bordered table-responsive table-hover table-striped text-center">
            <tr class="success">
                <td>ID</td>
                <td>Username</td>
                <td>Password</td>
                <td>Phone</td>
                <td>Email</td>
                <td>Image</td>
                <td colspan="2" class="text-center">Option</td>
            </tr>
            <?php
            require_once 'connect.php';
            $sql = "select * from admin";
            $query = mysqli_query($con, $sql);
            while ($num = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $num['ID']; ?></td>
                    <td><?php echo $num['Username']; ?></td>
                    <td><?php echo $num['Password']; ?></td>
                    <td><?php echo $num['Phone']; ?></td>
                    <td><?php echo $num['Email']; ?></td>
                    <td> <?php echo "<img style=\"border-radius: 50%\" src='"."img/users/".$num['Img']."' width=\"40px\" height=\"40px\"> "; ?></td>
                    <td class="text-center"><a href="deleteusers.php?ID=<?php echo $num['ID'];?>">Delete</td>
                    <td class="text-center"><a href="updateuser.php?ID=<?php echo $num['ID'];?>">Update</td>
                </tr>
            <?php }
            ?>
        </table>
    </div>
</div>
</body>
</html>