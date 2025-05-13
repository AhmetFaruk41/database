<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$page_header_setting = $db->prepare("select * from page_header where page_id='marka' order by id");
$page_header_setting->execute();
$pagehead = $page_header_setting->fetch(PDO::FETCH_ASSOC);

$markasettings = $db->prepare("select * from marka_ayar where id=:id");
$markasettings->execute(array(
        'id' => '1'
));
$markaset = $markasettings->fetch(PDO::FETCH_ASSOC);

$num = 1;
$marka_liste = $db->prepare("select * from marka where durum=:durum order by sira asc");
$marka_liste->execute(array(
        'durum' => '1'
));
?>
<title><?php echo ucwords_tr($diller['marka']) ?> | <?php echo $ayar['site_baslik']?></title>
<meta name="description" content="<?php echo"$markaset[meta_desc]" ?>">
<meta name="keywords" content="<?php echo"$markaset[tags]" ?>">
<meta name="news_keywords" content="<?php echo"$markaset[tags]" ?>">
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
        <div class="page-headers-main-left font-raleway font-18 font-small font-spacing" style="color:#<?php echo $pagehead['text_color'] ?>;">

            <?php echo ucwords_tr($diller['marka']) ?>

        </div><div class="page-headers-main-right font-raleway font-12 font-spacing">

            <span style="color:#<?php echo $pagehead['pasif_text_color'] ?>; padding-right: 15px;"><?php echo $diller['buradasiniz'] ?>:</span>
            <a href="index.html" style="color:#<?php echo $pagehead['text_color'] ?>;"><span style="padding-right: 15px;  font-weight: 600"><?php echo $diller['anasayfa'] ?></span></a>
            <span style="color:#<?php echo $pagehead['pasif_text_color'] ?>; padding-right: 15px;">/</span>
            <span style="padding-right: 15px; color:#<?php echo $pagehead['text_color'] ?>;"><?php echo ucwords_tr($diller['marka']) ?></span>
        </div>
    </div>
</div>
<!-- Page Header ====================== !-->



<!-- CONTENT AREA ============== !-->

<div class="markalar-page-main">



    <div class="markalar-page-text-main">

        <div class="markalar-page-baslik font-open-sans font-30 font-bold">

            <?php echo ucwords_tr($diller['marka']) ?>

        </div>



        <div class="page-spot-quote font-open-sans font-17 font-small">

            <?php echo $diller['marka-aciklamasi'] ?>

        </div>

        <div class="markalar-page-content">




            <?php if ($marka_liste->rowCount() > 0 ) { ?>

                <?php foreach ($marka_liste as $marka) { ?>
                    <div class="markalar-page-box">

                            <?php if($marka['url']== null) {} else { ?>

                            <a href="<?php echo $marka['url'] ?>" target="_blank">

                                <div class="markalar-page-ovrly"><i class="fa fa-link"></i></div>

                            <?php } ?>

                            <img src="images/clients/<?php echo $marka['gorsel'] ?>" alt="<?php echo $marka['baslik'] ?>">

                            <?php if($marka['url']== null) {} else { ?>

                            </a>
                            <?php } ?>

                    </div>
                <?php } ?>

            <?php } else { ?>

                <div class="markalar-page-box">
                    <img src="https://via.placeholder.com/220x150?text=No+Image" alt="NoImage">
                    <br><br>
                    Marka Eklenmemiş!
                </div>

            <?php } ?>






        </div>

    </div>






</div>

<!-- CONTENT AREA ============== !-->



<?php include 'includes/template/footer.php'?>
</body>
    </html>
<?php include "includes/config/footer_libs.php";?>

