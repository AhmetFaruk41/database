<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?><?php
$trigger1 = $db->prepare("select * from tetikleyiciler where dil='$_SESSION[dil]' and durum='1' and area='0' order by id desc limit 1");
$trigger1->execute();
?>

    <?php foreach ($trigger1 as $tg) { ?>
        <style>
            .trigger-main-div{width: <?php if($tg['width']==1){?> 90%; <?php }else {?> 100% <?php }?>; background-color: #<?php echo $tg['bg_color'] ?>;}
            .trigger-main-div-left p{color:#<?php echo $tg['text_color'] ?>; letter-spacing: 0.20em;}
            .trigger-main-button{border: 2px solid #<?php echo $tg['text_color'] ?>; color:#<?php echo $tg['text_color'] ?>; }
        </style>
        <div class="trigger-main-div">
            <div class="trigger-main-div-in">
                <div class="trigger-main-div-left">

                    <p class="p-p font-raleway font-18 font-light"><?php echo $tg['text'] ?></p>

                </div><div class="trigger-main-div-right">
                    <?php if( $tg['url'] == !null) { ?>
                    <a href="<?php echo $tg['url'] ?>">
                        <?php }?>
                        <div class="trigger-main-button font-open-sans">
                            <?php echo $tg['button_text'] ?>
                        </div>
                    <?php if( $tg['url'] == !null) { ?>
                    </a>
                    <?php }?>
                </div>

            </div>
        </div>
    <?php }?>

