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
    if (isset($_POST['ebultengorsel'])) {

        if ($_FILES['back_bg']["size"] > 0) {
            $dosyas = $_FILES["back_bg"];
            $kaynak = $_FILES["back_bg"]["tmp_name"];
            $dosya = $_FILES["back_bg"]["name"];
            $uzanti = explode(".", $_FILES['back_bg']['name']);
            $random = rand(0, 9999999999999);
            $random2 = rand(0, 999);
            $yeni_isim = $random . "-" . $random2 . "-" . $dosya;
            $hedef = "../../../../images/uploads/" . $yeni_isim;


            if ($dosyas['type'] == 'image/jpg' || $dosyas['type'] == 'image/jpeg' || $dosyas['type'] == 'image/png') {

                $gitti = move_uploaded_file($kaynak, $hedef);

                $ayarkaydet = $db->prepare(
                    "UPDATE ebulten_ayar SET
			back_bg=:back_bg	
			WHERE id='1'"
                );
                $update = $ayarkaydet->execute(
                    array(
                        'back_bg' => $yeni_isim
                    )
                );

                if ($update) {

                    $resimsilunlink = $_POST['eski_bg'];
                    unlink("../../../../images/uploads/$resimsilunlink");

                    Header("location: ../../../pages.php?sayfa=ebultenayar&status=success");
                } else {

                    Header("location: ../../../pages.php?sayfa=ebultenayar&status=warning");
                }


            } else {

                Header("location: ../../../pages.php?sayfa=pagehead&page_id=$_POST[page_id]&status=imgtype");
            }


        }

    }
}
?>


