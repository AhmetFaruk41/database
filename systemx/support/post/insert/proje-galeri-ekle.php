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
    if (isset($_POST['topluresimyukle'])) {


        $errors = array();
        foreach ($_FILES['gorsel']['tmp_name'] as $key => $tmp_name) {

            $random = rand(0,(int) 9999999999999);

            $file_name = $key . $random . $_FILES['gorsel']['name'][$key];
            $file_size = $_FILES['gorsel']['size'][$key];
            $file_tmp = $_FILES['gorsel']['tmp_name'][$key];
            $file_type = $_FILES['gorsel']['type'][$key];

            if ($file_size <= 0) {

                Header("location: ../../../pages.php?sayfa=projegaleri&proje_id=$_POST[proje_id]&status=nofile");

            } else {

                if ($file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/png') {


                    $kaydet = $db->prepare("INSERT INTO proje_resim SET
                      gorsel=:gorsel,
                      proje_id=:proje_id,
                      sira=:sira
                      ");
                    $ekle = $kaydet->execute(array(
                        'gorsel' => $file_name,
                        'proje_id' => $_POST['proje_id'],
                        'sira' => $key
                    ));


                    $desired_dir = "../../../../images/projects";


                    if (empty($errors) == true) {
                        if (is_dir($desired_dir) == false) {
                            mkdir("$desired_dir", 0700);        // Create directory if it does not exist
                        }
                        if (is_dir("$desired_dir/" . $file_name) == false) {
                            move_uploaded_file($file_tmp, "$desired_dir/" . $file_name);
                        } else {                                    // rename the file if another one exist
                            $new_dir = "$desired_dir/" . $file_name . time();
                            rename($file_tmp, $new_dir);
                        }

                        Header("location: ../../../pages.php?sayfa=projegaleri&proje_id=$_POST[proje_id]&status=success");

                    } else {
                        print_r($errors);
                    }
                } else {

                    Header("location: ../../../pages.php?sayfa=projegaleri&proje_id=$_POST[proje_id]&status=imgtype");

                }

            }


        }


    }
}
?>


