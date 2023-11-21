<h1 class="h3 mb-3">Kelas</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tkelas"><i data-feather="file-plus"></i> Data Kelas</button>
                <hr>
                <table class="table table-bordered table-striped hover cell-border" id="kelas">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>Kompetensi Keahlian</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM kelas ");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $i; ?> </td>
                            <td><?php echo $data['nama_kelas']; ?> </td>
                            <td><?php echo $data['kompetensi_keahlian']; ?> </td>
                            <td>
                                <a href="?page=kelas_u&id=<?php echo $data['id_kelas']; ?>" class="btn btn-warning btn-sm"><i data-feather="edit"></i> Ubah</a>
                                <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hkelas<?php echo $data['id_kelas'] ?>"><i data-feather="trash"></i> Hapus</button>
                            </td>
                            </td>
                        </tr>
                                             
<!-- Modal Hapus-->
<div class="modal fade" id="hkelas<?php echo $data['id_kelas'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-12">
                    <div class="text-center">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data Kelas</h1>
                    </div>
                </div>
            </div>
            <form method="post" action="aksi-crud.php">
                <input type="hidden" name="id_kelas" value="<?= $data['id_kelas'] ?>">
                <div class="modal-body">
                    <h5 cl class="text-center">Apakah Tuan Yakin ingin Menghapus Data Kelas ini? <br>
                        <span class="text-danger"><?= $data['nama_kelas'] ?> - <?= $data['kompetensi_keahlian'] ?> </span>
                    </h5>
                </div>
                <div class="modal-footer">
                    <div class="col-12">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success" name="khapus">Iya Yakin!</button>
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
<div class="modal fade" id="tkelas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-12">
                    <div class="text-center">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kelas</h1>
                    </div>
                </div>
            </div>
            <form method="post" action="aksi-crud.php">
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label">Nama kelas</label>
                            <input type="text" name="nama_kelas" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">kompetensi keahlian</label>
                            <input type="text" name="kompetensi_keahlian" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-12">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success" name="ksimpan">Simpan</button>
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
    let table = new DataTable('#kelas');
</script>