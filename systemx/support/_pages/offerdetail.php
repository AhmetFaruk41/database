<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>İstek Proje Detayı| <?=$ayar['site_baslik']?></title>
<?php

$teklifid = trim(strip_tags($_GET['teklif_id']));

$offerDetail = $db ->prepare("select * from teklif_form where id='$teklifid' order by id desc");
$offerDetail ->execute();
$offer = $offerDetail->fetch(PDO::FETCH_ASSOC);

?>
<?php
if($offerDetail->rowCount() == 0 ) {
    header("Location:pages.php?sayfa=teklifler");
}
?>
<?php if($_GET['durum'] == 'ok'  ) {?>
    <?php
    $offerStatus = $db->prepare("UPDATE teklif_form SET durum = 0 WHERE id='$teklifid'  ");
    $offerStatus->execute();
    ?>
    <body onload="sweetAlert('İşlem Başarılı', 'İşleminiz başarıyla gerçekleşmiştir', 'success');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=teklifincele&teklif_id=<?=$teklifid?>">
<?php }?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="mdi mdi-fan"></i> İstek Proje Detayı</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item"><a href="pages.php?sayfa=teklifler">Teklif Bekleyenler</a></li>
                <li class="breadcrumb-item active">İstek Proje Detayı</li>
            </ol>
        </div>
    </div>
</div>

<div class="row">





    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <form class="form-bordered">

                <h3 class="card-title">İstek Proje Detayı</h3>
                <hr>

                <div style="border-bottom:1px solid #EBEBEB; margin-bottom:20px">
                    <a href="pages.php?sayfa=teklifler" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Geri Dön</a>
                    <a href="pages.php?sayfa=tekilmailgonder&mail=<?=$offer['eposta']?>" class="btn btn-danger"><i class="fa fa-reply-all"></i> E-Posta ile Teklif Yap</a>
                    <?php if($offer['durum'] == '1' ) {?>
                        <a href="pages.php?sayfa=teklifincele&teklif_id=<?=$teklifid?>&durum=ok" class="btn btn-success"><i class="fa fa-arrow-right"></i> Teklif Yapıldı Olarak Ayarla</a>
                    <?php }?>

                    <br><br>
                </div>

                <div class="row" style="font-family: 'Open Sans', Arial; font-size:15px;">


                    <div class="col-md-12">
                        <div class="form-group" style="font-weight: 400">
                            <label style="font-weight: 500" for="basLik">Teklif Durumu</label><br>

                            <?php if($offer['durum'] == '1' ) {?>
                                <div class="btn btn-sm btn-danger">
                                    <i class="fa fa-spinner fa-spin fa-fw"></i>
                                    <span class="sr-only">Loading...</span> Teklif Bekliyor</div>
                            <?php }?>
                            <?php if($offer['durum'] == '0' ) {?>
                                <div class="btn btn-sm btn-success">
                                    <i class="fa fa-check"></i> Teklif Gönderildi</div>
                            <?php }?>

                        </div>
                    </div>

                    
                    <div class="col-md-6">
                        <div class="form-group" style="font-weight: 400">
                            <label style="font-weight: 500" for="basLik">İsim Soyisim</label><br>

                            <?=$offer['ad_soyad']?>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group" style="font-weight: 400">
                            <label style="font-weight: 500" for="basLik">Gönderilme Tarihi</label><br>

                            <?php echo date_tr('j F Y, H:i, l ', ''.$offer['tarih'].''); ?>

                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group" style="font-weight: 400">
                            <label style="font-weight: 500" for="basLik">Telefon Numarası</label><br>

                            <?=$offer['telefon']?>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group" style="font-weight: 400">
                            <label style="font-weight: 500" for="basLik">E-Posta Adresi</label><br>

                            <?=$offer['eposta']?>

                        </div>
                    </div>

                    <?php
                    //TODO VAR
                    ?>


                    <div class="col-md-12">
                        <div class="form-group" style="font-weight: 400">
                            <label style="font-weight: 500" for="basLik">Proje Konusu</label><br>

                            <?=$offer['teklif_konu']?>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group" style="font-weight: 400">
                            <label style="font-weight: 500" for="basLik">Gönderenin Firma Bilgileri</label><br>

                            <?=$offer['firma_bilgileri']?>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group" style="font-weight: 400">
                            <label style="font-weight: 500" for="basLik">Proje Detayları</label><br>

                            <?=$offer['icerik']?>

                        </div>
                    </div>

                    <?php if($offer['dosya'] == !null ) {?>
                        <div class="col-md-12">
                            <div class="form-group" style="font-weight: 400">
                                <label style="font-weight: 500" for="basLik">Ek Dosya</label><br>

                                <a href="<?=$ayar['site_url']?>images/uploads/<?=$offer['dosya']?>" target="_blank"><i class="fa fa-download"></i> DOSYAYA ULAŞIN</a>

                            </div>
                        </div>
                    <?php }?>


                </div>



                </form>

            </div>
        </div>
    </div>




</div>




<script type="text/javascript">

    function deletebutton(mesajid){

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
                window.location.href = "support/post/delete/mesaj-sil.php?mesaj=success&id="+mesajid;
            } else {
                swal("İptal Edildi", "Seçtiğiniz içerik silinmemiştir", "error");
            }
        });

    }

</script>

<?php if( $_GET['status']=='success'){ ?>
    <body onload="sweetAlert('İşlem Başarılı', 'İşleminiz başarıyla gerçekleşmiştir', 'success');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=mesajlar">
<?php }?>
<?php if($_GET['status']=='warning'){ ?>
    <body onload="sweetAlert('Başarısız!', 'İşlem sırasında hata oluştu', 'warning');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=mesajlar">
<?php }?>

