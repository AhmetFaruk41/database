<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Ön Yükleme Ayarları  | <?=$ayar['site_baslik']?></title>
<?php
$loaderCek=$db->prepare("select * from loader where id='1' order by id");
$loaderCek->execute();
$row = $loaderCek->fetch(PDO::FETCH_ASSOC);
?>


<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="fa fa-spinner"></i> Ön Yükleme Ayarları </h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item active">Ön Yükleme Ayarları </li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">




            <div class="card-body" style="font-family: 'Open Sans', Arial">


                    <h3 class="card-title">Ön Yükleme Ayarları </h3>
                    <hr>
                    <div class="form-body">




                        <div class="row p-t-20" style="border-bottom:1px solid #EBEBEB">



                            <div class="col-md-12">
                                <form action="support/post/update/loader-icon.php"  method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label" style="margin-bottom: 13px; font-weight: 600">Ön Yükleme Simgesi</label>
                                        <br>
                                        <small class="form-control-feedback text-info" style="font-size:14px;"><i class="fa fa-info-circle"></i> SVG türünde animasyonlu dosya seçmelisiniz. Aşağıdaki linke tıklayarak seçim yapabilir ve seçtiğiniz dosyayı indirerek yükleyebilirsiniz</small>
                                        <br><br>
                                        <a href="https://loading.io" target="_blank"><div class="btn btn-primary"><i class="fa fa-link"></i> SİMGELERi GÖR</div></a>
                                        <div style="width: 100%; height: auto; background-color: #F9F9F9; border:1px solid #EBEBEB; padding: 15px; 0 15px 0; text-align: center;  margin-top:8px;">
                                            <img src="../images/loader/<?=$row['icon']?>" alt="" style="max-width: 220px;">
                                        </div>

                                        <input type="hidden" name="eski_gorsel" value="<?=$row['icon']?>" >

                                        <div class="input-group" style="margin-top: 8px">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="icon" required>
                                                <label class="custom-file-label" for="inputGroupFile04">Seç</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-info" name="icondegis">
                                                    <i class="fa fa-refresh fa-spin fa-fw"></i>
                                                    <span class="sr-only">Yükleniyor...</span> Güncelle
                                                </button>
                                            </div>
                                        </div>




                                    </div>
                                </form>
                            </div>





                        </div>


                        <form action="support/post/update/loader.php" class="form-horizontal" method="post">


                        <div class="row p-t-20 m-b-20" style="border-bottom:1px solid #EBEBEB">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="OnYukle" style="margin-bottom: 13px; font-weight: 600">Ön Yükleme (Pre Loader)</label>
                                    <br>
                                    <small class="form-control-feedback text-info" style="font-size:13px">Site açılışında ve sayfa geçişlerinde görünen ön yükleme sistemi</small>
                                    <br><br>
                                    <input type='hidden' value='0' name='durum'>
                                    <input type="checkbox" <?php if($row['durum'] == 1){?>checked<?php }?> id="OnYukle" class="js-switch" data-color="#26c6da" name="durum" value="1" />

                                </div>
                            </div>


                        </div>



                        <div class="row p-t-20 m-b-20" style="border-bottom:1px solid #EBEBEB">

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="control-label" style="margin-bottom: 13px; font-weight: 600">Arkaplan Rengi</label>
                                    <br>
                                    <small class="form-control-feedback text-info" style="font-size:13px">Loader alanının arkaplan rengini seçebilirsiniz</small>
                                    <br><br>
                                    <input class="jscolor form-control" value="<?=$row['back_color']?>" name="back_color">

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label" for="gecikme" style="margin-bottom: 13px; font-weight: 600">Gecikme Süresi</label>
                                    <br>
                                    <small class="form-control-feedback text-info" style="font-size:13px">Loader alanının delay süresi</small>
                                    <br><br>
                                    <input type="number" id="gecikme" class="form-control"  name="delay" value="<?=$row['delay']?>" />

                                </div>
                            </div>




                        </div>




                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success" name="loaderdegis">
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
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=loaderayar">
<?php }?>
<?php if($_GET['status']=='warning'){ ?>
    <body onload="sweetAlert('Başarısız!', 'İşlem sırasında hata oluştu', 'warning');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=loaderayar">
<?php }?>
<?php if($_GET['status']=='imgtype'){ ?>
    <body onload="sweetAlert('HATA!', 'Görsel dosyanız svg , jpg, ve png türü dışında olamaz', 'warning');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=loaderayar">
<?php }?>


