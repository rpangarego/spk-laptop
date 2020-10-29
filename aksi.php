<?php
require_once'includes/functions.php';

//tambah nilai banding
if ($act=='banding') {
    $bandingvalue = $_COOKIE['banding'];
    $id_produk  = $_GET['ID'];
    $cookie = $bandingvalue.','.$id_produk;
    $arrayBanding = explode(',', $_COOKIE['banding']);
    $countArray = count($arrayBanding);

    foreach ($arrayBanding as $id) {
        if ($id == $id_produk) {
            notification("204");
            redirect_js("index?m=produk");
            exit;
        }
    }

    if ($_COOKIE['banding']) {
        if ($countArray>4) {
            notification("201");
            redirect_js("index?m=produk");
            exit;
        }else{
            setcookie('banding',$cookie, time()+(60*60)); //set cookie banding utk 1 jam
        }
    }else{
        setcookie('banding',$id_produk, time()+(60*60));
    }
    redirect_js("index?m=produk");
}
//reset nilai banding
elseif ($act=='banding_reset') {
    setcookie('banding','',0);
    redirect_js("index?m=produk");
}

?>