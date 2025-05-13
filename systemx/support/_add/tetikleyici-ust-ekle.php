<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$veriCek = $db->prepare("select * from tetikleyiciler where area='0' and id='$_GET[id]' and dil='$_SESSION[dil]' order by id desc limit 1");
$veriCek->execute();
$row = $veriCek->fetch(PDO::FETCH_ASSOC);

$degerSay = $db->prepare("select * from tetikleyiciler where area='0' and dil='$_SESSION[dil]'");
$degerSay->execute();
?>

<?php
if($degerSay->rowCount() >0 ) {
    header("Location:pages.php?sayfa=usttetikleyiciler");
}
?>
    <title>Üst Tetikleyici Ekle | <?=$ayar['site_baslik']?></title>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor"><i class="mdi mdi-needle"></i> Üst Tetikleyici Ekle</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                    <li class="breadcrumb-item"><a href="pages.php?sayfa=usttetikleyiciler">Üst Tetikleyiciler</a></li>
                    <li class="breadcrumb-item active">Üst Tetikleyici Ekle</li>
                </ol>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">




                <div class="card-body" style="font-family: 'Open Sans', Arial; padding: 0.25em;">

                    <div class="card-body p-b-0">
                        <h3 class="card-title">Üst Tetikleyici Ekle<span style="font-size:15px;">( <i class="flag-icon-<?php echo $lang['flag'] ?>" style="width:18px; height:13px; display: inline-block; margin-right: 10px; "></i><?=$lang['baslik']?> Dilinde ) </span></h3>

                        <hr>

                        <!-- Nav tabs -->

                        <!-- Tab panes -->
                        <form action="support/post/insert/tetikleyici-ust.php" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="dil" value="<?=$_SESSION['dil']?>">

                            <div class="tab-content">
                                <div class="tab-pane active" id="genel" role="tabpanel">
                                    <div>


                                        <div class="row">

                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label style="font-weight: 500" for="txT">Kısa Yazı</label>
                                                    <br><br>
                                                    <div class="input-group" >
                                                        <input type="text" name="text" class="form-control" id="txT" required placeholder="ÖRN : Kampanyalardan faydalanmak ve haberdar olmak için">
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
                                                        <input type="text" name="button_text" class="form-control" id="btnTxt" required placeholder="ÖRN : Bize Ulaşın">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label style="font-weight: 500" for="btbrl">Button Linki</label>
                                                    <br><br>
                                                    <div class="input-group" >
                                                        <input type="text" name="url" class="form-control" id="btbrl"  placeholder="http://" >
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
                                                        <option value="0">Geniş</option>
                                                        <option value="1">Kutu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label" for="countBG" style="margin-bottom: 13px; font-weight: 600">Arkaplan Rengi</label>
                                                    <br>
                                                    <input type="text"  id="countBG" class="form-control jscolor" name="bg_color" value="ee294a" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label" for="txtclr" style="margin-bottom: 13px; font-weight: 600">Yazı Renkleri</label>
                                                    <br>
                                                    <input type="text"  id="txtclr" class="form-control jscolor" name="text_color" value="FFFFFF" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label" for="btnbrdr" style="margin-bottom: 13px; font-weight: 600">Button Kenarlık Rengi</label>
                                                    <br>
                                                    <input type="text"  id="btnbrdr" class="form-control jscolor" name="border_color" value="FFFFFF" />
                                                </div>
                                            </div>

                                        </div>





                                    </div>
                                </div>


                            </div>
                    </div>

                    <div class="form-actions p-l-20 p-b-20">
                        <button type="submit" class="btn btn-success" name="tetikleyiciekle">
                            <i class="fa fa-save "></i>
                             Kaydet
                        </button>
                    </div>

                    </form>

                </div>







            </div>
        </div>
    </div>
