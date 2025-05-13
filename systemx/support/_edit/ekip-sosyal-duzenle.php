<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Sosyal Medya Hesabı Düzenle | <?=$ayar['site_baslik']?></title>
<?php
$Siralama = $db->prepare("select * from ekip_sosyal where id='$_GET[sosyal_id]' ");
$Siralama->execute();
$row = $Siralama->fetch(PDO::FETCH_ASSOC);

$degerCek = $db->prepare("select * from ekip where id='$row[ekip_id]'");
$degerCek->execute();
$pr = $degerCek->fetch(PDO::FETCH_ASSOC);
?>
<?php
if($Siralama->rowCount() == 0 ) {
    header("Location:pages.php?sayfa=ekipler");
}
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="mdi mdi-account-switch"></i> Sosyal Medya Hesabı Düzenle</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item"><a href="pages.php?sayfa=ekipler">Ekipler</a></li>
                <li class="breadcrumb-item"><a href="pages.php?sayfa=ekipsosyal&ekip_id=<?=$pr['id']?>"><?=$pr['isim']?></a></li>
                <li class="breadcrumb-item active">Sosyal Medya Hesabı Düzenle</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card" >
            <div class="card-body text-white" style="background: linear-gradient(to right, #4568dc, #b06ab3);" >

                <h3 class="card-title" style="margin-bottom: 0 !important;">Ekip Üyesi :  <?=$pr['isim']?> </h3>

            </div>

        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">




            <div class="card-body" style="font-family: 'Open Sans', Arial">

                <form action="support/post/update/ekip-sosyal-duzenle.php" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="sosyal_id" value="<?=$row['id']?>">
                    <input type="hidden" name="ekip_id" value="<?=$pr['id']?>">

                    <h3 class="card-title">Sosyal Medya Hesabı Düzenle</h3>
                    <hr>
                    <div class="form-body">




                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="ozellikAd" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">Sosyal Medya Firması</label>
                            <div class="col-md-6">
                                <input type="text" name="baslik" required class="form-control" id="ozellikAd" value="<?=$row['baslik']?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="linkURL" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">Hesap Adresi Linki :</label>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-link"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="url" id="linkURL" aria-describedby="basic-addon1" value="<?=$row['url']?>" placeholder="http://" >
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="icons" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">İkon :</label>
                            <div class="col-md-6">
                                <select class="form-control awesome-select" name="icon" id="icons">
                                    <option value="<?=$row['icon']?>"><?=$row['icon']?></option>
                                    <?php include 'support/panel_parts/icon.php'?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="siraArea" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">Sıra</label>
                            <div class="col-md-1">
                                <input type="number" name="sira" required class="form-control" id="siraArea" value="<?=$row['sira']?>"  min=1 oninput="validity.valid||(value='');">
                            </div>
                        </div>



                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" name="ekipsosyaldegis">
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

