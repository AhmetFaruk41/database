<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$seo_url = $_GET['id'];
$htmlsayfa = $db->prepare("select * from htmlsayfa where seo_url=:seo_url and dil=:dil and durum=:durum order by id ");
$htmlsayfa->execute(array(
        'seo_url' => $seo_url,
    'dil' => $_SESSION['dil'],
    'durum' => '1'
));
$sayfa = $htmlsayfa->fetch(PDO::FETCH_ASSOC);
?>

<?php
$page_header_setting = $db->prepare("select * from page_header where page_id='htmlsayfa' order by id");
$page_header_setting->execute();
$pagehead = $page_header_setting->fetch(PDO::FETCH_ASSOC);
?>

<?php if ($sayfa['seo_url'] == $_GET['id'] ) { ?>
<title><?php echo $sayfa['baslik'] ?> | <?php echo $ayar['site_baslik']?></title>
<meta name="description" content="<?php echo"$sayfa[meta_desc]" ?>">
<meta name="keywords" content="<?php echo"$sayfa[tags]" ?>">
<meta name="news_keywords" content="<?php echo"$sayfa[tags]" ?>">
<meta name="author" content="<?php echo"$ayar[site_baslik]" ?>" />
<meta itemprop="author" content="<?php echo"$ayar[site_baslik]" ?>" />
<meta name="robots" content="index follow">
<meta name="googlebot" content="index follow">
<meta property="og:type" content="website" />

<?php include "includes/config/header_libs.php";?>

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
</style>
<div class="page-headers-main">
    <div class="page-headers-main-in">
        <div class="page-headers-main-left font-raleway font-18 font-small font-spacing" style="color:#<?php echo $pagehead['text_color'] ?>">

          <?php echo $sayfa['baslik'] ?>

        </div><div class="page-headers-main-right font-raleway font-12 font-spacing">

            <span style="color:#<?php echo $pagehead['pasif_text_color'] ?>; padding-right: 15px;"><?php echo $diller['buradasiniz'] ?>:</span>
            <a href="index.html" style="color:#<?php echo $pagehead['text_color'] ?>;"><span style="padding-right: 15px; font-weight: 600"><?php echo $diller['anasayfa'] ?></span></a>
            <span style="color:#<?php echo $pagehead['pasif_text_color'] ?>; padding-right: 15px;">/</span>
            <span style="padding-right: 15px; color:#<?php echo $pagehead['text_color'] ?>;"><?php echo $sayfa['baslik'] ?></span>
        </div>
    </div>
</div>
<!-- Page Header ====================== !-->



<!-- CONTENT AREA ============== !-->

<div class="html-page-main">



    <div class="html-page-text-main">

        <div class="html-page-baslik font-open-sans font-30 font-bold"><?php echo $sayfa['baslik'] ?></div>
        <div class="html-page-content font-open-sans font-16 font-small">
            <?php
            $icerik  = $sayfa['icerik'];
            $eski   = "../images";
            $yeni   = "images";
            $icerik = str_replace($eski, $yeni, $icerik);
            ?>
            <?=$icerik?>
        </div>

    </div>






</div>

<!-- CONTENT AREA ============== !-->



<?php include 'includes/template/footer.php'?>
</body>
    </html>
<?php include "includes/config/footer_libs.php";?>






<?php  } else { ?>
<script type='text/javascript'> document.location = 'index.php'; </script>
<?php }  ?>
