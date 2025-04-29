<?php 
session_start();

if(!isset($_SESSION['ssLogin'])){
  header('location: ../autentikasi');
  exit();
}

require '../config.php';
$title = 'Soal - Ujian Online';
require '../templates/header.php';
require '../templates/navbar.php';
require '../templates/sidebar.php';

if($_SESSION['ssRole'] != 1){
  echo "<script>
    alert('Halaman tidak ditemukan!');
    window.location = '../ujian';
  </script>";
  exit();
}

$id = $_GET['id'];
$querySoal = mysqli_query($koneksi, "SELECT * FROM tbl_soal WHERE id = '$id'");
$soal = mysqli_fetch_assoc($querySoal);

?>

<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <form action="proses-soal.php" method="POST" enctype= multipart/form-data>
      <div class="row">
        <div class="col-md-12 grid-margin mb-3">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h3 class="font-weight-bold mb-0">Edit Soal</h3>
            </div>
            <div>
                <a href="index.php" class="btn btn-warning btn-icon-text btn-rounded">
                  <i class="ti-back-left btn-icon-prepend"></i> Kembali
                </a>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <p class="card-title">Rincian Soal</p>
            <div class="col-md-9">
              <input type="hidden" name="id" value="<?= $soal['id'] ?>">
              <div class="form-group row mb-2">
                <label for="pertanyaan" class="col-sm-3 col-form-label-sm">Pertanyaan</label>
                <div class="col-sm-9">
                  <textarea name="soal" id="editor"><?= $soal['pertanyaan'] ?></textarea>
                </div>
              </div>

              <div class="form-group row mb-0">
                <label for="" class="col-sm-3 col-form-label-sm"></label>
                <div class="col-sm-9">
                  <img src="../images/soal/<?= $soal['gambar'] ?>" alt="" class="my-2" width="200px" <?= $soal['gambar'] == '' ? 'hidden' : null; ?>>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label for="gambar" class="col-sm-3 col-form-label-sm">Gambar</label>
                <div class="col-sm-9">
                  <input type="hidden" name="gambarlama" value="<?= $soal['gambar'] ?>">
                  <input type="file" name="gambar" class="form-control form-control-sm">
                  <span class="text-small">Type file gambar JPG | JPEG | PNG | GIF</span>
                </div>
              </div>

              <div class="form-group row mb-2">
                <label for="a" class="col-sm-3 col-form-label-sm">Jawaban A</label>
                <div class="col-sm-9">
                  <input type="text" name="a" value="<?= $soal['a'] ?>" class="form-control form-control-sm" placeholder="Pilihan jawaban A" required>
                </div>
              </div>
              <div class="form-group row mb-2">
                <label for="b" class="col-sm-3 col-form-label-sm">Jawaban B</label>
                <div class="col-sm-9">
                  <input type="text" name="b" value="<?= $soal['b'] ?>" class="form-control form-control-sm" placeholder="Pilihan jawaban B" required>
                </div>
              </div>
              <div class="form-group row mb-2">
                <label for="c" class="col-sm-3 col-form-label-sm">Jawaban C</label>
                <div class="col-sm-9">
                  <input type="text" name="c" value="<?= $soal['c'] ?>" class="form-control form-control-sm" placeholder="Pilihan jawaban C" required>
                </div>
              </div>
              <div class="form-group row mb-2">
                <label for="d" class="col-sm-3 col-form-label-sm">Jawaban D</label>
                <div class="col-sm-9">
                  <input type="text" name="d" value="<?= $soal['d'] ?>" class="form-control form-control-sm" placeholder="Pilihan jawaban D" required>
                </div>
              </div>
              <div class="form-group row mb-2">
                <label for="kunci jawaban" class="col-sm-3 col-form-label-sm">Kunci Jawaban</label>
                <div class="col-sm-2">
                  <div class="form-check">
                    <label for="" class="form-check-label">
                      <input type="radio" name="kunci" <?= $soal['kunci_jawaban'] == 'A' ? 'checked' : null; ?> value="A" class="form-check-input" required>A
                    </label>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-check">
                    <label for="" class="form-check-label">
                      <input type="radio" name="kunci" <?= $soal['kunci_jawaban'] == 'B' ? 'checked' : null; ?>  value="B" class="form-check-input" required>B
                    </label>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-check">
                    <label for="" class="form-check-label">
                      <input type="radio" name="kunci" <?= $soal['kunci_jawaban'] == 'C' ? 'checked' : null; ?>  value="C" class="form-check-input" required>C
                    </label>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-check">
                    <label for="" class="form-check-label">
                      <input type="radio" name="kunci" <?= $soal['kunci_jawaban'] == 'D' ? 'checked' : null; ?>  value="D" class="form-check-input" required>D
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group row mb-2">
                <label for="d" class="col-sm-3 col-form-label-sm"></label>
                <div class="col-sm-9">
                  <button type="submit" name="update" class="btn btn-warning btn-icon-text btn-rounded text-white">
                    <i class="ti-pencil-alt btn-icon-prepend"></i> Update
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <!-- content-wrapper ends -->
</div>
<!-- main-panel ends -->

<?php 

require '../templates/footer.php';
?>
    

