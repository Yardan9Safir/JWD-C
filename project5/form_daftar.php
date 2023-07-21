<?php
session_start();
include_once 'helper/koneksi.php';
if (isset($_POST['nama'])) {
  $nama = mysqli_real_escape_string($conn, $_POST['nama']);
  $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
  $gender = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
  $agama = mysqli_real_escape_string($conn, $_POST['agama']);
  $asal = mysqli_real_escape_string($conn, $_POST['asal']);

  $query_insert = "INSERT INTO tbl_pendaftaran(nama,alamat,jenis_kelamin,agama,sekolah_asal) values ('" . $nama . "','" . $alamat . "','" . $gender . "','" . $agama . "','" . $asal . "')";
  //$hasil=$conn->query($query_insert);
  $hasil = mysqli_query($conn, $query_insert);
  if ($hasil) {
    $_SESSION['status'] = 'berhasil';
    header("location:index.php?status=sukses");
  } else {
    $_SESSION['status'] = 'gagal';
    header("location:index.php?status=gagal");
  }
}
?>


<div style="border:2px solid #6c757d; padding:5px">
  <form action="form_daftar.php" method="post">
    <label for="nama">Nama </label>
    <input type="text" placeholder="nama lengkap" name="nama"><br>

    <label for="alamat">Alamat</label>
    <textarea name="alamat" rows="4" cols="50"></textarea><br>

    <label for="gender">Jenis Kelamin</label>
    <input type="radio" name="jenis_kelamin" value="Laki-Laki"> Laki-Laki
    <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan<br>

    <label for="agama">Agama</label>
    <select name="agama">
      <option value="islam">Islam</option>
      <option value="kristen">Kristen</option>
      <option value="Hindu">Hindu</option>
      <option value="Budha">Budha</option>
      <option value="Protestan">Protestan</option>
    </select><br>

    <label for="asal">Asal Sekolah</label>
    <input type="text" name="asal" placeholder="nama sekolah"> <br>

    <input type="submit" value="Daftar">
  </form>
</div>