<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
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
        <div class="content-sports-list-item">
            <?php
            require_once 'connect.php';
            $page=1;//khởi tạo trang ban đầu
            $limit=6;//số bản ghi trên 1 trang (2 bản ghi trên 1 trang)


            $arrs_list = mysqli_query($con,"select Masanpham from product");
            $total_record = mysqli_num_rows($arrs_list);//tính tổng số bản ghi có trong bảng khoahoc

            $total_page=ceil($total_record/$limit);//tính tổng số trang sẽ chia

            //xem trang có vượt giới hạn không:
            if(isset($_GET["page"]))
                $page=$_GET["page"];//nếu biến $_GET["page"] tồn tại thì trang hiện tại là trang $_GET["page"]
            if($page<1) $page=1; //nếu trang hiện tại nhỏ hơn 1 thì gán bằng 1
            if($page>$total_page) $page=$total_page;//nếu trang hiện tại vượt quá số trang được chia thì sẽ bằng trang cuối cùng

            //tính start (vị trí bản ghi sẽ bắt đầu lấy):
            $start=($page-1)*$limit;

            //lấy ra danh sách và gán vào biến $arrs:
            $arrs = mysqli_query($con,"select * from product limit $start,$limit");



            $sql = "select * from product";
            $result1 = mysqli_query($con, $sql);
            while ($num = mysqli_fetch_array($result1)) {

                ?>
                <div class="content-sports-item">
                    <span>A FUSION OF NATURE AND ENGINEERING</span>
                    <h2><?php echo $num['Tensanpham']; ?></h2>
                    <span>
                        <?php for ($i=0; $i<$num['Sosao']; $i++){
                            echo "<i class=\"fas fa-star\"></i>";
                        } ?>
                    </span>
                    <?php echo "<img src='"."img/product/".$num['Hinhanh1']."' width=\"385px\" height=\"285px\"> "; ?>
                    <span><?php echo $num['Danhmucsanpham'] ?></span>
                </div>
            <?php } ?>

        </div>
        <div>
            <ul class="pagination">
                <?php for($i=1;$i<=$total_page;$i++){ ?>
                    <li <?php if($page == $i) echo "class='active'"; ?> ><a href="product.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } ?>
            </ul>
        </div>
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