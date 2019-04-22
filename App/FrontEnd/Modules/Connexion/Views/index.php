
<h2>Connexion</h2>

 <?php if ($user->isAuthenticated()) {
	echo "YES";
} ?>

<form action="/projet-5-airfrance/Web/" method="post" id="form">
  <label>Pseudo</label>
  <input type="text" name="login" id="login"/>
  <span id="errorLogin">Your Login must be alphanumeric !</span>
  <br/>
 
  <label>Mot de passe</label>
  <input type="password" name="password" id="password"/>
  <br/><br/>
 
  <input type="submit" value="Connexion" />
</form>


<script type="text/javascript" src="../Web/js/formVerificationLogin.js"></script>