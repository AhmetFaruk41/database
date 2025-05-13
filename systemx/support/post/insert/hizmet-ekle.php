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
    if (isset($_POST['hizmetekle'])) {


        if ($_FILES['gorsel']["size"] > 0) {


            $dosyas = $_FILES["gorsel"];
            $kaynak = $_FILES["gorsel"]["tmp_name"];
            $dosya = $_FILES["gorsel"]["name"];
            $uzanti = explode(".", $_FILES['gorsel']['name']);
            $random = rand(0, 9999999999999);
            $random2 = rand(0, 999);
            $yeni_isim = $random . "-" . $random2 . "-" . $dosya;
            $hedef = "../../../../images/services/" . $yeni_isim;


            if ($dosyas['type'] == 'image/jpg' || $dosyas['type'] == 'image/jpeg' || $dosyas['type'] == 'image/png') {

                $gitti = move_uploaded_file($kaynak, $hedef);


                $kaydet = $db->prepare("INSERT INTO hizmet SET
        anasayfa=:anasayfa,
        baslik=:baslik,
        spot=:spot,
        dil=:dil,
        durum=:durum,
        sira=:sira,
        icerik=:icerik,
        icon=:icon,
        tags=:tags,
        meta_desc=:meta_desc,     
        gorsel=:gorsel
        ");
                $ekle = $kaydet->execute(array(
                    'anasayfa' => $_POST['anasayfa'],
                    'baslik' => $_POST['baslik'],
                    'spot' => $_POST['spot'],
                    'dil' => $_POST['dil'],
                    'durum' => $_POST['durum'],
                    'sira' => $_POST['sira'],
                    'icerik' => $_POST['icerik'],
                    'icon' => $_POST['icon'],
                    'tags' => $_POST['tags'],
                    'meta_desc' => $_POST['meta_desc'],
                    'gorsel' => $yeni_isim
                ));
                if ($ekle) {

                    Header("location: ../../../pages.php?sayfa=hizmetler&status=success");

                } else {

                    Header("location: ../../../pages.php?sayfa=hizmetler&status=warning");

                }

            } else {
                Header("location: ../../../pages.php?sayfa=hizmetekle&status=imgtype");
            }

        } else {


            $kaydet = $db->prepare("INSERT INTO hizmet SET
        anasayfa=:anasayfa,
        baslik=:baslik,
        spot=:spot,
        dil=:dil,
        durum=:durum,
        sira=:sira,
        icerik=:icerik,
        icon=:icon,
        tags=:tags,
        meta_desc=:meta_desc
        ");
            $ekle = $kaydet->execute(array(
                'anasayfa' => $_POST['anasayfa'],
                'baslik' => $_POST['baslik'],
                'spot' => $_POST['spot'],
                'dil' => $_POST['dil'],
                'durum' => $_POST['durum'],
                'sira' => $_POST['sira'],
                'icerik' => $_POST['icerik'],
                'icon' => $_POST['icon'],
                'tags' => $_POST['tags'],
                'meta_desc' => $_POST['meta_desc']
            ));
            if ($ekle) {

                Header("location: ../../../pages.php?sayfa=hizmetler&status=success");

            } else {

                Header("location: ../../../pages.php?sayfa=hizmetler&status=warning");

            }


        }


    }


}
?>


