<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$page_header_setting = $db->prepare("select * from page_header where page_id='products_detail' order by id");
$page_header_setting->execute();
$pagehead = $page_header_setting->fetch(PDO::FETCH_ASSOC);
?>
<?php
$productsayar = $db->prepare("select * from urunmodul_ayar where id=:id");
$productsayar->execute(array(
    'id' => 1
));
$prodayar = $productsayar->fetch(PDO::FETCH_ASSOC);
?>
<?php
$id = $_GET['urun_id'];
$urunListele = $db->prepare("select * from urun where id=:id and durum=:durum and dil=:dil");
$urunListele->execute(array(
    'id' => $id,
    'durum' => 1,
    'dil' => $_SESSION['dil']
));
$urun = $urunListele->fetch(PDO::FETCH_ASSOC);
$etiketler = $urun['tags'];
$etiketler = explode(',', $etiketler);
?>
<?php
$urun_hits = $db->prepare("UPDATE urun SET hit = hit+1 WHERE id=:id and dil=:dil  ");
$urun_hits->execute(array(
    'id' => $id,
    'dil' => $_SESSION['dil']
));
?>
<?php
$product_kat_info = $db->prepare("select * from urun_cat where id=:id and durum=:durum and dil=:dil");
$product_kat_info->execute(array(
    'id' => $urun['kat_id'],
    'durum' => 1,
    'dil' => $_SESSION['dil']
));
$procat = $product_kat_info->fetch(PDO::FETCH_ASSOC);
?>
<?php
$product_ust_kat = $db->prepare("select * from urun_cat where id=:id and durum=:durum and dil=:dil");
$product_ust_kat->execute(array(
    'id' => $procat['ust_id'],
    'durum' => 1,
    'dil' => $_SESSION['dil']
));
$proustcat = $product_ust_kat->fetch(PDO::FETCH_ASSOC);
?>
<?php
$urun_galeri = $db->prepare("select * from urun_galeri where urun_id=:urun_id order by sira asc");
$urun_galeri->execute(array(
    'urun_id' => $urun['id']
));
?>
<?php
$varyantCek = $db->prepare("select * from varyant where urun_id=:urun_id order by sira asc");
$varyantCek->execute(array(
    'urun_id' => $urun['id']
));
$sayi = 1;
?>
<?php
if($urunListele->rowCount() == 0)
{
    header('Location:'.$siteurl.'');
    exit;
}
?>
<title><?php echo ucwords_tr($urun['baslik']) ?> | <?php echo $ayar['site_baslik']?></title>
<meta name="description" content="<?php echo"$urun[meta_desc]" ?>">
<meta name="keywords" content="<?php echo"$urun[tags]" ?>">
<meta name="news_keywords" content="<?php echo"$urun[tags]" ?>">
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
    .quantity button{width: auto; height: 42px; outline: none; margin-left: 10px; color:#<?=$odemeayar['button_text_color']?>; font-family: 'Open Sans',Arial; font-size:15px; font-weight: bold; padding: 0 30px 0 30px; border: 0; background: #<?=$odemeayar['button_bg']?>}
</style>
<div class="page-headers-main hero-section hero-background">
    <h1 class="page-title" style="color:#<?php echo $pagehead['text_color'] ?>"><?php echo ucwords_tr($procat['baslik']) ?></h1>
</div>
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="/" class="permal-link"><?php echo $diller['anasayfa'] ?></a></li>
            <li class="nav-item"><a href="urunler" class="permal-link"><?php echo ucwords_tr($diller['urunlerimiz']) ?></a></li>
            <?php if($proustcat['id'] == 0) {?>
                <li class="nav-item"><span class="current-page"><a href="urun-kategori/<?=$procat['id']?>/<?=seo($procat['baslik'])?>"><?php echo ucwords_tr($procat['baslik']) ?></a></span></li>
            <?php }?>
            <?php if($proustcat['id'] != 0) {?>
                <li class="nav-item"><a href="urun-kategori/<?=$proustcat['id']?>/<?=seo($proustcat['baslik'])?>"><?php echo ucwords_tr($proustcat['baslik']) ?></a></li>
            <?php }?>
            <?php if($proustcat['id'] != 0) {?>
                <li class="nav-item"><a href="urun-kategori/<?=$procat['id']?>/<?=seo($procat['baslik'])?>"><?php echo ucwords_tr($procat['baslik']) ?></a></li>
            <?php }?>
        </ul>
    </nav>
</div>
<div class="page-contain single-product">
    <div class="container">
        <div id="main-content" class="main-content">
            <div class="sumary-product single-layout">
                <div class="media">
                    <ul class="biolife-carousel slider-for" data-slick='{"arrows":false,"dots":false,"slidesMargin":30,"slidesToShow":1,"slidesToScroll":1,"fade":true,"asNavFor":".slider-nav"}'>
                        <li><img src="images/product/<?=$urun['gorsel']?>" alt="" width="500" height="500"></li>
                        <?php foreach ($urun_galeri as $galeri) { ?>
                            <li><img src="images/product/<?=$galeri['gorsel']?>" alt="" width="500" height="500"></li>
                        <?php } ?>
                    </ul>
                    <ul class="biolife-carousel slider-nav" data-slick='{"arrows":false,"dots":false,"centerMode":false,"focusOnSelect":true,"slidesMargin":10,"slidesToShow":4,"slidesToScroll":1,"asNavFor":".slider-for"}'>
                        <?php
                        $urun_galeri->execute(); ?>
                        <li><img src="images/product/<?=$urun['gorsel']?>" alt="" width="500" height="500"></li>
                        <?php foreach ($urun_galeri as $galeri) { ?>
                            <li><img src="images/product/<?=$galeri['gorsel']?>" alt="" width="500" height="500"></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="product-attribute">
                    <h3 class="title"><?=$urun['baslik']?></h3>
                    <strong><?=$diller['urun-kodu']?></strong> :
                    <?=$urun['urun_kod']?>
                    <?php if($prodayar['star_rate'] == 1) {?>
                        <?php
                        switch ($urun['star_rate']) {
                            case '0': $percent = 0; break;
                            case '1': $percent = 20; break;
                            case '2': $percent = 40; break;
                            case '3': $percent = 60; break;
                            case '4': $percent = 80; break;
                            case '5': $percent = 100; break;
                        } ?>
                        <div class="rating">
                            <p class="star-rating"><span class="width-<?=$percent?>percent"></span></p>
                        </div>
                    <?php } ?>
                    <p class="excerpt"><?=$urun['spot']?></p>
                    <div class="price">
                        <?php if($urun['fiyat'] ==!null && $urun['fiyat'] > '0') {?>
                            <ins><span class="price-amount"><span class="currencySymbol"><?php echo $odemeayar['simge'] ?></span><?php echo number_format($urun['fiyat'], 2); ?></span> <?php if($urun['kdv'] == 1){?><span style="font-size:20px"> + KDV</span><?php }?></ins>
                        <?php } ?>
                        <?php if($urun['eski_fiyat'] ==!null) {?>
                            <del><span class="price-amount"><span class="currencySymbol"><?php echo $odemeayar['simge'] ?></span><?php echo number_format($urun['eski_fiyat'], 2); ?></span></del>
                        <?php } ?>
                    </div>
                    <?php if($urun['kargo'] == 1 && $urun['stok'] > 0 && $odemeayar['kargo_sistemi'] == 1) { ?>
                        <div class="product-detail-header-right-feature-info">
                            <div style="padding:0 0 10px 0;">
                                <strong><?=$diller['kargo-ucreti']?></strong> :
                                <strong style="font-size:15px"><?php echo number_format($urun['kargo_ucret'], 2); ?></strong> <?php echo $odemeayar['simge'] ?>
                            </div>
                        </div>
                    <?php }?>
                    <?php if($urun['kargo'] == 0 && $urun['stok'] > 0 && $odemeayar['kargo_sistemi'] == 1) { ?>
                        <div class="product-detail-header-right-feature-info" style="border:1px solid #EBEBEB;background-color: #F8F8F8; font-size:13px; display: inline-block; width: auto; padding: 2px 15px 2px 15px ">
                            <strong style="color:#000"><i class="ion-android-car" style="margin-right: 5px"></i><?=$diller['kargo-ucretsiz']?></strong>
                        </div>
                        <div style="clear: both"></div>
                    <?php }?>
                    <?php if($urun['stok'] > 0 && $odemeayar['kargo_sistemi'] == 1) { ?>
                        <?php if($odemeayar['kargo_limit'] > 0 || $odemeayar['kargo_limit'] == !null) { ?>
                            <div class="product-detail-header-right-limit-kargo">
                                <i class="fa fa-truck"></i>
                                <strong style="font-size:15px"><?php echo number_format($odemeayar['kargo_limit'], 2); ?> <?php echo $odemeayar['simge'] ?></strong> <?=$diller['kargo-limit-aciklamasi']?>
                            </div>
                            <div style="clear: both"></div>
                        <?php }?>
                    <?php }?>
                    <?php if($prodayar['detay_etiket']==1 && $urun['tags'] ==!null){ ?>
                        <div class="product-detail-header-right-feature-info">
                            <strong><?=$diller['etiketler']?></strong> :
                            <?php $hashOlusturrandom = rand(0,(int) 9999999999999);?>
                            <?php
                            foreach( $etiketler as $anahtar => $deger ){ ?>
                                <div class="product-detail-etiket-box"><a href="javascript:void(0);" alt="<?=$deger?>" title="<?=$deger?>"><?=$deger?></a></div>
                            <?php } ?>
                        </div>
                    <?php }?>
                </div>
                <div class="action-form">
                    <?php if($odemeayar['stok_durum'] ==1) { ?>
                        <div class="product-detail-header-right-feature-info">
                            <strong><?=$diller['stok-durumu']?></strong> :<br>
                            <?php if($urun['stok'] <= 0) {?>
                                <i class="fa fa-times" style="color:red"></i>
                                <?=$diller['stok-yok']?>
                            <?php } ?>
                            <?php if($urun['stok'] > 0) {?>
                                <i class="fa fa-check" style="color:forestgreen"></i>
                                <?=$diller['stok-mevcut']?>
                                <?php if($odemeayar['stok_gorunum'] ==1) { ?>
                                    <strong>[ <?=$urun['stok']?> <?=$diller['stok-adet-yazisi']?> ]</strong>
                                <?php }?>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <form class="product-form" method="post">
                        <div class="quantity-box">
                            <span class="title"><?=$diller['stok-adet-yazisi']?>:</span>
                            <div class="qty-input">
                                <input type="number" min="1" max="<?=$urun['stok']?>" step="1" value="1" name="quantity">
                            </div>
                        </div>
                        <?php if($odemeayar['sepet_sistemi'] == 1 && $urun['stok'] > 0) { ?>
                            <?php foreach ($varyantCek as $varyant) {?>
                                <div class="quantity-box" style="margin-top: .5em">
                                    <span class="title"><?=$varyant['baslik']?>:</span>
                                    <div class="qty-input">
                                        <select name="var<?=$sayi++;?>" id="" class="form-control" required style="font-size:14px">
                                            <option value="" selected="" disabled=""><?=$diller['varyant-secin-yazisi']?></option>
                                            <?php
                                            $varyantOzellikCek = $db->prepare("select * from varyant_oz where varyant_id='$varyant[id]' order by sira ASC");
                                            $varyantOzellikCek->execute();
                                            while($varoz = $varyantOzellikCek->fetch(PDO::FETCH_ASSOC))
                                            {
                                                ?>
                                                <option value="<?=$varyant['baslik']?>: <?=$varoz['ozellik']?>"><?=$varoz['ozellik']?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        <input name="product_code" type="hidden" value="<?php echo $urun["id"]; ?>">
                        <div class="buttons">
                            <button type="submit" class="addToCartBtn btn add-to-cart-btn">
                                <?=$diller['sepete-ekle']?>
                            </button>
                        </div>
                        <!-- <?php if($odemeayar['normal_siparis'] == 1 && $urun['stok'] > 0) {?>
                        <button type="button" class="product-detail-header-right-normal-button" data-toggle="modal" data-target=".siparisModal" style="outline:none; background: #<?=$odemeayar['button_bg']?>; color:#<?=$odemeayar['button_text_color']?>; border:0">
                        <i class="fa fa-shopping-bag" style="margin-right: 8px"></i>
                        <?=$diller['normal-siparis']?>
                        </button>
                        <?php } ?>
                        <?php if($odemeayar['wp_siparis'] == 1 && $urun['stok'] > 0) {?>
                        <a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo boslukSil($ayar['site_whatsapp']) ?>&text=Merhabalar <?php echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?> Ürününü Sipariş Etmek İstiyorum." style="color:#FFF; text-decoration: none;">
                            <div class="product-detail-header-right-wp-button">
                                <i class="fa fa-whatsapp"></i>
                                <?=$diller['whatsapp-siparis']?>
                            </div>
                        </a>
                        <?php } ?> -->
                    </form>
                   <!--  <div class="social-media">
                        <ul class="social-list">
                            <li><a href="#" class="social-link"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="social-link"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="social-link"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="social-link"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="social-link"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
            <!-- Tab info -->
            <?php if($urun['icerik'] == !null || $urun['ek_bilgi'] ==!null || $urun['embed']) { ?>
                <div class="product-tabs single-layout biolife-tab-contain">
                    <div id="tab-products" class="tab-head" >
                        <?php if($urun['icerik'] == !null || $urun['ek_bilgi'] ==!null || $urun['embed']) { ?>
                            <ul class='tabs'>
                                <?php if($urun['icerik'] == !null) {?>
                                    <li class="tab-element active">
                                        <a href="#info">
                                            <?php echo $diller['urun-detay-aciklama'] ?>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if($urun['ek_bilgi'] == !null) {?>
                                    <li class="tab-element">
                                        <a href="#map">
                                            <?php echo $diller['urun-detay-ekbilgi'] ?>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if($urun['embed'] == !null) {?>
                                    <li class="tab-element">
                                        <a href="#gallery">
                                            <i class="fa fa-video-camera"></i>
                                            <?php echo $diller['urun-detay-video'] ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php }?>
                        <div class="tab-content">
                            <div id="info" class="tab-contain desc-tab active" >
                                <?php
                                $icerik  = $urun['icerik'];
                                $eski   = "../images";
                                $yeni   = "images";
                                $icerik = str_replace($eski, $yeni, $icerik);
                                ?>
                                <?=$icerik?>
                            </div>
                            <div id="map" class="tab-contain info-tab" >
                                <?php
                                $ek_bilgi  = $urun['ek_bilgi'];
                                $eski   = "../images";
                                $yeni   = "images";
                                $ek_bilgi = str_replace($eski, $yeni, $ek_bilgi);
                                ?>
                                <?=$ek_bilgi?>
                            </div>
                            <div id="gallery" class="tab-contain"  style="text-align: center" >
                                <?=$urun['embed']?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $urun_listele = $db->query("SELECT * FROM urun WHERE durum='1' and dil='$_SESSION[dil]' and kat_id IN (
                    SELECT id FROM urun_cat  WHERE id = $urun[kat_id] OR ust_id = $urun[kat_id]) order by id desc limit 4");
                $UrunAl = $urun_listele->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <?php if($prodayar['detay_benzer_urun'] == 1 && $urun_listele->rowCount() > 1) {?>
                    <div class="product-related-box single-layout">
                        <div class="biolife-title-box lg-margin-bottom-26px-im">
                            <h3 class="main-title"><?php echo $diller['benzer-urunler']?></h3>
                        </div>
                        <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":0,"slidesToShow":5, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":20 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}}]}'>
                            <?php foreach($UrunAl as $urunbenzer){
                                if($urunbenzer['stok'] > 0) {
                                    $pro_list_cat = $db->prepare("select * from urun_cat where id='$urunbenzer[kat_id]' and durum='1' and dil='$_SESSION[dil]' order by id desc limit 1 ");
                                    $pro_list_cat->execute();
                                    $pro_cat = $pro_list_cat->fetch(PDO::FETCH_ASSOC);
                                    ?>
                                    <?php if($urun['id'] <> $urunbenzer['id'] ) { ?>
                                        <li class="product-item col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                            <div class="contain-product layout-default">
                                                <div class="product-thumb">
                                                    <a href="urun/<?php echo $urunbenzer['id'] ?>/<?php echo seo($urunbenzer['baslik']) ?>" class="link-to-product">
                                                        <img src="images/product/<?php echo $urunbenzer['gorsel'] ?>" alt="<?php echo $urunbenzer['baslik'] ?>" style="width:270px;height:270px;object-fit: contain" class="product-thumnail">
                                                    </a>
                                                </div>
                                                <div class="info">
                                                    <b class="categories"> <?php echo $pro_cat['baslik'] ?></b>
                                                    <h4 class="product-title"><a class="pr-name" href="urun/<?php echo $urunbenzer['id'] ?>/<?php echo seo($urunbenzer['baslik']) ?>"><?php echo $urunbenzer['baslik'] ?></a></h4>
                                                    <?php if($prodayar['star_rate'] == 1) {?>
                                                        <?php
                                                        switch ($urunbenzer['star_rate']) {
                                                            case '0': $percent = 0; break;
                                                            case '1': $percent = 20; break;
                                                            case '2': $percent = 40; break;
                                                            case '3': $percent = 60; break;
                                                            case '4': $percent = 80; break;
                                                            case '5': $percent = 100; break;
                                                        } ?>
                                                        <div class="rating text-center">
                                                            <p class="star-rating"><span class="width-<?=$percent?>percent"></span></p>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="price ">
                                                        <?php
                                                        if($urunbenzer['eski_fiyat']!= null){ ?>
                                                            <del><span class="price-amount"><span class="currencySymbol"><?php echo $odemeayar['simge'] ?></span><?php echo number_format($urunbenzer['eski_fiyat'], 2); ?></span></del>
                                                            <br>
                                                        <?php }?>
                                                        <?php
                                                        if($urunbenzer['fiyat']== null || $urunbenzer['fiyat']== '0')
                                                        {
                                                        } else { ?>
                                                            <ins><span class="price-amount"><span class="currencySymbol"><?php echo $odemeayar['simge'] ?></span><?php echo number_format($urunbenzer['fiyat'], 2); ?></span></ins>
                                                        <?php }?>
                                                    </div>
                                                    <div class="slide-down-box">
                                                        <p class="message"><?=$urunbenzer['spot']?></p>
                                                        <form class="product-form" method="post">
                                                            <input name="product_code" type="hidden" value="<?php echo $urunbenzer["id"]; ?>">
                                                            <div class="buttons" style="text-align:center ">
                                                                <button type="submit" class="addToCartBtn btn add-to-cart-btn">
                                                                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                                                    <?=$diller['sepete-ekle']?>
                                                                </button>
                                                                <input style="width: 30px;height: 40px;margin-left: 10px;padding: 2px;display: inline-block;margin-right: -40px;" class="form-control" type="number" min="1" max="<?=$urunbenzer['stok']?>" step="1" value="1" name="quantity">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php }
                                }
                            } ?>
                        </ul>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>
<!-- CONTENT AREA ============== !-->
<script>
    $('#entercancel').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
</script>
<!-- JAvascript Sepete Ekle Eklentileri Enter İptal !-->
<!-- Modal -->
<style>
    input[type="text"]:disabled {
        background: #FFF;
    }
    .form-control {
        border-radius: 0 !important;
        background-color: #fcfcfc;
    }
    label{
        font-family: 'Open Sans', Arial; font-size:13px; font-weight: 600;
        text-transform: uppercase;
    }
    .modal-content{border-radius: 0 !important;
        border:0 !important;
        overflow: hidden !important;
    }
    .modal-backdrop {background-color:#000; opacity: 0.7!important;}
</style>
<div class="modal fade siparisModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="post" action="includes/post/siparispost.php">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?=$diller['normal-siparis']?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputProductName"><?=$diller['siparis-urun']?></label>
                            <input type="text" name="product" class="form-control"  id="inputProductName" readonly value="<?=$urun['baslik']?> / <?=$urun['urun_kod']?>"  >
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="inputnName"><?=$diller['isim-soyisim']?></label>
                            <input type="text" name="isim" class="form-control" id="inputnName"  required >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputMail"><?=$diller['siparis-eposta']?></label>
                            <input type="email" name="eposta" class="form-control"  id="inputMail" required  >
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="inputPhone"><?=$diller['siparis-tel']?></label>
                            <input type="number" name="tel" class="form-control" id="inputPhone"  required >
                        </div>
                    </div>
                    <input type="hidden" name="siparis_id" value="<?=$urun['id']?>">
                    <input type="hidden" name="backurl" value="urun/<?=$urun['id']?>/<?=seo($urun['baslik'])?>">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputSehir"><?=$diller['siparis-sehir']?></label>
                            <input type="text" name="sehir" class="form-control"  id="inputSehir" required  >
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="inputPostaKodu"><?=$diller['siparis-postakodu']?></label>
                            <input type="text" name="postakodu" class="form-control" id="inputPostaKodu"  required >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputAdres"><?=$diller['siparis-adres']?></label>
                            <input type="text" name="adres" class="form-control"  id="inputAdres" required  >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="textareaNot"><?=$diller['siparis-not']?></label>
                            <textarea class="form-control" id="textareaNot" rows="3"  name="notlar" required></textarea>
                        </div>
                    </div>
                    <?php
                    if($ayar['site_captcha'] == 1)
                    {
                        ?>
                        <!-- GÜVENLİK CAPTCHA ========== !-->
                        <div class="form-row">
                            <?php $kod=$_SESSION['secure_code'];?>
                            <div class="form-group col-md-4 ">
                                <label for="inputCaptcha"><?=$diller['guvenlik-kodu']?></label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><img src='includes/template/captcha.php'/></div>
                                    </div>
                                    <input type="text" class="form-control form-captcha-height" id="inputCaptcha"   name="secure_code" maxlength="5" required >
                                </div>
                            </div>
                        </div>
                        <!-- GÜVENLİK CAPTCHA ========== !-->
                    <?php }?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$diller['modal-kapat']?></button>
                    <button type="submit" name="siparisgonder" class="btn btn-danger" ><?=$diller['normal-siparis-gonder']?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<?php if($_GET['status']=='success'){ ?>
    <script>
        $(document).ready(function () {
            swal({
                title: "<?=$diller['normal-siparis-basarili']?>",
                text: "<?=$diller['normal-siparis-basarili-aciklamasi']?>",
                type: "success",
                showConfirmButton: true,
                confirmButtonText:"<?=$diller['button-tamam']?>",
            });
        });
    </script>
    <meta http-equiv="refresh" content="3; URL=<?=$siteurl?>urun/<?=$id?>/<?=seo($urun['baslik'])?>">
<?php }?>
<?php if($_GET['status']=='warning'){ ?>
    <script>
        $(document).ready(function () {
            swal({
                title: "<?=$diller['post-hata']?>",
                text: "<?=$diller['post-guvenlik-kod-hata']?>",
                type: "warning",
                showConfirmButton: true,
                confirmButtonText:"<?=$diller['button-tamam']?>",
            });
        });
    </script>
    <meta http-equiv="refresh" content="3; URL=<?=$siteurl?>urun/<?=$id?>/<?=seo($urun['baslik'])?>">
<?php }?>
<?php if($_GET['status']=='critical'){ ?>
    <script>
        $(document).ready(function () {
            swal({
                title: "KRİTİK HATA!",
                text: "SMTP Ayarlarınız hatalı! Başvuru sisteme girildi ancak bildirim gönderilemedi.",
                type: "warning",
                timer: '3500',
                showConfirmButton: true,
                confirmButtonText:"<?=$diller['button-tamam']?>",
            });
        });
    </script>
    <meta http-equiv="refresh" content="3; URL=<?=$siteurl?>urun/<?=$id?>/<?=seo($urun['baslik'])?>">
<?php }?>
<?php if(isset($_SESSION['normalsiparisArray']) && $_SESSION['normalsiparisArray']['status'] == 'error'){ ?>
    <script>
        $(document).ready(function () {
            swal({
                title: "<?=$diller['post-hata']?>",
                text: "<?=$diller['form-eksik-alan']?>",
                type: "warning",
                timer: '3500',
                showConfirmButton: true,
                confirmButtonText:"<?=$diller['button-tamam']?>",
            });
        });
    </script>
    <meta http-equiv="refresh" content="3; URL=<?=$siteurl?>urun/<?=$id?>/<?=seo($urun['baslik'])?>">
    <?php unset($_SESSION['normalsiparisArray']); ?>
<?php }?>
<?php include 'includes/template/footer.php'?>
</body>
</html>
<?php include "includes/config/footer_libs.php";?>