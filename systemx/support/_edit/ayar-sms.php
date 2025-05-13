<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>SMS Ayarları | <?=$ayar['site_baslik']?></title>
<?php
$smsayar = $db->prepare("select * from sms where id='1' ");
$smsayar->execute();
$sms = $smsayar->fetch(PDO::FETCH_ASSOC);
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="mdi mdi-cellphone"></i> SMS Ayarları</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item active">SMS Ayarları</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">




            <div class="card-body" style="font-family: 'Open Sans', Arial">

                <div class="card-body p-b-0">
                    <h4 class="card-title">SMS Ayarları</h4>
                    <h6 class="card-subtitle">Aşağıdaki sekmelerden kullandığınız sms firmasının API ayarlarını yapabilirsiniz</h6> </div>



                <!-- Nav tabs -->
                <ul class="nav nav-tabs customtab" role="tablist" style="font-family: 'Open Sans', Arial; font-weight: 500">
                    <li class="nav-item" > <a class="nav-link active" data-toggle="tab" href="#ayar" role="tab" ><span class="hidden-sm-up"><i class="ti-settings"></i></span> <span class="hidden-xs-down" >Genel Ayarlar</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#iletimerkezi" role="tab"><span class="hidden-sm-up"><i class="ti-themify-favicon-alt"></i></span> <span class="hidden-xs-down">İleti Merkezi</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#netgsm" role="tab"><span class="hidden-sm-up"><i class="ti-themify-favicon-alt"></i></span> <span class="hidden-xs-down">NETGsm</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#ucuzsmsgonder" role="tab"><span class="hidden-sm-up"><i class="ti-themify-favicon-alt"></i></span> <span class="hidden-xs-down">Ucuz SMS Gönder</span></a> </li>
                </ul>
                <!-- Tab panes -->
                <form action="support/post/update/ayar-sms.php" class="form-horizontal form-bordered" method="post">



                <div class="tab-content">
                    <div class="tab-pane active" id="ayar" role="tabpanel">
                        <div class="p-20">




                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="DurumSms">Durum</label><br><br>
                                        <input type='hidden' value='0' name='durum'>
                                        <input type="checkbox" id="DurumSms" <?php if($sms['durum'] == 1){?>checked<?php }?> class="js-switch" data-color="#26c6da" name="durum" value="1" />
                                        <br><br>
                                        <small class="form-control-feedback text-info" style="font-size:13px">SMS Modülünü devre dışı bırakırsanız SMS ile bildirim sistemi kapanır ayrıca toplu sms gönderemezsiniz.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500">SMS Firması Seçimi</label>
                                        <br><br>
                                        <div class="input-group" >

                                            <select name="sms_firma" class="form-control" >
                                                <option value="1" <?php if($sms['sms_firma'] == 1 ) { ?> selected <?php }?>>İleti Merkezi</option>
                                                <option value="2" <?php if($sms['sms_firma'] == 2 ) { ?> selected <?php }?>>NETGSM</option>
                                                <option value="3" <?php if($sms['sms_firma'] == 3 ) { ?> selected <?php }?>>Ucuz Sms Gönder</option>
                                            </select>



                                        </div>
                                        <br>
                                        <small class="form-control-feedback text-info" style="font-size:13px">Lütfen firma seçiminin ardından yukarıdaki sekmelerden firmanızı seçerek API ayarlarını eksiksiz yapınız.</small>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="bildirimNO">Bildirim GSM Numarası</label><br><br>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="bildirim_numara" id="bildirimNO" aria-describedby="basic-addon1" value="<?=$sms['bildirim_numara']?>">
                                        </div>

                                        <small class="form-control-feedback text-info" style="font-size:13px">Siparişler veya diğer form elementlerinin kullanımının ardından size gelecek bildirim için GSM numaranızı giriniz.</small>


                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="tab-pane  p-20" id="iletimerkezi" role="tabpanel">

                        <img src="support/images/ileti-merkezi.png" alt="">
                        <br><br>

                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label style="font-weight: 500" for="iletiUserName">Kullanıcı Adı</label><br><br>


                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="iletimerkezi_user" id="iletiUserName" aria-describedby="basic-addon1" value="<?=$sms['iletimerkezi_user']?>">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label style="font-weight: 500" for="iletiPass">Şifre</label><br><br>


                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-key"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="iletimerkezi_pass" id="iletiPass" aria-describedby="basic-addon1" value="<?=$sms['iletimerkezi_pass']?>">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label style="font-weight: 500" for="iletiBaslik">Başlık</label><br><br>

                                    <input type="text" class="form-control" name="iletimerkezi_baslik" id="iletiBaslik" maxlength="11" value="<?=$sms['iletimerkezi_baslik']?>">


                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="tab-pane p-20" id="netgsm" role="tabpanel">



                        <img src="support/images/netgsm.png" alt="">
                        <br><br>

                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label style="font-weight: 500" for="netgsmUser">Kullanıcı Adı</label><br><br>


                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="netgsm_user" id="netgsmUser" aria-describedby="basic-addon1" value="<?=$sms['netgsm_user']?>">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label style="font-weight: 500" for="netgsmPass">Şifre</label><br><br>



                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-key"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="netgsm_pass" id="netgsmPass" aria-describedby="basic-addon1" value="<?=$sms['netgsm_pass']?>">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label style="font-weight: 500" for="netgsmBaslik">Başlık</label><br><br>

                                    <input type="text" class="form-control" name="netgsm_baslik" id="netgsmBaslik" maxlength="11" value="<?=$sms['netgsm_baslik']?>">


                                </div>
                            </div>
                        </div>



                    </div>

                    <div class="tab-pane p-20" id="ucuzsmsgonder" role="tabpanel">



                        <img src="support/images/ucuzsms.png" alt="">
                        <br><br>

                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label style="font-weight: 500" for="ucuzUser">Kullanıcı Adı</label><br><br>


                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="ucuzsms_user" id="ucuzUser" aria-describedby="basic-addon1" value="<?=$sms['ucuzsms_user']?>">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label style="font-weight: 500" for="ucuzsmsPass">Şifre (ucuzsmsgonder panelinizde oluşturduğunuz API SECRET şifresi)</label><br><br>



                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-key"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="ucuzsms_pass" id="ucuzsmsPass" aria-describedby="basic-addon1" value="<?=$sms['ucuzsms_pass']?>">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label style="font-weight: 500" for="ucuzsmsBASLIK">Başlık</label><br><br>

                                    <input type="text" class="form-control" name="ucuzsms_baslik" id="ucuzsmsBASLIK" maxlength="11" value="<?=$sms['ucuzsms_baslik']?>">


                                </div>
                            </div>
                        </div>



                    </div>
                </div>

                    <div class="form-actions p-l-20">
                        <button type="submit" class="btn btn-success" name="smsayardegis">
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
    <meta http-equiv="refresh" content="2; URL=pages.php?sayfa=smsayar">
<?php }?>
<?php if($_GET['status']=='warning'){ ?>
    <body onload="sweetAlert('Başarısız!', 'İşlem sırasında hata oluştu', 'warning');">
    </body>
    <meta http-equiv="refresh" content="2; URL=pages.php?sayfa=smsayar">
<?php }?>


