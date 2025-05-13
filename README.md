# Fırın E-Ticaret Sistemi

## Proje Genel Bakış
Bu proje, bir yerel fırın için kapıda nakit ödeme ve kapıda kredi kartı ile ödeme seçeneklerine sahip bir e-ticaret sitesi geliştirilmesi amacıyla hazırlanmıştır. Sistem, PHP programlama dili kullanılarak geliştirilmiş, veritabanı yönetimi için MySQL (phpMyAdmin ile) tercih edilmiştir ve veritabanı işlemleri için PDO (PHP Data Objects) yapısı kullanılmıştır. Admin paneli, yöneticiye siparişler, ürünler, blog yazıları ve banka hesapları gibi temel yönetim imkanı sunmaktadır.

## Veritabanı Özeti
Veritabanı, MySQL üzerinde yapılandırılmış ve phpMyAdmin ile yönetilmiştir. PDO ile güvenli bağlantı sağlanmıştır. Sistem, kullanıcılar, siparişler, ürünler, blog yazıları, banka hesapları ve site ayarları gibi temel verileri saklamak için çok sayıda tablo içerir. Detaylı tablo yapısı projenin ihtiyaçlarına göre özelleştirilmiştir.

## Projenin Amacı
Projenin temel amacı, yerel bir fırının ürünlerini dijital platformda müşterilere sunmasını sağlamak ve satış süreçlerini kolaylaştırmaktır. Kapıda ödeme seçenekleriyle müşteri güvenini artırmak, admin paneli ile de işletme sahibinin siparişleri, ürünleri ve diğer içerikleri hızlıca yönetebilmesini sağlamak hedeflenmiştir. Ayrıca, blog bölümüyle fırının müşterilerle etkileşimini artırmak ve SEO açısından fayda sağlamak amaçlanmıştır.

## Kullanılan Teknolojiler
- **Backend:** PHP (Veritabanı işlemleri için PDO yapısı kullanıldı)
- **Veritabanı:** MySQL (phpMyAdmin arayüzü ile yönetildi)
- **Frontend:** HTML, CSS, JavaScript (Admin paneli için kullanıcı dostu bir arayüz tasarlandı)
- **Diğer:** Bootstrap (Responsive tasarım için)

## Proje Yapısı ve Özellikleri

### 1. Kullanıcı Arayüzü (Frontend)
- Kullanıcılar, fırının ürünlerini kategori bazında listeleyebilir ve detaylarını görüntüleyebilir.
- Sepete ürün ekleme, çıkarma ve sipariş oluşturma işlemleri yapılabilir.
- Ödeme yöntemi olarak "Kapıda Nakit" veya "Kapıda Kredi Kartı" seçenekleri sunulmuştur.
- Blog bölümü ile kullanıcılar fırınla ilgili haberleri, tarifleri veya duyuruları okuyabilir.

### 2. Admin Paneli (Backend)
Admin paneli, işletme sahibinin siteyi kolayca yönetebilmesi için tasarlanmıştır. Admin panelinin temel özellikleri şunlardır:
- **Sipariş Yönetimi:** Admin, gelen siparişleri listeleyebilir ve sipariş durumunu güncelleyebilir.
- **Ürün Yönetimi:** Admin, yeni ürünler ekleyebilir ve mevcut ürünleri düzenleyebilir.
- **Blog Yönetimi:** Admin, blog yazıları ekleyebilir, düzenleyebilir veya silebilir.
- **Banka Hesapları Yönetimi:** Admin, kapıda ödeme işlemleri için banka hesap bilgilerini ekleyebilir.
- **Gösterge Paneli:** Admin, toplam sipariş, ürün, proje ve blog yazısı sayıları gibi verileri takip edebilir.

### 3. Veritabanı Yapısı
Veritabanı, MySQL kullanılarak tasarlanmış ve PDO ile güvenli bağlantılar sağlanmıştır. Temel tablolar aşağıdaki gibi yapılandırılmıştır:
- **Kullanıcılar**
- **Siparişler**
- **Ürünler**
- **Blog Yazıları**
- **Banka Hesapları**

## Proje İş Akışı

### Kullanıcı Süreci:
1. Kullanıcı siteye girer, ürünleri inceler ve sepete ekler.
2. Sepet sayfasında ürünleri kontrol eder, ödeme yöntemini seçer (Kapıda Nakit veya Kredi Kartı).
3. Sipariş oluşturulur ve admin paneline düşer.

### Admin Süreci:
1. Admin, gelen siparişleri "Gelen Kutusu" bölümünden kontrol eder.
2. Sipariş durumunu günceller (örneğin, "Kargolandı" olarak işaretler).
3. Ürün stoklarını ve blog yazılarını yönetir.
4. Banka hesap bilgilerini günceller.

## Güvenlik Önlemleri
- **Veritabanı Güvenliği:** PDO ile prepared statements kullanılarak SQL injection saldırılarına karşı koruma sağlanmıştır.
- **Kullanıcı Doğrulama:** Admin paneline erişim için kullanıcı adı ve şifre doğrulama sistemi uygulanmıştır.
- **Veri Doğrulama:** Kullanıcı girişleri ve form verileri sunucu tarafında kontrol edilmiştir.
- **Stok Kontrolü:** Sipariş sonrası stok otomatik olarak güncellenir ve stok dışı ürünler için uyarı verilir.

## Projenin Avantajları
- **Dijital Satış Kanalı:** Yerel fırın için dijital satış kanalı oluşturularak müşteri kitlesi genişletilmiştir.
- **Müşteri Güveni:** Kapıda ödeme seçenekleriyle müşteri güveni artırılmıştır.
- **Kolay Yönetim:** Admin paneli sayesinde işletme sahibi, sipariş ve ürün yönetimini kolayca yapabilmektedir.
- **SEO Performansı:** Blog bölümü, müşteri etkileşimini ve SEO performansını artırmaktadır.
- **Responsive Tasarım:** Hem masaüstü hem mobil cihazlarda sorunsuz kullanım sağlanmıştır.

---

Proje ile ilgili daha fazla bilgi için [İletişim Bilgileri](mailto:ahmetfarukcatlar@stngroup.com.tr) adresinden iletişime geçebilirsiniz.
