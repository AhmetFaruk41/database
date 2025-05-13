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
    if (isset($_POST['smtpdegis'])) {

        $ayarkaydet = $db->prepare(
            "UPDATE ayarlar SET
            smtp_durum=:smtp_durum,
            smtp_protokol=:smtp_protokol,
			smtp_bildirim_mail=:smtp_bildirim_mail,
			smtp_mail=:smtp_mail,
			smtp_host=:smtp_host,
			smtp_port=:smtp_port,
			smtp_pass=:smtp_pass		
			WHERE id='1'"
        );
        $update = $ayarkaydet->execute(
            array(
                'smtp_durum' => $_POST['smtp_durum'],
                'smtp_protokol' => $_POST['smtp_protokol'],
                'smtp_bildirim_mail' => $_POST['smtp_bildirim_mail'],
                'smtp_mail' => $_POST['smtp_mail'],
                'smtp_host' => $_POST['smtp_host'],
                'smtp_port' => $_POST['smtp_port'],
                'smtp_pass' => $_POST['smtp_pass']
            )
        );

        if ($update) {

            Header("location: ../../../pages.php?sayfa=smtpayar&status=success");
        } else {

            Header("location: ../../../pages.php?sayfa=smtpayar&status=warning");
        }


    }

}

?>


