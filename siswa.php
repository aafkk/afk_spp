<h1 class="h3 mb-3">Siswa</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tsiswa"><i data-feather="file-plus"></i> Data Siswa</button>
                <hr>
                <table class="table table-bordered table-striped hover cell-border" id="siswa">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nisn</th>
                        <th>Nis</th>
                        <th>Nama Siswa</th>
                        <th>Nama Kelas</th>
                        <th>Alamat</th>
                        <th>No Telpon</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas ");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>

                        <tr>
                            <td><?php echo $i; ?> </td>
                            <td><?php echo $data['nisn']; ?> </td>
                            <td><?php echo $data['nis']; ?> </td>
                            <td><?php echo $data['nama']; ?> </td>
                            <td><?php echo $data['nama_kelas']; ?> - <?php echo $data['kompetensi_keahlian']; ?> </td>
                            <td><?php echo $data['alamat']; ?> </td>
                            <td><?php echo $data['no_telp']; ?> </td>
                            <td>
                                <a href="?page=siswa_u&id=<?php echo $data['nisn']; ?>" class="btn btn-warning btn-sm"><i data-feather="edit"></i> Ubah</a>
                                <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hsiswa<?php echo $data['nisn'] ?>"><i data-feather="trash"></i> Hapus</button>
                            </td>
                        </tr>
                                             
<!-- Modal Hapus-->
<div class="modal fade" id="hsiswa<?php echo $data['nisn'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-12">
                    <div class="text-center">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data Siswa</h1>
                    </div>
                </div>
            </div>
            <form method="post" action="aksi-crud.php">
                <input type="hidden" name="nisn" value="<?= $data['nisn'] ?>">
                <div class="modal-body">
                    <h5 cl class="text-center">Apakah Tuan Yakin ingin Menghapus Data Siswa ini? <br>
                        <span class="text-danger"><?= $data['nisn'] ?> - <?= $data['nis'] ?> - <?= $data['nama'] ?> - <?= $data['nama_kelas'] ?> - <?= $data['alamat'] ?> - <?= $data['no_telp'] ?></span>
                    </h5>
                </div>
                <div class="modal-footer">
                    <div class="col-12">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success" name="shapus">Iya Yakin!</button>
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
<div class="modal fade" id="tsiswa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-12">
                    <div class="text-center">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Siswa</h1>
                    </div>
                </div>
            </div>
            <form method="post" action="aksi-crud.php">
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label">Nisn</label>
                            <input type="text" name="nisn" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nis</label>
                            <input type="text" name="nis" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Siswa</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Kelas</label>
                            <select name="id_kelas" class="form-select" required>
                                <option value="" hidden>- Option -</option>
                                <?php 
                                $query_tambah = mysqli_query($koneksi, "SELECT * FROM kelas");
                                while ($tambah_kelas = mysqli_fetch_array($query_tambah)) {
                                ?>
                                <option value="<?= $tambah_kelas['id_kelas'] ?>"><?= $tambah_kelas['nama_kelas'] . ' - ' . $tambah_kelas['kompetensi_keahlian'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No Telpon</label>
                            <input type="text" name="no_telp" class="form-control" required>
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
                            <button type="submit" class="btn btn-success" name="ssimpan">Simpan</button>
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
    let table = new DataTable('#siswa');
</script>