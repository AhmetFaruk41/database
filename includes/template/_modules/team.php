<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?><?php
$ekipsettings = $db->prepare("select * from ekip_ayar where id='1'");
$ekipsettings->execute();
$ekipset = $ekipsettings->fetch(PDO::FETCH_ASSOC);
$ekiplimit = $ekipset["ekip_limit"];

$num = 1;
$ekip_listele = $db->prepare("select * from ekip where durum='1' and dil='$_SESSION[dil]' order by sira asc limit $ekiplimit");
$ekip_listele->execute();


?>

<style>
    .ekip-home-main-div{width:<?php if($ekipset['width']==1){?> 90%; <?php }else {?> 100% <?php }?> ; height: auto; overflow: hidden; background-color: #<?php echo $ekipset['back_color'] ?>; padding: <?php echo $ekipset['padding'] ?>px 0 <?php echo $ekipset['padding'] ?>px 0; }


</style>


<div class="ekip-home-main-div">

    <div class="modules-header-main">
        <div class="modules-header-main-head" style="background:url(images/<?php echo $ekipset['divider'] ?>.png) no-repeat center bottom;">
            <div class="modules-header-main-baslik font-open-sans font-<?php echo $ekipset['font_weight'] ?> font-spacing" style="color:#<?php echo $ekipset['baslik_color'] ?>">
                <?php echo $diller['ekip']?>
            </div>
            <div class="modules-header-main-spot font-raleway font-light" style="color:#<?php echo $ekipset['spot_color'] ?>; letter-spacing: 0.07em">
                <?php echo $diller['ekip-aciklamasi']?>
            </div>
        </div>
    </div>

    <div class="ekip-home-main-div-inside counters">

        <?php if ($ekip_listele->rowCount() > 0 ) { ?>

<?php foreach ($ekip_listele as $ekip) { ?>
        <div class="ekip-box" data-appear-animation="fadeInUp" data-appear-animation-delay="<?php echo $num++ ?>00">
            <div class="ekip-box-img">
                <img src="images/team/<?php echo $ekip['gorsel'] ?>" alt="<?php echo $ekip['isim'] ?>">
            </div>
            <div class="ekip-box-name">
                <?php echo $ekip['isim'] ?>
            </div>
            <div class="ekip-box-position">
                <?php echo $ekip['pozisyon'] ?>
            </div>
            <?php
            if($ekip['mail'] == !null || $ekip['tel'] == !null) {
            ?>
            <div class="ekip-box-mail-phone">
                <?php if($ekip['mail'] == null) { } else {?>
                <p><?php echo $ekip['mail'] ?></p>
                <?php }?>
                <?php if($ekip['tel'] == null) { } else {?>
                    <p><?php echo $ekip['tel'] ?></p>
                <?php }?>
            </div>
            <?php }?>

            <?php
            $ekipsosyalcount = $db->prepare("select * from ekip_sosyal where ekip_id='$ekip[id]' order by sira asc");
            $ekipsosyalcount->execute();

            if($ekipsosyalcount->rowCount() > 0) {
            ?>
            <div class="ekip-social-area">
                <?php
                $ekip_sosyal = $db->prepare("select * from ekip_sosyal where ekip_id='$ekip[id]' order by sira asc");
                $ekip_sosyal->execute();
                while($sos = $ekip_sosyal->fetch(PDO::FETCH_ASSOC))
                {
                ?><a href="<?php echo $sos['url'] ?>" target="_blank"><i class="fa <?php echo $sos['icon'] ?>" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="<?php echo $sos['baslik'] ?>"></i></a><?php }?>
            </div>
            <?php }?>
        </div>
<?php }?>

        <?php } else { ?>

            <div class="ekip-box" data-appear-animation="fadeInUp" data-appear-animation-delay="300">
                <div class="ekip-box-img">
                    <img src="http://www.fpoimg.com/250x256" alt="NoImage">
                </div>
                <div class="ekip-box-name">
                    Ekip Eklenmemiş!
                </div>
                <div class="ekip-box-position" style="width: 80%; margin: 0 auto;">
                    Lütfen firmanızdaki ekibinizle ilgili eklemeler yapınız.
                </div>

            </div>

        <?php } ?>




    </div>
</div>
