<header>
	<a href="/projet-5-airfrance/Web/" class="logoBackBlue"><i class="far fa-hand-point-left"></i></a><h1 class="titleComm">On going communications</h1>
</header>

<section id="comSection">
	<aside>
		<h3>On going communications</h3>

		<?php foreach ($postsOpen as $postOpen) : ?>
			<a href="/projet-5-airfrance/Web/communication-onGoing-<?=$postOpen['id'] ?>">
				<?php if ($_GET['id'] == $postOpen["id"]) : ?>
					<p class="postsOnGoindSelected"><?= 'Title: '. $postOpen['title'] . "<br>". "By " . $postOpen["author"] . " on " . $postOpen["dateOpen"] ?></p>
				<?php else : ?>
					<p class="postsOnGoing"><?= 'Title: '. $postOpen['title'] . "<br>". "By " . $postOpen["author"] . " on " . $postOpen["dateOpen"] ?></p>
				<?php endif; ?>

			</a>
		<?php endforeach ?>

		<h3>Archives</h3>
		<?php foreach ($postsClose as $postClose) : ?>
			<a href="/projet-5-airfrance/Web/communication-archives-<?=$postClose['id'] ?>"><p class="postsClosed"><?= 'Title: '.$postClose['title']. "<br>". "By " . $postClose["author"] . " on " . $postClose["dateOpen"] ?></p></a>
		<?php endforeach ?>
	</aside>

	<div id="communication">
		<div id="titleComment">
			<?php foreach ($post as $post) : ?>
				<h2><?= 'Title : ' . $post['title'] ?></h2>
				<p>
					<?= 'Topic opened by ' . $post['author'] . ' on ' . $post['dateOpen'] ?>
					<a href="/projet-5-airfrance/Web/communication-<?=$post['id'] ?>-deleteTopic">
						<button class="deleteTopic">delete Topic</button>
					</a>
					<a href="/projet-5-airfrance/Web/communication-onGoing-<?=$post['id'] ?>-closeTopic">
						<button class="closeTopic">Close Topic</button>
					</a>
				</p>
			<?php endforeach; ?>
		</div>

		<div id="chat">
			<?php foreach ($Comments as $Comment) : ?>
				<p><em class="commentHeader"><?=  $Comment['dateComment'] . ' by ' .$Comment['author']  ?></em><br>
				<?=  $Comment['content']  ?><br> <?= $Comment['attachment'] ?> </p>
			<?php endforeach; ?>
		</div>
		<form id="chatForm" action="/projet-5-airfrance/Web/communication-onGoing-<?= $_GET['id'] ?>-newComment" method="POST">
			<input type="text" name="authorComment" placeholder="Enter your name" required>
			<input type="text" name="contentComment" placeholder="Enter your comment" required><br><br>
			<input type="file" name="fileAttachment"><br><br>
			<input type="submit" name="submitComment" value="Send comment">
		</form>

	</div>
</section>