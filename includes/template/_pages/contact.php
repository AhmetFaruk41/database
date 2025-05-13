<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$sosyalmedya_cek=$db->prepare("select * from sosyal order by sira asc");
$sosyalmedya_cek->execute();
?>
<?php
$page_header_setting = $db->prepare("select * from page_header where page_id='hakkimizda' order by id");
$page_header_setting->execute();
$pagehead = $page_header_setting->fetch(PDO::FETCH_ASSOC);
?>
<title><?php echo $diller['iletisim-title'] ?> | <?php echo $ayar['site_baslik']?></title>
<meta name="description" content="<?php echo"$ayar[site_desc]" ?>">
<meta name="keywords" content="<?php echo"$ayar[site_tags]" ?>">
<meta name="news_keywords" content="<?php echo"$ayar[site_tags]" ?>">
<meta name="author" content="<?php echo"$ayar[site_baslik]" ?>" />
<meta itemprop="author" content="<?php echo"$ayar[site_baslik]" ?>" />
<meta name="robots" content="index follow">
<meta name="googlebot" content="index follow">
<meta property="og:type" content="website" />

<?php include "includes/config/header_libs.php";?>

    <style>
        .form-control {
            border-radius: 0;
            height:  calc(2em + .75rem + 2px);

        }
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
    </style>
</head>
<body>
<?php include 'includes/template/pre-loader.php'?>
<?php include 'includes/template/header.php'?>

<div class="page-headers-main hero-section hero-background">
    <h1 class="page-title" style="color:#<?php echo $pagehead['text_color'] ?>"> <?php echo ucwords_tr($diller['iletisim']) ?></h1>
</div>
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="/" class="permal-link"><?php echo $diller['anasayfa'] ?></a></li>
            <li class="nav-item"><span class="current-page"><?php echo ucwords_tr($diller['iletisim']) ?></span></li>
        </ul>
    </nav>
</div>

