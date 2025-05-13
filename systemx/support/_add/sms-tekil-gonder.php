<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Tekil SMS Gönder | <?=$ayar['site_baslik']?></title>
<?php


$smsDurum = $db->prepare("select * from sms where id='1'");
$smsDurum->execute();
$sms = $smsDurum->fetch(PDO::FETCH_ASSOC);
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="mdi mdi-cellphone-basic"></i><i class="icon-action-undo"></i> Tekil SMS Gönder</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item"><a href="pages.php?sayfa=smsnumaralar">Kayıtlı GSM Listesi</a></li>
                <li class="breadcrumb-item active">Tekil SMS Gönder</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">



        <?php
        if($sms['durum'] == 1) {
        ?>
        <div class="card">

            <div class="card-body" style="font-family: 'Open Sans', Arial">

                <form action="support/post/insert/sms-tekil-gonder.php" class="form-horizontal form-bordered" method="post">


                    <h3 class="card-title">Tekil SMS Gönder </h3>
                    <hr>
                    <div class="form-body">



                        <div class="row">


                            <div class="form-group col-md-12">
                                <label style="font-weight: 500" for="tekilMails">Alıcı GSM Numara</label><br><br>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="number" class="form-control" name="tekilsms_numara" required id="tekilMails" aria-describedby="basic-addon1" placeholder="Örn : 5xxxxxxxxx">
                                </div>



                            </div>
                        </div>

                      <div class="row">
                          <div class="form-group col-md-12">
                              <label style="font-weight: 500" for="mymce">Mesaj İçeriği</label><br><br>
                              <textarea name="tekilsms_mesaj" class="form-control" rows="2" required></textarea>
                          </div>
                      </div>


                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success" name="tekilsmsgonder">
                            <i class="icon-action-undo"></i>
                            SMS Gönder
                        </button>
                    </div>

                </form>

            </div>

        </div>
        <?php } else {?>
            <div class="alert alert-danger" style="font-weight: 500; font-size:15px;">
                <i class="fa fa-exclamation-circle" ></i> SMS sisteminiz devre dışıdır. Bu sebeple SMS gönderemezsiniz!
            </div>
            <div class="alert alert-dark"style="font-weight: 500; font-size:14px;">
                Ayarı değiştirmek için Ayarlar > SMS Ayarları sayfasına gidiniz.
            </div>
        <?php }?>
    </div>
</div>





