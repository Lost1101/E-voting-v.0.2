<?php
session_start();
ob_start();
require "koneksi.php";
require "functions.php";

$delopt1 = $_GET['id'];

if(delvote($delopt1) > 0){
    echo "
            <script>
                alert('Vote deleted successfully!');
                document.location.href = 'vote.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Vote delete failed!');
                document.location.href = 'vote.php';
            </script>
        ";
}
?>