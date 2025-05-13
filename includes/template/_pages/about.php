<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$seo_url = $_GET['id'];
$aboutAyarCek = $db->prepare("select * from about_ayar where id=:id");
$aboutAyarCek->execute(array(
        'id' => '1'
));
$aboutset = $aboutAyarCek->fetch(PDO::FETCH_ASSOC);

$aboutliste = $db->prepare("select * from about_page where seo_url=:seo_url and dil=:dil order by id ");
$aboutliste->execute(array(
        'seo_url' => $seo_url,
    'dil' => $_SESSION['dil']
));
$about = $aboutliste->fetch(PDO::FETCH_ASSOC);
?>
<?php
$countersettings = $db->prepare("select * from sayac_ayar where id=:id");
$countersettings->execute(array(
        'id' => '1'
));
$countsett = $countersettings->fetch(PDO::FETCH_ASSOC);
?>
<?php
$counters1 = $db->prepare("select * from sayac where durum=:durum and dil=:dil order by sira asc");
$counters1->execute(array(
    'durum' => '1',
    'dil' => $_SESSION['dil']
));
$sayi = 2;
?>
<?php
$counter_counts = $db->prepare("select * from sayac where durum='1' and dil='$_SESSION[dil]'");
$counter_counts->execute();
?>
<?php
$beceriler = $db->prepare("select * from ozellik where durum=:durum and dil=:dil order by sira asc limit 6");
$beceriler->execute(array(
    'durum' => '1',
    'dil' => $_SESSION['dil']
));
$beceriSettings = $db->prepare("select * from beceri_ayar where id=:id");
$beceriSettings->execute(array(
    'id' => '1'
));
$skillset = $beceriSettings->fetch(PDO::FETCH_ASSOC);
?>
<?php
$page_header_setting = $db->prepare("select * from page_header where page_id='hakkimizda' order by id");
$page_header_setting->execute();
$pagehead = $page_header_setting->fetch(PDO::FETCH_ASSOC);
?>
<?php if ($about['seo_url'] == $_GET['id']) { ?>
<title><?php echo $about['baslik'] ?> | <?php echo $ayar['site_baslik']?></title>
<meta name="description" content="<?php echo"$aboutset[meta_desc]" ?>">
<meta name="keywords" content="<?php echo"$aboutset[tags]" ?>">
<meta name="news_keywords" content="<?php echo"$aboutset[tags]" ?>">
<meta name="author" content="<?php echo"$ayar[site_baslik]" ?>" />
<meta itemprop="author" content="<?php echo"$ayar[site_baslik]" ?>" />
<meta name="robots" content="index follow">
<meta name="googlebot" content="index follow">
<meta property="og:type" content="website" />

<?php include "includes/config/header_libs.php";?>
    <style>

        .progress-bar{
            background-color: #<?=$skillset['bar_sub_bg']?> !important;
        }
        .progress-bar > span{
            background: #<?=$skillset['bar_bg']?>;
        }

        .about-counter-div{background: #<?php echo $about['counter_bgcolor'] ?>}
    </style>
</head>
<body>
<?php include 'includes/template/pre-loader.php'?>
<?php include 'includes/template/header.php'?>


<!-- Page Header ====================== !-->
<style>
    .page-headers-main{width:<?php if($pagehead['width']==1){?> 90%;margin: auto; <?php }else {?> 100% <?php }?> ;  padding:<?php echo $pagehead['padding'] ?>px 0 <?php echo $pagehead['padding'] ?>px 0 ;
        <?php if($pagehead['shadow'] == 1 ) {?>
        -webkit-box-shadow: inset 5000px 0 0 0 rgba(0, 0, 0, 0.27);
        -moz-box-shadow: inset 5000px 0 0 0 rgba(0, 0, 0, 0.27);
        box-shadow: inset 5000px 0 0 0 rgba(0, 0, 0, 0.27);
        <?php } ?>
        <?php if($pagehead['tip'] == 0 ) {?>
        background:#<?php echo $pagehead['bg_color'] ?> ;
        <?php } ?>
        <?php if($pagehead['tip'] == 1 ) {?>

        background:url(images/uploads/<?php echo $pagehead['bg_image'] ?>) ;

        box-shadow: inset 5000px 0 0 0 rgba(0, 0, 0, 0.2); border-color: rgba(0, 0, 0, 1);
        <?php } ?>
    }

    .swiper-slide img{width: 100%;}


    @media screen and (max-width:410px) and (min-width:321px) {


    }


</style>
<div class="page-headers-main hero-section hero-background">
    <h1 class="page-title" style="color:#<?php echo $pagehead['text_color'] ?>"><?=$about['baslik']?></h1>
    <span style="padding-right: 15px; color:#<?php echo $pagehead['text_color'] ?>;"><?php echo $about['baslik'] ?></span>
</div>
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="/" class="permal-link"><?php echo $diller['anasayfa'] ?></a></li>
            <li class="nav-item"><span class="current-page"><?php echo $about['baslik'] ?></span></li>
        </ul>
    </nav>
</div>
   <div class="page-contain about-us">
        <div id="main-content" class="main-content">
            <div class="welcome-us-block">
                <div class="container">
                    <h4 class="title"><?php echo $about['baslik'] ?></h4>
                    <div class="text-wraper">
                        <?php
                        $icerik  = $about['icerik'];
                        $eski   = "../images";
                        $yeni   = "images";
                        $icerik = str_replace($eski, $yeni, $icerik);
                        ?>
                        <?=$icerik?>
                    </div>
                </div>
            </div>
            <div class="why-choose-us-block">
                <div class="container">
                    <h4 class="box-title"><?=$diller['ozellik']?></h4>
                    <b class="subtitle"><?=$diller['ozellik-aciklamasi']?></b>
                    <div class="showcase">
                        <div class="sc-child sc-left-position">
                            <ul class="sc-list">
                                <?php
                                $count = 0;
                                 foreach ($beceriler as $beceri) {
                                    $count++;
                                    if($count%2==1){
                                    ?>
                                    <li>
                                        <div class="sc-element color-0<?=$count?>">
                                            <span class="biolife-icon fa <?=$beceri['icon']?>"></span>
                                            <div class="txt-content">
                                                <span class="number">0<?=$count?></span>
                                                <b class="title"> <?php echo $beceri['baslik'] ?></b>
                                                <p class="desc"><?=$beceri['spot']?> </p>
                                            </div>
                                        </div>
                                    </li>

                                <?php 
                                    }
                                 } ?>
                            </ul>
                        </div>
                        <div class="sc-child sc-center-position">
                            <?php if ($about['galeri_id'] == 0) {
                                ?>
                                <div style="margin: 0" class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain">
                                    <div class="product-item" >
                                        <figure>
                                            <h3>Buraya Galeri Ekleyiniz</h3>
                                        </figure>
                                    </div>
                                </div>
                                <?php
                            } else {?>

                                <div style="margin: 0" class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain" data-slick='{
                                "rows":1 ,
                                "arrows":false,
                                "dots":false,
                                "infinite":true,
                                "speed":800,
                                "autoplay":true,
                                "autoplaySpeed":1000,
                                "slidesMargin":10,
                                "slidesToShow":1
                                }' >
                                    <?php
                                    $galeri_id_liste = $db ->prepare("select * from galeri_resim where kat_id='$about[galeri_id]' order by sira asc");
                                    $galeri_id_liste->execute();
                                    while ($galeri = $galeri_id_liste->fetch(PDO::FETCH_ASSOC)){
                                        ?>

                                        <div class="product-item" >
                                            <figure>
                                                <img src="images/gallery/<?php echo $galeri['gorsel'] ?>" style="width: 80%;margin:auto">
                                            </figure>
                                        </div>

                                    <?php } ?>
                                </div>

                            <?php } ?>
                        </div>
                        <div class="sc-child sc-right-position">
                            <ul class="sc-list">
                                <?php
                                $beceriler->execute(array(
                                    'durum' => '1',
                                    'dil' => $_SESSION['dil']
                                ));
                                $count = 0;
                                 foreach ($beceriler as $beceri) {
                                    $count++;
                                     if($count%2==0){
                                    ?>
                                    <li>
                                        <div class="sc-element color-0<?=$count?>">
                                            <span class="biolife-icon fa <?=$beceri['icon']?>"></span>
                                            <div class="txt-content">
                                                <span class="number">0<?=$count?></span>
                                                <b class="title"> <?php echo $beceri['baslik'] ?></b>
                                                <p class="desc"><?=$beceri['spot']?> </p>
                                            </div>
                                        </div>
                                    </li>

                                <?php }
                                } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

<?php include 'includes/template/footer.php'?>
</body>
    </html>
<?php include "includes/config/footer_libs.php";?>






<?php  } else { ?>
<script type='text/javascript'> document.location = 'index.php'; </script>
<?php }  ?>
