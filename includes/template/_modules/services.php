<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?><?php
$serviceayar = $db->prepare("select * from hizmet_ayar where id='1'");
$serviceayar->execute();
$serv = $serviceayar->fetch(PDO::FETCH_ASSOC);
$hizmetlimit = $serv['hizmet_limit'];
?>
<?php
$num = 1;
$serviceliste = $db->prepare("select * from hizmet where durum='1' and dil='$_SESSION[dil]' and anasayfa='1' order by sira asc limit $hizmetlimit");
$serviceliste->execute();
?>
<?php if($serviceliste->rowCount() > 0) {?>

<style>
    .service-home-main-div{width:<?php if($serv['width']==1){?> 90%; <?php }else {?> 100% <?php }?> ; height: auto; overflow: hidden; background-color: #<?php echo $serv['back_color'] ?>; padding: <?php echo $serv['padding'] ?>px 0 <?php echo $serv['padding'] ?>px 0; }

    .owl-dots button{outline: none !important;}

    .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot span {
        width: 15px;    height: 6px;    margin: 5px 4px;    background: rgba(0,0,0,0.2);    display: block;    -webkit-backface-visibility: visible;    transition: all .2s ease;    border-radius: 30px;
    }
    .owl-dot.active span {   width: 30px !important; background:#<?php echo $ayar['dots_color'] ?> !important;}
</style>


<div class="service-home-main-div">

    <div class="modules-header-main">
        <div class="modules-header-main-head" style="background:url(images/<?php echo $serv['divider'] ?>.png) no-repeat center bottom;">
            <div class="modules-header-main-baslik font-open-sans font-<?php echo $serv['font_weight'] ?> font-spacing" style="color:#<?php echo $serv['baslik_color'] ?>">
                <?php echo $diller['hizmetlerimiz']?>
            </div>
            <div class="modules-header-main-spot font-raleway font-light" style="color:#<?php echo $serv['spot_color'] ?>; letter-spacing: 0.07em">
                <?php echo $diller['hizmetlerimiz-aciklamasi']?>
            </div>
        </div>
    </div>

    <div class="<?php if($serv['tip'] == 2 || $serv['tip'] == 1) { ?>service-home-main-div-inside-2 <?php } else {?> service-home-main-div-inside <?php }?> counters">


        <?php if($serv['tip'] == 0) { ?>
        <!-- TİP 0 ========================== !-->


        <div class="owl-carousel owl-theme" >

            <?php foreach ($serviceliste as $ser)  {     ?>

            <div class="service-image-box" data-appear-animation="fadeInUp" data-appear-animation-delay="<?php echo $num++ ?>00">

                <?php
                if($serv['detay_url'] == 0) {  ?>

                    <img src="images/services/<?php echo $ser['gorsel'] ?>" alt="<?php echo $ser['baslik'] ?>">
                    <h1 class="font-open-sans" style="color:#<?php echo $serv['hizmet_color'] ?>" ><?php echo $ser['baslik'] ?></h1>

                <?php }?>
                <?php
                if($serv['detay_url'] == 1) {  ?>

                    <a href="hizmet/<?php echo seo($ser['id'])?>/<?php echo seo($ser['baslik']) ?>">
                        <img src="images/services/<?php echo $ser['gorsel'] ?>" alt="<?php echo $ser['baslik'] ?>">
                    </a>
                    <a href="hizmet/<?php echo seo($ser['id'])?>/<?php echo seo($ser['baslik']) ?>" style="color:#<?php echo $serv['hizmet_color'] ?>">
                        <h1 class="font-open-sans"  ><?php echo $ser['baslik'] ?></h1>
                    </a>

                <?php }?>

                <h2 style="color:#<?php echo $serv['spot_color'] ?>"><?php echo $ser['spot'] ?></h2>
            </div>
            <?php }?>

        </div>


        <script>
            $(document).ready(function() {
                var owl = $('.owl-carousel');
                owl.owlCarousel({
                    margin: 50,
                    nav: false,
                    dots:true,

                    navText: ["<img src='images/arrowleft.png'>","<img src='images/arrowright.png'>"],
                    navClass:['product_prev','product_next'],
                    responsiveClass:true,
                    loop: true,
                    autoplayHoverPause: true,
                    autoplay:true,
                    autoplayTimeout:3000,
                    rewindNav:true,
                    responsive: {
                        <?php
                        if($serviceliste->rowCount()==1) {
                        ?>
                        0: {
                            items: 1
                        },

                        400: {
                            items: 1
                        },
                        415: {
                            items: 1
                        },
                        800: {
                            items: 1
                        },
                        1000: {
                            items: 1
                        },
                        1100: {
                            items: 1
                        },
                        1600: {
                            items: 1
                        },
                        1920: {
                            items: 1
                        }
                        <?php }?>
                        <?php
                        if($serviceliste->rowCount()==2) {
                        ?>
                        0: {
                            items: 1
                        },

                        400: {
                            items: 1
                        },
                        415: {
                            items: 1
                        },
                        800: {
                            items: 1
                        },
                        1000: {
                            items: 2
                        },
                        1100: {
                            items: 2
                        },
                        1600: {
                            items: 2
                        },
                        1920: {
                            items: 2
                        }
                        <?php }?>

                        <?php
                        if($serviceliste->rowCount()>=3) {
                        ?>
                        0: {
                            items: 1
                        },

                        400: {
                            items: 1
                        },
                        415: {
                            items: 2
                        },
                        800: {
                            items: 1
                        },
                        1000: {
                            items: 3
                        },
                        1100: {
                            items: 3
                        },
                        1600: {
                            items: 3
                        },
                        1920: {
                            items: 3
                        }
                        <?php }?>

                    }
                })
            })
        </script>

        <!-- TİP 0 ========================== !-->

        <?php }?>






        <?php if($serv['tip'] == 1)
        {
        ?>
        <!-- TİP 1 ========================== !-->

    <?php foreach ($serviceliste as $ser2) {  ?><div class="service-icon-1-box" data-appear-animation="fadeInUp" data-appear-animation-delay="<?php echo $num++ ?>00">
            <div class="service-icon-1-icon">
                <i class="fa <?php echo $ser2['icon'] ?>" style="color:#<?php echo $serv['icon_color'] ?>"></i>
            </div><div class="service-icon-1-text">


                <?php
                if($serv['detay_url'] == 0) {  ?>
                <h1 class="font-open-sans" style="color:#<?php echo $serv['hizmet_color'] ?>"><?php echo $ser2['baslik'] ?></h1>
                <?php }?>

                <?php
                if($serv['detay_url'] == 1) {  ?>
                <a href="hizmet/<?php echo seo($ser2['id'])?>/<?php echo seo($ser2['baslik']) ?>" style="color:#<?php echo $serv['hizmet_color'] ?>">
                    <h1 class="font-open-sans"><?php echo $ser2['baslik'] ?></h1>
                </a>
                <?php }?>

                <h2 class="font-raleway" style="color:#<?php echo $serv['spot_color'] ?>"><?php echo $ser2['spot'] ?></h2>
            </div>
        </div><?php } ?>

        <!-- TİP 1 ========================== !-->
        <?php }?>



        <?php if($serv['tip'] == 2)
        {
        ?>
        <!-- TİP 2 ========================== !-->
            <?php foreach ($serviceliste as $ser3) {  ?><div class="service-icon-2-box">

            <i class="fa <?php echo $ser3['icon'] ?>" style="color:#<?php echo $serv['icon_color'] ?>"></i>


                <?php
                if($serv['detay_url'] == 0) {  ?>
                    <h1 class="font-open-sans" style="color:#<?php echo $serv['hizmet_color'] ?>"><?php echo $ser3['baslik'] ?></h1>
                <?php }?>

                <?php
                if($serv['detay_url'] == 1) {  ?>
                    <a href="hizmet/<?php echo seo($ser3['id'])?>/<?php echo seo($ser3['baslik']) ?>" style="color:#<?php echo $serv['hizmet_color'] ?>">
                        <h1 class="font-open-sans"><?php echo $ser3['baslik'] ?></h1>
                    </a>
                <?php }?>

                <h2 class="font-raleway" style="color:#<?php echo $serv['spot_color'] ?>"><?php echo $ser3['spot'] ?></h2>
            </div><?php } ?>


        <!-- TİP 2 ========================== !-->
        <?php }?>


    </div>
</div>
<?php } else { ?>

<style>
    .service-home-main-div{width:<?php if($serv['width']==1){?> 90%; <?php }else {?> 100% <?php }?> ; height: auto; overflow: hidden; background-color: #<?php echo $serv['back_color'] ?>; padding: <?php echo $serv['padding'] ?>px 0 <?php echo $serv['padding'] ?>px 0; }

</style>


<div class="service-home-main-div" style="text-align: center; line-height: 30px ">
    <i class="fa fa-exclamation-circle" style="font-size:35px"></i> <br>
    <span class="font-17 font-bold font-open-sans">HENÜZ HİZMET EKLENMEMİŞ VEYA ANASAYFA SEÇİMİ YAPILMAMIŞ!</span> <br> <br>
    <span class="font-17 font-small font-open-sans">Lüfen firmanıza ait hizmetleriniz belirtmek için yeni hizmetler ekleyiniz</span> <br>
    <span class="font-13 font-small font-open-sans">Ayrıca panelinizden hizmet görünüm tiplerini seçebilir, kendinize göre renk seçimleri yapabilirsiniz</span>
</div>

<?php }?>
