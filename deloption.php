<?php
session_start();
ob_start();
require "koneksi.php";
require "functions.php";

$delopt = $_GET['id'];
$delopt1 = $_GET['id_tabl'];

if(delopt($delopt,$delopt1) > 0){
    echo "
            <script>
                alert('Option delete successful!');
                document.location.href = 'voteoption.php?id=$delopt1';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Option delete failed!');
                document.location.href = 'voteoption.php?id=$delopt1';
            </script>
        ";
}
?>