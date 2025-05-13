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
    if ($_GET['pricing'] == "success") {

        $sil = $db->prepare("DELETE from pricing where id=:id");
        $kontrol = $sil->execute(
            array(
                'id' => $_GET['id']
            )
        );

        if ($kontrol) {

            $altSil = $db->prepare("DELETE from pricing_ozellik where pr_id=:pr_id");
            $kontrolalt = $altSil->execute(
                array(
                    'pr_id' => $_GET['id']
                )
            );

            Header("location: ../../../pages.php?sayfa=pricingler&status=success");
        } else {

            Header("location: ../../../pages.php?sayfa=pricingler&status=warning");
        }
    }
}
?>