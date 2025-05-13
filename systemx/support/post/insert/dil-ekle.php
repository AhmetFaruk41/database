<?php
ob_start();
session_start();
include "../../../../includes/config/config.php";
date_default_timezone_set( 'Europe/Istanbul' );
$settings=$db->prepare("SELECT * from ayarlar where id='1'");
$settings->execute(array(0));
$ayar=$settings->fetch(PDO::FETCH_ASSOC);
$siteurl = $ayar['site_url'];
?>


<?php
include_once '../../secure_post.php';
if ($adminsorgusu->rowCount()===0) {
    header("Location: 404");
} else {
    if (isset($_POST['dilekle'])) {


        $icerik = '<?php
$diller[\'buradasiniz\'] = "Buradasınız";
$diller[\'anasayfa\'] = "Anasayfa";
$diller[\'arama-area\']   = "Aramak istediğiniz ürünün bilgisini veya kodunu girin enter\'a basın";
$diller[\'arama-sonuclari\'] = "Arama Sonuçları";
$diller[\'arama-sonuc-bulunamadi\'] = "Aradığınız kelime veya cümleye ait ürün bulunamadı!";
$diller[\'mega-menu-baslik\'] = "YENİ SEZON İNDİRİMLERİ";
$diller[\'mega-menu-icerik\'] = "Bir Çok Üründe Geçerli Olmak Üzere İnanılmaz İndirim Sezonu Başladı.";
$diller[\'mega-menu-button\'] = "ALIŞVERİŞE BAŞLA";
$diller[\'populer-urunler\'] = "POPÜLER ÜRÜNLER";
$diller[\'kategoriler\'] = "KATEGORİLER";
$diller[\'tum-kategoriler\'] = "TÜM KATEGORİLER";
$diller[\'sepetiniz\'] = "Sepetiniz";
$diller[\'teslimat-ve-odeme\'] = "Teslimat ve Ödeme Yönteminiz";
$diller[\'odeme-bilgileri\'] = "Ödeme Bilgileriniz";
$diller[\'sepete-git\'] = "SEPETE GİT";
$diller[\'hizmetlerimiz\'] = "Hizmetlerimiz";
$diller[\'hizmetlerimiz-aciklamasi\'] = "Verdiğimiz hizmetlere aşağıdan ulaşabilirsiniz";
$diller[\'urunlerimiz\'] = "ÜRÜNLERİMİZ";
$diller[\'urunlerimiz-aciklamasi\'] = "Kredi kartına taksit imkanı ile ürünlerimizi satın alabilirsiniz";
$diller[\'incele\'] = "İNCELE";
$diller[\'populer\'] = "Popüler";
$diller[\'yeni\'] = "Yeni";
$diller[\'urun-gruplari\'] ="ÜRÜN GRUPLARI";
$diller[\'urunlere-git\'] ="Ürünlere Git";
$diller[\'pricing-table\'] = "Pricing Table";
$diller[\'pricing-aciklamasi\'] = "Aşağıdaki tabloları inceleyerek kendinize en uygun paketi seçebilirsiniz";
$diller[\'pricing-button-yazisi\'] = "SATIN AL";
$diller[\'pricing-tavsiye\'] ="TAVSİYE EDİLEN";
$diller[\'blog\'] = "BLOG";
$diller[\'blog-aciklamasi\'] = "Bizden son haberlere ve duyurulara ulaşmak için aşağıdaki listelere gözatabilirsiniz";
$diller[\'blog-devamini-oku\'] = "Devamını Oku";
$diller[\'blog-detay-populer\'] = "Popüler Yazılar";
$diller[\'proje\'] = "PROJELER";
$diller[\'proje-aciklamasi\'] = "Bugüne kadar yaptığımız çalışmalara aşağıdan ulaşabilirsiniz";
$diller[\'proje-tumu\'] = "TÜMÜ";
$diller[\'ekip\'] = "PROFESYONEL EKİBİMİZ";
$diller[\'ekip-aciklamasi\'] = "Yaptığımız güzel işleri kimler yapıyor merak ediyorsanız aşağıdan ulaşabilirsiniz";
$diller[\'ozellik\'] = "Özellikler Neler?";
$diller[\'ozellik-aciklamasi\'] = "Bu alanda satış yaptığınız ürününüze ait özellikleri sıralayabilirsiniz";
$diller[\'ozellik-tumu\'] = "TÜM ÖZELLİKLER";
$diller[\'yorum\'] = "Müşterilerimizin Yorumları";
$diller[\'yorum-aciklamasi\'] = "Birlikte çalıştığımız müşterilerimiz hakkımızda neler söyledi?";
$diller[\'ebulten\'] = "E-Bülten Aboneliği";
$diller[\'ebulten-aciklamasi\'] = "Tüm gelişmelerden ve indirimlerden haberdar olmak istiyorsanız e-bülten aboneliğine kayıt olun.";
$diller[\'ebulten-placeholder\'] = "Lütfen E-Posta Adresinizi Girin";
$diller[\'ebulten-submit\'] = "ABONE OL";
$diller[\'marka\'] = "MARKALAR";
$diller[\'marka-aciklamasi\'] = "Partnerlerimiz ve referanslarımız";
$diller[\'footer-hakkimizda-devami\'] = "Devamı";
$diller[\'calisma-saatleri\'] = "ÇALIŞMA SAATLERİ";
$diller[\'kurumsal\'] = "KURUMSAL";
$diller[\'baglantilar\'] = "BAĞLANTILAR";
$diller[\'video\'] = "VİDEOLAR";
$diller[\'video-aciklamasi\'] = "Firmamıza ait yapılan çalışamalardan oluşan kolaj videolar";
$diller[\'videoyu-izle\'] = "Videoyu İzle";
$diller[\'belge\'] = "BELGELERİMİZ";
$diller[\'belge-aciklamasi\'] = "Firmamıza ait tüm sertifika ve belgeler";
$diller[\'belge-incele\'] = "İNCELE";
$diller[\'beceri\'] = "UZMANLIKLARIMIZ";
$diller[\'beceri-aciklamasi\'] = "Duis vel nibh at velit scelerisque suscipit. Nunc sed turpis. Fusce egestas elit eget lorem. Sed cursus turpis vitae tortor";
$diller[\'katalog\'] = "E-Katalog";
$diller[\'katalog-aciklamasi\'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris scelerisque lacus quis nibh pulvinar dignissim. Duis sagittis nisi et sem aliquet, non ultrices risus egestas. Nam et varius libero";
$diller[\'banka-hesap\'] = "Hesap Numaralarımız";
$diller[\'banka-hesap-aciklamasi\'] = "EFT/Havale seçeneği ile satın alımı gerçekleştirdiyseniz lütfen aşağıdaki hesap bilgilerimizden birine gönderim yapınız";
$diller[\'banka-adi\'] = "BANKA";
$diller[\'banka-hesap-sahibi\'] = "HESAP SAHİBİ";
$diller[\'banka-sube\'] = "ŞUBE KODU";
$diller[\'banka-hesap-no\'] = "HESAP NUMARASI";
$diller[\'banka-iban\'] = "IBAN";
$diller[\'foto-galeri\'] = "Foto Galeri";
$diller[\'foto-galeri-aciklamasi\'] = "Firmamıza ait fotoğraf albümlerine aşağıdan ulaşabilirsiniz";
$diller[\'insan-kaynaklari\'] = "İnsan Kaynakları";
$diller[\'insan-kaynaklari-aciklamasi\'] = "Firmamızdaki boş pozisyonlar için formu doldurarak iş başvurusunda bulunabilirsiniz";
$diller[\'isim-soyisim\'] = "İsim Soyisim";
$diller[\'dogum-tarihi\'] = "Doğum Tarihiniz";
$diller[\'dogum-tarihi-kisa\'] = "gg/aa/yyyy";
$diller[\'cinsiyetiniz\'] = "Cinsiyetiniz";
$diller[\'secim-yap\'] = "Seçim Yapın";
$diller[\'erkek\'] = "Erkek";
$diller[\'kadin\'] = "Kadın";
$diller[\'medeni-haliniz\'] = "Medeni Haliniz";
$diller[\'evli\'] = "Evli";
$diller[\'bekar\'] = "Bekar";
$diller[\'kan-grubu\'] = "Kan Grubunuz";
$diller[\'telefon-numaraniz\'] = "Telefon Numaranız";
$diller[\'email-adresiniz\'] = "E-Mail Adresiniz";
$diller[\'il\'] = "Şehir";
$diller[\'ilce\'] = "İlçe";
$diller[\'askerlik\'] = "Askerlik Durumu";
$diller[\'askerlik-aciklamasi\'] = "Tecilli ise süresini belirtiniz";
$diller[\'ehliyet\'] = "Ehliyetiniz var mı?";
$diller[\'ehliyet-aciklamasi\'] = "Var ise hangisi olduğunu belirtiniz";
$diller[\'egitim-durumu\'] = "Eğitim Durumunuz";
$diller[\'yabanci-dil-durumu\'] = "Yabancı Dil Durumunuz";
$diller[\'calisma-tecrubeleri\'] = "Önceki Çalışma Deneyimleriniz";
$diller[\'bilgi-referans\'] = "Kısaca Hakkınızda ve Referanslarınız";
$diller[\'form-eksiksiz-doldur-alani\'] = "Lütfen tüm alanları eksiksiz doldurunuz.";
$diller[\'diger-bilgileriniz\'] = "Diğer Bilgileriniz";
$diller[\'guvenlik-kodu\'] = "Güvenlik Kodu";
$diller[\'basvuruyu-gonder\'] = "Başvuruyu Gönder";
$diller[\'button-tamam\'] = "TAMAM";
$diller[\'post-basarili\'] = "BAŞARILI!";
$diller[\'post-basvuru-basarili-aciklamasi\'] = "Başvurunuz bize ulaşmıştır. En kısa sürede sizinle iletişime geçilecektir.";
$diller[\'post-iletisim-basarili-aciklamasi\'] = "Mesajınız bize ulaşmıştır.";
$diller[\'post-hata\'] = "HATA!";
$diller[\'post-guvenlik-kod-hata\'] = "Güvenlik Kodunu Yanlış Girdiniz.";
$diller[\'paylas\'] = "Paylaşın";
$diller[\'etiketler\'] = "Etiketler";
$diller[\'iletisim-title\'] = "İletişim";
$diller[\'iletisime-gec\'] = "İletişime Geçin";
$diller[\'bize-yazin\'] = "Bize Yazın";
$diller[\'iletisim-isim\'] = "İsim";
$diller[\'iletisim-mail\'] = "E-Posta";
$diller[\'iletisim-telno\'] = "Telefon";
$diller[\'iletisim-mesaj\'] = "Mesaj";
$diller[\'iletisim-button-gonder\'] = "Mesajı Gönder";
$diller[\'proje-adi\'] = "PROJE ADI";
$diller[\'proje-baslangic\'] = "BAŞLAMA";
$diller[\'proje-bitis\'] = "BİTİŞ";
$diller[\'proje-link\'] = "Proje Web Sitesi";
$diller[\'proje-hakkinda\'] = "PROJE HAKKINDA";
$diller[\'proje-ulasim\'] = "ULAŞIM";
$diller[\'proje-galeri\'] = "GALERİ";
$diller[\'proje-videosu\'] = "PROJE VİDEOSU";
$diller[\'urun-toplam-sayi\'] = "Toplam ürün sayısı";
$diller[\'urun-siralama-yeni\'] = "En Yeni Ürünler";
$diller[\'urun-siralama-populer\'] = "Popüler Ürünler";
$diller[\'urun-siralama-artan\'] = "Fiyatı Artan";
$diller[\'urun-siralama-azalan\'] = "Fiyatı Azalan";
$diller[\'urun-kategorileri\'] = "ÜRÜN KATEGORİLERİ";
$diller[\'urun-sayi-yazisi\'] = "Ürün";
$diller[\'urun-arayin\'] = "ÜRÜN ARAYIN";
$diller[\'urun-ara-button-yazi\'] = "ARA";
$diller[\'urun-ara-input-aciklama\'] = "Kelime veya ürün kodu";
$diller[\'sayfalama-ilk\'] = "İlk";
$diller[\'sayfalama-onceki\'] = "Önceki";
$diller[\'sayfalama-sonraki\'] = "Sonraki";
$diller[\'sayfalama-son\'] = "Son";
$diller[\'urun-kodu\'] = "Ürün Kodu";
$diller[\'kategori\'] = "Kategori";
$diller[\'stok-durumu\'] = "Stok Durumu";
$diller[\'stok-mevcut\'] = "Mevcut";
$diller[\'stok-yok\'] = "Stokta Yok";
$diller[\'stok-adet-yazisi\'] = "Adet";
$diller[\'kargo-ucreti\'] = "Kargo Ücreti";
$diller[\'kargo-ucretsiz\'] = "Ücretsiz Kargo";
$diller[\'kargo-limit-aciklamasi\'] = "ve Üzeri Alışverişlerinizde Kargo Bedava!";
$diller[\'sepete-ekle\'] = "SEPETE EKLE";
$diller[\'whatsapp-siparis\'] = "WHATSAPP\'TAN SİPARİŞ";
$diller[\'normal-siparis\'] = "SİPARİŞ VER";
$diller[\'urun-detay-aciklama\'] = "AÇIKLAMA";
$diller[\'urun-detay-ekbilgi\'] = "EK BİLGİLER";
$diller[\'urun-detay-video\'] = "ÜRÜN VİDEOSU";
$diller[\'benzer-urunler\'] = "BENZER ÜRÜNLER";
$diller[\'normal-siparis-gonder\'] = "Siparişi Gönder";
$diller[\'modal-kapat\'] = "Kapat";
$diller[\'siparis-isim\'] = "İsim Soyisim";
$diller[\'siparis-eposta\'] = "E-Posta Adresiniz";
$diller[\'siparis-tel\'] = "Telefon Numaranız";
$diller[\'siparis-urun\'] = "Sipariş Edilen Ürün ve Ürün Kodu";
$diller[\'siparis-sehir\'] = "İlçe / Şehir";
$diller[\'siparis-postakodu\'] = "Posta Kodu";
$diller[\'siparis-adres\'] = "Adresiniz";
$diller[\'siparis-not\'] = "Sipariş İle İlgili Notunuz";
$diller[\'normal-siparis-basarili\'] = "Siparişiniz Başarılı";
$diller[\'normal-siparis-basarili-aciklamasi\'] = "Siparişiniz elimize ulaştı. En Kısa Sürede Sizinle İletişime Geçilecektir.";
$diller[\'kupon-kodu\'] = "Kupon Kodu";
$diller[\'kupon-kodu-button\'] = "GÜNCELLE";
$diller[\'sepet-urun\'] = "ÜRÜN";
$diller[\'sepet-birim-fiyat\'] = "BİRİM FİYATI";
$diller[\'sepet-adet\'] = "ADET";
$diller[\'sepet-toplam-1\'] = "TOPLAM";
$diller[\'sepet-toplam-2\'] = "SEPET TOPLAMI";
$diller[\'siparis-detaylari\'] = "SİPARİŞ DETAYLARI";
$diller[\'alisverise-devam\'] = "ALIŞVERİŞE DEVAM ET";
$diller[\'ara-toplam\'] = "Ara Toplam";
$diller[\'kdv\'] = "KDV";
$diller[\'kargo-bedeli\'] = "Kargo Bedeli";
$diller[\'sepet-ilerle-button\'] = "ONAYLA VE İLERLE";
$diller[\'sepet-bos-aciklamasi\'] = "Alışveriş sepetiniz boş!";
$diller[\'odeme-yontemi-secin\'] = "ÖDEME YÖNTEMİ SEÇİN";
$diller[\'odeme-isim\'] = "Adınız";
$diller[\'odeme-soyisim\'] = "Soyadınız";
$diller[\'odeme-eposta\'] = "E-Posta";
$diller[\'odeme-tel\'] = "Telefon Numaranız";
$diller[\'odeme-sehir\'] = "Şehir";
$diller[\'odeme-ilce\'] = "İlçe";
$diller[\'odeme-postakodu\'] = "Posta Kodu";
$diller[\'odeme-adres\'] = "Sipariş Adresiniz";
$diller[\'odeme-not\'] = "Sipariş İle İlgili Notunuz";
$diller[\'odeme-tur-kredi-karti\'] = "Kredi Kartı / Banka Kartı";
$diller[\'odeme-tur-kredi-karti-aciklamasi\'] = "Kredi kartınızın taksit avantajlarıyla satın alabilirsiniz";
$diller[\'odeme-tur-havale\'] = "Havale / EFT";
$diller[\'odeme-tur-havale-aciklamasi\'] = "Havale - Eft seçeneği ile satın almak için siparişinizin ardından banka hesap numaralarımızdan birisine ödemeniz gereken tutarı eksiksiz göndermeniz gerekmektedir";
$diller["mesafeli-satis-sozlesmesi"] = "Mesafeli Satış Sözleşmesi";
$diller["mesafeli-satis-sozlesmesi-onay"] = "Mesafeli Satış Sözleşmesini Onaylıyorum";
$diller[\'odemeye-gec\'] = "ÖDEMEYE GEÇ";
$diller[\'siparis-sonucu\'] = "Sipariş Sonucu";
$diller[\'siparis-basarili\'] = "Siparişiniz başarıyla oluşturulmuştur.";
$diller[\'eft-havale-basarili-aciklamasi\'] = "Siparişinizin tamamlanabilmesi için lütfen ödeyeceğiniz tutarı eksiksiz olarak hesap numaralarımızdan birisine gönderip bize bilgi veriniz";
$diller[\'siparis-numaraniz\'] = "Sipariş Numaranız";
$diller[\'odenecek-tutar\'] = "Ödenecek Tutar";
$diller[\'banka-hesap-numaralarimiz\'] = "BANKA HESAP NUMARALARIMIZ";
$diller[\'sss\'] = "Sık Sorulan Sorular";
$diller[\'sss-aciklamasi\'] = "Firmamız hakkında tüm merak ettiklerinizi aşağıdaki sorular içinde bulabilirsiniz";
$diller[\'modul-hakkimizda-devami\'] = "DEVAMI";
$diller[\'varyant-secin-yazisi\'] = "Seçim Yapın";
$diller[\'404-aciklama\'] = "Üzgünüz! Aradığınız sayfayı bulamadık. Tekrardan anasayfaya gidebilirsiniz";
$diller[\'form-eksik-alan\'] = "Lütfen Tüm Alanları Eksiksiz Doldurunuz";
$diller[\'urunler-mobil-kategoriler-yazisi\'] = "ÜRÜN KATEGORİLERİ";
$diller[\'topheader-teklif-button-yazisi\'] = "TEKLİF AL";
$diller[\'topheader-siparis-takip-button-yazisi\'] = "SİPARİŞ TAKİP";
$diller[\'teklif-form-baslik\'] = "Bizden Teklif Alın";
$diller[\'teklif-form-aciklama\'] = "Projeleriniz için bize detaylı bilgi verip fiyat teklifi alabilirsiniz. Lütfen tüm alanları doldurup aklınızdaki projeyi detaylarıyla yazınız";
$diller[\'teklif-form-isim\'] = "Adınız Soyadınız";
$diller[\'teklif-form-eposta\'] = "E-Posta Adresiniz";
$diller[\'teklif-form-tel\'] = "Telefon Numaranız";
$diller[\'teklif-form-firma-bilgi\'] = "Firmanız Hakkında Kısa Bilgi";
$diller[\'teklif-form-konu\'] = "Proje Konusu";
$diller[\'teklif-form-icerik\'] = "Projeniz Hakkında Detaylar";
$diller[\'teklif-form-dosya\'] = "Ek Dosya";
$diller[\'teklif-form-gonder-button\'] = "Teklif Talebinde Bulun";
$diller[\'teklif-form-hatali-eposta-uyari\'] = "Lütfen Geçerli Bir E-Posta Adresi Giriniz";
$diller[\'teklif-form-hatali-dosya-tipi\'] = "Belirtilen dosya tipleri harici uzantı kullanılamaz";
$diller[\'teklif-form-basarili-yazisi\'] = "Projeniz incelenip en kısa sürede tarafınıza teklif yapılacaktır";
$diller[\'siparis-takip-baslik\'] = "Sipariş Takip";
$diller[\'siparis-takip-aciklama\'] = "Siparişinizin son durumunu öğrenmek için lütfen sipariş numaranızı giriniz";
$diller[\'siparis-takip-button\'] = "Siparişi Sorgula";
$diller[\'siparis-takip-tekrar-sorgula-button\'] = "Yeni Bir Sipariş Sorgulayın";
$diller[\'siparis-takip-bulunamadi\'] = "Herhangi bir sipariş bulunamadı!";
$diller[\'siparis-takip-no\'] = "Sipariş Numarası";
$diller[\'siparis-takip-order-sahibi\'] = "Sipariş Sahibi";
$diller[\'siparis-takip-order-tur\'] = "Ödeme Yöntemi";
$diller[\'siparis-takip-order-durum\'] = "Sipariş Durumu";
$diller[\'siparis-takip-order-eposta\'] = "Alıcı E-Posta Adresi";
$diller[\'siparis-takip-order-telefon\'] = "Alıcı Telefon Numarası";
$diller[\'siparis-takip-order-adres\'] = "Sipariş Adresi";
$diller[\'siparis-takip-order-fatura-adres\'] = "Fatura Adresi";
$diller[\'siparis-takip-order-adet-yazisi\'] = "Adet Ürün";
$diller[\'siparis-takip-order-tarih\'] = "Sipariş Tarihi";
$diller[\'siparis-takip-order-toplam\'] = "Toplam";
$diller[\'siparis-takip-order-button\'] = "SİPARİŞ DETAYI";
$diller[\'siparis-takip-order-durum-yeni\'] = "Yeni Sipariş";
$diller[\'siparis-takip-order-durum-odeme\'] = "Ödeme Bekleniyor";
$diller[\'siparis-takip-order-durum-hazirlanma\'] = "Hazırlanıyor";
$diller[\'siparis-takip-order-durum-tedarik\'] = "Tedarik Ediliyor";
$diller[\'siparis-takip-order-durum-kargolandi\'] = "Kargoya Verildi";
$diller[\'siparis-takip-order-durum-tamamlandi\'] = "Tamamlandı";
$diller[\'siparis-takip-order-durum-iptal\'] = "İptal Edildi";
$diller[\'siparis-takip-order-detay-baslik\'] = "Numaralı Siparişinizin Detayları";
$diller[\'siparis-takip-order-detay-urunler\'] = "Sipariş Edilen Ürün veya Ürünler";
$diller[\'siparis-takip-order-urun-birim\'] = "BİRİM FİYAT";
$diller[\'siparis-takip-order-urun-adet\'] = "ADET";
$diller[\'siparis-takip-order-urun-kdv\'] = "TOPLAM KDV";
$diller[\'siparis-takip-order-urun-kargo\'] = "KARGO ÜCRETİ";
$diller[\'siparis-takip-order-urun-toplam\'] = "TOPLAM";
$diller[\'siparis-takip-order-urun-kargofirma\'] = "KARGO FİRMASI";
$diller[\'siparis-takip-order-urun-takipno\'] = "TAKİP NUMARASI";
?>';


        $kaydet = $db->prepare("INSERT INTO dil SET
        baslik=:baslik,
        kisa_ad=:kisa_ad,
        flag=:flag,
        sira=:sira,
        icerik=:icerik,
        varsayilan=:varsayilan
        ");
        $ekle = $kaydet->execute(array(
            'baslik' => $_POST['baslik'],
            'kisa_ad' => $_POST['kisa_ad'],
            'flag' => $_POST['flag'],
            'sira' => $_POST['sira'],
            'icerik' => $icerik,
            'varsayilan' => $_POST['varsayilan']
        ));
        if ($ekle) {

            $uploads_dir = '/../../../../includes/lang/';
            $dosya = $_POST["kisa_ad"];
            $uzanti = ".php";
            $metin = $icerik;

            $dosya = fopen(__DIR__ . "$uploads_dir$_POST[kisa_ad]$uzanti", "a");
            $yaz = fwrite($dosya, $icerik);

            Header("location: ../../../pages.php?sayfa=diller&status=success");

        } else {

            Header("location: ../../../pages.php?sayfa=diller&status=warning");

        } //TODO EKLEME VAR

    }

}

?>


