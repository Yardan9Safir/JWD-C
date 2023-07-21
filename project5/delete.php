<?php
session_start();
include_once 'helper/koneksi.php';
if (isset($_GET['no_daftar'])) {
  $no_daftar = mysqli_real_escape_string($conn, $_POST['no_daftar']);
  $query_insert = "DELETE FROM tbl_pendaftaran WHERE no_daftar ='$no_daftar'";
  //$hasil=$conn->query($query_insert);
  $hasil = mysqli_query($conn, $query_insert);
  if ($hasil) {
    $_SESSION['status'] = 'berhasil dihapus';
    header("location:index.php?status=sukses");
  } else {
    $_SESSION['status'] = 'gagal dihapus';
    header("location:index.php?status=gagal");
  }
}
?>