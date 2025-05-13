<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Beceri Düzenle | <?=$ayar['site_baslik']?></title>
<?php
$degerCek = $db->prepare("select * from beceri where id='$_GET[beceri_id]' and dil='$_SESSION[dil]'  ");
$degerCek->execute();
$row = $degerCek->fetch(PDO::FETCH_ASSOC);
?>
<?php
if($degerCek->rowCount() == 0 ) {
    header("Location:pages.php?sayfa=beceriler");
}
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="mdi mdi-star-circle"></i> Beceri Düzenle</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item"><a href="pages.php?sayfa=beceriler">Beceriler/Uzmanlıklar</a></li>
                <li class="breadcrumb-item active">Beceri Düzenle</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">




            <div class="card-body" style="font-family: 'Open Sans', Arial">

                <form action="support/post/update/beceri-duzenle.php" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="beceri_id" value="<?=$row['id']?>">

                    <h3 class="card-title">Beceri Düzenle</h3>
                    <hr>
                    <div class="form-body">


                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="yayinDurum" style="margin-top: 7px; margin-bottom: 10px; font-weight: 600">Yayın Durumu</label>
                            <div class="col-md-6">
                                <input type='hidden' value='0' name='durum'>
                                <input type="checkbox" <?php if($row['durum'] == 1){?>checked<?php }?> id="yayinDurum" class="js-switch" data-color="#f62d51" name="durum" value="1" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="siraArea" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">Sırası</label>
                            <div class="col-md-1">
                                <input type="number" name="sira" required class="form-control" id="siraArea" value="<?=$row['sira']?>"  min=1 oninput="validity.valid||(value='');">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="katAdi" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">Beceri Başlığı</label>
                            <div class="col-md-6">
                                <input type="text" name="baslik" required class="form-control" id="katAdi" value="<?=$row['baslik']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="oranArea" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">Yüzdelik Oranı %</label>
                            <div class="col-md-1">
                                <input type="number" name="oran" required class="form-control" id="oranArea" placeholder="90" value="<?=$row['oran']?>"  min=1 oninput="validity.valid||(value='');">
                            </div>
                        </div>




                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" name="beceridegis">
                                <i class="fa fa-refresh fa-spin fa-fw"></i>
                                <span class="sr-only">Yükleniyor...</span> Güncelle
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