<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$page_header_setting = $db->prepare("select * from page_header where page_id='proje' order by id");
$page_header_setting->execute();
$pagehead = $page_header_setting->fetch(PDO::FETCH_ASSOC);

$projesettings = $db->prepare("select * from proje_ayar where id=:id");
$projesettings->execute(
        array(
                'id' => '1'
        )
);
$proset = $projesettings->fetch(PDO::FETCH_ASSOC);

$proje_cat_list = $db->prepare("select * from proje_kat where durum=:durum and dil=:dil order by sira asc");
$proje_cat_list->execute(array(
        'durum' => '1',
        'dil' => $_SESSION['dil']
));
?>
<title><?php echo ucwords_tr($diller['proje']) ?> | <?php echo $ayar['site_baslik']?></title>
<meta name="description" content="<?php echo"$proset[meta_desc]" ?>">
<meta name="keywords" content="<?php echo"$proset[tags]" ?>">
<meta name="news_keywords" content="<?php echo"$proset[tags]" ?>">
<meta name="author" content="<?php echo"$ayar[site_baslik]" ?>" />
<meta itemprop="author" content="<?php echo"$ayar[site_baslik]" ?>" />
<meta name="robots" content="index follow">
<meta name="googlebot" content="index follow">
<meta property="og:type" content="website" />

<?php include "includes/config/header_libs.php";?>
<link rel="stylesheet" href="assets/css/filter-isotope/isotope.css">
</head>
<body>
<?php include 'includes/template/pre-loader.php'?>
<?php include 'includes/template/header.php'?>


<!-- Page Header ====================== !-->
<style>

    .page-headers-main{width:<?php if($pagehead['width']==1){?> 90%; <?php }else {?> 100% <?php }?> ;  padding:<?php echo $pagehead['padding'] ?>px 0 <?php echo $pagehead['padding'] ?>px 0 ; border:1px solid #<?php echo $pagehead['border_color'] ?>;

        <?php if($pagehead['shadow'] == 1 ) {?>

        -webkit-box-shadow: inset 0px 5px 10px -7px rgba(0,0,0,0.1);
        -moz-box-shadow: inset 0px 5px 10px -7px rgba(0,0,0,0.1);
        box-shadow: inset 0px 5px 10px -7px rgba(0,0,0,0.1);

        <?php } ?>

        <?php if($pagehead['tip'] == 0 ) {?>

        background:#<?php echo $pagehead['bg_color'] ?> ;

        <?php } ?>

        <?php if($pagehead['tip'] == 1 ) {?>

        background:url(images/uploads/<?php echo $pagehead['bg_image'] ?>) ;

        box-shadow: inset 5000px 0 0 0 rgba(0, 0, 0, 0.7); border-color: rgba(0, 0, 0, 1);

        <?php } ?>

    }
    .filter-button{color:#<?php echo $proset['tab_text_color'] ?>; background: #<?php echo $proset['tab_color'] ?>; font-size:<?php echo $proset['tab_font_size'] ?>; border-radius:<?php echo $proset['tab_border_radius'] ?>px; }
    .filter-button.is-checked{color:#<?php echo $proset['tab_act_text_color'] ?>; background: #<?php echo $proset['tab_active_color'] ?>;}
    .project-item-text{ background: #<?php echo $proset['pro_text_bg'] ?>}
    .project-item-img{border-radius:<?php echo $proset['border_radius'] ?>px; }
</style>
<div class="page-headers-main">
    <div class="page-headers-main-in">
        <div class="page-headers-main-left font-raleway font-18 font-small font-spacing" style="color:#<?php echo $pagehead['text_color'] ?>;">

            <?php echo ucwords_tr($diller['proje']) ?>

        </div><div class="page-headers-main-right font-raleway font-12 font-spacing">

            <span style="color:#<?php echo $pagehead['pasif_text_color'] ?>; padding-right: 15px;"><?php echo $diller['buradasiniz'] ?>:</span>
            <a href="index.html" style="color:#<?php echo $pagehead['text_color'] ?>;"><span style="padding-right: 15px;  font-weight: 600"><?php echo $diller['anasayfa'] ?></span></a>
            <span style="color:#<?php echo $pagehead['pasif_text_color'] ?>; padding-right: 15px;">/</span>
            <span style="padding-right: 15px; color:#<?php echo $pagehead['text_color'] ?>;"><?php echo ucwords_tr($diller['proje']) ?></span>
        </div>
    </div>
</div>
<!-- Page Header ====================== !-->



<!-- CONTENT AREA ============== !-->

<div class="projects-page-main">



    <div class="projects-page-text-main">

        <div class="projects-page-baslik font-open-sans font-30 font-bold">

            <?php echo ucwords_tr($diller['proje']) ?>

        </div>



        <div class="page-spot-quote font-open-sans font-17 font-small">

            <?php echo $diller['proje-aciklamasi'] ?>

        </div>

        <div class="projects-page-content">





            <div class="button-group filters-button-group">

                <button class="filter-button is-checked" data-filter="*"><?php echo $diller['proje-tumu']; ?></button>

                <?php foreach ($proje_cat_list as $prokat) {?>
                    <button class="filter-button" data-filter=".<?php echo $prokat['id'] ?>"><?php echo $prokat['baslik'] ?></button>
                <?php } ?>

            </div>


            <div class="filter-project-grid">


                <?php

                $sql_projeler = $db->prepare("select * from proje where durum=:durum and dil=:dil order by id desc");
                $sql_projeler->execute(array(
                        'durum' => '1',
                    'dil' => $_SESSION['dil']
                ));
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






</div>

<!-- CONTENT AREA ============== !-->



<?php include 'includes/template/footer.php'?>
</body>
    </html>
<?php include "includes/config/footer_libs.php";?>

