<?php
session_start();
require 'functions.php';

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}


$mahasiswa = query("SELECT * FROM mahasiswa ");
//jika tombol ditekan
if(isset($_POST["cari"])){
    $mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>

<a href="logout.php">Logout</a>
    
<h1>Daftar Mahasiswa</h1>
<a href="tambah.php">Tambah Data</a>
<br><br>

<form action="" method="post">
    <input type="text" name="keyword" size="40" 
    autofocus 
    placeholder="Masukan Keyword Pencarian..." 
    autocomplete="off">

    <button type="submit" name="cari">CARI!!</button>
</form>

<br>

<table border="1" cellpadding="10" cellspacing = "0">

<tr>
    <th>No.</th>
    <th>Aksi.</th>
    <th>Gambar</th>
    <th>NRP</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Jurusan</th>
</tr>
<?php $i=1; ?>
<?php foreach ($mahasiswa as $mhs ) : ?>

<tr>
    <td><?= $i ?></td>
    <td>
        <a href="ubah.php?id=<?= $mhs["id"]?>">Ubah</a> | 
        <a href="hapus.php?id=<?= $mhs["id"]?>" onclick="return confirm('yakin?');">Hapus</a> 
    </td>
    <td><img src="img/<?= $mhs["gambar"]?>" width="100px"></td>
    <td><?= $mhs["nrp"] ?></td>
    <td><?= $mhs["nama"] ?></td>
    <td><?= $mhs["email"] ?></td>
    <td><?= $mhs["jurusan"] ?></td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>

</table>

</body>
</html>