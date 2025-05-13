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
    if (isset($_POST['videodegis'])) {


        if ($_FILES['gorsel']["size"] > 0) {


            $dosyas = $_FILES["gorsel"];
            $kaynak = $_FILES["gorsel"]["tmp_name"];
            $dosya = $_FILES["gorsel"]["name"];
            $uzanti = explode(".", $_FILES['gorsel']['name']);
            $random = rand(0, 9999999999999);
            $random2 = rand(0, 999);
            $yeni_isim = $random . "-" . $random2 . "-" . $dosya;
            $hedef = "../../../../images/videos/" . $yeni_isim;


            if ($dosyas['type'] == 'image/jpg' || $dosyas['type'] == 'image/jpeg' || $dosyas['type'] == 'image/png') {

                $gitti = move_uploaded_file($kaynak, $hedef);


                $kaydet = $db->prepare("UPDATE video SET
            durum=:durum,
            baslik=:baslik,
            spot=:spot,
            embed=:embed,
            anasayfa=:anasayfa,
            sira=:sira,
            tags=:tags,
            meta_desc=:meta_desc,
            gorsel=:gorsel
            where id={$_POST['video_id']}
        ");
                $ekle = $kaydet->execute(array(
                    'durum' => $_POST['durum'],
                    'baslik' => $_POST['baslik'],
                    'spot' => $_POST['spot'],
                    'embed' => $_POST['embed'],
                    'anasayfa' => $_POST['anasayfa'],
                    'sira' => $_POST['sira'],
                    'tags' => $_POST['tags'],
                    'meta_desc' => $_POST['meta_desc'],
                    'gorsel' => $yeni_isim
                ));
                if ($ekle) {

                    $resimsilunlink = $_POST['eski_gorsel'];
                    unlink("../../../../images/videos/$resimsilunlink");
                    Header("location: ../../../pages.php?sayfa=videolar&status=success");

                } else {

                    Header("location: ../../../pages.php?sayfa=videolar&status=warning");

                }

            } else {
                Header("location: ../../../pages.php?sayfa=video&video_id=$_POST[video_id]&status=imgtype");
            }

        } else {


            $kaydet = $db->prepare("UPDATE video SET
            durum=:durum,
            baslik=:baslik,
            spot=:spot,
            embed=:embed,
            anasayfa=:anasayfa,
            sira=:sira,
            tags=:tags,
            meta_desc=:meta_desc
            where id={$_POST['video_id']}
        ");
            $ekle = $kaydet->execute(array(
                'durum' => $_POST['durum'],
                'baslik' => $_POST['baslik'],
                'spot' => $_POST['spot'],
                'embed' => $_POST['embed'],
                'anasayfa' => $_POST['anasayfa'],
                'sira' => $_POST['sira'],
                'tags' => $_POST['tags'],
                'meta_desc' => $_POST['meta_desc']
            ));
            if ($ekle) {

                Header("location: ../../../pages.php?sayfa=videolar&status=success");

            } else {

                Header("location: ../../../pages.php?sayfa=videolar&status=warning");

            }


        }


    }

}

?>


