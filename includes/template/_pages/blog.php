<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$page_header_setting = $db->prepare("select * from page_header where page_id='blog' order by id");
$page_header_setting->execute();
$pagehead = $page_header_setting->fetch(PDO::FETCH_ASSOC);
?>
<?php
$blogsettings = $db->prepare("select * from blog_ayar where id=:id");
$blogsettings->execute(array(
    'id' => '1'
));
$blogsett = $blogsettings->fetch(PDO::FETCH_ASSOC);
$num = 1;
?>
<?php
$Sayfa = @intval($_GET['page']); if(!$Sayfa) $Sayfa = 1;
$Say = $db->query("select * from blog where durum='1' and dil='$_SESSION[dil]' order by id DESC");
$ToplamVeri = $Say->rowCount();
$Limit = 12;
$Sayfa_Sayisi = ceil($ToplamVeri/$Limit); if($Sayfa > $Sayfa_Sayisi){$Sayfa = 1;}
$Goster = $Sayfa * $Limit - $Limit;
$GorunenSayfa = 5;
$Blog_listele = $db->query("select * from blog where durum='1' and dil='$_SESSION[dil]' order by id DESC limit $Goster,$Limit");
$BlogAl = $Blog_listele->fetchAll(PDO::FETCH_ASSOC);
?>
<title><?php echo ucwords_tr($diller['blog']) ?> | <?php echo $ayar['site_baslik']?></title>
<meta name="description" content="<?php echo"$blogset[meta_desc]" ?>">
<meta name="keywords" content="<?php echo"$blogset[tags]" ?>">
<meta name="news_keywords" content="<?php echo"$blogset[tags]" ?>">
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
        .blog-box-in img{border-radius: <?php echo $blogsett['border_radius'] ?>px}
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
<div class="page-headers-main hero-section hero-background">
    <h1 class="page-title" style="color:#<?php echo $pagehead['text_color'] ?>"> <?php echo ucwords_tr($diller['blog']) ?></h1>
</div>
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="/" class="permal-link"><?php echo $diller['anasayfa'] ?></a></li>
            <li class="nav-item"><span class="current-page"><?php echo ucwords_tr($diller['blog']) ?></span></li>
        </ul>
    </nav>
</div>
<div class="page-contain blog-page">
    <div class="container">
        <div class="biolife-title-box style-02 xs-margin-bottom-33px">
            <h3 class="main-title"><?php echo ucwords_tr($diller['blog']) ?></h3>
            <b class="desc"><?php echo $diller['blog-aciklamasi'] ?></b>
        </div>
        <div id="main-content" class="main-content">
            <div class="row">
                <ul class="posts-list main-post-list">
                    <?php foreach($BlogAl as $blog){?>
                        <li class="post-elem col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="post-item effect-04 style-bottom-info">
                                <div class="thumbnail">
                                    <a href="blog/<?php echo seo($blog['id'])?>/<?php echo seo($blog['baslik']) ?>" class="link-to-post"><img src="images/blog/<?php echo $blog['gorsel'] ?>" alt="<?php echo $blog['baslik'] ?>" width="370" height="270"></a>
                                </div>
                                <div class="post-content">
                                    <h4 class="post-name"><a href="blog/<?php echo seo($blog['id'])?>/<?php echo seo($blog['baslik']) ?>" class="linktopost"><?php echo $blog['baslik'] ?></a></h4>
                                    <p class="excerpt"><?php echo $blog['spot'] ?></p>
                                    <div class="group-buttons">
                                        <a href="blog/<?php echo seo($blog['id'])?>/<?php echo seo($blog['baslik']) ?>" class="btn readmore"><?php echo $diller['blog-devamini-oku']?></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="biolife-panigations-block ">
                <?php if($Sayfa >= 1){?>
                    <nav  style="margin-top: 50px;">
                        <ul class="panigation-contain justify-content-center">
                        <?php } ?>
                        <?php if($Sayfa > 1){?>
                            <li><a class="link-page" href="bloglar/1"><?=$diller['sayfalama-ilk']?></a></li>
                            <li><a class="link-page" href="bloglar/<?=$Sayfa - 1?>"><?=$diller['sayfalama-onceki']?></a></li>
                        <?php } ?>
                        <?php
                        for($i = $Sayfa - $GorunenSayfa; $i < $Sayfa + $GorunenSayfa +1; $i++){ if($i > 0 and $i <= $Sayfa_Sayisi){
                            if($i == $Sayfa){
                                echo '
                                <li class="page-item" aria-current="page">
                                <a class="link-page current-page" href="bloglar/'.$i.'">'.$i.'<span class="sr-only">(current)</span></a>
                                </li>
                                
                                ';
                            }else{
                                echo '
                                <li><a class="link-page" href="bloglar/'.$i.'">'.$i.'</a></li>
                                ';
                            }
                        }
                    }
                    ?>
                    <?php if($Blog_listele->rowCount() <=0) { } else { ?>
                        <?php if($Sayfa != $Sayfa_Sayisi){?>
                            <li><a class="link-page" href="bloglar/<?=$Sayfa + 1?>"><?=$diller['sayfalama-sonraki']?></a></li>
                            <li><a class="link-page" href="bloglar/<?=$Sayfa_Sayisi?>"><?=$diller['sayfalama-son']?></a></li>
                        <?php }} ?>
                        <?php if($Sayfa >= 1){?>
                        </ul>
                    </nav>
                <?php } ?>
                
            </div>
        </div>
    </div>
</div>
<?php include 'includes/template/footer.php'?>
</body>
</html>
<?php include "includes/config/footer_libs.php";?>