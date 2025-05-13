<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Dil Yönetimi | <?=$ayar['site_baslik']?></title>
<?php
$dilCek=$db->prepare("SELECT * from dil order by sira asc");
$dilCek->execute(array(0));
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="mdi mdi-file-document-box"></i> Dil Yönetimi</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item active">Dil Yönetimi</li>
            </ol>
        </div>
    </div>
</div>

<div class="row">


    <div class="col-md-12" >

        <a role="button"  href="pages.php?sayfa=dilekle" class="btn btn-info m-b-15" style="color:#FFF" ><i class="fa fa-plus-circle"></i> Yeni Dil Ekle</a>

        <a role="button"  href="pages.php?sayfa=sessiondestroy" class="btn btn-purple m-b-15" style="color:#FFF" ><i class="fa fa-minus-square"></i> Sessionları Temizle</a>

    </div>


    <div class="col-12">
        <div class="card">
            <div class="card-body bg-secondary" style="font-size:13px">

           NOT : Varsayılan dili değiştirdiğinizde tarayıcınızda anında değişim olmayacaktır. Bunun sebebi dil modülünün sessionlar ile yönetilmesidir. Eğer anında değişim olmasını istiyorsanız lütfen yukarıdaki "sessionları temizle" seçeneğine tıklayın.


            </div>

        </div>
    </div>


    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title m-b-25">Mevcut Diller </h3>



                <h6 class="card-subtitle">Dilediğiniz kadar dil ekleyebilirsiniz. Türkçe haricindeki tüm dillerin çevirisini manuel olarak düzenleme alanından yapmalısınız.</h6>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>DİL</th>
                            <th>KISA AD</th>
                            <th style="text-align: center">SIRA</th>
                            <th></th>
                            <th class="text-nowrap" width="1%" style="text-align: right">#</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($dilCek as $dil) { ?>
                        <tr>

                            <td ><i class="flag-icon-<?php echo $dil['flag'] ?>" style="width:18px; height:13px; display: inline-block; margin-right: 10px; vertical-align: middle "></i> <span style="font-weight: 600"><?=$dil['baslik']?></span></td>
                            <td><?=$dil['kisa_ad']?></td>
                            <td style="text-align: center">
                                <span class="btn btn-sm btn-dark"><?=$dil['sira']?></span>
                            </td>
                            <td style="text-align: center">
                                <?php if ($dil['varsayilan'] == 1) {?>
                                <span class="btn btn-sm btn-danger">Varsayılan Dil</span>
                                <?php } ?>
                            </td>
                            <td class="text-nowrap" style="text-align: right">

                                <a  href="pages.php?sayfa=dil&dil_id=<?=$dil['id']?>" class="btn btn-sm btn-info" style="color:#FFF"><i class="fa fa-pencil text-inverse"></i> Düzenle </a>

                                <a  onclick="deletebutton('<?=$dil['id']?>','<?=$dil['kisa_ad']?>')" class="btn btn-sm btn-danger" style="color:#FFF"><i class="fa fa-times text-inverse"></i> Sil </a>

                            </td>

                        </tr>
                       <?php }?>

                        </tbody>
                    </table>


                </div>
                <?php if ($dilCek->rowCount() <= 0) {?>
                <div class="alert alert-info" style="font-weight: 400">
                    Henüz dil eklenmemiş! Lütfen yeni bir dil ekleyiniz.
                </div>
                <?php }?>
            </div>
        </div>
    </div>




</div>




<script type="text/javascript">

    function deletebutton(dilid,dilad){

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
                window.location.href = "support/post/delete/dil-sil.php?dil=success&id="+dilid+"&kisaad="+dilad+".php";
            } else {
                swal("İptal Edildi", "Seçtiğiniz içerik silinmemiştir", "error");
            }
        });

    }

</script>

<?php if( $_GET['status']=='success'){ ?>
    <body onload="sweetAlert('İşlem Başarılı', 'İşleminiz başarıyla gerçekleşmiştir', 'success');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=diller">
<?php }?>
<?php if($_GET['status']=='warning'){ ?>
    <body onload="sweetAlert('Başarısız!', 'İşlem sırasında hata oluştu', 'warning');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=diller">
<?php }?>

