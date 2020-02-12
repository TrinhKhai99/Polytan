<?php

require_once("connect.php");
if($_GET['ID']!=null)
{
    $id =$_GET['ID'];
    $sql = "delete from admin where ID = '$id'";
    $result = mysqli_query($con,$sql);
    if($result)
    {
        header("location:administration.php");
    }
    else
    {
        echo "<script>alert('Delete failed')</script>";
        header("location:administration.php");
    }
}
?>

