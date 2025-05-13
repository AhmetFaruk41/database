<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$page_header_setting = $db->prepare("select * from page_header where page_id='video' order by id");
$page_header_setting->execute();
$pagehead = $page_header_setting->fetch(PDO::FETCH_ASSOC);
?>
<?php
$vid_id = $_GET['vid_id'];
$videolar = $db->prepare("select * from video where id=:id and durum=:durum and dil=:dil");
$videolar->execute(array(
        'id' => $vid_id,
        'durum' => '1',
    'dil' => $_SESSION['dil']
));
$video = $videolar->fetch(PDO::FETCH_ASSOC);
$etiketler = $video['tags'];
$etiketler = explode(',', $etiketler);

$video_hits = $db->prepare("UPDATE video SET hit = hit+1 WHERE id=:id  ");
$video_hits->execute(array(
        'id' => $vid_id
));
?>
<?php
if($videolar->rowCount() == 0)
{
    header('Location:'.$siteurl.'');

    exit;

}
?>
<title><?php echo ucwords_tr($video['baslik']) ?> | <?php echo $ayar['site_baslik']?></title>
<meta name="description" content="<?php echo"$video[meta_desc]" ?>">
<meta name="keywords" content="<?php echo"$video[tags]" ?>">
<meta name="news_keywords" content="<?php echo"$video[tags]" ?>">
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

            <?php echo ucwords_tr($video['baslik']) ?>

        </div><div class="page-headers-main-right font-raleway font-12 font-spacing">

            <span style="color:#<?php echo $pagehead['pasif_text_color'] ?>; padding-right: 15px;"><?php echo $diller['buradasiniz'] ?>:</span>
            <a href="index.html" style="color:#<?php echo $pagehead['text_color'] ?>;"><span style="padding-right: 15px;  font-weight: 600"><?php echo $diller['anasayfa'] ?></span></a>
            <span style="color:#<?php echo $pagehead['pasif_text_color'] ?>; padding-right: 15px;">/</span>
            <a href="video-galeri" style="color:#<?php echo $pagehead['text_color'] ?>;"><span style="padding-right: 15px; color:#<?php echo $pagehead['text_color'] ?>;"><?php echo ucwords_tr($diller['video']) ?></span></a>
        </div>
    </div>
</div>
<!-- Page Header ====================== !-->



<!-- CONTENT AREA ============== !-->

<div class="videogallery-page-main">



    <div class="videogallery-page-text-main">

        <div class="videogallery-page-baslik font-open-sans font-30 font-bold">

            <img src="images/video_page_icn.png" alt="Videos"> <?php echo ucwords_tr($video['baslik']) ?>

        </div>


        <div class="videogallery-page-content">


            <?php if($video['embed'] ==!null) {?>
            <div class="videogallery-page-content-embed">

                <?=$video['embed']?>

            </div>
            <?php } else {
                echo '
               <div class="alert alert-secondary" role="alert">
                    Video Embed Kodu Eklenmemiş!
                </div>
                ';
            }?>


            <div class="videogallery-page-content-txt">
                <?php
                $icerik  = $video['spot'];
                $eski   = "../images";
                $yeni   = "images";
                $icerik = str_replace($eski, $yeni, $icerik);
                ?>
                <?=$icerik?>
            </div>



            <?php if($video['tags'] ==!null) {?>

                <div class="videogallery-page-content-tags">

                    <div class="blog-detail-header-baslik font-spacing">
                        <?=$diller['etiketler']?>
                    </div>

                    <?php foreach( $etiketler as $anahtar => $deger ){ ?>
                        <div class="blog-detail-etiket-box"><?=$deger?></div>
                    <?php } ?>



                </div>


            <?php }?>








        </div>

    </div>






</div>

<!-- CONTENT AREA ============== !-->



<?php include 'includes/template/footer.php'?>
</body>
    </html>
<?php include "includes/config/footer_libs.php";?>

