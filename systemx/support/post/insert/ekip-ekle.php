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
    if (isset($_POST['ekipekle'])) {


        if ($_FILES['gorsel']["size"] > 0) {


            $dosyas = $_FILES["gorsel"];
            $kaynak = $_FILES["gorsel"]["tmp_name"];
            $dosya = $_FILES["gorsel"]["name"];
            $uzanti = explode(".", $_FILES['gorsel']['name']);
            $random = rand(0, 9999999999999);
            $random2 = rand(0, 999);
            $yeni_isim = $random . "-" . $random2 . "-" . $dosya;
            $hedef = "../../../../images/team/" . $yeni_isim;


            if ($dosyas['type'] == 'image/jpg' || $dosyas['type'] == 'image/jpeg' || $dosyas['type'] == 'image/png') {

                $gitti = move_uploaded_file($kaynak, $hedef);


                $kaydet = $db->prepare("INSERT INTO ekip SET
            dil=:dil,
            durum=:durum,
            isim=:isim,
            sira=:sira,
            mail=:mail,
            pozisyon=:pozisyon,
            tel=:tel,
            gorsel=:gorsel
        ");
                $ekle = $kaydet->execute(array(
                    'dil' => $_POST['dil'],
                    'durum' => $_POST['durum'],
                    'isim' => $_POST['isim'],
                    'sira' => $_POST['sira'],
                    'mail' => $_POST['mail'],
                    'pozisyon' => $_POST['pozisyon'],
                    'tel' => $_POST['tel'],
                    'gorsel' => $yeni_isim
                ));
                if ($ekle) {

                    Header("location: ../../../pages.php?sayfa=ekipler&status=success");

                } else {

                    Header("location: ../../../pages.php?sayfa=ekipler&status=warning");

                }

            } else {
                Header("location: ../../../pages.php?sayfa=ekipekle&status=imgtype");
            }

        }


    }

}

?>


