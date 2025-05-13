<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117170495-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-117170495-2');
</script>

<?php
$footersettings = $db->prepare("select * from footer_ayar where id='1'");
$footersettings->execute();
$footset = $footersettings->fetch(PDO::FETCH_ASSOC);

$footer_about_text = $db->prepare("select * from about_page where dil='$_SESSION[dil]' ");
$footer_about_text->execute();
$about = $footer_about_text->fetch(PDO::FETCH_ASSOC);

$footer_social_links = $db->prepare("select * from sosyal order by sira asc ");
$footer_social_links->execute();

$footer_links_0 = $db->prepare("select * from footer_menu where yer='0' and durum='1' and dil='$_SESSION[dil]' order by sira asc ");
$footer_links_0->execute();

$footer_links_1 = $db->prepare("select * from footer_menu where yer='1' and durum='1' and dil='$_SESSION[dil]' order by sira asc ");
$footer_links_1->execute();
?>
<style>
    .footer-main-div{width:<?php if($footset['width']==1){?> 90%; <?php }else {?> 100% <?php }?> ; height: auto; overflow: hidden; }
</style>
<?php include 'includes/template/_modules/trigger_bottom.php'?>
<footer id="footer" class="footer layout-03">
    <div class="footer-content background-footer-03">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-9">
                    <section class="footer-item">
                        <a href="/" class="logo footer-logo"><img src="images/logo/<?php echo $ayar['site_footer_logo'] ?>" alt="<?php echo $ayar['site_baslik'] ?>" width="135" height="36"></a>
                    <?php if($about['spot'] == null) {} else { ?>
                        <p><?php echo $about['spot'] ?></p>
                         <a href="kurumsal/<?php echo $about['seo_url'] ?>" style="color:#766239 !important;">
                        <span style="color:#766239 !important;">
                            <?php echo $diller['footer-hakkimizda-devami'] ?>
                            <i class="fa fa-arrow-right" aria-hidden="true" style="margin-left: 10px;"></i>
                        </span>
                        </a>
                    <?php } ?>
                    </section>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-6 md-margin-top-5px sm-margin-top-50px xs-margin-top-40px">
                    <section class="footer-item">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-xs-6">

                                <h3 class="section-title"> <?php echo $diller['kurumsal'] ?></h3>
                                <div class="wrap-custom-menu vertical-menu-2">
                                    <ul class="menu">
                                        <?php foreach ($footer_links_0 as $flink0) { ?>
                                            <li><a href="<?php echo $flink0['url'] ?>"><?php echo $flink0['baslik'] ?></a></li>
                                        <?php }?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-xs-6">
                                <div class="wrap-custom-menu vertical-menu-2">
                                    <h3 class="section-title"><?php echo $diller['baglantilar'] ?></h3>
                                    <ul class="menu">
                                        <?php foreach ($footer_links_1 as $flink1) { ?>
                                            <li><a href="<?php echo $flink1['url'] ?>"><?php echo $flink1['baslik'] ?></a></li>
                                        <?php }?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 md-margin-top-5px sm-margin-top-50px xs-margin-top-40px">
                    <section class="footer-item">
                        <div class="contact-info-block footer-layout xs-padding-top-10px">
                            <ul class="contact-lines">
                            <?php if($ayar['adres_bilgisi'] == null) {} else { ?>
                                <li>
                                    <p class="info-item">
                                        <i class="fa fa-globe"></i> 
                                        <b class="desc" style="color:#8d8d8d;"><?php echo $ayar['adres_bilgisi'] ?> </b>
                                    </p>
                                </li>

                            <?php } ?>

                            <?php if($ayar['site_tel'] == null) {} else { ?>
                                 <li>
                                    <p class="info-item">
                                        <i class="fa fa-phone"></i>
                                        <b class="desc"><a href="tel:<?=$telsonuc?>" style="text-decoration: none; color:#8d8d8d">
                                            <?php echo $ayar['site_tel'] ?>
                                    </a> </b>
                                    </p>
                                </li>
                            <?php } ?>
                            <?php if($ayar['site_gsm'] == null) {} else { ?>
                                <li>
                                    <p class="info-item">
                                        <i class="fa fa-phone"></i>
                                        <b class="desc"><a href="tel:<?=$gsmsonuc?>" style="text-decoration: none; color:#8d8d8d">
                                            <?php echo $ayar['site_gsm'] ?>
                                    </a> </b>
                                    </p>
                                </li>
                            <?php } ?>
                            <?php if($ayar['site_whatsapp'] == null) {} else { ?>
                                <li>
                                    <p class="info-item">
                                        <i class="fa fa-phone"></i>
                                        <b class="desc"><a href="https://api.whatsapp.com/send?phone=<?=$whtsonuc2?>&text=Merhaba&source=&data=" target="_blank" style="text-decoration: none; color:#8d8d8d">
                                            <?php echo $whtsonuc1 ?>
                                    </a> </b>
                                    </p>
                                </li>
                            <?php } ?>

                            <?php if($ayar['site_mail'] == null) {} else { ?>
                                <li>
                                    <p class="info-item">
                                        <i class="fa fa-envelope-o" style="margin-top: 1px"></i>
                                        <b class="desc" style="color:#8d8d8d;"><?php echo $ayar['site_mail'] ?></b>
                                    </p>
                                </li>
                            <?php } ?>

                            <?php if($ayar['site_workhour'] == null) {} else { ?>
                                <li>
                                    <p class="info-item">
                                        <i class="fa fa-clock-o" style="margin-top: 4px;"></i>
                                        <b class="desc"><?php echo $diller['calisma-saatleri'] ?></b>
                                        <br>
                                        <b><?php echo $ayar['site_workhour'] ?></b>
                                    </p>
                                </li>
                            <?php } ?>
                            </ul>
                        </div>
                        <div class="biolife-social inline">
                            <ul class="socials">
                               <?php foreach ($footer_social_links as $soc) { ?>
                                <li><a href="<?php echo $soc['url'] ?>"  target="_blank" title="<?php echo $soc['baslik'] ?>" class="socail-btn"><i class="fa <?php echo $soc['icon'] ?>" data-toggle="tooltip" data-placement="bottom"></i></a></li>
                            <?php }?>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="separator sm-margin-top-62px xs-margin-top-40px"></div>
                </div>
                <div class="col-lg-6 col-sm-12 col-xs-12">
                    <div class="copy-right-text">
                        <p><?php echo $ayar['copyright_1'] ?></p>
                        <p><?php echo $ayar['copyright_2'] ?></p>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-xs-12">
                  <?php if($footset['gorsel_onay'] == 0) {} else { ?>
                    <img src="images/uploads/<?php echo $footset['gorsel'] ?>" alt="<?php echo $footset['gorsel'] ?>" style="height: 30px;object-fit: contain;margin: 1em;float: right;">
                <?php }?>
                </div>
            </div>
        </div>
    </div>
</footer>
