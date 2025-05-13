<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$headerayar=$db->prepare("SELECT * from header_ayar where id='1'");
$headerayar->execute();
$head = $headerayar->fetch(PDO::FETCH_ASSOC);
$headerlimit = $head['header_limit'];
?>
<?php
$sosyalcon=$db->prepare("SELECT * from sosyal order by sira asc");
$sosyalcon->execute();
$sosyalmobile=$db->prepare("SELECT * from sosyal order by sira asc");
$sosyalmobile->execute();
?>
<?php
$headermainmenu=$db->prepare("SELECT * from header_menu where ust_id='0' and durum='1' and dil='$_SESSION[dil]' order by sira asc limit $headerlimit");
$headermainmenu->execute();
?>
<?php
$telmetin = $ayar['site_tel'];
$telsonuc = str_replace(' ', '', $telmetin);

$gsmmetin = $ayar['site_gsm'];
$gsmsonuc = str_replace(' ', '', $gsmmetin);


$whtmetin = $ayar['site_whatsapp'];
$whtsonuc1 = str_replace('90', '+90 ', $whtmetin);
$whtsonuc2 = str_replace(' ', '', $whtmetin);

$fixedmenu = $db->prepare("select * from sabit_header where id=:id ");
$fixedmenu->execute(array(
    'id' => '1',
));
$fx = $fixedmenu->fetch(PDO::FETCH_ASSOC);
?>
<?php $hashOlusturrandom = rand(0,(int) 9999999999999);?>
<style>
    .header-ust-bar-main{padding: <?php echo $head['padding'] ?>px 0 <?php echo $head['padding'] ?>px 0; background-color: #<?php echo $head['back_color'] ?> ; width: <?php if($head['topheader_width']==1){?> 90%; <?php }else {?> 100% <?php }?>; border-bottom: 1px solid #<?php echo $head['border_color'] ?>;}
    .header-ust-bar-right-table-ic-box i{color:#<?php echo $head['icon_color'] ?>}
    .header-ust-bar-right-table-ic-box p{color:#<?php echo $head['text_color'] ?>}
    .header-ust-bar-left-table-ic a{color:#<?php echo $head['icon_color'] ?>}
    .top-level-menu > li:hover {background:#<?php echo $head['menu_hover_color'] ?>}
    .mega-level-menu{border-top:2px solid #<?php echo $head['menu_hover_color'] ?>;}
    .mega-level-menu:after{border-bottom-color:#<?php echo $head['menu_hover_color'] ?>;}
    .second-level-menu{border-top:2px solid #<?php echo $head['menu_hover_color'] ?>;}
    .second-level-menu:after {border-bottom-color:#<?php echo $head['menu_hover_color'] ?>;}
    .third-level-menu{border-top:2px solid #<?php echo $head['menu_hover_color'] ?>;}
    .top-level-menu > li span{color:#<?php echo $head['menu_text_color'] ?>}
    .top-level-menu > li:hover span{color:#<?php echo $head['menu_text_hover_color'] ?>}
    .kargo-limit-header{/* width: <?php if($odemeayar['kargolimit_width']==1){?> 90%; <?php }else {?> 100% <?php }?>; */ height: auto; margin: 0 auto; padding:5px 0;  background: linear-gradient(to right, #<?=$odemeayar['kargolimit_bg_1']?>, #<?=$odemeayar['kargolimit_bg_2']?>); }


</style>
<header id="header" class="header-area style-01 layout-04">
     <?php
     $headertopdurum = $db->prepare("SELECT * from header_ayar where id='1' and durum='1'");
     $headertopdurum->execute();
     while($h = $headertopdurum->fetch(PDO::FETCH_ASSOC)){
        ?>
        <div class="header-top bg-main hidden-xs">
        <div class="container">
            <div class="top-bar left">
                <ul class="horizontal-menu">
                    <?php
                    $headersosyaldurum = $db->prepare("SELECT * from header_ayar where id='1' and tel='1'");
                    $headersosyaldurum->execute();
                    while($h = $headersosyaldurum->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <li><a href="tel:<?=$telsonuc?>" style="text-decoration: none; color:#<?php echo $head['text_color'] ?>" class="font-<?php echo $h['font']?>"><i class="fa fa-phone" aria-hidden="true"></i><?php echo $ayar['site_tel'] ?></a></li>
                    <?php } ?>
                    <!-- <?php if($head['tel_2'] == 1) { ?>
                        <li><a href="tel:<?=$gsmsonuc?>" style="text-decoration: none; color:#<?php echo $head['text_color'] ?>" class="font-<?php echo $h['font']?>"><i class="fa fa-mobile" aria-hidden="true"></i><?php echo $ayar['site_gsm'] ?></a></li>
                    <?php }?> -->
                    <!-- <?php
                    $headersosyaldurum = $db->prepare("SELECT * from header_ayar where id='1' and whatsapp='1'");
                    $headersosyaldurum->execute();
                    while($h = $headersosyaldurum->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <li><a href="https://api.whatsapp.com/send?phone=<?=$whtsonuc2?>&text=Merhaba&source=&data=" target="_blank"  style="text-decoration: none; color:#<?php echo $head['text_color'] ?>" class="font-<?php echo $h['font']?>"><i class="fa fa-mobile" aria-hidden="true"></i><?php echo $whtsonuc1 ?></a></li>
                    <?php } ?> -->
                    <?php
                        $headersosyaldurum = $db->prepare("SELECT * from header_ayar where id='1' and mail='1'");
                        $headersosyaldurum->execute();
                        while($h = $headersosyaldurum->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <li><a href="mailto:<?=$ayar['site_mail']?>" style="text-decoration: none; color:#<?php echo $head['text_color'] ?>" class="font-<?php echo $h['font']?>"><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo $ayar['site_mail'] ?></a></li>

                        <?php } ?>
                    <?php if ($odemeayar['kargolimit_header'] == 1) {?>
                        <?php if( $odemeayar['kargo_limit'] == 0 || $odemeayar['kargo_limit'] == null ) {} else { ?>
                    <li class="kargo-limit-header"><a href="javascript:void(0);" style="color:#<?=$odemeayar['kargolimit_text_color']?>"><?php echo number_format($odemeayar['kargo_limit'], 2); ?> <?php echo $odemeayar['simge'] ?></strong> <?=$diller['kargo-limit-aciklamasi']?></a></li>
                <?php }}?>
                </ul>
            </div>

           
            <div class="top-bar right">
                <ul class="social-list">
                   <?php
                   $headersosyaldurum = $db->prepare("SELECT * from header_ayar where id='1' and sosyal='1'");
                   $headersosyaldurum->execute();
                   while($h = $headersosyaldurum->fetch(PDO::FETCH_ASSOC)){
                    ?>

                    <?php foreach ($sosyalcon as $sosyal){ ?>
                        <li><a href="<?php echo $sosyal['url']?>" target="_blank" title="<?php echo $sosyal['baslik'] ?>"><i class="fa <?php echo $sosyal['icon']?>" aria-hidden="true"></i></a></li>
                    <?php } } ?>
                </ul>
                <!-- <ul class="horizontal-menu">
                    <li><a href="#" class="login-link"><i class="biolife-icon icon-login"></i>Giriş Yap / Kayıt Ol</a></li>
                </ul> -->
            </div>
        </div>
    </div>
    <?php } ?>
        <!-- MAIN HEADER WEB  ============================ !-->
        <?php
        if ($head['header_tip'] == 1) {
            include'headertype/header-1.php';
        }
        if ($head['header_tip'] == 2) {
            include "headertype/header-2.php";
        }
        ?>
</header>

<?php 
// if($fx['durum'] == '1' ) {?>
    <!-- Fixed header !-->
    <?php
     // include 'headertype/fixed_header.php'; ?>

    <!-- Fixed header SON !-->
<?php 
// }?>