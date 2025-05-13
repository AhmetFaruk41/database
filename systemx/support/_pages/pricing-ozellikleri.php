<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Tablo Özellikleri  | <?=$ayar['site_baslik']?></title>
<?php
$Sayfa = @intval($_GET['page']); if(!$Sayfa) $Sayfa = 1;
$Say = $db->query("select * from pricing_ozellik where pr_id='$_GET[pricing_id]' and dil='$_SESSION[dil]' order by sira ASC");
$ToplamVeri = $Say->rowCount();
$Limit = 500;
$Sayfa_Sayisi = ceil($ToplamVeri/$Limit); if($Sayfa > $Sayfa_Sayisi){$Sayfa = 1;}
$Goster = $Sayfa * $Limit - $Limit;
$GorunenSayfa = 5;
$ara = $_GET['search'];
$listele_tablo = $db->query("select * from pricing_ozellik where pr_id='$_GET[pricing_id]' and dil='$_SESSION[dil]' order by sira ASC limit $Goster,$Limit");
$tabloAl = $listele_tablo->fetchAll(PDO::FETCH_ASSOC);

$degerCek = $db->prepare("select * from pricing where id='$_GET[pricing_id]'");
$degerCek->execute();
$pr = $degerCek->fetch(PDO::FETCH_ASSOC);
?>
<?php
if($degerCek->rowCount() == 0 ) {
    header("Location:pages.php?sayfa=pricingler");
}
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="mdi mdi-table-edit"></i> Tablo Özellikleri </h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item active">Tablo Özellikleri</li>
            </ol>
        </div>
    </div>
</div>

<form action="support/post/multi-delete/pricingozellikleri-sil.php" method="post">
    <input type="hidden" name="pricing_id" value="<?=$pr['id']?>">
<div class="row">




    <div class="col-md-12" style="text-align: left" >

        <a role="button"   href="pages.php?sayfa=pricingler" class="btn btn-dark m-b-15" style="color:#FFF" ><i class="fa fa-arrow-left"></i> Geri Dön</a>

        <a role="button" href="pages.php?sayfa=pricingozellikekle&pricing_id=<?=$pr['id']?>" class="btn btn-info m-b-15" style="color:#FFF" ><i class="fa fa-plus-circle"></i> Yeni Özellik Ekle</a>

        <button type="submit"  class="btn btn-danger m-b-15" style="color:#FFF"><i class="fa fa-trash"></i> Seçilenleri Sil</button>

    </div>
    <div class="col-12">
        <div class="card" >
            <div class="card-body text-white" style="background: linear-gradient(to right, #4568dc, #b06ab3);" >

                <h3 class="card-title" style="margin-bottom: 0 !important;">Tablo :  <?=$pr['baslik']?> </h3>

            </div>

        </div>
    </div>
    <div class="col-12">
        <div class="card" >
            <div class="card-body bg-secondary" >

                <h3 class="card-title m-b-25">Tablo Özellikleri  <span style="font-size:15px;">( <i class="flag-icon-<?php echo $lang['flag'] ?>" style="width:18px; height:13px; display: inline-block; margin-right: 10px; "></i><?=$lang['baslik']?> Dilinde ) </span></h3>
                <h6 class="card-subtitle">Bu alanda oluşturduğunuz seçili paket tablonuzun özelliklerini görebilirsiniz.</h6>

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
                            <th  style="border-top: 0 !important; border-bottom: 0 !important;">ÖZELLİK YAZISI</th>


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


                            <td style="font-weight: 400">
                                <?=$row['baslik']?>

                            </td>



                            <td class="text-nowrap" style="text-align: center; border-right: 0 !important;">
                                <a  href="pages.php?sayfa=pricingozellik&ozellik_id=<?=$row['id']?>" class="btn btn-sm btn-info" style="color:#FFF"><i class="fa fa-pencil text-inverse"></i> Düzenle </a>
                                <a  onclick="deletebutton('<?=$row['id']?>','<?=$row['pr_id']?>')" class="btn btn-sm btn-danger" style="color:#FFF"><i class="fa fa-times text-inverse"></i> Sil </a>
                            </td>

                        </tr>


                       <?php }?>



                        </tbody>
                    </table>




                </div>










                <?php } else {?>
                <div class="alert alert-info" style="font-weight: 400">
                  Henüz bu tabloya özellik eklenmemiş!
                </div>
                <?php }?>

            </div>
        </div>


    </div>




</div>
</form>



<script type="text/javascript">

    function deletebutton(ozellikid,tabloid){

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
                window.location.href = "support/post/delete/pricingozellik-sil.php?pricing=success&id="+ozellikid+"&pricing_id="+tabloid;
            } else {
                swal("İptal Edildi", "Seçtiğiniz içerik silinmemiştir", "error");
            }
        });

    }

</script>



<?php if( $_GET['status']=='success'){ ?>
    <body onload="sweetAlert('İşlem Başarılı', 'İşleminiz başarıyla gerçekleşmiştir', 'success');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=pricingozellikleri&pricing_id=<?=$_GET['pricing_id']?>">
<?php }?>
<?php if($_GET['status']=='warning'){ ?>
    <body onload="sweetAlert('Başarısız!', 'İşlem sırasında hata oluştu', 'warning');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=pricingozellikleri&pricing_id=<?=$_GET['pricing_id']?>">
<?php }?>
<?php if($_GET['status']=='nocheck'){ ?>
    <body onload="sweetAlert('Sorun Var!', 'Hiç seçim yapılmamış!', 'warning');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=pricingozellikleri&pricing_id=<?=$_GET['pricing_id']?>">
<?php }?>
