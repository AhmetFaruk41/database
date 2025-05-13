<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Açılış Popup Ayarları  | <?=$ayar['site_baslik']?></title>
<?php
$popupCek=$db->prepare("select * from popup where id='1' order by id");
$popupCek->execute();
$row = $popupCek->fetch(PDO::FETCH_ASSOC);
?>


<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="mdi mdi-home-modern"></i> Açılış Popup Ayarları </h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item active">Açılış Popup Ayarları </li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">




            <div class="card-body" style="font-family: 'Open Sans', Arial">


                    <h3 class="card-title">Açılış Popup Ayarları </h3>
                    <hr>
                    <div class="form-body">



                        <form action="support/post/update/popup.php"  method="post" enctype="multipart/form-data">
                            <input type="hidden" name="eski_gorsel" value="<?=$row['gorsel']?>">


                        <div class="row p-t-20 m-b-20" style="border-bottom:1px solid #EBEBEB">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="OnYukle" style="margin-bottom: 13px; font-weight: 600">Durum</label>
                                    <br>
                                    <small class="form-control-feedback text-info" style="font-size:13px">Site açılışında otomatik açılan popup durumu</small>
                                    <br><br>
                                    <input type='hidden' value='0' name='durum'>
                                    <input type="checkbox" <?php if($row['durum'] == 1){?>checked<?php }?> id="OnYukle" class="js-switch" data-color="#26c6da" name="durum" value="1" />

                                </div>
                            </div>


                        </div>



                        <div class="row p-t-20 m-b-20" style="border-bottom:1px solid #EBEBEB">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" style="margin-bottom: 13px; font-weight: 600">Türü</label>
                                    <br>
                                    <small class="form-control-feedback text-info" style="font-size:13px">Görsel veya Video Embed Seçimi</small>
                                    <br><br>
                                    <select name="tur" class="selectpicker col-md-12 p-l-0 p-r-0" data-style="form-control btn-secondary" >
                                        <option value="0"  <?php if($row['tur'] == 0){?>selected<?php }?> >Görsel</option>
                                        <option value="1"  <?php if($row['tur'] == 1){?>selected<?php }?> >Video Gösterimi</option>
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="sizeSec" style="margin-bottom: 13px; font-weight: 600">Padding Değeri</label>
                                    <br>
                                    <small class="form-control-feedback text-info" style="font-size:13px">İçeriğinizin kenarlarından boşluk değeri belirleyebilirsiniz</small>
                                    <br><br>
                                    <input type="number" class="form-control" required name="padding" value="<?=$row['padding']?>" id="sizeSec">

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="ipDurum" style="margin-bottom: 13px; font-weight: 600">Bir Kez Görünsün (IP Üzerinden)</label>
                                    <br>
                                    <small class="form-control-feedback text-info" style="font-size:13px">Pasif bırakırsanız her yenilemede tekrar çıkar</small>
                                    <br><br>
                                    <input type='hidden' value='no' name='ip_durum'>
                                    <input type="checkbox" <?php if($row['ip_durum'] == 'yes'){?>checked<?php }?> id="ipDurum" class="js-switch" data-color="#26c6da" name="ip_durum" value="yes" />

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="delaySec" style="margin-bottom: 13px; font-weight: 600">Açılış Gecikmesi (1000 : 1 saniye)</label>
                                    <br>
                                    <small class="form-control-feedback text-info" style="font-size:13px">Milisaniye cinsinden ekrana gelme süresini belirleyebilirsiniz. </small>
                                    <br><br>
                                    <input type="number" class="form-control" required name="delay" value="<?=$row['delay']?>" id="delaySec">

                                </div>
                            </div>



                        </div>


                            <div class="row p-t-20 m-b-20" style="border-bottom:1px solid #EBEBEB">

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label" for="urlSec" style="margin-bottom: 13px; font-weight: 600">Link (Tür olarak görsel seçili ise)</label>
                                        <br>
                                        <small class="form-control-feedback text-info" style="font-size:13px">Görsele tıklandığında gidecek adres. Boş bırakabilirsiniz</small>
                                        <br><br>
                                        <input type="text" class="form-control" placeholder="http://"  name="url" value="<?=$row['url']?>" id="urlSec">

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="targtdurum" style="margin-bottom: 13px; font-weight: 600">Link Yeni Sekmede Açılsın?</label>
                                        <br>
                                        <small class="form-control-feedback text-info" style="font-size:13px">Pasif bırakırsanız mevcut sekmede linke gidilir</small>
                                        <br><br>
                                        <input type='hidden' value='0' name='url_target'>
                                        <input type="checkbox" <?php if($row['url_target'] == 1){?>checked<?php }?> id="targtdurum" class="js-switch" data-color="#26c6da" name="url_target" value="1" />

                                    </div>
                                </div>

                            </div>



                            <div class="row p-t-20 m-b-20" style="border-bottom:1px solid #EBEBEB">

                                <div class="col-md-12 p-l-0 ">
                                    <div class="form-group col-md-12">

                                        <label style="font-weight: 500" for="ustKat"><i class="fa fa-photo"></i> Popup Görseli</label>
                                        <div style="width: 100%; height: auto; background-color: #F9F9F9; border:1px solid #EBEBEB; padding: 15px; 0 15px 0; text-align: center;  margin-top:8px;">
                                            <?php
                                            if ($row['gorsel'] == !null) {
                                                ?>
                                                <img src="../images/uploads/<?=$row['gorsel']?>" style="width: 300px; ">
                                            <?php } else {?>
                                                Görsel Eklenmemiş!
                                            <?php }?>
                                            <br><br>
                                            <small class="form-control-feedback text-purple" style="font-size:13px">Max Ebat : 700x700</small>
                                        </div>
                                        <div class="input-group" style="margin-top: 8px">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="gorsel"  >
                                                <label class="custom-file-label" for="inputGroupFile04">Seç</label>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>

                            <div class="row p-t-20 m-b-20" style="border-bottom:1px solid #EBEBEB">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="videoCode" style="margin-bottom: 13px; font-weight: 600"><i class="fa fa-video-camera"></i> Video Embed Kodu</label>
                                        <br>
                                        <textarea name="embed" id="videoCode" class="form-control" rows="2"><?=$row['embed']?></textarea>
                                    </div>
                                </div>

                            </div>




                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success" name="popupdegis">
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
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=popupmodul">
<?php }?>
<?php if($_GET['status']=='warning'){ ?>
    <body onload="sweetAlert('Başarısız!', 'İşlem sırasında hata oluştu', 'warning');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=popupmodul">
<?php }?>
<?php if($_GET['status']=='imgtype'){ ?>
    <body onload="sweetAlert('HATA!', 'Görsel dosyanız svg , jpg, ve png türü dışında olamaz', 'warning');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=popupmodul">
<?php }?>


