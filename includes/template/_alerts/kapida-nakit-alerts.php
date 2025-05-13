<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$page_header_setting = $db->prepare("select * from page_header where page_id='alert' order by id");
$page_header_setting->execute();
$pagehead = $page_header_setting->fetch(PDO::FETCH_ASSOC);
?>
<title><?php echo ucwords_tr($diller['siparis-sonucu']) ?> | <?php echo $ayar['site_baslik']?></title>
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
</style>
<style>
    input[type="text"]:disabled {
        background: #FFF;
    }
</style>
<div class="page-headers-main hero-section hero-background">
    <h1 class="page-title" style="color:#<?php echo $pagehead['text_color'] ?>"> <?php echo ucwords_tr($diller['siparis-sonucu']) ?></h1>
</div>
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="/" class="permal-link"><?php echo $diller['anasayfa'] ?></a></li>
            <li class="nav-item"><span class="current-page"><?php echo ucwords_tr($diller['siparis-sonucu']) ?></span></li>
        </ul>
    </nav>
</div>
<?php
    if ($_GET['status'] == "success" && isset($_SESSION["shopping_cart"]) && count($_SESSION["shopping_cart"]) == !0 && isset($_SESSION['siparis_numarasi']))
    {
    ?>
<div class="page-contain about-us">

    <!-- Main content -->
    <div id="main-content" class="main-content">

        <div class="welcome-us-block">
            <div class="container">
                <h4 class="title"><?=$diller['siparis-basarili']?></h4>
                <div class="text-wraper" style="padding: 80px 0;text-align: center;">
                    <p><?=$diller['siparis-numaraniz']?> : <strong>#<?php echo $_SESSION['siparis_numarasi'] ?></strong></p>
                    <p><?=$diller['kapida-nakit-aciklamasi']?></p>
                    <p> <strong style="font-size:18px"><?=$diller['odenecek-tutar']?> : <?php echo number_format($_SESSION['toplam_odenecek_tutar'], 2); ?> <span class="font-exlight"><?php echo $odemeayar['simge'] ?></span></strong></p>
                </div>
            </div>
        </div>

    </div>

</div>
<?php
foreach($_SESSION["shopping_cart"] as $keys => $values)
{
    unset($_SESSION["shopping_cart"][$keys]);
}
?>
<?php unset($_SESSION['siparis_numarasi']); ?>
<?php unset($_SESSION['siparis_isim']); ?>
<?php unset($_SESSION['siparis_soyisim']); ?>
<?php unset($_SESSION['siparis_eposta']); ?>
<?php unset($_SESSION['siparis_tel']); ?>
<?php unset($_SESSION['siparis_sehir']); ?>
<?php unset($_SESSION['siparis_ilce']); ?>
<?php unset($_SESSION['siparis_adres']); ?>
<?php unset($_SESSION['toplam_odenecek_tutar']); ?>
<?php unset($_SESSION['siparis_postakodu']); ?>
<?php unset($_SESSION['ara_tutar']); ?>
<?php unset($_SESSION['kdv_tutar']); ?>
<?php unset($_SESSION['kargo_tutar']); ?>
<?php unset($_SESSION['shopping_cart']); ?>
<?php unset($_SESSION['basket_items']); ?>
<?php
if (isset($_SESSION['siparis_not'])) {

    unset($_SESSION['siparis_not']);

}
?>


<?php } else {


    header('Location:'.$siteurl.'');

    exit;

} ?>

<?php include 'includes/template/footer.php'?>
</body>
</html>
<?php include "includes/config/footer_libs.php";?>
