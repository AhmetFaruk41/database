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
    if (isset($_POST['tetikleyiciekle'])) {


        $kaydet = $db->prepare("INSERT INTO tetikleyiciler SET
            text=:text,
            button_text=:button_text,
            url=:url,
            bg_color=:bg_color,
            text_color=:text_color,
            border_color=:border_color,
            area=:area,
            width=:width,
            dil=:dil,
            durum=:durum
        ");
        $ekle = $kaydet->execute(array(
            'text' => $_POST['text'],
            'button_text' => $_POST['button_text'],
            'url' => $_POST['url'],
            'bg_color' => $_POST['bg_color'],
            'text_color' => $_POST['text_color'],
            'border_color' => $_POST['border_color'],
            'area' => 0,
            'width' => $_POST['width'],
            'dil' => $_POST['dil'],
            'durum' => 1
        ));
        if ($ekle) {

            Header("location: ../../../pages.php?sayfa=usttetikleyiciler&status=success");

        } else {

            Header("location: ../../../pages.php?sayfa=usttetikleyiciler&status=warning");

        }


    }

}

?>


