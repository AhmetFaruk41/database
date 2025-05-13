<?php
ob_start();
session_start();
include "../../../../includes/config/config.php";
date_default_timezone_set( 'Europe/Istanbul' );
$settings=$db->prepare("SELECT * from ayarlar where id='1'");
$settings->execute(array(0));
$ayar=$settings->fetch(PDO::FETCH_ASSOC);
$siteurl = $ayar['site_url'];
?>


<?php
include_once '../../secure_post.php';
if ($adminsorgusu->rowCount()===0) {
    header("Location: 404");
} else {
    if (isset($_POST['pricingekle'])) {

        $kaydet = $db->prepare("INSERT INTO pricing SET
        baslik=:baslik,
        sira=:sira,
        durum=:durum,
        url=:url,
        fiyat=:fiyat,
        odeme_date=:odeme_date,
        icon=:icon,
        tavsiye=:tavsiye,
        dil=:dil
        ");
        $ekle = $kaydet->execute(array(
            'baslik' => $_POST['baslik'],
            'sira' => $_POST['sira'],
            'durum' => $_POST['durum'],
            'url' => $_POST['url'],
            'fiyat' => $_POST['fiyat'],
            'odeme_date' => $_POST['odeme_date'],
            'icon' => $_POST['icon'],
            'tavsiye' => $_POST['tavsiye'],
            'dil' => $_POST['dil']
        ));
        if ($ekle) {

            Header("location: ../../../pages.php?sayfa=pricingler&status=success");

        } else {

            Header("location: ../../../pages.php?sayfa=pricingler&status=warning");

        }

    }


}
?>


