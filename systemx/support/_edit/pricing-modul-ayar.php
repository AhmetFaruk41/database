<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$modulAyar = $db->prepare("select * from pricing_ayar where id='1'");
$modulAyar->execute();
$row = $modulAyar->fetch(PDO::FETCH_ASSOC);
?>

<title>Pricing Table Modül Ayarları | <?=$ayar['site_baslik']?></title>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="ti-dropbox"></i> Pricing Table Modül Ayarları</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item"><a href="pages.php?sayfa=pricingler">Pricing Table</a></li>
                <li class="breadcrumb-item active">Pricing Table Modül Ayarları</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">




            <div class="card-body" style="font-family: 'Open Sans', Arial">

                <div class="card-body p-b-0">
                    <h4 class="card-title">Pricing Table Modül Ayarları</h4>
                    <h6 class="card-subtitle">Pricing Table Modül Ayarları genel olarak anasayfadaki ürün modülünün görünüm ayarlarını içermektedir</h6> </div>



                <!-- Nav tabs -->
                <ul class="nav nav-tabs customtab" role="tablist" style="font-family: 'Open Sans', Arial; font-weight: 500; margin-bottom: 30px;">
                    <li class="nav-item" > <a class="nav-link active" data-toggle="tab" href="#genel" role="tab" ><span class="hidden-sm-up"><i class="ti-settings"></i></span> <span class="hidden-xs-down" >Genel</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#meta" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-search-web"></i></span> <span class="hidden-xs-down">SEO-Meta Ayarları</span></a> </li>
                </ul>
                <!-- Tab panes -->
                <form action="support/post/update/pricing-modul-ayar.php" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">




                <div class="tab-content">
                    <div class="tab-pane active" id="genel" role="tabpanel">
                        <div class="p-20">




                            <div class="row" style="margin-bottom: 25px;  ">


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="modulBaslik">Modül Başlığı</label>
                                        <br><br>
                                        <small class="text-success" style="font-size:13px">Bu yazıyı dil ayarlarınızdaki düzenleme alanının <strong>26.satırından</strong> değiştirebilirsiniz</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" class="form-control" disabled value="<?=$diller['pricing-table']?>" id="modulBaslik">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="modulSpot">Modül Açıklaması</label>
                                        <br><br>
                                        <small class="text-success" style="font-size:13px">Bu yazıyı dil ayarlarınızdaki düzenleme alanının <strong>27.satırından</strong> değiştirebilirsiniz</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <textarea  id="modulSpot" rows="1" class="form-control" disabled><?=$diller['pricing-aciklamasi']?></textarea>
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


                                <div class="col-md-4 ">
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

                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="textSizez">Tablo Adı Font Size</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Tablo adının boyutunu kendinizce ayarlayabilirsiniz</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <select name="text_size" id="textSizez" class="form-control">
                                                <option value="font-20" <?php if ($row['text_size'] == 'font-20') { ?>selected <?php }?> >Küçük</option>
                                                <option value="font-24" <?php if ($row['text_size'] == 'font-24') { ?>selected <?php }?>>Normal</option>
                                                <option value="font-30" <?php if ($row['text_size'] == 'font-30') { ?>selected <?php }?>>Büyük</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="textWeights">Tablo Adı Font Kalınlık</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Tablo adının kalınlığını kendinizce ayarlayabilirsiniz</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <select name="text_weight" id="textWeights" class="form-control">
                                                <option value="font-exlight" <?php if ($row['text_weight'] == 'font-exlight') { ?>selected <?php }?> >İnce</option>
                                                <option value="font-small" <?php if ($row['text_weight'] == 'font-small') { ?>selected <?php }?>>Normal</option>
                                                <option value="font-bold" <?php if ($row['text_weight'] == 'font-bold') { ?>selected <?php }?>>Kalın</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>


                            <h4 style="font-weight: 500"><i class="mdi mdi-palette"></i> Modül Görünüm Ayarları</h4>

                            <hr>

                            <div class="row" >

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="tabloRenkName">Tablo Adı Rengi</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Tablo adınızın hangi renk olacağını seçebilirsiniz</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" class="form-control jscolor" name="text_color" value="<?=$row['text_color']?>" id="tabloRenkName">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="tabloIconRenk">Tablo İkon Rengi</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Tablonuzun ikon rengini kendinize göre seçebilirsiniz</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" class="form-control jscolor" name="icon_color" value="<?=$row['icon_color']?>" id="tabloIconRenk">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="tabloOzellikRenk">Tablo Özelliklerinin Rengi</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Tablonuzun ait özelliklerin yazı renklerini belirleyebilirsiniz</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" class="form-control jscolor" name="ozellik_color" value="<?=$row['ozellik_color']?>" id="tabloOzellikRenk">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="tavsiyeTable">Tavsiye Edilen Tablo Rengi</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Tavsiye edilen seçeneği aktif olan tabloların rengi</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" class="form-control jscolor" name="tavsiye_color" value="<?=$row['tavsiye_color']?>" id="tavsiyeTable">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="tavsiyeTxt">Tavsiye Yazısı Rengi</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Tavsiye edilen yazısının rengi</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" class="form-control jscolor" name="tavsiye_text_color" value="<?=$row['tavsiye_text_color']?>" id="tavsiyeTxt">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="butonBgsi">Satın Al Buton Arkaplanı</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Arkaplan rengini seçebilirsiniz</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" class="form-control jscolor" name="button_bg" value="<?=$row['button_bg']?>" id="butonBgsi">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="butonTxtColor">Satın Al Buton Yazı Rengi</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Buton yazısının rengini seçebilirsiniz</small>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" class="form-control jscolor" name="button_text_color" value="<?=$row['button_text_color']?>" id="butonTxtColor">
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

                                <textarea name="meta_desc"  id="metaDesc" class="form-control" rows="3" ><?=$row['meta_desc']?></textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label style="font-weight: 500" for="metaTags"><i class="fa fa-tags"></i> Meta - Etiketler</label><br><br>

                                <input type="text"  data-role="tagsinput" id="metaTags" placeholder="Etiket Ekle" name="tags" value="<?=$row['tags']?>" />
                            </div>

                        </div>


                    </div>


                </div>

                    <div class="form-actions p-l-20">
                        <button type="submit" class="btn btn-success" name="pricingayar">
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
    <meta http-equiv="refresh" content="2; URL=pages.php?sayfa=pricingmodul">
<?php }?>
<?php if($_GET['status']=='warning'){ ?>
    <body onload="sweetAlert('Başarısız!', 'İşlem sırasında hata oluştu', 'warning');">
    </body>
    <meta http-equiv="refresh" content="2; URL=pages.php?sayfa=pricingmodul">
<?php }?>