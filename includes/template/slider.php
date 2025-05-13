<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$sliderayar = $db->prepare("select * from slider_ayar where id='1'");
$sliderayar ->execute();
$slidayar = $sliderayar->fetch(PDO::FETCH_ASSOC);
?>
<?php
$slider = $db->prepare("select * from slider where dil='$_SESSION[dil]' and durum='1' and tur='1' order by sira asc");
$slider->execute();

?>


<style>
    .swiper-container {
        width: <?php if($slidayar['width']==1){?> 90%; <?php }else {?> 100% <?php }?>; margin: 0px auto;
        height: <?php if($slidayar['height']==1){?> 660px; <?php }else {?> 800px <?php }?>;
    }
    .swiper-slide {
        text-align: center;
        font-size: 18px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        align-items: center;

        background-size: 200% 100% !important;

    }
    .swiper-pagination-bullet-active {background: #FFF; width: 12px; height: 12px;}
    .swiper-pagination-bullet { width: 12px; height: 12px;}

    /* iphone 5s ==========================================
    *****************************************************************************/
    @media screen and (max-width:321px) and (min-width:0px) {
        .swiper-container {
            width: 100% !important; margin: 0px auto;
            height: <?=$slidayar['mobil_height']?>px !important;
        }

    }
    /*** iphone X - S5 vs ==========================================
    *****************************************************************************/
    @media screen and (max-width:410px) and (min-width:321px) {
        .swiper-container {
            width: 100% !important; margin: 0px auto;
            height: <?=$slidayar['mobil_height']?>px !important;
        }

    }
    /* Pixel 2 - iphone plus ==========================================
    *****************************************************************************/
    @media screen and (max-width:767px) and (min-width:410px) {
        .swiper-container {
            width: 100% !important; margin: 0px auto;
            height: <?=$slidayar['mobil_height']?>px !important;
        }
    }
    /* Ipad Pro*/
    @media screen and (max-width:1100px) and (min-width:1023px) {
        .swiper-container {
            height: <?php if($slidayar['height']==1){?> 500px;
                <?php }else {?> 660px <?php }?>;
            }
        }

        @media screen and (max-width:1023px) and (min-width:767px) {
            /* Ipad */
            .swiper-container {
                height: <?php if($slidayar['height']==1){?> 430px;
                    <?php }else {?> 600px <?php }?>;
                }
            }

    /* RESPONSIVE ENDING ==========================================
    *****************************************************************************/
    @media screen and (max-width:1440px) and (min-width:1101px) {
        .swiper-container{ height: <?php if($slidayar['height']==1){?> 520px; <?php }else {?> 680px <?php }?>; }
    }
    @media screen and (max-width:1600px) and (min-width:1441px) {
        .swiper-container{ height: <?php if($slidayar['height']==1){?> 550px; <?php }else {?> 750px <?php }?>; }
    }
    @media screen and (max-width:1680px) and (min-width:1601px) {
        .swiper-container{ height: <?php if($slidayar['height']==1){?> 580px; <?php }else {?> 750px <?php }?>; }
    }



    .slider-font-type-baslik{ font-family: '<?php echo $slidayar['font'] ?>', sans-serif; font-size:47px; font-weight: 800;line-height: normal; letter-spacing: 0.04em; margin-bottom: 20px; }
    .slider-font-type-spot{ font-family: '<?php echo $slidayar['font'] ?>', sans-serif; font-size:20px; font-weight: 500;line-height: normal; letter-spacing: 0.01em; margin-bottom: 20px; }
    .slider-button-type{font-size:14px; font-family: '<?php echo $slidayar['font'] ?>', sans-serif; font-weight:800; letter-spacing: 0.05em ; margin-top:40px; padding: 12px 40px 12px 40px}
    .slider-button-type-2{font-size:14px; font-family: '<?php echo $slidayar['font'] ?>', sans-serif; font-weight:800; letter-spacing: 0.05em ; margin-top:40px; padding: 12px 40px 12px 40px}
</style>

<?php
if($slider->rowCount() > 0) { ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 hidden-sm hidden-xs">
                <div class="biolife-vertical-menu none-box-shadow  ">
                    <div class="vertical-menu vertical-category-block always ">
                        <div class="block-title">
                            <span class="menu-icon">
                                <span class="line-1"></span>
                                <span class="line-2"></span>
                                <span class="line-3"></span>
                            </span>
                            <span class="menu-title">Tüm Kategoriler</span>
                            <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                        </div>
                        <div class="wrap-menu">
                            <ul class="menu clone-main-menu">
                                <?php

                                $prokategoriCek=$db->prepare("select * from urun_cat where dil='$_SESSION[dil]' and durum='1' and ust_id ='0'  order by sira asc limit 10");
                                $prokategoriCek->execute();
                                ?>
                                <?php foreach ($prokategoriCek as $kats) {
                                   $kategoriurunlercek=$db->prepare("select * from urun where dil='$_SESSION[dil]' and durum='1' and kat_id = '$kats[id]'");
                                   $kategoriurunlercek->execute();
                                   $urunCount = $kategoriurunlercek->rowCount();

                                   if ($urunCount>0) {
                                    while ($uruns = $kategoriurunlercek->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <li class="menu-item menu-item-has-children has-child">
                                            <a href="urun-kategori/<?=$kats['id']?>/<?=seo($kats['baslik'])?>" class="menu-name" data-title="<?=$kats['baslik']?>"><img src="images/product-category/<?=$kats['gorsel']?>" alt="" width="24" height="24" style="margin-right:5px"><?=$kats['baslik']?></a>
                                            <ul class="sub-menu">
                                                <?php
                                                $kategoriurunlercek=$db->prepare("select * from urun where dil='$_SESSION[dil]' and durum='1' and kat_id = '$kats[id]' limit 6");
                                                $kategoriurunlercek->execute();
                                                while ($uruns = $kategoriurunlercek->fetch(PDO::FETCH_ASSOC)) { ?>
                                                    <li><a href="urun/<?=$uruns['id']?>/<?=seo($uruns['baslik'])?>"><?=$uruns['baslik']?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php }
                                    }
                            } ?>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12">
                        <div class="main-slide block-slider nav-change hover-main-color type02">
                            <ul class="biolife-carousel" data-slick='{"arrows": true, "dots": false, "slidesMargin": 0, "slidesToShow": 1, "infinite": true, "speed": 800}' >
                                <?php foreach ($slider as $row) { ?>

                                    <li>
                                        <div class="slide-contain slider-opt04__layout01 light-version first-slide">
                                            <img src="images/slider/<?php echo $row['gorsel']; ?>" alt="">
                                            <div class="text-content" style="color:#<?php echo $row['text_bg'] ?>; " data-aos="<?php echo $row['baslik_animation'] ?>" data-aos-offset="200" data-aos-delay="50"   data-aos-duration="1000" >
                                                <!-- <i class="first-line">Öne Çıkan</i> -->
                                                <h3 class="second-line"><?php echo $row['baslik']; ?></h3>
                                                <p class="third-line"><?php echo $row['spot']; ?></p>
                                                <?php if($row['url'] == null) {

                                                } else { ?>
                                                    <p class="buttons" data-aos="<?php echo $row['button_animation'] ?>" data-aos-offset="200" data-aos-delay="50"   data-aos-duration="1500" >
                                                        <a href="<?php echo $row['url'] ?>" class="btn btn-bold"><?php echo $row['button_text']; ?></a>
                                                    </p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <!--Block 02: Banners-->
            <div class="banner-block sm-margin-bottom-57px xs-margin-top-80px sm-margin-top-30px">
                <div class="container">
                    <ul class="biolife-carousel nav-center-bold nav-none-on-mobile" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":3, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 3}},{"breakpoint":992, "settings":{ "slidesToShow": 2}},{"breakpoint":768, "settings":{ "slidesToShow": 2}}, {"breakpoint":500, "settings":{ "slidesToShow": 1}}]}'>
                        <?php 
                        $kategoriCek=$db->prepare("select * from urun_cat where dil='$_SESSION[dil]' and durum='1' and ust_id ='0'  order by sira asc limit 3");
                        $kategoriCek->execute();
                        foreach ($kategoriCek as $kats) {
                           $katUrunCek=$db->prepare("select * from urun where dil='$_SESSION[dil]' and durum='1' and kat_id = '$kats[id]' LIMIT 1");
                           $katUrunCek->execute();
                           while($uruns = $katUrunCek->fetch(PDO::FETCH_ASSOC)){;
                            ?>
                            <li>
                                <div class="biolife-banner biolife-banner__style-08">
                                    <div class="banner-contain">
                                        <?php 
                                        $katUrunCek=$db->prepare("select * from urun where dil='$_SESSION[dil]' and durum='1' and kat_id = '$kats[id]' LIMIT 1");
                                        $katUrunCek->execute();
                                        $uruns = $katUrunCek->fetch(PDO::FETCH_ASSOC);
                                         ?>
                                        <div class="media">
                                            <a href="urun/<?=$uruns['id']?>/<?=seo($uruns['baslik'])?>" class="bn-link"><img src="images/product/<?=$uruns['gorsel']?>" width="193" height="185" alt=""></a>
                                        </div>
                                        <div class="text-content">
                                            <span class="text1"><?=$kats['baslik']?></span>
                                            <b class="text2"><?=$uruns['baslik']?></b>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
<?php } ?>

