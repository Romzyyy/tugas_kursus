<?php
include "config.php";
$sql = mysqli_query($connect, "select * from guru where id='$_GET[kode]'");
$data = mysqli_fetch_array($sql);
?>

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
        <h1 class="text-center mt-5 mb-5">Ubah Data Guru</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">NIP</label>
                <input type="text" class="form-control" name="nama_siswa" value="<?php echo $data['nip'];?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="kelas" value="<?php echo $data['nama'];?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat_siswa" value="<?php echo $data['alamat'];?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Chose file</label>
                <input type="file" class="form-control" name="NamaFile">
                <img src="files/<?= $data['file'];?> " alt="" class="w-50">
                <input type="hidden" name="FileLama" value="<?php echo $data['file'];?>">
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

if(isset($_POST['proses'])){
    $dir = "files/";
    $file_name = $_FILES['NamaFile']['name'];
    $ftlama = $_POST['FileLama'];
    
    if($file_name){
        unlink('files/'.$ftlama);
        move_uploaded_file($_FILES['NamaFile']['tmp_name'], $dir.$file_name);
        mysqli_query($connect,"update guru set 
        nip = '$_POST[nip]',
        nama = '$_POST[nama]',
        alamat = '$_POST[alamat]',
        file = '$file_name'
        where id = '$_GET[kode]'")or die (mysqli_error($connect));
        echo "<p class='width-100 text-center mt-5'>Data telah tersimpan</p>";
        header("location:data.php");
    }else{
        mysqli_query($connect,"update siswa set 
        nip = '$_POST[nip]',
        nama = '$_POST[nama]',
        alamat = '$_POST[alamat]'
        where id = '$_GET[kode]'")or die (mysqli_error($connect));
        echo "<p class='width-100 text-center mt-5'>Data telah tersimpan</p>";
        header("location:data.php");
    }
  
}
?>