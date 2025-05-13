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
    if (isset($_POST['projekatdegis'])) {

        $kaydet = $db->prepare("UPDATE proje_kat SET
        baslik=:baslik,
        sira=:sira,
        durum=:durum,
        anasayfa=:anasayfa
        WHERE id={$_POST['kat_id']}
        ");
        $ekle = $kaydet->execute(array(
            'baslik' => $_POST['baslik'],
            'sira' => $_POST['sira'],
            'durum' => $_POST['durum'],
            'anasayfa' => $_POST['anasayfa']
        ));
        if ($ekle) {

            Header("location: ../../../pages.php?sayfa=projekategorileri&status=success");

        } else {

            Header("location: ../../../pages.php?sayfa=projekategorileri&status=warning");

        }

    }

}

?>


