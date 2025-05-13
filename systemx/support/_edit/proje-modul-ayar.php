<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$modulAyar = $db->prepare("select * from proje_ayar where id='1'");
$modulAyar->execute();
$row = $modulAyar->fetch(PDO::FETCH_ASSOC);
?>

<title>Proje Modül Ayarları | <?=$ayar['site_baslik']?></title>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="ti-dropbox"></i> Proje Modül Ayarları</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item"><a href="pages.php?sayfa=projeler">Projeler</a></li>
                <li class="breadcrumb-item active">Proje Modül Ayarları</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">




            <div class="card-body" style="font-family: 'Open Sans', Arial">

                <div class="card-body p-b-0">
                    <h4 class="card-title">Proje Modül Ayarları</h4>
                    <h6 class="card-subtitle">Proje Modül Ayarları genel olarak anasayfadaki ürün modülünün görünüm ayarlarını içermektedir</h6> </div>



                <!-- Nav tabs -->
                <ul class="nav nav-tabs customtab" role="tablist" style="font-family: 'Open Sans', Arial; font-weight: 500; margin-bottom: 30px;">
                    <li class="nav-item" > <a class="nav-link active" data-toggle="tab" href="#genel" role="tab" ><span class="hidden-sm-up"><i class="ti-settings"></i></span> <span class="hidden-xs-down" >Genel</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#meta" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-search-web"></i></span> <span class="hidden-xs-down">SEO-Meta Ayarları</span></a> </li>
                </ul>
                <!-- Tab panes -->
                <form action="support/post/update/proje-modul-ayar.php" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">




                <div class="tab-content">
                    <div class="tab-pane active" id="genel" role="tabpanel">
                        <div class="p-20">




                            <div class="row" style="margin-bottom: 25px;  ">


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="modulBaslik">Modül Başlığı</label>
                                        <br><br>
                                        <small class="text-success" style="font-size:13px">Bu yazıyı dil ayarlarınızdaki düzenleme alanının <strong>34.satırından</strong> değiştirebilirsiniz</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" class="form-control" disabled value="<?=$diller['proje']?>" id="modulBaslik">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="modulSpot">Modül Açıklaması</label>
                                        <br><br>
                                        <small class="text-success" style="font-size:13px">Bu yazıyı dil ayarlarınızdaki düzenleme alanının <strong>35.satırından</strong> değiştirebilirsiniz</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <textarea  id="modulSpot" rows="1" class="form-control" disabled><?=$diller['proje-aciklamasi']?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="modulTumu">Tümü Yazısı</label>
                                        <br><br>
                                        <small class="text-success" style="font-size:13px"><strong>36.satırından</strong> değiştirebilirsiniz</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" class="form-control" disabled value="<?=$diller['proje-tumu']?>" id="modulTumu">
                                        </div>
                                    </div>
                                </div>


                            </div>



                            <div class="row" style="margin-bottom: 25px;  ">


                                <div class="col-md-2 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="widthDegeri">Modül Genişliği</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Geniş seçilirse %100, Kutu seçilirse %90 genişlk olur.</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <select name="width" class="form-control" id="widthDegeri">
                                                <option value="0" <?php if($row['width'] == 0 ) { ?> selected <?php }?>>Geniş</option>
                                                <option value="1" <?php if($row['width'] == 1 ) { ?> selected <?php }?>>Kutu</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-2 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="sizeSec">Padding Değeri</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Yukarıdan ve aşağıdan boşluk veya aralık bırakabilirsiniz</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="number" class="form-control" required name="padding" value="<?=$row['padding']?>" id="sizeSec">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="fontWe">Başlık Font Kalınlığı</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Modül başlığınızın yazı kalınlığını belirleyebilirsiniz</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <select class="form-control" name="font_weight" id="fontWe">
                                                <option value="exlight" <?php if($row['font_weight'] == 'exlight' ) { ?> selected <?php }?>>Ekstra İnce</option>
                                                <option value="light" <?php if($row['font_weight'] == 'light' ) { ?> selected <?php }?> >İnce</option>
                                                <option value="small" <?php if($row['font_weight'] == 'small' ) { ?> selected <?php }?> >Normal</option>
                                                <option value="medium" <?php if($row['font_weight'] == 'medium' ) { ?> selected <?php }?> >Orta</option>
                                                <option value="bold" <?php if($row['font_weight'] == 'bold' ) { ?> selected <?php }?> >Kalın</option>
                                                <option value="exbold" <?php if($row['font_weight'] == 'exbold' ) { ?> selected <?php }?> >Ekstra Kalın</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="dividerSec">Divider Seçimi</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Başlık ve açıklama altındaki ayıraç simgesi.</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <select name="divider" class="form-control" id="dividerSec">
                                                <option value="divider" <?php if($row['divider'] == 'divider' ) { ?> selected <?php }?>>Koyu Renk</option>
                                                <option value="divider_2" <?php if($row['divider'] == 'divider_2' ) { ?> selected <?php }?>>Açık Renk</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="baslikClor">Başlık Rengi</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Modül başlığınızın rengini kendinize göre seçebilirsiniz</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" class="form-control jscolor" name="baslik_color" value="<?=$row['baslik_color']?>" id="baslikClor">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="spotColor">Açıklama Rengi</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Modül açıklamanızın rengini kendinize göre seçebilirsiniz</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" class="form-control jscolor" name="spot_color" value="<?=$row['spot_color']?>" id="spotColor">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-2 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="arkaplanRengi">Modül Arkaplan Rengi</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Modül arkaplan rengini kendinize göre seçebilirsiniz</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" class="form-control jscolor" name="back_color" value="<?=$row['back_color']?>" id="arkaplanRengi">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="detayUrl">Proje Detay Gösterimi</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Pasif bırakırsanız proje detay sayfalarına erişilemez</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type='hidden' value='0' name='detay_url'>
                                            <input type="checkbox" <?php if ($row['detay_url'] == 1) { ?> checked <?php }?> id="detayUrl" class="js-switch" data-color="#f62d51" name="detay_url" value="1" />
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-2 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="projeLimiti">Anasayfa Proje Limiti</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Anasayfa listelenen proje sayısını belirleyebilirsiniz</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="number" class="form-control" required name="proje_limit" value="<?=$row['proje_limit']?>" id="projeLimiti" required min=1 oninput="validity.valid||(value='');">
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <h4 style="font-weight: 500"><i class="mdi mdi-palette"></i> Görünüm Özelleştirmesi (Anasayfa)</h4>

                            <hr>

                            <div class="row" >




                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="tabBGColor">Tab Arkaplan Rengi</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Kategori Tablarının arkaplan rengini seçebilirsiniz</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" class="form-control jscolor" name="tab_color" value="<?=$row['tab_color']?>" id="tabBGColor">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="tabTxtcolor">Tab Yazı Rengi</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Kategori Tablarının yazı rengini seçebilirsiniz</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" class="form-control jscolor" name="tab_text_color" value="<?=$row['tab_text_color']?>" id="tabTxtcolor">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="actTabBg">Aktif Tab Arkaplan Rengi</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Aktif olan Kategori Tabının arkaplan rengini seçebilirsiniz</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" class="form-control jscolor" name="tab_active_color" value="<?=$row['tab_active_color']?>" id="actTabBg">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="actTabTxtColor">Aktif Tab Yazı Rengi</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Aktif olan Kategori Tabının yazı rengini seçebilirsiniz</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" class="form-control jscolor" name="tab_act_text_color" value="<?=$row['tab_act_text_color']?>" id="actTabTxtColor">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="tabFontSize">Tab Yazıları Büyüklüğü</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Sayı sonuna "px" ekleyin. Estetikliği bozmamaya önem gösterin</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" class="form-control" name="tab_font_size" value="<?=$row['tab_font_size']?>" id="tabFontSize" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="tabBorderRad">Tab Kenarı Ovallik Değeri</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Border-Radius ayarını belirleyebilirsiniz. İdeal : 0'dır</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="number" class="form-control" name="tab_border_radius" value="<?=$row['tab_border_radius']?>" id="tabBorderRad" required min=0 oninput="validity.valid||(value='');">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="projeBoxRadius">Proje Kutuları Ovallik Değeri</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Proje kutularının Border-Radius ayarını belirleyebilirsiniz. İdeal : 5'tir</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="number" class="form-control" name="border_radius" value="<?=$row['border_radius']?>" id="projeBoxRadius" required min=0 oninput="validity.valid||(value='');">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="proTextColor">Proje Kutusu Yazıları Rengi</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Anasayfadaki proje kutularının başlık ve açıklama rengini seçebilirsiniz</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" class="form-control jscolor" name="pro_text_color" value="<?=$row['pro_text_color']?>" id="proTextColor">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="proboxBGColor">Proje Kutusu Arkaplan Rengi</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Anasayfadaki proje kutularının arkaplan rengini seçebilirsiniz</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" class="form-control jscolor" name="pro_text_bg" value="<?=$row['pro_text_bg']?>" id="proboxBGColor">
                                        </div>
                                    </div>
                                </div>


                            </div>



                        </div>
                    </div>






                    <div class="tab-pane p-20" id="meta" role="tabpanel">


                        <div class="row">

                            <div class="form-group col-md-12">
                                <label style="font-weight: 500" for="metaDesc"><i class="fa fa-hashtag"></i> Meta - Açıklaması</label><br><br>
                                <small class="text-purple" style="font-size:13px;">Sadece <strong>projelerimiz</strong> sayfası için geçerlidir. Proje detay sayfalarının meta ayarları yeni proje ekleme sayfasından eklenmelidir</small>
                                <br><br>
                                <textarea name="meta_desc"  id="metaDesc" class="form-control" rows="3" ><?=$row['meta_desc']?></textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label style="font-weight: 500" for="metaTags"><i class="fa fa-tags"></i> Meta - Etiketler</label><br><br>
                                <small class="text-purple" style="font-size:13px;">Sadece <strong>projelerimiz</strong> sayfası için geçerlidir. Proje detay sayfalarının meta ayarları yeni proje ekleme sayfasından eklenmelidir</small>
                                <br><br>
                                <input type="text"  data-role="tagsinput" id="metaTags" placeholder="Etiket Ekle" name="tags" value="<?=$row['tags']?>" />
                            </div>

                        </div>


                    </div>


                </div>

                    <div class="form-actions p-l-20">
                        <button type="submit" class="btn btn-success" name="projemoduldegis">
                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                            <span class="sr-only">Yükleniyor...</span>
                            Tüm Ayarları Güncelle
                        </button>
                    </div>

                </form>

            </div>







        </div>
    </div>
</div>


<?php if( $_GET['status']=='success'){ ?>
    <body onload="sweetAlert('İşlem Başarılı', 'İşleminiz başarıyla gerçekleşmiştir', 'success');">
    </body>
    <meta http-equiv="refresh" content="2; URL=pages.php?sayfa=projemodul">
<?php }?>
<?php if($_GET['status']=='warning'){ ?>
    <body onload="sweetAlert('Başarısız!', 'İşlem sırasında hata oluştu', 'warning');">
    </body>
    <meta http-equiv="refresh" content="2; URL=pages.php?sayfa=projemodul">
<?php }?>