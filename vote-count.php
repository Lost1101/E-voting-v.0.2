<?php
ob_start();
session_start();
include 'koneksi.php';

if (isset($_GET['id'])){
    $id_vote = $_GET['id_vote'];
    $id_tabl = $_GET['id_tabl'];
    $id_adm = $_GET['id_adm'];
    $id_voters = $_GET['id'];
    $noopt = $_GET['noopt'];
    $nm_vote = $_GET['nm_vote'];
    
    $abc = "INSERT INTO res$nm_vote (id_vote, id_tabl, id_adm, id_voters, noopt) VALUES ('$id_vote','$id_tabl','$id_adm','$id_voters','$noopt')";
    $insert = $conn->query($abc);

    if ($insert) {
        header("location:after_poll.php?id_adm=$id_adm&id_tabl=$id_tabl");
        exit();
    } else {
        die('Oops!! Internal Error');
    }
}

?>