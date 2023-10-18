<?php
$koneksi = new mysqli('localhost','root','','xipplg3') or die(mysqli_error($koneksi));

if (isset($_POST['simpan'])) {
    $idPasien = $_POST['idpasien'];
    $nmPasien = $_POST['nmpasien'];
    $jk = $_POST ['jk'];
    $alamat = $_POST['alamat'];
    $koneksi->query("INSERT INTO pasien values ('$idPasien','$nmPasien','$jk','$alamat')");

    header('location: pasien.php');
}

if (isset($_GET['idpasien'])){
    $idPasien = $_GET['idpasien'];
    $koneksi->query("DELETE FROM pasien WHERE idpasien='$idPasien'");
    header('location: pasien.php');
}

if (isset($_POST['edit'])) {
    $idPasien = $_POST ['idpasien'];
    $nmPasien = $_POST ['nmpasien'];
    $jk = $_POST ['jk'];
    $alamat = $_POST ['alamat'];

    $koneksi->query("UPDATE pasien SET nmpasien='$nmPasien',jk='$jk',alamat='$alamat' WHERE idPasien='$idPasien'");
    header("location: pasien.php");
}

if (isset($_GET['hapus'])){
    $no = $_GET['hapus'];

    $koneksi->query("DELETE FROM pasien LIMIT $no");
    header("location: pasien.php");
}