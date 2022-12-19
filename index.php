<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid mt-5">
        <h1 class="text-center mt-5 mb-5">Data Siswa</h1>
        <div class="container-fluid w-75 position-relative">
            <a class="btn btn-success" href="tambah_siswa.php" role="button">Add New</a>
            <table class="table position-absolute top-0 start-50 translate-middle-x mt-5 text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Alamat</th>
                        <th scope="col text-center">Action</th>
                    </tr>
                </thead>
                <?php
            include "config.php";
            $no = 1;
            $data = mysqli_query($connect, "select * from siswa")or die (mysqli_error($connect));
            while ($tampil = mysqli_fetch_array($data)){
              echo" <tbody>
              <tr>
                  <th>$no</th>
                  <td>$tampil[nama_siswa]</td>
                  <td>$tampil[kelas]</td>
                  <td>$tampil[alamat_siswa]</td>
                  <td>
                  <a class='btn btn-primary' href='ubah_siswa.php?kode=$tampil[id]' role='button'>Edit</a>
                  <a class='btn btn-danger' href='?kode=$tampil[id]' role='button'>Delete</a>
                  </td>              
              </tr>
          </tbody>";
          $no++;
            }
            ?>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
<?php
include "config.php";
if(isset($_GET['kode'])){
mysqli_query($connect, "delete from siswa where id='$_GET[kode]'");
echo "<meta http-equiv=refresh content=1;URL='index.php'";
}
?>