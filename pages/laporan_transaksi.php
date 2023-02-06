<?php
require_once('tcpdf/tcpdf.php');

// Buat objek PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Buat halaman baru
$pdf->AddPage();

// Tulis judul tabel
$html = '<h1>Laporan Transaksi</h1>';
$html .= '<table border="1">';
$html .= '<tr>';
$html .= '<th>No</th>';
$html .= '<th>ID Transaksi</th>';
$html .= '<th>Nama Pelanggan</th>';
$html .= '<th>Tanggal</th>';
$html .= '<th>Nama Barang</th>';
$html .= '<th>Jumlah</th>';
$html .= '<th>Total</th>';
$html .= '<th>Nama User</th>';
$html .= '</tr>';

// Ambil data transaksi dari database
$sql = "SELECT * FROM v_transaksi ORDER BY id_transaksi DESC";
$query = mysqli_query($sqlkoneksi, $sql);
$no = 0;
while ($d = mysqli_fetch_array($query)) {
    $total_rupiah = number_format($d['total'], 2, ',', '.');
    $no++;

    // Tambahkan data transaksi ke dalam tabel
    $html .= '<tr>';
    $html .= '<td>'.$no.'</td>';
    $html .= '<td>'.$d['id_transaksi'].'</td>';
    $html .= '<td>'.$d['nama_pelanggan'].'</td>';
    $html .= '<td>'.$d['tanggal'].'</td>';
    $html .= '<td>'.$d['nama_barang'].'</td>';
    $html .= '<td>'.$d['jumlah'].'</td>';
    $html .= '<td>Rp.'.$total_rupiah.'</td>';
    $html .= '<td>'.$d['nama_user'].'</td>';
    $html .= '</tr>';
}

// Tutup tabel
$html .= '</table>';

// Tulis data tabel ke PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Output PDF
$pdf->Output('laporan_transaksi.pdf', 'D');
?>
