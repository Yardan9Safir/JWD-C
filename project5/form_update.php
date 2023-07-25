<?php
session_start();
include_once 'helper/koneksi.php';
if (!empty(isset($_POST['nama']))) {
  $nama = mysqli_real_escape_string($conn, $_POST['nama']);
  $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
  $gender = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
  $agama = mysqli_real_escape_string($conn, $_POST['agama']);
  $asal = mysqli_real_escape_string($conn, $_POST['asal']);
  $no_daftar = mysqli_real_escape_string($conn, $_POST['no_daftar']);
  $query_update = "UPDATE tbl_pendaftaran SET nama ='$nama', alamat ='$alamat',jenis_kelamin ='$gender',agama ='$agama',sekolah_asal ='$asal' WHERE no_daftar='$no_daftar'";
  $hasil = mysqli_query($conn, $query_update);
  if ($hasil) {
    $_SESSION['status'] = 'berhasil diupdate';
    header("location:index.php?status=sukses");
  } else {
    $_SESSION['status'] = 'gagal diupdate';
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
    <form action="form_update.php" method="post">
      <label for="no">No Pendaftaran </label>
      <input type="text" name="no_daftar" id="no_daftar"><br>

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

      <input type="submit" value="UPDATE">
    </form>
  </div>
</body>

</html>