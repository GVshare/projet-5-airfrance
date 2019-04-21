<?php
namespace Model;

use \Entity\Comments;

class CommentsManagerPDO extends CommentsManager
{
	public function getComments($idPost) {
		$sql = '
			SELECT id, idPost, author, content, attachment, dateComment
			FROM comments
			WHERE idPost = ?
			ORDER BY dateComment DESC';

		$requete = $this->dao->prepare($sql);

		$requete->execute(array($idPost));

		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comments');

		$comments = $requete->fetchAll();

		$requete->closeCursor();

		return $comments;
	}

	public function newComment($idPost, $authorComment, $contentComment, $fileAttachment) {
		$sql = '
			INSERT INTO comments (idPost, author, content, attachment, dateComment)
			VALUES (?, ?, ?, ?, NOW())';

		$requete = $this->dao->prepare($sql);

		$requete->execute(array($idPost, $authorComment, $contentComment, $fileAttachment));

		$requete->closeCursor();
	}
}