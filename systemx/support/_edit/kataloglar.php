<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Katalog Düzenle | <?=$ayar['site_baslik']?></title>
<?php
$veriCek = $db->prepare("select * from katalog where id='$_GET[katalog_id]' and dil='$_SESSION[dil]'");
$veriCek->execute();
$row = $veriCek->fetch(PDO::FETCH_ASSOC);
?>
<?php
if($veriCek->rowCount() == 0 ) {
    header("Location:pages.php?sayfa=kataloglar");
}
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="mdi mdi-file-pdf-box"></i> Katalog Düzenle</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item"><a href="pages.php?sayfa=kataloglar">Kataloglar</a></li>
                <li class="breadcrumb-item active">Katalog Düzenle</li>
            </ol>
        </div>
    </div>
</div>






<div class="row">
    <div class="col-lg-12">
        <div class="card">






            <div class="card-body" style="font-family: 'Open Sans', Arial">

                <form action="support/post/update/katalog-duzenle.php" class="form-horizontal " method="post" enctype="multipart/form-data">

                    <input type="hidden" name="katalog_id" value="<?=$row['id']?>">

                    <h3 class="card-title">Katalog Düzenle <span style="font-size:15px;">( <i class="flag-icon-<?php echo $lang['flag'] ?>" style="width:18px; height:13px; display: inline-block; margin-right: 10px; "></i><?=$lang['baslik']?> Dilinde ) </span></h3>
                    <hr>
                    <div class="form-body">




                        <div class="row p-t-20 m-b-20" style="border-bottom:1px solid #EBEBEB">

                            <div class="form-group col-md-12">
                                <label style="font-weight: 500" for="menuAd">Katalog Adı</label><br><br>
                                <input type="text" class="form-control" name="baslik" value="<?=$row['baslik']?>" required id="menuAd">
                            </div>


                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" name="katalogdegis">
                                <i class="fa fa-refresh fa-spin fa-fw"></i>
                                <span class="sr-only">Yükleniyor...</span> Güncelle
                            </button>
                        </div>

                </form>
                <hr>


                        <div class="row m-b-20" style="border-bottom:1px solid #EBEBEB">

                            <div class="form-group col-md-6">
                                <form action="support/post/update/katalog-gorsel.php"  method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="katalog_id" value="<?=$row['id']?>">
                                    <input type="hidden" name="eski_gorsel" value="<?=$row['gorsel']?>">
                                        <label style="font-weight: 500" for="ustKat"><i class="fa fa-photo"></i> Katalog Kapak Görseli</label>
                                        <div style="width: 100%; height: auto; background-color: #F9F9F9; border:1px solid #EBEBEB; padding: 15px; 0 15px 0; text-align: center;  margin-top:8px;">
                                            <img src="../images/catalog/<?=$row['gorsel']?>" style="width: 200px; ">
                                            <br><br>
                                            <small class="form-control-feedback text-info" style="font-size:13px; font-weight: 400"> İdeal Ebat : 250x230</small>
                                        </div>
                                        <div class="input-group" style="margin-top: 8px">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="gorsel" required >
                                                <label class="custom-file-label" for="inputGroupFile04">Seç</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-info" name="kataloggorseldegis">
                                                    <i class="fa fa-refresh fa-spin fa-fw"></i>
                                                    <span class="sr-only">Yükleniyor...</span> Güncelle
                                                </button>
                                            </div>
                                        </div>
                                </form>
                            </div>


                            <div class="form-group col-md-6">
                                <form action="support/post/update/katalog-dosya.php"  method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="katalog_id" value="<?=$row['id']?>">
                                    <input type="hidden" name="eski_url" value="<?=$row['url']?>">
                                    <label style="font-weight: 500" for="ustKat"><i class="fa fa-file-pdf-o"></i> Katalog Seçimi</label>
                                    <div style="width: 100%; height: auto; background-color: #F9F9F9; border:1px solid #EBEBEB; padding: 15px; 0 15px 0; text-align: center;  margin-top:8px;">
                                        <a href="<?=$ayar['site_url']?>assets/uploads/<?=$row['url']?>" target="_blank"><?=$row['url']?> <i class="fa fa-external-link"></i></a>
                                        <br><br>
                                        <small class="form-control-feedback text-info" style="font-size:13px; font-weight: 400"> Lütfen PDF, PNG veya JPG formatında seçim yapın</small>
                                    </div>
                                    <div class="input-group" style="margin-top: 8px">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="url" required >
                                            <label class="custom-file-label" for="inputGroupFile04">Seç</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-info" name="katalogdosyadegis">
                                                <i class="fa fa-refresh fa-spin fa-fw"></i>
                                                <span class="sr-only">Yükleniyor...</span> Güncelle
                                            </button>
                                        </div>
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
<?php }?>
<?php if($_GET['status']=='filetype'){ ?>
    <body onload="sweetAlert('HATA!', 'Katalog dosyanız PDF, JPG veya PNG formatında olmalıdır', 'warning');">
    </body>
<?php }?>