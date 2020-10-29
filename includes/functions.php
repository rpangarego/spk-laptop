<?php
error_reporting(~E_NOTICE);
session_start();

// ini_set('max_execution_time', 60 * 1);
ini_set('memory_limit', '512M');
ini_set('upload_max_filesize', '32M');

include 'config.php';
include 'db.php';
$db = new DB($config['server'], $config['username'], $config['password'], $config['database_name']);
include'general.php';
// include'includes/paging.php';
    
$mod = $_GET['m'];
$act = $_GET['act'];

function notification($notif){
    //Notifikasi: 101 = 'Data berhasil disimpan!' | 102 = 'Data telah diupdate!' | 103 = 'Data telah dihapus!'
    setcookie('notif',$notif, time()+5);    
}

function getProcessorOption($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT * FROM tb_processor ORDER BY id_processor");
    foreach($rows as $row){
        if($row->id_processor==$selected)
            $a.="<option value='$row->id_processor' selected>$row->detailProcessor</option>";
        else
            $a.="<option value='$row->id_processor'>$row->detailProcessor</option>";
    }
    return $a;
}

function getMemoriOption($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT * FROM tb_memori ORDER BY id_memori");
    foreach($rows as $row){
        if($row->id_memori==$selected)
            $a.="<option value='$row->id_memori' selected>$row->memori</option>";
        else
            $a.="<option value='$row->id_memori'>$row->memori</option>";
    }
    return $a;
}

function getPenyimpananOption($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT * FROM tb_penyimpanan ORDER BY id_penyimpanan");
    foreach($rows as $row){
        if($row->id_penyimpanan==$selected)
            $a.="<option value='$row->id_penyimpanan' selected>$row->penyimpanan</option>";
        else
            $a.="<option value='$row->id_penyimpanan'>$row->penyimpanan</option>";
    }
    return $a;
}

function getJenisPenyimpananOption($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT * FROM tb_jenispenyimpanan ORDER BY id_jenispenyimpanan");
    foreach($rows as $row){
        if($row->id_jenispenyimpanan==$selected)
            $a.="<option value='$row->id_jenispenyimpanan' selected>$row->jenispenyimpanan</option>";
        else
            $a.="<option value='$row->id_jenispenyimpanan'>$row->jenispenyimpanan</option>";
    }
    return $a;
}

function getKartuGrafisOption($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT * FROM tb_kartugrafis ORDER BY id_kartugrafis");
    foreach($rows as $row){
        if($row->id_kartugrafis==$selected)
            $a.="<option value='$row->id_kartugrafis' selected>$row->kartugrafis</option>";
        else{
            if($row->kartugrafis == 'Radeon' || $row->kartugrafis == 'Geforce')
                $a.="<option value='$row->id_kartugrafis'>$row->kartugrafis ($row->vram VRAM)</option>";
            else
                $a.="<option value='$row->id_kartugrafis'>$row->kartugrafis</option>";
        }
    }
    return $a;
}

function getBrandOption($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT brand FROM tb_produk GROUP BY brand ORDER BY brand");
    foreach($rows as $row){
        if($row->brand==$selected)
            $a.="<option value='$row->brand' selected>$row->brand</option>";
        else
            $a.="<option value='$row->brand'>$row->brand</option>";
    }
    return $a;
}


function uploadFotoProduk(){
    $namafile = $_FILES['fotoProduk']['name'];
    $ukuranfile = $_FILES['fotoProduk']['size'];
    $error = $_FILES['fotoProduk']['error'];
    $tmpnama = $_FILES['fotoProduk']['tmp_name'];

    // Cek ada gambar yg diupload/tidak
    if ($error === 4) {
        // echo "<script> alert('Tidak ada foto/gambar terpilih!') </script>";
        // return false;
        $value = '';
        return $value;
    }

    // Cek pastikan file yang diupload adalah foto/gambar
    $ekstensigambarvalid = ['jpg','jpeg','png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $ekstensigambarvalid)) {
        echo "<script> alert('File yang diupload bukan foto/gambar') </script>";
        return false;
    }

    // Cek ukuran file
    //Jika lebih dari 2MB atau error code 1: The uploaded file exceeds the upload_max_filesize
    if ($ukuranfile > 2000000 || $error === 1) { 
        echo "<script> alert('Ukuran file terlalu besar!') </script>";
        return false;
    }

    // Pengecekan selesai, Foto/Gambar siap upload!
    // Generate nama baru
    $namafilebaru = uniqid().'_'.uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;

    move_uploaded_file($tmpnama, '../img/fotoProduk/'.$namafilebaru);
    return $namafilebaru;
}

function uploadFotoProduk_edit($value){
    $namafile = $_FILES['fotoProduk']['name'];
    $ukuranfile = $_FILES['fotoProduk']['size'];
    $error = $_FILES['fotoProduk']['error'];
    $tmpnama = $_FILES['fotoProduk']['tmp_name'];

    // Cek ada gambar yg diupload/tidak
    if ($error === 4) {
        $value = $_POST['tmp_fotoProduk'];
        return $value;
    }else{
        // Cek pastikan file yang diupload adalah foto/gambar
        $ekstensigambarvalid = ['jpg','jpeg','png'];
        $ekstensigambar = explode('.', $namafile);
        $ekstensigambar = strtolower(end($ekstensigambar));
        if (!in_array($ekstensigambar, $ekstensigambarvalid)) {
            echo "<script> alert('File yang diupload bukan foto/gambar') </script>";
            return false;
        }

        // Cek ukuran file
        //Jika lebih dari 2MB atau error code 1: The uploaded file exceeds the upload_max_filesize
        if ($ukuranfile > 2000000 || $error === 1) { 
            echo "<script> alert('Ukuran file terlalu besar!') </script>";
            return false;
        }

        // Pengecekan selesai, Foto/Gambar siap upload!
        // Generate nama baru
        $namafilebaru = uniqid().'_'.uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $ekstensigambar;

        move_uploaded_file($tmpnama, '../img/fotoProduk/'.$namafilebaru);
        return $namafilebaru;
    }

    
}