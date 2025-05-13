<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Bakım Modu Ayarları | <?=$ayar['site_baslik']?></title>
<?php
$degerCek = $db->prepare("select * from bakim where id='1' order by id desc limit 1 ");
$degerCek->execute();
$row = $degerCek->fetch(PDO::FETCH_ASSOC);
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="mdi mdi-star-circle"></i> Bakım Modu Ayarları</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item active">Bakım Modu Ayarları</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">




            <div class="card-body" style="font-family: 'Open Sans', Arial">

                <form action="support/post/update/bakim.php" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="beceri_id" value="<?=$row['id']?>">

                    <h3 class="card-title">Bakım Modu Ayarları</h3>
                    <hr>
                    <div class="form-body">


                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="yayinDurum" style="margin-top: 7px; margin-bottom: 10px; font-weight: 600">Bakım Modu</label>
                            <div class="col-md-6">
                                <input type='hidden' value='0' name='durum'>
                                <input type="checkbox" <?php if($row['durum'] == 1){?>checked<?php }?> id="yayinDurum" class="js-switch" data-color="#f62d51" name="durum" value="1" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="katAdi" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">BAŞLIK</label>
                            <div class="col-md-6">
                                <input type="text" name="baslik" required class="form-control" id="katAdi" value="<?=$row['baslik']?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="spotAdi" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">AÇIKLAMA</label>
                            <div class="col-md-6">
                                <textarea name="spot" id="spotAdi" class="form-control" rows="3"><?=$row['spot']?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="renkAyar" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">BAŞLIK</label>
                            <div class="col-md-6">
                                <input type="text" name="text_color" required class="form-control jscolor" id="renkAyar" value="<?=$row['text_color']?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="iltsdrm" style="margin-top: 7px; margin-bottom: 10px; font-weight: 600">İletişim Bilgileri</label>
                            <div class="col-md-6">
                                <input type='hidden' value='0' name='iletisim'>
                                <input type="checkbox" <?php if($row['iletisim'] == 1){?>checked<?php }?> id="iltsdrm" class="js-switch" data-color="#f62d51" name="iletisim" value="1" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="logoDurum" style="margin-top: 7px; margin-bottom: 10px; font-weight: 600">Logo Görünsün</label>
                            <div class="col-md-6">
                                <input type='hidden' value='0' name='logo_durum'>
                                <input type="checkbox" <?php if($row['logo_durum'] == 1){?>checked<?php }?> id="logoDurum" class="js-switch" data-color="#f62d51" name="logo_durum" value="1" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="yayinDurum" style="margin-top: 7px; margin-bottom: 10px; font-weight: 600"></label>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success" name="bakimdegis">
                                    <i class="fa fa-refresh fa-spin fa-fw"></i>
                                    <span class="sr-only">Yükleniyor...</span> Ayarları Güncelle
                                </button>
                            </div>
                        </div>



                </form>


                <div class="form-group row">

                    <label class="control-label text-right col-md-3" for="" style="margin-top: 9px;  margin-bottom: 10px; font-weight: 600">Logo Seçimi</label>
                    <div class="col-md-3">
                        <form action="support/post/update/bakim-logo.php"  method="post" enctype="multipart/form-data">

                            <div style="width: 100%; height: auto; background-color: #F8F8F8;  border:1px solid #EBEBEB; padding: 15px; 0 15px 0; text-align: center;  margin-top:8px;">
                                <img src="../images/bakim/<?=$row['logo']?>" alt="" style="max-width: 220px;">
                            </div>

                            <input type="hidden" name="eski_bakim_logo" value="<?=$row['logo']?>" >

                            <div class="input-group" style="margin-top: 8px">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="logo" required>
                                    <label class="custom-file-label" for="inputGroupFile04">Seç</label>
                                </div>
                                <div class="input-group-append" style="margin-bottom: 20px;">
                                    <button type="submit" class="btn btn-info" name="bakimlogo">
                                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                                        <span class="sr-only">Yükleniyor...</span> Güncelle
                                    </button>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>

                <div class="form-group row">

                    <label class="control-label text-right col-md-3" for="" style="margin-top: 9px;  margin-bottom: 10px; font-weight: 600">Arkaplan Seçimi</label>
                    <div class="col-md-3">
                        <form action="support/post/update/bakim-bg.php"  method="post" enctype="multipart/form-data">

                            <div style="width: 100%; height: auto;
                            <?php if($footer['tip'] == 0) {?> background-color: #000; <?php }?>
                            <?php if($footer['tip'] == 1) {?> background-color: #F9F9F9; <?php }?>
                                    border:1px solid #EBEBEB; padding: 15px; 0 15px 0; text-align: center;  margin-top:8px;">
                                <img src="../images/bakim/<?=$row['bg']?>" alt="" style="max-width: 220px;">
                            </div>

                            <input type="hidden" name="eski_bakim_bg" value="<?=$row['bg']?>" >

                            <small class="form-control-feedback text-purple" style="font-size:13px">Minimum ebat 1920x1080 olmalıdır </small>
                            <div class="input-group" style="margin-top: 8px">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="bg" required>
                                    <label class="custom-file-label" for="inputGroupFile04">Seç</label>
                                </div>
                                <div class="input-group-append" style="margin-bottom: 20px;">
                                    <button type="submit" class="btn btn-info" name="bakimbg">
                                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                                        <span class="sr-only">Yükleniyor...</span> Güncelle
                                    </button>
                                </div>
                                <br><br>

                            </div>

                        </form>
                    </div>
                </div>


                    </div>



            </div>







        </div>
    </div>
</div>

<?php if($_GET['status']=='imgtype'){ ?>
    <body onload="sweetAlert('HATA!', 'Görsel dosyanız jpg, png veya gif türü dışında olamaz', 'warning');">
    </body>
<?php }?><?php if( $_GET['status']=='success'){ ?>
    <body onload="sweetAlert('İşlem Başarılı', 'İşleminiz başarıyla gerçekleşmiştir', 'success');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=bakimmodu">
<?php }?>
<?php if($_GET['status']=='warning'){ ?>
    <body onload="sweetAlert('Başarısız!', 'İşlem sırasında hata oluştu', 'warning');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=bakimmodu">
<?php }?>