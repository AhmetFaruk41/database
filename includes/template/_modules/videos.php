<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?><?php
$videosettings = $db->prepare("select * from video_ayar where id='1'");
$videosettings->execute();
$videoset = $videosettings->fetch(PDO::FETCH_ASSOC);
$videolimit = $videoset["video_limit"];
?>
<?php
$num = 1;
$video_listele = $db->prepare("select * from video where durum='1' and dil='$_SESSION[dil]' and anasayfa='1' order by sira asc limit $videolimit");
$video_listele->execute();
?>
<style>
    .video-gallery-home-main-div{width:<?php if($videoset['width']==1){?> 90%; <?php }else {?> 100% <?php }?> ; height: auto; overflow: hidden; background-color: #<?php echo $videoset['back_color'] ?>; padding: <?php echo $videoset['padding'] ?>px 0 <?php echo $videoset['padding'] ?>px 0; }
    .video-gallery-box{background: #FFF}

</style>


<div class="video-gallery-home-main-div">

    <div class="modules-header-main-product-group">
        <div class="modules-header-main-head" style="background:url(images/<?php echo $videoset['divider'] ?>.png) no-repeat center bottom;">
            <div class="modules-header-main-baslik font-open-sans font-<?php echo $videoset['font_weight'] ?> font-spacing" style="color:#<?php echo $videoset['baslik_color'] ?>">
                <?php echo $diller['video']?>
            </div>
            <div class="modules-header-main-spot font-raleway font-light" style="color:#<?php echo $videoset['spot_color'] ?>; letter-spacing: 0.07em">
                <?php echo $diller['video-aciklamasi']?>
            </div>
        </div>
    </div>

<div class="video-gallery-home-main-div-inside counters">


    <?php if ($video_listele->rowCount() > 0) { ?>

    <?php foreach ($video_listele as $video) {?><div class="video-gallery-home-box" data-appear-animation="fadeInUp" data-appear-animation-delay="<?php echo $num++ ?>00">

            <div class="video-gallery-home-box-img" >

                <a href="video/<?php echo $video['id']?>/<?php echo seo($video['baslik'])?>">
                <div class="video-gallery-home-box-overlay">
                    <div class="video-gallery-home-box-overlay-table">
                        <div class="video-gallery-home-box-overlay-table-in">
                            <div class="video-gallery-box-play-web"></div>
                        </div>
                    </div>
                </div>
                </a>

                <img src="images/videos/<?php echo $video['gorsel'] ?>" alt="<?php echo $video['baslik'] ?>">

            </div>

            <div class="video-gallery-home-box-text">

                    <a href="video/<?php echo $video['id']?>/<?php echo seo($video['baslik'])?>" style="color:#000"><?php echo $video['baslik'] ?></a>

                <br><br>
                <a href="video/<?php echo $video['id']?>/<?php echo seo($video['baslik'])?>" class="btn btn-sm btn-<?php echo $videoset['button_bg'] ?>" role="button" aria-pressed="true">
                    <i class="fa fa-video-camera" style="font-size:15px !important; margin-bottom: 0 !important;"></i>
                    <?php echo $diller["videoyu-izle"] ?>
                </a>
            </div>

        </div><?php }?>

    <?php } else { ?>

        <div class="video-gallery-home-box" data-appear-animation="fadeInUp" data-appear-animation-delay="300">

            <div class="video-gallery-home-box-img" >

                    <div class="video-gallery-home-box-overlay">
                        <div class="video-gallery-home-box-overlay-table">
                            <div class="video-gallery-home-box-overlay-table-in">
                                <div class="video-gallery-box-play-web"></div>
                            </div>
                        </div>
                    </div>

                <img src="http://www.fpoimg.com/380x240" alt="NoImage">

            </div>

            <div class="video-gallery-home-box-text">

               Anasayfa için video seçilmemiş ya da eklenmemiş!

            </div>

        </div>


    <?php } ?>


</div>

</div>