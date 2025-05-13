<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Tekil E-Posta Gönder| <?=$ayar['site_baslik']?></title>
<?php
$mailListesi = $db->prepare("select * from ebulten");
$mailListesi->execute();
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="ti-location-arrow"></i>Tekil E-Posta Gönder</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item"><a href="pages.php?sayfa=ebultenlistesi">Kayıtlı E-Posta Listesi</a></li>
                <li class="breadcrumb-item active">Tekil E-Posta Gönder</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <?php if($ayar['smtp_durum'] == 1) {?>
        <div class="card">






            <div class="card-body" style="font-family: 'Open Sans', Arial">

                <form action="support/post/insert/ebulten-tekil-ekle.php" class="form-horizontal form-bordered" method="post">


                    <h3 class="card-title">Tekil E-Posta Gönder</h3>
                    <hr>
                    <div class="form-body">




                      <div class="row">


                          <div class="form-group col-md-12">
                              <label for="gonderenMail" class="control-label" style="font-weight: 500">Gönderen :</label>
                              <br><br>
                              <input type="text" class="form-control" id="gonderenMail" readonly value="<?=$ayar['smtp_mail']?>" >
                          </div>
                          <div class="form-group col-md-6">
                              <label for="gonmail" class="control-label"style="font-weight: 500">Gönderilecek E-Posta Adresi :</label>
                              <br><br>
                              <input type="email" class="form-control" id="gonmail" name="tekilmail_mail" <?php if(isset($_GET['mail'])) {?>value="<?=$_GET['mail']?>"<?php }?> required>
                          </div>
                          <div class="form-group col-md-6">
                              <label for="recipient-name" class="control-label"style="font-weight: 500">Konu :</label>
                              <br><br>
                              <input type="text" class="form-control" id="recipient-name" name="tekilmail_konu" required>
                          </div>
                          <div class="form-group col-md-12">
                              <label for="message-text" class="control-label" style="font-weight: 500">Mail İçeriğiniz :</label>
                              <br><br>
                              <textarea   id="mymce"   rows="15" name="tekilmail_icerik"></textarea>
                          </div>

    

                    </div>

                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-info" name="mailgonder">
                            <i class="fa fa-paper-plane"></i>
                            Mail Gönder
                        </button>
                    </div>



                </form>

            </div>





        </div>

        <?php } else {?>
            <div class="alert alert-danger" style="font-weight: 500; font-size:15px;">
                <i class="fa fa-exclamation-circle" ></i> SMTP sisteminiz devre dışıdır. Bu sebeple tekil e-posta gönderemezsiniz!
            </div>
            <div class="alert alert-dark"style="font-weight: 500; font-size:14px;">
                Ayarı değiştirmek için Ayarlar > SMTP Ayarları sayfasına gidiniz.
            </div>
        <?php }?>

    </div>
</div>


<?php if($_GET['status']=='warning'){ ?>
    <body onload="sweetAlert('Başarısız!', 'İşlem sırasında hata oluştu', 'warning');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=tekilmailgonder">
<?php }?>



