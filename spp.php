<h1 class="h3 mb-3">Pspp</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#tspp"><i data-feather="file-plus"></i> Data Spp</button>
                <hr>
                <table class="table table-bordered table-striped hover cell-border" id="spp">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Nominal</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM spp ");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $i; ?> </td>
                            <td><?php echo $data['tahun']; ?> </td>
                            <td>
                                <p class="fotn-weight-bold mb-0">IDR.<?= number_format($data['nominal'], 2, ',', '.') ?></p>
                            </td>
                            <td>
                                <a href="?page=spp_u&id=<?php echo $data['id_spp']; ?>" class="btn btn-warning btn-sm"><i data-feather="edit"></i> Ubah</a>
                                <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hspp<?php echo $data['id_spp'] ?>"><i data-feather="trash"></i> Hapus</button>
                            </td>
                        </tr>
                        
<!-- Modal Hapus-->
<div class="modal fade" id="hspp<?php echo $data['id_spp'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-12">
                    <div class="text-center">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data Spp</h1>
                    </div>
                </div>
            </div>
            <form method="post" action="aksi-crud.php">
                <input type="hidden" name="id_spp" value="<?= $data['id_spp'] ?>">
                <div class="modal-body">
                    <h5 cl class="text-center">Apakah Tuan Yakin ingin Menghapus Data Spp ini? <br>
                        <span class="text-danger"><?= $data['tahun'] ?> - <?= $data['nominal'] ?> </span>
                    </h5>
                </div>
                <div class="modal-footer">
                    <div class="col-12">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success" name="thapus">Iya Yakin!</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Akhir Modal Hapus-->
                    <?php
                        $i++;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal tambah -->
<div class="modal fade" id="tspp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-12">
                    <div class="text-center">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Spp</h1>
                    </div>
                </div>
            </div>
            <form method="post" action="aksi-crud.php">
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label">Tahun</label>
                            <input type="text" name="tahun" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nominal</label>
                            <div class="input-group me-4 mh-50 form-inline" title="Masukkan input nominal">
                                <span class="input-group-text text-body">IDR.</span>
                                <input type="number" name="nominal" class="form-control" onkeypress="if(this.value.length==9) return false" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-12">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success" name="tsimpan">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                            <button type="reset" class="btn btn-success rounded"><i data-feather="refresh-ccw"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Akhir Modal Tambah-->

<script>
    let table = new DataTable('#spp');
</script>
