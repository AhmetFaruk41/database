<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Proje İçin Teklif Bekleyenler | <?=$ayar['site_baslik']?></title>
<?php
$Sayfa = @intval($_GET['page']); if(!$Sayfa) $Sayfa = 1;
$Say = $db->query("select * from teklif_form order by id desc");
$ToplamVeri = $Say->rowCount();
$Limit = 100;
$Sayfa_Sayisi = ceil($ToplamVeri/$Limit); if($Sayfa > $Sayfa_Sayisi){$Sayfa = 1;}
$Goster = $Sayfa * $Limit - $Limit;
$GorunenSayfa = 5;
$ara = $_GET['search'];
$listele_tablo = $db->query("select * from teklif_form where (ad_soyad like '%$ara%' or eposta like '%$ara%' or telefon like '%$ara%' or teklif_konu like '%$ara%') order by id desc limit $Goster,$Limit");
$tabloAl = $listele_tablo->fetchAll(PDO::FETCH_ASSOC);

$bekleyenleriGoster = $db->prepare("select * from teklif_form where durum=:durum ");
$bekleyenleriGoster->execute(array(
    'durum' => '1'
));
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="mdi mdi-fan"></i> Proje İçin Teklif Bekleyenler</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item active">Proje İçin Teklif Bekleyenler</li>
            </ol>
        </div>
    </div>
