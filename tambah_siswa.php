<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid w-25 mt-5">
        <h1 class="text-center mt-5 mb-5">Tambah Siswa</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" name="nama_siswa">
            </div>
            <div class="mb-3">
                <label class="form-label">Kelas</label>
                <input type="text" class="form-control" name="kelas">
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat_siswa">
            </div>
            <div class="mb-3">
                <label class="form-label">Chose file</label>
                <input type="file" class="form-control" name="foto">
            </div>
            <button type="submit" class="btn btn-primary" name="proses">simpan</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
<?php
include "config.php";
$nama_siswa = $_POST['nama_siswa'];
$kelas = $_POST['kelas'];
$alamat_siswa = $_POST['alamat_siswa'];

$rand = rand();
$ekstensi = array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi)) {
    header("location:index.php?alert=gagal_ekstensi");
}else{
    if($ukuran < 1044070){
        $xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'files/'.$rand.'_'.$filename);
		mysqli_query($connect, "INSERT INTO siswa VALUES(NULL,'$nama_siswa','$kelas','$alamat_siswa','$xx')");
		header("location:index.php?alert=berhasil");
	}else{
		header("location:index.php?alert=gagal_ukuran");
    }
}
?>