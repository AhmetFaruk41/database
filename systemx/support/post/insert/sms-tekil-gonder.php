<?php
ob_start();
session_start();
include "../../../../includes/config/config.php";
date_default_timezone_set( 'Europe/Istanbul' );
$settings=$db->prepare("SELECT * from ayarlar where id='1'");
$settings->execute(array(0));
$ayar=$settings->fetch(PDO::FETCH_ASSOC);
$siteurl = $ayar['site_url'];
$sms_setting = $db->prepare("select * from sms where id='1'");
$sms_setting->execute();
$sms = $sms_setting->fetch(PDO::FETCH_ASSOC);
?>


<?php
include_once '../../secure_post.php';
if ($adminsorgusu->rowCount()===0) {
    header("Location: 404");
} else {
    if (isset($_POST['tekilsmsgonder'])) {

        if ($sms['sms_firma'] == 1) {


            /* İleti Merkezi */

            $iletibaslik = $sms['iletimerkezi_baslik'];
            $iletiuser = $sms['iletimerkezi_user'];
            $iletipass = $sms['iletimerkezi_pass'];
            $mesaj_icerik = $_POST['tekilsms_mesaj'];
            $numara = $_POST['tekilsms_numara'];

            function sendRequest($site_name, $send_xml, $header_type)
            {

                //die('SITENAME:'.$site_name.'SEND XML:'.$send_xml.'HEADER TYPE '.var_export($header_type,true));
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $site_name);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $send_xml);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $header_type);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_TIMEOUT, 120);

                $result = curl_exec($ch);

                return $result;
            }

            $username = $iletiuser;
            $password = $iletipass;
            $orgin_name = $iletibaslik;

            $xml = <<<EOS
   		 <request>
   			 <authentication>
   				 <username>{$username}</username>
   				 <password>{$password}</password>
   			 </authentication>

   			 <order>
   	    		 <sender>{$orgin_name}</sender>
   	    		 <sendDateTime>01/05/2013 18:00</sendDateTime>
   	    		 <message>
   	        		 <text>{$mesaj_icerik}</text>
   	        		 <receipents>
   	            		 <number>{$numara}</number>
   	        		 </receipents>
   	    		 </message>
   			 </order>
   		
   		 </request>

EOS;


            $result = sendRequest('http://api.iletimerkezi.com/v1/send-sms', $xml, array('Content-Type: text/xml'));
            Header("location: ../../../pages.php?sayfa=smsnumaralar&status=success");
            /* İleti Merkezi  Ending */

        }


        if ($sms['sms_firma'] == 2) {

            $mesaj_icerik = $_POST['tekilsms_mesaj'];
            $numara = $_POST['tekilsms_numara'];


            function sendsms($msg, $telno, $header, $username, $pass)
            {


                $startdate = date('d.m.Y H:i');
                $startdate = str_replace('.', '', $startdate);
                $startdate = str_replace(':', '', $startdate);
                $startdate = str_replace(' ', '', $startdate);

                $stopdate = date('d.m.Y H:i', strtotime('+1 day'));
                $stopdate = str_replace('.', '', $stopdate);
                $stopdate = str_replace(':', '', $stopdate);
                $stopdate = str_replace(' ', '', $stopdate);


                $url = "http://api.netgsm.com.tr/bulkhttppost.asp?usercode=$username&password=$pass&gsmno=$telno&message=$msg&msgheader=$header&startdate=$startdate&stopdate=$stopdate";
                //echo $url;

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//  curl_setopt($ch,CURLOPT_HEADER, false);
                $output = curl_exec($ch);
                curl_close($ch);
                return $output;

            }


            $usa = $sms['netgsm_user'];
            $paso = $sms['netgsm_pass'];

            $mesaj = $mesaj_icerik;
            $tel = $numara;
            $baslik = $sms['netgsm_baslik'];


            $mesaj = html_entity_decode($mesaj, ENT_COMPAT, "UTF-8");
            $mesaj = rawurlencode($mesaj);


            $baslik = html_entity_decode($baslik, ENT_COMPAT, "UTF-8");
            $baslik = rawurlencode($baslik);


            sendsms($mesaj, $tel, $baslik, $usa, $paso);

            Header("location: ../../../pages.php?sayfa=smsnumaralar&status=success");

        }

        if ($sms['sms_firma'] == 3) {

            $mesaj_icerik = $_POST['tekilsms_mesaj'];
            $numara = $_POST['tekilsms_numara'];
            $ucuz_baslik = $sms['ucuzsms_baslik'];
            $ucuz_user = $sms['ucuzsms_user'];
            $ucuz_pass = $sms['ucuzsms_pass'];

            $postUrl = "http://api.tescom.com.tr:8080/api/smspost/v1";

            $postData = "". "<sms>".
                "<username>$ucuz_user</username>".
                "<password>$ucuz_pass</password>".
                "<header>$ucuz_baslik</header>".
                "<validity>2880</validity>".
                "<messages>".
                "<mb><no>$numara</no><msg><![CDATA[$mesaj_icerik]]></msg></mb>".
                "</messages>".
                "</sms>";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $postUrl); curl_setopt($ch, CURLOPT_POSTFIELDS, $postData); curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 5); curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml; charset=UTF-8"));

            $response = curl_exec($ch); curl_close($ch);

            Header("location: ../../../pages.php?sayfa=smsnumaralar&status=success");

        }


    }
}
?>


