<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<title>Sayfa Bannerları | <?=$ayar['site_baslik']?></title>
<?php
$pageHeaders = $db ->prepare("select * from page_header order by id");
$pageHeaders ->execute();
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><i class="ti-pin-alt"></i> Sayfa Bannerları</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Yönetim Paneli</a></li>
                <li class="breadcrumb-item active">Sayfa Bannerları</li>
            </ol>
        </div>
    </div>
</div>

<div class="row">



    <div class="col-12">
        <div class="card">
            <div class="card-body bg-secondary" >

                <h3 class="card-title m-b-25">Sayfa Bannerları </h3>
                <h6 class="card-subtitle">Her sayfanıza özel olarak ayarlayabileceğiniz sayfa banner alanları</h6>

            </div>

        </div>
    </div>


    <div class="col-12" >
        <div class="card"style="">
            <div class="card-body" style="padding: 15px !important;">




                <div class="table-responsive"  >
                    <table class="table table-bordered " style="font-family: 'Open Sans', Arial; margin-bottom: 0 !important;" >
                        <thead>
                        <tr>

                            <th style="border-top: 0 !important; border-bottom: 0 !important; border-left:0 !important;">SAYFA</th>
                            <th style="border-top: 0 !important; border-bottom: 0 !important;">ARKAPLAN TÜRÜ</th>
                            <th class="text-nowrap" width="180" style="text-align: center; border-top: 0 !important; border-bottom: 0 !important; border-right: 0 !important;">#</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($pageHeaders as $page) { ?>
                        <tr>

                            <td style="font-weight: 400;  border-left:0 !important;">
                                <?=$page['baslik']?>
                            </td>

                           <td style="">
                                <?php
                                if($page['tip'] == 1) {
                                    ?>
                                    <span class="btn btn-success btn-sm"><i class="mdi mdi-image"></i> Arkaplan Görseli</span>
                                <?php } ?>
                                <?php
                                if($page['tip'] == 0) {
                                    ?>
                                    <span class="btn btn-danger btn-sm"><i class="mdi mdi-brush"></i> Düz Renk</span>
                                <?php } ?>
                            </td>

                            <td class="text-nowrap" style="text-align: center; border-right: 0 !important;">
                                <a  href="pages.php?sayfa=pagehead&page_id=<?=$page['id']?>" class="btn btn-sm btn-info" style="color:#FFF"><i class="fa fa-pencil text-inverse"></i> Düzenle </a>
                            </td>

                        </tr>

                       <?php }?>

                        </tbody>
                    </table>


                </div>

            </div>
        </div>
    </div>




</div>





<?php if( $_GET['status']=='success'){ ?>
    <body onload="sweetAlert('İşlem Başarılı', 'İşleminiz başarıyla gerçekleşmiştir', 'success');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=pageheaders">
<?php }?>
<?php if($_GET['status']=='warning'){ ?>
    <body onload="sweetAlert('Başarısız!', 'İşlem sırasında hata oluştu', 'warning');">
    </body>
    <meta http-equiv="refresh" content="1; URL=pages.php?sayfa=pageheaders">
<?php }?>

