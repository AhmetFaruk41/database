<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$faqSettings = $db->prepare("select * from sss_ayar where id=:id");
$faqSettings->execute(array(
        'id' => '1'
));
$faqset = $faqSettings->fetch(PDO::FETCH_ASSOC);
?>
<?php
$faqCek = $db->prepare("select * from sss where durum=:durum and dil=:dil order by sira asc");
$faqCek->execute(array(
        'durum' => '1',
        'dil' => $_SESSION['dil']
));
?>
<?php
$page_header_setting = $db->prepare("select * from page_header where page_id='faq' order by id");
$page_header_setting->execute();
$pagehead = $page_header_setting->fetch(PDO::FETCH_ASSOC);
?>
<title><?php echo ucwords_tr($diller['sss']) ?> | <?php echo $ayar['site_baslik']?></title>
<meta name="description" content="<?php echo"$faqset[meta_desc]" ?>">
<meta name="keywords" content="<?php echo"$faqset[tags]" ?>">
<meta name="news_keywords" content="<?php echo"$faqset[tags]" ?>">
<meta name="author" content="<?php echo"$ayar[site_baslik]" ?>" />
<meta itemprop="author" content="<?php echo"$ayar[site_baslik]" ?>" />
<meta name="robots" content="index follow">
<meta name="googlebot" content="index follow">
<meta property="og:type" content="website" />

<?php include "includes/config/header_libs.php";?>
    <style>
        .about-counter-div{background: #<?php echo $about['counter_bgcolor'] ?>}
    </style>
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

    .swiper-slide img{width: 100%;}


    @media screen and (max-width:410px) and (min-width:321px) {


    }


</style>
<style>
    .accordion_main {  width: 100%; font-family: 'Open Sans', Arial; text-align: left  }

    .accordion-header,
    .accordion-body {}

    .accordion__item{border:1px solid #EBEBEB !important; margin-bottom: 10px;}
    .accordion-header {
        padding: 1.5em 1.5em;
        background: #F8F8F8;
        color: #000;
        cursor: pointer;
        font-size:15px; font-weight: 600;
        letter-spacing: .05em;
        transition: all .3s;
    }
    .accordion__item:last-child{border-bottom:1px solid #EBEBEB !important;}


    .accordion-body {
        background: #FFF;
        color: #3f3c3c;
        display: none;
    }

    .accordion-body__contents {
        padding: 0 1.5em 25px 1.5em; line-height: 25px;
        font-size: 14px;  width: 100%;letter-spacing: .03em;
    }

    .accordion__item.active:last-child .accordion-header {
        border-radius: 0;
    }

    .accordion:first-child > .accordion__item > .accordion-header {
        border-bottom: 1px solid transparent;
    }

    .accordion__item > .accordion-header:after {
        content: "\f3d0";
        font-family: IonIcons;
        font-size: 1.2em;
        float: right;
        position: relative;
        top: -2px;
        transition: .3s all;
        transform: rotate(0deg);
    }

    .accordion__item.active > .accordion-header:after {
        transform: rotate(-180deg);
    }

    .accordion__item.active .accordion-header {
        background: #FFF;
        color:#000
    }

    .accordion__item .accordion__item .accordion-header {
        background: #f1f1f1;
        color: black;
    }

</style>
<div class="page-headers-main">
    <div class="page-headers-main-in">
        <div class="page-headers-main-left font-raleway font-18 font-small font-spacing" style="color:#<?php echo $pagehead['text_color'] ?>">

            <?php echo ucwords_tr($diller['sss']) ?>

        </div><div class="page-headers-main-right font-raleway font-12 font-spacing">

            <span style="color:#<?php echo $pagehead['pasif_text_color'] ?>; padding-right: 15px;"><?php echo $diller['buradasiniz'] ?>:</span>
            <a href="index.html" style="color:#<?php echo $pagehead['text_color'] ?>;"><span style="padding-right: 15px; font-weight: 600"><?php echo $diller['anasayfa'] ?></span></a>
            <span style="color:#<?php echo $pagehead['pasif_text_color'] ?>; padding-right: 15px;">/</span>
            <span style="padding-right: 15px; color:#<?php echo $pagehead['text_color'] ?>;"><?php echo ucwords_tr($diller['sss']) ?></span>
        </div>
    </div>
</div>
<!-- Page Header ====================== !-->



<!-- CONTENT AREA ============== !-->

<div class="faq-page-main">



    <div class="faq-page-text-main">

        <div class="faq-page-baslik font-open-sans font-30 font-bold">

            <?php echo ucwords_tr($diller['sss']) ?>

        </div>



        <div class="page-spot-quote font-open-sans font-17 font-small">

            <?php echo $diller['sss-aciklamasi'] ?>

        </div>


        <div class="skill-page-content">


            <div class="accordion_main js-accordion">
                <?php foreach ($faqCek as $sss) { ?>
                    <div class="accordion__item js-accordion-item ">
                        <div class="accordion-header js-accordion-header"><div class="faq_span"><?=$sss['soru']?></div></div>
                        <div class="accordion-body js-accordion-body">
                            <div class="accordion-body__contents">
                                <?=$sss['cevap']?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($faqCek->rowCount() <=0) { ?>
                    <div class="alert alert-danger">Soru eklenmemiş</div>
                <?php }?>
            </div>




        </div>

    </div>




</div>

<!-- CONTENT AREA ============== !-->



<?php include 'includes/template/footer.php'?>
</body>
    </html>
<?php include "includes/config/footer_libs.php";?>
<script id="rendered-js">
    var accordion = function () {

        var $accordion = $('.js-accordion');
        var $accordion_header = $accordion.find('.js-accordion-header');
        var $accordion_item = $('.js-accordion-item');

        // default settings
        var settings = {
            // animation speed
            speed: 400,

            // close all other accordion items if true
            oneOpen: false };


        return {
            // pass configurable object literal
            init: function ($settings) {
                $accordion_header.on('click', function () {
                    accordion.toggle($(this));
                });

                $.extend(settings, $settings);

                // ensure only one accordion is active if oneOpen is true
                if (settings.oneOpen && $('.js-accordion-item.active').length > 1) {
                    $('.js-accordion-item.active:not(:first)').removeClass('active');
                }

                // reveal the active accordion bodies
                $('.js-accordion-item.active').find('> .js-accordion-body').show();
            },
            toggle: function ($this) {

                if (settings.oneOpen && $this[0] != $this.closest('.js-accordion').find('> .js-accordion-item.active > .js-accordion-header')[0]) {
                    $this.closest('.js-accordion').
                    find('> .js-accordion-item').
                    removeClass('active').
                    find('.js-accordion-body').
                    slideUp();
                }

                // show/hide the clicked accordion item
                $this.closest('.js-accordion-item').toggleClass('active');
                $this.next().stop().slideToggle(settings.speed);
            } };

    }();

    $(document).ready(function () {
        accordion.init({ speed: 300, oneOpen: true });
    });
    //# sourceURL=pen.js
</script>
