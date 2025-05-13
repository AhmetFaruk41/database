<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Yeni Özellik Ekle | <?=$ayar['site_baslik']?></title>
<?php
$Siralama = $db->prepare("select * from ozellik where durum='1' and dil='$_SESSION[dil]' ");
$Siralama->execute();


?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="ti-bookmark"></i> Yeni Özellik Ekle</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item"><a href="pages.php?sayfa=ozellikler">Özellikler Modülü</a></li>
                <li class="breadcrumb-item active">Yeni Özellik Ekle</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">




            <div class="card-body" style="font-family: 'Open Sans', Arial">

                <form action="support/post/insert/ozellik-ekle.php" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="dil" value="<?=$_SESSION['dil']?>">

                    <h3 class="card-title">Yeni Özellik Ekle <span style="font-size:15px;">( <i class="flag-icon-<?php echo $lang['flag'] ?>" style="width:18px; height:13px; display: inline-block; margin-right: 10px; "></i><?=$lang['baslik']?> Dilinde ) </span></h3>
                    <hr>
                    <div class="form-body">


                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="yayinDurum" style="margin-top: 7px; margin-bottom: 10px; font-weight: 600">Yayın Durumu</label>
                            <div class="col-md-6">
                                <input type='hidden' value='0' name='durum'>
                                <input type="checkbox" checked id="yayinDurum" class="js-switch" data-color="#f62d51" name="durum" value="1" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="plsDurum" style="margin-top: 7px; margin-bottom: 10px; font-weight: 600">Anasayfa</label>
                            <div class="col-md-6">
                                <input type='hidden' value='0' name='anasayfa'>
                                <input type="checkbox"  checked id="plsDurum" class="js-switch" data-color="#f62d51" name="anasayfa" value="1" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="siraArea" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">Sırası</label>
                            <div class="col-md-1">
                                <input type="number" name="sira" required class="form-control" id="siraArea" value="<?=$Siralama->rowCount()+1;?>"  min=1 oninput="validity.valid||(value='');">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="katAdi" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">Özellik Başlığı</label>
                            <div class="col-md-6">
                                <input type="text" name="baslik" required class="form-control" id="katAdi">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="iconn" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">İkon</label>
                            <div class="col-md-6">
                                <select class="selectpicker col-md-12 p-l-0 p-r-0 awesome-select" data-style="form-control btn-secondary" name="icon" >
                                    <?php include 'support/panel_parts/icon.php'?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="ozlspot" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">Özellik Açıklaması</label>
                            <div class="col-md-6">
                                <textarea name="spot" id="ozlspot" class="form-control" required rows="3" placeholder="Lütfen görünüm estetikliği için kısa ve öz açıklama giriniz"></textarea>
                            </div>
                        </div>


                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" name="ozellikekle">
                                <i class="fa fa-save"></i>
                                Kaydet
                            </button>
                        </div>



                </form>

                    </div>



            </div>







        </div>
    </div>
</div>

<?php if($_GET['status']=='imgtype'){ ?>
    <body onload="sweetAlert('HATA!', 'Görsel dosyanız jpg, png veya gif türü dışında olamaz', 'warning');">
    </body>
<?php }?>