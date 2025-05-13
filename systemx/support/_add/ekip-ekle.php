<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Yeni Ekip Üyesi Ekle | <?=$ayar['site_baslik']?></title>
<?php
$Siralama = $db->prepare("select * from ekip where durum='1' ");
$Siralama->execute();
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="mdi mdi-account-switch"></i> Yeni Ekip Üyesi Ekle</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item"><a href="pages.php?sayfa=ekipler">Ekipler</a></li>
                <li class="breadcrumb-item active">Yeni Ekip Üyesi Ekle</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">




            <div class="card-body" style="font-family: 'Open Sans', Arial">

                <form action="support/post/insert/ekip-ekle.php" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="dil" value="<?=$_SESSION['dil']?>">

                    <h3 class="card-title">Yeni Ekip Üyesi Ekle</h3>
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
                            <label class="control-label text-right col-md-3" for="katAdi" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">İsim</label>
                            <div class="col-md-6">
                                <input type="text" name="isim" required class="form-control" id="katAdi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="pozisyonArea" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">Çalışma Pozisyonu</label>
                            <div class="col-md-6">
                                <input type="text" name="pozisyon" required class="form-control" id="pozisyonArea">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="tavSiye" style="margin-top: 7px; margin-bottom: 10px; font-weight: 600">Ekip Üyesi Fotoğrafı</label>
                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="gorsel" required >
                                    <label class="custom-file-label" for="inputGroupFile04">Seç</label>
                                    <br><br>
                                    <small class="text-purple" style="font-size:13px">İdeal Ebat : 250x250</small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="siraArea" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">Sırası</label>
                            <div class="col-md-1">
                                <input type="number" name="sira" required class="form-control" id="siraArea" value="<?=$Siralama->rowCount()+1;?>"  min=1 oninput="validity.valid||(value='');">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="epostaArea" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">Üye E-Posta Adresi</label>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-email"></i></span>
                                    </div>
                                    <input type="email" class="form-control" name="mail" id="epostaArea" aria-describedby="basic-addon1" >
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3" for="telArea" style="margin-top: 9px; margin-bottom: 10px; font-weight: 600">Üye Telefon Numarası</label>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-phone"></i></span>
                                    </div>
                                    <input type="number" class="form-control" name="tel" id="telArea" aria-describedby="basic-addon1" >
                                </div>
                            </div>
                        </div>


                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" name="ekipekle">
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