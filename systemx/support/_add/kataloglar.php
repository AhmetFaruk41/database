<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Yeni Katalog Ekle | <?=$ayar['site_baslik']?></title>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="mdi mdi-file-pdf-box"></i> Yeni Katalog Ekle</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item"><a href="pages.php?sayfa=kataloglar">Kataloglar</a></li>
                <li class="breadcrumb-item active">Yeni Katalog Ekle</li>
            </ol>
        </div>
    </div>
</div>






<div class="row">
    <div class="col-lg-12">
        <div class="card">






            <div class="card-body" style="font-family: 'Open Sans', Arial">

                <form action="support/post/insert/katalog-ekle.php" class="form-horizontal " method="post" enctype="multipart/form-data">

                    <input type="hidden" name="dil" value="<?=$_SESSION['dil']?>">

                    <h3 class="card-title">Yeni Katalog Ekle <span style="font-size:15px;">( <i class="flag-icon-<?php echo $lang['flag'] ?>" style="width:18px; height:13px; display: inline-block; margin-right: 10px; "></i><?=$lang['baslik']?> Dilinde ) </span></h3>
                    <hr>
                    <div class="form-body">




                        <div class="row p-t-20 m-b-20" style="border-bottom:1px solid #EBEBEB">

                            <div class="form-group col-md-12">
                                <label style="font-weight: 500" for="menuAd">Katalog Adı</label><br><br>
                                <input type="text" class="form-control" name="baslik" required id="menuAd">
                            </div>


                        </div>

                        <div class="row m-b-20" style="border-bottom:1px solid #EBEBEB">

                            <div class="form-group col-md-6">

                                <label style="font-weight: 500" for="ustKat">Katalog Kapak Görseli</label>
                                <br><br>
                                <small class="form-control-feedback text-purple" style="font-size:13px"> İdeal Ebat : 250x230</small>
                                <div class="input-group" style="margin-top: 8px">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="gorsel" required >
                                        <label class="custom-file-label" for="inputGroupFile04">Seç</label>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group col-md-6">

                                <label style="font-weight: 500" for="ustKat">Katalog Seçimi</label>
                                <br><br>
                                <small class="form-control-feedback text-purple" style="font-size:13px"> Lütfen PDF, PNG veya JPG formatında seçim yapın</small>
                                <div class="input-group" style="margin-top: 8px">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="url" required >
                                        <label class="custom-file-label" for="inputGroupFile04">Seç</label>
                                    </div>
                                </div>

                            </div>

                        </div>





                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success" name="katalogekle">
                            <i class="fa fa-save"></i>
                            Kaydet
                        </button>
                    </div>

                </form>

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