<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Pricing Table Düzenle | <?=$ayar['site_baslik']?></title>
<?php
$veriCek = $db->prepare("select * from pricing where id='$_GET[pricing_id]' and dil='$_SESSION[dil]' ");
$veriCek->execute();
$row = $veriCek->fetch(PDO::FETCH_ASSOC);
?>
<?php
if($veriCek->rowCount() == 0 ) {
    header("Location:pages.php?sayfa=pricingler");
}
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="mdi mdi-table-edit"></i> Pricing Table Düzenle</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item"><a href="pages.php?sayfa=pricingler">Pricing Table</a></li>
                <li class="breadcrumb-item active">Pricing Table Düzenle</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">




            <div class="card-body" style="font-family: 'Open Sans', Arial">

                <form action="support/post/update/pricing-duzenle.php" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="pricing_id" value="<?=$row['id']?>">

                    <h3 class="card-title">Pricing Table Düzenle</h3>
                    <hr>
                    <div class="form-body">


                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="yayinDurum" style="margin-top: 7px; margin-bottom: 10px; font-weight: 600">Yayın Durumu</label>
                            <div class="col-md-6">
                                <input type='hidden' value='0' name='durum'>
                                <input type="checkbox" <?php if($row['durum'] == 1) { ?>checked<?php }?> id="yayinDurum" class="js-switch" data-color="#f62d51" name="durum" value="1" />
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="katAdi" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">Tablo Başlığı</label>
                            <div class="col-md-6">
                                <input type="text" name="baslik" required class="form-control" id="katAdi" value="<?=$row['baslik']?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="siraArea" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">Tablo Sırası</label>
                            <div class="col-md-1">
                                <input type="number" name="sira" required class="form-control" id="siraArea" value="<?=$row['sira']?>"  min=1 oninput="validity.valid||(value='');">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="fiat" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600"><i class="fa fa-info-circle" data-toggle="tooltip" data-placement="left" title="Boş bırakırsanız ödeme planlaması çıkmaz"></i> Fiyat</label>
                            <div class="col-md-3">
                                <input type="text" name="fiyat"  class="form-control" id="fiat" placeholder="Örn : 49.99" value="<?=$row['fiyat']?>" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="odemePlan" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">Ödeme Planı</label>
                            <div class="col-md-3">
                                <input type="text" name="odeme_date"  class="form-control" id="odemePlan" placeholder="Örn : AYLIK" value="<?=$row['odeme_date']?>" >
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="buyLink" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">Satın Alma Linki</label>
                            <div class="col-md-6">
                                <input type="text" name="url"  class="form-control" id="buyLink" placeholder="http://" value="<?=$row['url']?>" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="buyLink" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">İkon</label>
                            <div class="col-md-6">
                                <select class="form-control awesome-select" name="icon" id="icons" required>
                                    <option value="<?=$row['icon']?>"><?=$row['icon']?></option>
                                    <?php include 'support/panel_parts/icon.php'?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="tavSiye" style="margin-top: 7px; margin-bottom: 10px; font-weight: 600">Tavsiye Edilen</label>
                            <div class="col-md-6">
                                <input type='hidden' value='0' name='tavsiye'>
                                <input type="checkbox"  <?php if($row['tavsiye'] == 1) { ?>checked<?php }?> id="tavSiye" class="js-switch" data-color="#f62d51" name="tavsiye" value="1" />
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" name="pricingdegis">
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
