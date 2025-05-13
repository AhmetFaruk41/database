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
    if (isset($_POST['bakimdegis'])) {

        $ayarkaydet = $db->prepare(
            "UPDATE bakim SET
            durum=:durum,
			text_color=:text_color,
			logo_durum=:logo_durum,
			baslik=:baslik,
			spot=:spot,
			iletisim=:iletisim
			WHERE id='1'"
        );
        $update = $ayarkaydet->execute(
            array(
                'durum' => $_POST['durum'],
                'text_color' => $_POST['text_color'],
                'logo_durum' => $_POST['logo_durum'],
                'baslik' => $_POST['baslik'],
                'spot' => $_POST['spot'],
                'iletisim' => $_POST['iletisim']
            )
        );

        if ($update) {

            Header("location: ../../../pages.php?sayfa=bakimmodu&status=success");
        } else {

            Header("location: ../../../pages.php?sayfa=bakimmodu&status=warning");
        }


    }

}

?>


