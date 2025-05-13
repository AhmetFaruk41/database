<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Yeni Dil Ekle | <?=$ayar['site_baslik']?></title>
<style>
    #dilKisaAdKucuk {
        text-transform:lowercase;
    }
</style>
<?php
$dilCek=$db->prepare("SELECT * from dil order by sira asc");
$dilCek->execute(array(0));

$varsayilanDil=$db->prepare("SELECT * from dil where varsayilan='1' order by id desc limit 1");
$varsayilanDil->execute(array(0));
$varsayilan = $varsayilanDil->fetch(PDO::FETCH_ASSOC);
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="ti-world"></i> Yeni Dil Ekle</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item"><a href="pages.php?sayfa=diller">Diller</a></li>
                <li class="breadcrumb-item active">Yeni Dil Ekle</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">






            <div class="card-body" style="font-family: 'Open Sans', Arial">

                <form action="support/post/insert/dil-ekle.php" class="form-horizontal " method="post">


                    <h3 class="card-title">Yeni Dil Ekle</h3>
                    <hr>
                    <div class="form-body">



                        <div lass="row p-t-20" style="border-bottom:1px solid #EBEBEB; margin-bottom: 20px;">

                            <?php if ($varsayilanDil->rowCount() == 1) { ?>
                                <div class="">
                                    <input type="hidden" name="varsayilan" value="0">


                                    <div class="alert alert-sm alert-info" style="font-weight: 500">

                                        Şu anda varsayılan diliniz <i class="flag-icon-<?php echo $varsayilan['flag'] ?>" style="width:18px; height:13px; display: inline-block; margin-right: 5px; margin-left: 10px;  "></i> <span style="font-weight: 600"><?=$varsayilan['baslik']?></span> olduğu için bu dili varsayılan yapamazsınız. Bu dili veya başka bir dili varsayılan yapmak için öncelikle mevcut varsayılan dilinizin düzenleme sayfasından varsayılan durumunu pasifleştiriniz.</div>
                                </div>
                            <?php } else {?>

                                <div class="col-md-6" >
                                    <div class="form-group">
                                        <label class="control-label" style="margin-bottom: 13px; font-weight: 600" for="varsayilanSecc">Varsayılan Dil</label>
                                        <br>
                                        <input type='hidden' value='0' name='varsayilan'>
                                        <input type="checkbox" checked class="js-switch" data-color="#f62d51" name="varsayilan" value="1" id="varsayilanSecc" />

                                    </div>
                                </div>

                            <?php } ?>

                        </div>


                        <div class="row p-t-20 m-b-20" style="border-bottom:1px solid #EBEBEB">



                            <div class="form-group col-md-3">
                                <label style="font-weight: 500" for="dilAdi">Dil Adı</label><br><br>

                                <input type="text" class="form-control" name="baslik" required id="dilAdi">

                            </div>

                            <div class="form-group col-md-3">
                                <label style="font-weight: 500" for="dilKisaAdKucuk">Kısa Ad</label><br><br>

                                <input type="text" class="form-control" name="kisa_ad" placeholder="Örn: tr" maxlength="2" id="dilKisaAdKucuk" onkeyup="return forceLower(this);" required>

                            </div>

                            <div class="form-group col-md-3">
                                <label style="font-weight: 500" for="countries">Bayrak</label><br><br>

                                <select class="form-control" id="countries" style="width: 100% !important; " required name="flag">
                                    <option value="">-- Bayrak Seçin</option>
                                    <?php include 'support/panel_parts/flagselector.php';?>
                                </select>


                            </div>

                            <div class="form-group col-md-1">
                                <label style="font-weight: 500" for="dilSira">Sıra</label><br><br>

                                <input type="number" class="form-control" name="sira" required id="dilSira" value="<?=$dilCek->rowCount()+1?>">

                            </div>


                        </div>







                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success" name="dilekle">
                            <i class="fa fa-save"></i>
                            Kaydet
                        </button>
                    </div>

                </form>

            </div>





        </div>
    </div>
</div>


<script>
    function forceLower(strInput)
    {
        strInput.value=strInput.value.toLowerCase();
    }
</script>