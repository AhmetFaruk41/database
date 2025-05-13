<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?><?php
$bultensettings = $db->prepare("select * from ebulten_ayar where id='1'");
$bultensettings->execute();
$bultenset = $bultensettings->fetch(PDO::FETCH_ASSOC);
?>

<style>
    .bulten-home-main-div{width:<?php if($bultenset['width']==1){?> 90%; <?php }else {?> 100% <?php }?> ; height: auto; overflow: hidden; <?php if($bultenset['tip']==0) { ?>background-color: #<?php echo $bultenset['back_color'] ?>;<?php }?> <?php if($bultenset['tip']==1) { ?>  background: url(images/uploads/<?php echo $bultenset['back_bg'] ?>)    ; background-size: cover;  box-shadow: inset 5000px 0 0 0 rgba(0, 0, 0, 0.7); border-color: rgba(0, 0, 0, 1);  <?php }?>padding: <?php echo $bultenset['padding'] ?>px 0 <?php echo $bultenset['padding'] ?>px 0; }
</style>


<div class="bulten-home-main-div">

        <div class="bulten-home-main-div-inside" style="text-align: <?php echo $bultenset['area'] ?>">


            <div class="bulten-home-box" style="<?php if($bultenset['area'] == "right") { ?> text-align: left; <?php }?>">
                <div class="bulten-home-box-baslik font-size-big font-bold font-raleway" style="color:#<?php echo $bultenset['baslik_color'] ?>; ">
                    <?php echo $diller['ebulten']; ?>
                </div>
                <div class="bulten-home-box-spot font-18 font-raleway" style="color:#<?php echo $bultenset['spot_color'] ?>">
                    <?php echo $diller['ebulten-aciklamasi']; ?>
                </div>
                <div class="bulten-home-box-form">
<form method="post" action="includes/post/ebultenkayit.php">
                    <input class="bulten-input" type="email" name="eposta" placeholder="<?php echo $diller['ebulten-placeholder']; ?>" required style="background: #<?php echo $bultenset['input_bg_color'] ?>; color:#<?php echo $bultenset['input_text_color'] ?>;">

                    <input type="submit" name="ebultengonder" class="bulten-submit" value="<?php echo $diller['ebulten-submit']; ?>" required style="background: #<?php echo $bultenset['button_bg_color'] ?>; color:#<?php echo $bultenset['button_text_color'] ?>;">
</form>
                </div>
            </div>


        </div>

</div>


<?php if( $_GET['status']=='bulten'){ ?>
    <body onload="sweetAlert('İşlem Başarılı', 'E-Posta adresiniz kayıt edilmiştir', 'success');">
    </body>
    <meta http-equiv="refresh" content="2; URL=index.html">
<?php }?>
<?php if($_GET['status']=='warning'){ ?>
    <body onload="sweetAlert('Başarısız!', 'İşlem sırasında hata oluştu', 'warning');">
    </body>
    <meta http-equiv="refresh" content="2; URL=index.html">
<?php }?>
<?php if(isset($_SESSION['ebulten_array']) && $_SESSION['ebulten_array']['status'] == 'error'){ ?>
    <body onload="sweetAlert('<?= $diller['post-hata']?>', '<?= $diller['form-eksik-alan']?>', 'warning');"></body>
    <meta http-equiv="refresh" content="3; URL=index.html">
    <?php unset($_SESSION['ebulten_array']); ?>
<?php }?>
