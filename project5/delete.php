<?php
session_start();
include_once 'helper/koneksi.php';
if (!empty(isset($_POST['no_daftar']))) {
  $no_daftar = mysqli_real_escape_string($conn, $_POST['no_daftar']);
  $query_delete = "DELETE FROM tbl_pendaftaran WHERE no_daftar ='$no_daftar'";
  $hasil = mysqli_query($conn, $query_delete);
  if ($hasil) {
    $_SESSION['status'] = 'berhasil dihapus';
    // echo $hasil;
    header("location:index.php?status=sukses");
  } else {
    $_SESSION['status'] = 'gagal dihapus';
    header("location:index.php?status=gagal");
  }
}
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  include_once "helper/koneksi.php";
  $query = "SELECT * FROM tbl_pendaftaran";
  $result = mysqli_query($conn, $query);
  $jumlah_siswa = mysqli_num_rows($result);
  if ($result) {
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  } else {
    echo "Error executing the query: " . mysqli_error($connection);
  }
  ?>
  <div style="border:2px solid #6c757d; padding:5px">
    <table border=2px>
      <tr>
        <td><b>No</b></td>
        <td><b>Nama</b></td>
        <td><b>Alamat</b></td>
        <td><b>Jenis Kelamin</b></td>
        <td><b>Agama</b></td>
        <td><b>Sekolah Asal</b></td>
      </tr>
      <?php foreach ($rows as $row): ?>
        <tr>
          <td>
            <?= htmlspecialchars($row['no_daftar']); ?>
          </td>
          <td>
            <?= $row['nama']; ?>
          </td>
          <td>
            <?= htmlspecialchars($row['alamat']); ?>
          </td>
          <td>
            <?= htmlspecialchars($row["jenis_kelamin"]); ?>
          </td>
          <td>
            <?= htmlspecialchars($row['agama']); ?>
          </td>
          <td>
            <?= htmlspecialchars($row['sekolah_asal']); ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
    <br>
    <form action="delete.php" method="post">
      <label for="no_daftar">NO Pendaftaran</label>
      <input type="text" name="no_daftar" id="no_daftar" placeholder="nomor Pendaftaran">
      <input type="submit" value="Hapus">
    </form>
  </div>
</body>

</html>