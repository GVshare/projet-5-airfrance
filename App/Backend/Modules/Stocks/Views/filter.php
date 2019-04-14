<!-- HEADER -->
<div class="stockTitle">
	<a href="/projet-5-airfrance/Web/" class="logoBack"><i class="far fa-hand-point-left"></i></a><h1 class="stockTitleText"><?= $_GET['company'] ?> Stock</h1>
</div>

<!-- SUBTITLES / FILTERS -->
<div id="navDot">

	<a href="/projet-5-airfrance/Web/stocks-<?= $_GET['company'] ?>-All">
		<button <?php 
			if (isset($_GET['dot'])) : ?>class="dot" <?php 
			else : ?> class="dot , selected" <?php endif; ?>>
			ALL
		</button>
	</a>

	<a href="/projet-5-airfrance/Web/stocks-<?= $_GET['company'] ?>-filter-A">
		<button <?php 
			if (isset($_GET['dot']) && $_GET['dot'] == 'A') : ?> class="dot , selected" <?php 
			else : ?> class="dot" <?php endif ?>>
			DOT&nbsp;A
		</button>
	</a>

	<a href="/projet-5-airfrance/Web/stocks-<?= $_GET['company'] ?>-filter-G">
		<button <?php 
			if (isset($_GET['dot']) && $_GET['dot'] == 'G') : ?> class="dot , selected" <?php 
			else : ?> class="dot" <?php endif ?>>
			DOT&nbsp;G
		</button>
	</a>

	<a href="/projet-5-airfrance/Web/stocks-<?= $_GET['company'] ?>-filter-E">
		<button <?php 
			if (isset($_GET['dot']) && $_GET['dot'] == 'E') : ?> class="dot , selected" <?php 
			else : ?> class="dot" <?php endif ?>>
			DOT&nbsp;E
		</button>
	</a>

	<a href="/projet-5-airfrance/Web/stocks-<?= $_GET['company'] ?>-filter-Q">
		<button <?php 
			if (isset($_GET['dot']) && $_GET['dot'] == 'Q') : ?> class="dot , selected" <?php 
			else : ?> class="dot" <?php endif ?>>
			DOT&nbsp;Q
		</button>
	</a>

	<a href="/projet-5-airfrance/Web/stocks-<?= $_GET['company'] ?>-filter-T">
		<button <?php 
			if (isset($_GET['dot']) && $_GET['dot'] == 'T') : ?> class="dot , selected" <?php 
			else : ?> class="dot" <?php endif ?>>
			DOT&nbsp;T
		</button>
	</a>

	<a href="/projet-5-airfrance/Web/stocks-<?= $_GET['company'] ?>-filter-X">
		<button <?php 
			if (isset($_GET['dot']) && $_GET['dot'] == 'X') : ?> class="dot , selected" <?php 
			else : ?> class="dot" <?php endif ?>>
			DOT&nbsp;X
		</button>
	</a>

	<a href="/projet-5-airfrance/Web/stocks-<?= $_GET['company'] ?>-filter-ING">
		<button <?php 
			if (isset($_GET['dot']) && $_GET['dot'] == 'ING') : ?> class="dot , selected" <?php 
			else : ?> class="dot" <?php endif ?>>
			ING
		</button>
	</a>
</div>

<!-- STOCK INVENTORY TABLE TITLE -->
<table>
	<tr>	
		<th>Item Pool</th>
		<th>Designation</th>
		<th>Part Number</th>
		<th>Serial Number</th>
		<th>Par Stock</th>
		<th>Stock on Hand</th>
		<th>Shelf Life</th>
		<th>Provider</th>
		<th>Users</th>
	</tr>

