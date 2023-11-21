<?php
session_start();
include "koneksi.php";
if (isset($_SESSION['user']['level'])) {
    $where = "";
} else {
    $where = "WHERE pembayaran.nisn=" . $_SESSION['user']['nisn'];
}
?>


<table border="1" width="100%" cellpadding="5" cellspacing="0">
    <tr>
        <th colspan="9">
            <h3>TABEL LAPORAN PEMBAYARAN SPP</h3>
        </th>
    </tr>
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
    </tr>
    <?php
    $i = 1;
    if (isset($_SESSION['user']['level'])) {
        $query = mysqli_query($koneksi, "SELECT * FROM pembayaran left join petugas on petugas.id_petugas = pembayaran.id_petugas left join siswa on siswa.nisn=pembayaran.nisn left join spp on spp.id_spp = pembayaran.id_spp");
    } else {
        $id = $_SESSION['user']['nisn'];
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
        </tr>
    <?php
        $i++;
    }
    ?>
</table>

<script type="text/javascript">
    window.print();
</script>