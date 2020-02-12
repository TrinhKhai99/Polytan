<?php
    $con=mysqli_connect("localhost","root","","polytan");
    mysqli_set_charset($con,'UTF8');
    function cktext($str,$limit=10000){
        if(strlen($str)<=$limit) return $str;
        return mb_substr($str,0,$limit-3,'UTF-8').'...';
    }
?>