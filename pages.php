<?php include 'includes/config/session.php'; ?>
<?php
if ($bakim['durum'] == 1 ) {
    header("Location:$ayar[site_url]bakimdayiz");
}
?>
<!doctype html>
<html lang="tr">
<head>
    <base href="<?php echo"$ayar[site_url]"?>">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <?php
    if(isset($_GET['sayfa'])){
        $s = $_GET['sayfa'];
        switch($s){

            case 'errorpage';
                require_once("includes/template/_pages/404.php");
                break;

            case 'about';
                require_once("includes/template/_pages/about.php");
                break;

            case 'htmlsayfa';
                require_once("includes/template/_pages/htmlpages.php");
                break;

            case 'team';
                require_once("includes/template/_pages/team.php");
                break;

            case 'features';
                require_once("includes/template/_pages/features.php");
                break;

            case 'certificate';
                require_once("includes/template/_pages/certificate.php");
                break;

            case 'clients';
                require_once("includes/template/_pages/clients.php");
                break;

            case 'pricing';
                require_once("includes/template/_pages/pricing.php");
                break;

            case 'projects';
                require_once("includes/template/_pages/projects.php");
                break;

            case 'projedetail';
                require_once("includes/template/_pages/project_detail.php");
                break;

            case 'blog';
                require_once("includes/template/_pages/blog.php");
                break;

            case 'services';
                require_once("includes/template/_pages/services.php");
                break;

            case 'catalog';
                require_once("includes/template/_pages/catalog.php");
                break;

            case 'bank';
                require_once("includes/template/_pages/bank.php");
                break;

            case 'photogallery';
                require_once("includes/template/_pages/photo_gallery.php");
                break;

            case 'photodetail';
                require_once("includes/template/_pages/photo_gallery_detail.php");
                break;

            case 'videos';
                require_once("includes/template/_pages/videos.php");
                break;

            case 'videodetail';
                require_once("includes/template/_pages/video_detail.php");
                break;

            case 'insankaynak';
                require_once("includes/template/_pages/human_resources.php");
                break;

            case 'servicedetail';
                require_once("includes/template/_pages/service_detail.php");
                break;

            case 'blogdetail';
                require_once("includes/template/_pages/blog_detail.php");
                break;

            case 'contact';
                require_once("includes/template/_pages/contact.php");
                break;

            case 'products';
                require_once("includes/template/_pages/products.php");
                break;

            case 'categorysub';
                require_once("includes/template/_pages/products_cat_sub.php");
                break;

            case 'productdetail';
                require_once("includes/template/_pages/products_detail.php");
                break;

            case 'cart';
                require_once("includes/template/_pages/cart.php");
                break;

            case 'delivery';
                require_once("includes/template/_pages/cart-2.php");
                break;

            case 'purchase';
                require_once("includes/template/_pages/cart-3.php");
                break;

            case 'purchasepost';
                require_once("includes/func/purchase.php");
                break;

            case 'ordersuccess';
                require_once("includes/template/_alerts/eft-havale-alerts.php");
                break;

            case 'nakitordersuccess';
                require_once("includes/template/_alerts/kapida-nakit-alerts.php");
                break;

            case 'kartordersuccess';
                require_once("includes/template/_alerts/kart-nakit-alerts.php");
                break;

            case 'paysuccess';
                require_once("includes/template/_alerts/pay-success-alerts.php");
                break;

            case 'shopiersuccess';
                require_once("includes/template/_alerts/shopier-success-alerts.php");
                break;

            case 'search';
                require_once("includes/template/_pages/search.php");
                break;

            case 'faq';
                require_once("includes/template/_pages/faq.php");
                break;

            case 'skills';
                require_once("includes/template/_pages/skills.php");
                break;




            case 'offer';
                require_once("includes/template/_pages/offer.php");
                break;//TODO EKLEME VAR

            case 'offerpost';
                require_once("includes/post/offerpost.php");
                break;

            case 'tracing';
                require_once("includes/template/_pages/tracing.php");
                break;//TODO EKLEME VAR
            case 'tracingresult';
                require_once("includes/template/_pages/tracing_result.php");
                break;
        }
    }else {
        ?>
        <script type='text/javascript'> document.location = 'index.php'; </script>
    <?php
    }
    ?>



