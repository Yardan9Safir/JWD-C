<?php
include_once 'koneksi.php';
if (isset($_POST["gender"])) {
  $jenis_kelamin = $_POST["gender"];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $agama = $_POST['agama'];
  $sekolah_asal = $_POST['sekolah_asal'];
  $query = "INSERT INTO siswa (nama,alamat,jenis_kelamin,agama,sekolah_asal) 
  VALUES ('$nama' , '$alamat' , '$jenis_kelamin' , '$agama', '$sekolah_asal')";
  if (mysqli_query($conn, $query)) {
    header("location:index.php?status=berhasil");
  } else if (!mysqli_query($conn, $query)) {
    header("location:index.php?status=gagal");
  }
  mysqli_close($conn);
} else {
  header("location:index.php?status=gagal");
}


?>