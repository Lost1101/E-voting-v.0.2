<?php
function newaccount($datacc){
    global $conn;

    $uname = htmlspecialchars($datacc['uname']);
    $pass = htmlspecialchars($datacc['pass']);

    $name = $uname;

      $img = upload();
      if( !$img){
        return false;
      }

        $result = mysqli_query($conn, "SELECT uname FROM user WHERE uname = '$uname'");
        if( mysqli_fetch_assoc($result) ){
          echo "<script>
          alert('The username you selected is already registered!');
          </script>";
          return false;
        }

      $query =  "INSERT INTO user 
      VALUES
      ('','$uname', '$pass', '$img','')";

      mysqli_query($conn, $query);

      $count = mysqli_affected_rows($conn);

      $tampildat    =mysqli_query($conn, "SELECT * FROM user WHERE uname='$name'");
      $dat    =mysqli_fetch_array($tampildat);
      $id = $dat['id'];

      $tablevote = "CREATE TABLE tabl$id(
        id_tabl INT (2) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        id_adm INT(5) NOT NULL,
        nm_vote VARCHAR(50) NOT NULL,
        FOREIGN KEY (id_adm) REFERENCES user(id)
        ON UPDATE CASCADE
        )";
      mysqli_query($conn, $tablevote);

      mysqli_close($conn);
      return $count;
}

function newvote($newdat){
  global $conn;
  $votename = htmlspecialchars($newdat['votename']);
  $noopt = htmlspecialchars($newdat['noopt']);
  $optyon = htmlspecialchars($newdat['optyon']);

      $tampildat    =mysqli_query($conn, "SELECT * FROM user WHERE id='$_SESSION[id]'");
      $dat    =mysqli_fetch_array($tampildat);
      $id = $dat['id'];
      $name = $dat['uname'];

      $vtname = "INSERT INTO tabl$id VALUES
      ('','$id','$votename')";
      mysqli_query($conn, $vtname);

      $newvote = "CREATE TABLE $votename(
        id_tabl INT(2) NOT NULL,
        id_vote INT (2) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        id_adm INT(5) NOT NULL, 
        noopt INT(2) NOT NULL,
        optyon VARCHAR(50) NOT NULL,
        img VARCHAR(50) NOT NULL
        )";
      mysqli_query($conn, $newvote);

      $resvote = "CREATE TABLE res$votename(
        id_vote INT(2) NOT NULL,
        id_tabl INT(2) NOT NULL,
        id_adm INT(5)  NOT NULL,
        id_voters INT(5) NOT NULL,
        noopt INT(2) NOT NULL,
        nom INT NOT NULL PRIMARY KEY AUTO_INCREMENT
        )";
      mysqli_query($conn, $resvote);

      $comment = "CREATE TABLE comm$votename(
        uname VARCHAR(40) NOT NULL,
        comment TEXT(1000) NOT NULL,
        date_create DATETIME
        )";
      mysqli_query($conn, $comment);

      $tablevote = mysqli_query($conn, "SELECT * FROM tabl$id WHERE nm_vote = '$votename'");
      $dattabl = mysqli_fetch_array($tablevote);
      $id_table = $dattabl['id_tabl'];

      $img = upload();
      if( !$img){
        return false;
      }

      $nwvtdata = "INSERT INTO $votename VALUES
      ('$id_table','','$id','$noopt','$optyon','$img')";
      mysqli_query($conn, $nwvtdata);

      $inlist = "INSERT INTO table_list VALUES
      ('','$id','$name','$id_table','$votename', NOW())";
      mysqli_query($conn, $inlist);

      
      return mysqli_affected_rows($conn);
}

function addopt($addopt){
  global $conn;

  $tampildat    =mysqli_query($conn, "SELECT * FROM user WHERE id='$_SESSION[id]'");
  $dat    =mysqli_fetch_array($tampildat);
  $id = $dat['id'];

  $idvote = $_GET['id'];

  $tablevote = mysqli_query($conn, "SELECT * FROM tabl$id WHERE id_tabl = $idvote");
  $datvote    =mysqli_fetch_array($tablevote);
  $idvt = $datvote['nm_vote'];

  $noopt = htmlspecialchars($addopt['noopt']);
  $optyon = htmlspecialchars($addopt['optyon']);

  $tablevote = mysqli_query($conn, "SELECT * FROM tabl$id");
  $table = mysqli_fetch_array($tablevote);
  $idtabl = $table['id_tabl'];

  $img = upload();
      if( !$img){
        return false;
      }

  $nwvtdata = "INSERT INTO $idvt VALUES
      ('$idtabl','','$id','$noopt','$optyon','$img')";
      mysqli_query($conn, $nwvtdata);

  return mysqli_affected_rows($conn);
}

function delopt($delopt, $delopt1){
  global $conn;

  $tampildat    =mysqli_query($conn, "SELECT * FROM user WHERE id='$_SESSION[id]'");
  $dat    =mysqli_fetch_array($tampildat);
  $id = $dat['id'];

  $idvote = $delopt;
  $idtabl = $delopt1;

  $tablevote = mysqli_query($conn, "SELECT * FROM tabl$id WHERE id_tabl = $idtabl");
  $datvote    =mysqli_fetch_array($tablevote);
  $idvt = $datvote['nm_vote'];

  $delvtdata = "DELETE FROM $idvt WHERE id_vote = $idvote";
      mysqli_query($conn, $delvtdata);

  return mysqli_affected_rows($conn);
}

