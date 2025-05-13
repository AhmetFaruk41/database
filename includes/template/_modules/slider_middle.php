<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?><?php
$sliderayar = $db->prepare("select * from slider_ayar where id='1'");
$sliderayar ->execute();
$slidayar = $sliderayar->fetch(PDO::FETCH_ASSOC);
?>
<?php
$slider_tur2 = $db->prepare("select * from slider where dil='$_SESSION[dil]' and durum='1' and tur='2' order by sira asc");
$slider_tur2->execute();
?>
<style>

    .swiper-container-slider-2 {
        width: <?php if($slidayar['width_2']==1){?> 90%; <?php }else {?> 100% <?php }?>; margin: 0px auto;
        height: auto;
    }
    @media screen and (max-width:1440px) and (min-width:1101px) {

    }
    @media screen and (max-width:1600px) and (min-width:1441px) {
    }


    @media screen and (max-width:1680px) and (min-width:1601px) {
    }

        .swiper-slide {
        text-align: center;
        font-size: 18px;
               /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        align-items: center;
        background-size: 100% auto !important;


    }
    .slider-button-type{font-size:14px; font-family: '<?php echo $slidayar['font'] ?>', sans-serif; font-weight:800; letter-spacing: 0.05em ; margin-top:40px; padding: 12px 40px 12px 40px}
</style>

<div class="swiper-container-slider-2">
    <div class="swiper-wrapper">



        <?php if($slider_tur2->rowCount() >0) { ?>

<?php foreach ($slider_tur2 as $rowtur2) { ?>
        <div class="swiper-slide" style=" background:#<?php echo $rowtur2['slider_2_bg']?>; height: auto!important;">


            <div class="slider-middle-mainbox ">


                    <div class="slider-middle-mainbox-left">


                        <div class="slider-section2 slider-middle-mainbox-left-baslik " data-aos="<?php echo $rowtur2['baslik_animation'] ?>" data-aos-offset="200" data-aos-delay="50"   data-aos-duration="1800" style="color:#<?php echo $rowtur2['text_bg'] ?>">
                            <?php echo $rowtur2['baslik']?>
                        </div>


                        <div class="slider-section2 slider-middle-mainbox-left-spot"  data-aos="<?php echo $rowtur2['spot_animation'] ?>" data-aos-offset="200" data-aos-delay="50"   data-aos-duration="2300" style="color:#<?php echo $rowtur2['text_bg'] ?>">
                            <?php echo $rowtur2['spot']?>
                        </div>

<?php if($rowtur2['url'] == null) {

} else { ?>
                        <div class="slider-section2 slider-middle-mainbox-left-button"  data-aos="<?php echo $rowtur2['button_animation'] ?>" data-aos-offset="200" data-aos-delay="50"   data-aos-duration="2300">
                            <a href="<?php echo $rowtur2['url'] ?>">
                                <div class="btn btn-<?php echo $rowtur2['button_bg'] ?> slider-button-type" style="width: auto; color:#<?php echo $rowtur2['button_text_color'] ?>">
                                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                                    <?php echo $rowtur2['button_text']?>
                                </div>
                            </a>
                        </div>
<?php }?>

                    </div>

                    <div class="slider-middle-mainbox-right" >

                    <img  class="slider-section2" src="images/slider/<?php echo $rowtur2['gorsel']?>" data-aos="<?php echo $rowtur2['baslik_animation'] ?>" data-aos-offset="200" data-aos-delay="50"   data-aos-duration="1800">

                    </div>



            </div>



        </div>
<?php }?>

        <?php } else {?>

        <div class="swiper-slide" style=" background:#333">


            <div class="slider-middle-mainbox font-20 font-open-sans font-bold " style="color:#FFF">

                <i class="fa fa-exclamation-circle" style="font-size:30px"></i> <br> <br>

                ORTA SLIDER ALANINA HİÇ BİR İÇERİK EKLENMEMİŞ
                <br>
                <span class="font-13 font-small font-open-sans">Dilerseniz panelinizden yeni bir içerik ekleyebilir ya da bu modülü pasif bırakabilirsiniz</span>
            </div>

        </div>


        <?php }?>



    </div>



    <div class="swiper-pagination"></div>
</div>