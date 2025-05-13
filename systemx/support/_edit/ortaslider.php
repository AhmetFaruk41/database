<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$slider = $db->prepare("select * from slider where id='$_GET[slider_id]'");
$slider->execute();
$row = $slider->fetch(PDO::FETCH_ASSOC);
?>
<?php
if($slider->rowCount() == 0 ) {
    header("Location:pages.php?sayfa=ortasliderlar");
}
?>
<title>Orta Slider Düzenle | <?=$ayar['site_baslik']?></title>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="icon-equalizer"></i> Orta Slider Düzenle</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item"><a href="pages.php?sayfa=ortasliderlar">Orta Slider</a></li>
                <li class="breadcrumb-item active">Orta Slider Düzenle</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">




            <div class="card-body" style="font-family: 'Open Sans', Arial">

                <div class="card-body p-b-0">
                    <h4 class="card-title">Orta Slider Düzenle <span style="font-size:15px;">( <i class="flag-icon-<?php echo $lang['flag'] ?>" style="width:18px; height:13px; display: inline-block; margin-right: 10px; "></i><?=$lang['baslik']?> Dilinde ) </span></h4>

                <hr>

                <!-- Nav tabs -->

                <!-- Tab panes -->
                <form action="support/post/update/ortaslider-duzenle.php" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="slider_id" value="<?=$row['id']?>">
                    <input type="hidden" name="eski_gorsel" value="<?=$row['gorsel']?>">

                <div class="tab-content">
                    <div class="tab-pane active" id="genel" role="tabpanel">
                        <div class="p-20">


                            <div class="row">
                                <div class="col-md-3 ">
                                    <div class="form-group">
                                        <label class="control-label" for="yayin" style="margin-bottom: 13px; font-weight: 600">Yayın Durumu</label>
                                        <br>
                                        <input type='hidden' value='0' name='durum'>
                                        <input type="checkbox" <?php if ($row['durum'] == 1) {?> checked <?php }?> id="yayin" class="js-switch" data-color="#f62d51" name="durum" value="1" />
                                    </div>
                                </div>
                                <div class="col-md-9 ">
                                    <div class="form-group">
                                        <label class="control-label" for="arkaPlan" style="margin-bottom: 13px; font-weight: 600">Slider Arkaplan Rengi</label>
                                        <br>
                                        <input type="text" class="form-control jscolor" name="slider_2_bg" value="<?=$row['slider_2_bg']?>" id="arkaPlan"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="basLik">Slider Başlığı</label>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" name="baslik" value="<?=$row['baslik']?>" class="form-control" id="basLik" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-1 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="sirasiSlider">Slider Sırası</label>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="number" class="form-control" id="sirasiSlider" name="sira" value="<?=$row['sira']?>" required min=1 oninput="validity.valid||(value='');">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="linkArea"><i class="fa fa-external-link-square"></i> Link ( http:// )</label>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" name="url" class="form-control" id="linkArea" placeholder="Boş bırakırsanız buton çıkmaz" value="<?=$row['url']?>" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="butonText">Detay Butonu Yazısı</label>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" name="button_text" class="form-control" id="butonText" placeholder="Örn : DETAYLI BİLGİ" value="<?=$row['button_text']?>">
                                        </div>
                                    </div>
                                </div>


                            </div>




                            <div class="row">

                                <div class="col-md-12 ">
                                    <div class="form-group col-md-12">
                                        <label style="font-weight: 500" for="spotArea"><i class="fa fa-sort"></i> Kısa Açıklama (Spot)</label><br><br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px"> Lütfen görünüm estetikliği açısından açıklamayı çok kısa bir şekilde yapınız. </small>
                                        <br><br>
                                        <textarea name="spot" id="spotArea" class="form-control" rows="2"><?=$row['spot']?></textarea>
                                    </div>
                                </div>

                            </div>



                            <div class="row">

                                <div class="col-md-12 ">
                                    <div class="form-group col-md-12">
                                        <label style="font-weight: 500" for="ustKat"><i class="fa fa-photo"></i> Slider Görseli</label>
                                        <div style="width: 100%; height: auto; background-color: #F9F9F9; border:1px solid #EBEBEB; padding: 15px; 0 15px 0; text-align: center;  margin-top:8px;">
                                            <img src="../images/slider/<?=$row['gorsel']?>" style="width: 200px; ">
                                            <br><br>
                                            <small class="form-control-feedback text-purple" style="font-size:13px">Başlık ve spotun sağ tarafında çıkar. Estetikik açısından PNG - Transparan formatında yüklemeniz tavsiye edilir. İdeal Ebat: 500x500</small>
                                        </div>
                                        <div class="input-group" style="margin-top: 8px">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="gorsel"  >
                                                <label class="custom-file-label" for="inputGroupFile04">Seç</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label class="control-label" for="baslikAni" style="margin-bottom: 21px; font-weight: 600">Başlık Animasyonu</label>
                                        <br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px"> Ekrana geliş animasyonudur </small>
                                        <br><br>
                                        <select name="baslik_animation" id="baslikAni" class="form-control">
                                            <option <?php if ($row['baslik_animation'] == 'fade-up') {?> selected <?php }?>  value="fade-up">Fade-Up</option>
                                            <option <?php if ($row['baslik_animation'] == 'fade-down') {?> selected <?php }?>  value="fade-down">Fade-Down</option>
                                            <option <?php if ($row['baslik_animation'] == 'fade-right') {?> selected <?php }?>  value="fade-right">Fade-Right</option>
                                            <option <?php if ($row['baslik_animation'] == 'fade-left') {?> selected <?php }?>  value="fade-left">Fade-Left</option>

                                            <option <?php if ($row['baslik_animation'] == 'flip-left') {?> selected <?php }?>  value="flip-left">Flip Left</option>
                                            <option <?php if ($row['baslik_animation'] == 'flip-right') {?> selected <?php }?> value="flip-right">Flip Right</option>
                                            <option <?php if ($row['baslik_animation'] == 'flip-up') {?> selected <?php }?>  value="flip-up">Flip Up</option>
                                            <option <?php if ($row['baslik_animation'] == 'flip-down') {?> selected <?php }?>  value="flip-down">Flip Down</option>

                                            <option <?php if ($row['baslik_animation'] == 'zoom-in') {?> selected <?php }?>  value="zoom-in">Zoom-In</option>
                                            <option <?php if ($row['baslik_animation'] == 'zoom-out') {?> selected <?php }?>  value="zoom-out">Zoom-Out</option>
                                            <option <?php if ($row['baslik_animation'] == 'zoom-in-down') {?> selected <?php }?>  value="zoom-in-down">Zoom-In-Down</option>
                                            <option <?php if ($row['baslik_animation'] == 'zoom-in-left') {?> selected <?php }?>  value="zoom-in-left">Zoom-In-Left</option>
                                            <option <?php if ($row['baslik_animation'] == 'zoom-in-right') {?> selected <?php }?>  value="zoom-in-right">Zoom-In-Right</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label class="control-label" for="spotAni" style="margin-bottom: 21px; font-weight: 600">Spot(Açıklama) Animasyonu</label>
                                        <br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px"> Ekrana geliş animasyonudur </small>
                                        <br><br>
                                        <select name="spot_animation" id="spotAni" class="form-control">
                                            <option <?php if ($row['spot_animation'] == 'fade-up') {?> selected <?php }?>  value="fade-up">Fade-Up</option>
                                            <option <?php if ($row['spot_animation'] == 'fade-down') {?> selected <?php }?>  value="fade-down">Fade-Down</option>
                                            <option <?php if ($row['spot_animation'] == 'fade-right') {?> selected <?php }?>  value="fade-right">Fade-Right</option>
                                            <option <?php if ($row['spot_animation'] == 'fade-left') {?> selected <?php }?>  value="fade-left">Fade-Left</option>

                                            <option <?php if ($row['spot_animation'] == 'flip-left') {?> selected <?php }?>  value="flip-left">Flip Left</option>
                                            <option <?php if ($row['spot_animation'] == 'flip-right') {?> selected <?php }?> value="flip-right">Flip Right</option>
                                            <option <?php if ($row['spot_animation'] == 'flip-up') {?> selected <?php }?>  value="flip-up">Flip Up</option>
                                            <option <?php if ($row['spot_animation'] == 'flip-down') {?> selected <?php }?>  value="flip-down">Flip Down</option>

                                            <option <?php if ($row['spot_animation'] == 'zoom-in') {?> selected <?php }?>  value="zoom-in">Zoom-In</option>
                                            <option <?php if ($row['spot_animation'] == 'zoom-out') {?> selected <?php }?>  value="zoom-out">Zoom-Out</option>
                                            <option <?php if ($row['spot_animation'] == 'zoom-in-down') {?> selected <?php }?>  value="zoom-in-down">Zoom-In-Down</option>
                                            <option <?php if ($row['spot_animation'] == 'zoom-in-left') {?> selected <?php }?>  value="zoom-in-left">Zoom-In-Left</option>
                                            <option <?php if ($row['spot_animation'] == 'zoom-in-right') {?> selected <?php }?>  value="zoom-in-right">Zoom-In-Right</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label class="control-label" for="buttonAni" style="margin-bottom: 21px; font-weight: 600">Buton Animasyonu</label>
                                        <br>
                                        <small class="form-control-feedback text-purple" style="font-size:13px"> Ekrana geliş animasyonudur </small>
                                        <br><br>
                                        <select name="button_animation" id="buttonAni" class="form-control">
                                            <option <?php if ($row['button_animation'] == 'fade-up') {?> selected <?php }?>  value="fade-up">Fade-Up</option>
                                            <option <?php if ($row['button_animation'] == 'fade-down') {?> selected <?php }?>  value="fade-down">Fade-Down</option>
                                            <option <?php if ($row['button_animation'] == 'fade-right') {?> selected <?php }?>  value="fade-right">Fade-Right</option>
                                            <option <?php if ($row['button_animation'] == 'fade-left') {?> selected <?php }?>  value="fade-left">Fade-Left</option>

                                            <option <?php if ($row['button_animation'] == 'flip-left') {?> selected <?php }?>  value="flip-left">Flip Left</option>
                                            <option <?php if ($row['button_animation'] == 'flip-right') {?> selected <?php }?> value="flip-right">Flip Right</option>
                                            <option <?php if ($row['button_animation'] == 'flip-up') {?> selected <?php }?>  value="flip-up">Flip Up</option>
                                            <option <?php if ($row['button_animation'] == 'flip-down') {?> selected <?php }?>  value="flip-down">Flip Down</option>

                                            <option <?php if ($row['button_animation'] == 'zoom-in') {?> selected <?php }?>  value="zoom-in">Zoom-In</option>
                                            <option <?php if ($row['button_animation'] == 'zoom-out') {?> selected <?php }?>  value="zoom-out">Zoom-Out</option>
                                            <option <?php if ($row['button_animation'] == 'zoom-in-down') {?> selected <?php }?>  value="zoom-in-down">Zoom-In-Down</option>
                                            <option <?php if ($row['button_animation'] == 'zoom-in-left') {?> selected <?php }?>  value="zoom-in-left">Zoom-In-Left</option>
                                            <option <?php if ($row['button_animation'] == 'zoom-in-right') {?> selected <?php }?>  value="zoom-in-right">Zoom-In-Right</option>
                                        </select>
                                    </div>
                                </div>

                            </div>


                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="baslikcolor">Başlık ve Spot Rengi</label>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" name="text_bg" class="form-control jscolor" id="baslikcolor" value="<?=$row['text_bg']?>" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="buttonBgColor">Buton Arkaplan Rengi</label>
                                        <br><br>
                                        <div class="input-group" >
                                            <select name="button_bg" id="buttonBgColor" class="form-control">
                                                <option <?php if ($row['button_bg'] == 'warning') {?> selected <?php }?> value="warning">Sarı</option>
                                                <option <?php if ($row['button_bg'] == 'info') {?> selected <?php }?> value="info">Mavi</option>
                                                <option <?php if ($row['button_bg'] == 'danger') {?> selected <?php }?> value="danger">Kırmızı</option>
                                                <option <?php if ($row['button_bg'] == 'success') {?> selected <?php }?> value="success">Yeşil</option>
                                                <option <?php if ($row['button_bg'] == 'primary') {?> selected <?php }?> value="primary">Koyu Mavi</option>
                                                <option <?php if ($row['button_bg'] == 'secondary') {?> selected <?php }?> value="secondary">Gri</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label style="font-weight: 500" for="buttonTxtColor">Buton Yazı Rengi</label>
                                        <br><br>
                                        <div class="input-group" >
                                            <input type="text" name="button_text_color" class="form-control jscolor" id="buttonTxtColor" value="<?=$row['button_text_color']?>"  >
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>


</div>
                </div>

                    <div class="form-actions p-l-20">
                        <button type="submit" class="btn btn-success" name="sliderdegis">
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