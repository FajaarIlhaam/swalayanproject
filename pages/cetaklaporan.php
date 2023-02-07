<html>
 
<head>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/main/app.css" />
    <link rel="stylesheet" href="../assets/css/main/app-dark.css" />
</head>
 
<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="col-12">
                    <div class="d-flex justify-content-center">
                        <h4 class="text-primary">ZARD MART</h4>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-center">
                        <div class="fa fa fs-6 text-secondary"> Struk Transaksi</div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center text-secondary">
                    <small class="fa fa text-secondary mt-1 accessibility-issue--error"
                        style="font-size:12px">Jln. Dagang
                        No.39 </small>
                </div>
                <div class="col-12 d-flex justify-content-center text-secondary">
                    <small class="fa fa text-secondary mt-1 pb-5 accessibility-issue--error" style="font-size:14px"> +62
                        813-6495-0264 </small>
                </div>
            </div>
        </div>
        <?php 
        if(isset($_GET['id_transaksi'])){
            $id_transaksi = $_GET['id_transaksi'];
            switch($id_transaksi){
                case $id_transaksi;
                include '../koneksi.php';
                $query = mysqli_query($sqlkoneksi,"SELECT * FROM v_transaksi WHERE id_transaksi = '$id_transaksi'");
                $data = mysqli_fetch_array($query);
                break;
            }
        }
    ?>
        <table style="width: 100%;font-size: 13px;" class="w-full p-5">
            <tr>
                <td>Waktu</td>
                <td class="text-end"><?= $data['tanggal']?></td>
            </tr>
            <tr>
                <td>ID Transaksi</td>
                <td class="text-end"><?= $data['id_transaksi'] ?></td>
            </tr>
            <tr>
                <td>Kasir</td>
                <td class="text-end"><?= $data['nama_user'] ?></td>
            </tr>
        </table>
        <div class="p-3 d-flex justify-content-center">
            <h6 class="text-black fa fa">Tipe Pesanan</h6>
        </div>
        <table style="width: 100%;font-size: 13px;" class="w-full mb-3">
            <tr>
                <td>Nama Barang :</td>
                <td class="text-end"><?= $data['nama_barang'] ?></td>
            </tr>
            <tr>
                <td>Jumlah :</td>
                <td class="text-end"><?= $data['jumlah']?> PCS 
            </tr>
            <tr>
                <td>Harga :</td>
                <td class="text-end">Rp. <?= $data['harga']?></td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Subtotal :</td>
                <td class="text-end">Rp. <?= $data['total'] ?></td>
            </tr>
            <tr>
                <td>Pajak (10%) :</td>
                <td class="text-end">
                    <?php
                $harga=$data['total'];
                $ppn=0.1;
                $hitung_ppn =$harga*$ppn;
                $harga_sekarang = $harga - $hitung_ppn;
                echo $hitung_ppn;
            ?>
                </td>
            </tr>
        </table>
        <table style="width: 100%;font-size: 13px;" class="w-full p-5">
            <tr>
                <td>Total :</td>
                <td class="text-end"><?= "Rp. " . number_format($harga_sekarang, 0, ".", "."); ?></td>
            </tr>
            <tr>
                <td>Tunai :</td>
                <td class="text-end">Rp. 70000000</td>
            </tr>
            <tr>
                <td>Kembalian :</td>
                <td class="text-end">Rp. 5000</td>
            </tr>
        </table>
    </div>
 
    <script>
        window.print();
    </script>
</body>
 
</html>