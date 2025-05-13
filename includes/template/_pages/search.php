<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$page_header_setting = $db->prepare("select * from page_header where page_id='search' order by id");
$page_header_setting->execute();
$pagehead = $page_header_setting->fetch(PDO::FETCH_ASSOC);
?>
<?php
$productsayar = $db->prepare("select * from urunmodul_ayar where id=:id");
$productsayar->execute(array(
        'id' => '1'
));
$prodayar = $productsayar->fetch(PDO::FETCH_ASSOC);
?>
<?php
$durum = $_GET['hash'];
$s = $_GET['search'];
$arama_listele = $db ->prepare("select * from urun where (baslik LIKE '%".$s."%' or icerik LIKE '%".$s."%' or tags LIKE '%".$s."%' or spot LIKE '%".$s."%' or urun_kod LIKE '%".$s."%') and dil='$_SESSION[dil]'  ");
$arama_listele->execute();
?>
<title><?php echo ucwords_tr($diller['arama-sonuclari']) ?> | <?php echo $ayar['site_baslik']?></title>
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

    .product-main-box-img .buttons .text{background-color: #<?php echo $prodayar['incele_button_back'] ?>; }
</style>
<div class="page-headers-main hero-section hero-background">
    <h1 class="page-title" style="color:#<?php echo $pagehead['text_color'] ?>"><?=$diller['arama-sonuclari']?></h1>
</div>
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="/" class="permal-link"><?php echo $diller['anasayfa'] ?></a></li>
            <li class="nav-item"><span class="current-page"><?php echo ucwords_tr($diller['arama-sonuclari']) ?></span></li>
        </ul>
    </nav>
</div>
<div class="page-contain category-page left-sidebar">
    <div class="container">
        <div class="row">
            <div id="main-content" class="main-content col-lg-12">
                <div class="product-category grid-style">
                    <div class="row">
                        <ul class="products-list">
                            <?php 
                            if ($arama_listele->rowCount() > 0 && isset($durum)) {

                             foreach ($arama_listele as $ara) {
                                $pro_list_cat = $db->prepare("select * from urun_cat where id=:id and durum=:durum and dil=:dil order by id desc limit 1 ");
                                $pro_list_cat->execute(array(
                                    'id' => $ara['kat_id'],
                                    'durum' => '1',
                                    'dil' => $_SESSION['dil']
                                ));
                                $pro_cat = $pro_list_cat->fetch(PDO::FETCH_ASSOC);
                                ?>
                                <li class="product-item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                    <div class="contain-product layout-default">
                                        <div class="product-thumb">
                                            <a href="urun/<?php echo $ara['id'] ?>/<?php echo seo($ara['baslik']) ?>" class="link-to-product">
                                                <img src="images/product/<?php echo $ara['gorsel'] ?>" alt="<?php echo $ara['baslik'] ?>" style="width:270px;height:270px;object-fit: contain" class="product-thumnail">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <b class="categories"> <?php echo $pro_cat['baslik'] ?></b>
                                            <h4 class="product-title"><a class="pr-name" href="urun/<?php echo $ara['id'] ?>/<?php echo seo($ara['baslik']) ?>"><?php echo $ara['baslik'] ?></a></h4>
                                            <?php if($prodayar['star_rate'] == 1) {?>
                                                <?php
                                                switch ($ara['star_rate']) {
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
                                                if($ara['eski_fiyat']!= null){ ?>
                                                    <del><span class="price-amount"><span class="currencySymbol"><?php echo $odemeayar['simge'] ?></span><?php echo number_format($ara['eski_fiyat'], 2); ?></span></del>
                                                    <br>
                                                <?php }?>
                                                <?php
                                                if($ara['fiyat']== null || $ara['fiyat']== '0')
                                                {
                                                } else { ?>
                                                    <ins><span class="price-amount"><span class="currencySymbol"><?php echo $odemeayar['simge'] ?></span><?php echo number_format($ara['fiyat'], 2); ?></span></ins>
                                                <?php }?>
                                            </div>
                                            <div class="slide-down-box">
                                                <p class="message"><?=$ara['spot']?></p>
                                                <form class="product-form" method="post">
                                                    <input name="product_code" type="hidden" value="<?php echo $ara["id"]; ?>">
                                                    <div class="buttons" style="text-align:center ">
                                                        <button type="submit" class="addToCartBtn btn add-to-cart-btn">
                                                            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                                            <?=$diller['sepete-ekle']?>
                                                        </button>
                                                        <input style="width: 30px;height: 40px;margin-left: 10px;padding: 2px;display: inline-block;margin-right: -40px;" class="form-control" type="number" min="1" max="<?=$ara['stok']?>" step="1" value="1" name="quantity">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php }
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/template/footer.php'?>
</body>
    </html>
<?php include "includes/config/footer_libs.php";?>

