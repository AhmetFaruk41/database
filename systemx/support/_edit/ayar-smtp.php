<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>SMTP Ayarları | <?=$ayar['site_baslik']?></title>


<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="ti-envelope"></i> SMTP Ayarları</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item active">SMTP Ayarları</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">




            <div class="card-body" style="font-family: 'Open Sans', Arial">

                <form action="support/post/update/ayar-smtp.php" class="form-horizontal form-bordered" method="post">

                    <h3 class="card-title">SMTP Ayarları</h3>
                    <hr>
                    <div class="form-body">



                        <div class="form-group row">
                            <label class="control-label text-right col-md-3"  style="margin-top: 7px; margin-bottom: 10px; font-weight: 600"><img src="support/images/gmailyandexmail.png"></label>


                            <div class="col-md-6">
                                <div class="alert alert-dark" style="padding: 15px 0 15px 15px; font-weight: bold;">Gmail ve Yandex Mail SMTP Kurulum Anlatımı En Aşağıdadır <i class="fa fa-arrow-down"></i></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="smtpDurum" style="margin-top: 7px; margin-bottom: 10px; font-weight: 600">SMTP Durumu</label>


                            <div class="col-md-6">
                                <input type='hidden' value='0' name='smtp_durum'>
                                <input type="checkbox" id="smtpDurum" <?php if($ayar['smtp_durum'] == 1){?>checked<?php }?> class="js-switch" data-color="#f62d51" name="smtp_durum" value="1" />
                                <br>
                                <small class="form-control-feedback text-danger" style="font-size:13px"> Pasifleştirirseniz E-Posta ile bildirim olmaz</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="protk" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">SMTP Protokolü</label>
                            <div class="col-md-6">
                                <select name="smtp_protokol" id="protk" class="selectpicker col-md-12 p-l-0 p-r-0" data-style="form-control btn-secondary">
                                    <option value="0" <?php if($ayar['smtp_protokol'] === '0') {?>selected <?php }?>   >Yok</option>
                                    <option value="tls" <?php if($ayar['smtp_protokol'] === 'tls') {?>selected <?php }?> >TLS</option>
                                    <option value="ssl" <?php if($ayar['smtp_protokol'] === 'ssl') {?>selected <?php }?> >SSL</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="smtpHost" style="margin-top: 9px;  margin-bottom: 10px; font-weight: 600">SMTP Host</label>
                            <div class="col-md-6">
                                <input type="text" id="smtpHost"  class="form-control"  name="smtp_host" value="<?=$ayar['smtp_host']?>" style="margin-bottom: 10px;">
                                <br>
                                <small class="form-control-feedback text-info" style="font-size:13px"> Örn : mail.siteadresiniz.com veya ssl://smtp.gmail.com</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="smtpMail" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">SMTP Mail</label>
                            <div class="col-md-6">
                                <input type="text" id="smtpMail" class="form-control"  name="smtp_mail" value="<?=$ayar['smtp_mail']?>">
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="smtpPass" style="margin-top: 9px;  margin-bottom: 10px; font-weight: 600">SMTP Şifreniz</label>
                            <div class="col-md-6">
                                <input type="text" id="smtpPass"  class="form-control"  name="smtp_pass" value="<?=$ayar['smtp_pass']?>" style="margin-bottom: 10px;">
                                <br>
                                <small class="form-control-feedback text-info" style="font-size:13px"> SMTP Mail adresinizin şifresi</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="smtpPort" style="margin-top: 9px;  margin-bottom: 10px; font-weight: 600">SMTP Port</label>
                            <div class="col-md-6">
                                <input type="text" id="smtpPort"  class="form-control"  name="smtp_port" value="<?=$ayar['smtp_port']?>" style="margin-bottom: 10px;">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="smtpBildirim" style="margin-top: 9px;  margin-bottom: 10px; font-weight: 600">Bildirim E-Posta Adresi</label>
                            <div class="col-md-6">
                                <input type="text" id="smtpBildirim"  class="form-control"  name="smtp_bildirim_mail" value="<?=$ayar['smtp_bildirim_mail']?>" style="margin-bottom: 10px;">
                                <br>
                                <small class="form-control-feedback text-success" style="font-size:13px"><i class="fa fa-bell"></i> Size gelecek olan bildirimler için e-posta adresi giriniz</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="" style="margin-top: 9px;  margin-bottom: 10px; font-weight: 600"></label>
                            <div class="col-md-6">

                                <button type="submit" class="btn btn-success" name="smtpdegis">
                                    <i class="fa fa-refresh fa-spin fa-fw"></i>
                                    <span class="sr-only">Yükleniyor...</span> Güncelle
                                </button>
                            </div>
                        </div>

                    </div>



                </form>
                <br>
                <div class="alert alert-warning" style="font-family: 'Open Sans', Arial; font-size:14px; font-weight: 400">
                    <strong style="font-size:14px; font-weight: 600">Gmail İçin SMTP Ayarları</strong>
                    <hr>
                    Protokol : <strong>TLS</strong>
                    <br>
                    Smtp Host : <strong>ssl://smtp.gmail.com</strong>
                    <br>
                    Smtp E-Mail : <strong>epostanız@gmail.com</strong>
                    <br>
                    Smtp Şifre : <strong>E-Posta adresinizin şifresi</strong>
                    <br>
                    Port : <strong>465</strong>
                    <hr>
                    <strong>UYARI :</strong> Gmail Smtp kullanabilmek için ; Gmail hesabınıza giriş yaptıktan sonra Hesap Ayarlarınızdan "Daha az güvenli uygulama erişimi" alanını aktifleştirmeniz gerekmektedir.
                </div>
                <div class="alert alert-warning" style="font-family: 'Open Sans', Arial; font-size:14px; font-weight: 400">
                    <strong style="font-size:14px; font-weight: 600">Yandex İçin SMTP Ayarları</strong>
                    <hr>
                    Protokol : <strong>SSL</strong>
                    <br>
                    Smtp Host : <strong>smtp.yandex.com.tr</strong>
                    <br>
                    Smtp E-Mail : <strong>epostanız@yandex.com</strong>
                    <br>
                    Smtp Şifre : <strong>Mail Şifreniz</strong>
                    <br>
                    Port : <strong>465</strong>
                    <hr>
                    <strong>UYARI :</strong> Tüm ayarları eksiksiz yaptığınız halde mail gönderim sorunu yaşıyorsanız muhtemelen sunucunuzun firewall ayarlarıyla alakalı bir durum mevcuttur.

                </div>

            </div>







        </div>
    </div>
</div>



<?php if( $_GET['status']=='success'){ ?>
    <body onload="sweetAlert('İşlem Başarılı', 'Güncelleme işleminiz gerçekleşmiştir', 'success');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=smtpayar">
<?php }?>
<?php if($_GET['status']=='warning'){ ?>
    <body onload="sweetAlert('Başarısız!', 'İşlem sırasında hata oluştu', 'warning');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=smtpayar">
<?php }?>


