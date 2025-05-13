<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?><?php
$aboutayar = $db->prepare("select * from about_ayar where id='1'");
$aboutayar->execute();
$aboutset = $aboutayar->fetch(PDO::FETCH_ASSOC);

$about_Cek = $db->prepare("select * from about_page where dil='$_SESSION[dil]' order by id desc ");
$about_Cek->execute();
$aboutrow = $about_Cek->fetch(PDO::FETCH_ASSOC);


?>

<style>
    .abouts-home-main-div{width:<?php if($aboutset['width']==1){?> 90%; <?php }else {?> 100% <?php }?> ; height: auto; overflow: hidden; background-color: #<?php echo $aboutset['back_color'] ?>; padding: <?php echo $aboutset['padding'] ?>px 0 <?php echo $aboutset['padding'] ?>px 0; }


</style>


<div class="abouts-home-main-div">

    <div class="modules-header-about" >
        <div class="modules-header-main-head" style="background:url(images/<?php echo $aboutset['divider'] ?>.png) no-repeat center bottom;">
            <div class="modules-header-main-baslik font-open-sans font-<?php echo $aboutset['font_weight'] ?> font-spacing" style="color:#<?php echo $aboutset['baslik_color'] ?>">
                <?php echo $aboutrow['baslik']?>
            </div>
        </div>
    </div>

    <div class="abouts-home-main-div-inside counters" style="color:#<?php echo $aboutset['text_color'] ?>">
        <?php echo $aboutrow['spot']?>
        <br><br>
        <a href="kurumsal/<?=$aboutrow['seo_url']?>" class="btn btn-sm btn-<?php echo $aboutset['button_bg'] ?>"><?=$diller['modul-hakkimizda-devami']?></a>
        <br><br>
    </div>
</div>
