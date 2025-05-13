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
    if (isset($_POST['projemoduldegis'])) {

        $ayarkaydet = $db->prepare(
            "UPDATE proje_ayar SET
            divider=:divider,
			back_color=:back_color,
			padding=:padding,
			font_weight=:font_weight,
			detay_url=:detay_url,
			proje_limit=:proje_limit,
			spot_color=:spot_color,
			baslik_color=:baslik_color,
			width=:width,	
           	tab_color=:tab_color,
			tab_active_color=:tab_active_color,	
			tab_text_color=:tab_text_color,
			tab_act_text_color=:tab_act_text_color,	
			tab_font_size=:tab_font_size,
			tab_border_radius=:tab_border_radius,	
			pro_text_color=:pro_text_color,
			pro_text_bg=:pro_text_bg,	
			border_radius=:border_radius,
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
                'detay_url' => $_POST['detay_url'],
                'proje_limit' => $_POST['proje_limit'],
                'spot_color' => $_POST['spot_color'],
                'baslik_color' => $_POST['baslik_color'],
                'width' => $_POST['width'],
                'tab_color' => $_POST['tab_color'],
                'tab_active_color' => $_POST['tab_active_color'],
                'tab_text_color' => $_POST['tab_text_color'],
                'tab_act_text_color' => $_POST['tab_act_text_color'],
                'tab_font_size' => $_POST['tab_font_size'],
                'tab_border_radius' => $_POST['tab_border_radius'],
                'pro_text_color' => $_POST['pro_text_color'],
                'pro_text_bg' => $_POST['pro_text_bg'],
                'border_radius' => $_POST['border_radius'],
                'tags' => $_POST['tags'],
                'meta_desc' => $_POST['meta_desc']
            )
        );

        if ($update) {

            Header("location: ../../../pages.php?sayfa=projemodul&status=success");
        } else {

            Header("location: ../../../pages.php?sayfa=projemodul&status=warning");
        }


    }

}

?>


