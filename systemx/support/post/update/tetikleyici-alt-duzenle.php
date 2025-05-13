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
    if (isset($_POST['tetikleyicidegis'])) {


        $kaydet = $db->prepare("UPDATE tetikleyiciler SET
            text=:text,
            bg_color=:bg_color,
            text_color=:text_color,
            area=:area,
            width=:width,
            durum=:durum
            WHERE id={$_POST['tetik_id']}
        ");
        $ekle = $kaydet->execute(array(
            'text' => $_POST['text'],
            'bg_color' => $_POST['bg_color'],
            'text_color' => $_POST['text_color'],
            'area' => 1,
            'width' => $_POST['width'],
            'durum' => 1
        ));
        if ($ekle) {

            Header("location: ../../../pages.php?sayfa=alttetikleyiciler&status=success");

        } else {

            Header("location: ../../../pages.php?sayfa=alttetikleyiciler&status=warning");

        }


    }


}
?>


