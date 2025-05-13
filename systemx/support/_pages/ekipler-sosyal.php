<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Ekip Üyesi Sosyal Medya Hesapları  | <?=$ayar['site_baslik']?></title>
<?php
$Sayfa = @intval($_GET['page']); if(!$Sayfa) $Sayfa = 1;
$Say = $db->query("select * from ekip_sosyal where ekip_id='$_GET[ekip_id]' order by sira ASC");
$ToplamVeri = $Say->rowCount();
$Limit = 500;
$Sayfa_Sayisi = ceil($ToplamVeri/$Limit); if($Sayfa > $Sayfa_Sayisi){$Sayfa = 1;}
$Goster = $Sayfa * $Limit - $Limit;
$GorunenSayfa = 5;
$ara = $_GET['search'];
$listele_tablo = $db->query("select * from ekip_sosyal where ekip_id='$_GET[ekip_id]' order by sira ASC limit $Goster,$Limit");
$tabloAl = $listele_tablo->fetchAll(PDO::FETCH_ASSOC);

$degerCek = $db->prepare("select * from ekip where id='$_GET[ekip_id]'");
$degerCek->execute();
$pr = $degerCek->fetch(PDO::FETCH_ASSOC);
?>
<?php
if($degerCek->rowCount() == 0 ) {
    header("Location:pages.php?sayfa=ekipler");
}
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="mdi mdi-account-switch"></i> <i class="fa fa-share-alt"></i> Ekip Üyesi Sosyal Medya Hesapları </h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item"><a href="pages.php?sayfa=ekipler">Ekipler</a></li>
                <li class="breadcrumb-item"><a href="pages.php?sayfa=ekip&ekip_id=<?=$pr['id']?>"><?=$pr['isim']?></a></li>
                <li class="breadcrumb-item active">Sosyal Medya Hesapları</li>
            </ol>
        </div>
    </div>
</div>

<form action="support/post/multi-delete/ekip-sosyalleri-sil.php" method="post">
    <input type="hidden" name="ekip_id" value="<?=$pr['id']?>">
<div class="row">




    <div class="col-md-12" style="text-align: left" >

        <a role="button"   href="pages.php?sayfa=ekipler" class="btn btn-dark m-b-15" style="color:#FFF" ><i class="fa fa-arrow-left"></i> Geri Dön</a>

        <a role="button"  alt="default" data-toggle="modal" data-target="#yeniekle"  class="btn btn-info m-b-15" style="color:#FFF" ><i class="fa fa-plus-circle"></i> Yeni Bağlantı Ekle</a>

        <button type="submit"  class="btn btn-danger m-b-15" style="color:#FFF"><i class="fa fa-trash"></i> Seçilenleri Sil</button>

    </div>
    <div class="col-12">
        <div class="card" >
            <div class="card-body text-white" style="background: linear-gradient(to right, #4568dc, #b06ab3);" >

                <h3 class="card-title" style="margin-bottom: 0 !important;"><i class="fa fa-user"></i> Ekip Üyesi :  <?=$pr['isim']?> </h3>

            </div>

        </div>
    </div>
    <div class="col-12">
        <div class="card" >
            <div class="card-body bg-secondary" >

                <h3 class="card-title m-b-25">Ekip Üyesi Sosyal Medya Hesapları  </h3>
                <h6 class="card-subtitle">Bu alanda ekip üyenizin sosyal medya hesaplarını görebilirsiniz.</h6>

            </div>

        </div>
    </div>


    <div class="col-12" >
        <div class="card"  style="margin-bottom: 0 !important;">
            <div class="card-body" style="padding: 15px !important;">


                <?php if ($listele_tablo->rowCount() > 0) {?>
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
                            <th  style="border-top: 0 !important; border-bottom: 0 !important; text-align: center;" width="100">SIRA</th>
                            <th  style="border-top: 0 !important; border-bottom: 0 !important; text-align: center">İKON</th>
                            <th  style="border-top: 0 !important; border-bottom: 0 !important;">MEDYA HESABI FİRMASI</th>

                            <th class="text-nowrap" width="180" style="text-align: center; border-top: 0 !important; border-bottom: 0 !important; border-right: 0 !important;">#</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($tabloAl as $row) {    ?>
                        <tr>
                            <td style="border-left:0 !important;">
                                <div class="form-checkbox">
                                <input type="checkbox" name='sil[]' id="checkSec-<?=$row['id']?>" value="<?=$row['id']?>" class="individual">
                                <label for="checkSec-<?=$row['id']?>"></label>
                                </div>
                            </td>


                            <td style="font-weight: 400; text-align: center;">
                               <span class="btn btn-sm btn-dark text-white"><?=$row['sira']?></span>
                            </td>
                            <td style="font-weight: 400; text-align: center" width="100">
                                <i class="fa <?=$row['icon']?>"></i>
                            </td>

                            <td style="font-weight: 400">
                                <?=$row['baslik']?>
                            </td>



                            <td class="text-nowrap" style="text-align: center; border-right: 0 !important;">
                                <a  href="pages.php?sayfa=ekipsosyalduzenle&sosyal_id=<?=$row['id']?>" class="btn btn-sm btn-info" style="color:#FFF"><i class="fa fa-pencil text-inverse"></i> Düzenle </a>
                                <a  onclick="deletebutton('<?=$row['id']?>','<?=$row['ekip_id']?>')" class="btn btn-sm btn-danger" style="color:#FFF"><i class="fa fa-times text-inverse"></i> Sil </a>
                            </td>

                        </tr>


                       <?php }?>



                        </tbody>
                    </table>




                </div>










                <?php } else {?>
                <div class="alert alert-info" style="font-weight: 400">
                  Henüz bu üyeye sosyal hesap eklenmemiş!
                </div>
                <?php }?>

            </div>
        </div>


    </div>




