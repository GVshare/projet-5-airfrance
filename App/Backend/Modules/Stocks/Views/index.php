
<!-- CHECKING THE MISSING/EXPIRING ITEMS OF AIRFRANCE -->
<?php 

$numberMissingAF = 0;
$partAlmostExpiringAF = 0;
$partExpiredAF = 0;

foreach ($listStocksAF as $stockAF) :
	
	if ($stockAF['stockOnHand'] < $stockAF['parStock']):
		$numberMissingAF = $numberMissingAF + ($stockAF['parStock'] - $stockAF['stockOnHand']);
	endif;
	
	$dateExpire = strtotime($stockAF['shelfLife']);
	$dateNow = time();
	$dateDifference = ($dateExpire - $dateNow)/(60*60*24);

	

	if ($dateDifference > 0 && $dateDifference < 30) :
		$partAlmostExpiringAF ++;
	endif;

	if ($dateDifference < 0) :
		$partExpiredAF ++;
	endif;
endforeach;
?>

<!-- CHECKING THE MISSING/EXPIRING ITEMS OF AIRFRANCE -->
<?php 

$numberMissingCA = 0;
$partAlmostExpiringCA = 0;
$partExpiredCA = 0;

foreach ($listStocksCA as $stockCA) :
	
	if ($stockCA['stockOnHand'] < $stockCA['parStock']):
		$numberMissingCA = $numberMissingCA + ($stockCA['parStock'] - $stockCA['stockOnHand']);
	endif;
	
	$dateExpire = strtotime($stockCA['shelfLife']);
	$dateNow = time();
	$dateDifference = ($dateExpire - $dateNow)/(60*60*24);

	

	if ($dateDifference > 0 && $dateDifference < 30) :
		$partAlmostExpiringCA ++;
	endif;

	if ($dateDifference < 0) :
		$partExpiredCA ++;
	endif;
endforeach;
?>

<!-- CHECKING THE MISSING/EXPIRING ITEMS OF KLM -->
<?php 

$numberMissingKLM = 0;
$partAlmostExpiringKLM = 0;
$partExpiredKLM = 0;

foreach ($listStocksKLM as $stockKLM) :
	
	if ($stockKLM['stockOnHand'] < $stockKLM['parStock']):
		$numberMissingKLM = $numberMissingKLM + ($stockKLM['parStock'] - $stockKLM['stockOnHand']);
	endif;
	
	$dateExpire = strtotime($stockKLM['shelfLife']);
	$dateNow = time();
	$dateDifference = ($dateExpire - $dateNow)/(60*60*24);

	

	if ($dateDifference > 0 && $dateDifference < 30) :
		$partAlmostExpiringKLM ++;
	endif;

	if ($dateDifference < 0) :
		$partExpiredKLM ++;
	endif;
endforeach;
?>

<!-- =================================================================================================================================== -->
<!-- =================================================================================================================================== -->
<!-- =================================================================================================================================== -->

<header>
	<h1>EZE-KI Allotment</h1>
</header>


<div class="companyStockSummary , companyStockSummaryTop">
	<button><a href="/projet-5-airfrance/Web/stocks-airFrance-All">Air France</a></button>
	<?php
	if ($numberMissingAF === 0 && $partAlmostExpiringAF === 0 && $partExpiredAF === 0) :
	?>
		<span id="statusGood"><i class="fas fa-smile-beam"></i> ALL GOOD ! <i class="fas fa-smile-beam"></i></span>
	<?php
	endif;
	?>

	<?php
	if ($numberMissingAF > 0) :
	?>	
		<span id="missingPartText"><i class="fas fa-exclamation-triangle"></i> Parts missing : <?= $numberMissingAF ?></span>
	<?php	 
	endif;

	if ($partAlmostExpiringAF > 0) :
	?>
		<span id="partAlmostExpiringText"><i class="fas fa-clock"></i> Part Expiring in less than 30 days : <?= $partAlmostExpiringAF ?></span>
	<?php
	endif;
	?>

	<?php
	if ($partExpiredAF > 0) :
	?>
		<span id="partExpiredText"><i class="fas fa-clock"></i> Part Expired : <?= $partExpiredAF ?></span>
	<?php
	endif;
	?>
</div>

<div class="companyStockSummary">
	<button><a href="/projet-5-airfrance/Web/stocks-airCanada-All">Air Canada</a></button>
	<?php
	if ($numberMissingCA === 0 && $partAlmostExpiringCA === 0 && $partExpiredCA === 0) :
	?>
		<span id="statusGood"><i class="fas fa-smile-beam"></i> ALL GOOD ! <i class="fas fa-smile-beam"></i></span>
	<?php
	endif;
	?>

	<?php
	if ($numberMissingCA > 0) :
	?>	
		<span id="missingPartText"><i class="fas fa-exclamation-triangle"></i> Parts missing : <?= $numberMissingCA ?></span>
	<?php	 
	endif;

	if ($partAlmostExpiringCA > 0) :
	?>
		<span id="partAlmostExpiringText"><i class="fas fa-clock"></i> Part Expiring in less than 30 days : <?= $partAlmostExpiringCA ?></span>
	<?php
	endif;
	?>

	<?php
	if ($partExpiredCA > 0) :
	?>
		<span id="partExpiredText"><i class="fas fa-clock"></i> Part Expired : <?= $partExpiredCA ?></span>
	<?php
	endif; 
	?>
</div>

<div class="companyStockSummary">
	<button><a href="/projet-5-airfrance/Web/stocks-KLM-All">KLM Airline</a></button>
	<?php
	if ($numberMissingKLM === 0 && $partAlmostExpiringKLM === 0 && $partExpiredKLM === 0) :
	?>
		<span id="statusGood"><i class="fas fa-smile-beam"></i> ALL GOOD ! <i class="fas fa-smile-beam"></i></span>
	<?php
	endif;
	?>

	<?php
	if ($numberMissingKLM > 0) :
	?>	
		<span id="missingPartText"><i class="fas fa-exclamation-triangle"></i> Parts missing : <?= $numberMissingKLM ?></span>
	<?php	 
	endif;

	if ($partAlmostExpiringKLM > 0) :
	?>
		<span id="partAlmostExpiringText"><i class="fas fa-clock"></i> Part Expiring in less than 30 days : <?= $partAlmostExpiringKLM ?></span>
	<?php
	endif;
	?>

	<?php
	if ($partExpiredKLM > 0) :
	?>
		<span id="partExpiredText"><i class="fas fa-clock"></i> Part Expired : <?= $partExpiredKLM ?></span>
	<?php
	endif;
	?>
</div>



<i class="fas fa-fighter-jet" id="imgPlane"></i>

<script type="text/javascript" src="../Web/js/plane.js"></script>