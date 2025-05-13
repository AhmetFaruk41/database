<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Kayıtlı GSM Numaraları | <?=$ayar['site_baslik']?></title>
<?php
$gsmCek = $db ->prepare("select * from sms_numaralar order by id desc ");
$gsmCek ->execute();
?>
<?php
$Sayfa = @intval($_GET['page']); if(!$Sayfa) $Sayfa = 1;
$Say = $db->query("select * from sms_numaralar order by id DESC");
$ToplamVeri = $Say->rowCount();
$Limit = 40;
$Sayfa_Sayisi = ceil($ToplamVeri/$Limit); if($Sayfa > $Sayfa_Sayisi){$Sayfa = 1;}
$Goster = $Sayfa * $Limit - $Limit;
$GorunenSayfa = 5;
$ara = $_GET['search'];
$gsmListele = $db->query("select * from sms_numaralar where isim like '$ara%' or gsm like '%$ara%' order by id DESC limit $Goster,$Limit");
$gsmAl = $gsmListele->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="mdi mdi-phone"></i> Kayıtlı GSM Numaraları</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item active">Kayıtlı GSM Numaraları</li>
            </ol>
        </div>
    </div>
</div>

<form action="support/post/multi-delete/sms-gsmleri-sil.php" method="post">
<div class="row">




    <div class="col-md-12" style="text-align: left" >


        <a role="button"    alt="default" data-toggle="modal" data-target="#yeniekle" class="btn btn-info m-b-15" style="color:#FFF" ><i class="fa fa-plus-circle"></i> GSM No Ekle</a>

        <a role="button"    href="pages.php?sayfa=toplusmsgonder" class="btn btn-success m-b-15" style="color:#FFF" ><i class="fa fa-plus-circle"></i> Toplu SMS Gönder</a>

        <a role="button"    href="pages.php?sayfa=tekilsmsgonder" class="btn btn-primary m-b-15" style="color:#FFF" ><i class="fa fa-plus-circle"></i> Tekil SMS Gönder</a>

        <a role="button"  class="btn btn-purple m-b-15" href="pages.php?sayfa=smsayar" style="color:#FFF"><i class="fa fa-cog"></i> SMS Ayarları</a>


        <button type="submit"  class="btn btn-danger m-b-15" style="color:#FFF"><i class="fa fa-trash"></i> Seçilenleri Sil</button>

    </div>

    <div class="col-12">
        <div class="card" >
            <div class="card-body bg-secondary" >

                <h3 class="card-title m-b-25">Kayıtlı GSM Numaraları <span style="font-size:16px;">[<?=$Say->rowCount()?> Kayıtlı Numara]</span></h3>
                <h6 class="card-subtitle">Bu alanda kayıtlı olan tüm gsm numaralarını bulabilirsiniz.</h6>

            </div>

        </div>
    </div>


    <div class="col-12" >
        <div class="card"  style="margin-bottom: 0 !important;">
            <div class="card-body" style="padding: 15px !important;">


                <?php if ($gsmListele->rowCount() > 0) {?>
                <div class="table-responsive"  >
                    <table class="table table-bordered table-striped" style="font-family: 'Open Sans', Arial; margin-bottom: 0 !important;" >
                        <thead>
                        <tr>
                            <th width="1%" style="border-top: 0 !important; border-bottom: 0 !important; border-left:0 !important;">

                                <div class="form-checkbox" style="overflow: hidden; height: 24px;">
                                    <input type="checkbox" class="selectall" id="hepsiniSecCheckBox" />
                                    <label for="hepsiniSecCheckBox"></label>
                                </div>

                            </th>
                            <th style="text-align: center; border-top: 0 !important; border-bottom: 0 !important;" width="140">ID</th>
                            <th style="border-top: 0 !important; border-bottom: 0 !important;" width="220">GSM NUMARASI</th>
                            <th style="border-top: 0 !important; border-bottom: 0 !important;">İSİM SOYİSİM</th>
                            <th class="text-nowrap" width="180" style="text-align: center; border-top: 0 !important; border-bottom: 0 !important; border-right: 0 !important;">#</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($gsmAl as $sms) {    ?>
                        <tr>
                            <td style="border-left:0 !important;">
                                <div class="form-checkbox">
                                <input type="checkbox" name='sil[]' id="checkSec-<?=$sms['id']?>" value="<?=$sms['id']?>" class="individual">
                                <label for="checkSec-<?=$sms['id']?>"></label>
                                </div>
                            </td>

                            <td style="text-align: center"><span class="btn btn-sm btn-secondary"><?=$sms['id']?></span></td>

                            <td style="font-weight: 400">
                                <?=$sms['gsm']?>
                            </td>

                            <td style="font-weight: 400">
                                <?=$sms['isim']?>
                            </td>

                            <td class="text-nowrap" style="text-align: center; border-right: 0 !important;">
                                <a  onclick="deletebutton('<?=$sms['id']?>')" class="btn btn-sm btn-danger" style="color:#FFF"><i class="fa fa-times text-inverse"></i> Sil </a>
                            </td>

                        </tr>
                       <?php }?>



                        </tbody>
                    </table>




                </div>






                    <!---- Sayfalama Elementleri ================== !-->
                    <?php if($Sayfa >= 1){?>
                        <nav aria-label="Page navigation example" style="margin-top:20px;">
                        <ul class="pagination">
                    <?php } ?>

                    <?php if($Sayfa > 1){?>

                        <li class="page-item"><a class="page-link" href="pages.php?sayfa=smsnumaralar&page="><?=$diller['sayfalama-ilk']?></a></li>
                        <li class="page-item"><a class="page-link" href="pages.php?sayfa=smsnumaralar&page=<?=$Sayfa - 1?>"><?=$diller['sayfalama-onceki']?></a></li>

                    <?php } ?>
                    <?php
                    for($i = $Sayfa - $GorunenSayfa; $i < $Sayfa + $GorunenSayfa +1; $i++){ if($i > 0 and $i <= $Sayfa_Sayisi){
                        if($i == $Sayfa){

                            echo '    
    
                            <li class="page-item active" aria-current="page">
                              <a class="page-link" href="pages.php?sayfa=smsnumaralar&page='.$i.'">'.$i.'<span class="sr-only">(current)</span></a>
                            </li>
                            
                            ';

                        }else{
                            echo '
                    <li class="page-item"><a class="page-link" href="pages.php?sayfa=smsnumaralar&page='.$i.'">'.$i.'</a></li>
                    ';
                        }
                    }
                    }
                    ?>

                    <?php if($gsmListele->rowCount() <=0) { } else { ?>
                        <?php if($Sayfa != $Sayfa_Sayisi){?>

                            <li class="page-item"><a class="page-link" href="pages.php?sayfa=smsnumaralar&page=<?=$Sayfa + 1?>"><?=$diller['sayfalama-sonraki']?></a></li>
                            <li class="page-item"><a class="page-link" href="pages.php?sayfa=smsnumaralar&page=<?=$Sayfa_Sayisi?>"><?=$diller['sayfalama-son']?></a></li>


                        <?php }} ?>

                    <?php if($Sayfa >= 1){?>
                        </ul>
                        </nav>
                    <?php } ?>
                    <!---- Sayfalama Elementleri ================== !-->




                <?php } else {?>
                <div class="alert alert-info" style="font-weight: 400">
                   GSM Numarası Bulunamadı!
                    <?php if(isset($_GET['search'])) {?>
                        <a href="pages.php?sayfa=smsnumaralar">Geri Dön</a>
                    <?php }?>
                </div>
                <?php }?>

            </div>
        </div>


    </div>




