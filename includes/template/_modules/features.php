<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?><?php
$ozelliksettings = $db->prepare("select * from ozellik_ayar where id='1'");
$ozelliksettings->execute();
$ozellikset = $ozelliksettings->fetch(PDO::FETCH_ASSOC);
$ozelliklimit = $ozellikset["ozellik_limit"];

$num = 1;
$ozellik_listele = $db->prepare("select * from ozellik where durum='1' and dil='$_SESSION[dil]' and anasayfa='1' order by sira asc limit $ozelliklimit");
$ozellik_listele->execute();


?>

<style>
    .ozellik-home-main-div{width:<?php if($ozellikset['width']==1){?> 90%; <?php }else {?> 100% <?php }?> ; height: auto; overflow: hidden; background-color: #<?php echo $ozellikset['back_color'] ?>; padding: 0 0 <?php echo $ozellikset['padding'] ?>px 0; }
    .features-main-header{background-color: #<?php echo $ozellikset['head_color'] ?>; }
    .features-bottom-arrow{position: absolute; left:50%; margin-top: 0px}
    .features-bottom-arrow i{font-size:90px; color:#<?php echo $ozellikset['head_color'] ?>;}
</style>
<div class="product-tab z-index-20 sm-margin-top-59px xs-margin-top-20px">
    <div class="container">
        <div class="biolife-title-box slim-item">
            <span class="subtitle"><?php echo $diller['ozellik-aciklamasi']?></span>
            <h3 class="main-title"><?php echo $diller['ozellik']?></h3>
        </div>
        <?php if ($ozellik_listele->rowCount() > 0) { ?>
            <div class="biolife-service type01 biolife-service__type01 xs-margin-top-60px sm-margin-top-45px">
                <ul class="services-list">
                    <?php foreach ($ozellik_listele as $oz) { ?>
                        <li>
                            <div class="service-inner color-reverse">
                                <span class="number">
                                    <i class="fa <?php echo $oz['icon']?>" ></i>
                                </span>
                                <span class="biolife-icon icon-beer" >
                                    <?php echo $oz['baslik']?>
                                </span>
                                <p class="srv-name" ><?php echo $oz['spot']?></p>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
    </div>
</div>

