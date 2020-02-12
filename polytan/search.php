<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="lib/bootstrap-3.1.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/bootstrap-3.1.1-dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="style.css  ">
</head>
<body>
    <div class="wp-sports">
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
                    <li><a href="product.php">product</a></li>
                    <li><a href="sports.php">sports</a></li>
                    <li><a href="extras.php">extras</a></li>
                    <li><a href="services.php">service</a></li>
                    <li><a href="news.php">new</a></li>
                    <li><a href="why.php">why polytan</a></li>
                    <li><a href="search.php"><i class="fas fa-search"></i></a></li>
                </ul>
            </div>
        </nav>
        <div class="content-sports">
            <h2 class="text-center">Search Product</h2>
            <form action="" method="post" style="margin: 40px 0 80px">
                <table style="margin-top: 30px" class="table table-bordered table-responsive table-hover table-striped">
                    <th colspan="7" class="text-center">
                        <input type="text" name="search" required="" placeholder="Enter to find">
                        <input type="submit" name="btn-search" class="btn btn-info">
                    </th>
                    <tr class="info">
                        <td>ID</td>
                        <td>Product Name</td>
                        <td>Product Portfolio</td>
                        <td>Star</td>
                        <td>Image</td>
                        <td>Option</td>
                    </tr>
                    <?php
                    require_once 'connect.php';
                    if(isset($_POST['btn-search'])){
                        $search = $_POST['search'];
                        $sql = "select * from product WHERE(Tensanpham LIKE '%" . $search . "%') OR (Danhmucsanpham LIKE '%" . $search . "%')";
                        $result = mysqli_query($con, $sql);
                        while ($num = mysqli_fetch_array($result)) {
                            $id = $num['Masanpham'];
                            $tensp = $num['Tensanpham'];
                            $danhmucsp = $num['Danhmucsanpham'];
                            $sosao = $num['Sosao'];
                            $img = $num['Hinhanh1'];
                            ?>
                            <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $tensp ?></td>
                                <td><?php echo $danhmucsp ?></td>
                                <td><?php for ($i=0; $i<=$num['Sosao']; $i++){
                                        echo "<i class=\"fas fa-star\"></i>";
                                    } ?></td>
                                <td> <?php echo "<img src='"."img/product/".$img."' width=\"38px\" height=\"28px\">"; ?></td>
                                <td><a href="#">Detail</a></td>
                            </tr>
                        <?php }
                    }

                    ?>
                </table>
            </form>
        </div>
        <div class="product-icon">
            <ul>
                <li><a href=""><i class="fab fa-facebook-square"></i></a></li>
                <li><a href=""><i class="fab fa-instagram"></i></a></li>
                <li><a href=""><i class="fab fa-youtube"></i></a></li>
                <li><a href=""><i class="fab fa-invision"></i></a></li>
                <li><a href=""><i class="fab fa-github-alt"></i></a></li>
            </ul>
        </div>
        <div class="footer">
            <div class="about-us">
                <h3>ABOUT US</h3>
                <ul>
                    <li><a href="">About Polytan</a></li>
                    <li><a href="">Career</a></li>
                    <li><a href="">Press room</a></li>
                    <li><a href="">Newsletter</a></li>
                </ul>
            </div>
            <div class="visitus">
                <h3>VISIT US</h3>
                <ul>
                    <li><a href=""><i class="fab fa-facebook-square"></i></a></li>
                    <li><a href=""><i class="fab fa-instagram"></i></a></li>
                    <li><a href=""><i class="fab fa-youtube"></i></a></li>
                    <li><a href=""><i class="fab fa-invision"></i></a></li>
                    <li><a href=""><i class="fab fa-github-alt"></i></a></li>
                </ul>
            </div>
            <div class="POLYTANGMBH">
                <h3>POLYTAN GMBH</h3>
                <ul>
                    <li><a href="">Legal notice</a></li>
                    <li><a href="">Data Protection Declaration</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="">Media Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>