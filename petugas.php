<h1 class="h3 mb-3">Petugas</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tpetugas"><i data-feather="file-plus"></i> Data Petugas</button>
                <hr>
                <table class="table table-bordered table-striped hover cell-border" id="petugas">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Petugas</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM petugas ");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $i; ?> </td>
                                <td><?php echo $data['nama_petugas']; ?> </td>
                                <td><?php echo $data['username']; ?> </td>
                                <td><?php echo $data['level']; ?> </td>
                                <td>
                                    <a href="?page=petugas_u&id=<?php echo $data['id_petugas']; ?>" class="btn btn-warning btn-sm"><i data-feather="edit"></i> Ubah</a>
                                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hpetugas<?php echo $data['id_petugas'] ?>"><i data-feather="trash"></i>Hapus</button>
                                </td>
                            </tr>
                            <!-- Modal Hapus-->
                            <div class="modal fade" id="hpetugas<?php echo $data['id_petugas'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="col-12">
                                                <div class="text-center">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data Petugas</h1>
                                                </div>
                                            </div>
                                        </div>
                                        <form method="post" action="aksi-crud.php">
                                            <input type="hidden" name="id_petugas" value="<?= $data['id_petugas'] ?>">
                                            <div class="modal-body">
                                                <h5 cl class="text-center">Apakah Tuan Yakin ingin Menghapus Data Petugas ini? <br>
                                                    <span class="text-danger"><?= $data['nama_petugas'] ?> - <?= $data['username'] ?> - <?= $data['level'] ?></span>
                                                </h5>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="col-12">
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-success" name="phapus">Iya Yakin!</button>
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
<div class="modal fade" id="tpetugas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-12">
                    <div class="text-center">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Petugas</h1>
                    </div>
                </div>
            </div>
            <form method="post" action="aksi-crud.php">
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label">Nama Petugas</label>
                            <input type="text" name="nama_petugas" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Level</label>
                            <select type="text" name="level" class="form-select" required>
                                <option value="" hidden>- Option -</option>
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-12">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success" name="psimpan">Simpan</button>
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
    let table = new DataTable('#petugas');
</script>