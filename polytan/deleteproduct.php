<?php

require_once("connect.php");
if($_GET['ID']!=null)
{
    $id =$_GET['ID'];
    $sql = "delete from product where Masanpham = '$id'";
    $result = mysqli_query($con,$sql);
    if($result)
    {
        header("location:customproduct.php");
    }
    else
    {
        echo "<script>alert('Delete failed')</script>";
        header("location:customproduct.php");
    }
}
?>

