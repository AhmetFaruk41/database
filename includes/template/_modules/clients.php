<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?><?php
$markasettings = $db->prepare("select * from marka_ayar where id='1'");
$markasettings->execute();
$markaset = $markasettings->fetch(PDO::FETCH_ASSOC);
$markalimit = $markaset["marka_limit"];

?>
<?php
$num = 1;
$marka_liste = $db->prepare("select * from marka where durum='1' order by sira asc limit $markalimit");
$marka_liste->execute();
?>
<style>
    .clients-home-main-div{width:<?php if($markaset['width']==1){?> 90%; <?php }else {?> 100% <?php }?> ; height: auto; overflow: hidden; background-color: #<?php echo $markaset['back_color'] ?>; padding: <?php echo $markaset['padding'] ?>px 0 <?php echo $markaset['padding'] ?>px 0; }

    .owl-dots button{outline: none !important;  margin-top: 50px !important;}

    .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot span {
        width: 15px;    height: 6px;    margin: 5px 4px;    background: rgba(0,0,0,0.2);    display: block;    -webkit-backface-visibility: visible;    transition: all .2s ease;    border-radius: 30px;
    }
    .owl-dot.active span {   width: 30px !important; background:#<?php echo $ayar['dots_color'] ?> !important;}
</style>

<div class="brand-slide background-fafafa xs-margin-top-50px sm-margin-top-80px sm-margin-bottom-73px">
    <div class="container">
        <div class="biolife-title-box slim-item">
            <span class="subtitle"><?php echo $diller['marka-aciklamasi']?></span>
            <h3 class="main-title"><?php echo $diller['marka']?></h3>
        </div>
        <?php if ($marka_liste->rowCount() > 0 ) { ?>
            <ul class="biolife-carousel nav-center-bold nav-none-on-mobile xs-margin-top-60px sm-margin-top-45px" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3}},{"breakpoint":768, "settings":{ "slidesToShow": 2}}, {"breakpoint":650, "settings":{ "slidesToShow": 1}}]}'>
                <?php foreach ($marka_liste as $marka) { ?>
                    <li>
                        <div class="biolife-brd-container">
                            <a href="<?=$marka['link']?>" class="link">
                                <figure><img src="images/clients/<?php echo $marka['gorsel'] ?>" alt="<?php echo $marka['baslik'] ?>" style="height: 120px;object-fit: contain;"></figure>
                            </a>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
</div>



