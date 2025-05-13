<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?><?php
$urun_modul_settings = $db->prepare("select * from urunmodul_ayar where id='1'");
$urun_modul_settings->execute();
$urunset = $urun_modul_settings->fetch(PDO::FETCH_ASSOC);

$urunkat_listele = $db->prepare("select * from urun_cat where dil='$_SESSION[dil]' and durum='1' and ust_id='0' order by sira asc");
$urunkat_listele->execute();

$urunkat_listeleMobile = $db->prepare("select * from urun_cat where dil='$_SESSION[dil]' and durum='1' and ust_id='0' order by sira asc");
$urunkat_listeleMobile->execute();

$urun_populer_list = $db->prepare("select * from urun where dil='$_SESSION[dil]' and durum='1' order by hit desc limit 4");
$urun_populer_list->execute();
?>
<?php $hashOlusturrandom = rand(0,(int) 9999999999999);?>
<style>

    .products-leftmenu {
        width: 306px;
        font-family:'Open Sans', sans-serif;
        position: relative;
        background-color: #<?=$urunset['detay_altmenu_bg']?>;
        padding: 0;
    }
    .products-leftmenu a, .products-leftmenu a:link, .products-leftmenu a:visited, .products-leftmenu a:focus, span {
        color: #<?=$urunset['detay_altmenu_textcolor']?>;
        text-decoration: none;
    }

    .products-leftmenu > li {
        display: block;
        border-bottom: 1px solid #<?=$urunset['detay_altmenu_border']?>;
        font-weight: 400;
        font-size: 13px;
        height: 38px; overflow: hidden;

    }
    .products-leftmenu > li > a {
        display: block;
        padding: 9px 12px 18px 12px;
    }
    .products-leftmenu > li > a i{font-size:15px; margin-top: 2px }
    .products-leftmenu > li:hover > a {
        color: #<?=$urunset['detay_altmenu_hovertextcolor']?>;
    }

    .products-leftmenu > li:hover > a i {
        color: #<?=$urunset['detay_altmenu_hovertextcolor']?>;
    }



    .products-leftmenu > li:hover {
        background-color: #<?=$urunset['detay_altmenu_hover']?>;
    }
    /* Megadrop width dropdown */
    .products-leftmenu > li > .megadrop {
        opacity: 0;
        visibility: hidden;
        position: absolute;
        list-style: none;
        left: 306px;
        min-width: 255px;
        height: auto;
        text-align: left;
        margin-top:30px;
        padding: 0;
        z-index: 99;
        overflow: hidden;

        <?php if($urunset['detay_altmenu_megashadow'] == 1) { ?>
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        <?php } ?>

        border:1px solid #<?=$urunset['detay_altmenu_megaborder']?>;
        background: #FFF;


    }
    .products-leftmenu > li:hover .megadrop {
        opacity: 1;
        visibility: visible;
        margin-top: -47px;
    }
    .products-leftmenu ul li:hover:after {
        color: #227087;
    }

    .products-leftmenu > li > ul li ul, .products-leftmenu li >ul li, .products-leftmenu > li > .megadrop, .products-leftmenu > li > ul, .products-leftmenu > li {
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -ms-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
    }
    .dropdown-subcat-box{width: 310px; height: 82px; overflow: hidden; margin: 20px; display: inline-block; vertical-align: top; }
    .dropdown-subcat-box-img{width:150px; height: 82px; overflow: hidden; display: inline-block; vertical-align: middle; margin-right: 14px;}
    .dropdown-subcat-box-img img{min-width:150px; max-width: 180px; min-height: 82px; transition: 0.2s ease-in-out 0s; }
    .dropdown-subcat-box:hover .dropdown-subcat-box-img img{transform: scale(1.1)}
    .dropdown-subcat-box-name{width:132px; height: auto; overflow: hidden; display: inline-block; vertical-align: middle; font-family: 'Open Sans',Arial; font-size:15px; line-height: 23px;}

    .dropdown-subcat-link-box{width: 100%; height: auto; background:#<?=$urunset['detay_altmenu_bg']?>; border-bottom: 1px solid #<?=$urunset['detay_altmenu_border']?>; padding: 10px 12px 8px 12px; overflow: hidden; transition: .1s ease-in-out 0s; font-family: 'Open Sans',Arial; font-size:13px;}
    .dropdown-subcat-link-box:hover{background: #<?=$urunset['detay_altmenu_hover']?>; }
    .dropdown-subcat-link-box:last-child{border-bottom: 0;}
    .dropdown-subcat-link-box i{margin-top: 2px; font-size:14px;}
    .megadrop > .dropdown-subcat-link-box a{color:#<?=$urunset['detay_altmenu_textcolor']?> !important;}
    .megadrop > .dropdown-subcat-link-box a i{color:#<?=$urunset['detay_altmenu_textcolor']?> !important;}
    .dropdown-subcat-link-box:hover a{color:#<?=$urunset['detay_altmenu_hovertextcolor']?> !important;}
    .dropdown-subcat-link-box:hover a i{color:#<?=$urunset['detay_altmenu_hovertextcolor']?> !important;}


     /* MOBIL GORUNUM KATEGORİLER */
    .mobile-controls { background:#FFF; border:1px solid #EBEBEB; width:100%;  }
    .mobile-controls button {background:none; color:#000; border:0px; outline:none; width: 100%; text-align: left; padding: 0 15px 0 15px;height:39px;  font-family:'Open Sans',Serif; font-size:14px; font-weight:600; }
    .mobile-controls button i {   margin-right: 10px;}
    .mobile-controls .back-button { display:none; }
    .mobile-menu {display:none;   height:auto;      position:relative; padding-top: 15px; background-color: #<?=$urunset['detay_altmenu_bg']?> }
    .mobile-menu ul { margin:0;   padding: 0;  position: relative; overflow: hidden;  width: 100%;   transition: 0.25s; }


    .specs-accordion {width: 100%; height: auto;}
    .specs-accordion .specs-heading {
        display: block;
        padding: 12px 10px 12px 10px;
        background-color: #<?=$urunset['detay_altmenu_bg']?>;
        color: #<?=$urunset['detay_altmenu_textcolor']?>; font-family: 'Open Sans', Arial; font-size:14px;
        position: relative; border-bottom:1px solid #<?=$urunset['detay_altmenu_border']?>;
    }
    .specs-heading i{margin-right: 10px;}
    .specs-accordion .specs-heading-sub {
        display: block;
        padding: 12px 10px 12px 35px;
        background-color: #<?=$urunset['detay_altmenu_bg']?>;
        color: #<?=$urunset['detay_altmenu_textcolor']?>; font-family: 'Open Sans', Arial; font-size:13px;
        position: relative; border-bottom:1px dashed #<?=$urunset['detay_altmenu_border']?>;
    }
    .specs-heading-sub i{margin-right: 10px;}
    .specs-accordion .trigger { position: absolute;   top: 9px;  right: 10px;  border: 1px solid #EBEBEB; color:#333;  background: #F8F8F8;  outline: 0; font-size:24px; }
    .specs-icons{width: 25px; display: inline-block; text-align: center}
    .specs-icons i{font-size:15px !important;}

    .fa-chevron-down{
        transform: rotate(0deg);
        transition: transform .02s linear;
    }

    .fa-chevron-down.open{
        transform: rotate(180deg);
        transition: transform 0.2s linear;
    }

</style>

<aside id="sidebar" class="sidebar col-lg-3 col-md-4 col-sm-12 col-xs-12">
    <div class="biolife-mobile-panels">
        <a class="biolife-close-btn" href="#" data-object="open-mobile-filter">&times;</a>
    </div>
    <div class="sidebar-contain">
        <div class="widget biolife-filter">
            <h4 class="wgt-title"> <?=$diller['urun-kategorileri']?></h4>
            <div class="wgt-content">
                <ul class="cat-list">

                    <?php foreach ($urunkat_listele as $urunkat) {
                        $urun_alt_kat=$db->prepare("select * from urun_cat where ust_id='$urunkat[id]' and dil='$_SESSION[dil]' and durum='1' order by sira asc");
                        $urun_alt_kat->execute();

                        ?>
                            <li class="cat-list-item">
                                <a href="urun-kategori/<?=$urunkat['id']?>/<?=seo($urunkat['baslik'])?>" class="cat-link">
                                   <?php if($urunkat['icon'] == !null) { ?>
                                    <span style="float:left; width: 30px;"><i class="fa <?=$urunkat['icon']?>"></i></span>
                                <?php }?>
                                <?=$urunkat['baslik']?>
                                </a>
                            </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="widget biolife-filter">

            <?php if($urunset['detay_arama'] == 1) { ?>
                <div class="products-left-bar-div-box" style="background: #F8F8F8; padding-top: 15px; padding-bottom: 25px; display: block !important;">
                    <h4 class="wgt-title"> <?=$diller['urun-arayin']?></h4>

                    <div class="products-left-bar-search-div">
                        <form method="get" action="urunara?search=" >
                            <input type="text" name="search" required placeholder="<?=$diller['urun-ara-input-aciklama']?>" style="width: 70%">
                            <input type="hidden" name="hash" value="<?=md5(sha1($hashOlusturrandom));?><?=md5(sha1($hashOlusturrandom));?>">
                            <button class="btn" style="width: 30%;float: right;height: 40px;"><?=$diller['urun-ara-button-yazi']?></button>
                        </form>
                    </div>


                </div>
            <?php } ?>
        </div>

        <div class="widget biolife-filter">
            <h4 class="wgt-title"> <?=$diller['populer-urunler']?></h4>
            <div class="wgt-content">
                <ul class="products">
                    <?php foreach ($urun_populer_list as $populerurun) { ?>
                    <li class="pr-item">
                        <div class="contain-product style-widget">
                            <div class="product-thumb">
                                <a href="urun/<?php echo $populerurun['id'] ?>/<?php echo seo($populerurun['baslik']) ?>" class="link-to-product" tabindex="0">
                                    <img src="images/product/<?=$populerurun['gorsel']?>" alt="<?=$populerurun['baslik']?>" width="270" height="270" class="product-thumnail">
                                </a>
                            </div>
                            <div class="info">
                                <?php 
                                $urun_cat_sec = $db->prepare("select * from urun_cat where dil='$_SESSION[dil]' and durum='1' and ust_id='0' and id = '$populerurun[kat_id]' order by sira asc");
                                $urun_cat_sec->execute();
                                $uruns_cat = $urun_cat_sec->fetch(PDO::FETCH_ASSOC);
                                 ?>
                                <b class="categories"><a href="urun-kategori/<?=$uruns_cat['id']?>/<?=seo($uruns_cat['baslik'])?>"><?=$uruns_cat['baslik']?></a></b>
                                <h4 class="product-title"><a href="urun/<?php echo $populerurun['id'] ?>/<?php echo seo($populerurun['baslik']) ?>" class="pr-name" tabindex="0"><?=$populerurun['baslik']?></a></h4>
                                <div class="price">
                                    <?php
                                    if($populerurun['fiyat']== null || $populerurun['fiyat']== '0')
                                    {
                                    } else { ?>
                                    <ins><span class="price-amount"><span class="currencySymbol"><?php echo $odemeayar['simge'] ?></span><?php echo number_format($populerurun['fiyat'], 2); ?></span></ins>
                                    <?php }?>
                                    <?php
                                    if($populerurun['eski_fiyat']== null)
                                    {
                                    } else { ?>
                                        <del><span class="price-amount"><span class="currencySymbol"><?php echo $odemeayar['simge'] ?></span><?php echo number_format($populerurun['eski_fiyat'], 2); ?></span></del>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </li>
                   <?php } ?>
                </ul>
            </div>
        </div>
    </div>

</aside>
