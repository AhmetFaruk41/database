<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$veriCek = $db->prepare("select * from tetikleyiciler where id='$_GET[id]' ");
$veriCek->execute();
$row = $veriCek->fetch(PDO::FETCH_ASSOC);

?>

<?php
if($veriCek->rowCount() == 0 ) {
    header("Location:pages.php?sayfa=usttetikleyiciler");
}
?>
    <title>Üst Tetikleyici Düzenle | <?=$ayar['site_baslik']?></title>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor"><i class="mdi mdi-needle"></i> Üst Tetikleyici Düzenle</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                    <li class="breadcrumb-item"><a href="pages.php?sayfa=usttetikleyiciler">Üst Tetikleyiciler</a></li>
                    <li class="breadcrumb-item active">Üst Tetikleyici Düzenle</li>
                </ol>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">




                <div class="card-body" style="font-family: 'Open Sans', Arial; padding: 0.25em;">

                    <div class="card-body p-b-0">
                        <h3 class="card-title">Üst Tetikleyici Düzenle<span style="font-size:15px;">( <i class="flag-icon-<?php echo $lang['flag'] ?>" style="width:18px; height:13px; display: inline-block; margin-right: 10px; "></i><?=$lang['baslik']?> Dilinde ) </span></h3>

                        <hr>

                        <!-- Nav tabs -->

                        <!-- Tab panes -->
                        <form action="support/post/update/tetikleyici-ust-duzenle.php" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="tetik_id" value="<?=$row['id']?>">

                            <div class="tab-content">
                                <div class="tab-pane active" id="genel" role="tabpanel">
                                    <div>



                                        <div class="row">

                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label style="font-weight: 500" for="txT">Kısa Yazı</label>
                                                    <br><br>
                                                    <div class="input-group" >
                                                        <input type="text" name="text" class="form-control" id="txT" required value="<?=$row['text']?>" placeholder="ÖRN : Kampanyalardan faydalanmak ve haberdar olmak için">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>




                                        <div class="row">

                                            <div class="col-md-4 ">
                                                <div class="form-group">
                                                    <label style="font-weight: 500" for="btnTxt">Button Yazısı</label>
                                                    <br><br>
                                                    <div class="input-group" >
                                                        <input type="text" name="button_text" class="form-control" id="btnTxt" value="<?=$row['button_text']?>" required placeholder="ÖRN : Bize Ulaşın">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label style="font-weight: 500" for="btbrl">Button Linki</label>
                                                    <br><br>
                                                    <div class="input-group" >
                                                        <input type="text" name="url" class="form-control" id="btbrl" value="<?=$row['url']?>"  placeholder="http://" >
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row">

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label" for="countBG" style="margin-bottom: 13px; font-weight: 600">Genişlik Durumu</label>
                                                    <br>
                                                    <select name="width" class="selectpicker col-md-12 p-l-0 p-r-0" data-style="form-control btn-secondary" id="widthDegeri" >
                                                        <option value="0" <?php if($row['width'] == 0){?>selected<?php }?>>Geniş</option>
                                                        <option value="1" <?php if($row['width'] == 1){?>selected<?php }?>>Kutu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label" for="countBG" style="margin-bottom: 13px; font-weight: 600">Arkaplan Rengi</label>
                                                    <br>
                                                    <input type="text"  id="countBG" class="form-control jscolor" name="bg_color" value="<?=$row['bg_color']?>" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label" for="txtclr" style="margin-bottom: 13px; font-weight: 600">Yazı Renkleri</label>
                                                    <br>
                                                    <input type="text"  id="txtclr" class="form-control jscolor" name="text_color" value="<?=$row['text_color']?>" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label" for="btnbrdr" style="margin-bottom: 13px; font-weight: 600">Button Kenarlık Rengi</label>
                                                    <br>
                                                    <input type="text"  id="btnbrdr" class="form-control jscolor" name="border_color" value="<?=$row['border_color']?>" />
                                                </div>
                                            </div>

                                        </div>





                                    </div>
                                </div>


                            </div>
                    </div>

                    <div class="form-actions p-l-20 p-b-20">
                        <button type="submit" class="btn btn-success" name="tetikleyicidegis">
                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                            <span class="sr-only">Yükleniyor...</span> Güncelle
                        </button>
                    </div>

                    </form>

                </div>







            </div>
        </div>
    </div>
