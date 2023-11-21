<h1 class="h3 mb-3">Riwayat/History Pembayaran</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                if (!empty($_SESSION['user']['level'])) {
                ?>
                <a href="print.php" target="_blank" class="btn btn-info"><i data-feather="printer"></i> Printer</a>
                <?php
                }
                ?>
                <hr>
                <table class="table table-bordered table-striped hover cell-border" id="history">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Petugas</th>
                        <th>Nisn</th>
                        <th>Nama Siswa</th>
                        <th>Tanggal Bayar</th>
                        <th>Bulan Bayar</th>
                        <th>Tahun Dibayar</th>
                        <th>Spp</th>
                        <th>Jumlah Dibayar</th>
                        <?php
                        if (isset($_SESSION['user']['level'])) {
                            $where = "";
                        ?>
                            <th>Action</th>
                        <?php
                        } else {
                            $where = "WHERE pembayaran.nisn=" . $_SESSION['user']['nisn'];
                        }
                        ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    if (isset($_SESSION['user']['level'])) {
                    $query = mysqli_query($koneksi, "SELECT * FROM pembayaran left join petugas on petugas.id_petugas = pembayaran.id_petugas left join siswa on siswa.nisn=pembayaran.nisn left join spp on spp.id_spp = pembayaran.id_spp");
                        
                    }else
                    {
                        $id=$_SESSION['user']['nisn'];
                    $query = mysqli_query($koneksi, "SELECT * FROM pembayaran left join petugas on petugas.id_petugas = pembayaran.id_petugas left join siswa on siswa.nisn=pembayaran.nisn left join spp on spp.id_spp = pembayaran.id_spp WHERE pembayaran.nisn='$id'");

                    }
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $i; ?> </td>
                            <td><?php echo $data['nama_petugas']; ?> </td>
                            <td><?php echo $data['nisn']; ?> </td>
                            <td><?php echo $data['nama']; ?> </td>
                            <td><?php echo $data['tgl_bayar']; ?> </td>
                            <td><?php echo $data['bulan_bayar']; ?> </td>
                            <td><?php echo $data['tahun_dibayar']; ?> </td>
                            <td>
                                <p class="fotn-weight-bold mb-0">IDR.<?= number_format($data['nominal'], 2, ',', '.') ?></p>
                            </td>
                            <td>
                                <p class="fotn-weight-bold mb-0">IDR.<?= number_format($data['jumlah_bayar'], 2, ',', '.') ?></p>
                            </td>
                            <?php
                            if (isset($_SESSION['user']['level'])) {
                            ?>
                                <td>
                                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hhistory<?php echo $data['id_pembayaran'] ?>"><i data-feather="trash"></i> Hapus</button>
                                </td>
                            <?php
                            }
                            ?>
                        </tr>
                        <!-- Modal Hapus-->
                        <div class="modal fade" id="hhistory<?php echo $data['id_pembayaran'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="col-12">
                                            <div class="text-center">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data History</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <form method="post" action="aksi-crud.php">
                                        <input type="hidden" name="id_pembayaran" value="<?= $data['id_pembayaran'] ?>">
                                        <div class="modal-body">
                                            <h5 cl class="text-center">Apakah Tuan Yakin ingin Menghapus Data History ini? <br>
                                                <span class="text-danger"><?= $data['nama_petugas'] ?> - <?= $data['nisn'] ?> - <?= $data['nama'] ?> - <?= $data['tgl_bayar'] ?> - <?= $data['bulan_bayar'] ?>  - <?= $data['tahun_dibayar'] ?></span>
                                            </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="col-12">
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-success" name="bhapus">Iya Yakin!</button>
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


<script>
    let table = new DataTable('#history');
</script>