</div>
</form>

<!-- ARAMA !-->
<?php
if ($gsmListele->rowCount()>0) {
?>
<div class="col-md-12 p-l-0 p-r-0" style="border-top: 1px solid #EBEBEB">
<div class="card p-l-5 p-b-15 p-t-20 bg-secondary">

    <form method="get" action="pages.php?sayfa=smsnumaralar&" >
        <div class="form-row align-items-center">

            <div class="col-auto">
                <input type="hidden" class="form-control mb-2" id="inlineFormInput" name="sayfa" value="smsnumaralar">
            </div>

            <div class="col-auto">
                <input type="text" class="form-control mb-2" id="inlineFormInput" required name="search" placeholder="Numara veya isim arayın">
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search"></i> Ara</button>
            </div>
        </div>
    </form>

</div>
</div>
<?php } ?>
<!-- ARAMA !-->


<script type="text/javascript">

    function deletebutton(gsmid){

        swal({
            title: "Silmek İstediğinize Emin Misiniz?",
            text: "Seçtiğiniz içerik kalıcı olarak silinecektir",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sil",
            cancelButtonText: "İptal",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm){
            if (isConfirm) {
                window.location.href = "support/post/delete/sms-gsm-sil.php?gsm=success&id="+gsmid;
            } else {
                swal("İptal Edildi", "Seçtiğiniz içerik silinmemiştir", "error");
            }
        });

    }

</script>


<!-- YENİ EKLE MODAL-->
<div id="yeniekle" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <form method="post" action="support/post/insert/sms-gsm-ekle.php">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Yeni GSM Numarası Ekle</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>



                <div class="modal-body">

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label style="font-weight: 500" for="isimInpt">İsim Soyisim</label><br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" required class="form-control" name="isim" id="isimInpt" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label style="font-weight: 500" for="GsMNo">GSM Numarası</label><br>
                            <small style="font-size:13px;" class="text-info">
                               Örn : 5xxxxxxxxx
                            </small>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                                </div>
                                <input type="number" required class="form-control" name="gsm" id="GsMNo" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>



                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">İptal</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light" name="gsmkaydet"><i class="fa fa-save"></i> Kaydet</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /.YENİ EKLE MODAL -->



<?php if( $_GET['status']=='success'){ ?>
    <body onload="sweetAlert('İşlem Başarılı', 'İşleminiz başarıyla gerçekleşmiştir', 'success');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=smsnumaralar">
<?php }?>
<?php if($_GET['status']=='warning'){ ?>
    <body onload="sweetAlert('Başarısız!', 'İşlem sırasında hata oluştu', 'warning');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=smsnumaralar">
<?php }?>
<?php if($_GET['status']=='nocheck'){ ?>
    <body onload="sweetAlert('Sorun Var!', 'Hiç seçim yapılmamış!', 'warning');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=smsnumaralar">
<?php }?>
