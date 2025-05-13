<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Banner Adı Düzenle | <?=$ayar['site_baslik']?></title>
<?php
$degerCek = $db->prepare("select * from page_header where id='$_GET[banner_id]'");
$degerCek->execute();
$row = $degerCek->fetch(PDO::FETCH_ASSOC);
?>
<?php
if($degerCek->rowCount() == 0 ) {
    header("Location:pages.php?sayfa=pageheaders");
}
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="mdi mdi-star-circle"></i> Banner Adı Düzenle</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item"><a href="pages.php?sayfa=pageheaders">Sayfa Bannerları</a></li>
                <li class="breadcrumb-item active">Banner Adı Düzenle</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">




            <div class="card-body" style="font-family: 'Open Sans', Arial">

                <form action="support/post/update/banner-duzenle.php" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="banner_id" value="<?=$row['id']?>">

                    <h3 class="card-title">Banner Adı Düzenle</h3>
                    <hr>
                    <div class="form-body">



                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="katAdi" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">Banner Adı</label>
                            <div class="col-md-6">
                                <input type="text" name="baslik" required class="form-control" id="katAdi" value="<?=$row['baslik']?>">
                            </div>
                        </div>


                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" name="bannerdegis">
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