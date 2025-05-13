<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?><link rel="stylesheet" href="assets/css/filter-isotope/isotope.css">

<?php
$projesettings = $db->prepare("select * from proje_ayar where id='1'");
$projesettings->execute();
$proset = $projesettings->fetch(PDO::FETCH_ASSOC);
$projelimit = $proset["proje_limit"];



$proje_cat_list = $db->prepare("select * from proje_kat where durum='1' and dil='$_SESSION[dil]' and anasayfa='1' order by sira asc");
$proje_cat_list->execute();
?>

<style>
    .proje-home-main-div{width:<?php if($proset['width']==1){?> 90%; <?php }else {?> 100% <?php }?> ; height: auto; overflow: hidden; background-color: #<?php echo $proset['back_color'] ?>; padding: <?php echo $proset['padding'] ?>px 0 <?php echo $proset['padding'] ?>px 0; }
    .filter-button{color:#<?php echo $proset['tab_text_color'] ?>; background: #<?php echo $proset['tab_color'] ?>; font-size:<?php echo $proset['tab_font_size'] ?>; border-radius:<?php echo $proset['tab_border_radius'] ?>px; }
    .filter-button.is-checked{color:#<?php echo $proset['tab_act_text_color'] ?>; background: #<?php echo $proset['tab_active_color'] ?>;}
    .project-item-text{ background: #<?php echo $proset['pro_text_bg'] ?>}
    .project-item-img{border-radius:<?php echo $proset['border_radius'] ?>px; }

</style>


<div class="proje-home-main-div">

    <div class="modules-header-main-product-group">
        <div class="modules-header-main-head" style="background:url(images/<?php echo $proset['divider'] ?>.png) no-repeat center bottom;">
            <div class="modules-header-main-baslik font-open-sans font-<?php echo $proset['font_weight'] ?> font-spacing" style="color:#<?php echo $proset['baslik_color'] ?>">
                <?php echo $diller['proje']?>
            </div>
            <div class="modules-header-main-spot font-raleway font-light" style="color:#<?php echo $proset['spot_color'] ?>; letter-spacing: 0.07em">
                <?php echo $diller['proje-aciklamasi']?>
            </div>
        </div>
    </div>

    <div class="proje-home-main-div-inside counters">



        <div class="button-group filters-button-group" >

            <button class="filter-button is-checked" data-filter="*"><?php echo $diller['proje-tumu']; ?></button>

<?php foreach ($proje_cat_list as $prokat) {?>
            <button class="filter-button" data-filter=".<?php echo $prokat['id'] ?>"><?php echo $prokat['baslik'] ?></button>
<?php } ?>

        </div>


        <div class="filter-project-grid">


            <?php

            $sql_projeler = $db->prepare("select * from proje where durum='1' and dil='$_SESSION[dil]' order by id desc limit $projelimit");
            $sql_projeler->execute();
            while($proje = $sql_projeler->fetch(PDO::FETCH_ASSOC))
            {

            ?>


            <div class="project-item <?php echo $proje['kat_id'] ?>" >
                <div class="project-item-img">

                    <?php if($proset['detay_url'] == 1) {?>
                    <a href="proje/<?php echo $proje['id']?>/<?php echo seo($proje['baslik']) ?>" >
                    <?php }?>
                        <img src="images/projects/<?php echo $proje['gorsel'] ?>" alt="<?php echo $proje['baslik'] ?>">
                     <?php if($proset['detay_url'] == 1) {?>
                    </a>
                <?php }?>
                </div>
                <div class="project-item-text">
                    <?php if($proset['detay_url'] == 1) {?>
                    <a href="proje/<?php echo $proje['id']?>/<?php echo seo($proje['baslik']) ?>" style="color:#<?php echo $proset['pro_text_color'] ?>;">
                        <?php }?>
                        <?php echo $proje['baslik'] ?>
                    <?php if($proset['detay_url'] == 1) {?>
                    </a>
                    <?php }?>
                </div>
            </div>

            <?php }?>




        </div>




    </div>
</div>
