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
    if (isset($_POST['hizmetmoduldegis'])) {

        $ayarkaydet = $db->prepare(
            "UPDATE hizmet_ayar SET
            divider=:divider,
			back_color=:back_color,
			padding=:padding,
			font_weight=:font_weight,
			tip=:tip,
			icon_color=:icon_color,
			hizmet_color=:hizmet_color,
			detay_url=:detay_url,
			hizmet_limit=:hizmet_limit,
			spot_color=:spot_color,
			baslik_color=:baslik_color,
			width=:width,	
           	detay_button_bg=:detay_button_bg,
			detay_button_color=:detay_button_color,	
			tags=:tags,
			meta_desc=:meta_desc
			
			WHERE id='1'"
        );
        $update = $ayarkaydet->execute(
            array(
                'divider' => $_POST['divider'],
                'back_color' => $_POST['back_color'],
                'padding' => $_POST['padding'],
                'font_weight' => $_POST['font_weight'],
                'tip' => $_POST['tip'],
                'icon_color' => $_POST['icon_color'],
                'hizmet_color' => $_POST['hizmet_color'],
                'detay_url' => $_POST['detay_url'],
                'hizmet_limit' => $_POST['hizmet_limit'],
                'spot_color' => $_POST['spot_color'],
                'baslik_color' => $_POST['baslik_color'],
                'width' => $_POST['width'],
                'detay_button_bg' => $_POST['detay_button_bg'],
                'detay_button_color' => $_POST['detay_button_color'],
                'tags' => $_POST['tags'],
                'meta_desc' => $_POST['meta_desc']
            )
        );

        if ($update) {

            Header("location: ../../../pages.php?sayfa=hizmetmodul&status=success");
        } else {

            Header("location: ../../../pages.php?sayfa=hizmetmodul&status=warning");
        }


    }


}
?>


