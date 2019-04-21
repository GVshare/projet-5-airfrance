<header>
	<a href="/projet-5-airfrance/Web/" class="logoBackBlue"><i class="far fa-hand-point-left"></i></a><h1 class="titleComm">Team Communication</h1>
</header>

<section id="comSection">
	<aside>
		<h3>On going communications</h3>

		<?php foreach ($postsOpen as $postOpen) : ?>
			<a href="/projet-5-airfrance/Web/communication-onGoing-<?=$postOpen['id'] ?>"><p class="postsOnGoing"><?= 'Title: '. $postOpen['title'] . "<br>". "By " . $postOpen["author"] . " on " . $postOpen["dateOpen"] ?></p></a>
		<?php endforeach ?>

		<h3>Archives</h3>
		<?php foreach ($postsClose as $postClose) : ?>
			<a href="#/"><p class="postsClosed"><?= 'Title: '.$postClose['title']. "<br>". "By " . $postClose["author"] . " on " . $postClose["dateOpen"] ?></p></a>
		<?php endforeach ?>
	</aside>
	<div id="communication">
		
		<form id="createTopic" method="POST" action="/projet-5-airfrance/Web/communication-newPost">
			<input class="inputTopic" type="text" name="authorTopic" placeholder="Enter your name here" required>
			<input class="inputTopic" type="text" name="titleTopic" placeholder="Enter the Title of the Topic here" required>
			<button type="submit" class="topicButton">Create a New Topic</button>
		</form>
	</div>
</section>