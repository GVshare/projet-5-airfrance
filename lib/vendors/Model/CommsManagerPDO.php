<?php
namespace Model;

use \Entity\Posts;

class CommsManagerPDO extends CommsManager
{
	public function getOpenPosts() {
		$sql = '
			SELECT id , author , title , dateOpen , status
			FROM posts
			WHERE status = 1
			ORDER BY dateOpen ASC';

		$requete = $this->dao->query($sql);

		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Posts');

		$posts = $requete->fetchAll();

		$requete->closeCursor();

		return $posts;
	}
}