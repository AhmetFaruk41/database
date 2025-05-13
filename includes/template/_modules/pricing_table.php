<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?><?php
$pricingayar = $db->prepare("select * from pricing_ayar where id='1'");
$pricingayar->execute();
$pric = $pricingayar->fetch(PDO::FETCH_ASSOC);
?>
<?php
$num = 1;
$pricing_liste = $db->prepare("select * from pricing where durum='1' and dil='$_SESSION[dil]' order by sira asc ");
$pricing_liste->execute();


?>
<style>
    .pricing-home-main-div{width:<?php if($pric['width']==1){?> 90%; <?php }else {?> 100% <?php }?> ; height: auto; overflow: hidden; background-color: #<?php echo $pric['back_color'] ?>; padding: <?php echo $pric['padding'] ?>px 0 <?php echo $pric['padding'] ?>px 0; }
</style>


<div class="pricing-home-main-div">

    <div class="modules-header-main">
        <div class="modules-header-main-head" style="background:url(images/<?php echo $pric['divider'] ?>.png) no-repeat center bottom;">
            <div class="modules-header-main-baslik font-open-sans font-<?php echo $pric['font_weight'] ?> font-spacing" style="color:#<?php echo $pric['baslik_color'] ?>">
                <?php echo $diller['pricing-table']?>
            </div>
            <div class="modules-header-main-spot font-raleway font-light" style="color:#<?php echo $serv['spot_color'] ?>; letter-spacing: 0.07em">
                <?php echo $diller['pricing-aciklamasi']?>
            </div>
        </div>
    </div>

    <div class="pricing-home-main-div-inside counters">


<?php if ($pricing_liste->rowCount() > 0) { ?>

    <?php foreach ( $pricing_liste as $pricing) { ?>

        <div class="pricing-box" data-appear-animation="fadeInUp" data-appear-animation-delay="<?php echo $num++ ?>00" <?php if($pricing['tavsiye'] ==1) {?> style="border:3px solid #<?php echo $pric['tavsiye_color'] ?>; border-radius: 4px 4px 0 0;" <?php } ?>>

            <?php if($pricing['tavsiye'] ==1) {?>

                <div class="pricing-tavsiye-board" style="background: #<?php echo $pric['tavsiye_color'] ?>; color:#<?php echo $pric['tavsiye_text_color'] ?>">
                    <?php echo $diller['pricing-tavsiye'] ?>
                </div>

            <?php } ?>


            <div class="pricing-box-icon">
                <i class="fa <?php echo $pricing['icon'] ?>" style="color:#<?php echo $pric['icon_color'] ?>"></i>
            </div>
            <div class="pricing-box-head <?php echo $pric['text_size'] ?> <?php echo $pric['text_weight'] ?>" style="color:#<?php echo $pric['text_color'] ?>; <?php if($pricing['fiyat'] == null) { ?>border-bottom:1px solid #EBEBEB<?php }?> ">
                <?php echo $pricing['baslik'] ?>
            </div>
            <?php if($pricing['fiyat'] == !null) { ?>
            <div class="pricing-box-price">
                <span class="pricing-price-span"><?php echo $pricing['fiyat'] ?> <?php echo $odemeayar['simge'] ?></span>
                <span class="pricing-price-date-span"><?php echo $pricing['odeme_date'] ?></span>
            </div>
            <?php }?>
            <?php
            $pricing_ozellikler = $db->prepare("select * from pricing_ozellik where pr_id='$pricing[id]' and dil='$_SESSION[dil]' order by sira asc ");
            $pricing_ozellikler->execute();
            while($prozellik = $pricing_ozellikler->fetch(PDO::FETCH_ASSOC))
            {
            ?>

            <div class="pricing-box-ozellik">
                <span style="color:#<?php echo $pric['ozellik_color'] ?>"><?php echo $prozellik['baslik'] ?></span>
            </div>

            <?php }?>

            <?php
            if($pricing['url']==null){

            } else {
            ?>
            <div class="pricing-box-button">

                <a href="<?php echo $pricing['url'] ?>">
                <div class="pricing-box-button-button font-light"
                     style="
                     <?php if($pricing['tavsiye'] ==1) {?>
                             color:#<?php echo $pric['tavsiye_text_color'] ?>; background: #<?php echo $pric['tavsiye_color'] ?>
                             <?php } else {?>
                             color:#<?php echo $pric['button_text_color'] ?>; background: #<?php echo $pric['button_bg'] ?>
                             <?php }?>
                             ">
                    <?php echo $diller['pricing-button-yazisi']; ?>
                </div>
                </a>

            </div>
            <?php } ?>


        </div>

    <?php }?>

        <?php } else { ?>

        <div class="pricing-box" data-appear-animation="fadeInUp" data-appear-animation-delay="300" style="padding: 50px">

           <strong> HİÇ TABLO EKLENMEMİŞ!</strong>
            <br> <br>
            <span class="font-13 font-small font-open-sans" style="color:#666; ">Panelinizden yeni tablolar oluşturabilirsiniz</span>

        </div>

        <?php } ?>

    </div>


</div>