<!-- =================================================================================================================================== -->
<!-- ================================================= STOCKS INDEX VIEW =============================================================== -->
<!-- =================================================================================================================================== -->

<header>
	<a href="/projet-5-airfrance/Web/communication" id="communicationLogo"><i class="fas fa-envelope"></i></a>
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

<div class="companyStockSummary">
	<button><a href="/projet-5-airfrance/Web/stocks-airEuropa-All">Air Europa</a></button>
	<?php
	if ($numberMissingUX === 0 && $partAlmostExpiringUX === 0 && $partExpiredUX === 0) :
	?>
		<span id="statusGood"><i class="fas fa-smile-beam"></i> ALL GOOD ! <i class="fas fa-smile-beam"></i></span>
	<?php
	endif;
	?>

	<?php
	if ($numberMissingUX > 0) :
	?>	
		<span id="missingPartText"><i class="fas fa-exclamation-triangle"></i> Parts missing : <?= $numberMissingUX ?></span>
	<?php	 
	endif;

	if ($partAlmostExpiringUX > 0) :
	?>
		<span id="partAlmostExpiringText"><i class="fas fa-clock"></i> Part Expiring in less than 30 days : <?= $partAlmostExpiringUX ?></span>
	<?php
	endif;
	?>

	<?php
	if ($partExpiredUX > 0) :
	?>
		<span id="partExpiredText"><i class="fas fa-clock"></i> Part Expired : <?= $partExpiredUX ?></span>
	<?php
	endif; 
	?>
</div>

<i class="fas fa-fighter-jet" id="imgPlane"></i>

<script type="text/javascript" src="../Web/js/plane.js"></script>