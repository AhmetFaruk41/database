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
    if (isset($_POST['sliderdegis'])) {


        if ($_FILES['gorsel']["size"] > 0) {


            $dosyas = $_FILES["gorsel"];
            $kaynak = $_FILES["gorsel"]["tmp_name"];
            $dosya = $_FILES["gorsel"]["name"];
            $uzanti = explode(".", $_FILES['gorsel']['name']);
            $random = rand(0, 9999999999999);
            $random2 = rand(0, 999);
            $yeni_isim = $random . "-" . $random2 . "-" . $dosya;
            $hedef = "../../../../images/slider/" . $yeni_isim;


            if ($dosyas['type'] == 'image/jpg' || $dosyas['type'] == 'image/jpeg' || $dosyas['type'] == 'image/png') {

                $gitti = move_uploaded_file($kaynak, $hedef);


                $update = $db->prepare("UPDATE slider SET
        slider_2_bg=:slider_2_bg,
        baslik=:baslik,
        spot=:spot,
        durum=:durum,
        button_text=:button_text,
        sira=:sira,
        url=:url,
        baslik_animation=:baslik_animation,
        spot_animation=:spot_animation,
        button_animation=:button_animation,     
        text_bg=:text_bg,
        button_bg=:button_bg,
        button_text_color=:button_text_color,
        tur=:tur,
        gorsel=:gorsel
        WHERE id={$_POST['slider_id']}
        ");
                $guncelle = $update->execute(array(
                    'slider_2_bg' => $_POST['slider_2_bg'],
                    'baslik' => $_POST['baslik'],
                    'spot' => $_POST['spot'],
                    'durum' => $_POST['durum'],
                    'button_text' => $_POST['button_text'],
                    'sira' => $_POST['sira'],
                    'url' => $_POST['url'],
                    'baslik_animation' => $_POST['baslik_animation'],
                    'spot_animation' => $_POST['spot_animation'],
                    'button_animation' => $_POST['button_animation'],
                    'text_bg' => $_POST['text_bg'],
                    'button_bg' => $_POST['button_bg'],
                    'button_text_color' => $_POST['button_text_color'],
                    'tur' => 2,
                    'gorsel' => $yeni_isim
                ));
                if ($guncelle) {

                    $resimsilunlink = $_POST['eski_gorsel'];
                    unlink("../../../../images/slider/$resimsilunlink");
                    Header("location: ../../../pages.php?sayfa=ortasliderlar&status=success");

                } else {

                    Header("location: ../../../pages.php?sayfa=ortasliderlar&status=warning");

                }

            } else {
                Header("location: ../../../pages.php?sayfa=ortaslider&slider_id=$_POST[slider_id]&status=imgtype");
            }

        } else {


            $update = $db->prepare("UPDATE slider SET
        slider_2_bg=:slider_2_bg,
        baslik=:baslik,
        spot=:spot,
        durum=:durum,
        button_text=:button_text,
        sira=:sira,
        url=:url,
        baslik_animation=:baslik_animation,
        spot_animation=:spot_animation,
        button_animation=:button_animation,     
        text_bg=:text_bg,
        button_bg=:button_bg,
        button_text_color=:button_text_color
        WHERE id={$_POST['slider_id']}
        ");
            $guncelle = $update->execute(array(
                'slider_2_bg' => $_POST['slider_2_bg'],
                'baslik' => $_POST['baslik'],
                'spot' => $_POST['spot'],
                'durum' => $_POST['durum'],
                'button_text' => $_POST['button_text'],
                'sira' => $_POST['sira'],
                'url' => $_POST['url'],
                'baslik_animation' => $_POST['baslik_animation'],
                'spot_animation' => $_POST['spot_animation'],
                'button_animation' => $_POST['button_animation'],
                'text_bg' => $_POST['text_bg'],
                'button_bg' => $_POST['button_bg'],
                'button_text_color' => $_POST['button_text_color']
            ));
            if ($guncelle) {

                Header("location: ../../../pages.php?sayfa=ortasliderlar&status=success");

            } else {

                Header("location: ../../../pages.php?sayfa=ortasliderlar&status=warning");

            }


        }


    }


}
?>


