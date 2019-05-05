<div id="connexionBlock">
<h2 id="connexionTitle">EZE-KI - Connexion</h2>

<form action="/projet-5-airfrance/Web/" method="post" id="form">

	<div id="connexionInfo">

		<input class="inputConnexion" type="text" name="login" id="login" placeholder="PSEUDO" />

		<input class="inputConnexion" type="password" name="password" id="password" placeholder="PASSWORD" />

	</div>

	<p id="errorLogin"></p>

	<?php if(!empty($this->app->user()->hasFlash())) : ?>
		<p id="errorLogDetails">  <?= $this->app->user()->getFlash(); ?>  </p>
	<?php endif; ?>

	<input id="buttonConnexion" type="submit" value="Connexion" />
	
	
</form>
</div>

<script type="text/javascript" src="../Web/js/formVerificationLogin.js"></script>