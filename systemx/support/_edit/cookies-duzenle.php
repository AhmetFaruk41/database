<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$degerSay = $db->prepare("select * from cerez_ayar where dil='$_SESSION[dil]' and id='$_GET[id]'");
$degerSay->execute();
$row = $degerSay->fetch(PDO::FETCH_ASSOC);
?>

<?php
if($degerSay->rowCount() <= 0 ) {
    header("Location:pages.php?sayfa=cookies");
}
?>
    <title>Çerezler Anlaşması Düzenle | <?=$ayar['site_baslik']?></title>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor"><i class="mdi mdi-eyedropper"></i> Çerezler Anlaşması Düzenle</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                    <li class="breadcrumb-item"><a href="pages.php?sayfa=cookies">Çerezler Anlaşması</a></li>
                    <li class="breadcrumb-item active">Çerezler Anlaşması Düzenle</li>
                </ol>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">




                <div class="card-body" style="font-family: 'Open Sans', Arial; padding: 0.25em;">

                    <div class="card-body p-b-0">
                        <h3 class="card-title">Çerezler Anlaşması Düzenle<span style="font-size:15px;">( <i class="flag-icon-<?php echo $lang['flag'] ?>" style="width:18px; height:13px; display: inline-block; margin-right: 10px; "></i><?=$lang['baslik']?> Dilinde ) </span></h3>

                        <hr>

                        <!-- Nav tabs -->

                        <!-- Tab panes -->
                        <form action="support/post/update/cookies.php" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="cook_id" value="<?=$row['id']?>">

                            <div class="tab-content">
                                <div class="tab-pane active" id="genel" role="tabpanel">
                                    <div>


                                        <div class="row">

                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label class="control-label" for="yayin" style="margin-bottom: 13px; font-weight: 600">Yayın Durumu</label>
                                                    <br>
                                                    <input type='hidden' value='0' <?php if($row['durum'] == 0){?>checked<?php }?> name='durum'>
                                                    <input type="checkbox" <?php if($row['durum'] == 1){?>checked<?php }?> id="yayin" class="js-switch" data-color="#f62d51" name="durum" value="1" />
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label style="font-weight: 500" for="crz">Açıklama Yazısı</label>
                                                    <br><br>
                                                    <div class="input-group" >
                                                        <textarea name="spot" id="crz" rows="2" class="form-control" required placeholder="Örn : Deneyiminizi daha iyi hale getirmek için bu web sitesinde çerezleri kullanıyoruz. Devam ederek çerez kullanımımızı kabul etmiş oluyorsunuz"><?=$row['spot']?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">

                                            <div class="col-md-4 ">
                                                <div class="form-group">
                                                    <label style="font-weight: 500" for="btnTxt">Link Yazısı</label>
                                                    <br><br>
                                                    <div class="input-group" >
                                                        <input type="text" name="link_text" class="form-control" id="btnTxt" required placeholder="ÖRN : Şartlar ve Koşullar" value="<?=$row['link_text']?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label style="font-weight: 500" for="btbrl">Link</label>
                                                    <br><br>
                                                    <div class="input-group" >
                                                        <input type="text" name="link" class="form-control" id="btbrl"  placeholder="http://" value="<?=$row['link']?>" >
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="asdsadTxt" style="margin-bottom: 13px; font-weight: 600">Button Yazısı</label>
                                                    <br>
                                                    <input type="text"  id="asdsadTxt" class="form-control" name="button_text" required placeholder="Örn : Kabul Et" value="<?=$row['button_text']?>" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="countBG" style="margin-bottom: 13px; font-weight: 600">Button Rengi</label>
                                                    <br>
                                                    <input type="text"  id="countBG" class="form-control jscolor" name="button_bg" value="<?=$row['button_bg']?>"  />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="txtclr" style="margin-bottom: 13px; font-weight: 600">Button Yazı Renkleri</label>
                                                    <br>
                                                    <input type="text"  id="txtclr" class="form-control jscolor" name="button_text_color" value="<?=$row['button_text_color']?>" />
                                                </div>
                                            </div>


                                        </div>


                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="sasaxx" style="margin-bottom: 13px; font-weight: 600">Arkaplan Rengi</label>
                                                    <br>
                                                    <input type="text"  id="sasaxx" class="form-control jscolor" name="bg_color" value="<?=$row['bg_color']?>" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="vvzxc" style="margin-bottom: 13px; font-weight: 600">Açıklama Yazı Rengi</label>
                                                    <br>
                                                    <input type="text"  id="vvzxc" class="form-control jscolor" name="bg_text_color" value="<?=$row['bg_text_color']?>" />
                                                </div>
                                            </div>


                                        </div>


                                    </div>
                                </div>


                            </div>
                    </div>

                    <div class="form-actions p-l-20 p-b-20">
                        <button type="submit" class="btn btn-success" name="cookiesdegis">
                            <i class="fa fa-save "></i>
                             Kaydet
                        </button>
                    </div>

                    </form>

                </div>







            </div>
        </div>
    </div>
