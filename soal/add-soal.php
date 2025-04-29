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
?>

<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <form action="proses-soal.php" method="POST" enctype= multipart/form-data>
      <div class="row">
        <div class="col-md-12 grid-margin mb-3">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h3 class="font-weight-bold mb-0">Tambah Soal</h3>
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
              <div class="form-group row mb-2">
                <label for="pertanyaan" class="col-sm-3 col-form-label-sm">Pertanyaan</label>
                <div class="col-sm-9">
                  <textarea name="soal" id="editor"></textarea>
                </div>
              </div>
              <div class="form-group row mb-3">
                <label for="gambar" class="col-sm-3 col-form-label-sm">Gambar</label>
                <div class="col-sm-9">
                  <input type="file" name="gambar" class="form-control form-control-sm">
                  <span class="text-small">Type file gambar JPG | JPEG | PNG | GIF</span>
                </div>
              </div>
              <div class="form-group row mb-2">
                <label for="a" class="col-sm-3 col-form-label-sm">Jawaban A</label>
                <div class="col-sm-9">
                  <input type="text" name="a" class="form-control form-control-sm" placeholder="Pilihan jawaban A" required>
                </div>
              </div>
              <div class="form-group row mb-2">
                <label for="b" class="col-sm-3 col-form-label-sm">Jawaban B</label>
                <div class="col-sm-9">
                  <input type="text" name="b" class="form-control form-control-sm" placeholder="Pilihan jawaban B" required>
                </div>
              </div>
              <div class="form-group row mb-2">
                <label for="c" class="col-sm-3 col-form-label-sm">Jawaban C</label>
                <div class="col-sm-9">
                  <input type="text" name="c" class="form-control form-control-sm" placeholder="Pilihan jawaban C" required>
                </div>
              </div>
              <div class="form-group row mb-2">
                <label for="d" class="col-sm-3 col-form-label-sm">Jawaban D</label>
                <div class="col-sm-9">
                  <input type="text" name="d" class="form-control form-control-sm" placeholder="Pilihan jawaban D" required>
                </div>
              </div>
              <div class="form-group row mb-2">
                <label for="kunci jawaban" class="col-sm-3 col-form-label-sm">Kunci Jawaban</label>
                <div class="col-sm-2">
                  <div class="form-check">
                    <label for="" class="form-check-label">
                      <input type="radio" name="kunci" value="A" class="form-check-input" required>A
                    </label>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-check">
                    <label for="" class="form-check-label">
                      <input type="radio" name="kunci" value="B" class="form-check-input" required>B
                    </label>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-check">
                    <label for="" class="form-check-label">
                      <input type="radio" name="kunci" value="C" class="form-check-input" required>C
                    </label>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-check">
                    <label for="" class="form-check-label">
                      <input type="radio" name="kunci" value="D" class="form-check-input" required>D
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group row mb-2">
                <label for="d" class="col-sm-3 col-form-label-sm"></label>
                <div class="col-sm-9">
                  <button type="submit" name="save" class="btn btn-primary btn-icon-text btn-rounded text-white">
                    <i class="ti-save-alt btn-icon-prepend"></i> Simpan
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
    

