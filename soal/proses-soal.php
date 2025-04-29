<?php 
session_start();

if(!isset($_SESSION['ssLogin'])){
  header('location: ../autentikasi');
  exit();
}

require '../config.php';

// tambah soal
if(isset($_POST['save'])){
  $soal = trim(htmlspecialchars($_POST['soal']));
  $gambar = trim(htmlspecialchars($_FILES['gambar']['name']));
  $a = trim(htmlspecialchars($_POST['a']));
  $b = trim(htmlspecialchars($_POST['b']));
  $c = trim(htmlspecialchars($_POST['c']));
  $d = trim(htmlspecialchars($_POST['d']));
  $kunci = trim(htmlspecialchars($_POST['kunci']));

  if($gambar != null){
    $page = 'add-soal.php';
    $gambar = uploadImg($page);
  }
  else{
    $gambar = '';
  }

  // masukkan data ke database
  mysqli_query($koneksi, "INSERT INTO tbl_soal VALUES(null, '$soal', '$gambar', '$a', '$b', '$c', '$d', '$kunci')");

  echo "<script>
    alert('Soal berhasil ditambahkan');
    window.location = 'add-soal.php';
  </script>";
  return;
}

// hapus soal
if(@$_GET['op'] == 'delete'){
  $id = htmlspecialchars($_GET['id']);
  $gbr = htmlspecialchars($_GET['gbr']);

  mysqli_query($koneksi, "DELETE FROM tbl_soal WHERE id = '$id'");
  if($gbr != ''){
    unlink('../images/soal/' . $gbr);
  }
  echo "<script>
    alert('Soal berhasil dihapus');
    window.location = 'index.php';
  </script>";
  return;
}


// update soal
if(isset($_POST['update'])){
  $id = $_POST['id'];
  $soal = trim(htmlspecialchars($_POST['soal']));
  $gambar = trim(htmlspecialchars($_FILES['gambar']['name']));
  $gbrLama = trim(htmlspecialchars($_POST['gambarlama']));
  $a = trim(htmlspecialchars($_POST['a']));
  $b = trim(htmlspecialchars($_POST['b']));
  $c = trim(htmlspecialchars($_POST['c']));
  $d = trim(htmlspecialchars($_POST['d']));
  $kunci = trim(htmlspecialchars($_POST['kunci']));

  if($gambar != null){
    $page = 'index.php';
    $gbrSoal = uploadImg($page);
    @unlink('../images/soal/' . $gbrLama);
  }
  else{
    $gbrSoal = $gbrLama;
  }

  // update data ke database
  mysqli_query($koneksi, "UPDATE tbl_soal SET
    pertanyaan = '$soal',
    gambar = '$gbrSoal',
    a = '$a',
    b = '$b',
    c = '$c',
    d = '$d',
    kunci_jawaban = '$kunci'
  WHERE id = '$id'");

  echo "<script>
    alert('Soal berhasil diupdate');
    window.location = 'index.php';
  </script>";
  return;
}

