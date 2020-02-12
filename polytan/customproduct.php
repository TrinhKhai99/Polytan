<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Custom Product</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="lib/bootstrap-3.1.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/bootstrap-3.1.1-dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    require_once 'connect.php';
    $sql = "select * from product";
    $result=mysqli_query($con,$sql);
    if($result) {
        $arr = mysqli_fetch_array($result);
        $idproduct = $arr['Masanpham'];
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
                <li><a href="addproduct.php?ID=<?php echo $idproduct;?>">Add products</a></li>
                <li><a href="addnews.php">Add  news</a></li>
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
        <h3>Products list</h3> <a style="float: right" href="addproduct.php">Add Product</a>
        <table style="margin-top: 30px" class="table table-bordered table-responsive table-hover table-striped">
            <tr class="danger">
                <td>ID</td>
                <td>Product Name</td>
                <td>Product Portfolio</td>
                <td>Product Details</td>
                <td>Star</td>
                <td>Note</td>
                <td>Image</td>
                <td>Image</td>
                <td colspan="2" class="text-center">Option</td>
            </tr>
            <?php
            require_once 'connect.php';
            $sql = "select * from product";
            $query = mysqli_query($con, $sql);
            while ($num = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $num['Masanpham']; ?></td>
                    <td><?php echo $num['Tensanpham']; ?></td>
                    <td><?php echo $num['Danhmucsanpham']; ?></td>
                    <td><?php echo $num['Chitietsanpham']; ?></td>
                    <td><?php echo $num['Sosao']; ?></td>
                    <td><?php echo cktext($num['Ghichu'],100) ?></td>
                    <td> <?php echo "<img src='"."img/product/".$num['Hinhanh1']."' width=\"38px\" height=\"28px\">"; ?></td>
                    <td> <?php echo "<img src='"."img/product/".$num['Hinhanh2']."' width=\"38px\" height=\"28px\">"; ?></td>
                    <td class="text-center"><a href="deleteproduct.php?ID=<?php echo $num['Masanpham'];?>">Delete</td>
                    <td class="text-center"><a href="updateproduct.php?ID=<?php echo $num['Masanpham'];?>">Update</td>
                </tr>
            <?php }
            ?>
        </table>
    </div>
</div>
</body>
</html>