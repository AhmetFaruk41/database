<?php echo !defined("GUVENLIK") ? die("Vaoww! Bu ne cesaret?") : null;?><?php
$modulCek = $db->prepare("select * from moduller where durum='1' order by sira asc");
$modulCek->execute();
?>
<div class="page-contain" style="padding-top: 1em">
	<div id="main-content" class="main-content">

		<?php include 'includes/template/slider.php'?>
		<?php foreach ($modulCek as $modul) {

include "$modul[kod]";

		}?>
	</div>
</div>
