<?php
ob_start();
session_start();
$_SESSION['session']=session_id();
error_reporting(0);
header('Content-Type: text/html; charset=utf-8');
ini_set('error_reporting', E_ALL^E_NOTICE);
define("GUVENLIK",true);
date_default_timezone_set( 'Europe/Istanbul' );
include "includes/config/config.php";
include "includes/config/language.php";
include "includes/config/functions.php";
include "includes/config/hit.php";
total_online();
//** Ayar SQL */
$settings=$db->prepare("SELECT * from ayarlar where id='1'");
$settings->execute(array(0));
$ayar=$settings->fetch(PDO::FETCH_ASSOC);
$siteurl = $ayar['site_url'];
$site_adi = $ayar['site_baslik'];
$odemesettings=$db->prepare("SELECT * from odeme_ayar where id='1'");
$odemesettings->execute(array(0));
$odemeayar=$odemesettings->fetch(PDO::FETCH_ASSOC);
$smssettings=$db->prepare("SELECT * from sms where id='1'");
$smssettings->execute(array(0));
$smsayar=$smssettings->fetch(PDO::FETCH_ASSOC);
$BakimDurum = $db->prepare("select * from bakim where id='1' and durum='1' order by id");
$BakimDurum->execute();
$bakim = $BakimDurum->fetch(PDO::FETCH_ASSOC);
?>
