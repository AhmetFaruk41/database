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
    if (isset($_POST['katalogekle'])) {


        $dosyas = $_FILES["gorsel"];
        $kaynak = $_FILES["gorsel"]["tmp_name"];
        $dosya = $_FILES["gorsel"]["name"];
        $uzanti = explode(".", $_FILES['gorsel']['name']);
        $random = rand(0, 9999999999999);
        $random2 = rand(0, 999);
        $yeni_isim = $random . "-" . $random2 . "-" . $dosya;
        $hedef = "../../../../images/catalog/" . $yeni_isim;


        $catalogfiles = $_FILES["url"];
        $kaynak_2 = $_FILES["url"]["tmp_name"];
        $catalogfile = $_FILES["url"]["name"];
        $uzanti_2 = explode(".", $_FILES['url']['name']);
        $random_2 = rand(0, 9999999999999);
        $random2_2 = rand(0, 999);
        $yeni_isim_2 = $random_2 . "-" . $random2_2 . "-" . $catalogfile;
        $hedef_2 = "../../../../assets/uploads/" . $yeni_isim_2;


        if ($dosyas['type'] == 'image/jpg' || $dosyas['type'] == 'image/jpeg' || $dosyas['type'] == 'image/png') {

            if ($catalogfiles['type'] == 'image/jpg' || $catalogfiles['type'] == 'image/jpeg' || $catalogfiles['type'] == 'image/png' || $catalogfiles['type'] == 'application/pdf') {

                $gitti = move_uploaded_file($kaynak, $hedef);

                $gitti_2 = move_uploaded_file($kaynak_2, $hedef_2);

                $kaydet = $db->prepare("INSERT INTO katalog SET
        dil=:dil,
        baslik=:baslik,
        url=:url,
        gorsel=:gorsel
        ");
                $ekle = $kaydet->execute(array(
                    'dil' => $_POST['dil'],
                    'baslik' => $_POST['baslik'],
                    'url' => $yeni_isim_2,
                    'gorsel' => $yeni_isim
                ));
                if ($ekle) {

                    Header("location: ../../../pages.php?sayfa=kataloglar&status=success");

                } else {

                    Header("location: ../../../pages.php?sayfa=kataloglar&status=warning");

                }

            } else {
                Header("location: ../../../pages.php?sayfa=katalogekle&status=filetype");
            }


        } else {
            Header("location: ../../../pages.php?sayfa=katalogekle&status=imgtype");
        }


    }
}
?>


