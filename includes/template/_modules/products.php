<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?><?php
$productsayar = $db->prepare("select * from urunmodul_ayar where id='1'");
$productsayar->execute();
$prodayar = $productsayar->fetch(PDO::FETCH_ASSOC);
$tablimit = $prodayar["tab_limit"];
$gruplimit = $prodayar["urun_grup_limit"];
$urunlimit = $prodayar["tab_urun_limit"];
?>
<?php
$productcat = $db->prepare("select * from urun_cat where dil='$_SESSION[dil]' and anasayfa='1' and ust_id='0' and durum='1' order by sira asc limit $tablimit");
$productcat ->execute();

$productcat2 = $db->prepare("select * from urun_cat where dil='$_SESSION[dil]' and anasayfa='1' and ust_id='0' and durum='1' order by sira asc limit $tablimit");
$productcat2 ->execute();
?>
<?php
$product_list_new = $db->prepare("select * from urun where durum='1' and dil='$_SESSION[dil]' order by id desc limit $urunlimit");
$product_list_new ->execute();

$product_list_populer = $db->prepare("select * from urun where durum='1' and dil='$_SESSION[dil]' order by hit desc limit $urunlimit");
$product_list_populer ->execute();
?>
<style>
    .products-home-main-div{width:<?php if($prodayar['width']==1){?> 90%; <?php }else {?> 100% <?php }?> ; height: auto; overflow: hidden; background-color: #<?php echo $prodayar['back_color'] ?>; padding: <?php echo $prodayar['padding'] ?>px 0 <?php echo $prodayar['padding'] ?>px 0; }

    .product-main-box-img .buttons .text{background-color: #<?php echo $prodayar['incele_button_back'] ?>; }


    .product_tabs {  width: 100%; height: auto; margin: 0 auto; text-align: center; overflow: hidden; padding: 0; padding: 5px 0 35px 0; }
    .product_tabs li { display: inline-block;  height: auto;  }
    .product_tabs li a {
        outline: none; font-size: <?php echo $prodayar['tab_font_size'] ?>; font-family: 'Open Sans', Arial; font-weight: 500;
        padding: 5px 15px 5px 15px;
        text-decoration: none;
        border:1px solid #<?php echo $prodayar['back_color'] ?>;
        border-radius:<?php echo $prodayar['tab_border_radius'] ?>px ;
        background: #<?php echo $prodayar['back_color'] ?>;
        color: #<?php echo $prodayar['tab_text_color'] ?>;
    }
    .product_tabs li .active { position: relative;  }
    .product_tabs li a.active { font-weight: bold;  border:1px solid #<?php echo $prodayar['tab_border_color'] ?>;  background: #<?php echo $prodayar['tab_back_color'] ?>; color: #<?php echo $prodayar['tab_act_text_color'] ?>;}

    .product_tabs_content{width: 100%; margin: 0 auto; display: none}


</style>

<?php
if($prodayar['populer'] == 1) { ?>
    <div class="wrap-category xs-margin-top-80px">
        <div class="container">
            <div class="biolife-title-box style-02 xs-margin-bottom-33px">
                <span class="subtitle"><?=date('Y');?></span>
                <h3 class="main-title"><?php echo $diller['top-urunler']?></h3>
                <p class="desc"><?php echo $diller['top-urunler-aciklamasi']?></p>
            </div>
            <?php if($product_list_populer->rowCount() > 0) { ?>
                <ul class="biolife-carousel nav-center-bold nav-none-on-mobile" data-slick='{"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 3}},{"breakpoint":992, "settings":{ "slidesToShow": 3}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}}, {"breakpoint":500, "settings":{ "slidesToShow": 1}}]}'>

                   <?php foreach ($product_list_populer as $prohit) {

                    $pro_list_cat = $db->prepare("select * from urun_cat where id='$prohit[kat_id]' and durum='1' and dil='$_SESSION[dil]' order by id desc limit 1 ");
                    $pro_list_cat->execute();
                    $pro_cat = $pro_list_cat->fetch(PDO::FETCH_ASSOC);

                    ?>
                    <?php
                    if($prohit['stok'] > 0) {
                        ?>
                        <li>
                            <div class="biolife-cat-box-item">
                                <div class="cat-thumb">
                                    <a href="urun/<?php echo $prohit['id'] ?>/<?php echo seo($prohit['baslik']) ?>" class="cat-link">
                                        <img src="images/product/<?php echo $prohit['gorsel'] ?>" style="width:277px;height:185px;object-fit:contain;" alt="<?php echo $prohit['baslik'] ?>">
                                    </a>
                                </div>
                                <a class="cat-info" href="urun/<?php echo $prohit['id'] ?>/<?php echo seo($prohit['baslik']) ?>">
                                    <h4 class="cat-name"><?=$prohit['baslik']?></h4>
                                    <span class="cat-number">(<?=$pro_cat['baslik']?>)</span>
                                </a>
                            </div>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
</div>
<?php } ?>

<div class="product-tab z-index-20 sm-margin-top-59px xs-margin-top-20px" style="margin-bottom: 7em"> 
    <div class="container">
        <div class="biolife-title-box slim-item">
            <span class="subtitle"><?php echo $diller['urunlerimiz-aciklamasi']?></span>
            <h3 class="main-title"><?php echo $diller['urunlerimiz']?></h3>
        </div>
        <div class="biolife-tab biolife-tab-contain sm-margin-top-23px">
            <div class="tab-head tab-head__sample-layout">
                <ul class="tabs">
                    <?php
                    if($prodayar['yeni'] == 1) { ?>
                        <li class="tab-element active">
                            <a class="tab-link" href="#yeni"><?php echo $diller['yeni'] ?></a>
                        </li>
                    <?php } ?>
                    <?php foreach ($productcat as $procats) {   ?>
                        <li class="tab-element">
                            <a class="tab-link" href="#<?php echo $procats['id'] ?>"><?php echo $procats['baslik'] ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="tab-content">
                <?php
                if($prodayar['yeni'] == 1) { ?>
                <div id="yeni" class="tab-contain active">
                    <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain" data-slick='{"rows":1 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":20 }},{"breakpoint":768, "settings":{ "slidesToShow": 2,"rows":2, "slidesMargin":15 }}]}'>

                        <?php foreach ($product_list_new as $pronew) {

                            $pro_list_cat = $db->prepare("select * from urun_cat where id='$pronew[kat_id]' and durum='1' and dil='$_SESSION[dil]' order by id desc limit 1 ");
                            $pro_list_cat->execute();
                            $pro_cat = $pro_list_cat->fetch(PDO::FETCH_ASSOC);

                            ?>

                            <?php
                            if($pronew['stok'] > 0) {
                                ?>

                        <li class="product-item">
                            <div class="contain-product layout-default">
                                <div class="product-thumb">
                                    <a href="urun/<?php echo $pronew['id'] ?>/<?php echo seo($pronew['baslik']) ?>" class="link-to-product">
                                        <img src="images/product/<?php echo $pronew['gorsel'] ?>" alt="<?php echo $pronew['baslik'] ?>" style="width:270px;height:270px;object-fit: contain" class="product-thumnail">
                                    </a>
                                </div>
                                <div class="info">
                                    <b class="categories"> <?php echo $pro_cat['baslik'] ?></b>

                                    <h4 class="product-title"><a class="pr-name" href="urun/<?php echo $pronew['id'] ?>/<?php echo seo($pronew['baslik']) ?>"><?php echo $pronew['baslik'] ?></a></h4>
                                    <?php if($prodayar['star_rate'] == 1) {?>

                                        <?php 
                                        switch ($pronew['star_rate']) {
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
                                    if($pronew['eski_fiyat']!= null){ ?>
                                        <del><span class="price-amount"><span class="currencySymbol"><?php echo $odemeayar['simge'] ?></span><?php echo number_format($pronew['eski_fiyat'], 2); ?></span></del>
                                        <br>
                                    <?php }?>
                                    <?php
                                    if($pronew['fiyat']== null || $pronew['fiyat']== '0')
                                    {
                                    } else { ?>
                                        <ins><span class="price-amount"><span class="currencySymbol"><?php echo $odemeayar['simge'] ?></span><?php echo number_format($pronew['fiyat'], 2); ?></span></ins>
                                    <?php }?>
                                    </div>
                                    <div class="slide-down-box">
                                        <p class="message"><?=$pronew['spot']?></p>
                                        <form class="product-form" method="post">
                                            <input name="product_code" type="hidden" value="<?php echo $prohit["id"]; ?>">
                                            <div class="buttons" style="text-align:center ">
                                                <button type="submit" class="addToCartBtn btn add-to-cart-btn">
                                                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                                    <?=$diller['sepete-ekle']?>
                                                </button>
                                                <input style="width: 30px;height: 40px;margin-left: 10px;padding: 2px;display: inline-block;margin-right: -40px;" class="form-control" type="number" min="1" max="<?=$prohit['stok']?>" step="1" value="1" name="quantity">
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
                <?php } ?>
                <?php foreach ($productcat2 as $procats2) {
                    $cat_ids = $procats2['id']; ?>
                    <div id="<?=$cat_ids?>" class="tab-contain">
                        <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain" data-slick='{"rows":1 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":20 }},{"breakpoint":768, "settings":{ "slidesToShow": 2,"rows":2, "slidesMargin":15 }}]}'>

                            <?php
                            $newcatlisturun = $db->prepare("SELECT * FROM urun WHERE durum='1' and dil='$_SESSION[dil]' and kat_id IN (
                              SELECT id FROM urun_cat  WHERE id = $cat_ids OR ust_id = $cat_ids) order by id desc limit $urunlimit");
                            $newcatlisturun ->execute();
                            while($urunrow = $newcatlisturun->fetch(PDO::FETCH_ASSOC)){

                                $kat_list_son = $db->prepare("select * from urun_cat where id='$urunrow[kat_id]' and durum='1' and dil='$_SESSION[dil]' order by id desc limit 1 ");
                                $kat_list_son->execute();
                                $row_kat = $kat_list_son->fetch(PDO::FETCH_ASSOC);


                                ?>

                                <?php
                                if($urunrow['stok'] > 0) {
                                    ?>

                                    <li class="product-item">
                                        <div class="contain-product layout-default">
                                            <div class="product-thumb">
                                                <a href="urun/<?php echo $urunrow['id'] ?>/<?php echo seo($urunrow['baslik']) ?>" class="link-to-product">
                                                    <img src="images/product/<?php echo $urunrow['gorsel'] ?>" alt="<?php echo $urunrow['baslik'] ?>" style="width:270px;height:270px;object-fit: contain" class="product-thumnail">
                                                </a>
                                            </div>
                                            <div class="info">
                                                <p class="star-rating"><span class="width-80percent"></span></p>
                                                <b class="categories"> <?php echo $row_kat['baslik'] ?></b>

                                                <h4 class="product-title"><a class="pr-name" href="urun/<?php echo $urunrow['id'] ?>/<?php echo seo($urunrow['baslik']) ?>"><?php echo $urunrow['baslik'] ?></a></h4>

                                                <div class="price ">
                                                    <?php
                                                    if($urunrow['eski_fiyat']!= null){ ?>
                                                        <del><span class="price-amount"><span class="currencySymbol"><?php echo $odemeayar['simge'] ?></span><?php echo number_format($urunrow['eski_fiyat'], 2); ?></span></del>
                                                        <br>
                                                    <?php }?>
                                                    <?php
                                                    if($urunrow['fiyat']== null || $urunrow['fiyat']== '0')
                                                    {
                                                    } else { ?>
                                                        <ins><span class="price-amount"><span class="currencySymbol"><?php echo $odemeayar['simge'] ?></span><?php echo number_format($urunrow['fiyat'], 2); ?></span></ins>
                                                    <?php }?>
                                                </div>
                                                <div class="slide-down-box">
                                                    <p class="message"><?=$urunrow['spot']?></p>
                                                    <form class="product-form" method="post">
                                                        <input name="product_code" type="hidden" value="<?php echo $urunrow["id"]; ?>">
                                                        <input type="hidden" min="1" max="<?=$urunrow['stok']?>" step="1" value="1" name="quantity">
                                                        <div class="buttons" style="text-align:center ">
                                                            <button type="submit" class="addToCartBtn btn add-to-cart-btn">
                                                                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                                                <?=$diller['sepete-ekle']?>
                                                            </button>
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
                <?php } ?>



            </div>
        </div>
    </div>
</div>



