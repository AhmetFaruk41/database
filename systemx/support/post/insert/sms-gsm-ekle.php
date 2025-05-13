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
    if (isset($_POST['gsmkaydet'])) {

        $kaydet = $db->prepare("INSERT INTO sms_numaralar SET
        gsm=:gsm,
        isim=:isim
        ");
        $ekle = $kaydet->execute(array(
            'gsm' => $_POST['gsm'],
            'isim' => $_POST['isim']
        ));
        if ($ekle) {

            Header("location: ../../../pages.php?sayfa=smsnumaralar&status=success");

        } else {

            Header("location: ../../../pages.php?sayfa=smsnumaralar&status=warning");

        }

    }


}
?>