</div>
</form>

<!-- YENİ EKLE MODAL-->
<div id="yeniekle" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <form method="post" action="support/post/insert/ekip-sosyal-ekle.php">
        <input type="hidden" name="ekip_id" value="<?=$pr['id']?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Yeni Sosyal Hesap Ekle</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="baslikKutu" class="control-label">Sosyal Medya Firması :</label>
                            <input type="text" class="form-control" id="baslikKutu" name="baslik" required  >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="hesapLink" class="control-label">Hesap Adresi Linki :</label>
                            <input type="text" class="form-control" id="hesapLink" name="url" required placeholder="http://"  >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="icons" class="control-label">ICON :</label>
                            <select class="form-control awesome-select" name="icon" id="icons">
                                <?php include 'support/panel_parts/icon.php'?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="siraKutu" class="control-label">SIRA :</label>
                            <input type="number" class="form-control" id="siraKutu" name="sira"  value="<?=$Say->rowCount()+1;?>"  min=1 oninput="validity.valid||(value='');" required >
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">İptal</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light" name="ekipsosyalekle"><i class="fa fa-save"></i> Kaydet</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /.YENİ EKLE MODAL -->

<script type="text/javascript">

    function deletebutton(sosyalid,ekipid){

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
                window.location.href = "support/post/delete/ekip-sosyal-sil.php?ekipsosyal=success&id="+sosyalid+"&ekip_id="+ekipid;
            } else {
                swal("İptal Edildi", "Seçtiğiniz içerik silinmemiştir", "error");
            }
        });

    }

</script>



<?php if( $_GET['status']=='success'){ ?>
    <body onload="sweetAlert('İşlem Başarılı', 'İşleminiz başarıyla gerçekleşmiştir', 'success');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=ekipsosyal&ekip_id=<?=$_GET['ekip_id']?>">
<?php }?>
<?php if($_GET['status']=='warning'){ ?>
    <body onload="sweetAlert('Başarısız!', 'İşlem sırasında hata oluştu', 'warning');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=ekipsosyal&ekip_id=<?=$_GET['ekip_id']?>">
<?php }?>
<?php if($_GET['status']=='nocheck'){ ?>
    <body onload="sweetAlert('Sorun Var!', 'Hiç seçim yapılmamış!', 'warning');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=ekipsosyal&ekip_id=<?=$_GET['ekip_id']?>">
<?php }?>
