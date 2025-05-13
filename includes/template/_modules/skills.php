<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$beceriAyar = $db->prepare("select * from beceri_ayar where id='1'");
$beceriAyar->execute();
$beceriset = $beceriAyar->fetch(PDO::FETCH_ASSOC);
?>
<?php
$SkillCek = $db->prepare("select * from beceri where durum='1' and dil='$_SESSION[dil]' order by sira ASC");
$SkillCek->execute();
?>
<style>
    .skill-home-main-div{width:<?php if($beceriset['width']==1){?> 90%; <?php }else {?> 100% <?php }?> ; height: auto; overflow: hidden; background-color: #<?php echo $beceriset['back_color'] ?>; padding: <?php echo $beceriset['padding'] ?>px 0 <?php echo $beceriset['padding'] ?>px 0; }
    .progress-bar{
        background-color: #<?=$beceriset['bar_sub_bg']?> !important;
    }
    .skill-box-ust,
    .skill-box-ust span{
        color: #<?=$beceriset['bar_text_color']?>;
    }
    .progress-bar > span{
        background: #<?=$beceriset['bar_bg']?>;
    }
</style>


<div class="skill-home-main-div">

    <div class="modules-header-main">
        <div class="modules-header-main-head" style="background:url(images/<?php echo $beceriset['divider'] ?>.png) no-repeat center bottom;">
            <div class="modules-header-main-baslik font-open-sans font-<?php echo $beceriset['font_weight'] ?> font-spacing" style="color:#<?php echo $beceriset['baslik_color'] ?>">
                <?php echo $diller['beceri']?>
            </div>
            <div class="modules-header-main-spot font-raleway font-light" style="color:#<?php echo $beceriset['spot_color'] ?>; letter-spacing: 0.07em">
                <?php echo $diller['beceri-aciklamasi']?>
            </div>
        </div>
    </div>

    <div class="skill-home-main-div-inside counters">

        <?php if ($SkillCek->rowCount() >0) { ?>

       <?php foreach ($SkillCek as $skill) { ?>
                <div class="skill-box">
                    <div class="skill-box-ust font-spacing">
                        <strong><?php echo $skill['baslik'] ?></strong>
                        <span>%<?php echo $skill['oran'] ?></span>

                    </div>
                    <div class="skill-box-alt">
                        <div class="progress-bar">
                            <span data-percent="<?php echo $skill['oran'] ?>"></span>
                        </div>
                    </div>
                </div>
        <?php } ?>

        <?php } else { ?>



        <?php } ?>



    </div>
</div>
