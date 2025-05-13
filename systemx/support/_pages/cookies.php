<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Çerezler Anlaşması | <?=$ayar['site_baslik']?></title>
<?php
$aboutPage = $db ->prepare("select * from cerez_ayar where dil='$_SESSION[dil]' order by id desc limit 1 ");
$aboutPage ->execute();
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="mdi mdi-eyedropper"></i> Çerezler Anlaşması</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item active">Çerezler Anlaşması</li>
            </ol>
        </div>
    </div>
</div>

<div class="row">

    <?php if ($aboutPage->rowCount()<=0) {?>
    <div class="col-md-12" >

        <a role="button"  href="pages.php?sayfa=cookiesekle" class="btn btn-info m-b-15" style="color:#FFF" ><i class="fa fa-plus-circle"></i> <?=$lang['baslik']?> İçin Ekle</a>

    </div>
    <?php }?>



    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title m-b-25">Çerezler Anlaşması <span style="font-size:15px;">( <i class="flag-icon-<?php echo $lang['flag'] ?>" style="width:18px; height:13px; display: inline-block; margin-right: 10px; "></i><?=$lang['baslik']?> Dilinde ) </span> </h3>

                <h6 class="card-subtitle" style="background-color: #F8F8F8; border:1px solid #EBEBEB; padding: 18px 10px 18px 10px;  font-weight: 400; color:#333; font-family: 'Open Sans', Arial">
                    <i class="fa fa-info-circle"></i> Çerezler Anlaşması ziyaretçilerin iyi bir deneyim için kabul ettiği anlaşma metnidir.
                </h6>


                <?php if ($aboutPage->rowCount() > 0) {?>

                    <h6 class="card-subtitle" style="background-color: #753ef8; border:1px solid #753ef8; padding: 18px 10px 18px 10px; font-weight: 400; color:#FFF; margin-top:20px; margin-bottom: 20px">
                        Kullandığınız tüm dillere göre ayrı ayrı ekleme yapmak zorundasınız. Düzenleme dilini değiştirmek için <span style="font-weight: 500">sağ en üst </span>köşedeki ikona tıklayabilirsiniz.</h6>

                <div class="table-responsive">
                    <table class="table table-striped">

                        <tbody style="border:1px solid #CCC" >

                        <?php foreach ($aboutPage as $about) { ?>
                        <tr  >

                            <td >
                                <?php
                                if($about['durum'] == 1) {
                                    ?>
                                    <span class="btn btn-success btn-sm"><i class="fa fa-check"></i> Aktif</span>
                                <?php } ?>
                                <?php
                                if($about['durum'] == 0) {
                                    ?>
                                    <span class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Pasif</span>
                                <?php } ?>

                                <span style="font-weight: 600; padding-left: 20px;"><?=$lang['baslik']?></span> - Çerezler Anlaşması</td>




                            <td class="text-nowrap" style="text-align: center" width="200">

                                <a  href="pages.php?sayfa=cookie&id=<?=$about['id']?>" class="btn btn-sm btn-info" style="color:#FFF"><i class="fa fa-pencil text-inverse"></i> Düzenle </a>

                                <a  onclick="deletebutton('<?=$about['id']?>')" class="btn btn-sm btn-danger" style="color:#FFF"><i class="fa fa-times text-inverse"></i> Sil </a>

                            </td>

                        </tr>
                       <?php }?>

                        </tbody>
                    </table>


                </div>
                <?php } else {?>
                <div class="alert alert-info" style="font-weight: 400">
                    Henüz <span style="font-weight: 600"><?=$lang['baslik']?></span> dilinde Çerezler Anlaşması eklenmemiş! Kullandığınız dillere göre özel olarak eklemek için <span style="font-weight: 600">sağ en üst</span> köşedeki dil seçiminizin ardından yukarıdaki ekle butonuna tıklayınız
                </div>
                <?php }?>

            </div>
        </div>
    </div>




</div>




<script type="text/javascript">

    function deletebutton(aboutid){

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
                window.location.href = "support/post/delete/cookies-sil.php?cookies=success&id="+aboutid;
            } else {
                swal("İptal Edildi", "Seçtiğiniz içerik silinmemiştir", "error");
            }
        });

    }

</script>

<?php if( $_GET['status']=='success'){ ?>
    <body onload="sweetAlert('İşlem Başarılı', 'İşleminiz başarıyla gerçekleşmiştir', 'success');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=cookies">
<?php }?>
<?php if($_GET['status']=='warning'){ ?>
    <body onload="sweetAlert('Başarısız!', 'İşlem sırasında hata oluştu', 'warning');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=cookies">
<?php }?>

