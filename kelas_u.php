<?php
$id = $_GET['id'];
if (isset($_POST['nama_kelas'])) {
    $nama_kelas = $_POST['nama_kelas'];
    $kompetensi_keahlian = $_POST['kompetensi_keahlian'];

    $query = mysqli_query($koneksi, "UPDATE kelas SET nama_kelas='$nama_kelas', kompetensi_keahlian='$kompetensi_keahlian' WHERE id_kelas='$id'");

    if ($query) {
        echo '<script>alert("Data Berhasil Di Ubah");location.href="?page=kelas";</script>';
    }
}
$query = mysqli_query($koneksi, "SELECT * FROM kelas WHERE Id_kelas='$id'");
$data = mysqli_fetch_array($query);
?>

<h1 class="h3 mb-3">Ubah Kelas </h1>

<div class="row">
    <div class="col-12">
        <div class="card flex-fill">
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nama Kelas</label>
                        <div>
                            <input type="text" name="nama_kelas" class="form-control" value="<?php echo $data['nama_kelas'] ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kompetensi Keahlian</label>
                        <div>
                            <input type="text" name="kompetensi_keahlian" class="form-control" value="<?php echo $data['kompetensi_keahlian'] ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <span onclick="history.back()" class="btn btn-secondary"><i data-feather="corner-down-left"></i></span>
                        <button class="btn btn-primary rounded"><i data-feather="save"></i></button>
                        <button type="reset" class="btn btn-success rounded"><i data-feather="refresh-ccw"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>