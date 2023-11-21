<?php
$id = $_GET['id'];
if (isset($_POST['tahun'])) {
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];

    $query = mysqli_query($koneksi, "UPDATE spp SET tahun='$tahun', nominal='$nominal' WHERE id_spp='$id'");

    if ($query) {
        echo '<script>alert("Data Berhasil Di Ubah");location.href="?page=spp";</script>';
    }
}
$query = mysqli_query($koneksi, "SELECT * FROM spp WHERE id_spp='$id'");
$data = mysqli_fetch_array($query);
?>

<h1 class="h3 mb-3">Ubah Spp </h1>

<div class="row">
    <div class="col-12">
        <div class="card flex-fill">
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">Tahun</label>
                        <div>
                            <input type="text" name="tahun" class="form-control" value="<?php echo $data['tahun'] ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nominal</label>
                        <div class="input-group me-4 mh-50 form-inline" title="Masukkan input nominal">
                            <span class="input-group-text text-body">IDR.</span>
                            <input type="number" name="nominal" class="form-control" onkeypress="if(this.value.length==9) return false" value="<?php echo $data['nominal'] ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <span onclick="history.back()" class="btn btn-secondary"><i data-feather="corner-down-left"></i></span>
                        <button class="btn btn-primary"><i data-feather="save"></i></button>
                        <button type="reset" class="btn btn-success rounded"><i data-feather="refresh-ccw"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>