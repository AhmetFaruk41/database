<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php //** Cart Calc */
include "includes/func/calc.php";
?>
<?php
$page_header_setting = $db->prepare("select * from page_header where page_id='cart' order by id");
$page_header_setting->execute();
$pagehead = $page_header_setting->fetch(PDO::FETCH_ASSOC);
?>
<title><?php echo ucwords_tr($diller['sepetiniz']) ?> | <?php echo $ayar['site_baslik']?></title>
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
</style>

<div class="page-headers-main hero-section hero-background">
    <h1 class="page-title" style="color:#<?php echo $pagehead['text_color'] ?>"> <?php echo ucwords_tr($diller['sepetiniz']) ?></h1>
</div>
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="/" class="permal-link"><?php echo $diller['anasayfa'] ?></a></li>
            <li class="nav-item"><span class="current-page"><?php echo ucwords_tr($diller['sepetiniz']) ?></span></li>
        </ul>
    </nav>
</div>
<div class="page-contain shopping-cart">
    <div id="main-content" class="main-content">
        <div class="container">
           <?php
           if(isset($_SESSION["shopping_cart"]) && count($_SESSION["shopping_cart"])>0) {
            ?>
            <?php if ($odemeayar['sepet_step'] == 1 ){ ?>
             <div class="checkout-progress-wrap">
                <ul class="steps">
                    <li class="step 1st">
                        <div class="checkout-act active">
                            <h3 class="title-box"><span class="number">1</span><?=$diller['sepetiniz']?></h3>
                            <div class="box-content">
                                <div class="shopping-cart-container">
                                    <div class="row">
                                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                            <form class="shopping-cart-form" action="#" method="post">
                                                <table class="shop_table cart-form">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-name"><?=$diller['sepet-urun']?></th>
                                                            <th class="product-price"><?=$diller['sepet-birim-fiyat']?></th>
                                                            <th class="product-quantity"><?=$diller['sepet-adet']?></th>
                                                            <th class="product-subtotal"><?=$diller['sepet-toplam-1']?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $total = 0;
                                                        foreach($_SESSION["shopping_cart"] as $product){
                                                            $sayi = 1;

                                                            $uruncek = $db ->prepare("select * from urun where id=:id order by id desc limit 1");
                                                            $uruncek->execute(array(
                                                                'id' => $product['item_id']
                                                            ));
                                                            $urun = $uruncek->fetch(PDO::FETCH_ASSOC);

                                                            $varyantlar = $db->prepare("select * from varyant where urun_id=:urun_id ");
                                                            $varyantlar->execute(array(
                                                                'urun_id' => $product['item_id']
                                                            ));

                                                            ?>
                                                            <tr class="cart_item">
                                                                <td class="product-thumbnail" data-title="Product Name">
                                                                    <a class="prd-thumb" href="urun/<?=$urun['id']?>/<?=seo($urun['baslik'])?>" target="_blank">
                                                                        <figure><img width="113" height="113" src="images/product/<?=$urun['gorsel']?>" alt="<?=$urun['baslik']?>"></figure>
                                                                    </a>
                                                                    <a class="prd-name" href="urun/<?=$urun['id']?>/<?=seo($urun['baslik'])?>"><?=$urun['baslik']?></a>
                                                                    <div class="action">
                                                                     <?php
                                                                     if($varyantlar->rowCount()>0) {

                                                                        $metin = $product['var'];
                                                                        $sonuc = str_replace(',', '<span style="padding-left:5px; padding-right: 5px">-</span>', $metin);

                                                                        ?>
                                                                        <span style="display: block;margin-bottom: 1em;font-size: 10px;font-weight: 600;"><?=$sonuc?></span>
                                                                        <br>
                                                                    <?php } ?>
                                                                    <!-- <a href="#" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> -->
                                                                    <a class="remove remove-item" href="#" data-code="<?php echo $product['group_id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                                </div>
                                                            </td>
                                                            <td class="product-price" data-title="Price">
                                                                <div class="price price-contain">
                                                                    <ins><span class="price-amount"><span class="currencySymbol"><?php echo $odemeayar['simge'] ?></span><?php echo number_format($urun['fiyat'], 2); ?></span></ins>
                                                                    <!-- <del><span class="price-amount"><span class="currencySymbol"><?php echo $odemeayar['simge'] ?></span>95.00</span></del> -->
                                                                </div>
                                                                <?php if ($urun['kdv'] == 1) {
                                                                    $kdvtutar = $urun['fiyat'] * $urun['kdv_oran'] / 100;
                                                                    $toplamkdvtutar_item = $urun['fiyat'] * $urun['kdv_oran'] / 100 * $product['item_quantity'];
                                                                    ?>
                                                                    <div class="cart-left-box-2-other-info">%<?=$urun['kdv_oran']?> <?=$diller['kdv']?> : <?php echo number_format($kdvtutar, 2); ?> TL</div>

                                                                <?php }?>
                                                            </td>
                                                            <td class="product-quantity" data-title="Quantity">
                                                                <div class="quantity-box type1">
                                                                    <div class="qty-input">,
                                                                        <input type="text" name="qty12554" value="<?=$product['item_quantity']?>" data-step="1">
                                                                        <a href="#" class="qty-btn btn-up plus-quantity" data-code="<?php echo $product['group_id']; ?>"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                                                                        <a href="#" class="qty-btn btn-down minus-quantity" data-code="<?php echo $product['group_id']; ?>"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="product-subtotal" data-title="Total">
                                                                <div class="price price-contain">
                                                                 <?php
                                                                 $adetlifiyat = $urun['fiyat'] * $product['item_quantity'];
                                                                 ?>
                                                                 <ins><span class="price-amount"><span class="currencySymbol"><?php echo $odemeayar['simge'] ?></span><?php echo number_format($adetlifiyat, 2); ?></span></ins>
                                                             </div>
                                                         </td>
                                                     </tr>
                                                 <?php } ?>
                                                 <tr class="cart_item wrap-buttons">
                                                    <td class="wrap-btn-control" colspan="4">
                                                        <a href="urunler" class="btn back-to-shop">Alışverişe Devam Et</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                    <div class="shpcart-subtotal-block">
                                        <h3> <?=$diller['sepet-toplam-2']?></h3>
                                        <div class="subtotal-line">
                                            <b class="stt-name"> <?=$diller['ara-toplam']?></b>
                                            <span class="stt-price"><?php echo $odemeayar['simge'] ?><?php echo number_format($aratoplam, 2); ?></span>
                                        </div>
                                        <?php if($kdvtoplam >0) {?>
                                            <div class="subtotal-line">
                                                <b class="stt-name"><?=$diller['kdv']?></b>
                                                <span class="stt-price"><?php echo $odemeayar['simge'] ?><?php echo number_format($kdvtoplam, 2); ?></span>
                                            </div>
                                        <?php }?>
                                        <?php if($kargotoplam >0 && $odemeayar['kargo_sistemi'] == 1 ) {?>
                                            <div class="subtotal-line">
                                                <b class="stt-name"><?=$diller['kargo-bedeli']?></b>
                                                <span class="stt-price"><?php echo $odemeayar['simge'] ?><?php echo number_format($kargotoplam, 2); ?></span>
                                            </div>
                                        <?php } ?>
                                        <div class="subtotal-line">
                                            <b class="stt-name"><?=$diller['sepet-toplam-1']?></b>
                                            <span class="stt-price"><?php echo $odemeayar['simge'] ?><?php echo number_format($odenecektoplam, 2); ?></span>
                                        </div>
                                        <div class="btn-checkout">
                                            <a href="teslimat" class="btn checkout" >
                                                <?=$diller['sepet-ilerle-button']?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="step 2nd">
                        <div class="checkout-act">
                            <h3 class="title-box"><span class="number">2</span><?=$diller['teslimat-ve-odeme']?></h3>
                        </div>
                    </li>
                    <li class="step 3rd">
                        <div class="checkout-act">
                            <h3 class="title-box"><span class="number">3</span><?=$diller['odeme-bilgileri']?></h3>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    <?php }?>
        </div>
    </div>
<?php } ?>
</div>

<?php include 'includes/template/footer.php'?>
</body>
</html>
<?php include "includes/config/footer_libs.php";?>

