<?php
require_once'../includes/functions.php';

/** USER **/    
if($mod=='admin_tambah'){
    $nama = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    
    if($nama=='' || $username=='' || $password=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif($db->get_results("SELECT * FROM tb_admin WHERE username='$username'")){
        print_msg("Username tidak tersedia!");
    }else{
        $db->query("INSERT INTO tb_admin (id_admin, nama, username, password) 
                    VALUES (NULL, '$nama', '$username', '$password')");                       
        notification("101");
        redirect_js("index?m=admin");
    }                    
}else if($mod=='admin_edit'){
    $id_admin = htmlspecialchars($_POST['id_admin']);
    $nama = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars($_POST['username']);
    $password   = htmlspecialchars($_POST['password']);
    
    if($nama=='' || $username=='' || $password=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_admin SET nama='$nama', username='$username', password='$password' 
            WHERE id_admin='$_GET[ID]'");
        notification("102");
        redirect_js("index?m=admin"); 
    }    
}else if ($act=='admin_hapus'){
    if ($_GET['ID']==$_SESSION['id_login']) {
        notification('105');
    header("location:index?m=admin");
    exit;
    }else{
        $db->query("DELETE FROM tb_admin WHERE id_admin='$_GET[ID]'");
        notification("103");
        echo $_GET['ID'].' - '.$_SESSION['id_login'];
        header("location:index?m=admin");
    }
} 

/** PROCESSOR */    
else if($mod=='processor_tambah'){
    $processor          = htmlspecialchars($_POST['processor']);
    $detailProcessor    = htmlspecialchars($_POST['detailProcessor']);
    $value              = htmlspecialchars($_POST['value']);
    
    if($processor=='' || $detailProcessor=='' || $value==''){
        print_msg("Field bertanda * tidak boleh kosong!");
    }else{
        $db->query("INSERT INTO tb_processor (id_processor, processor, detailProcessor, value) 
                    VALUES (NULL, '$processor', '$detailProcessor', '$value')");                       
        notification("101");
        redirect_js("index?m=kriteria&sm=processor");
    }                    
}else if($mod=='processor_edit'){
    $id = htmlspecialchars($_POST['id_processor']);
    $processor = htmlspecialchars($_POST['processor']);
    $detailProcessor = htmlspecialchars($_POST['detailProcessor']);
    $value   = htmlspecialchars($_POST['value']);
    
    if($processor=='' || $detailProcessor=='' || $value=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_processor SET processor='$processor', detailProcessor='$detailProcessor', value='$value' WHERE id_processor='$_GET[ID]'");
        notification("102");
        redirect_js("index?m=kriteria&sm=processor");
    }    
}else if ($act=='processor_hapus'){
    $db->query("DELETE FROM tb_processor WHERE id_processor='$_GET[ID]'");
    notification("103");
    header("location:index?m=kriteria&sm=processor");
} 

/** MEMORI/RAM */    
else if($mod=='memori_tambah'){
    $memori   = htmlspecialchars($_POST['memori']);
    $value = htmlspecialchars($_POST['value']);
    
    if($memori=='' || $value==''){
        print_msg("Field bertanda * tidak boleh kosong!");
    }else{
        $db->query("INSERT INTO tb_memori (id_memori, memori, value) VALUES (NULL, '$memori', '$value')");
        notification("101");                       
        redirect_js("index?m=kriteria&sm=memori");
    }                    
} else if($mod=='memori_edit'){
    $id_memori = htmlspecialchars($_POST['id_memori']);
    $memori = htmlspecialchars($_POST['memori']);
    $value   = htmlspecialchars($_POST['value']);
    
    if($memori=='' || $value=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_memori SET memori='$memori', value='$value' WHERE id_memori='$_GET[ID]'");
        notification("102");
        redirect_js("index?m=kriteria&sm=memori");
    }    
}else if ($act=='memori_hapus'){
    $db->query("DELETE FROM tb_memori WHERE id_memori='$_GET[ID]'");
    notification("103");
    header("location:index?m=kriteria&sm=memori");
} 

/** PENYIMPANAN/STORAGE */    
else if($mod=='penyimpanan_tambah'){
    $penyimpanan = htmlspecialchars($_POST['penyimpanan']);
    $value = htmlspecialchars($_POST['value']);
    
    if($penyimpanan=='' || $value==''){
        print_msg("Field bertanda * tidak boleh kosong!");
    }else{
        $db->query("INSERT INTO tb_penyimpanan (id_penyimpanan, penyimpanan, value) VALUES (NULL, '$penyimpanan', '$value')");
        notification("101");
        redirect_js("index?m=kriteria&sm=penyimpanan");
    }                    
} else if($mod=='penyimpanan_edit'){
    $id_penyimpanan = htmlspecialchars($_POST['id_penyimpanan']);
    $penyimpanan = htmlspecialchars($_POST['penyimpanan']);
    $value   = htmlspecialchars($_POST['value']);
    
    if($penyimpanan=='' || $value=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_penyimpanan SET penyimpanan='$penyimpanan', value='$value' WHERE id_penyimpanan='$_GET[ID]'");
        notification("102");
        redirect_js("index?m=kriteria&sm=penyimpanan");
    }    
}else if ($act=='penyimpanan_hapus'){
    $db->query("DELETE FROM tb_penyimpanan WHERE id_penyimpanan='$_GET[ID]'");
    notification("103");
    header("location:index?m=kriteria&sm=penyimpanan");
} 

/** JENIS PENYIMPANAN */    
else if($mod=='jenispenyimpanan_tambah'){
    $jenispenyimpanan = htmlspecialchars($_POST['jenispenyimpanan']);
    $value = htmlspecialchars($_POST['value']);
    
    if($jenispenyimpanan=='' || $value==''){
        print_msg("Field bertanda * tidak boleh kosong!");
    }else{
        $db->query("INSERT INTO tb_jenispenyimpanan (id_jenispenyimpanan, jenispenyimpanan, value) VALUES (NULL, '$jenispenyimpanan', '$value')");
        notification("101");
        redirect_js("index?m=kriteria&sm=jenispenyimpanan");
    }                    
} else if($mod=='jenispenyimpanan_edit'){
    $id_jenispenyimpanan = htmlspecialchars($_POST['id_jenispenyimpanan']);
    $jenispenyimpanan = htmlspecialchars($_POST['jenispenyimpanan']);
    $value   = htmlspecialchars($_POST['value']);
    
    if($jenispenyimpanan=='' || $value=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_jenispenyimpanan SET jenispenyimpanan='$jenispenyimpanan', value='$value' WHERE id_jenispenyimpanan='$_GET[ID]'");
        notification("102");
        redirect_js("index?m=kriteria&sm=jenispenyimpanan");
    }    
}else if ($act=='jenispenyimpanan_hapus'){
    $db->query("DELETE FROM tb_jenispenyimpanan WHERE id_jenispenyimpanan='$_GET[ID]'");
    notification("103");
    header("location:index?m=kriteria&sm=jenispenyimpanan");
} 

/** KARTU GRAFIS */    
else if($mod=='kartugrafis_tambah'){
    $kartugrafis = htmlspecialchars($_POST['kartugrafis']);
    $vram = htmlspecialchars($_POST['vram']);
    $value = htmlspecialchars($_POST['value']);
    
    if($kartugrafis=='' || $vram=='' || $value==''){
        print_msg("Field bertanda * tidak boleh kosong!");
    }else{
        $db->query("INSERT INTO tb_kartugrafis (id_kartugrafis, kartugrafis, vram, value) VALUES (NULL, '$kartugrafis', '$vram', '$value')");
        notification("101");                       
        redirect_js("index?m=kriteria&sm=kartugrafis");
    }                    
} else if($mod=='kartugrafis_edit'){
    $id_kartugrafis = htmlspecialchars($_POST['id_kartugrafis']);
    $kartugrafis = htmlspecialchars($_POST['kartugrafis']);
    $vram = htmlspecialchars($_POST['vram']);
    $value   = htmlspecialchars($_POST['value']);
    
    if($kartugrafis=='' || $vram=='' || $value=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_kartugrafis SET kartugrafis='$kartugrafis', vram='$vram', value='$value' WHERE id_kartugrafis='$_GET[ID]'");
        notification("102");
        redirect_js("index?m=kriteria&sm=kartugrafis");
    }    
}else if ($act=='kartugrafis_hapus'){
    $db->query("DELETE FROM tb_kartugrafis WHERE id_kartugrafis='$_GET[ID]'");
    notification("103");
    header("location:index?m=kriteria&sm=kartugrafis");
}

/** ADMIN - PRODUK */    
else if($mod=='produk_tambah'){
    $brand = htmlspecialchars($_POST['brand']);
    $tipe = htmlspecialchars($_POST['tipe']);
    $harga = htmlspecialchars($_POST['harga']);
    $processor = htmlspecialchars($_POST['processor']);
    $seri_processor = htmlspecialchars($_POST['seri_processor']);
    $kec_processor = htmlspecialchars($_POST['kec_processor']);
    $memori = htmlspecialchars($_POST['memori']);
    $tipe_memori = htmlspecialchars($_POST['tipe_memori']);
    $penyimpanan = htmlspecialchars($_POST['penyimpanan']);
    $jenispenyimpanan = htmlspecialchars($_POST['jenispenyimpanan']);
    $kartugrafis = htmlspecialchars($_POST['kartugrafis']);
    $seri_kartugrafis = htmlspecialchars($_POST['seri_kartugrafis']);
    $layar = htmlspecialchars($_POST['layar']);
    $resolusi = htmlspecialchars($_POST['resolusi']);
    $sistem_operasi = htmlspecialchars($_POST['sistem_operasi']);
    $berat = htmlspecialchars($_POST['berat']);
    $dimensi = htmlspecialchars($_POST['dimensi']);
    $baterai = htmlspecialchars($_POST['baterai']);
    $fotoProduk = uploadFotoProduk();

    if ($brand=='' || $tipe=='' || $harga=='' || $processor=='' || $seri_processor=='' || $kec_processor=='' || $memori=='' || $tipe_memori=='' || $penyimpanan=='' || $jenispenyimpanan=='' || $kartugrafis=='' || $seri_kartugrafis=='' || $layar=='' || $sistem_operasi== '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
        $db->query("INSERT INTO tb_produk VALUES (NULL, '$brand', '$tipe', $harga, $processor, '$seri_processor', '$kec_processor', $memori, '$tipe_memori', $penyimpanan, $jenispenyimpanan, $kartugrafis, '$seri_kartugrafis', $layar, '$resolusi', '$sistem_operasi', '$berat', '$dimensi', '$baterai', '$fotoProduk')");

        notification("101");
        redirect_js("index?m=produk");
    }                    
} else if($mod=='produk_edit'){
    $id_produk = htmlspecialchars($_POST['id_produk']);
    $brand = htmlspecialchars($_POST['brand']);
    $tipe = htmlspecialchars($_POST['tipe']);
    $harga = htmlspecialchars($_POST['harga']);
    $processor = htmlspecialchars($_POST['processor']);
    $seri_processor = htmlspecialchars($_POST['seri_processor']);
    $kec_processor = htmlspecialchars($_POST['kec_processor']);
    $memori = htmlspecialchars($_POST['memori']);
    $tipe_memori = htmlspecialchars($_POST['tipe_memori']);
    $penyimpanan = htmlspecialchars($_POST['penyimpanan']);
    $jenispenyimpanan = htmlspecialchars($_POST['jenispenyimpanan']);
    $kartugrafis = htmlspecialchars($_POST['kartugrafis']);
    $seri_kartugrafis = htmlspecialchars($_POST['seri_kartugrafis']);
    $layar = htmlspecialchars($_POST['layar']);
    $resolusi = htmlspecialchars($_POST['resolusi']);
    $sistem_operasi = htmlspecialchars($_POST['sistem_operasi']);
    $berat = htmlspecialchars($_POST['berat']);
    $dimensi = htmlspecialchars($_POST['dimensi']);
    $baterai = htmlspecialchars($_POST['baterai']);
    $fotoProduk = uploadFotoProduk_edit($_POST['tmp_fotoProduk']);
    
    if ($brand=='' || $tipe=='' || $harga=='' || $processor=='' || $seri_processor=='' || $kec_processor=='' || $memori=='' || $tipe_memori=='' || $penyimpanan=='' || $jenispenyimpanan=='' || $kartugrafis=='' || $seri_kartugrafis=='' || $layar=='' || $sistem_operasi== '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_produk SET brand='$brand',tipe_brand='$tipe',harga=$harga,id_processor=$processor,seri_processor='$seri_processor',kecepatan_processor='$kec_processor',id_memori=$memori,tipe_memori='$tipe_memori',id_penyimpanan=$penyimpanan,id_jenispenyimpanan=$jenispenyimpanan,id_kartugrafis=$kartugrafis,seri_kartugrafis='$seri_kartugrafis',layar=$layar,resolusi='$resolusi',sistem_operasi='$sistem_operasi',berat='$berat',dimensi='$dimensi',baterai='$baterai',foto_produk='$fotoProduk' WHERE id_produk=$_GET[ID]");
        notification("102");
        redirect_js("index?m=produk");
    }
}else if ($act=='produk_hapus'){
    $db->query("DELETE FROM tb_produk WHERE id_produk='$_GET[ID]'");
    notification("103");
    header("location:index?m=produk");
}
?>