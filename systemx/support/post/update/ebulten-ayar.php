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
    if (isset($_POST['ebultenayardegis'])) {

        $ayarkaydet = $db->prepare(
            "UPDATE ebulten_ayar SET
            width=:width,
			tip=:tip,
			padding=:padding,
			area=:area,
			baslik_color=:baslik_color,
			spot_color=:spot_color,	
			input_bg_color=:input_bg_color,
			input_text_color=:input_text_color,
			button_bg_color=:button_bg_color,
			button_text_color=:button_text_color
			WHERE id='1'"
        );
        $update = $ayarkaydet->execute(
            array(
                'width' => $_POST['width'],
                'tip' => $_POST['tip'],
                'padding' => $_POST['padding'],
                'area' => $_POST['area'],
                'baslik_color' => $_POST['baslik_color'],
                'spot_color' => $_POST['spot_color'],
                'input_bg_color' => $_POST['input_bg_color'],
                'input_text_color' => $_POST['input_text_color'],
                'button_bg_color' => $_POST['button_bg_color'],
                'button_text_color' => $_POST['button_text_color']
            )
        );

        if ($update) {

            Header("location: ../../../pages.php?sayfa=ebultenayar&status=success");
        } else {

            Header("location: ../../../pages.php?sayfa=ebultenayar&status=warning");
        }


    }

}

?>


