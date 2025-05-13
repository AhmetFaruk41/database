<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$degerCek = $db->prepare("select * from video where id='$_GET[video_id]'");
$degerCek->execute();
$row = $degerCek->fetch(PDO::FETCH_ASSOC);
?>
<?php
if($degerCek->rowCount() == 0 ) {
    header("Location:pages.php?sayfa=videolar");
}
?>
<title>Video Düzenle | <?=$ayar['site_baslik']?></title>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="mdi mdi-youtube-play"></i> Video Düzenle</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item"><a href="pages.php?sayfa=videolar">Videolar</a></li>
                <li class="breadcrumb-item active">Video Düzenle</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">




            <div class="card-body" style="font-family: 'Open Sans', Arial; padding: 0.25em;">

                <div class="card-body p-b-0">
                    <h3 class="card-title">Video Düzenle <span style="font-size:15px;">( <i class="flag-icon-<?php echo $lang['flag'] ?>" style="width:18px; height:13px; display: inline-block; margin-right: 10px; "></i><?=$lang['baslik']?> Dilinde ) </span></h3>

                <hr>

                <!-- Nav tabs -->

                <!-- Tab panes -->
                <form action="support/post/update/video-duzenle.php" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="video_id" value="<?=$row['id']?>">
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
                                        <input type="checkbox" <?php if($row['durum'] == 1) { ?> checked<?php }?> id="yayin" class="js-switch" data-color="#f62d51" name="durum" value="1" />
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label class="control-label" for="ahomeSelect" style="margin-bottom: 13px; font-weight: 600">Anasayfa Seçimi</label>
                                        <br>
                                        <input type='hidden' value='0' name='anasayfa'>
                                        <input type="checkbox" <?php if($row['anasayfa'] == 1) { ?> checked<?php }?> id="ahomeSelect" class="js-switch" data-color="#f62d51" name="anasayfa" value="1" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="basLik">Başlık</label>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" name="baslik" class="form-control" id="basLik" required value="<?=$row['baslik']?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="siraArea">Sıra</label>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="number" name="sira" class="form-control" id="siraArea" value="<?=$row['sira']?>" required min=1 oninput="validity.valid||(value='');">
                                        </div>
                                    </div>
                                </div>



                            </div>




                            <div class="row">
                                <div class="col-md-12 p-l-0 ">
                                    <div class="form-group col-md-12">
                                        <label style="font-weight: 500" for="resim"><i class="fa fa-photo"></i> Video Kapak Görseli</label>
                                        <div style="width: 100%; height: auto; background-color: #F9F9F9; border:1px solid #EBEBEB; padding: 15px; 0 15px 0; text-align: center;  margin-top:8px;">
                                            <img src="../images/videos/<?=$row['gorsel']?>" style="width: 250px; ">

                                        </div>
                                        <div class="input-group" style="margin-top: 8px">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="gorsel" >
                                                <label class="custom-file-label" for="inputGroupFile04 ">Seç</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label style="font-weight: 500" for="videoEmbed"><i class="fa fa-code"></i> Video Embed Kodu </label><br><br>
                                    <textarea name="embed" rows="3" id="videoEmbed" class="form-control" required ><?=$row['embed']?></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label style="font-weight: 500" for="mymce"><i class="fa fa-paint-brush"></i> Video İçeriği </label><br><br>
                                    <textarea name="spot" id="mymce"   rows="6" ><?=$row['spot']?></textarea>
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
                        <button type="submit" class="btn btn-success" name="videodegis">
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