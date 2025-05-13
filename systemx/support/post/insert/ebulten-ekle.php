<?php
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
if ( isset( $_POST[ 'ebultenekle' ] ) ) {


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
        $toplu_konu = $_POST["toplumail_konu"];

        $siteadresi = $ayar["site_url"];
        $toplu_iceriks  = $_POST["toplumail_icerik"];
        $eski   = "../images";
        $yeni   = "$siteadresi/images/";
        $toplu_icerik = str_replace($eski, $yeni, $toplu_iceriks);

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->Host = $smtp_host;
        $mail->Username = $smtp_mail;
        $mail->Password = $smtp_pass;
        $mail->Port = $smtp_port;
        $mail->CharSet  = "utf-8";
        if($ayar['smtp_protokol'] == 'tls' || $ayar['smtp_protokol'] == 'ssl') {
            $mail->SMTPSecure =$smtp_protokol;
        }

        // Gönderici //
        $mail->setFrom($smtp_mail, $site_adi);
        // Alıcı //
        foreach ($ebultenCek as $bulten) {
            $mail->AddBCC($bulten['eposta'], $bulten['eposta']);
        }
        // Konu //
        $mail->Subject = $toplu_konu;
        // Mesaj //
        $mail->isHTML();
        $mail->Body = $toplu_icerik;

        if($mail->send()) {

            Header("location: ../../../pages.php?sayfa=ebultenlistesi&status=gonderildi");


        } else {

            Header("location: ../../../pages.php?sayfa=ebultengonder&status=warning");

        }


    } else {

        Header("location: ../../../pages.php?sayfa=ebultengonder&status=warning");

    }


}



}
?>


