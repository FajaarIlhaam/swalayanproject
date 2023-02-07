<div class="row">
    <form action="" method="post">
    <div class="card">
        <div class="card-body">
            <div class="row d-flex justify-content-end">
                <div class="col-md-8">
                    <h4 class="fs-2 card-title">Laporan Transaksi</h4>
                </div>
                <div class="col-md-4 d-flex justify-content-end">
                        <input type="datetime-local" step="1" value="<?php echo $Now->format('Y-m-d 00:00:00'); ?>" name="tanggal_awal" class="form-control">
                        <input type="datetime-local" step="1" value="<?php echo $Now->format('Y-m-d 23:59:59'); ?>"  name="tanggal_akhir" class="form-control mx-2">
                        <button type="submit" name="search" class="btn btn-primary"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
    <div class="card">
        <div class="card-body">
            <div class="col-12 py-3 mt-3" style="border-top:1px dotted black;border-radius:2px;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID Transaksi</th>
                            <th>ID Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>User</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        if(isset($_POST['search'])) {

                            $tanggal_awal = $_POST['tanggal_awal'];
                            $tanggal_akhir = $_POST['tanggal_akhir'];

                        $sql = "SELECT * FROM `v_transaksi` ORDER BY `v_transaksi`.`id_transaksi` DESC";
                        $query = mysqli_query($sqlkoneksi, $sql);
                        $no = 0;
                    }
                        while ($d = mysqli_fetch_array($query)) {
                            $total_rupiah = number_format($d['total'], 2, ',', '.');
                            $no++
                        ?>

                            <tr>
                                <td scope='row'><?php echo $no ?></td>
                                <td><?php echo $d['id_transaksi'] ?></td>
                                <td><?php echo $d['nama_pelanggan'] ?></td>
                                <td><?php echo $d['tanggal'] ?></td>
                                <td><?php echo $d['nama_barang'] ?></td>
                                <td><?php echo $d['jumlah'] ?></td>
                                <td>Rp.<?php echo $total_rupiah ?></td>
                                <td><?php echo $d['nama_user'] ?></td>
                            </tr>
                        <?php } ?>
                </table>


            </div>

        </div>
    </div>
</div>