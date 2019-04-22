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
			ORDER BY dateOpen DESC';

		$requete = $this->dao->query($sql);

		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Posts');

		$posts = $requete->fetchAll();

		$requete->closeCursor();

		return $posts;
	}

	public function getClosePosts() {
		$sql = '
			SELECT id , author , title , dateOpen , status
			FROM posts
			WHERE status = 0
			ORDER BY dateOpen DESC';

		$requete = $this->dao->query($sql);

		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Posts');

		$posts = $requete->fetchAll();

		$requete->closeCursor();

		return $posts;
	}

	public function newPost($author , $title) {
		$sql = '
		    INSERT INTO posts (author , title , dateOpen) 
		    VALUES (? , ? , NOW() )';

	    $requete = $this->dao->prepare($sql);
	    
	    $requete->execute(array($author , $title));
	}

	public function viewPost($id) {
		$sql = '
	        SELECT id , author , title , dateOpen , status
	        FROM posts
	        WHERE id = ?';

	    $requete = $this->dao->prepare($sql);

	    $requete->execute(array($id));

	    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Posts');
    
	    $post = $requete->fetchAll();
	    
	    $requete->closeCursor();
	       
	    return $post;
	}

	public function closeTopic($id) {
		$sql = '
	        UPDATE `posts` 
	        SET status = 0 
	        WHERE id = ?';

	    $requete = $this->dao->prepare($sql);

	    $requete->execute(array($id));
	}

	public function openTopic($id) {
		$sql = '
	        UPDATE `posts` 
	        SET status = 1 
	        WHERE id = ?';

	    $requete = $this->dao->prepare($sql);

	    $requete->execute(array($id));
	}

	public function deleteTopic($id) {
		$sql = '
	        DELETE FROM posts
	        WHERE id = ?';

	    $requete = $this->dao->prepare($sql);

	    $requete->execute(array($id));
	}
}