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
    if (isset($_POST['pricingdegis'])) {

        $kaydet = $db->prepare("UPDATE pricing_ozellik SET
        baslik=:baslik,
        sira=:sira,
        pr_id=:pr_id
        WHERE id={$_POST['ozellik_id']}
        ");
        $ekle = $kaydet->execute(array(
            'baslik' => $_POST['baslik'],
            'sira' => $_POST['sira'],
            'pr_id' => $_POST['pricing_id']
        ));
        if ($ekle) {

            Header("location: ../../../pages.php?sayfa=pricingozellikleri&pricing_id=$_POST[pricing_id]&status=success");

        } else {

            Header("location: ../../../pages.php?sayfa=pricingozellikleri&pricing_id=$_POST[pricing_id]&status=warning");

        }

    }

}

?>


