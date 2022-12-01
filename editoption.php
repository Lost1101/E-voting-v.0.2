<?php
session_start();
ob_start();
include "koneksi.php";
include "functions.php";

$tampildat    =mysqli_query($conn, "SELECT * FROM user WHERE id='$_SESSION[id]'");
$dat    =mysqli_fetch_array($tampildat);
$id = $dat['id'];

$idvote = $_GET['id'];
$idtabl = $_GET['id_tabl'];

$tablevote = mysqli_query($conn, "SELECT * FROM tabl$id WHERE id_tabl = $idtabl");
$datvote    =mysqli_fetch_array($tablevote);
$nmvt = $datvote['nm_vote'];

$query = mysqli_query($conn,"SELECT * FROM $nmvt WHERE id_vote = $idvote");
$datopt    =mysqli_fetch_array($query);


if( isset($_POST['edit']) ){


    if(editvote($_POST, $idvote, $idtabl) > 0 ){
        echo "
            <script>
                alert('Add option success!');
                document.location.href = 'voteoption.php?id=$idtabl';
            </script>
            ";
    }else{
        echo "
            <script>
                alert('Vote create failed!');
                document.location.href = 'editoption.php';
            </script>
        ";
    }


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


        <h1>New vote data</h1>
        <div class="bg p-4 mb-5 mt-2 text text-left text-white border border-light" style="width:75%; margin: auto;">
        <div class="container">
            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="datainput">
            <input type="hidden" name="id">
                <h1>Option</h1>
                <div class="d-flex flex-wrap justify-content-between">
                    <div class="form-  m-3" style="width: 40%;">
                        <div>
                        <label for="noopt">No :</label>
                        </div>
                        <input type="text" name="noopt" id="noopt" 
                        class="form-control" aria-describedby="helpId" required value="<?=$datopt['noopt']?>">
                        <br><br>
                    </div>

                    <div class="form-  m-3" style="width: 40%;">
                        <div>
                        <label for="optyon">Option name :</label>
                        </div>
                        <input type="text" name="optyon" id="optyon"
                        class="form-control"  aria-describedby="helpId" required value="<?=$datopt['optyon']?>">
                        <br><br>
                    </div>

                    <div class="form- m-3" style="width: 40%;">
                        <div>
                        <label for="gambar">Photo :</label>
                        </div>
                        <input type="file" name="gambar" id="gambar" 
                        class="form-control" aria-describedby="helpId" required>
                        <br><br>
                    </div>
                </div>

                    <br>

                    <button class="btn btn-outline-light" type="submit" name="edit">Change</button>
            </form>
            </div>
        </div>
    </div>

    <div class="mx-auto text-center justify-content-center w-100 mb-5">
            <a href="voteoption.php?id=<?=$datopt['id_tabl']?>">
                <button class="btn btn-outline-light">Back</button>
            </a>
        </div>

    <img src="img/robek-bawah.png" alt="" style="width: 100%; height: 40px; margin: 0; padding: 0;">
    <div class="footer p-3 bg-white text-black text-center ">
        <p>© Kelompok15 2022, all right reserved</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>