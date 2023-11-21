<?php
include "koneksi.php";

if (isset($_POST['tsimpan'])) {
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];
    $query = mysqli_query($koneksi, "INSERT INTO spp (tahun,nominal) VALUES('$tahun','$nominal')");

    if ($query) {
        $_SESSION['status'] = "Data Berhasil Ditambahkan";
        echo "<script>alert('Data Berhasil Ditambahkan');location.href ='index.php?page=spp   ';</script>";
    }
}

if(isset($_POST['thapus'])) {
    $id = $_POST['id_spp'];
    $query = mysqli_query($koneksi, "DELETE FROM spp WHERE id_spp='$id' ");

    $_SESSION['status'] = "Data Barhasil Dihapus";
    if ($query) {
        echo "<script>alert('Data Berhasil Dihapus');location.href ='index.php?page=spp ';</script>";
    }
}

if (isset($_POST['ssimpan'])) {
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $id_kelas = $_POST['id_kelas'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $password = md5( $_POST['password']);
    $query = mysqli_query($koneksi, "INSERT INTO siswa (nisn,nis,nama,id_kelas,alamat,no_telp,password) VALUES('$nisn','$nis','$nama','$id_kelas','$alamat','$no_telp','$password')");

    if ($query) {
        $_SESSION['status'] = "Data Berhasil Ditambahkan";
        echo "<script>alert('Data Berhasil Ditambahkan');location.href ='index.php?page=siswa ';</script>";
    }
}

if(isset($_POST['shapus'])) {
    $id = $_POST['nisn'];
    $query = mysqli_query($koneksi, "DELETE FROM siswa WHERE nisn='$id' ");

    $_SESSION['status'] = "Data Barhasil Dihapus";
    if ($query) {
        echo "<script>alert('Data Berhasil Dihapus');location.href ='index.php?page=siswa ';</script>";
    }
}

if (isset($_POST['ksimpan'])) {
    $nama_kelas = $_POST['nama_kelas'];
    $kompetensi_keahlian = $_POST['kompetensi_keahlian'];
    $query = mysqli_query($koneksi, "INSERT INTO kelas (nama_kelas,kompetensi_keahlian) VALUES('$nama_kelas','$kompetensi_keahlian')");

    if ($query) {
        $_SESSION['status'] = "Data Berhasil Ditambahkan";
        echo "<script>alert('Data Berhasil Ditambahkan');location.href ='index.php?page=kelas ';</script>";
    }
}


if(isset($_POST['khapus'])) {
    $id = $_POST['id_kelas'];
    $query = mysqli_query($koneksi, "DELETE FROM kelas WHERE id_kelas='$id' ");

    $_SESSION['status'] = "Data Barhasil Dihapus";
    if ($query) {
        echo "<script>alert('Data Berhasil Dihapus');location.href ='index.php?page=kelas ';</script>";
    }
}

if (isset($_POST['psimpan'])) {
    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $level = $_POST['level'];
    $password = md5( $_POST['password']);
    $query = mysqli_query($koneksi, "INSERT INTO petugas (nama_petugas,username,level,password) VALUES('$nama_petugas','$username','$level','$password')");

    if ($query) {
        $_SESSION['status'] = "Data Berhasil Ditambahkan";
        echo "<script>alert('Data Berhasil Ditambahkan');location.href ='index.php?page=petugas ';</script>";
    }
}

if(isset($_POST['phapus'])) {
    $id = $_POST['id_petugas'];
    $query = mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas='$id' ");

    $_SESSION['status'] = "Data Barhasil Dihapus";
    if ($query) {
        echo "<script>alert('Data Berhasil Dihapus');location.href ='index.php?page=petugas ';</script>";
    }
}

if(isset($_POST['bhapus'])) {
    $id = $_POST['id_pembayaran'];
    $query = mysqli_query($koneksi, "DELETE FROM pembayaran WHERE id_pembayaran='$id' ");

    $_SESSION['status'] = "Data Barhasil Dihapus";
    if ($query) {
        echo "<script>alert('Data Berhasil Dihapus');location.href ='index.php?page=history ';</script>";
    }
}