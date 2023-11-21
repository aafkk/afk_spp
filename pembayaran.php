<?php

if (isset($_POST['id_petugas'])) {
    $id_petugas = $_POST['id_petugas'];
    $nisn = $_POST['nisn'];
    $tgl_bayar = $_POST['tgl_bayar'];
    $id_spp = $_POST['id_spp'];
    $jumlah_bayar = $_POST['jumlah_bayar'];
    $bulan_bayar = $_POST['bulan_bayar'];
    $tahun_dibayar = $_POST['tahun_dibayar'];

    $query = mysqli_query($koneksi, "INSERT INTO pembayaran(id_petugas,nisn,tgl_bayar,id_spp,jumlah_bayar,bulan_bayar,tahun_dibayar) values ('$id_petugas','$nisn','$tgl_bayar','$id_spp','$jumlah_bayar','$bulan_bayar','$tahun_dibayar') ");

    if ($query) {
        echo '<script>alert("Pembayaran Berhasil")</script>';
    } else {
        echo '<script>alert("Pembayaran Gagal")</script>';
    }
}

?>



<h1 class="h3 mb-3">Administrasi Pembayaran Spp</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post">
                    <table class="table">
                        <tr>
                            <td width="200">Petugas</td>
                            <td width="1">:</td>
                            <td>
                                <select name="id_petugas" class="form-select" required>
                                    <option value="" hidden></option>
                                    <?php
                                    $f = mysqli_query($koneksi, "SELECT * FROM petugas");
                                    while ($petugas = mysqli_fetch_array($f)) {
                                    ?>
                                        <option value="<?php echo $petugas['id_petugas']; ?>"><?php echo $petugas['nama_petugas']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="200">Siswa</td>
                            <td width="1">:</td>
                            <td>
                                <select name="nisn" class="form-select" required>
                                    <option value="" hidden></option>
                                    <?php
                                    $f = mysqli_query($koneksi, "SELECT * FROM siswa");
                                    while ($siswa = mysqli_fetch_array($f)) {
                                    ?>
                                        <option value="<?php echo $siswa['nisn']; ?>"><?php echo $siswa['nama']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="200">Tanggal Pembayaran</td>
                            <td width="1">:</td>
                            <td>
                                <input class="form-control" type="date" name="tgl_bayar" required>
                            </td>
                        </tr>
                        <tr>
                            <td width="200">Bulan Pemabayaran</td>
                            <td width="1">:</td>
                            <td>
                                <select name="bulan_bayar" class="form-select" required>
                                    <option value="" hidden></option>
                                    <option>January</option>
                                    <option>February</option>
                                    <option>Maret</option>
                                    <option>April</option>
                                    <option>Mei</option>
                                    <option>Juny</option>
                                    <option>July</option>
                                    <option>Agustus</option>
                                    <option>Septeber</option>
                                    <option>Oktober</option>
                                    <option>November</option>
                                    <option>Desember</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="200">Tahun Pembayaran</td>
                            <td width="1">:</td>
                            <td>
                                <input class="form-control" type="text" name="tahun_dibayar" required>
                            </td>
                        </tr>
                        <tr>
                            <td width="200">Spp</td>
                            <td width="1">:</td>
                            <td>
                                <select name="id_spp" class="form-select" required>
                                    <option value="" hidden></option>
                                    <?php
                                    $f = mysqli_query($koneksi, "SELECT * FROM spp");
                                    while ($spp = mysqli_fetch_array($f)) {
                                    ?>
                                        <option value="<?php echo $spp['id_spp']; ?>"><?php echo number_format($spp['nominal']) . '(' . $spp['tahun'] . ')'; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="200">Jumlah Pembayaran</td>
                            <td width="1">:</td>
                            <td>
                            <div class="input-group me-4 mh-50 form-inline" title="Masukkan input nominal">
                                <span class="input-group-text text-body">IDR.</span>
                                <input type="number" name="jumlah_bayar" class="form-control" onkeypress="if(this.value.length==9) return false" value="<?php echo $data['jumlah_bayar'] ?>" required>
                            </div>
                            </td>
                        </tr>
                        <tr align="center">
                            <td colspan="3">
                                <button type="submit"  class="btn btn-success"> <i data-feather="check"></i> Simpan</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>