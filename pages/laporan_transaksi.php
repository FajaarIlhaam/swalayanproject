<?php

include('fpdf.php');

$pdf = new FPDF();

// membuat halaman baru
$pdf->AddPage();

// setting jenis font
$pdf->SetFont('Arial','B',16);

// mencetak string
$pdf->Cell(190,7,'Laporan Transaksi',0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,7,'Periode '.date("d-m-Y").' s/d '.date("d-m-Y"),0,1,'C');

//header tabel
$pdf->Cell(10,7,'NO',1,0);
$pdf->Cell(35,7,'ID Transaksi',1,0);
$pdf->Cell(35,7,'Nama Pelanggan',1,0);
$pdf->Cell(35,7,'Tanggal',1,0);
$pdf->Cell(35,7,'Nama Barang',1,0);
$pdf->Cell(20,7,'Jumlah',1,0);
$pdf->Cell(30,7,'Total',1,0);
$pdf->Cell(30,7,'Nama User',1,1);

//Data
$no = 0;
$sql = "SELECT * FROM `v_transaksi` ORDER BY `v_transaksi`.`id_transaksi` DESC";
$query = mysqli_query($sqlkoneksi, $sql);
while ($d = mysqli_fetch_array($query)) {
    $total_rupiah = number_format($d['total'], 2, ',', '.');
    $no++;
    $pdf->Cell(10,7,$no,1,0);
    $pdf->Cell(35,7,$d['id_transaksi'],1,0);
    $pdf->Cell(35,7,$d['nama_pelanggan'],1,0);
    $pdf->Cell(35,7,$d['tanggal'],1,0);
    $pdf->Cell(35,7,$d['nama_barang'],1,0);
    $pdf->Cell(20,7,$d['jumlah'],1,0);
    $pdf->Cell(30,7,'Rp.'.$total_rupiah,1,0);
    $pdf->Cell(30,7,$d['nama_user'],1,1);
}

$pdf->Output();

?>
