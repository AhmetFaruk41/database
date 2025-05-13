<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?>
<?php
$page_header_setting = $db->prepare("select * from page_header where page_id='products' order by id");
$page_header_setting->execute();
$pagehead = $page_header_setting->fetch(PDO::FETCH_ASSOC);
?>
<?php
$productsayar = $db->prepare("select * from urunmodul_ayar where id=:id");
$productsayar->execute(array(
    'id' => 1
));
$prodayar = $productsayar->fetch(PDO::FETCH_ASSOC);
?>
<?php
$Sayfa = @intval($_GET['s']); if(!$Sayfa) $Sayfa = 1;
$Say = $db->query("select * from urun where durum='1' and dil='$_SESSION[dil]' order by id DESC");
$ToplamVeri = $Say->rowCount();
$Limit = 12;
$Sayfa_Sayisi = ceil($ToplamVeri/$Limit); if($Sayfa > $Sayfa_Sayisi){$Sayfa = 1;}
$Goster = $Sayfa * $Limit - $Limit;
$GorunenSayfa = 5;


if(!empty($_GET)){

    $urun_listele = $db->query("select * from urun where durum='1' and dil='$_SESSION[dil]' order by id DESC limit $Goster,$Limit");
    $UrunAl = $urun_listele->fetchAll(PDO::FETCH_ASSOC);

}


if($_GET['sirala'] == 1){

$urun_listele = $db->query("select * from urun where durum='1' and dil='$_SESSION[dil]' order by id DESC limit $Goster,$Limit");
$UrunAl = $urun_listele->fetchAll(PDO::FETCH_ASSOC);

}

if($_GET['sirala'] == 2){

    $urun_listele = $db->query("select * from urun where durum='1' and dil='$_SESSION[dil]' order by hit DESC limit $Goster,$Limit");
    $UrunAl = $urun_listele->fetchAll(PDO::FETCH_ASSOC);

}

if($_GET['sirala'] == 3){

    $urun_listele = $db->query("select * from urun where durum='1' and dil='$_SESSION[dil]' order by fiyat ASC limit $Goster,$Limit");
    $UrunAl = $urun_listele->fetchAll(PDO::FETCH_ASSOC);

}

if($_GET['sirala'] == 4){

    $urun_listele = $db->query("select * from urun where durum='1' and dil='$_SESSION[dil]' order by fiyat DESC limit $Goster,$Limit");
    $UrunAl = $urun_listele->fetchAll(PDO::FETCH_ASSOC);

}

?>
<title><?php echo ucwords_tr($diller['urunlerimiz']) ?> | <?php echo $ayar['site_baslik']?></title>
<meta name="description" content="<?php echo"$prodayar[meta_desc]" ?>">
<meta name="keywords" content="<?php echo"$prodayar[tags]" ?>">
<meta name="news_keywords" content="<?php echo"$prodayar[tags]" ?>">
<meta name="author" content="<?php echo"$ayar[site_baslik]" ?>" />
<meta itemprop="author" content="<?php echo"$ayar[site_baslik]" ?>" />
<meta name="robots" content="index follow">
<meta name="googlebot" content="index follow">
<meta property="og:type" content="website" />

<?php include "includes/config/header_libs.php";?>

</head>
<body>
<?php include 'includes/template/pre-loader.php'?>
<?php include 'includes/template/header.php'?>


