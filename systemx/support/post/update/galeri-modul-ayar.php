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
    if (isset($_POST['galeriayar'])) {

        $ayarkaydet = $db->prepare(
            "UPDATE galeri_ayar SET
			back_color=:back_color,
			padding=:padding,
			width=:width,	
 			tags=:tags,
			meta_desc=:meta_desc,
			galeri_limit=:galeri_limit,
			border_radius=:border_radius
			WHERE id='1'"
        );
        $update = $ayarkaydet->execute(
            array(
                'back_color' => $_POST['back_color'],
                'padding' => $_POST['padding'],
                'width' => $_POST['width'],
                'tags' => $_POST['tags'],
                'meta_desc' => $_POST['meta_desc'],
                'galeri_limit' => $_POST['galeri_limit'],
                'border_radius' => $_POST['border_radius']
            )
        );

        if ($update) {

            Header("location: ../../../pages.php?sayfa=galerimodul&status=success");
        } else {

            Header("location: ../../../pages.php?sayfa=galerimodul&status=warning");
        }


    }

}

?>


