<header>
	<a href="/projet-5-airfrance/Web/" class="logoBackBlue"><i class="far fa-hand-point-left"></i></a><h1 class="titleComm">Archives</h1>
</header>

<section id="comSection">
	<aside>
		<h3>On going communications</h3>

		<?php foreach ($postsOpen as $postOpen) : ?>
			<a href="/projet-5-airfrance/Web/communication-onGoing-<?=$postOpen['id'] ?>"><p class="postsOnGoing"><?= 'Title: '. $postOpen['title'] . "<br>". "By " . $postOpen["author"] . " on " . $postOpen["dateOpen"] ?></p></a>
		<?php endforeach ?>

		<h3>Archives</h3>
		<?php foreach ($postsClose as $postClose) : ?>
			<a href="/projet-5-airfrance/Web/communication-archives-<?=$postClose['id'] ?>">
				<?php if ($_GET['id'] == $postClose["id"]) : ?>
					<p class="postsClosedSelected"><?= 'Title: '.$postClose['title']. "<br>". "By " . $postClose["author"] . " on " . $postClose["dateOpen"] ?></p>
				<?php else : ?>
					<p class="postsClosed"><?= 'Title: '.$postClose['title']. "<br>". "By " . $postClose["author"] . " on " . $postClose["dateOpen"] ?></p>
				<?php endif ?>
			</a>
		<?php endforeach ?>
	</aside>

	<div id="communication">
		<div id="titleComment">
			<?php foreach ($post as $post) : ?>
				<h2><?= 'Title : ' . $post['title'] ?></h2>
				<p>
					<?= 'Topic opened by ' . $post['author'] . ' on ' . $post['dateOpen'] ?>
					<a href="/projet-5-airfrance/Web/communication-<?=$post['id'] ?>-deleteTopic">
						<button class="deleteTopic">Delete Topic</button>
					</a>
					<a href="/projet-5-airfrance/Web/communication-postsClosed-<?=$post['id'] ?>-openTopic">
						<button class="closeTopic">Re-open Topic</button>
					</a>
				</p>
			<?php endforeach; ?>
		</div>

		<div id="chatClosed">
			<?php foreach ($Comments as $Comment) : ?>
				<p><em class="commentHeader"><?=  $Comment['dateComment'] . ' by ' .$Comment['author']  ?></em><br>
				<?=  $Comment['content']  ?><br> <?= $Comment['attachment'] ?> </p>
			<?php endforeach; ?>
		</div>

	</div>
</section>