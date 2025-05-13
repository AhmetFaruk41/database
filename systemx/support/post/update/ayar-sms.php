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
    if (isset($_POST['smsayardegis'])) {

        $ayarkaydet = $db->prepare(
            "UPDATE sms SET
            durum=:durum,
			bildirim_numara=:bildirim_numara,
			sms_firma=:sms_firma,
			iletimerkezi_baslik=:iletimerkezi_baslik,
			iletimerkezi_user=:iletimerkezi_user,
			iletimerkezi_pass=:iletimerkezi_pass,	
			netgsm_baslik=:netgsm_baslik,
			netgsm_user=:netgsm_user,
			netgsm_pass=:netgsm_pass,
			ucuzsms_baslik=:ucuzsms_baslik,
			ucuzsms_user=:ucuzsms_user,
			ucuzsms_pass=:ucuzsms_pass
			WHERE id='1'"
        );
        $update = $ayarkaydet->execute(
            array(
                'durum' => $_POST['durum'],
                'bildirim_numara' => $_POST['bildirim_numara'],
                'sms_firma' => $_POST['sms_firma'],
                'iletimerkezi_baslik' => $_POST['iletimerkezi_baslik'],
                'iletimerkezi_user' => $_POST['iletimerkezi_user'],
                'iletimerkezi_pass' => $_POST['iletimerkezi_pass'],
                'netgsm_baslik' => $_POST['netgsm_baslik'],
                'netgsm_user' => $_POST['netgsm_user'],
                'netgsm_pass' => $_POST['netgsm_pass'],
                'ucuzsms_baslik' => $_POST['ucuzsms_baslik'],
                'ucuzsms_user' => $_POST['ucuzsms_user'],
                'ucuzsms_pass' => $_POST['ucuzsms_pass']
            )
        );

        if ($update) {

            Header("location: ../../../pages.php?sayfa=smsayar&status=success");
        } else {

            Header("location: ../../../pages.php?sayfa=smsayar&status=warning");
        }


    }


}
?>


