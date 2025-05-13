<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$veriCek = $db->prepare("select * from proje where id='$_GET[proje_id]'");
$veriCek->execute();
$row = $veriCek->fetch(PDO::FETCH_ASSOC);

$katCek = $db->prepare("select * from proje_kat where dil='$_SESSION[dil]' and durum='1' order by sira asc");
$katCek->execute();

?>
<?php
if($veriCek->rowCount() == 0 ) {
    header("Location:pages.php?sayfa=projeler");
}
?>
    <title>Proje Düzenle | <?=$ayar['site_baslik']?></title>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor"><i class="mdi mdi-wrench"></i> Proje Düzenle</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                    <li class="breadcrumb-item"><a href="pages.php?sayfa=projeler">Projeler</a></li>
                    <li class="breadcrumb-item active">Proje Düzenle</li>
                </ol>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">




                <div class="card-body" style="font-family: 'Open Sans', Arial; padding: 0.25em;">

                    <div class="card-body p-b-0">
                        <h3 class="card-title">Proje Düzenle <span style="font-size:15px;">( <i class="flag-icon-<?php echo $lang['flag'] ?>" style="width:18px; height:13px; display: inline-block; margin-right: 10px; "></i><?=$lang['baslik']?> Dilinde ) </span></h3>

                        <hr>

                        <!-- Nav tabs -->

                        <!-- Tab panes -->
                        <form action="support/post/update/proje-duzenle.php" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="proje_id" value="<?=$row['id']?>">
                            <input type="hidden" name="eski_gorsel" value="<?=$row['gorsel']?>">

                            <div class="tab-content">
                                <div class="tab-pane active" id="genel" role="tabpanel">
                                    <div>


                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label class="control-label" for="yayin" style="margin-bottom: 13px; font-weight: 600">Yayın Durumu</label>
                                                    <br>
                                                    <input type='hidden' value='0' name='durum'>
                                                    <input type="checkbox" <?php if($row['durum']==1){ ?>checked<?php }?> id="yayin" class="js-switch" data-color="#f62d51" name="durum" value="1" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-7 ">
                                                <div class="form-group">
                                                    <label style="font-weight: 500" for="basLik">Proje Başlığı</label>
                                                    <br><br>
                                                    <div class="input-group" >
                                                        <input type="text" name="baslik" class="form-control" id="basLik" required value="<?=$row['baslik']?>">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label style="font-weight: 500" for="katID">Kategori Seçimi</label>
                                                    <br><br>
                                                    <div class="input-group" >
                                                        <select class="selectpicker col-md-12 p-l-0 p-r-0" data-style="form-control btn-secondary" name="kat_id"  required >
                                                            <option value="">-- Proje Kategorisi Seçin --</option>
                                                            <?php foreach ($katCek as $kat) {?>
                                                                <option <?php if($row['kat_id']== $kat['id'] ){ ?>selected<?php }?> value="<?=$kat['id']?>"><?=$kat['baslik']?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>




                                        <div class="row">

                                            <div class="col-md-6 p-l-0 ">
                                                <div class="form-group col-md-12">
                                                    <label style="font-weight: 500" for="spotArea"><i class="fa fa-sort"></i> Kısa Açıklama (Spot)</label><br><br>
                                                    <small class="form-control-feedback text-purple" style="font-size:13px"> Lütfen görünüm estetikliği açısından açıklamayı kısa bir şekilde yapınız. </small>
                                                    <br><br>
                                                    <textarea name="spot" id="spotArea" class="form-control" rows="2"><?=$row['spot']?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6 p-l-0 ">
                                                <div class="form-group col-md-12">
                                                    <label style="font-weight: 500" for="adresArea"><i class="fa fa-map-o"></i> Proje Adres Bilgisi</label><br><br>
                                                    <small class="form-control-feedback text-purple" style="font-size:13px"> Eğer inşaat sektörü üzerine ise lütfen projenizin adres bilgisi girin. </small>
                                                    <br><br>
                                                    <textarea name="adres" id="adresArea" class="form-control" rows="2"><?=$row['adres']?></textarea>
                                                </div>
                                            </div>

                                        </div>



                                        <div class="row">

                                            <div class="col-md-12 p-l-0 ">
                                                <div class="form-group col-md-12">

                                                    <label style="font-weight: 500" for="ustKat"><i class="fa fa-photo"></i> Proje Görseli</label>
                                                    <div style="width: 100%; height: auto; background-color: #F9F9F9; border:1px solid #EBEBEB; padding: 15px; 0 15px 0; text-align: center;  margin-top:8px;">
                                                        <img src="../images/projects/<?=$row['gorsel']?>" style="width: 200px; ">
                                                        <br><br>
                                                        <small class="form-control-feedback text-purple" style="font-size:13px">İdeal ebat: 700x500</small>
                                                    </div>
                                                    <div class="input-group" style="margin-top: 8px">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="gorsel" >
                                                            <label class="custom-file-label" for="inputGroupFile04">Seç</label>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>


                                        </div>


                                        <div class="row">

                                            <div class="form-group col-md-4">
                                                <label style="font-weight: 500" for="projeBasTar">Proje Başlangıç Tarihi</label><br><br>
                                                <div class="input-group">
                                                    <input type="text" name="start_date" class="form-control" id="datepicker-autoclose" placeholder="yyyy-aa-gg" value="<?=$row['start_date']?>">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="icon-calender"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label style="font-weight: 500" for="projeBtsTar">Proje Bitiş Tarihi</label><br><br>
                                                <div class="input-group">
                                                    <input type="text" name="finish_date" class="form-control" id="datepicker-autoclose2" placeholder="yyyy-aa-gg" value="<?=$row['finish_date']?>">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="icon-calender"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="form-group">
                                                    <label style="font-weight: 500" for="webSitesi">Proje Web Sitesi</label>
                                                    <br><br>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-link"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="url" id="webSitesi" aria-describedby="basic-addon1" placeholder="http://" value="<?=$row['url']?>">
                                                    </div>

                                                </div>
                                            </div>

                                        </div>



                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label style="font-weight: 500" for="mymce"><i class="fa fa-list"></i> Proje Detayları </label><br><br>
                                                <textarea name="icerik" id="mymce"   rows="6" ><?=$row['icerik']?></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label style="font-weight: 500" for="proVideo"><i class="fa fa-video-camera"></i> Proje Videosu Embed Kodu</label><br><br>
                                                <textarea name="embed" id="proVideo" class="form-control" rows="3"><?=$row['embed']?></textarea>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label style="font-weight: 500" for="proMapss"><i class="fa fa-map-marker"></i> Proje Google Maps Kodu</label><br><br>
                                                <textarea name="maps" id="proMapss" class="form-control" rows="3" ><?=$row['maps']?></textarea>

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
                        <button type="submit" class="btn btn-success" name="projedegis">
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