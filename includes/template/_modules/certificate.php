<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?><?php
$belgesettings = $db->prepare("select * from belge_ayar where id='1'");
$belgesettings->execute();
$belgeset = $belgesettings->fetch(PDO::FETCH_ASSOC);
$belgelimit = $belgeset['belge_limit'];

?>
<?php
$num = 1;
$belge_liste = $db->prepare("select * from belge where durum='1' order by sira asc limit $belgelimit");
$belge_liste->execute();
?>
<style>
    .belge-home-main-div{width:<?php if($belgeset['width']==1){?> 90%; <?php }else {?> 100% <?php }?> ; height: auto; overflow: hidden; background-color: #<?php echo $belgeset['back_color'] ?>; padding: <?php echo $belgeset['padding'] ?>px 0 <?php echo $belgeset['padding'] ?>px 0; }

    .owl-dots button{outline: none !important;  margin-top: 50px !important;}

    .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot span {
        width: 15px;    height: 6px;    margin: 5px 4px;    background: rgba(0,0,0,0.2);    display: block;    -webkit-backface-visibility: visible;    transition: all .2s ease;    border-radius: 30px;
    }
    .owl-dot.active span {   width: 30px !important; background:#<?php echo $ayar['dots_color'] ?> !important;}
</style>


<div class="belge-home-main-div">

    <div class="modules-header-main">
        <div class="modules-header-main-head" style="background:url(images/<?php echo $belgeset['divider'] ?>.png) no-repeat center bottom;">
            <div class="modules-header-main-baslik font-open-sans font-<?php echo $belgeset['font_weight'] ?> font-spacing" style="color:#<?php echo $belgeset['baslik_color'] ?>">
                <?php echo $diller['belge']?>
            </div>
            <div class="modules-header-main-spot font-raleway font-light" style="color:#<?php echo $belgeset['spot_color'] ?>; letter-spacing: 0.07em">
                <?php echo $diller['belge-aciklamasi']?>
            </div>
        </div>
    </div>

    <div class="belge-home-main-div-inside counters" <?php if ($belge_liste->rowCount() == 2) { ?> style="width: 800px;" <?php }?> >





        <div class="belge-owl owl-theme" id="portfolio" >


            <?php if ($belge_liste->rowCount() > 0) { ?>

            <?php foreach ($belge_liste as $belge) { ?>
                <div class="belge-box" data-appear-animation="fadeInUp" data-appear-animation-delay="<?php echo $num++ ?>00">

                    <a href="images/belge/<?php echo $belge['gorsel'] ?>">

                    <div class="belge-box-overlay">
                    <div class="belge-box-overlay-table">
                        <div class="belge-box-overlay-table-in">
                            <i class="fa fa-plus"></i>
                        </div>
                    </div>
                    </div>


                    <img src="images/belge/<?php echo $belge['gorsel'] ?>" alt="<?php echo $belge['baslik'] ?>">

                    </a>
                </div>
           <?php } ?>

            <?php } else { ?>

                <div class="belge-box" data-appear-animation="fadeInUp" data-appear-animation-delay="300">

                    <a href="https://via.placeholder.com/400x400?text=No+Image">

                        <div class="belge-box-overlay">
                            <div class="belge-box-overlay-table">
                                <div class="belge-box-overlay-table-in">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </div>
                        </div>


                        <img src="https://via.placeholder.com/400x400?text=No+Image" alt="NoImage">

                    </a>
                </div>

            <?php } ?>


        </div>


        <script>
            $(document).ready(function() {
                var owl = $('.belge-owl');
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
                    responsive: {
                        <?php
                        if($belge_liste->rowCount()>=4) {
                        ?>
                        0: {
                            items: 2
                        },

                        400: {
                            items: 2
                        },
                        415: {
                            items: 2
                        },
                        800: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        },
                        1100: {
                            items: 3
                        },
                        1600: {
                            items: 4
                        },
                        1920: {
                            items: 4
                        }
                        <?php }?>
                        <?php
                        if($belge_liste->rowCount() ==3) {
                        ?>
                        0: {
                            items: 2
                        },

                        400: {
                            items: 2
                        },
                        415: {
                            items: 2
                        },
                        800: {
                            items: 2
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
                        <?php
                        if($belge_liste->rowCount() ==2) {
                        ?>
                        0: {
                            items: 2
                        },

                        400: {
                            items: 2
                        },
                        415: {
                            items: 2
                        },
                        800: {
                            items: 2
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
                        if($belge_liste->rowCount() ==1) {
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
                    }
                })
            })
        </script>


    </div>
</div>