<!-- Page Header ====================== !-->
<style>
    .page-headers-main{width:<?php if($pagehead['width']==1){?> 90%;margin: auto; <?php }else {?> 100% <?php }?> ;  padding:<?php echo $pagehead['padding'] ?>px 0 <?php echo $pagehead['padding'] ?>px 0 ;
        <?php if($pagehead['shadow'] == 1 ) {?>
        -webkit-box-shadow: inset 5000px 0 0 0 rgba(0, 0, 0, 0.27);
        -moz-box-shadow: inset 5000px 0 0 0 rgba(0, 0, 0, 0.27);
        box-shadow: inset 5000px 0 0 0 rgba(0, 0, 0, 0.27);
        <?php } ?>
        <?php if($pagehead['tip'] == 0 ) {?>
        background:#<?php echo $pagehead['bg_color'] ?> ;
        <?php } ?>
        <?php if($pagehead['tip'] == 1 ) {?>

        background:url(images/uploads/<?php echo $pagehead['bg_image'] ?>) ;

        box-shadow: inset 5000px 0 0 0 rgba(0, 0, 0, 0.2); border-color: rgba(0, 0, 0, 1);
        <?php } ?>
    }

    .product-main-box-img .buttons .text{background-color: #<?php echo $prodayar['incele_button_back'] ?>; }
</style>
<div class="page-headers-main hero-section hero-background">
    <h1 class="page-title" style="color:#<?php echo $pagehead['text_color'] ?>"><?=$diller['urunlerimiz']?></h1>
</div>
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="/" class="permal-link"><?php echo $diller['anasayfa'] ?></a></li>
            <li class="nav-item"><span class="current-page"><?php echo ucwords_tr($diller['urunlerimiz']) ?></span></li>
        </ul>
    </nav>
</div>
<div class="page-contain category-page left-sidebar">
        <div class="container">
            <div class="row">
                <!-- Main content -->
                <div id="main-content" class="main-content col-lg-9 col-md-8 col-sm-12 col-xs-12">

                    <div class="product-category grid-style">
                        <div id="top-functions-area" class="top-functions-area" >
                            <div class="flt-item to-left group-on-mobile">
                                <span class="flt-title"><?php echo $diller['urun-toplam-sayi'] ?></span>
                                <div class="wrap-selectors">
                                   <strong><?php echo $ToplamVeri ?></strong>
                                </div>
                            </div>
                            <div class="flt-item to-right">
                                <span class="flt-title">Sort</span>
                                <div class="wrap-selectors">
                                    <div class="selector-item orderby-selector">
                                        <select id="dynamicList" class="orderby">
                                            <option value="urunler?sirala=1" <?php if($_GET['sirala'] == 1) { echo'selected'; }?> ><?php echo $diller['urun-siralama-yeni'] ?></option>
                                            <option value="urunler?sirala=2" <?php if($_GET['sirala'] == 2) { echo'selected'; }?>><?php echo $diller['urun-siralama-populer'] ?></option>
                                            <option value="urunler?sirala=3" <?php if($_GET['sirala'] == 3) { echo'selected'; }?>><?php echo $diller['urun-siralama-artan'] ?></option>
                                            <option value="urunler?sirala=4" <?php if($_GET['sirala'] == 4) { echo'selected'; }?>><?php echo $diller['urun-siralama-azalan'] ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if($ToplamVeri == 0) { ?>

                            <div class="alert alert-secondary" role="alert">
                             Henüz ürün eklenmemiş!
                         </div>

                     <?php }?>
                        <div class="row">
                            <ul class="products-list">
                               <?php foreach($UrunAl as $prohit){

                                $pro_list_cat = $db->prepare("select * from urun_cat where id=:id and durum=:durum and dil=:dil order by id desc limit 1 ");
                                $pro_list_cat->execute(
                                    array(
                                        'id' => $prohit['kat_id'],
                                        'durum'=> 1,
                                        'dil' => $_SESSION['dil']
                                    )
                                );
                                $pro_cat = $pro_list_cat->fetch(PDO::FETCH_ASSOC);

                                ?>

                                <li class="product-item col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                    <div class="contain-product layout-default">
                                        <div class="product-thumb">
                                            <a href="urun/<?php echo $prohit['id'] ?>/<?php echo seo($prohit['baslik']) ?>" class="link-to-product">
                                                <img src="images/product/<?php echo $prohit['gorsel'] ?>" alt="<?php echo $prohit['baslik'] ?>" style="width:270px;height:270px;object-fit: contain" class="product-thumnail">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <b class="categories"> <?php echo $pro_cat['baslik'] ?></b>

                                            <h4 class="product-title"><a class="pr-name" href="urun/<?php echo $prohit['id'] ?>/<?php echo seo($prohit['baslik']) ?>"><?php echo $prohit['baslik'] ?></a></h4>
                                            <?php if($prodayar['star_rate'] == 1) {?>

                                                <?php 
                                                switch ($prohit['star_rate']) {
                                                    case '0': $percent = 0; break;
                                                    case '1': $percent = 20; break;
                                                    case '2': $percent = 40; break;
                                                    case '3': $percent = 60; break;
                                                    case '4': $percent = 80; break;
                                                    case '5': $percent = 100; break;
                                                } ?>
                                                <div class="rating text-center">
                                                    <p class="star-rating"><span class="width-<?=$percent?>percent"></span></p>
                                                </div>
                                            <?php } ?>
                                            <div class="price ">
                                                <?php
                                                if($prohit['eski_fiyat']!= null){ ?>
                                                    <del><span class="price-amount"><span class="currencySymbol"><?php echo $odemeayar['simge'] ?></span><?php echo number_format($prohit['eski_fiyat'], 2); ?></span></del>
                                                    <br>
                                                <?php }?>
                                                <?php
                                                if($prohit['fiyat']== null || $prohit['fiyat']== '0')
                                                {
                                                } else { ?>
                                                    <ins><span class="price-amount"><span class="currencySymbol"><?php echo $odemeayar['simge'] ?></span><?php echo number_format($prohit['fiyat'], 2); ?></span></ins>
                                                <?php }?>
                                            </div>
                                            <div class="slide-down-box">
                                                <p class="message"><?=$prohit['spot']?></p>
                                                <form class="product-form" method="post">
                                                    <input name="product_code" type="hidden" value="<?php echo $prohit["id"]; ?>">
                                                    <div class="buttons" style="text-align:center ">
                                                        <button type="submit" class="addToCartBtn btn add-to-cart-btn">
                                                            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                                            <?=$diller['sepete-ekle']?>
                                                        </button>
                                                        <input style="width: 30px;height: 40px;margin-left: 10px;padding: 2px;display: inline-block;margin-right: -40px;" class="form-control" type="number" min="1" max="<?=$prohit['stok']?>" step="1" value="1" name="quantity">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                             
                            </ul>
                        </div>

                        <div class="biolife-panigations-block">
                         <?php if($Sayfa >= 1){?>
                            <nav aria-label="Page navigation example" style="margin-top: 50px;">
                                <ul class="panigation-contain justify-content-center">
                                <?php } ?>

                                <?php if($Sayfa > 1){?>

                                    <?php if($_GET['sirala'] == null){ ?>
                                        <li class="page-item"><a class="page-link" href="urunler?s=1"><?=$diller['sayfalama-ilk']?></a></li>
                                        <li class="page-item"><a class="page-link" href="urunler?s=<?=$Sayfa - 1?>"><?=$diller['sayfalama-onceki']?></a></li>
                                    <?php } else { ?>
                                        <li class="page-item"><a class="page-link" href="urunler?s=1&sirala=<?=$_GET['sirala']?>"><?=$diller['sayfalama-ilk']?></a></li>
                                        <li class="page-item"><a class="page-link" href="urunler?s=<?=$Sayfa - 1?>&sirala=<?=$_GET['sirala']?>"><?=$diller['sayfalama-onceki']?></a></li>
                                    <?php } ?>

                                <?php } ?>
                                <?php
                                for($i = $Sayfa - $GorunenSayfa; $i < $Sayfa + $GorunenSayfa +1; $i++){ if($i > 0 and $i <= $Sayfa_Sayisi){
                                    if($i == $Sayfa){
                                      ?>

                                      <li class="page-item" aria-current="page">

                                        <?php if($_GET['sirala'] == null){ ?>

                                          <a class="page-link current-page" href="urunler?s=<?=$i?>"><?=$i?><span class="sr-only">(current)</span></a>

                                      <?php } else { ?>

                                          <a class="page-link current-page" href="urunler?s=<?=$i?>&sirala=<?=$_GET['sirala']?>"><?=$i?><span class="sr-only">(current)</span></a>


                                      <?php } ?>

                                  </li>

                                  <?php
                              }else{ ?>

                                <?php if($_GET['sirala'] == null){ ?>

                                    <li class="page-item"><a class="page-link" href="urunler?s=<?=$i?>"><?=$i?></a></li>

                                <?php } else { ?>

                                    <li class="page-item"><a class="page-link" href="urunler?s=<?=$i?>&sirala=<?=$_GET['sirala']?>"><?=$i?></a></li>

                                <?php } ?>

                                <?php
                            }
                        }
                    }
                    ?>

                    <?php if($urun_listele->rowCount() <=0) { } else { ?>
                        <?php if($Sayfa != $Sayfa_Sayisi){?>


                            <?php if($_GET['sirala'] == null){ ?>

                                <li class="page-item"><a class="page-link" href="urunler?s=<?=$Sayfa + 1?>"><?=$diller['sayfalama-sonraki']?></a></li>
                                <li class="page-item"><a class="page-link" href="urunler?s=<?=$Sayfa_Sayisi?>"><?=$diller['sayfalama-son']?></a></li>

                            <?php } else { ?>

                                <li class="page-item"><a class="page-link" href="urunler?s=<?=$Sayfa + 1?>&sirala=<?=$_GET['sirala']?>"><?=$diller['sayfalama-sonraki']?></a></li>
                                <li class="page-item"><a class="page-link" href="urunler?s=<?=$Sayfa_Sayisi?>&sirala=<?=$_GET['sirala']?>"><?=$diller['sayfalama-son']?></a></li>

                            <?php } ?>



                        <?php }} ?>

                        <?php if($Sayfa >= 1){?>
                        </ul>
                    </nav>
                <?php } ?>
            </div>

        </div>

    </div>
    <!-- Sidebar -->
    <?php include'includes/template/products-cat-leftbar.php'; ?>

</div>
</div>
</div>

<!-- CONTENT AREA ============== !-->
<script>
    $(function(){
        // bind change event to select
        $('#dynamicList').on('change', function () {
            var url = $(this).val(); // get selected value
            if (url) { // require a URL
                window.location = url; // redirect
            }
            return false;
        });
    });
</script>


<?php include 'includes/template/footer.php'?>
</body>
    </html>
<?php include "includes/config/footer_libs.php";?>