<div class="page-contain contact-us">
    <?php if ($ayar['site_maps_kodu'] == !null) {?>
        <div class="contact-page-maps-area">
        </div>
    <div id="main-content" class="main-content">
        <div class="wrap-map biolife-wrap-map" id="map-block">
            <style>
                .wrap-map > iframe{
                    width: 100%;
                    height: 600px;
                }
            </style>
            <?=$ayar['site_maps_kodu']?>
    </div>
    <?php }?>

    <div class="container">

        <div class="row">

            <!--Contact info-->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="contact-info-container sm-margin-top-27px xs-margin-bottom-60px xs-margin-top-60px">
                    <h4 class="box-title"><?php echo $diller['bize-yazin']?></h4>
                    <ul class="addr-info">
                        <?php if($ayar['adres_bilgisi'] ==! null){?>
                            <li>
                                <div class="if-item">
                                    <b class="tie"><i class="fa fa-map-marker"></i> Adres:</b>
                                    <p class="dsc"><?=$ayar['adres_bilgisi']?></p>
                                </div>
                            </li>
                        <?php } ?>
                        <?php if($ayar['site_tel'] ==! null){?>
                        <li>
                            <div class="if-item">
                                <b class="tie"><i class="fa fa-phone"></i> İş Telefon:</b>
                                <p class="dsc"><?=$ayar['site_tel']?></p>
                            </div>
                        </li>
                        <?php } ?>
                        <?php if($ayar['site_gsm'] ==! null){?>
                        <li>
                            <div class="if-item">
                                <b class="tie"><i class="fa fa-mobile"></i> Cep Telefon:</b>
                                <p class="dsc"><?=$ayar['site_gsm']?></p>
                            </div>
                        </li>
                        <?php } ?>
                        <?php if($ayar['site_whatsapp'] ==! null){?>
                            <li>
                                <div class="if-item">
                                    <b class="tie"><i class="fa fa-whatsapp" style="color:limegreen; "></i> Whatsapp:</b>
                                    <p class="dsc"><?=$ayar['site_whatsapp']?></p>
                                </div>
                            </li>
                        <?php } ?>
                        <?php if($ayar['site_mail'] ==! null){?>
                            <li>
                                <div class="if-item">
                                    <b class="tie"><i class="fa fa-envelope-o"></i> E-Posta:</b>
                                    <p class="dsc"><?=$ayar['site_mail']?></p>
                                </div>
                            </li>
                        <?php } ?>
                        <?php if($ayar['site_workhour'] == !null){?>
                            <li>
                                <div class="if-item">
                                    <b class="tie"><i class="fa fa-clock-o"></i> <strong> <?php echo $diller['calisma-saatleri'] ?></strong></b>
                                    <div class="col-lg-12"></div>
                                    <p class="dsc"><?=$ayar['site_workhour']?></p>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                <?php if($sosyalmedya_cek->rowCount() > 0) {?>
                    <div class="biolife-social inline">
                        <ul class="socials">
                            <?php foreach ($sosyalmedya_cek as $sosyal) {?>
                                <li><a href="<?=$sosyal['url']?>" target="_blank" title="<?=$sosyal['baslik']?>" class="socail-btn"><i class="fa <?=$sosyal['icon']?>"></i></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="contact-form-container sm-margin-top-112px">
                    <form method="post" action="includes/post/contactpost.php" name="frm-contact" >
                        <p class="form-row">
                            <input type="text" name="isim" required placeholder="<?=$diller['iletisim-isim']?>" class="txt-input">
                        </p>
                        <p class="form-row">
                            <input type="email" name="eposta" required placeholder="<?=$diller['iletisim-mail']?>" class="txt-input">
                        </p>
                        <p class="form-row">
                            <input type="number" required minlength="0" maxlength="11" name="telno" placeholder="<?=$diller['iletisim-telno']?>" class="txt-input">
                        </p>
                        <p class="form-row">
                            <textarea name="mesaj" required id="mes-1" cols="30" rows="9" placeholder="<?=$diller['iletisim-mesaj']?>"></textarea>
                        </p>
                        <?php
                        if($ayar['site_captcha'] == 1)
                        {
                            ?>
                            <!-- GÜVENLİK CAPTCHA ========== !-->
                            <div class="form-row">
                                <?php $kod=$_SESSION['secure_code'];?>
                                <div class="form-group ">
                                    <label for="inputCaptcha"><?=$diller['guvenlik-kodu']?></label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><img style="height: 50px" src='includes/template/captcha.php'/></div>
                                        </div>
                                        <input type="text" class="form-control form-captcha-height" id="inputCaptcha"  required name="secure_code" maxlength="5" style="width: 100%;height: 50px">
                                    </div>
                                </div>
                            </div>
                            <!-- GÜVENLİK CAPTCHA ========== !-->
                        <?php }?>
                        <p class="form-row">
                            <button class="btn btn-submit" type="submit" name="contactgonder"><?=$diller['iletisim-button-gonder']?></button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php if($_GET['status']=='success'){ ?>
    <script>
        $(document).ready(function () {
            swal({
                title: "<?=$diller['post-basarili']?>",
                text: "<?=$diller['post-iletisim-basarili-aciklamasi']?>",
                type: "success",
                timer: '3500',
                showConfirmButton: true,
                confirmButtonText:"<?=$diller['button-tamam']?>",
            });
        });
    </script>
    <meta http-equiv="refresh" content="3; URL=index.html">
<?php }?>
<?php if($_GET['status']=='warning'){ ?>
<script>
    $(document).ready(function () {
        swal({
            title: "<?=$diller['post-hata']?>",
            text: "<?=$diller['post-guvenlik-kod-hata']?>",
            type: "warning",
            showConfirmButton: true,
            confirmButtonText:"<?=$diller['button-tamam']?>",
        });
    });
</script>
<?php }?>
<?php if($_GET['status']=='critical'){ ?>
<script>
    $(document).ready(function () {
        swal({
            title: "KRİTİK HATA!",
            text: "SMTP Ayarlarınız hatalı! Başvuru sisteme girildi ancak bildirim gönderilemedi.",
            type: "warning",
            timer: '3500',
            showConfirmButton: true,
            confirmButtonText:"<?=$diller['button-tamam']?>",
        });
    });
</script>
<meta http-equiv="refresh" content="3; URL=index.html">
<?php }?>


<?php if(isset($_SESSION['contact_array']) && $_SESSION['contact_array']['status'] == 'error'){ ?>
    <script>
        $(document).ready(function () {
            swal({
                title: "<?=$diller['post-hata']?>",
                text: "<?=$diller['form-eksik-alan']?>",
                type: "warning",
                timer: '3500',
                showConfirmButton: true,
                confirmButtonText:"<?=$diller['button-tamam']?>",
            });
        });
    </script>
    <meta http-equiv="refresh" content="3; URL=iletisim">
    <?php unset($_SESSION['contact_array']); ?>
<?php }?>


<?php include 'includes/template/footer.php'?>
</body>
    </html>
<?php include "includes/config/footer_libs.php";?>