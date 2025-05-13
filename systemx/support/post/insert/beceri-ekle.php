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


if ( isset( $_POST[ 'beceriekle' ] ) ) {

            $kaydet = $db->prepare("INSERT INTO beceri SET
            baslik=:baslik,
            sira=:sira,
            oran=:oran,
            dil=:dil,
            durum=:durum
        ");
            $ekle = $kaydet->execute(array(
                'baslik' => $_POST['baslik'],
                'sira' => $_POST['sira'],
                'oran' => $_POST['oran'],
                'dil' => $_POST['dil'],
                'durum' => $_POST['durum']
            ));
            if ($ekle) {

                Header("location: ../../../pages.php?sayfa=beceriler&status=success");

            } else {

                Header("location: ../../../pages.php?sayfa=beceriler&status=warning");

            }




}


}
?>


