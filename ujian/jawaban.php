<?php 
session_start();

if(!isset($_SESSION['ssLogin'])){
  header('location: ../autentikasi');
  exit();
}

require '../config.php';

// Jika tombol ujian selesai ditekan atau waktu habis
if(isset($_POST['submit']) or isset($_POST['timeout'])){
  $pilihan = $_POST['pilihan'];
  $idSoal = $_POST['id_soal'];
  $jmlSoal = $_POST['jml_soal'];
  $benar = 0;
  $salah = 0;
  $kosong = 0;

  // echo print_r($idSoal);
  // die();

  for($i = 0; $i < $jmlSoal; $i++){
    $nomor = $idSoal[$i];

    // Jika user tidak menjawab
    if(empty($pilihan[$nomor])){
      $kosong++;
    }
    else{
      $jawaban = $pilihan[$nomor];
      // Cocokan jawaban user ke database
      $queryCek = mysqli_query($koneksi, "SELECT * FROM tbl_soal WHERE id = '$nomor' AND kunci_jawaban = '$jawaban'");

      $cekJawaban = mysqli_num_rows($queryCek);

      if($cekJawaban){
        $benar++;
      }
      else{
        $salah++;
      }
    }
  }

  // Rumus : nilai = 100 /jumlah soal * jumlah jawaban yg benar
  $nilai = 100 / $jmlSoal * $benar;
  $nilai = number_format($nilai, 1);

  $queryNilai = mysqli_query($koneksi, "SELECT * FROM tbl_pengaturan");
  $row = mysqli_fetch_assoc($queryNilai);
  $nilaiMin = $row['nilai_minimal'];
  $tglSkrg = date('Ymd');
  $idUser = $_SESSION['ssId'];

  if($nilai < $nilaiMin){
    mysqli_query($koneksi, "INSERT INTO tbl_nilai VALUES(null, '$idUser', '$benar', '$salah', '$kosong', '$nilai', '$tglSkrg', 'GAGAL')");
  }
  else{
    mysqli_query($koneksi, "INSERT INTO tbl_nilai VALUES(null, '$idUser', '$benar', '$salah', '$kosong', '$nilai', '$tglSkrg', 'LULUS')");
  }

  header('location: hasil-ujian.php');
  exit();
}

