
<!-- CHECKING THE MISSING/EXPIRING ITEMS -->
<?php 

$numberMissingAF = 0;
$partAlmostExpiringAF = 0;
$partExpiredAF = 0;

foreach ($listStocks as $stock) :

	if ($stock['stockOnHand'] < $stock['parStock']):
		$numberMissingAF = $numberMissingAF + ($stock['parStock'] - $stock['stockOnHand']);
	endif;
	
	$dateExpire = strtotime($stock['shelfLife']);
	$dateNow = time();
	$dateDifference = ($dateExpire - $dateNow)/(60*60*24);

	

	if ($dateDifference > 0 && $dateDifference < 30) {
		$partAlmostExpiringAF ++;
	}

	if ($dateDifference < 0) {
		$partExpiredAF ++;
	}
endforeach;
?>

<!-- ======================================= -->

<header>
	<h1>EZE-KI Allotment</h1>
</header>


<div class="companyStockSummary">
	<button><a href="/projet-5-airfrance/Web/stocks">AirFrance</a></button>
	<?php
	if ($numberMissingAF === 0 && $partAlmostExpiringAF === 0 && $partExpiredAF === 0) {
	?>
		<span id="statusGood"><i class="fas fa-smile-beam"></i> ALL GOOD ! <i class="fas fa-smile-beam"></i></span>
	<?php
	} 
	?>

	<?php
	if ($numberMissingAF > 0) {
	?>	
		<span id="missingPartText"><i class="fas fa-exclamation-triangle"></i> Parts missing : <?= $numberMissingAF ?></span>
	<?php	 
	}

	if ($partAlmostExpiringAF > 0) {
	?>
		<span id="partAlmostExpiringText"><i class="fas fa-clock"></i> Part Expiring in less than 30 days : <?= $partAlmostExpiringAF ?></span>
	<?php
	} 
	?>

	<?php
	if ($partExpiredAF > 0) {
	?>
		<span id="partExpiredText"><i class="fas fa-clock"></i> Part Expired : <?= $partExpiredAF ?></span>
	<?php
	} 
	?>
</div>


<i class="fas fa-fighter-jet" id="imgPlane"></i>



<script type="text/javascript" src="../Web/js/plane.js"></script>