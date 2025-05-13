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
    if (isset($_POST['katalogdosyadegis'])) {

        if ($_FILES['url']["size"] > 0) {
            $dosyas = $_FILES["url"];
            $kaynak = $_FILES["url"]["tmp_name"];
            $dosya = $_FILES["url"]["name"];
            $uzanti = explode(".", $_FILES['url']['name']);
            $random = rand(0, 9999999999999);
            $random2 = rand(0, 999);
            $yeni_isim = $random . "-" . $random2 . "-" . $dosya;
            $hedef = "../../../../assets/uploads/" . $yeni_isim;


            if ($dosyas['type'] == 'image/jpg' || $dosyas['type'] == 'image/jpeg' || $dosyas['type'] == 'image/png' || $dosyas['type'] == 'application/pdf') {

                $gitti = move_uploaded_file($kaynak, $hedef);

                $ayarkaydet = $db->prepare(
                    "UPDATE katalog SET
			url=:url	
			WHERE id={$_POST['katalog_id']}"
                );
                $update = $ayarkaydet->execute(
                    array(
                        'url' => $yeni_isim
                    )
                );

                if ($update) {

                    $resimsilunlink = $_POST['eski_url'];
                    unlink("../../../../assets/uploads/$resimsilunlink");

                    Header("location: ../../../pages.php?sayfa=kataloglar&status=success");
                } else {

                    Header("location: ../../../pages.php?sayfa=kataloglar&status=warning");
                }


            } else {

                Header("location: ../../../pages.php?sayfa=katalog&katalog_id=$_POST[katalog_id]&status=filetype");
            }


        }

    }
}
?>


