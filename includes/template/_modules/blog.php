<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$blogsettings = $db->prepare("select * from blog_ayar where id='1'");
$blogsettings->execute();
$blogsett = $blogsettings->fetch(PDO::FETCH_ASSOC);
$bloglimit = $blogsett["blog_limit"];
?>
<?php
$num = 1;
$blogliste = $db->prepare("select * from blog where durum='1' and dil='$_SESSION[dil]' and anasayfa='1' order by id desc limit $bloglimit");
$blogliste->execute();
?>
<style>
    .blog-home-main-div{width:<?php if($blogsett['width']==1){?> 90%; <?php }else {?> 100% <?php }?> ; height: auto; overflow: hidden; background-color: #<?php echo $blogsett['back_color'] ?>; padding: <?php echo $blogsett['padding'] ?>px 0 <?php echo $blogsett['padding'] ?>px 0; }
    .blog-box{background: #<?php echo $blogsett['box_bg_color']?>}
    .blog-box-in-spot{color:#<?php echo $blogsett['box_spot_color']?>}
    .blog-box-in-readmore a{color:#<?php echo $blogsett['box_more_color']?>}
    .blog-box-in img{border-radius: <?php echo $blogsett['border_radius'] ?>px}
</style>


<!--Block 09: Blog Post-->
<div class="blog-posts xs-margin-top-80px sm-margin-top-61px sm-padding-top-54px xs-padding-bottom-50px">
    <div class="container">
        <div class="biolife-title-box slim-item">
            <span class="subtitle"><?php echo $diller['blog-aciklamasi']?></span>
            <h3 class="main-title"><?php echo $diller['blog']?></h3>
        </div>
        <?php if ($blogliste->rowCount() >0) { ?>
            <ul class="biolife-carousel nav-center xs-margin-top-33px nav-none-on-mobile" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":3, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 3}},{"breakpoint":992, "settings":{ "slidesToShow": 2}},{"breakpoint":768, "settings":{ "slidesToShow": 2}},{"breakpoint":600, "settings":{ "slidesToShow": 1}}]}'>
               <?php foreach ($blogliste as $blog) { ?>
                <li>
                    <div class="post-item style-bottom-info layout-02 ">
                        <div class="thumbnail">
                            <a href="blog/<?php echo seo($blog['id'])?>/<?php echo seo($blog['baslik']) ?>" class="link-to-post"><img src="images/blog/<?php echo $blog['gorsel'] ?>" alt="<?php echo $blog['baslik'] ?>"></a>
                            <div class="post-date">
                                <span class="date">26</span>
                                <span class="month">Ekim</span>
                            </div>
                        </div>
                        <div class="post-content">
                            <h4 class="post-name"><a href="" class="linktopost"><?php echo $blog['baslik'] ?></a></h4>
                            <div class="post-meta">
                                <div class="post-meta__item post-meta__item-social-box">
                                    <span class="tbn"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                                    <div class="inner-content">
                                        <ul class="socials">
                                            <li><a href="#" title="twitter" class="socail-btn"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a href="#" title="facebook" class="socail-btn"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li><a href="#" title="pinterest" class="socail-btn"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                            <li><a href="#" title="youtube" class="socail-btn"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                            <li><a href="#" title="instagram" class="socail-btn"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <p class="excerpt"><?php echo $blog['spot'] ?></p>
                            <div class="group-buttons">
                                <a href="blog/<?php echo seo($blog['id'])?>/<?php echo seo($blog['baslik']) ?>" class="btn readmore"><?php echo $diller['blog-devamini-oku']?></a>
                            </div>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>
    </div>
</div>
