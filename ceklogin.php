<?php
ob_start();
session_start();
    include "koneksi.php";
    $username        = mysqli_real_escape_string($conn, $_POST['uname']);
    $password        = mysqli_real_escape_string($conn, $_POST['pass']);

    if(isset($_POST['login'])){
        $sql = mysqli_query($conn, "SELECT * FROM user WHERE uname='$username' AND pass='$password'");
        if(mysqli_num_rows($sql)===1){
            $qry = mysqli_fetch_array($sql);
            $_SESSION['uname']    = $qry['uname'];
            $_SESSION['pass'] =     $qry['pass'];
            $_SESSION['id'] = $qry['id'];
                header("location:home.php");
        }
        else{
            ?>
            <script language="JavaScript">
                alert('Oops! Login Failed. username dan password tidak sesuai ...');
                document.location='./index.php';
            </script>
            <?php
        }
    }
?>