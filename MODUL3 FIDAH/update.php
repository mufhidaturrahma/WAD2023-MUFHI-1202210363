<!-- Pada file ini kalian membuat coding untuk logika update / meng-edit data mobil pada showroom sesuai id-->

<?php
// Koneksi ke database
include("connect.php");

// Tangkap id mobil dari url
$id = $_GET['id'];

// Buat fungsi update
function update($data) {
    global $connect;

    // Simpan data dalam variabel
    $id = $data['id'];
    $nama_mobil = $data['nama_mobil'];
    $brand_mobil = $data['brand_mobil'];
    $warna_mobil = $data['warna_mobil'];
    $tipe_mobil = $data['tipe_mobil'];
    $harga_mobil = $data['harga_mobil'];

    // Buat query SQL UPDATE
    $query = "UPDATE mobil SET nama_mobil='$nama_mobil', brand_mobil='$brand_mobil', warna_mobil='$warna_mobil', tipe_mobil='$tipe_mobil', harga_mobil='$harga_mobil',  WHERE id='$id'";

    // Eksekusi query
    $result = $connect->query($query);

    // Jika eksekusi query berhasil
    if ($result) {
        echo "Data mobil berhasil diupdate";
        header('Location ; list_mobil.php');
    } else {
        echo "Error: " . $query . "<br>" . $connect->error;
        header('Location ; list_mobil.php');
    }
}

// Panggil fungsi update dengan data yang sesuai
update(['id' => $id, 'nama_mobil' => 'Nama Mobil Baru', 'brand_mobil' => 'Brand Mobil Baru', 'warna_mobil' => 'Warna Mobil Baru', 'tipe mobil' => 'Tipe Mobil Baru', 'harga mobil' => 'Harga Mobil Baru']);

// Tutup koneksi ke database
$connect->close();
?>
?>