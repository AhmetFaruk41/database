<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$veriCek = $db->prepare("select * from hizmet where id='$_GET[hizmet_id]'");
$veriCek->execute();
$row = $veriCek->fetch(PDO::FETCH_ASSOC);

$hizmetAyarCek = $db->prepare("select * from hizmet_ayar where id='1'");
$hizmetAyarCek->execute();
$hizmetayar = $hizmetAyarCek->fetch(PDO::FETCH_ASSOC);
?>
<?php
if($veriCek->rowCount() == 0 ) {
    header("Location:pages.php?sayfa=hizmetler");
}
?>
<title>Hizmet Düzenle | <?=$ayar['site_baslik']?></title>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="icon-support"></i> Hizmet Düzenle</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item"><a href="pages.php?sayfa=hizmetler">Hizmetler</a></li>
                <li class="breadcrumb-item active">Hizmet Düzenle</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">




            <div class="card-body" style="font-family: 'Open Sans', Arial; padding: 0.25em;">

                <div class="card-body p-b-0">
                    <h3 class="card-title">Hizmet Düzenle <span style="font-size:15px;">( <i class="flag-icon-<?php echo $lang['flag'] ?>" style="width:18px; height:13px; display: inline-block; margin-right: 10px; "></i><?=$lang['baslik']?> Dilinde ) </span></h3>

                <hr>

                <!-- Nav tabs -->

                <!-- Tab panes -->
                <form action="support/post/update/hizmet-duzenle.php" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="hizmet_id" value="<?=$row['id']?>">
                    <input type="hidden" name="eski_gorsel" value="<?=$row['gorsel']?>">

                <div class="tab-content">
                    <div class="tab-pane active" id="genel" role="tabpanel">
                        <div>


                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label class="control-label" for="yayin" style="margin-bottom: 13px; font-weight: 600">Yayın Durumu</label>
                                        <br>
                                        <input type='hidden' value='0' name='durum'>
                                        <input type="checkbox"  <?php if ($row['durum'] == 1) {?> checked <?php }?> id="yayin" class="js-switch" data-color="#f62d51" name="durum" value="1" />
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label class="control-label" for="ahomeSelect" style="margin-bottom: 13px; font-weight: 600">Anasayfa Seçimi</label>
                                        <br>
                                        <input type='hidden' value='0' name='anasayfa'>
                                        <input type="checkbox"  <?php if ($row['anasayfa'] == 1) {?> checked <?php }?> id="ahomeSelect" class="js-switch" data-color="#f62d51" name="anasayfa" value="1" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-7 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="basLik">Hizmet Başlığı</label>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" name="baslik" class="form-control" id="basLik" required value="<?=$row['baslik']?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-1 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="sirasiSlider">Sıra</label>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="number" class="form-control" id="sirasiSlider" name="sira" value="<?=$row['sira']?>" required min=1 oninput="validity.valid||(value='');">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="icons"><i class="fa fa-info-circle" data-toggle="tooltip" data-placement="left" title="Hizmet tipi ikonlu ise gereklidir. Ayrıca detay sayfasındada görünür"></i> İkon Seçimi</label>
                                        <br><br>
                                        <div class="input-group" >
                                            <select class="form-control awesome-select" name="icon" id="icons" required>
                                                <option value="<?=$row['icon']?>"><?=$row['icon']?></option>
                                                <?php include 'support/panel_parts/icon.php'?>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>




                            <div class="row">

                                <div class="col-md-12 p-l-0 ">
                                    <div class="form-group col-md-12">
                                        <label style="font-weight: 500" for="spotArea"><i class="fa fa-sort"></i> Kısa Açıklama (Spot)</label><br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px"> Lütfen görünüm estetikliği açısından açıklamayı kısa bir şekilde yapınız. </small>
                                        <br><br>
                                        <textarea name="spot" id="spotArea" class="form-control" rows="3"><?=$row['spot']?></textarea>
                                    </div>
                                </div>

                            </div>



                            <div class="row">

                                <div class="col-md-12 p-l-0 ">
                                    <div class="form-group col-md-12">
                                        <label style="font-weight: 500" for="ustKat"><i class="fa fa-photo"></i> Hizmet Görseli</label>
                                        <div style="width: 100%; height: auto; background-color: #F9F9F9; border:1px solid #EBEBEB; padding: 15px; 0 15px 0; text-align: center;  margin-top:8px;">
                                            <?php
                                            if ($row['gorsel'] == !null) {
                                            ?>
                                            <img src="../images/services/<?=$row['gorsel']?>" style="width: 300px; ">
                                            <?php } else {?>
                                            Görsel Eklenmemiş!
                                            <?php }?>
                                            <br><br>
                                            <small class="form-control-feedback text-purple" style="font-size:13px">Hizmet tipi <b>resimli</b> ise seçim zorunludur. Ayrıca detay sayfasında görünmektedir. İdeal Ebat : 750x580</small>
                                        </div>
                                        <div class="input-group" style="margin-top: 8px">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="gorsel" <?php if ($hizmetayar['tip'] == 0 && $row['gorsel'] == null) { ?> required <?php }?>  >
                                                <label class="custom-file-label" for="inputGroupFile04">Seç</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label style="font-weight: 500" for="mymce"><i class="fa fa-list"></i> Hizmet Açıklaması </label><br><br>
                                    <textarea name="icerik" id="mymce"   rows="6" ><?=$row['icerik']?></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label style="font-weight: 500" for="descpAlan">Meta Açıklaması</label><br><br>
                                    <textarea name="meta_desc" id="descpAlan" class="form-control" rows="2"><?=$row['meta_desc']?></textarea>
                                </div>

                                <div class="form-group col-md-6">
                                    <label style="font-weight: 500" for="tagsAreas">Etiketler</label><br><br>
                                    <input type="text"  data-role="tagsinput" placeholder="Etiket Ekle" name="tags" value="<?=$row['tags']?>" />
                                </div>
                            </div>



                        </div>
                    </div>


</div>
                </div>

                    <div class="form-actions p-l-20 p-b-20">
                        <button type="submit" class="btn btn-success" name="hizmetdegis">
                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                            <span class="sr-only">Yükleniyor...</span> Güncelle
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