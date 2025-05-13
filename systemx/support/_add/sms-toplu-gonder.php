<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Toplu SMS Gönder | <?=$ayar['site_baslik']?></title>
<?php
$numaraListe = $db->prepare("select * from sms_numaralar");
$numaraListe->execute();

$numaraListe_ileti = $db->prepare("select * from sms_numaralar");
$numaraListe_ileti->execute();

$numaraListe_ucuz = $db->prepare("select * from sms_numaralar");
$numaraListe_ucuz->execute();

$smsDurum = $db->prepare("select * from sms where id='1'");
$smsDurum->execute();
$sms = $smsDurum->fetch(PDO::FETCH_ASSOC);
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="mdi mdi-cellphone-basic"></i><i class="icon-action-undo"></i> Toplu SMS Gönder</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item"><a href="pages.php?sayfa=smsnumaralar">Kayıtlı GSM Listesi</a></li>
                <li class="breadcrumb-item active">Toplu SMS Gönder</li>
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

                <form action="support/post/insert/sms-toplu-gonder.php" class="form-horizontal form-bordered" method="post">


                    <h3 class="card-title">Toplu SMS Gönder <span style="font-size:15px;">(<?=$numaraListe->rowCount();?> Kayıtlı Numara)</span>  </h3>
                    <hr>
                    <div class="form-body">



                        <div class="alert alert-success" style="font-size:14px; font-weight: 500;">
                            Mesajınız kayıtlı olan tüm GSM numaralarına gönderilecektir
                        </div>


                      <div class="row">

                          <input type="hidden" name="toplusms_numaralar" value="<?php foreach ($numaraListe as $numlar) { ?><?=$numlar['gsm']?>,<?php }  ?>">
                          <input type="hidden" name="toplusms_numaralar_ileti" value="<?php foreach ($numaraListe_ileti as $nums2) { ?><number><?=$nums2['gsm']?></number><?php }  ?>">
                          <input type="hidden" name="toplusms_numaralar_ucuz" value="<?php foreach ($numaraListe_ucuz as $nums3) { ?><no><?=$nums3['gsm']?></no><?php }  ?>">


                          <div class="form-group col-md-12">
                              <label style="font-weight: 500" for="mymce">Mesaj İçeriği</label><br><br>
                              <textarea name="toplusms_mesaj" class="form-control" rows="2" required></textarea>
                          </div>

                      </div>


                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success" name="toplusmsgonder">
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





