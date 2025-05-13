<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?><?php
$photogallerysettings = $db->prepare("select * from galeri_ayar where id='1'");
$photogallerysettings->execute();
$photoset = $photogallerysettings->fetch(PDO::FETCH_ASSOC);
$photolimit = $photoset["galeri_limit"];
?>
<?php
$num = 1;
$fotogaleri_liste = $db->prepare("select * from galeri_kat where durum='1' and dil='$_SESSION[dil]' and anasayfa='1' order by sira asc limit $photolimit");
$fotogaleri_liste->execute();

?>
<style>
    .photo-gallery-home-main-div{width:<?php if($photoset['width']==1){?> 90%; <?php }else {?> 100% <?php }?> ; height: auto; overflow: hidden; background-color: #<?php echo $photoset['back_color'] ?>; padding: <?php echo $photoset['padding'] ?>px 0 <?php echo $photoset['padding'] ?>px 0; }
    .photo-galleri-home-box{border-radius: <?php echo $photoset['border_radius']?>px; }
</style>


<div class="photo-gallery-home-main-div">

    <?php if ($fotogaleri_liste->rowCount() > 0) { ?>

    <?php foreach ($fotogaleri_liste as $foto) { ?>
    <div class="photo-galleri-home-box">

        <img src="images/gallery/<?php echo $foto['gorsel'] ?>" alt="<?php echo $foto['baslik'] ?>" class="photo-galleri-home-box-img">
        <div class="photo-overlay">
            <div class="photo-overlay-table"><div class="photo-overlay-table-in">


                    <a href="galeri/<?php echo $foto['id']?>/<?php echo seo($foto['baslik']) ?>">
                        <div class="photo-overlay-text">
                            <i class="fa fa-search-plus" aria-hidden="true"></i> <br>
                            <?php echo $foto['baslik'] ?>
                        </div>
                    </a>

                </div></div>
        </div>

    </div>
    <?php }?>

    <?php } else { ?>

        <div class="photo-galleri-home-box">

            <img src="https://via.placeholder.com/373x272?text=No+Image" alt="NoImage" class="photo-galleri-home-box-img">
            <div class="photo-overlay">
                <div class="photo-overlay-table"><div class="photo-overlay-table-in">


                            <div class="photo-overlay-text" style="color:#FFF">
                                <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <br>
                                GALERİ EKLENMEMİŞ VEYA ANASAYFA SEÇİLMEMİŞ!
                            </div>

                    </div></div>
            </div>

        </div>

    <?php } ?>


</div>
