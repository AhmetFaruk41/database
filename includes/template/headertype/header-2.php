<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<style>
    .header-main{width: <?php if($head['header_width']==1){?> 90%; <?php }else {?> 100% <?php }?>;}
</style>
<div class="header-middle biolife-sticky-object header-main <?php if($fx['durum'] == '1' ){ ?> fixing <?php } ?>" style="background-color: #<?=$head['header_menu_bg']?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-2 col-md-6 col-xs-6">
                    <a href="/" class="biolife-logo"><img src="images/logo/<?php echo $ayar['site_logo'] ?>" alt="<?php echo $ayar['site_baslik'] ?>"></a>
                </div>
                <div class="col-lg-6 col-md-7 hidden-sm hidden-xs">
                    <div class="primary-menu">
                        <ul class="menu biolife-menu clone-main-menu clone-primary-menu" id="primary-menu" data-menuname="main menu">
                            <?php foreach ($headermainmenu as $menu) {
                                $headeraltmenu=$db->prepare("select * from header_menu where ust_id='$menu[id]' and durum='1' and dil='$_SESSION[dil]' order by id desc limit 1");
                                $headeraltmenu->execute();
                                $ct = $headeraltmenu->rowCount();
                             ?>

                                <li class="menu-item <?php if($ct > 0) { ?>menu-item-has-children has-child <?php }?> <?php if($menu['mega_durum'] == 1) { ?> menu-item-has-children has-megamenu <?php }?>"><a href="<?php if($menu['url'] ==!null) {?><?php echo $menu['url'] ?><?php } else {?>javascript:(void);<?php }?>" class="font-<?php echo $head['font_weight'] ?>" style="font-size:<?php echo $head['font_size']?>"><?php echo $menu['baslik'] ?>

                                    </a>
                                    <?php
                                    if($menu['mega_durum'] == 0) {
                                        ?>


                                        <?php
                                        while ($alt = $headeraltmenu->fetch(PDO::FETCH_ASSOC)){
                                            ?>


                                            <ul class="sub-menu" >



                                                <?php
                                                $headeraltmenu=$db->prepare("select * from header_menu where ust_id='$menu[id]' and durum='1' and dil='$_SESSION[dil]' order by sira asc ");
                                                $headeraltmenu->execute();
                                                while ($alt = $headeraltmenu->fetch(PDO::FETCH_ASSOC)){
                                                     $headeraltmenu2=$db->prepare("select * from header_menu where ust_id='$alt[id]' and durum='1' and dil='$_SESSION[dil]'  order by id desc limit 1 ");
                                                        $headeraltmenu2->execute();
                                                        $ct2 = $headeraltmenu2->rowCount();
                                                    ?>
                                                <li class="menu-item <?php if($ct2 > 0) { ?>menu-item-has-children has-child <?php }?>">
                                                        <a href="<?php if($alt['url'] ==!null) {?><?php echo $alt['url'] ?><?php } else {?>javascript:(void);<?php }?>"><?php echo $alt['baslik'] ?></a>
                                                        <?php
                                                        while ($alt2 = $headeraltmenu2->fetch(PDO::FETCH_ASSOC)){
                                                            ?>
                                                            <ul class="sub-menu">

                                                                <?php
                                                                $headeraltmenu2=$db->prepare("select * from header_menu where ust_id='$alt[id]' and durum='1' and dil='$_SESSION[dil]'  order by sira asc ");
                                                                $headeraltmenu2->execute();
                                                                while ($alt2 = $headeraltmenu2->fetch(PDO::FETCH_ASSOC)){
                                                                    ?>
                                                                    <li><a href="<?php if($alt2['url'] ==!null) {?><?php echo $alt2['url'] ?><?php } else {?>javascript:(void);<?php }?>"><?php echo $alt2['baslik'] ?></a></li>
                                                                <?php }?>
                                                            </ul>
                                                        <?php }?>
                                                    </li>
                                                <?php }?>
                                            </ul>
                                        <?php }?>
                                    <?php }?>



                                    <?php
                                    if($menu['mega_durum'] == 1) {
                                        ?>
                                        <div class="wrap-megamenu lg-width-900 md-width-750">
                                            <div class="mega-content" style="display: flex">
                                                <?php

                                                $prokategoriCek=$db->prepare("select * from urun_cat where dil='$_SESSION[dil]' and durum='1' and ust_id ='0' order by sira asc limit 4");
                                                $prokategoriCek->execute();
                                                ?>
                                                <?php foreach ($prokategoriCek as $kats) {
                                                   $kategoriurunlercek=$db->prepare("select * from urun where dil='$_SESSION[dil]' and durum='1' and kat_id = '$kats[id]' limit 6");
                                                   $kategoriurunlercek->execute();
                                                   $urunCount = $kategoriurunlercek->rowCount();

                                                   if ($urunCount>0) {
                                                    while ($uruns = $kategoriurunlercek->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                    <div class="md-margin-bottom-0 xs-margin-bottom-25" style="margin-right: 25px;width: 100%;">
                                                        <div class="wrap-custom-menu vertical-menu">
                                                            <h4 class="menu-title"><?=$kats['baslik']?></h4>
                                                            <ul class="menu">
                                                                <?php 
                                                                $kategoriurunlercek=$db->prepare("select * from urun where dil='$_SESSION[dil]' and durum='1' and kat_id = '$kats[id]' limit 6");
                                                                $kategoriurunlercek->execute();
                                                                while ($uruns = $kategoriurunlercek->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                    <li><a href="urun/<?=$uruns['id']?>/<?=seo($uruns['baslik'])?>"><?=$uruns['baslik']?></a></li>
                                                                 <?php } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                <?php } 
                                                    }
                                                   }
                                                 ?>
                                            </div>
                                        </div>

                                    <?php }?>
                                </li>






                            <?php }?>
                        </ul>
                    </div>
                </div>
    <?php if ($odemeayar['sepet_sistemi'] == 1) {?>

                <div class="col-lg-3 col-md-3 col-md-6 col-xs-6">
                    <div class="biolife-cart-info">
                        <div class="minicart-block">
                            <div class="minicart-contain">
                                <a href="javascript:void(0)" class="link-to">
                                    <span class="icon-qty-combine">
                                        <i class="<?=$odemeayar['cart_icon']?>" style="color:#<?=$odemeayar['cart_color']?>;"></i>
                                        <?php
                                        if(isset($_SESSION["shopping_cart"]) && count($_SESSION["shopping_cart"]) > 0){ ?>
                                        <span class="qty" style="background-color: #<?=$odemeayar['cart_count_bg']?>; color:#<?=$odemeayar['cart_count_color']?>"><?php echo count($_SESSION["shopping_cart"]); ?></span>
                                        <?php 
                                        } else {
                                        }
                                        ?>
                                    </span>
                                    <span class="title"><?php echo $diller['sepetiniz'] ?></span>
                                    <!-- <span class="sub-total">5₺</span> -->
                                </a>
                                <div class="cart-content">
                                    <div class="cart-inner">
                                        <?php
                                        if(isset($_SESSION["shopping_cart"]) && count($_SESSION["shopping_cart"])>0) {
                                            ?>
                                            <ul class="products">
                                                <?php
                                                $total = 0;
                                                foreach($_SESSION["shopping_cart"] as $urunsession){
                                                    $urunsession_cek = $db ->prepare("select * from urun where id='$urunsession[item_id]' order by id desc limit 1");
                                                    $urunsession_cek->execute();
                                                    $urun_cek_row = $urunsession_cek->fetch(PDO::FETCH_ASSOC);
                                                    ?>
                                                    <li>
                                                        <div class="minicart-item">
                                                            <div class="thumb">
                                                                <a href="urun/<?=$urun_cek_row['id']?>/<?=seo($urun_cek_row['baslik'])?>"><img src="images/product/<?=$urun_cek_row['gorsel']?>" width="90" height="90" alt="<?=$urun_cek_row['baslik']?>"></a>
                                                            </div>
                                                            <div class="left-info">
                                                                <div class="product-title"><a href="#" class="product-name">Ekmek</a></div>
                                                                <div class="price">
                                                                    <ins><span class="price-amount"><span class="currencySymbol"><?php echo $odemeayar['simge'] ?></span><?php echo number_format($urun_cek_row['fiyat'], 2); ?> </span></ins>
                                                                </div>
                                                                <div class="qty">
                                                                    <label for="cart[<?=$urun_cek_row['id']?>][qty]">Adet:</label>
                                                                    <input type="number" class="input-qty" name="cart[<?=$urun_cek_row['id']?>][qty]" id="cart[<?=$urun_cek_row['id']?>][qty]" value="<?=$urunsession['item_quantity']?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="action">
                                                                <a href="javascript:void(0);" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                                <a href="javascript:void(0);" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        <?php } else { ?>
                                            <div style="width: 100%; height: auto; font-family: 'Open Sans', Arial; font-size:13px;  background-color: #F8F8F8; padding: 4px 0 4px 0; text-align: center;">
                                                <?=$diller['sepet-bos-aciklamasi']?>
                                            </div>
                                            <?php }?>
                                        <p class="btn-control">
                                            <a href="sepet" class="btn view-cart"><?php echo $diller['sepete-git'] ?></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-menu-toggle">
                            <a class="btn-toggle" data-object="open-mobile-menu" href="javascript:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>

