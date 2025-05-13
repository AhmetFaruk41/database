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
    if (isset($_POST['pricingayar'])) {

        $ayarkaydet = $db->prepare(
            "UPDATE pricing_ayar SET
            divider=:divider,
			back_color=:back_color,
			padding=:padding,
			font_weight=:font_weight,
			tavsiye_color=:tavsiye_color,
			tavsiye_text_color=:tavsiye_text_color,
			icon_color=:icon_color,
			ozellik_color=:ozellik_color,
			button_bg=:button_bg,
			spot_color=:spot_color,
			baslik_color=:baslik_color,
			width=:width,	
           	button_text_color=:button_text_color,
			text_color=:text_color,	
			text_size=:text_size,	
			text_weight=:text_weight,	
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
                'tavsiye_color' => $_POST['tavsiye_color'],
                'tavsiye_text_color' => $_POST['tavsiye_text_color'],
                'icon_color' => $_POST['icon_color'],
                'ozellik_color' => $_POST['ozellik_color'],
                'button_bg' => $_POST['button_bg'],
                'spot_color' => $_POST['spot_color'],
                'baslik_color' => $_POST['baslik_color'],
                'width' => $_POST['width'],
                'button_text_color' => $_POST['button_text_color'],
                'text_color' => $_POST['text_color'],
                'text_size' => $_POST['text_size'],
                'text_weight' => $_POST['text_weight'],
                'tags' => $_POST['tags'],
                'meta_desc' => $_POST['meta_desc']
            )
        );

        if ($update) {

            Header("location: ../../../pages.php?sayfa=pricingmodul&status=success");
        } else {

            Header("location: ../../../pages.php?sayfa=pricingmodul&status=warning");
        }


    }

}

?>


