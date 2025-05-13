<?php
ob_start();
session_start();
include "../../../../includes/config/config.php";
date_default_timezone_set( 'Europe/Istanbul' );
$settings=$db->prepare("SELECT * from ayarlar where id='1'");
$settings->execute(array(0));
$ayar=$settings->fetch(PDO::FETCH_ASSOC);
$siteurl = $ayar['site_url'];
$ebultenCek=$db->prepare("SELECT * from ebulten");
$ebultenCek->execute();
?>


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once '../../secure_post.php';
if ($adminsorgusu->rowCount()===0) {
    header("Location: 404");
} else {
    if (isset($_POST['mailgonder'])) {


        if ($ayar['smtp_durum'] == 1) {



            include '../../../../includes/phpmailer/Exception.php';
            include '../../../../includes/phpmailer/PHPMailer.php';
            include '../../../../includes/phpmailer//SMTP.php';


            $site_adi = $ayar["site_baslik"];
            $smtp_protokol = $ayar["smtp_protokol"];
            $smtp_host = $ayar["smtp_host"];
            $smtp_mail = $ayar["smtp_mail"];
            $smtp_port = $ayar["smtp_port"];
            $smtp_pass = $ayar["smtp_pass"];
            $tekil_gon_mail = $_POST["tekilmail_mail"];
            $tekil_konu = $_POST["tekilmail_konu"];

            $siteadresi = $ayar["site_url"];
            $tekil_iceriks  = $_POST["tekilmail_icerik"];
            $eski   = "../images";
            $yeni   = "$siteadresi/images/";
            $tekil_icerik = str_replace($eski, $yeni, $tekil_iceriks);


            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = true;
            $mail->Host = $smtp_host;
            $mail->Username = $smtp_mail;
            $mail->Password = $smtp_pass;
            $mail->Port = $smtp_port;
            $mail->CharSet  = "UTF-8";
            if($ayar['smtp_protokol'] == 'tls' || $ayar['smtp_protokol'] == 'ssl') {
                $mail->SMTPSecure =$smtp_protokol;
            }

            // Gönderici //
            $mail->setFrom($smtp_mail, $site_adi);
            // Alıcı //
            $mail->AddBCC($tekil_gon_mail, "");
            // Konu //
            $mail->Subject = $tekil_konu;
            // Mesaj //
            $mail->isHTML();
            $mail->Body = $tekil_icerik;

            if($mail->send()) {

                Header("location: ../../../pages.php?sayfa=ebultenlistesi&status=gonderildi");


            } else {

                Header("location: ../../../pages.php?sayfa=tekilmailgonder&status=warning");

            }


        } else {

            Header("location: ../../../pages.php?sayfa=tekilmailgonder&status=warning");

        }


    }
}
?>


