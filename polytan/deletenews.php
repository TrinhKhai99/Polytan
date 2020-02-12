<?php

require_once("connect.php");
if($_GET['ID']!=null)
{
    $id =$_GET['ID'];
    $sql = "delete from news where ID = '$id'";
    $result = mysqli_query($con,$sql);
    if($result)
    {
        header("location:customnews.php");
    }
    else
    {
        echo "<script>alert('Delete failed')</script>";
        header("location:customnews.php");
    }
}
?>

