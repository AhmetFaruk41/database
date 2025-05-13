<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Kod Ekleme Alanı| <?=$ayar['site_baslik']?></title>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="mdi mdi-code-braces"></i> Kod Ekleme Alanı</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item active">Kod Ekleme Alanı</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">






            <div class="card-body" style="font-family: 'Open Sans', Arial">

                <form action="support/post/update/ayar-kod.php" class="form-horizontal form-bordered" method="post">

                    <h3 class="card-title">Kod Ekleme Alanı</h3>
                    <hr>
                    <div class="form-body">



                      <div class="row">



                          <div class="form-group col-md-12">
                              <label style="font-weight: 500" for="GoogleAn">Google Analytics Kodu</label><br><br>

                              <textarea name="analytics_code" id="GoogleAn" class="form-control bg-dark" rows="4" style="color:#FFF" ><?=$ayar['analytics_code']?></textarea>

                          </div>



                          <div class="form-group col-md-12">
                              <label style="font-weight: 500" for="YandexMet">Yandex Metrica Kodu</label><br><br>

                              <textarea name="yandex_code" id="YandexMet" class="form-control bg-dark" rows="4" style="color:#FFF" ><?=$ayar['yandex_code']?></textarea>

                          </div>

                          <div class="form-group col-md-12">
                              <label style="font-weight: 500" for="CanliDestek">Canlı Destek Kodu veya Diğer Kodlar</label><br><br>

                              <textarea name="canli_destek_kodu" id="CanliDestek" class="form-control bg-dark" rows="12" style="color:#FFF" ><?=$ayar['canli_destek_kodu']?></textarea>

                              <div class="alert alert-primary" style="font-size:14px; font-weight: 400">
                                  Canlı destek entegrasyonu yapmak isterseniz lütfen <strong><a href="https://tawk.to" target="_blank">https://tawk.to</a></strong> adresine üye olup siteniz ile ilgili bilgileri girdikten sonra size verilen kodu yukarıdaki alana ekleyiniz.
                              </div>

                              <div class="alert alert-success" style="font-size:14px; font-weight: 400">
                                 <i class="fa fa-whatsapp"></i> WhatsApp ile destek sistemi eklemek isterseniz aşağıdaki kodu üstteki kutuya ekleyebilirsiniz. Lütfen kod içerisindeki <b>telefon numarasını</b> ve <b>mesaj alanını</b> kendinize göre düzenleyiniz.
                                  <br><br>
                                  <textarea name="icerik" id="code" cols="30" rows="14"><script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+905xxxxxxxxx", // WhatsApp number
            call_to_action: "Size Nasıl Yardımcı Olabiliriz?", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script></textarea>


                              </div>

                          </div>



                      </div>


                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success" name="koddegis">
                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                            <span class="sr-only">Yükleniyor...</span> Güncelle
                        </button>
                    </div>

                </form>

            </div>





        </div>
    </div>
</div>



<?php if( $_GET['status']=='success'){ ?>
    <body onload="sweetAlert('İşlem Başarılı', 'Güncelleme işleminiz gerçekleşmiştir', 'success');">
    </body>
    <meta http-equiv="refresh" content="2; URL=pages.php?sayfa=kodekle">
<?php }?>
<?php if($_GET['status']=='warning'){ ?>
    <body onload="sweetAlert('Başarısız!', 'İşlem sırasında hata oluştu', 'warning');">
    </body>
    <meta http-equiv="refresh" content="2; URL=pages.php?sayfa=kodekle">
<?php }?>


