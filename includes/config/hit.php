<?php
include 'includes/config/config.php';
$bugun=date("d"); // bugünün tarihi
$ay=date("m"); // bu ay
$yil=date("Y"); // bu yıl
$onlineSuresi=time()-2*60*60; // iki dakika aktif olmazsa onlineden düşecek
$ip=$_SERVER['REMOTE_ADDR']; // ziyaretçinin ip si
$todayEnter = $db->prepare("select * from hit where ip='$ip' and gun='$bugun' and ay='$ay' and yil='$yil'");
$todayEnter->execute();
if($todayEnter->rowCount() > 0){ // yani bugün girilmişse

    $al=$db->query("SELECT * FROM `hit` WHERE  `ip`='".$ip."' AND `gun`='".$bugun."'")->fetch();
    $guncelle=$db->query("UPDATE `hit` SET `sayac`='".($al['sayac']+1)."' WHERE id='".$al['id']."'"); // çoğulu 1 artırdık



}else{ // griş yapılmamışsa kaydettirelim

    $db->query("INSERT INTO `hit` SET `gun`='$bugun', `ay`='$ay', `yil`='$yil', sayac='1',ip='$ip'");

}
// evet sıra geldi online, tekil ve çoğulu Göstermeye

// çoğul hitler
$bugunx=$db->query("SELECT SUM(sayac) FROM hit WHERE gun='$bugun' AND ay='$ay' AND yil='$yil' ORDER BY id desc")->fetch();
$bugun_cogul=$bugunx['SUM(sayac)']; // bugün çoğul
$dunx=$db->query("SELECT SUM(sayac) FROM hit WHERE gun='".($bugun-1)."' AND ay='$ay' AND yil='$yil' ORDER BY id desc")->fetch();
$dun_cogul=$dunx['SUM(sayac)']; // dün Çoğul
$ayx=$db->query("SELECT SUM(sayac) FROM hit WHERE ay='$ay' AND yil='$yil' ORDER BY id desc")->fetch();
$buay_cogul=$ayx['SUM(sayac)']; // bu ay çoğul
$toplamx=$db->query("SELECT SUM(sayac) FROM hit ORDER BY id desc")->fetch();
$toplam_cogul=$toplamx['SUM(sayac)']; // toplam çoğulumuz
// tekil hitler
$bugun_tekil=$db->query("SELECT * FROM hit WHERE gun='$bugun' AND ay='$ay' AND yil='$yil'")->rowCount(); // bugün tekil
$dun_tekil=$db->query("SELECT * FROM hit WHERE gun='".($bugun-1)."' AND ay='$ay' AND yil='$yil'")->rowCount(); // dün tekil
$buay_tekil=$db->query("SELECT * FROM hit WHERE  ay='$ay' AND yil='$yil'")->rowCount(); // dün tekil
$toplam_tekil=$db->query("SELECT * FROM hit")->rowCount(); // dün tekil















function total_online()
{
    global $db;
    include 'includes/config/config.php';

    $current_time = time();
    $timeout = $current_time - (80);

    $session_exist = $db->query("SELECT session FROM total_visitors WHERE session='".$_SESSION['session']."'");
    $session_check = $session_exist->rowCount();

    if($session_check == 0 && $_SESSION['session']!="")
    {

        $kaydet = $db->prepare("INSERT INTO total_visitors SET
            session=:session,
            time=:time
        ");
        $kaydet->execute(array(
            'session' => $_SESSION['session'],
            'time' => $current_time
        ));

    }
    else
    {
        $kaydet = $db->prepare("UPDATE total_visitors SET
            time=:time
            WHERE session='$_SESSION[session]'
        ");
        $kaydet->execute(array(
            'time' => time()
        ));
    }
    $select_total = $db->query("SELECT * From total_visitors WHERE time>='$timeout'");
    $total_online_visitors = $select_total->rowCount();
    return $total_online_visitors;
}

if (isset($_POST['get_online_visitor']))
{
    $total_online = $total_online();
    echo $total_online;
    exit();
}
?>