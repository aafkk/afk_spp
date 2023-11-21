<?php
$id = $_GET['id'];
if (isset($_POST['nisn'])) {
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $id_kelas = $_POST['id_kelas'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $password = md5($_POST['password']);

    if (empty($_POST['password'])) {
        $query = mysqli_query($koneksi, "UPDATE siswa SET nisn='$nisn',nis='$nis',nama='$nama',id_kelas='$id_kelas',alamat='$alamat',no_telp='$no_telp' WHERE nisn='$id'");

        if ($query) {
            echo '<script>alert("Data Berhasil Di Ubah");location.href="?page=siswa";</script>';
        }
    }else {
        $query = mysqli_query($koneksi, "UPDATE siswa SET nisn='$nisn',nis='$nis',nama='$nama',id_kelas='$id_kelas',alamat='$alamat',no_telp='$no_telp',password='$password' WHERE nisn='$id'");

        if ($query) {
            echo '<script>alert("Data Berhasil Di Ubah");location.href="?page=siswa";</script>';
        }
    }

   
}
$query = mysqli_query($koneksi, "SELECT * FROM siswa INNER JOIN kelas ON kelas.id_kelas=siswa.id_kelas WHERE nisn='$id'");
$data = mysqli_fetch_array($query);
?>

<h1 class="h3 mb-3">Ubah Data Siswa</h1>

<div class="row">
    <div class="col-12">
        <div class="card flex-fill">
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nisn</label>
                        <div>
                            <input type="text" name="nisn" class="form-control" value="<?php echo $data['nisn'] ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nis</label>
                        <div>
                            <input type="text" name="nis" class="form-control" value="<?php echo $data['nis'] ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Siswa</label>
                        <div>
                            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama'] ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Kelas</label>
                        <select name="id_kelas" class="form-select" >
                            <?php
                            $query_tambah = mysqli_query($koneksi, "SELECT * FROM kelas");
                            while ($tambah_kelas = mysqli_fetch_array($query_tambah)) {
                            ?>
                                <option value="<?= $tambah_kelas['id_kelas'] ?>" <?= ($data['id_kelas'] == $tambah_kelas['id_kelas'] ? 'selected' : '') ?>><?= $tambah_kelas['nama_kelas'] . ' - ' . $tambah_kelas['kompetensi_keahlian'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <div>
                            <input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat'] ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Telepon</label>
                        <div>
                            <input type="text" name="no_telp" class="form-control" value="<?php echo $data['no_telp'] ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div>
                            <input type="password" name="password" class="form-control">
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