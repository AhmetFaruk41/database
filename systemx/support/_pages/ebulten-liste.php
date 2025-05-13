<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Kayıtlı E-Posta Listesi| <?=$ayar['site_baslik']?></title>
<?php
$ebultenCek = $db ->prepare("select * from ebulten order by id desc ");
$ebultenCek ->execute();
?>
<?php
$Sayfa = @intval($_GET['page']); if(!$Sayfa) $Sayfa = 1;
$Say = $db->query("select * from ebulten order by id DESC");
$ToplamVeri = $Say->rowCount();
$Limit = 20;
$Sayfa_Sayisi = ceil($ToplamVeri/$Limit); if($Sayfa > $Sayfa_Sayisi){$Sayfa = 1;}
$Goster = $Sayfa * $Limit - $Limit;
$GorunenSayfa = 5;
$ara = $_GET['search'];
$ebultenListele = $db->query("select * from ebulten where eposta like '$ara%' order by id DESC limit $Goster,$Limit");
$ebultenAl = $ebultenListele->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="mdi mdi-email"></i> Kayıtlı E-Posta Listesi</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item active">Kayıtlı E-Posta Listesi</li>
            </ol>
        </div>
    </div>
</div>

<form action="support/post/multi-delete/bultenleri-sil.php" method="post">
<div class="row">

    <div class="col-md-12" >

        <a role="button"    href="pages.php?sayfa=ebultengonder" class="btn btn-success m-b-15" style="color:#FFF" ><i class="fa fa-plus-circle"></i> Toplu E-Posta Gönder</a>

        <a role="button"    href="pages.php?sayfa=tekilmailgonder" class="btn btn-primary m-b-15" style="color:#FFF" ><i class="fa fa-plus-circle"></i> Tekil E-Posta Gönder</a>

        <a role="button"  class="btn btn-dark m-b-15" href="pages.php?sayfa=ebultenayar" style="color:#FFF"><i class="fa fa-cog"></i> Modül Ayarları</a>

        <a role="button"  class="btn btn-purple m-b-15" href="pages.php?sayfa=smtpayar" style="color:#FFF"><i class="fa fa-cog"></i> SMTP Ayarları</a>


        <button type="submit"  class="btn btn-danger m-b-15" style="color:#FFF"><i class="fa fa-trash"></i> Seçilenleri Sil</button>

    </div>

    <div class="col-12">
        <div class="card" >
            <div class="card-body bg-secondary" >

                <h3 class="card-title m-b-25">Kayıtlı E-Posta Adresleri <span style="font-size:16px;">[<?=$Say->rowCount()?> Kayıtlı E-Posta]</span></h3>
                <h6 class="card-subtitle">Bu alanda kayıtlı olan tüm e-posta adreslerini bulabilirsiniz.</h6>

            </div>

        </div>
    </div>


    <div class="col-12" >
        <div class="card" style="margin-bottom: 0 !important;">
            <div class="card-body" style="padding: 15px !important;">


                <?php if ($ebultenListele->rowCount() > 0) {?>
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
                            <th style="text-align: center; border-top: 0 !important; border-bottom: 0 !important;" width="140">E-POSTA ID</th>
                            <th style="border-top: 0 !important; border-bottom: 0 !important;">E-POSTA ADRESİ</th>
                            <th class="text-nowrap" width="180" style="text-align: center; border-top: 0 !important; border-bottom: 0 !important; border-right: 0 !important;">#</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($ebultenAl as $bulten) {    ?>
                        <tr>
                            <td style="border-left:0 !important;">
                                <div class="form-checkbox">
                                <input type="checkbox" name='sil[]' id="checkSec-<?=$bulten['id']?>" value="<?=$bulten['id']?>" class="individual">
                                <label for="checkSec-<?=$bulten['id']?>"></label>
                                </div>
                            </td>

                            <td style="text-align: center"><span class="btn btn-sm btn-secondary"><?=$bulten['id']?></span></td>

                            <td style="font-weight: 400">
                                <?=$bulten['eposta']?>
                            </td>


                            <td class="text-nowrap" style="text-align: center; border-right: 0 !important;">
                                <a  onclick="deletebutton('<?=$bulten['id']?>')" class="btn btn-sm btn-danger" style="color:#FFF"><i class="fa fa-times text-inverse"></i> Sil </a>
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

                                    <li class="page-item"><a class="page-link" href="pages.php?sayfa=ebultenlistesi&page="><?=$diller['sayfalama-ilk']?></a></li>
                                    <li class="page-item"><a class="page-link" href="pages.php?sayfa=ebultenlistesi&page=<?=$Sayfa - 1?>"><?=$diller['sayfalama-onceki']?></a></li>

                                <?php } ?>
                                <?php
                                for($i = $Sayfa - $GorunenSayfa; $i < $Sayfa + $GorunenSayfa +1; $i++){ if($i > 0 and $i <= $Sayfa_Sayisi){
                                    if($i == $Sayfa){
                                        echo '    
    
                            <li class="page-item active" aria-current="page">
                              <a class="page-link" href="pages.php?sayfa=ebultenlistesi&page='.$i.'">'.$i.'<span class="sr-only">(current)</span></a>
                            </li>
                            
                            ';
                                    }else{
                                        echo '
                    <li class="page-item"><a class="page-link" href="pages.php?sayfa=ebultenlistesi&page='.$i.'">'.$i.'</a></li>
                    ';
                                    }
                                }
                                }
                                ?>

                                <?php if($ebultenListele->rowCount() <=0) { } else { ?>
                                    <?php if($Sayfa != $Sayfa_Sayisi){?>

                                        <li class="page-item"><a class="page-link" href="pages.php?sayfa=ebultenlistesi&page=<?=$Sayfa + 1?>"><?=$diller['sayfalama-sonraki']?></a></li>
                                        <li class="page-item"><a class="page-link" href="pages.php?sayfa=ebultenlistesi&page=<?=$Sayfa_Sayisi?>"><?=$diller['sayfalama-son']?></a></li>


                                    <?php }} ?>

                                <?php if($Sayfa >= 1){?>
                            </ul>
                        </nav>
                    <?php } ?>
                        <!---- Sayfalama Elementleri ================== !-->




                <?php } else {?>
                <div class="alert alert-info" style="font-weight: 400">
                    E-Posta adresi bulunamadı
                    <?php if(isset($_GET['search'])) {?>
                        <a href="pages.php?sayfa=ebultenlistesi">Geri Dön</a>
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
if ($ebultenListele->rowCount()>0) {
    ?>
    <div class="col-md-12 p-l-0 p-r-0" style="border-top: 1px solid #EBEBEB">
        <div class="card p-l-5 p-b-15 p-t-20 bg-secondary">

            <form method="get" action="pages.php" >
                <div class="form-row align-items-center">

                    <div class="col-auto">
                        <input type="hidden" class="form-control mb-2" id="inlineFormInput" name="sayfa" value="ebultenlistesi">
                    </div>

                    <div class="col-auto">
                        <input type="text" class="form-control mb-2" id="inlineFormInput" required name="search" placeholder="E-Posta adresi girin">
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

    function deletebutton(bultenid){

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
                window.location.href = "support/post/delete/ebulten-sil.php?bultensil=success&id="+bultenid;
            } else {
                swal("İptal Edildi", "Seçtiğiniz içerik silinmemiştir", "error");
            }
        });

    }

</script>
<?php if( $_GET['status']=='gonderildi'){ ?>
    <body onload="sweetAlert('İşlem Başarılı', 'E-Postanız tüm adreslere gönderilmiştir.', 'success');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=ebultenlistesi">
<?php }?>
<?php if( $_GET['status']=='success'){ ?>
    <body onload="sweetAlert('İşlem Başarılı', 'İşleminiz başarıyla gerçekleşmiştir', 'success');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=ebultenlistesi">
<?php }?>
<?php if($_GET['status']=='warning'){ ?>
    <body onload="sweetAlert('Başarısız!', 'İşlem sırasında hata oluştu', 'warning');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=ebultenlistesi">
<?php }?>
<?php if($_GET['status']=='nocheck'){ ?>
    <body onload="sweetAlert('Sorun Var!', 'Hiç seçim yapılmamış!', 'warning');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=ebultenlistesi">
<?php }?>
