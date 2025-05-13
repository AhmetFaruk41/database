<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$page_header_setting = $db->prepare("select * from page_header where page_id='blog' order by id");
$page_header_setting->execute();
$pagehead = $page_header_setting->fetch(PDO::FETCH_ASSOC);
?>
<?php
$num = 1;
$blog_id = $_GET['blog_id'];
$blog_cek = $db->prepare("select * from blog where id=:id and durum=:durum and dil=:dil");
$blog_cek->execute(array(
        'id' => $blog_id,
        'durum' => 1,
        'dil' => $_SESSION['dil']
));
$blog = $blog_cek->fetch(PDO::FETCH_ASSOC);
$etiketler = $blog['tags'];
$etiketler = explode(',', $etiketler);


$blog_hits = $db->prepare("UPDATE blog SET hit = hit+1 WHERE id='$blog_id'  ");
$blog_hits->execute();


$bloglist = $db->prepare("select * from blog where durum='1' and dil='$_SESSION[dil]' order by hit desc limit 5");
$bloglist->execute();
?>
<?php
if($blog_cek->rowCount() == 0)
{
    header('Location:'.$siteurl.'');

    exit;

}
?>
<title><?php echo ucwords_tr($blog['baslik']) ?> | <?php echo $ayar['site_baslik']?></title>
<meta name="description" content="<?php echo"$blog[meta_desc]" ?>">
<meta name="keywords" content="<?php echo"$blog[tags]" ?>">
<meta name="news_keywords" content="<?php echo"$blog[tags]" ?>">
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

            <?php echo ucwords_tr($blog['baslik']) ?>

        </div><div class="page-headers-main-right font-raleway font-12 font-spacing">

            <span style="color:#<?php echo $pagehead['pasif_text_color'] ?>; padding-right: 15px;"><?php echo $diller['buradasiniz'] ?>:</span>
            <a href="index.html" style="color:#<?php echo $pagehead['text_color'] ?>;"><span style="padding-right: 15px;  font-weight: 600"><?php echo $diller['anasayfa'] ?></span></a>
            <span style="color:#<?php echo $pagehead['pasif_text_color'] ?>; padding-right: 15px;">/</span>
            <a href="bloglar" style="color:#<?php echo $pagehead['text_color'] ?>;"><span style="padding-right: 15px; color:#<?php echo $pagehead['text_color'] ?>;"><?php echo ucwords_tr($diller['blog']) ?></span></a>

        </div>
    </div>
</div>
<!-- Page Header ====================== !-->



<!-- CONTENT AREA ============== !-->

<div class="blog-detail-page-main">


        <div class="blog-detail-content">

            <div class="blog-detail-content-left">

                <div class="blog-detail-content-left-date">

                    <?php echo date_tr('j F Y, l', ''.$blog['tarih'].''); ?>


                </div>

                <div class="blog-detail-content-left-baslik">
                    <?=$blog['baslik']?>
                </div>

                <?php if($blog['spot'] == !null) {?>
                <div class="blog-detail-content-left-spot">
                    <?=$blog['spot']?>
                </div>
                <?php }?>

                <div class="blog-detail-content-left-img">
                    <img src="images/blog/<?=$blog['gorsel']?>" alt="<?=$blog['baslik']?>">
                </div>


                <div class="blog-detail-content-left-txt">
                    <?php
                    $icerik  = $blog['icerik'];
                    $eski   = "../images";
                    $yeni   = "images";
                    $icerik = str_replace($eski, $yeni, $icerik);
                    ?>
                    <?=$icerik?>
                </div>

                <div class="blog-detail-content-left-social">



                    <a href="https://www.facebook.com/sharer.php?u=<?=$ayar['site_url']?>blog/<?=$blog['id']?>/<?=seo($blog['baslik'])?>" onClick="return popup(this, 'notes')"  ><i aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="<?=$diller['paylas']?>" class="fa fa-facebook"></i></a>

                    <a href="https://twitter.com/intent/tweet?url=<?=$ayar['site_url']?>blog/<?=$blog['id']?>/<?=seo($blog['baslik'])?>" onClick="return popup(this, 'notes')" ><i class="fa fa-twitter" data-toggle="tooltip" data-placement="bottom" title="<?=$diller['paylas']?>"></i></a>

                    <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?=$ayar['site_url']?>blog/<?=$blog['id']?>/<?=seo($blog['baslik'])?>" onClick="return popup(this, 'notes')"><i class="fa fa-linkedin" data-toggle="tooltip" data-placement="bottom" title="<?=$diller['paylas']?>"></i></a>

                    <a href="https://www.pinterest.com/pin/create/button/?url=<?=$ayar['site_url']?>blog/<?=$blog['id']?>/<?=seo($blog['baslik'])?>&media=<?=$ayar['site_url']?>images/blog/<?=$blog['gorsel']?>&description=<?=$blog['baslik']?>"  onClick="return popup(this, 'notes')"><i class="fa fa-pinterest-p" data-toggle="tooltip" data-placement="bottom" title="<?=$diller['paylas']?>"></i></a>

                    <a href="https://api.whatsapp.com/send?text=<?=$blog['baslik']?> <?=$ayar['site_url']?>blog/<?=$blog['id']?>/<?=seo($blog['baslik'])?>" target="_blank"><i class="fa fa-whatsapp" data-toggle="tooltip" data-placement="bottom" title="<?=$diller['paylas']?>"></i></a>


                </div>


            </div><div class="blog-detail-content-right">

            <div class="blog-detail-header">
                <div class="blog-detail-header-baslik font-spacing">
                    <?=$diller['blog-detay-populer']?>
                </div>

                <?php foreach ($bloglist as $blogs) { ?>
                <div class="blog-detail-header-links">

                   <strong ><?=$num++?></strong>

                    <a href="blog/<?=$blogs['id']?>/<?=seo($blogs['baslik'])?>">
                        <?=$blogs['baslik']?>
                    </a>

                </div>
                <?php } ?>



            </div>


                <?php
                if($blog['tags']==! null){
                ?>
                <div class="blog-detail-etiket" >
                    <div class="blog-detail-header-baslik font-spacing">
                        <?=$diller['etiketler']?>
                    </div>


                    <?php
                    foreach( $etiketler as $anahtar => $deger ){ ?>
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

