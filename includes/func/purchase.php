<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null; ?>
<?php
if (isset($_POST['purchase'])) {
    if ($_POST['isim'] && $_POST['soyisim'] && $_POST['eposta'] && $_POST['tel'] && $_POST['sehir'] && $_POST['ilce'] && $_POST['adres'] && $_POST['postakodu']) {

        ////////////////////////** POST SESSIONLARI */////////////////////////
        $rands = rand(0,(int) 99999999);
        $_SESSION['siparis_numarasi'] = $rands;
        $_SESSION['siparis_isim'] = trim(strip_tags($_POST["isim"]));
        $_SESSION['siparis_soyisim'] = trim(strip_tags($_POST["soyisim"]));
        $_SESSION['siparis_eposta'] = trim(strip_tags($_POST["eposta"]));
        $_SESSION['siparis_tel'] = trim(strip_tags($_POST["tel"]));
        $_SESSION['siparis_sehir'] = trim(strip_tags($_POST["sehir"]));
        $_SESSION['siparis_ilce'] = trim(strip_tags($_POST["ilce"]));
        $_SESSION['siparis_adres'] = trim(strip_tags($_POST["adres"]));
        $_SESSION['siparis_postakodu'] = trim(strip_tags($_POST["postakodu"]));
        $_SESSION['basket_items'] = $_POST["pd_items"];
        if ($_POST['notlar'] == !null) {
            $_SESSION['siparis_not'] = $_POST["notlar"];
        }
        ////////////////////////** POST SESSIONLARI ENDING */////////////////////////
        ///
        ///
        ?>
        <?php
        if ($_POST['purchase_type'] == 1)
        {


            /* *******Paywant Özel Alan **************************************************/
            if ($odemeayar['pos_tur'] == 4) {
                $sorguMaili = trim(strip_tags($_POST['eposta']));
                $idolustur = rand(0,(int) 999999999999);
                $userCekPaywant = $db->prepare("select * from paywant_user where user_email='$sorguMaili'");
                $userCekPaywant->execute();
                $paywantrow = $userCekPaywant->fetch(PDO::FETCH_ASSOC);

                if ($userCekPaywant->rowCount() > 0) {

                    $_SESSION['paywant_userid'] = $paywantrow['user_id'];

                } else {

                    $_SESSION['paywant_userid'] = $idolustur;

                    $paywantUserKaydet = $db->prepare("INSERT INTO paywant_user SET
            user_id=:user_id,
            user_email=:user_email
            ");
                        $usereklepaywant = $paywantUserKaydet->execute(array(
                        'user_id' => $idolustur,
                        'user_email' => trim(strip_tags($_POST['eposta']))
                    ));

                }

                include 'includes/template/_pos/paywant/insert.php';
            }
            /****** Paywant Özel Alan Ending  *******Paywant Özel Alan **************************************************/

            header('Location:' . $siteurl . 'odeme');

            exit;
        } else if ($_POST['purchase_type'] == 2) {
            ?>

            <?php include "includes/post/eft-havale-post.php"; ?>

            <?php
        }else if($_POST['purchase_type'] == 3){
            include "includes/post/kapida-nakit.php"; 
        }else if($_POST['purchase_type'] == 4){
            include "includes/post/kapida-kart.php"; 
        }
        ?>
        <?php
    } else {
        $teslimat = array(
            "status" => "error"
        );
        $_SESSION["teslimatArea"] = $teslimat;
        header('Location:' . $siteurl . 'teslimat');
    }

} else {

    header('Location:' . $siteurl . '');

    exit;

}
?>