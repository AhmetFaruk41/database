<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>E-Bülten Modül Ayarları | <?=$ayar['site_baslik']?></title>
<?php
$ebultenAyar = $db->prepare("select * from ebulten_ayar where id='1' ");
$ebultenAyar->execute();
$bulten = $ebultenAyar->fetch(PDO::FETCH_ASSOC);
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="ti-location-arrow"></i> E-Bülten Modül Ayarları</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item active">E-Bülten Modül Ayarları</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">




            <div class="card-body" style="font-family: 'Open Sans', Arial">

                <div class="card-body p-b-0">
                    <h3 class="card-title">E-Bülten Modül Ayarları</h3>
                    <h6 class="card-subtitle">Anasayfadaki e-bülten modülünün görünüm ayarlarını yapabilirsiniz.</h6> </div>



                <!-- Nav tabs -->
                <ul class="nav nav-tabs customtab m-b-20" role="tablist" style="font-family: 'Open Sans', Arial; font-weight: 500">
                    <li class="nav-item" > <a class="nav-link active" data-toggle="tab" href="#head" role="tab" ><span class="hidden-sm-up"></span> <span class="hidden-xs-down" >Genel Ayarlar</span></a> </li>
                    <li class="nav-item" > <a class="nav-link " data-toggle="tab" href="#renk" role="tab" ><span class="hidden-sm-up"></span><i class="mdi mdi-palette"></i> <span class="hidden-xs-down" >Düz Renk</span></a> </li>
                    <li class="nav-item" > <a class="nav-link " data-toggle="tab" href="#gorsel" role="tab" ><span class="hidden-sm-up"></span> <i class="mdi mdi-image"></i><span class="hidden-xs-down" >Arkaplan Görseli</span></a> </li>

                </ul>
                <!-- Tab panes -->



                <div class="tab-content">
                    <div class="tab-pane active" id="head" role="tabpanel">
                        <div class="p-20">

                            <form action="support/post/update/ebulten-ayar.php" class="form-horizontal form-bordered" method="post">


                            <div class="row">


                                <div class="col-md-3 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500">Arkaplan Alanı Genişliği</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Geniş seçilirse %100, Kutu seçilirse %90 genişlk olur.</small>
                                        <br><br>
                                        <div class="input-group" >

                                            <select name="width" class="form-control" >
                                                <option value="0" <?php if($bulten['width'] == 0 ) { ?> selected <?php }?>>Geniş</option>
                                                <option value="1" <?php if($bulten['width'] == 1 ) { ?> selected <?php }?>>Kutu</option>
                                            </select>

                                        </div>

                                    </div>
                                </div>


                                <div class="col-md-3 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500">Arkaplan Türü</label>
                                        <br><br>

                                        <small class="form-control-feedback text-purple" style="font-size:13px">Seçim sonrası tablardan renk veya arkaplan görseli seçin.</small>
                                        <br>  <br>
                                        <div class="input-group" >

                                            <select name="tip" class="form-control" >
                                                <option value="0" <?php if($bulten['tip'] == '0' ) { ?> selected <?php }?>>Düz Renk</option>
                                                <option value="1" <?php if($bulten['tip'] == '1' ) { ?> selected <?php }?>>Arkaplan Görseli</option>
                                            </select>

                                        </div>


                                    </div>
                                </div>


                                <div class="col-md-3 ">
                                    <div class="form-group">

                                        <label style="font-weight: 500" for="sizeSec">Padding Değeri</label>

                                        <br><br>

                                        <small class="form-control-feedback text-purple" style="font-size:13px">Yukarıdan ve aşağıdan aralık bırakabilirsiniz.</small>

                                        <br><br>

                                        <div class="input-group" >
                                            <input type="number" class="form-control" name="padding" value="<?=$bulten['padding']?>" id="sizeSec">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-3 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500">Yazıların Hizası</label>
                                        <br><br>

                                        <small class="form-control-feedback text-purple" style="font-size:13px">Yazıların hizalarını ayarlayabilirsiniz</small>
                                        <br>  <br>
                                        <div class="input-group" >

                                            <select name="area" class="form-control" >
                                                <option value="left" <?php if($bulten['area'] == 'left' ) { ?> selected <?php }?>>Sol Taraf</option>
                                                <option value="center" <?php if($bulten['area'] == 'center' ) { ?> selected <?php }?>>Ortalı</option>
                                                <option value="right" <?php if($bulten['area'] == 'right' ) { ?> selected <?php }?>>Sağ Taraf</option>
                                            </select>

                                        </div>


                                    </div>
                                </div>




                            </div>


                            <div class="row">


                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label style="font-weight: 500" for="topHeadBGColor">Başlık Rengi</label>

                                        <br><br>

                                        <small class="form-control-feedback text-purple" style="font-size:13px">Belirgin olmasına önem gösterin</small>

                                        <br><br>

                                        <div class="input-group" >
                                            <input type="text" class="form-control jscolor" name="baslik_color" value="<?=$bulten['baslik_color']?>" id="topHeadBGColor">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label style="font-weight: 500" for="hereColor">Açıklama Rengi</label>

                                        <br><br>

                                        <small class="form-control-feedback text-purple" style="font-size:13px">Belirgin olmasına özen gösterin</small>

                                        <br><br>

                                        <div class="input-group" >
                                            <input type="text" class="form-control jscolor" name="spot_color" value="<?=$bulten['spot_color']?>" id="hereColor">
                                        </div>

                                    </div>
                                </div>

                            </div>


                                <div class="row">




                                    <div class="col-md-3">
                                        <div class="form-group">

                                            <label style="font-weight: 500" for="ePostaInput">E-Posta Giriş Arkaplan Rengi</label>

                                            <br><br>

                                            <small class="form-control-feedback text-purple" style="font-size:13px">E-Posta adreslerinin yazıldığı input alanı</small>

                                            <br><br>

                                            <div class="input-group" >
                                                <input type="text" class="form-control jscolor" name="input_bg_color" value="<?=$bulten['input_bg_color']?>" id="ePostaInput">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">

                                            <label style="font-weight: 500" for="ePostaInputText">E-Posta Giriş Yazı Rengi</label>

                                            <br><br>

                                            <small class="form-control-feedback text-purple" style="font-size:13px">E-Posta adreslerinin yazıldığı input alanı</small>

                                            <br><br>

                                            <div class="input-group" >
                                                <input type="text" class="form-control jscolor" name="input_text_color" value="<?=$bulten['input_text_color']?>" id="ePostaInputText">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">

                                            <label style="font-weight: 500" for="ButtonBack">Button Arkaplan Rengi</label>

                                            <br><br>

                                            <small class="form-control-feedback text-purple" style="font-size:13px">Abone ol butonunun arkaplan rengi</small>

                                            <br><br>

                                            <div class="input-group" >
                                                <input type="text" class="form-control jscolor" name="button_bg_color" value="<?=$bulten['button_bg_color']?>" id="ButtonBack">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">

                                            <label style="font-weight: 500" for="ButtonBackText">Button Yazı Rengi</label>

                                            <br><br>

                                            <small class="form-control-feedback text-purple" style="font-size:13px">Abone ol butonunun yazı rengi</small>

                                            <br><br>

                                            <div class="input-group" >
                                                <input type="text" class="form-control jscolor" name="button_text_color" value="<?=$bulten['button_text_color']?>" id="ButtonBackText">
                                            </div>

                                        </div>
                                    </div>



                                </div>


                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success" name="ebultenayardegis">
                                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                                        <span class="sr-only">Yükleniyor...</span> Güncelle
                                    </button>
                                </div>




                        </form>
                        </div>

                    </div>
                    <div class="tab-pane" id="renk" role="tabpanel">
                        <div class="p-20">


                            <form action="support/post/update/ebulten-ayar-color.php" class="form-horizontal form-bordered" method="post">


                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <label style="font-weight: 500" for="duzRenk">Düz Renk Seçimi</label>

                                            <br><br>

                                            <small class="form-control-feedback text-purple" style="font-size:13px">Arkaplan türünün "düz renk" olarak seçili olması gerekir.</small>

                                            <br><br>

                                            <div class="input-group" >
                                                <input type="text" class="form-control jscolor" name="back_color" value="<?=$bulten['back_color']?>" id="duzRenk">
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success" name="ebultenayarrenk">
                                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                                        <span class="sr-only">Yükleniyor...</span> Güncelle
                                    </button>
                                </div>

                            </form>


                        </div>
                    </div>
                    <div class="tab-pane" id="gorsel" role="tabpanel">
                        <div class="p-20">

                            <div class="col-md-12">
                                <form action="support/post/update/ebulten-ayar-image.php"  method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label" for="siteLogo" style="margin-bottom: 13px; font-weight: 600">Arkaplan Görseli</label>
                                        <br>

                                        <small class="form-control-feedback text-purple" style="font-size:13px">Arkaplan türünün "arkaplan görseli" olarak seçili olması gerekir. Ayrıca minimum 1920px genişliğinde olmalıdır.</small>

                                        <br><br>
                                        <div style="width: 100%; height: auto; background-color: #F9F9F9; border:1px solid #EBEBEB; padding: 15px; 0 15px 0; text-align: center; margin-top:8px;">
                                            <?php if($bulten['back_bg'] == null) { ?>
                                            Arkaplan Görseli Eklenmemiş!
                                            <?php } else {?>
                                            <img src="../images/uploads/<?=$bulten['back_bg']?>" alt="" style="max-width: 100%;">
                                            <?php }?>
                                        </div>

                                        <input type="hidden" name="eski_bg" value="<?=$bulten['back_bg']?>" >


                                        <div class="input-group" style="margin-top: 8px">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="back_bg" required>
                                                <label class="custom-file-label" for="inputGroupFile04">Seç</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-info" name="ebultengorsel">
                                                    <i class="fa fa-refresh fa-spin fa-fw"></i>
                                                    <span class="sr-only">Yükleniyor...</span> Güncelle
                                                </button>
                                            </div>
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
    </div>
</div>



<?php if( $_GET['status']=='success'){ ?>
    <body onload="sweetAlert('İşlem Başarılı', 'Güncelleme işleminiz gerçekleşmiştir', 'success');">
    </body>
    <meta http-equiv="refresh" content="2; URL=pages.php?sayfa=ebultenayar&page_id=<?=$page['id']?>">
<?php }?>
<?php if($_GET['status']=='warning'){ ?>
    <body onload="sweetAlert('Başarısız!', 'İşlem sırasında hata oluştu', 'warning');">
    </body>
    <meta http-equiv="refresh" content="2; URL=pages.php?sayfa=ebultenayar&page_id=<?=$page['id']?>">
<?php }?>
<?php if($_GET['status']=='imgtype'){ ?>
    <body onload="sweetAlert('HATA!', 'Görsel dosyanız jpg, png veya gif türü dışında olamaz', 'warning');">
    </body>
    <meta http-equiv="refresh" content="2; URL=pages.php?sayfa=ebultenayar&page_id=<?=$page['id']?>">
<?php }?>


