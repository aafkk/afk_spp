<?php
$id = $_GET['id'];
if (isset($_POST['nama_petugas'])) {
    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $level = $_POST['level'];
    $password = md5($_POST['password']);

    if (empty($_POST['password'])) {
        $query = mysqli_query($koneksi, "UPDATE petugas SET nama_petugas='$nama_petugas',username='$username',level='$level' WHERE Id_petugas='$id'");

        if ($query) {
            echo '<script>alert("Data Berhasil Di Ubah");location.href="?page=petugas";</script>';
        }
    }else {
        $query = mysqli_query($koneksi, "UPDATE petugas SET nama_petugas='$nama_petugas',username='$username',level='$level',password='$password' WHERE Id_petugas='$id'");

        if ($query) {
            echo '<script>alert("Data Berhasil Di Ubah");location.href="?page=petugas";</script>';
        }
    }

   
}
$query = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas='$id'");
$data = mysqli_fetch_array($query);
?>

<h1 class="h3 mb-3">Ubah Petugas</h1>

<div class="row">
    <div class="col-12">
        <div class="card flex-fill">
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nama Petugas</label>
                        <div>
                            <input type="text" name="nama_petugas" class="form-control" value="<?php echo $data['nama_petugas'] ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <div>
                            <input type="text" name="username" class="form-control" value="<?php echo $data['username'] ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Level</label>
                        <select type="text" name="level"  class="form-select" required>
                            <option value="admin" <?php echo ($data['level'] == 'admin' ? 'selected' : '') ?>>Admin</option>
                            <option value="petugas" <?php echo ($data['level'] == 'petugas' ? 'selected' : '') ?>>Petugas</option>
                        </select>
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