</div>
<?php //TODO ?>
<form action="support/post/multi-delete/offer-sil.php" method="post">
    <div class="row">




        <div class="col-md-12" style="text-align: left" >
            <button type="submit"  class="btn btn-danger m-b-15" style="color:#FFF"><i class="fa fa-trash"></i> Seçilenleri Sil</button>

        </div>

        <div class="col-12">
            <div class="card" >
                <div class="card-body bg-secondary" >

                    <h3 class="card-title m-b-25">Proje İçin Teklif Bekleyenler (<?=$bekleyenleriGoster->rowCount()?>)</h3>
                    <h6 class="card-subtitle">Bu alanda size gelen proje isteklerini bulabilirsiniz.</h6>

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
                                    <th  style="border-top: 0 !important; border-bottom: 0 !important; width: 180px ">KONU</th>
                                    <th  style="border-top: 0 !important; border-bottom: 0 !important;">İSİM SOYİSİM</th>
                                    <th  style="border-top: 0 !important; border-bottom: 0 !important;">E-POSTA</th>
                                    <th  style="border-top: 0 !important; border-bottom: 0 !important;  " >TELEFON</th>
                                    <th  style="border-top: 0 !important; border-bottom: 0 !important; " >GÖNDERİLME TARİHİ</th>
                                    <th  style="border-top: 0 !important; border-bottom: 0 !important; text-align: center; " >DURUMU</th>
                                    <th  style="border-top: 0 !important; border-bottom: 0 !important;  text-align: center;" >İNCELE</th>
                                    <th class="text-nowrap" width="180" style="text-align: center; border-top: 0 !important; border-bottom: 0 !important; border-right: 0 !important;">#</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($tabloAl as $row) {?>
                                    <tr>
                                        <td style="border-left:0 !important;">
                                            <div class="form-checkbox">
                                                <input type="checkbox" name='sil[]' id="checkSec-<?=$row['id']?>" value="<?=$row['id']?>" class="individual">
                                                <label for="checkSec-<?=$row['id']?>"></label>
                                            </div>
                                        </td>


                                        <td style="font-weight: 600; ">
                                            <?=$row['teklif_konu']?>
                                        </td>

                                        <td style="font-weight: 400">
                                            <?=$row['ad_soyad']?>
                                        </td>

                                        <td style="font-weight: 400">
                                            <?=$row['eposta']?>
                                        </td>

                                        <td style="font-weight: 400;">
                                            <?=$row['telefon']?>
                                        </td>

                                        <td style="font-weight: 400">
                                            <?php echo date_tr('j F Y, H:i ', ''.$row['tarih'].''); ?>
                                        </td>


                                        <td style="font-weight: 400; text-align: center;">
                                            <?php if($row['durum'] == '1' ) {?>
                                                <div class="btn btn-sm btn-danger">
                                                    <i class="fa fa-spinner fa-spin fa-fw"></i>
                                                    <span class="sr-only">Loading...</span> Teklif Bekliyor</div>
                                            <?php }?>
                                            <?php if($row['durum'] == '0' ) {?>
                                                <div class="btn btn-sm btn-success">
                                                    <i class="fa fa-check"></i> Teklif Gönderildi</div>
                                            <?php }?>
                                        </td>


                                        <td style="font-weight: 400; text-align: center;">
                                            <a href="pages.php?sayfa=teklifincele&teklif_id=<?=$row['id']?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Projeyi İncele</a>
                                        </td>
                                        <td class="text-nowrap" style="text-align: center; border-right: 0 !important;">
                                            <a  onclick="deletebutton('<?=$row['id']?>')" class="btn btn-sm btn-danger" style="color:#FFF"><i class="fa fa-times text-inverse"></i> Sil </a>
                                        </td>

                                    </tr>


                                <?php } //TODO BU sayfa var?>



                                </tbody>
                            </table>




                        </div>






                        <!---- Sayfalama Elementleri ================== !-->
                        <?php if($Sayfa >= 1){?>
                            <nav aria-label="Page navigation example" style="margin-top:20px;">
                            <ul class="pagination">
                        <?php } ?>

                        <?php if($Sayfa > 1){?>

                            <li class="page-item"><a class="page-link" href="pages.php?sayfa=teklifler&page="><?=$diller['sayfalama-ilk']?></a></li>
                            <li class="page-item"><a class="page-link" href="pages.php?sayfa=teklifler&page=<?=$Sayfa - 1?>"><?=$diller['sayfalama-onceki']?></a></li>

                        <?php } ?>
                        <?php
                        for($i = $Sayfa - $GorunenSayfa; $i < $Sayfa + $GorunenSayfa +1; $i++){ if($i > 0 and $i <= $Sayfa_Sayisi){
                            if($i == $Sayfa){

                                echo '    
    
                            <li class="page-item active" aria-current="page">
                              <a class="page-link" href="pages.php?sayfa=teklifler&page='.$i.'">'.$i.'<span class="sr-only">(current)</span></a>
                            </li>
                            
                            ';

                            }else{
                                echo '
                    <li class="page-item"><a class="page-link" href="pages.php?sayfa=teklifler&page='.$i.'">'.$i.'</a></li>
                    ';
                            }
                        }
                        }
                        ?>

                        <?php if($listele_tablo->rowCount() <=0) { } else { ?>
                            <?php if($Sayfa != $Sayfa_Sayisi){?>

                                <li class="page-item"><a class="page-link" href="pages.php?sayfa=teklifler&page=<?=$Sayfa + 1?>"><?=$diller['sayfalama-sonraki']?></a></li>
                                <li class="page-item"><a class="page-link" href="pages.php?sayfa=teklifler&page=<?=$Sayfa_Sayisi?>"><?=$diller['sayfalama-son']?></a></li>


                            <?php }} ?>

                        <?php if($Sayfa >= 1){?>
                            </ul>
                            </nav>
                        <?php } ?>
                        <!---- Sayfalama Elementleri ================== !-->




                    <?php } else {?>
                        <div class="alert alert-info" style="font-weight: 400">
                            Henüz proje teklifi gelmemiş
                            <?php if(isset($_GET['search'])) {?>
                                <a href="pages.php?sayfa=teklifler">Geri Dön</a>
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
if ($listele_tablo->rowCount()>0) {
    ?>
    <div class="col-md-12 p-l-0 p-r-0" style="border-top: 1px solid #EBEBEB">
        <div class="card p-l-5 p-b-15 p-t-20 bg-secondary">

            <form method="get" action="pages.php?" >
                <div class="form-row align-items-center">

                    <div class="col-auto">
                        <input type="hidden" class="form-control mb-2" id="inlineFormInput" name="sayfa" value="teklifler">
                    </div>

                    <div class="col-auto">
                        <input type="text" class="form-control mb-2" id="inlineFormInput" required name="search" placeholder="İsim,Tel,Eposta,Konu">
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

    function deletebutton(offerid){

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
                window.location.href = "support/post/delete/offer-sil.php?teklif=success&id="+offerid;
            } else {
                swal("İptal Edildi", "Seçtiğiniz içerik silinmemiştir", "error");
            }
        });

    }

</script>



<?php if( $_GET['status']=='success'){ ?>
    <body onload="sweetAlert('İşlem Başarılı', 'İşleminiz başarıyla gerçekleşmiştir', 'success');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=teklifler">
<?php }?>
<?php if($_GET['status']=='warning'){ ?>
    <body onload="sweetAlert('Başarısız!', 'İşlem sırasında hata oluştu', 'warning');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=teklifler">
<?php }?>
<?php if($_GET['status']=='nocheck'){ ?>
    <body onload="sweetAlert('Sorun Var!', 'Hiç seçim yapılmamış!', 'warning');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=teklifler">
<?php }?>
