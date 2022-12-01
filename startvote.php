<?php
session_start();
ob_start();
include "koneksi.php";

    $id_adm = $_GET['id_adm'];

    $tampildat    =mysqli_query($conn, "SELECT * FROM user WHERE id=$id_adm");
    $dat    =mysqli_fetch_array($tampildat);
    $id = $dat['id'];

    $idvote = $_GET['id'];

    $tablevote = mysqli_query($conn, "SELECT * FROM tabl$id WHERE id_tabl = $idvote");
    $datvote    =mysqli_fetch_array($tablevote);
    $nmvt = $datvote['nm_vote'];

    $vote = mysqli_query($conn, "SELECT * FROM $nmvt");

    $abc = mysqli_query($conn, "SELECT * FROM res$nmvt WHERE id_voters='$_SESSION[id]'");
    if(mysqli_num_rows($abc)==1){
        header("location:after_poll.php?id_adm=$id_adm&id_tabl=$idvote");
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

    <div class="mx-auto text-center mb-5 mt-5">
        <h1 class="text-white m-5">Choose wisely</h1>
    </div>

    <div class="bg p-4 mb-5 mt-2 text text-left text-white" style="width:90%; margin: auto;">
        <table class="table table-striped table-hover text-white">
            <div class="d-flex flex-wrap justify-content-center">
                <?php $i = 1 ?>
                    <?php foreach($vote as $row) : ?>
                        <div class="w-25 mx-auto mt-5 mb-5 border border-light d-flex flex-column p-3">
                            <img src="img/<?= $row['img']?>" alt="">
                            <h1 class="text-white text-center" style="font-size: 30px;"><?= $row['optyon']; ?></h1>
                            <h2 class="text-white text-center" style="font-size: 30px;">No : <?= $row['noopt']; ?></h2>

                            <?php
                                $cek = $_SESSION['id'];
                            ?>
                            <a class="text-center m-3" href="vote-count.php?id=<?=$cek?>&amp;id_vote=<?=$row['id_vote']?>&amp;noopt=<?=$row['noopt']?>&amp;id_adm=<?=$row['id_adm']?>&amp;id_tabl=<?=$row['id_tabl']?>&amp;nm_vote=<?=$nmvt?>" style="text-decoration: none;">
                                <button class="btn btn-outline-light">Vote</button>
                            </a>
                            
                        </div>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </div>
        </table>
    </div>

    <img src="img/robek-bawah.png" alt="" style="width: 100%; height: 40px; margin: 0; padding: 0;">
    <div class="footer p-3 bg-white text-black text-center ">
        <p>© Kelompok15 2022, all right reserved</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>