<header>
	<a href="/projet-5-airfrance/Web/" class="logoBackBlue"><i class="far fa-hand-point-left"></i></a><h1>Team Communication</h1>
</header>

<section id="comSection">
	<aside>
		<h3>On going communications</h3>

		<?php foreach ($posts as $post) : ?>
			<a href="#/"><p class="postsOnGoing"><?= 'Title: '.$post['title']. "<br>". "By " . $post["author"] . " at " . $post["dateOpen"] ?></p></a>
		<?php endforeach ?>

		<h3>Archives</h3>
	</aside>
	<div id="communication">
		
		<form id="createTopic" method="POST" action="/projet-5-airfrance/Web/communication-newPost">
			<input class="inputTopic" type="text" name="authorTopic" placeholder="Enter your name here" required>
			<input class="inputTopic" type="text" name="authorTitle" placeholder="Enter the Title of the Topic here" required>
			<button type="submit" class="topicButton"><a href="#/">Create a New Topic</a></button>
		</form>
	</div>
</section>