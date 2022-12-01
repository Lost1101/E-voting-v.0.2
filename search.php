<?php
session_start();
ob_start();
include "koneksi.php";
include "functions.php";

$tampildat    =mysqli_query($conn, "SELECT * FROM table_list");

if(isset($_POST['search'])){
    $penduduk = search($_POST['keyword']);

$user = mysqli_query($conn, "SELECT * FROM user");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Raleway:wght@100;200;300;400;500;700&family=Ubuntu:ital,wght@0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4ef2c70460.js" cross origin="anonymous"></script>
    <title>VoteIt!</title>
    <style>
        body{
            font-family: 'PT Sans', sans-serif;
            line-height: 1.6;
            background-color: rgb(38, 38, 38);
        }

        .nav-link{
            color: rgb(0, 0, 0);
            transition: 0.2s ease-in-out 0s;
            text-decoration: none;
        }

        .nav-link:hover{
            color: rgb(250, 139, 2);
        }
        
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-white" style=" width: 100%; margin: auto; font-size:20px;">
            <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto fw-bold">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="vote.php">Vote</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="search.php">Search</a>
                </li>
                </ul>
            </div>
            </div>
        </nav>

        <img src="img/robek-atas.png" alt="" style="width: 100%; height: 40px; margin: 0; padding: 0;">

    <div class="bg p-4 mt-5 text text-left text-white border border-light border-rounded" style="width:75%; margin: auto;">
        <table class="table table-striped table-hover text-white">
        <div class="form-  justify-content-center">
            <form action="" method="post">
                <input class="form-control mt-3 mb-3 w-25" type="text" name="keyword" placeholder="Search vote...">
                <button class="btn btn-outline-light" type="submit" name="search">Search</button>
            </form>
            <br><br>
        </div>
            <tr>
                <th class="text-white">Vote Name</th>
                <th class="text-white">Creator</th>
                <th class="text-white">Action</th>
            </tr>
            <?php $i = 1 ?>
            <?php foreach($tampildat as $row) : ?>
            <tr>
                <td class="text-white"><?= $row['nm_vote']; ?></td>
                <td class="text-white"><a class="text-white" href="another_user.php?id=<?=$row['id_adm']?>"><?= $row['uname']; ?></a></td>
                <td>
                    <div class="text-white">
                    <a href="after_poll.php?id_adm=<?=$row['id_adm']?>&id_tabl=<?=$row['id_tabl']?>" class="btn btn-outline-light" style="text-decoration: none;">Result</a>
                    <a href="startvote.php?id=<?=$row['id_tabl']?>&amp;id_adm=<?=$row['id_adm']?>" class="btn btn-outline-light" style="text-decoration: none;">Join vote</a>
                    </div>
                </td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>
        </table>
    </div>

    <div class="w-100" style="position: absolute; bottom: 0;">
        <img src="img/robek-bawah.png" alt="" style="width: 100%; height: 40px; margin: 0; padding: 0;">
        <div class="footer p-3 bg-white text-black text-center ">
            <p>© Kelompok15 2022, all right reserved</p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

<?php 
    function search($keyword){

        global $conn;

        $query = "SELECT * FROM table_list WHERE nm_vote = '$keyword'";
        return mysqli_query($conn, $query);
    }
?>
