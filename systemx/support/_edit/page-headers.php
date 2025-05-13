<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Sayfa Bannerını Düzenle | <?=$ayar['site_baslik']?></title>
<?php
$pageHeaders = $db->prepare("select * from page_header where id='$_GET[page_id]' ");
$pageHeaders->execute();
$page = $pageHeaders->fetch(PDO::FETCH_ASSOC);
?>
<?php
if($pageHeaders->rowCount() == 0 ) {
    header("Location:pages.php?sayfa=pageheaders");
}
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="ti-pin-alt"></i> Sayfa Bannerını Düzenle</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item"><a href="pages.php?sayfa=pageheaders">Sayfa Bannerları</a></li>
                <li class="breadcrumb-item active">Sayfa Bannerını Düzenle</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">




            <div class="card-body" style="font-family: 'Open Sans', Arial">

                <div class="card-body p-b-0">
                    <h3 class="card-title"><?=$page['baslik']?> Banner Alanını Düzenle</h3>
                    <h6 class="card-subtitle">Düz renk veya arkaplan olarak seçim yapabilirsiniz</h6> </div>



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

                            <form action="support/post/update/page-headers.php" class="form-horizontal form-bordered" method="post">

                                <input type="hidden" name="page_id" value="<?=$page['id']?>">

                            <div class="row">


                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500">Arkaplan Alanı Genişliği</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px">Geniş seçilirse %100, Kutu seçilirse %90 genişlk olur.</small>
                                        <br><br>
                                        <div class="input-group" >

                                            <select name="width" class="form-control" >
                                                <option value="0" <?php if($page['width'] == 0 ) { ?> selected <?php }?>>Geniş</option>
                                                <option value="1" <?php if($page['width'] == 1 ) { ?> selected <?php }?>>Kutu</option>
                                            </select>

                                        </div>

                                    </div>
                                </div>


                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500">Arkaplan Türü</label>
                                        <br><br>

                                        <small class="form-control-feedback text-purple" style="font-size:13px">Hangisini seçiyorsanız ona göre tablardan renk veya arkaplan görseli seçin.</small>
                                        <br>  <br>
                                        <div class="input-group" >

                                            <select name="tip" class="form-control" >
                                                <option value="0" <?php if($page['tip'] == '0' ) { ?> selected <?php }?>>Düz Renk</option>
                                                <option value="1" <?php if($page['tip'] == '1' ) { ?> selected <?php }?>>Arkaplan Görseli</option>
                                            </select>

                                        </div>


                                    </div>
                                </div>


                                <div class="col-md-4 ">
                                    <div class="form-group">

                                        <label style="font-weight: 500" for="sizeSec">Padding Değeri</label>

                                        <br><br>

                                        <small class="form-control-feedback text-purple" style="font-size:13px">Yukarıdan ve aşağıdan aralık bırakabilirsiniz.</small>

                                        <br><br>

                                        <div class="input-group" >
                                            <input type="number" class="form-control" name="padding" value="<?=$page['padding']?>" id="sizeSec">
                                        </div>

                                    </div>
                                </div>



                            </div>


                            <div class="row">


                                <div class="col-md-3">
                                    <div class="form-group">

                                        <label style="font-weight: 500" for="topHeadBGColor">Başlık Rengi</label>

                                        <br><br>

                                        <small class="form-control-feedback text-purple" style="font-size:13px">Belirgin olmasına önem gösterin.</small>

                                        <br><br>

                                        <div class="input-group" >
                                            <input type="text" class="form-control jscolor" name="text_color" value="<?=$page['text_color']?>" id="topHeadBGColor">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">

                                        <label style="font-weight: 500" for="hereColor">Buradasınız Yazısı Rengi</label>

                                        <br><br>

                                        <small class="form-control-feedback text-purple" style="font-size:13px">Ana yazı renginden biraz soluk olmalıdır.</small>

                                        <br><br>

                                        <div class="input-group" >
                                            <input type="text" class="form-control jscolor" name="pasif_text_color" value="<?=$page['pasif_text_color']?>" id="hereColor">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">

                                        <label style="font-weight: 500" for="bordeRColor">Border Rengi</label>

                                        <br><br>

                                        <small class="form-control-feedback text-purple" style="font-size:13px">Border rengini ayarlayabilirsiniz</small>

                                        <br><br>

                                        <div class="input-group" >
                                            <input type="text" class="form-control jscolor" name="border_color" value="<?=$page['border_color']?>" id="bordeRColor">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" for="shadowSS" style="margin-bottom: 6px; font-weight: 600">Gölgelendirme</label>
                                        <br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px"> Düz renk seçili ise daha net belli olur.</small>
                                        <br><br>
                                        <input type='hidden' value='0' name='shadow'>
                                        <input type="checkbox" <?php if($page['shadow'] == 1){?>checked<?php }?> class="js-switch" id="shadowSS" data-color="#f62d51" name="shadow" value="1" />

                                    </div>
                                </div>



                            </div>



                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success" name="pageheaddegis">
                                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                                        <span class="sr-only">Yükleniyor...</span> Güncelle
                                    </button>
                                </div>




                        </form>
                        </div>

                    </div>
                    <div class="tab-pane" id="renk" role="tabpanel">
                        <div class="p-20">


                            <form action="support/post/update/page-headers-color.php" class="form-horizontal form-bordered" method="post">

                                <input type="hidden" name="page_id" value="<?=$page['id']?>">

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <label style="font-weight: 500" for="duzRenk">Düz Renk Seçimi</label>

                                            <br><br>

                                            <small class="form-control-feedback text-purple" style="font-size:13px">Arkaplan türünün "düz renk" olarak seçili olması gerekir.</small>

                                            <br><br>

                                            <div class="input-group" >
                                                <input type="text" class="form-control jscolor" name="bg_color" value="<?=$page['bg_color']?>" id="duzRenk">
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success" name="pageheadcolor">
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
                                <form action="support/post/update/page-headers-image.php"  method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label" for="siteLogo" style="margin-bottom: 13px; font-weight: 600">Arkaplan Görseli</label>
                                        <br>

                                        <small class="form-control-feedback text-purple" style="font-size:13px">Arkaplan türünün "arkaplan görseli" olarak seçili olması gerekir. Ayrıca minimum 1920px genişliğinde olmalıdır.</small>

                                        <br><br>
                                        <div style="width: 100%; height: auto; background-color: #F9F9F9; border:1px solid #EBEBEB; padding: 15px; 0 15px 0; text-align: center; margin-top:8px;">
                                            <?php if($page['bg_image'] == null) { ?>
                                            Bu sayfa için arkaplan görseli eklenmemiş!
                                            <?php } else {?>
                                            <img src="../images/uploads/<?=$page['bg_image']?>" alt="" style="max-width: 100%;">
                                            <?php }?>
                                        </div>

                                        <input type="hidden" name="eski_bg" value="<?=$page['bg_image']?>" >
                                        <input type="hidden" name="page_id" value="<?=$page['id']?>" >



                                        <div class="input-group" style="margin-top: 8px">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="bg_image" required>
                                                <label class="custom-file-label" for="inputGroupFile04">Seç</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-info" name="pagegorseldegis">
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
    <meta http-equiv="refresh" content="2; URL=pages.php?sayfa=pagehead&page_id=<?=$page['id']?>">
<?php }?>
<?php if($_GET['status']=='warning'){ ?>
    <body onload="sweetAlert('Başarısız!', 'İşlem sırasında hata oluştu', 'warning');">
    </body>
    <meta http-equiv="refresh" content="2; URL=pages.php?sayfa=pagehead&page_id=<?=$page['id']?>">
<?php }?>
<?php if($_GET['status']=='imgtype'){ ?>
    <body onload="sweetAlert('HATA!', 'Görsel dosyanız jpg, png veya gif türü dışında olamaz', 'warning');">
    </body>
    <meta http-equiv="refresh" content="2; URL=pages.php?sayfa=pagehead&page_id=<?=$page['id']?>">
<?php }?>