<!-- STOCK INVENTORY TABLE -->
	<?php 
	foreach ($listStocks as $stock) :										
	?>

	<tr>
		<th><?= $stock['itemPool']?></th>
		<th><?= $stock['designation']?></th>
		<th><?= $stock['partNumber']?></th>
		<th><?= $stock['serialNumber']?>
			<a <?php 
				if ($_GET['dot'] == 'All') : ?>href="/projet-5-airfrance/Web/stocks-<?= $_GET['company'] ?>-All-updateBox-<?= $stock['id'] ?>"<?php 
				else : ?> href="/projet-5-airfrance/Web/stocks-<?= $_GET['company'] ?>-updateBox-<?= $stock['id'] ?>-filter-<?= $_GET['dot'] ?>" <?php endif; ?>>
				<i class="fas fa-pencil-alt"></i>
			</a>
		</th>
		<th><?= $stock['parStock']?></th>

		<!-- If stock on hand is less than par stock change class to 'missStock' (change background color to red) -->
		<th <?php 
			if ($stock['stockOnHand'] < $stock['parStock']): ?>class="missStock"<?php endif ?>>

			<!-- When clicking on the minus bottom redirect to stock if filter not set or stock-filter-page is filter declared -->
			<a <?php 
				if ($_GET['dot']=='All') : ?> href="/projet-5-airfrance/Web/stocks-<?= $_GET['company'] ?>-decrease-<?= $stock['id'] ?>-filter-All" <?php 
				else : ?> href="/projet-5-airfrance/Web/stocks-<?= $_GET['company'] ?>-decrease-<?= $stock['id'] ?>-filter-<?= $_GET['dot']  ?>" <?php endif; ?>>
				<i class="fas fa-minus-circle"></i>
			</a>

			<!-- When clicking on the plus bottom redirect to stock if filter not set or stock-filter-page is filter declared -->
			<?= $stock['stockOnHand']?>
			<a <?php 
				if ($_GET['dot']=='All') : ?> href="/projet-5-airfrance/Web/stocks-<?= $_GET['company'] ?>-increase-<?= $stock['id'] ?>-filter-All" <?php 
				else : ?> href="/projet-5-airfrance/Web/stocks-<?= $_GET['company'] ?>-increase-<?= $stock['id'] ?>-filter-<?= $_GET['dot']  ?>" <?php endif; ?>>
				<i class="fas fa-plus-circle"></i>
			</a>
		</th>

		<!-- Calculate the time  left in days between today and the ShelfLife -->
		<?php  
		$dateExpire = strtotime($stock['shelfLife']);
		$dateNow = time();
		$dateDifference = ($dateExpire - $dateNow)/(60*60*24);
		?>

		<!-- If shelfLife is less than 30 days change class to almostExpiredItem (change background color to orange) -->
		<!-- ElseIf shelfLife is less than 0 day change class to ExpiredItem (change background color to red) -->
		<th <?php if ($dateDifference > 0 && $dateDifference < 30) : ?> class='almostExpireItem'
			<?php elseif ($dateDifference <= 0 ) :?> class='expireItem'
			<?php endif ?> 
		><?= $stock['shelfLife']?></th>

		<th><?= $stock['provider']?></th>
		<th><?= $stock['users']?></th>
		<th class="deletePart">
			<a <?php 
				if ($_GET['dot']=='All') : ?> href="/projet-5-airfrance/Web/stocks-<?= $_GET['company'] ?>-delete-<?= $stock['id'] ?>-filter-All" <?php 
				else : ?> href="/projet-5-airfrance/Web/stocks-<?= $_GET['company'] ?>-delete-<?= $stock['id'] ?>-filter-<?= $_GET['dot']  ?>" <?php endif; ?>>
				<i class="fas fa-trash-alt"></i>
			</a>
		</th>
	</tr>

	<?php 	
	endforeach; 
	?>

<!-- ADD ITEM TO STOCK TABLE -->
</table>

<form action="/projet-5-airfrance/Web/stocks-<?= $_GET['company'] ?>-add" method="post" name="newPart">
	<table id="tableCommand">
		<tr>
			<th>Item Pool</th>
			<th>Kit</th>
			<th>Kit Extention</th>
			<th>Designation</th>
			<th>Part Number</th>
			<th>Serial Number</th>
			<th>Par Stock</th>
			<th>Stock on Hand</th>
			<th>Shelf Life</th>
			<th>Provider</th>
			<th>Users</th>
		</tr>
		<h3>Create New Stock Part</h3>
		<tr>
			<th><input type="text" name="itemPool" required></th>
			<th>
				<select name="kit">
					<option value="">Select</option>
					<option value="A">DOT A</option>
					<option value="G">DOT G</option>
					<option value="E">DOT E</option>
					<option value="Q">DOT Q</option>
					<option value="T">DOT T</option>
					<option value="X">DOT X</option>
					<option value="ING">INGREDIENTS</option>
				</select>
			</th>
			<th><input type="text" name="extention"></th>
			<th><input type="text" name="designation" ></th>
			<th><input type="text" name="partNumber" ></th>
			<th><input type="text" name="serialNumber" ></th>
			<th><input type="Number" name="parStock" value="0" ></th>
			<th><input type="Number" name="stockOnHand" value="0" ></th>
			<th><input type="date" name="shelfLife" ></th>
			<th><input type="text" name="provider" ></th>
			<th><input type="text" name="users" ></th>
			<th class="deletePart"><a href="#/" type="submit" onclick="document.forms['newPart'].submit()"><i class="fas fa-check"></i></a></th>	
		</tr>
	</table>
</form>

<!-- UPDATE BOX -->
<?php if (isset($_GET['id'])) : ?>

<div id="box">
	<form method="POST" <?php 

	if ($_GET['dot'] == 'All') : ?>action="/projet-5-airfrance/Web/stocks-<?=$_GET['company']?>-All-update-<?= $_GET['id'] ?>"<?php 
	else : ?> action="/projet-5-airfrance/Web/stocks-<?=$_GET['company']?>-update-<?= $_GET['id'] ?>-filter-<?= $_GET['dot'] ?>" <?php endif; ?>>

		<input id="newSerialN" type="text" name="serialNumber" placeholder="Your new Serial Number" required>
		<input id="newShelfLife" type="date" name="shelfLife" placeholder="New shelf Life YYYY-MM-DD" required>

		<div>
			<input type="submit" name="submitNewSN" value="Valider" id="buttonNewSerial">
			<a <?php 
				if ($_GET['dot'] == 'All') : ?> href="/projet-5-airfrance/Web/stocks-airFrance-All"<?php 
				else : ?> href="/projet-5-airfrance/Web/stocks-airFrance-filter-<?= $_GET['dot'] ?>"><input type="button" value="Annuler" id="buttonNewSerial"> <?php endif; ?>
			</a>
		</div>
		
	</form>
</div>

<?php endif; ?>
