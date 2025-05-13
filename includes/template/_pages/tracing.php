<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$page_header_setting = $db->prepare("select * from page_header where page_id='tracing' order by id");
$page_header_setting->execute();
$pagehead = $page_header_setting->fetch(PDO::FETCH_ASSOC);
?>
<?php
//TODO BU SAYFADA VA
?>
<title><?php echo ucwords_tr($diller['siparis-takip-baslik']) ?> | <?php echo $ayar['site_baslik']?></title>
<meta name="description" content="<?php echo"$ayar[site_desc]" ?>">
<meta name="keywords" content="<?php echo"$ayar[site_tags]" ?>">
<meta name="news_keywords" content="<?php echo"$ayar[site_tags]" ?>">
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

    .product-main-box-img .buttons .text{background-color: #<?php echo $prodayar['incele_button_back'] ?>; }
</style>
<div class="page-headers-main">
    <div class="page-headers-main-in">
        <div class="page-headers-main-left font-raleway font-18 font-small font-spacing" style="color:#<?php echo $pagehead['text_color'] ?>;">

            <?php echo ucwords_tr($diller['siparis-takip-baslik']) ?>

        </div><div class="page-headers-main-right font-raleway font-12 font-spacing">

            <span style="color:#<?php echo $pagehead['pasif_text_color'] ?>; padding-right: 15px;"><?php echo $diller['buradasiniz'] ?>:</span>
            <a href="index.html" style="color:#<?php echo $pagehead['text_color'] ?>;"><span style="padding-right: 15px; font-weight: 600"><?php echo $diller['anasayfa'] ?></span></a>
            <span style="color:#<?php echo $pagehead['pasif_text_color'] ?>; padding-right: 15px;">/</span>
            <span style="padding-right: 15px; color:#<?php echo $pagehead['text_color'] ?>;"><?php echo ucwords_tr($diller['siparis-takip-baslik']) ?></span>
        </div>
    </div>
</div>
<!-- Page Header ====================== !-->



<!-- CONTENT AREA ============== !-->

<div class="bank-page-main">



    <div class="bank-page-text-main">

        <div class="bank-page-baslik font-open-sans font-30 font-bold" style="margin-bottom: 20px;">

            <?php echo ucwords_tr($diller['siparis-takip-baslik']) ?>

        </div>

            <div style="width: 100%; text-align: center; margin-bottom: 90px;">
                <?=$diller['siparis-takip-aciklama']?>
                <div class="tracing-input-div">
                    <form action="siparis-sorgu" method="get">
                        <div class="form-group col-md-12 ">
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-hashtag"></i></div>
                                </div>
                                <input type="text" class="form-control"  required  name="orderNo" style="border-radius: 0; height: 50px; font-size: 30px ; font-family : 'Open Sans', Arial ; font-weight: 600;">
                            </div>
                        </div>

                        <div class="form-group col-md-12 " style="margin-top: 20px;">
                            <button name="result" value="order" class="btn btn-danger" style="font-family : 'Open Sans', Arial ; font-size: 20px ; padding: 13px 20px 13px 20px; font-weight: 600;"><i class="fa fa-search"></i> <?=$diller['siparis-takip-button']?></button>
                        </div>
                    </form>
                </div>
            </div>








    </div>






</div>

<!-- CONTENT AREA ============== !-->



<?php include 'includes/template/footer.php'?>
</body>
    </html>
<?php include "includes/config/footer_libs.php";?>

