<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$page_header_setting = $db->prepare("select * from page_header where page_id='foto' order by id");
$page_header_setting->execute();
$pagehead = $page_header_setting->fetch(PDO::FETCH_ASSOC);
?>
<?php
$gal_id = $_GET['gal_id'];
$galeri_kat = $db->prepare("select * from galeri_kat where id=:id and durum=:durum and dil=:dil");
$galeri_kat->execute(array(
    'id' => $gal_id,
    'durum' => 1,
    'dil' => $_SESSION['dil']
));
$galeri = $galeri_kat->fetch(PDO::FETCH_ASSOC);

$foto_liste=$db->prepare("select * from galeri_resim where kat_id='$gal_id' order by sira asc");
$foto_liste->execute();
?>
<?php
if($galeri_kat->rowCount() == 0)
{
    header('Location:'.$siteurl.'');

    exit;

}
?>
<title><?php echo ucwords_tr($galeri['baslik']) ?> | <?php echo $ayar['site_baslik']?></title>
<meta name="description" content="<?php echo"$galeri[meta_desc]" ?>">
<meta name="keywords" content="<?php echo"$galeri[tags]" ?>">
<meta name="news_keywords" content="<?php echo"$galeri[tags]" ?>">
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

            <?php echo ucwords_tr($galeri['baslik']) ?>

        </div><div class="page-headers-main-right font-raleway font-12 font-spacing">

            <span style="color:#<?php echo $pagehead['pasif_text_color'] ?>; padding-right: 15px;"><?php echo $diller['buradasiniz'] ?>:</span>
            <a href="index.html" style="color:#<?php echo $pagehead['text_color'] ?>;"><span style="padding-right: 15px;  font-weight: 600"><?php echo $diller['anasayfa'] ?></span></a>
            <span style="color:#<?php echo $pagehead['pasif_text_color'] ?>; padding-right: 15px;">/</span>
            <a href="foto-galeri" style="color:#<?php echo $pagehead['text_color'] ?>;"><span style="padding-right: 15px; color:#<?php echo $pagehead['text_color'] ?>;"><?php echo ucwords_tr($diller['foto-galeri']) ?></span></a>
        </div>
    </div>
</div>
<!-- Page Header ====================== !-->



<!-- CONTENT AREA ============== !-->

<div class="photogallery-page-main">



    <div class="photogallery-detail-content">

        <div class="photogallery-page-baslik font-open-sans font-30 font-bold">

            <img src="images/gallery_icn.png" alt="Galeri"> <?php echo ucwords_tr($galeri['baslik']) ?>

        </div>



        <div class="photogallery-page-content" id="portfolio">


            <?php foreach($foto_liste as $foto) { ?>
            <div class="photogallery-detail-box">
                <a href="images/gallery/<?php echo $foto['gorsel'] ?>">
                <img src="images/gallery/<?=$foto['gorsel']?>" alt="<?=$foto['baslik']?>">
                </a>
            </div>
            <?php }?>



            <?php if ($foto_liste->rowCount() <= 0) { ?>

                <div class="alert alert-secondary" role="alert">
                    Henüz bu galeriye fotoğraf eklenmemiş!
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