function editvote($post, $edvote, $edtabl){
  global $conn;

  $noopt = htmlspecialchars($post['noopt']);
  $optyon = htmlspecialchars($post['optyon']);

  $tampildat    =mysqli_query($conn, "SELECT * FROM user WHERE id='$_SESSION[id]'");
  $dat    =mysqli_fetch_array($tampildat);
  $id = $dat['id'];

  $idvote = $edvote;
  $idtabl = $edtabl;

  $tablevote = mysqli_query($conn, "SELECT * FROM tabl$id WHERE id_tabl = $idtabl");
  $datvote    =mysqli_fetch_array($tablevote);
  $nmvt = $datvote['nm_vote'];

  $img = upload();
      if( !$img){
        return false;
      }

  $edvtdata =  "UPDATE $nmvt SET
          id_tabl = '$idtabl',
          id_vote = '$idvote',
          id_adm = '$id',
          noopt = '$noopt',
          optyon = '$optyon',
          img = '$img'
          WHERE id_vote =  $idvote
          ";

  mysqli_query($conn, $edvtdata);

  return mysqli_affected_rows($conn);
}

function upload(){
        
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if( $error === 4){
      echo "<script>
              alert('Please choose a pict');
      </script>";
      return false;
    }

    // cek apakah yang di uplload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
        echo "<script>
        alert('Please choose a pict');
              </script>";
    return false;
  }

    // cek jika ukurannya terlalu besar
if( $ukuranFile > 1000000) {
  echo "<script>
        alert('Ukuran gambar terlalu besar!');
        </script>";
    return false;
}

// lolos pengecekan, gambar siap diupload
// generate nama gambar baru
$namaFileBaru = uniqid();
$namaFileBaru .= '.';
$namaFileBaru .= $ekstensiGambar;


move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

return $namaFileBaru;

}

function editacc($newdat){
  global $conn;

$id = $newdat["id"];
$pass = htmlspecialchars($newdat["pass"]);
$bio = htmlspecialchars($newdat["bio"]);
$imgold = htmlspecialchars($newdat["gambar"]);

if( $_FILES['gambar']['error'] === 4) {
  $gambar = $imgold;
}else{
  $gambar = upload();
}

$query =  "UPDATE user SET
          pass = '$pass',
          bio = '$bio',
          pict = '$gambar'
          WHERE id =  $id
          ";

mysqli_query($conn, $query);

return mysqli_affected_rows($conn);
}

function delvote($delopt1){
  global $conn;

  $tampildat    =mysqli_query($conn, "SELECT * FROM user WHERE id='$_SESSION[id]'");
  $dat    =mysqli_fetch_array($tampildat);
  $id = $dat['id'];

  $idtabl = $delopt1;

  $tablevote = mysqli_query($conn, "SELECT * FROM tabl$id WHERE id_tabl = $idtabl");
  $datvote    =mysqli_fetch_array($tablevote);
  $idvt = $datvote['nm_vote'];

  $dropres = "DROP TABLE res$idvt";
  mysqli_query($conn, $dropres);

  $drop = "DROP TABLE $idvt";
  mysqli_query($conn, $drop);

  $delvtdata = "DELETE FROM tabl$id WHERE id_tabl = $idtabl";
      mysqli_query($conn, $delvtdata);

  return mysqli_affected_rows($conn);
}

function getPolling($id_vote)
{
    global $conn;

    // sql untuk mengambil semua data;
    $id_adm = $_GET['id_adm'];

    $id_tabl = $_GET['id_tabl'];

    $tablevote = mysqli_query($conn, "SELECT * FROM tabl$id_adm WHERE id_tabl = $id_tabl");
    $datvote    =mysqli_fetch_array($tablevote);
    $nmvt = $datvote['nm_vote'];

    $vote = "SELECT * FROM res$nmvt";
    $query = $conn->query($vote);
    
    // total seluruh voting
    $totalVote = $query->num_rows;
    $query->close();

    // sql untuk mengabil data yang spesifik (sesuai $id) 
    $sqlSpesifik = "SELECT * FROM res$nmvt WHERE id_vote = '$id_vote'";
    $querySpesifik = $conn->query($sqlSpesifik);
    
    // total voting dari $id (satu opsi)
    $voteOpsi = $querySpesifik->num_rows;
    $querySpesifik->close();

    $hitungVote = '';
    if ($totalVote) {
        // round() adalah fungsi pembulatan
        $hitungVote = round( ($voteOpsi/$totalVote) * 100,2 );
    }

    return  empty($hitungVote) ?  '0%' : $hitungVote . '%'; 
}

function comment($data, $nmvt, $uname){
  global $conn;
  $comm = htmlspecialchars($data['comment']);
  $query =  "INSERT INTO comm$nmvt 
      VALUES
      ('$uname', '$comm', NOW())"; 
      mysqli_query($conn, $query);       
}

?>