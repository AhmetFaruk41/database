<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$page_header_setting = $db->prepare("select * from page_header where page_id='cart' order by id");
$page_header_setting->execute();
$pagehead = $page_header_setting->fetch(PDO::FETCH_ASSOC);
?>
<?php //** Cart Calc */
include "includes/func/calc.php";
?>
<?php
if(isset($_SESSION["shopping_cart"]) && count($_SESSION["shopping_cart"])> 0) {
?>
<?php
$sozlesme_cek = $db->prepare("select * from sozlesme where dil=:dil order by id desc limit 1");
$sozlesme_cek->execute(array(
        'dil' => $_SESSION['dil']
));
$sozlesme = $sozlesme_cek->fetch(PDO::FETCH_ASSOC);
?>
<title><?php echo ucwords_tr($diller['teslimat-ve-odeme']) ?> | <?php echo $ayar['site_baslik']?></title>
<meta name="description" content="<?php echo"$ayar[site_desc]" ?>">
<meta name="keywords" content="<?php echo"$ayar[site_tags]" ?>">
<meta name="news_keywords" content="<?php echo"$ayar[site_tags]" ?>">
<meta name="author" content="<?php echo"$ayar[site_baslik]" ?>" />
<meta itemprop="author" content="<?php echo"$ayar[site_baslik]" ?>" />
<meta name="robots" content="index follow">
<meta name="googlebot" content="index follow">
<meta property="og:type" content="website" />

<?php include "includes/config/header_libs.php";?>

</head>
<body>
<?php include 'includes/template/pre-loader.php'?>
<?php include 'includes/template/header.php'?>


<!-- Page Header ====================== !-->
<style>
     .page-headers-main{width:<?php if($pagehead['width']==1){?> 90%;margin: auto; <?php }else {?> 100% <?php }?> ;  padding:<?php echo $pagehead['padding'] ?>px 0 <?php echo $pagehead['padding'] ?>px 0 ;
        <?php if($pagehead['shadow'] == 1 ) {?>
        -webkit-box-shadow: inset 5000px 0 0 0 rgba(0, 0, 0, 0.27);
        -moz-box-shadow: inset 5000px 0 0 0 rgba(0, 0, 0, 0.27);
        box-shadow: inset 5000px 0 0 0 rgba(0, 0, 0, 0.27);
        <?php } ?>
        <?php if($pagehead['tip'] == 0 ) {?>
        background:#<?php echo $pagehead['bg_color'] ?> ;
        <?php } ?>
        <?php if($pagehead['tip'] == 1 ) {?>

        background:url(images/uploads/<?php echo $pagehead['bg_image'] ?>) ;

        box-shadow: inset 5000px 0 0 0 rgba(0, 0, 0, 0.2); border-color: rgba(0, 0, 0, 1);
        <?php } ?>
    }
</style>
<style>
    input[type="text"]:disabled {
        background: #FFF;
    }
    .form-control {
        border-radius: 0;
background-color: #fcfcfc;
    }
    label{

        font-family: 'Open Sans', Arial; font-size:13px; font-weight: 600;
        text-transform: uppercase;
    }
</style>
<div class="page-headers-main hero-section hero-background">
    <h1 class="page-title" style="color:#<?php echo $pagehead['text_color'] ?>"> <?php echo ucwords_tr($diller['teslimat-ve-odeme']) ?></h1>
</div>
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="/" class="permal-link"><?php echo $diller['anasayfa'] ?></a></li>
            <li class="nav-item"><span class="current-page"><?php echo ucwords_tr($diller['teslimat-ve-odeme']) ?></span></li>
        </ul>
    </nav>
</div>
<?php
if(isset($_SESSION["shopping_cart"]) && count($_SESSION["shopping_cart"])>0) {
    ?>
    <form action="purchasepost" method="post"  >
        <div class="page-contain shopping-cart">
            <div id="main-content" class="main-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                            <?php if ($odemeayar['sepet_step'] == 1 ){ ?>
                                <div class="checkout-progress-wrap">
                                    <ul class="steps">
                                        <li class="step 1st">
                                            <div class="checkout-act">
                                                <h3 class="title-box"><span class="number">1</span><?=$diller['sepetiniz']?></h3>
                                            </div>
                                        </li>
                                        <li class="step 2nd">
                                            <div class="checkout-act active">
                                                <h3 class="title-box"><span class="number">2</span><?=$diller['teslimat-ve-odeme']?></h3>
                                                <div class="box-content">
                                                    <div class="delivery-left-div">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="inputnName"><?=$diller['odeme-isim']?> <span style="color:#666">*</span></label>
                                                                <input type="text" name="isim" class="form-control" id="inputnName" required  >
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="inputDate"><?=$diller['odeme-soyisim']?> <span style="color:#666">*</span></label>
                                                                <input type="text" name="soyisim" class="form-control"  id="inputDate"  required >
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6 ">
                                                                <label for="inputPhone"><?=$diller['odeme-tel']?> <span style="color:#666">*</span></label>
                                                                <div class="input-group mb-2 mr-sm-2">

                                                                    <input type="number" name="tel" class="form-control" id="inputPhone" required  >
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6 ">
                                                                <label for="inputPosta"><?=$diller['odeme-eposta']?> <span style="color:#666">*</span></label>
                                                                <div class="input-group mb-2 mr-sm-2">

                                                                    <input type="email" name="eposta" class="form-control" id="inputPosta" required  >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="selectSehirSec"><?=$diller['odeme-sehir']?> <span style="color:#666">*</span></label>
                                                                <select name="sehir"  class="form-control" id="selectSehirSec" required>
                                                                    <option value="">Seçin...</option>
                                                                    <!-- <option value="Adana">Adana</option>
                                                                    <option value="Adıyaman">Adıyaman</option>
                                                                    <option value="Afyonkarahisar">Afyonkarahisar</option>
                                                                    <option value="Ağrı">Ağrı</option>
                                                                    <option value="Amasya">Amasya</option>
                                                                    <option value="Ankara">Ankara</option>
                                                                    <option value="Antalya">Antalya</option>
                                                                    <option value="Artvin">Artvin</option>
                                                                    <option value="Aydın">Aydın</option>
                                                                    <option value="Balıkesir">Balıkesir</option>
                                                                    <option value="Bilecik">Bilecik</option>
                                                                    <option value="Bingöl">Bingöl</option>
                                                                    <option value="Bitlis">Bitlis</option>
                                                                    <option value="Bolu">Bolu</option>
                                                                    <option value="Burdur">Burdur</option>
                                                                    <option value="Bursa">Bursa</option>
                                                                    <option value="Çanakkale">Çanakkale</option>
                                                                    <option value="Çankırı">Çankırı</option>
                                                                    <option value="Çorum">Çorum</option>
                                                                    <option value="Denizli">Denizli</option>
                                                                    <option value="Diyarbakır">Diyarbakır</option>
                                                                    <option value="Edirne">Edirne</option>
                                                                    <option value="Elazığ">Elazığ</option>
                                                                    <option value="Erzincan">Erzincan</option>
                                                                    <option value="Erzurum">Erzurum</option>
                                                                    <option value="Eskişehir">Eskişehir</option>
                                                                    <option value="Gaziantep">Gaziantep</option>
                                                                    <option value="Giresun">Giresun</option>
                                                                    <option value="Gümüşhane">Gümüşhane</option>
                                                                    <option value="Hakkâri">Hakkâri</option>
                                                                    <option value="Hatay">Hatay</option>
                                                                    <option value="Isparta">Isparta</option>
                                                                    <option value="Mersin">Mersin</option>
                                                                    <option value="İstanbul">İstanbul</option>
                                                                    <option value="İzmir">İzmir</option>
                                                                    <option value="Kars">Kars</option>
                                                                    <option value="Kastamonu">Kastamonu</option>
                                                                    <option value="Kayseri">Kayseri</option>
                                                                    <option value="Kırklareli">Kırklareli</option>
                                                                    <option value="Kırşehir">Kırşehir</option> -->
                                                                    <option value="Kocaeli">Kocaeli</option>
                                                                <!--<option value="Konya">Konya</option>
                                                                    <option value="Kütahya">Kütahya</option>
                                                                    <option value="Malatya">Malatya</option>
                                                                    <option value="Manisa">Manisa</option>
                                                                    <option value="Kahramanmaraş">Kahramanmaraş</option>
                                                                    <option value="Mardin">Mardin</option>
                                                                    <option value="Muğla">Muğla</option>
                                                                    <option value="Muş">Muş</option>
                                                                    <option value="Nevşehir">Nevşehir</option>
                                                                    <option value="Niğde">Niğde</option>
                                                                    <option value="Ordu">Ordu</option>
                                                                    <option value="Rize">Rize</option>
                                                                    <option value="Sakarya">Sakarya</option>
                                                                    <option value="Samsun">Samsun</option>
                                                                    <option value="Siirt">Siirt</option>
                                                                    <option value="Sinop">Sinop</option>
                                                                    <option value="Sivas">Sivas</option>
                                                                    <option value="Tekirdağ">Tekirdağ</option>
                                                                    <option value="Tokat">Tokat</option>
                                                                    <option value="Trabzon">Trabzon</option>
                                                                    <option value="Tunceli">Tunceli</option>
                                                                    <option value="Şanlıurfa">Şanlıurfa</option>
                                                                    <option value="Uşak">Uşak</option>
                                                                    <option value="Van">Van</option>
                                                                    <option value="Yozgat">Yozgat</option>
                                                                    <option value="Zonguldak">Zonguldak</option>
                                                                    <option value="Aksaray">Aksaray</option>
                                                                    <option value="Bayburt">Bayburt</option>
                                                                    <option value="Karaman">Karaman</option>
                                                                    <option value="Kırıkkale">Kırıkkale</option>
                                                                    <option value="Batman">Batman</option>
                                                                    <option value="Şırnak">Şırnak</option>
                                                                    <option value="Bartın">Bartın</option>
                                                                    <option value="Ardahan">Ardahan</option>
                                                                    <option value="Iğdır">Iğdır</option>
                                                                    <option value="Yalova">Yalova</option>
                                                                    <option value="Karabük">Karabük</option>
                                                                    <option value="Kilis">Kilis</option>
                                                                    <option value="Osmaniye">Osmaniye</option>
                                                                    <option value="Düzce">Düzce</option> -->
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="inputIlce"><?=$diller['odeme-ilce']?> <span style="color:#666">*</span></label>
                                                                <input type="text" name="ilce" class="form-control" id="inputIlce" required  >
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label for="inputPoscaCode"><?=$diller['odeme-postakodu']?> <span style="color:#666">*</span></label>
                                                                <input type="text" name="postakodu" class="form-control" id="inputPoscaCode" required  >
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label for="textareaSiparisadres"><?=$diller['odeme-adres']?> <span style="color:#666">*</span></label>
                                                                <textarea class="form-control" id="textareaSiparisadres" rows="3"  name="adres" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label for="textareaSiparisNot"><?=$diller['odeme-not']?> <span style="color:#666">(OPSIYONEL)</span></label>
                                                                <textarea class="form-control" id="textareaSiparisNot" rows="3"  name="notlar" ></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="delivery-right-div">
                                                        <div class="delivery-right-inside">
                                                            <div class="delivery-right-st-head">
                                                                <h3><?=$diller['odeme-yontemi-secin']?></h3>
                                                            </div>
                                                            <?php if($odemeayar['eft'] == 1 || $odemeayar['kredi_kart'] == 1) { ?>
                                                                <div class="delivery-right-purchase-div">
                                                                    <?php if ($odemeayar['eft'] == 1) {?>
                                                                       <div class="col-lg-12">
                                                                        <input class="form-check" name="purchase_type" id="nakit" type="radio" value="4">
                                                                        <label for="nakit"><?=$diller['odeme-tur-kapida-kredi-karti']?></label>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <input class="form-check" id="kart" type="radio" name="purchase_type" value="3">
                                                                        <label for="kart"><?=$diller['odeme-tur-kapida-nakit']?></label>
                                                                    </div>
                                                                <?php }?>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="alert alert-warning">
                                                                <strong>UYARI! Ödeme Yöntemleri Pasif Durumda</strong>
                                                                <br>
                                                                Sayın site yetkilileri; Lüten sisteminizdeki ödeme yöntemlerinden en az birini aktif duruma getirin.
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <textarea name="pd_items" style="display: none" >
                                                    <?php if(isset($_SESSION["shopping_cart"]) && count($_SESSION["shopping_cart"])> 0) { foreach($_SESSION["shopping_cart"] as $product) { $uruncek = $db ->prepare("select * from urun where id='$product[item_id]' order by id desc limit 1");  $uruncek->execute();  $urun = $uruncek->fetch(PDO::FETCH_ASSOC); ?>(ÜRÜN : <?=$urun['baslik']?>, BİRİM FİYAT : <?php echo number_format($urun['fiyat'], 2); ?> TL , ADET : <?=$product['item_quantity']?>) <br><?php }} ?>
                                                </textarea>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="step 3rd">
                                        <div class="checkout-act">
                                            <h3 class="title-box"><span class="number">3</span><?=$diller['odeme-bilgileri']?></h3>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        <?php }?>
                    </div>
                    <div style="top:100px;position:sticky" class="col-lg-5 col-md-5 col-sm-6 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
                        <div class="order-summary sm-margin-bottom-80px">
                            <div class="cart-list-box short-type">
                                <span class="number"><?=$diller['siparis-detaylari']?></span>
                                <ul class="subtotal">
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name"><?=$diller['ara-toplam']?></b>
                                            <span class="stt-price"><?php echo number_format($aratoplam, 2); ?> <?php echo $odemeayar['simge'] ?></span>
                                        </div>
                                    </li>
                                    <?php if($kdvtoplam >0) {?>
                                        <li>
                                            <div class="subtotal-line">
                                                <b class="stt-name"> <?=$diller['kdv']?></b>
                                                <span class="stt-price"><?php echo number_format($kdvtoplam, 2); ?> <?php echo $odemeayar['simge'] ?></span>
                                            </div>
                                        </li>
                                    <?php } ?>
                                    <?php if($kargotoplam >0 && $odemeayar['kargo_sistemi'] == 1 ) {?>
                                        <li>
                                            <div class="subtotal-line">
                                                <b class="stt-name"> <?=$diller['kargo-bedeli']?></b>
                                                <span class="stt-price"> <?php echo number_format($kargotoplam, 2); ?> <?php echo $odemeayar['simge'] ?></span>
                                            </div>
                                        </li>
                                    <?php } ?>
                                    <li class="delivery-right-satis-sozlesmesi-div">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1" checked required>
                                            <label class="custom-control-label" for="customCheck1" style="text-transform: none; padding-left: 10px; padding-top: 5px;  line-height: 15px; cursor: pointer; ">
                                                <a data-toggle="modal" data-target="#modalSatisSozlesmesi" role="button" style="color:#000; text-decoration: underline">
                                                    <?=$diller['mesafeli-satis-sozlesmesi-onay']?>
                                                </a>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name"><?=$diller['sepet-toplam-1']?></b>
                                            <span class="stt-price"><?php echo number_format($odenecektoplam, 2); ?> <?php echo $odemeayar['simge'] ?></span>
                                        </div>
                                    </li>
                                </ul>
                                <div class="delivery-right-button-div btn-checkout">
                                    <button type="submit" name="purchase" class="btn checkout">
                                        <?=$diller['odemeye-gec']?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php } ?>

<!-- Modal -->
<div class="modal fade" id="modalSatisSozlesmesi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"><?=$diller['mesafeli-satis-sozlesmesi']?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="font-family: 'Open Sans', Arial; font-size:14px;">
                <?=$sozlesme['icerik']?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$diller['modal-kapat']?></button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<?php if(isset($_SESSION['teslimatArea']) && $_SESSION['teslimatArea']['status'] == 'error'){ ?>
    <body onload="sweetAlert('<?= $diller['post-hata']?>', '<?= $diller['form-eksik-alan']?>', 'warning');"></body>
    <meta http-equiv="refresh" content="3; URL=teslimat">
    <?php unset($_SESSION['teslimatArea']); ?>
<?php }?>

<?php include 'includes/template/footer.php'?>
</body>
</html>
<?php include "includes/config/footer_libs.php";?>
<?php } else {

    header('Location:'.$siteurl.'');

    exit;
} ?>