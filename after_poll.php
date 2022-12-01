<?php
  
    require "koneksi.php";
    require "functions.php";
    require "vote-count.php";

    $id_adm = $_GET['id_adm'];
    $idvote = $_GET['id_tabl'];

    $tampildat    =mysqli_query($conn, "SELECT * FROM user WHERE id=$id_adm");
    $dat    =mysqli_fetch_array($tampildat);
    $id = $dat['id'];

    $tablevote = mysqli_query($conn, "SELECT * FROM tabl$id WHERE id_tabl = $idvote");
    $datvote    =mysqli_fetch_array($tablevote);
    $nmvt = $datvote['nm_vote'];

    $idsesi = mysqli_query($conn, "SELECT * FROM user WHERE id=$_SESSION[id]");
    $sesi =mysqli_fetch_array($idsesi);
    $uname = $sesi['uname'];

    $comment = mysqli_query($conn, "SELECT * FROM comm$nmvt");

    if( isset($_POST['submit']) ){
      if(comment($_POST, $nmvt, $uname) > 0 ){
        echo "
            <script>
                document.location.href = 'after_poll.php?id_adm=$id_adm&id_tabl=$idvote';
            </script>
        ";
    }else{
        echo "
            <script>
                document.location.href = 'after_poll.php?id_adm=$id_adm&id_tabl=$idvote';
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

        *,
*:before,
*:after {
  box-sizing: inherit;
}

.chart {
  table-layout: fixed;
  border-collapse: collapse;
  background: #f9f9f9;
  display: flex;
  flex-wrap: wrap;
  margin: auto;
  border-radius: 10px;
  margin: auto;
  width: 43%;
}

.chart caption {
  padding: 20px 0;
  font-weight: bold;
  font-size: 150%;
  text-align: center;
}

.chart td {
  vertical-align: bottom;
  text-align: center;
  height: 100%;
}

.chart tbody td {
  padding: 30px 5px;
}

.chart td span {
  display: block;
  background: firebrick;
  position: relative;
  transition: 0.2s ease-in-out 0s;
}

.chart td span:hover {
  display: block;
  background:tomato;
  position: relative;
}

.chart td span b {
  display: block;
  color: #000;
  position: absolute;
  bottom: 100%;
  left: 0;
  right: 0;
  text-align: center;
}

.chart tbody {
  background-image: linear-gradient(rgba(0, 0, 0, 0.1) 2px, transparent 1px);
  background-size: 98% 4.5vh;
}

.chart thead th,
.chart tfoot th {
  padding: 10px 5px 20px;
}
.chart tbody td {
  height: 45vh;
}

@media screen and (max-width: 601px) {
  table.mobile-optimised {
    word-wrap: break-word;
    border-spacing: 0;
    height: auto;
  }
  table.mobile-optimised thead,
  table.mobile-optimised tfoot {
    display: none;
  }
  table.mobile-optimised td {
    display: block;
    float: left;
    width: 100%;
    clear: both;
    background: #f5f5f5;
    padding: 10px 5px;
    padding: 2px;
  }
  table.mobile-optimised tbody,
  table.mobile-optimised tr {
    display: block;
  }
  .mobile-optimised td:before {
    content: attr(data-th);
    display: block;
    font-weight: bold;
    margin: 0 0 2px;
    color: #000;
  }
  table.mobile-optimised.chart td {
    text-align: left;
    white-space: nowrap;
    height: auto;
  }
  table.mobile-optimised.chart span {
    text-align: right;
    height: 25px !important;
    line-height: 25px;
    padding: 0 5px 0 0;
    position: relative;
    white-space: nowrap;
  }
  .chart td span b{display:inline;position:static;}
  .chart tbody {
    background: none;
  }
}

.chart span {
  opacity: 1;
  animation: barchart 2s ease reverse;
}
@keyframes barchart {
  to {
    height: 0%;
    opacity: 0;
  }
}

.hasil{
    margin: 10px auto;
    width: 40%;
    padding: 5px auto;
    background-color: white;
    border-radius: 10px;
    margin: 20px auto;
    display: flex;
    justify-content: center;
}

.tekspersen{
  color: #000;
  text-align: center;
  margin:auto;
  margin-top: 20px;
  font-size: 30px;
  font-weight: 400;
}

a{
  text-decoration: none;
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
    <div class="text-center">
        <h1 class="text-white"><?=$nmvt?></h1>
        <br>
        <h1 class="text-white">You've voted, here are the results</h1>
        <br>
    </div>
    <table class="chart mobile-optimised">
        <?php
        $sql = "SELECT * FROM $nmvt";
        $query = $conn->query($sql);
        while ( $row = $query->fetch_assoc() ) : ?>
          <thead>
            <tr>
              <th scope="col" class="text-white">jan</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th scope="col" class="text-white">jan</th>
              <th scope="col" class="text-white">jan</th>
            </tr>
          </tfoot>
          <tbody>
            <tr>
              <td width="150px" data-th="jan" class="jan"><span style="height:<?php echo getPolling($row['id_vote'])?>"><b><?php echo getPolling($row['id_vote']);?></b></span></td>
            </tr>
          </tbody>
        <?php endwhile; ?>
    </table>

      <div class="hasil">
        <?php
        $sql = "SELECT * FROM $nmvt";
        $query = $conn->query($sql);
        while ( $row = $query->fetch_assoc() ) : 
        ?>
          <div class="tekspersen">
            <div class="persentase"><?php echo getPolling($row['id_vote']);?></div>
            <p>No : <?= $row['noopt'];?></p>
            <p><?=$row['optyon']?></p>
          </div>
        <?php endwhile; ?>
      </div>

    <div class="bg p-4 mb-5 mt-2 text text-left text-white border border-light justify-content-center" style="width:90%; margin: auto;">
    <div class=" w-75 mx-auto mb-5">
      <form action="" method="post" enctype="multipart/form-data">
          <input type="text" autocomplete="off" class="form-control w-75 d-inline" name="comment" placeholder="Type comment..." aria-label="Type comment...">
          <button class="btn btn-outline-light d-inline" type="submit" name="submit"><i class="fa-solid fa-paper-plane"></i></button>
      </form>
    </div>

      <?php $i = 1 ?>
            <?php foreach($comment as $comm) : ?>
              <?php $username = $comm['uname'];
                $qry    =mysqli_query($conn, "SELECT * FROM user WHERE uname='$username'");
                $image =mysqli_fetch_array($qry);
              ?>
              <div m-5>
              <td><img src="img/<?=$image['pict']?>" alt="" style="width: 30px; height:30px; border-radius:50%; margin-right:10px;"></td><td class="text-white"><?= $comm['uname']; ?></td>
              </div>
            <div class="p-1 m-1">
              <tr>
                  <td class="text-white d-block"><?= $comm['comment']; ?></td>
              </tr>
            </div>
            <?php $i++ ?>
        <?php endforeach; ?>
    </div>

      <div class="mx-auto text-center justify-content-center w-100 mb-5">
            <a href="home.php">
                <button class="btn btn-outline-light">Home</button>
            </a>
        </div>


    <img src="img/robek-bawah.png" alt="" style="width: 100%; height: 40px; margin: 0; padding: 0;">
    <div class="footer p-3 bg-white text-black text-center ">
        <p>© Kelompok15 2022, all right reserved</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>