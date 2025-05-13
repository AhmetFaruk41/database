<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Proje Kategorisi Düzenle | <?=$ayar['site_baslik']?></title>
<?php
$katsira = $db->prepare("select * from proje_kat where id='$_GET[kat_id]' and dil='$_SESSION[dil]' ");
$katsira->execute();
$row = $katsira->fetch(PDO::FETCH_ASSOC);
?>
<?php
if($katsira->rowCount() == 0 ) {
    header("Location:pages.php?sayfa=projekategorileri");
}
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="mdi mdi-wrench"></i> Proje Kategorisi Düzenle</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item"><a href="pages.php?sayfa=projekategorileri">Proje Kategorileri</a></li>
                <li class="breadcrumb-item active">Proje Kategorisi Düzenle</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">




            <div class="card-body" style="font-family: 'Open Sans', Arial">

                <form action="support/post/update/proje-kategori-duzenle.php" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="kat_id" value="<?=$row['id']?>">

                    <h3 class="card-title">Proje Kategorisi Düzenle</h3>
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
                            <label class="control-label text-right col-md-3" for="katAdi" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">Kategori Adı</label>
                            <div class="col-md-6">
                                <input type="text" name="baslik" required class="form-control" id="katAdi" value="<?=$row['baslik']?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="siraArea" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">Kategori Sırası</label>
                            <div class="col-md-1">
                                <input type="number" name="sira" required class="form-control" id="siraArea" value="<?=$row['sira']?>"  min=1 oninput="validity.valid||(value='');">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="anasayfaDurum" style="margin-top: 7px; margin-bottom: 10px; font-weight: 600">Anasayfa</label>
                            <div class="col-md-6">
                                <input type='hidden' value='0' name='anasayfa'>
                                <input type="checkbox" <?php if($row['anasayfa'] == 1) { ?>checked<?php }?> id="anasayfaDurum" class="js-switch" data-color="#f62d51" name="anasayfa" value="1" />
                            </div>
                        </div>



                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" name="projekatdegis">
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
