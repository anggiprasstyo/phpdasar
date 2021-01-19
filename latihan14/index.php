<?php 
require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY npm ASC");
 
//tombol cari ditekan
if (isset($_POST["cari"])) {
	$mahasiswa = cari($_POST["keyword"]);
}

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<center><h1>Daftar Mahasiswa</h1></center>

	<a href="tambah.php">Tambah Data Mahasiswa</a>
	<br><br>

	<form action="" method="post">
		<input type="text" name="keyword" autofocus placeholder="masukkan keyword pencarian.." 
		autocomplete="off">
		<button type="submit" name="cari">Cari..</button>
		
	</form>
	<br>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Gambar</th>
			<th>NPM</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
		</tr>
		
		<?php $i = 1; ?>
		<?php foreach ($mahasiswa as $row): ?>

		<tr>
			<td><?= $i; ?></td>
			<td>
				<a href="ubah.php?npm=<?= $row["npm"]; ?>">Ubah</a> |
				<a href="hapus.php?npm=<?= $row["npm"]; ?>" onclick="return confirm('Yakin Ingin Dihapus ?');">Hapus</a>
			</td>
			<td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
			<td><?= $row["npm"]  ?></td>
			<td><?= $row["nama"]  ?></td>
			<td><?= $row["email"]  ?></td>
			<td><?= $row["jurusan"]  ?></td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>

	</table>
</body>
</html>