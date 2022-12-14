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
        <h1 class="text-center mt-5 mb-5">Import Document</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Chose file</label>
                <input type="file" class="form-control" name="NamaFile">
            </div>
            <button type="submit" class="btn btn-primary" name="proses">simpan</button>
        </form>
</body>

</html>
<!-- <?php
include "config.php";
if(isset($_POST['proses'])){
$directory = "file/";
$file_name = $_FILES['NamaFile']['name'];
$tmpFile = $_FILES['file_name']['tmp_name'];
move_uploaded_file('tmp_name',$directory.$file_name);
mysqli_query($connect, "insert into document set file='$file_name'");
echo "<p class='width-100 text-center mt-5'>file berhasil tersimpan</p>";
}
?> -->
<?php
include "config.php";
if(isset($_POST['proses'])){
    $nama = $_FILES['NamaFile']['name'];
    $tmp = $_FILES['NamaFile']['tmp_name'];
    $dir = "file/";
    if(copy($tmp, $dir.$nama)){
        echo "Upload Berhasil";
    }else {
        echo "Upload Gagal";
    }
}
?>